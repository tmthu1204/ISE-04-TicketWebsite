// Remove import and use global functions
document.getElementById("formLogin")?.addEventListener("submit", function (e) {
    e.preventDefault();

    const email = document.getElementById("email")?.value || "";
    const password = document.getElementById("password")?.value || "";

    const emailErr = validateField(email, "email");
    const passwordErr = validateField(password, "mật khẩu");

    showError("emailErr", emailErr);
    showError("passwordErr", passwordErr);

    if (emailErr || passwordErr) return;

    try {
        const users = JSON.parse(localStorage.getItem("users")) || [];
        const findUser = users.find(user => user.email === email && user.password === password);

        if (!findUser) {
            showError("errorMess", "Email hoặc mật khẩu không chính xác.");
            return;
        }

        localStorage.setItem("userLogin", JSON.stringify({
            ...findUser,
            isLoggedIn: true
        }));
        window.location.href = "Homepage.html";
    } catch (error) {
        console.error("Login error:", error);
        alert("Đã xảy ra lỗi. Vui lòng thử lại.");
    }
});