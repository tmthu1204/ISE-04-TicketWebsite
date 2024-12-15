document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('movieForm'); // ID của form
    const submitButton = document.getElementById('submitBtn'); // ID của nút submit

    // Xử lý sự kiện khi người dùng submit form
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Ngừng hành động mặc định (khi submit form)

        // Lấy dữ liệu từ form
        const formData = new FormData(form); // Sử dụng FormData để lấy tất cả dữ liệu từ form, bao gồm cả file

        // Kết nối với server và gửi dữ liệu
        fetch('add_movie.php', { // Thay 'your_php_script.php' bằng đường dẫn đến file PHP xử lý form
            method: 'POST',
            body: formData // Dữ liệu sẽ được gửi qua body của request
        })
        .then(response => response.json()) // Chuyển đổi phản hồi từ server thành JSON
        .then(data => {
            // Xử lý dữ liệu từ server
            if (data.status === 'success') {
                window.location.href = 'show_movie.html';
            } else {
                alert('Error: ' + data.message); // Hiển thị thông báo lỗi từ server
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error submitting the form!');
        });
    });
});
