// document.getElementById("forgotPasswordLink").addEventListener("click", function () {
//     document.getElementById("forgot_pass").style.display = "block"; // Hiển thị form nhập email
//     document.getElementById("forgotPasswordLink").style.display = "none"; // Ẩn liên kết "Quên mật khẩu?"
// });

// document.getElementById("sendpassBtn").addEventListener("click", function () {
//     const formData = new FormData();
//     formData.append("email", document.getElementById("email").value); // Get email from input field

//     // Send OTP verification request to PHP
//     fetch("../../BE/Common/Login.php", {
//         method: "POST",
//         body: formData,
//     })
//         .then(response => response.json()) // Parse JSON response
//         .then(data => {
//             console.log(JSON.stringify(data));
//             if (data.success) {
//                 alert(data.message); // Show success message
//                 window.location.href = "login.html"; // Redirect to login page after OTP verification
//             } else {
//                 alert(error.message);
//             }
//         })
//         .catch((error) => {
//             console.error("Error:", error); // Log any errors during OTP verification
//             alert("Có lỗi xảy ra. Vui lòng thử lại.");
//         });
// });