document.addEventListener("DOMContentLoaded", function () {
    fetch("history.php")
        .then((response) => response.json())
        .then((data) => {
            const table = document.querySelector("#ticket-history .table");

            // Tạo tiêu đề bảng với các cột của paymentInfo là các cột riêng
            table.innerHTML = `
                <thead>
                    <tr>
                        <th>Tên rạp</th>
                        <th>Phim</th>
                        <th>Ghế đặt</th>
                        <th>Phương thức</th>
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                        <th>Đồ ăn nhẹ</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            `;

            const tbody = table.querySelector("tbody");

            data.forEach((item) => {
                // Kiểm tra và parse chuỗi JSON của seatsBooked nếu cần
                let seatsBooked = [];
                try {
                    seatsBooked = JSON.parse(item.seatsBooked);
                } catch (error) {
                    console.error("Error parsing seatsBooked:", error);
                    seatsBooked = []; // Nếu không thể parse, gán mảng rỗng
                }

                // Kiểm tra paymentInfo
                const paymentMethod = item.paymentInfo?.method || "";
                const paymentTime = item.paymentInfo?.datetime || "";
                const paymentStatus =
                    item.paymentInfo?.status === 1 ? "Thành công" : "Thất bại";

                // Kiểm tra snackDetails
                const snacks = Object.entries(item.snackDetails || {})
                    .map(([name, quantity]) => `${name} x${quantity}`)
                    .join(", ");

                // Chỉ gọi .join nếu seatsBooked là mảng
                const seatsText = Array.isArray(seatsBooked)
                    ? seatsBooked.join(", ")
                    : "";

                tbody.innerHTML += `
                    <tr>
                        <td>${item.theaterName}</td>
                        <td>${item.movieTitle}</td>
                        <td>${seatsText}</td>
                        <td>${paymentMethod}</td>
                        <td>${paymentTime}</td>
                        <td>${paymentStatus}</td>
                        <td>${snacks}</td>
                        <td>${item.total} VND</td>
                    </tr>
                `;
            });
        })
        .catch((error) => console.error("Error:", error));
});
