// Lấy movieID từ URL
const urlParams = new URLSearchParams(window.location.search);
const movieID = urlParams.get('movieID');
console.log('Movie ID:', movieID);
// Xử lý sự kiện xóa khi người dùng xác nhận
document.getElementById('confirm-delete').addEventListener('click', function() {
    deleteMovie(movieID);
});

// Xử lý sự kiện hủy bỏ xóa
document.getElementById('cancel-delete').addEventListener('click', function() {
    // Quay lại trang danh sách phim
    window.location.href = 'show_movie.html';
});

// Hàm xóa phim
function deleteMovie(movieID) {
    fetch('delete_movie.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'movieID=' + encodeURIComponent(movieID)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            window.location.href = 'show_movie.html'
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        alert('An error occurred: ' + error);
    });
}

