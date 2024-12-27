// Hàm thay đổi mật khẩu
function changePassword(event) {
    event.preventDefault();  // Ngừng hành động mặc định (nếu là form submit)
    
    const oldPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    // Kiểm tra các điều kiện đầu vào
    if (newPassword !== confirmPassword) {
        alert('Mật khẩu mới và mật khẩu xác nhận không khớp.');
        return;
    }

    // Gửi yêu cầu đổi mật khẩu
    const data = {
        oldPassword: oldPassword,
        newPassword: newPassword
    };

    fetch('../../BE/Customer/change_password.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Mật khẩu đã được thay đổi thành công.');
            location.reload()
        } else {
            alert(data.message);  // Hiển thị thông báo lỗi từ PHP
        }
    })
    .catch(error => {
        console.error('Lỗi:', error);
        alert('Đã có lỗi xảy ra khi thay đổi mật khẩu');
    });
}

// Gắn sự kiện vào nút submit
document.getElementById('submitBtn').addEventListener('click', changePassword);
