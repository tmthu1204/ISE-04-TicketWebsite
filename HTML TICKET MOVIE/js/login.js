document.addEventListener('DOMContentLoaded', function() {
    const formLogin = document.getElementById("formLogin");
    const emailE = document.getElementById("email");
    const passwordE = document.getElementById("password");
    const errorMess = document.getElementById("errorMess");
    const emailErr = document.getElementById("emailErr");
    const passwordErr = document.getElementById("passwordErr");

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

    formLogin.addEventListener("submit", function (e) {
        e.preventDefault();
        let isValid = true;

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

        if (isValid) {
            try {
                const userLocal = JSON.parse(localStorage.getItem("users")) || [];
                const findUser = userLocal.find(
                    (user) => user.email === emailE.value && user.password === passwordE.value
                );

                if (!findUser) {
                    showError(errorMess, "Email hoặc mật khẩu không chính xác.");
                } else {
                    localStorage.setItem("userLogin", JSON.stringify({
                        ...findUser,
                        isLoggedIn: true
                    }));
                    window.location.href = "Homepage.html";
                }
            } catch (error) {
                console.error("Login error:", error);
                alert("Đã xảy ra lỗi. Vui lòng thử lại.");
            }
        }
    });
});

