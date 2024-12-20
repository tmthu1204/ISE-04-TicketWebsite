document.getElementById("changePasswordForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const currentPassword = document.getElementById("currentPassword").value;
    const newPassword = document.getElementById("newPassword").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (newPassword !== confirmPassword) {
        alert("Mật khẩu mới và xác nhận mật khẩu không khớp!");
        return;
    }

    fetch("change_password.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            currentPassword: currentPassword,
            newPassword: newPassword,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert("Đổi mật khẩu thành công!");
            } else {
                alert(data.message || "Đổi mật khẩu thất bại!");
            }
        })
        .catch((error) => console.error("Error:", error));
});
