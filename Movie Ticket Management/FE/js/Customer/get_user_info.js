// Lấy thông tin người dùng từ API
function getUserInfo() {
    // Giả sử API trả về thông tin người dùng dưới dạng JSON
    fetch('../../BE/Customer/get_user_info.php?action=getUserInfo', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Kiểm tra sự tồn tại của các phần tử trước khi thay đổi nội dung
            const userNameElement = document.getElementById('user-name');
            const userEmailElement = document.getElementById('user-email');

            if (userNameElement && userEmailElement) {
                userNameElement.innerText = data.user.username;
                userEmailElement.innerText = data.user.email;
            } else {
                console.error('Không tìm thấy phần tử để hiển thị thông tin người dùng');
            }
        } else {
            alert('Không thể lấy thông tin người dùng');
        }
    })
    .catch(error => {
        console.error('Lỗi:', error);
        alert('Đã có lỗi xảy ra khi lấy thông tin người dùng');
    });
}

// Gọi hàm để lấy thông tin khi trang được tải
window.onload = getUserInfo;
