<?php

require_once '../../Common/database.php';

$result = [];

try {
    $key2 = "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz";
    $postdata = file_get_contents('php://input');
    $postdatajson = json_decode($postdata, true);
    $mac = hash_hmac("sha256", $postdatajson["data"], $key2);

    $requestmac = $postdatajson["mac"];

    // Kiểm tra callback hợp lệ (đến từ ZaloPay server)
    if (strcmp($mac, $requestmac) != 0) {
        // callback không hợp lệ
        $result["return_code"] = -1;
        $result["return_message"] = "mac not equal";
    } else {
        // Thanh toán thành công
        $datajson = json_decode($postdatajson["data"], true);

        $transactionID = $datajson["app_trans_id"];
        $paymentStatus = $datajson["status"];  // 0 = pending, 1 = successful
        
        error_log("Payment callback received. Transaction ID: $transactionID, Status: $paymentStatus", 3, 'C:\xampp\htdocs\Accounts\BE\Customer\Payment\logfile.log');

        if ($paymentStatus == 1) {
            // Thanh toán thành công, cập nhật trạng thái đơn hàng
            // Initialize Database instance
            $db = new Database();

            // Fetch current paymentInfo from the database
            $stmt = $db->link->prepare("SELECT paymentInfo FROM transaction WHERE transactionID = ?");
            $stmt->bind_param("s", $transactionID);
            $stmt->execute();
            $stmt->bind_result($currentPaymentInfo);

            if ($stmt->fetch()) {
                // Decode current paymentInfo JSON
                $paymentInfoArray = json_decode($currentPaymentInfo, true);

                // Update the payment status to 1 (successful)
                $paymentInfoArray['status'] = 1;

                // Re-encode the paymentInfo array into a JSON string
                $updatedPaymentInfo = json_encode($paymentInfoArray);

                // Update the transaction record with the new paymentInfo
                $stmt->close();
                $stmt = $db->link->prepare("UPDATE transaction SET paymentInfo = ? WHERE transactionID = ?");
                $stmt->bind_param("ss", $updatedPaymentInfo, $transactionID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    error_log("Payment successful, paymentInfo updated for transactionID: $transactionID", 3, 'C:\xampp\htdocs\Accounts\BE\Customer\Payment\logfile.log');
                    $result["return_code"] = 1;
                    $result["return_message"] = "Payment successful, status updated.";
                } else {
                    $result["return_code"] = 0;
                    $result["return_message"] = "Error: Could not update paymentInfo for transactionID: $transactionID";
                }
            } else {
                $result["return_code"] = 0;
                $result["return_message"] = "Error: Could not fetch paymentInfo for transactionID: $transactionID";
            }

            $db->link->close();
        } else {
            // Payment failed or pending
            $result["return_code"] = 0;
            $result["return_message"] = "Payment failed or pending.";
        }
    }
} catch (Exception $e) {
    $result["return_code"] = 0;
    $result["return_message"] = "Exception: " . $e->getMessage();
}

// Return the result back to ZaloPay server
echo json_encode($result);

?>
