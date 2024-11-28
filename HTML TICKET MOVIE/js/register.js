// Remove import and use global functions
document.getElementById("formRegis")?.addEventListener("submit", function (e) {
    e.preventDefault();

    const userName = document.getElementById("userName")?.value || "";
    const email = document.getElementById("email")?.value || "";
    const password = document.getElementById("password")?.value || "";
    const repass = document.getElementById("repass")?.value || "";

    const errors = {
        userNameErr: validateField(userName, "Tên đăng nhập"),
        emailErr: validateField(email, "email"),
        passwordErr: validateField(password, "mật khẩu"),
        repassErr: password !== repass ? "Mật khẩu nhập lại không khớp" : "",
    };

    Object.entries(errors).forEach(([id, msg]) => {
        showError(id, msg);
    });

    if (Object.values(errors).every(msg => !msg)) {
        try {
            const users = JSON.parse(localStorage.getItem("users")) || [];
            
            // Check if email already exists
            if (users.some(user => user.email === email)) {
                showError("emailErr", "Email đã được sử dụng");
                return;
            }

            users.push({ 
                userId: Date.now(), 
                userName, 
                email, 
                password 
            });
            
            localStorage.setItem("users", JSON.stringify(users));
            alert("Đăng ký tài khoản thành công!");
            window.location.href = "login.html";
        } catch (error) {
            console.error("Registration error:", error);
            alert("Đã xảy ra lỗi. Vui lòng thử lại.");
        }
    }
});