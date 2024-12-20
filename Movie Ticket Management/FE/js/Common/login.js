document.getElementById("forgotPasswordLink").addEventListener("click", function () {
    document.getElementById("forgot_pass").style.display = "block"; // Hiển thị form nhập email
    document.getElementById("forgotPasswordLink").style.display = "none"; // Ẩn liên kết "Quên mật khẩu?"
});

document.getElementById("sendpassBtn").addEventListener("click", function () {
    const formData = new FormData();
    formData.append("action", "sendpass");
    formData.append("email", document.getElementById("Forgotemail").value); // Get email from input field
    
    // Send OTP verification request to PHP
    fetch("../../BE/Common/forgot_password.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            console.log(JSON.stringify(data));
            if (data.success) {
                alert(data.message); // Show success message
                window.location.href = "login.html"; 
                document.getElementById("forgot_pass").style.display = "none";
            } else {
                alert(data.message);
            }
        })
        .catch((error) => {
            console.error("Error:", error); 
            alert("Có lỗi xảy ra. Vui lòng thử lại.");
        });
});

document.getElementById('formLogin').addEventListener('submit', async function (event) {
    event.preventDefault();

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();

    const response = await fetch('../../BE/Common/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            email: email,
            password: password
        }),
    });

    const result = await response.json();

    if (result.success) {
        if (result.role === "admin") {
            window.location.href = '../Admin/payment.html';
        } else if (result.role === "customer") {
            window.location.href = '../Customer/Homepage-user.html';
        }
    } else {
        result.errors.forEach(error => {
            if (error.field === 'email') {
                document.getElementById('emailErr').innerText = error.message;
                document.getElementById('emailErr').style.display = 'block';
            }
            if (error.field === 'password') {
                document.getElementById('passwordErr').innerText = error.message;
                document.getElementById('passwordErr').style.display = 'block';
            }
            if (error.field === 'general') {
                document.getElementById('errorMess').innerText = error.message;
                document.getElementById('errorMess').style.display = 'block';
            }
        });
    }
});



