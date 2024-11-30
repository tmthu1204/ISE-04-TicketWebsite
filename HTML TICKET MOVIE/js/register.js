document.addEventListener('DOMContentLoaded', function() {
    const formRegis = document.getElementById("formRegis");
    const userNameE = document.getElementById("userName");
    const emailE = document.getElementById("email");
    const passwordE = document.getElementById("password");
    const repassE = document.getElementById("repass");

    const userNameErr = document.getElementById("userNameErr");
    const emailErr = document.getElementById("emailErr");
    const passwordErr = document.getElementById("passwordErr");
    const repassErr = document.getElementById("repassErr");

    function validateEmail(email) {
        return String(email)
            .toLowerCase()
            .match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
    }

    function showError(element, message) {
        element.style.display = "block";
        element.textContent = message;
    }

    function hideError(element) {
        element.style.display = "none";
    }

    formRegis.addEventListener("submit", function(e) {
        e.preventDefault();
        let isValid = true;

        if (!userNameE.value) {
            showError(userNameErr, "Tên đăng nhập không được để trống");
            isValid = false;
        } else {
            hideError(userNameErr);
        }

        if (!emailE.value) {
            showError(emailErr, "Email không được để trống");
            isValid = false;
        } else if (!validateEmail(emailE.value)) {
            showError(emailErr, "Email không đúng định dạng");
            isValid = false;
        } else {
            hideError(emailErr);
        }

        if (!passwordE.value) {
            showError(passwordErr, "Mật khẩu không được để trống");
            isValid = false;
        } else {
            hideError(passwordErr);
        }

        if (!repassE.value) {
            showError(repassErr, "Vui lòng nhập lại mật khẩu");
            isValid = false;
        } else if (passwordE.value !== repassE.value) {
            showError(repassErr, "Mật khẩu nhập lại không khớp");
            isValid = false;
        } else {
            hideError(repassErr);
        }

        if (isValid) {
            const userLocal = JSON.parse(localStorage.getItem("users")) || [];
            
            // Check if email already exists
            if (userLocal.some(user => user.email === emailE.value)) {
                showError(emailErr, "Email đã được sử dụng");
                return;
            }

            const user = {
                userId: Date.now(),
                userName: userNameE.value,
                email: emailE.value,
                password: passwordE.value,
            };

            userLocal.push(user);
            localStorage.setItem("users", JSON.stringify(userLocal));

            alert("Đăng ký tài khoản thành công!");
            window.location.href = "login.html";
        }
    });
});

