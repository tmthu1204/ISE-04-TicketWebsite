document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const movieID = urlParams.get('movieID');

    if (movieID) {
        fetch(`../../BE/Admin/edit_movie.php?movieID=${movieID}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById("title").value = data.title;
                    document.getElementById("trailerURL").value = data.trailerURL;
                    document.getElementById("duration").value = data.duration;
                    document.getElementById("genre").value = data.genre;
                    document.getElementById("releaseDate").value = data.releaseDate;
                    document.getElementById("country").value = data.description.country;
                    document.getElementById("language").value = data.description.language;
                    document.getElementById("intro").value = data.description.intro;
                    document.getElementById("movieID").value = movieID;
                    document.getElementById("posterImage").value = data.description.image || ""; // Đảm bảo input posterImage được điền
                }
            })
            .catch(error => {
                alert('Có lỗi khi tải dữ liệu: ' + error);
            });
    } else {
        alert('Không tìm thấy thông tin phim.');
    }

    const form = document.getElementById("editMovieForm");
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(form);

        // Thêm hình ảnh poster cũ nếu không chọn hình ảnh mới
        if (!formData.has('poster') || formData.get('poster').name === "") {
            const currentPoster = document.getElementById("posterImage").value;
            if (currentPoster) {
                formData.append('poster', currentPoster);  // Thêm poster hiện tại nếu không tải hình ảnh mới
            }
        }

        fetch('../../BE/Admin/edit_movie.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                window.location.href = 'add_movie.html';   
            } else {
                alert('Cập nhật phim thất bại: ' + data.message);
            }
        })
        .catch(error => {
            alert('Có lỗi khi cập nhật phim: ' + error);
        });
    });
});
