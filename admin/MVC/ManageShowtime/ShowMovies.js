document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const theaterID = params.get('theaterID');

    if (!theaterID) {
        alert('Không tìm thấy Theater ID trong URL.');
        return;
    }

    const movieListDiv = document.getElementById('movie-list');
    const addShowtimeForm = document.getElementById('add-showtime-form');
    const movieSelect = document.getElementById('movie-select');
    const roomSelect = document.getElementById('room-select');
    const startTimeInput = document.getElementById('start-time');
    const addShowtimeButton = document.getElementById('add-showtime-button');

    // Khi nhấn nút "Thêm Phim Và Suất Chiếu", hiển thị form để chọn phim và suất chiếu
    addShowtimeButton.addEventListener('click', () => {
        addShowtimeForm.style.display = 'block';  // Hiển thị form
    });

    // Tải danh sách phim trong rạp
    function loadMoviesInTheater() {
        fetch(`get_movies_by_theater.php?theaterID=${theaterID}`)
            .then(response => response.json())
            .then(movies => {
                movieListDiv.innerHTML = ''; // Xóa nội dung cũ

                if (movies.length === 0) {
                    movieListDiv.textContent = 'Chưa có phim nào được tạo suất chiếu.';
                    return;
                }

                // Thêm CSS Flexbox cho phần chứa các thẻ card
                movieListDiv.style.display = 'flex';
                movieListDiv.style.flexWrap = 'wrap';
                movieListDiv.style.justifyContent = 'space-around';
                movieListDiv.style.gap = '15px';  // Khoảng cách giữa các thẻ card

                // Duyệt qua từng phim và tạo thẻ card cho mỗi phim
                movies.forEach(movie => {
                    const movieDiv = document.createElement('div');
                    movieDiv.classList.add('movie-item'); // Thêm class cho mỗi phim để dễ dàng tùy chỉnh CSS

                    // Cài đặt CSS cho thẻ div của phim
                    movieDiv.style.border = '1px solid #ddd';
                    movieDiv.style.padding = '10px';
                    movieDiv.style.margin = '10px';
                    movieDiv.style.borderRadius = '8px';
                    movieDiv.style.backgroundColor = '#a69b8c';
                    movieDiv.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
                    movieDiv.style.width = '300px';  // Kích thước thẻ nhỏ lại
                    movieDiv.style.textAlign = 'center';

                    // Hiển thị tên phim
                    const movieName = document.createElement('h3');
                    movieName.textContent = `${movie.name}`;
                    movieName.style.fontSize = '18px';
                    movieName.style.color = '#333';
                    movieDiv.appendChild(movieName);

                    // Gọi API để lấy suất chiếu cho từng phim
                    fetch(`get_showtime.php?movieID=${movie.movieID}&theaterID=${theaterID}`)
                        .then(response => response.json())
                        .then(showtimes => {
                            const showtimesList = document.createElement('ul');

                            if (showtimes.length > 0) {
                                showtimes.forEach(showtime => {
                                    const showtimeItem = document.createElement('li');
                                    showtimeItem.textContent = `${showtime.startTime}`;
                                    showtimeItem.style.padding = '5px 0';

                                    // Thêm nút xóa
                                    const deleteButton = document.createElement('button');
                                    deleteButton.textContent = 'Xóa';
                                    deleteButton.style.marginLeft = '5px';
                                    deleteButton.style.backgroundColor = '#f44336';
                                    deleteButton.style.color = 'white';
                                    deleteButton.style.border = 'none';
                                    deleteButton.style.padding = '5px 10px';
                                    deleteButton.style.borderRadius = '5px';
                                    deleteButton.style.cursor = 'pointer';
                                    deleteButton.onclick = () => deleteShowtime(showtime.showtimeID);
                                    showtimeItem.appendChild(deleteButton);

                                    showtimesList.appendChild(showtimeItem);
                                });
                            } else {
                                const noShowtimeItem = document.createElement('li');
                                noShowtimeItem.textContent = 'Chưa có suất chiếu nào.';
                                showtimesList.appendChild(noShowtimeItem);
                            }

                            movieDiv.appendChild(showtimesList);
                        })
                        .catch(error => {
                            console.error('Có lỗi khi lấy suất chiếu:', error);
                        });
                    // Thêm nút tạo suất chiếu mới
                    const addShowtimeButton = document.createElement('button');
                    addShowtimeButton.textContent = 'Thêm Suất Chiếu';
                    addShowtimeButton.style.backgroundColor = '#3cb371'; // Nền màu xanh dương
                    addShowtimeButton.style.color = '#fff'; // Màu chữ trắng
                    addShowtimeButton.style.border = 'none'; // Loại bỏ viền
                    addShowtimeButton.style.padding = '5px 10px'; // Tăng kích thước nút
                    addShowtimeButton.style.borderRadius = '5px'; // Bo tròn góc nút
                    addShowtimeButton.style.cursor = 'pointer'; // Hiển thị con trỏ khi hover
                    addShowtimeButton.style.fontSize = '16px'; // Tăng kích thước chữ
                    addShowtimeButton.onclick = () => {
                        startTimeInput.value = ''; // Reset lại thời gian
                        loadRooms(); // Tải lại danh sách phòng
                        movieSelect.value = movie.movieID; // Chọn phim hiện tại
                        addShowtimeForm.style.display = 'block'; // Hiện form thêm suất chiếu
                        const addShowtimeModal = new bootstrap.Modal(document.getElementById('addShowtimeModal'));
                        addShowtimeModal.show(); // Hiện modal
                    };
                    movieDiv.appendChild(addShowtimeButton);

                    // Thêm div phim vào danh sách phim
                    movieListDiv.appendChild(movieDiv);
                });
            })
            .catch(error => alert('Có lỗi khi tải danh sách phim theo theater: ' + error));
    }

    // Tải danh sách phim từ database để thêm
    function loadAllMovies() {
        fetch('../ManageMovie/show_movie.php')
            .then(response => response.json())
            .then(movies => {
                movieSelect.innerHTML = '';
                movies.forEach(movie => {
                    const option = document.createElement('option');
                    option.value = movie.movieID;
                    option.textContent = movie.title;
                    movieSelect.appendChild(option);
                });
            })
            .catch(error => alert('Có lỗi khi tải danh sách phim: ' + error));
    }

    // Tải danh sách phòng chiếu
    function loadRooms() {
        fetch(`../ManageRoom/show_rooms.php?theaterID=${theaterID}`)
            .then(response => response.json())
            .then(rooms => {
                roomSelect.innerHTML = '';
                rooms.forEach((room, index) => {
                    const option = document.createElement('option');
                    option.value = room.roomID;
                    option.textContent = 'room' + (index + 1);
                    roomSelect.appendChild(option);
                });
            })
            .catch(error => alert('Có lỗi khi tải danh sách phòng: ' + error));
    }

    // Lưu suất chiếu
    document.getElementById('save-showtime-button').onclick = () => {
        const movieID = movieSelect.value;
        const roomID = roomSelect.value;
        const startTime = startTimeInput.value;

        if (!movieID || !roomID || !startTime) {
            alert('Vui lòng nhập đầy đủ thông tin.');
            return;
        }

        fetch('add_showtime.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ theaterID, movieID, roomID, startTime })
        })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    addShowtimeForm.style.display = 'none';
                    window.location.reload();
                } else {
                    alert('Có lỗi khi thêm suất chiếu: ' + result.message);
                }
            })
            .catch(error => alert('Có lỗi khi thêm suất chiếu!: ' + error));
    };

    function deleteShowtime(showtimeID) {
        // Gửi yêu cầu xóa qua fetch
        fetch('delete_showtime.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'showtimeID=' + encodeURIComponent(showtimeID)
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('HTTP error! Status: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert('Suất chiếu đã được xóa thành công!');
                    window.location.reload();
                } else {
                    alert(data.message || 'Có lỗi khi xóa suất chiếu.');
                }
            })
            .catch(error => {
                console.error('Có lỗi khi xóa suất chiếu:', error);
                alert('Có lỗi khi xóa suất chiếu!');
            });
    }

    // Khởi chạy
    loadMoviesInTheater();
    loadAllMovies();
    loadRooms();
});
