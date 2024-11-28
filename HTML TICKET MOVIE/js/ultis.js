// Remove ES6 exports and make them global functions
function validateEmail(email) {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
}

function validateField(field, type) {
    if (!field) return `${type} không được để trống`;
    if (type === "email" && !validateEmail(field)) return "Email không đúng định dạng";
    return "";
}

function showError(elementId, message) {
    const el = document.getElementById(elementId);
    if (!el) return;
    el.style.display = message ? "block" : "none";
    if (message) el.textContent = message;
}

function checkLoginStatus() {
    const userLogin = JSON.parse(localStorage.getItem("userLogin"));
    return userLogin && userLogin.isLoggedIn === true;
}