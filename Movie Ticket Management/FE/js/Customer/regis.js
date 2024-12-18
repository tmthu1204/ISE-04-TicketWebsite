document.getElementById("registerBtn").addEventListener("click", function () {
    const formData = new FormData(document.getElementById("registerForm"));
    const errorFields = {
        username: "userNameErr",
        email: "emailErr",
        password: "passwordErr",
        repass: "repassErr",
    };

    // Xóa lỗi cũ trước khi xử lý lỗi mới
    for (let key in errorFields) {
        document.getElementById(errorFields[key]).innerHTML = ""; // Xóa nội dung lỗi cũ
    }

    // Gửi dữ liệu đến PHP
    fetch("../../BE/Common/Register.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert("Đăng ký thành công!");
                window.location.href = "../Common/login.html";
            } else {
                // Hiển thị tất cả lỗi cho các trường bị lỗi
                data.errors.forEach((error) => {
                    const field = error.field; // Tên trường bị lỗi ('username', 'email', ...)
                    const message = error.message; // Nội dung lỗi

                    if (field && errorFields[field]) {
                        const errorDiv = document.getElementById(errorFields[field]);
                        const errorMsg = document.createElement("p"); // Tạo phần tử <p> cho lỗi
                        errorMsg.classList.add("text-danger");
                        errorMsg.innerText = message;
                        errorDiv.appendChild(errorMsg); // Thêm lỗi vào danh sách
                    }
                });
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("Có lỗi xảy ra. Vui lòng thử lại.");
        });
});
