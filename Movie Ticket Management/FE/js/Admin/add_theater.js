document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('theaterForm'); // ID của form
    const submitButton = document.getElementById('submitBtn'); // ID của nút submit

    // Xử lý sự kiện khi người dùng submit form
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Ngừng hành động mặc định (khi submit form)

        // Lấy dữ liệu từ form
        const formData = new FormData(form); // Sử dụng FormData để lấy tất cả dữ liệu từ form

        // Kết nối với server và gửi dữ liệu
        fetch('../../BE/Admin/add_theater.php', { 
            method: 'POST',
            body: formData // Dữ liệu sẽ được gửi qua body của request
        })
        .then(response => response.json()) // Chuyển đổi phản hồi từ server thành JSON
        .then(data => {
            // Log the response to check its content
            console.log('Server Response:', data);
            
            // Xử lý dữ liệu từ server
            if (data.status === 'success') {
                window.location.href = 'add_theater.html'; // Chuyển hướng đến trang hiển thị các rạp chiếu
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
