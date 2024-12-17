document.addEventListener('DOMContentLoaded', () => {
    // Lấy theaterID từ URL
    const params = new URLSearchParams(window.location.search);
    const theaterID = params.get('theaterID');

    if (!theaterID) {
        alert('Không tìm thấy Theater ID trong URL.');
        return;
    }

    // Gọi API để lấy danh sách phim
    fetch(`../ManageMovie/show_movie.php`)
        .then(response => response.text())
        .then(movies => {
            console.log('Text response:', movies); // Kiểm tra nội dung trả về
        });
//             const movieListDiv = document.getElementById('movie-list');
//             movieListDiv.innerHTML = ''; // Xóa nội dung cũ

//             // Kiểm tra danh sách phim rỗng
//             if (movies.length === 0) {
//                 movieListDiv.textContent = 'Không có phim nào trong rạp này.';
//                 return;
//             }

//             // Lặp qua danh sách phim và tạo liên kết
//             movies.forEach((movie) => {
//                 const movieLink = document.createElement('a');
//                 movieLink.href = `createShowtime.html?movieID=${movie.movieID}&theaterID=${theaterID}`;
//                 movieLink.textContent = movie.name;
//                 movieListDiv.appendChild(movieLink);
//                 movieListDiv.appendChild(document.createElement('br'));
//             });
//         })
//         .catch(error => alert('Có lỗi khi tải danh sách phim: ' + error));
// });
