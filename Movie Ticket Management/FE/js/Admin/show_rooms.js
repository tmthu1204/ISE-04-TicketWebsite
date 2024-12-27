const urlParams = new URLSearchParams(window.location.search);
const theaterID = urlParams.get('theaterID');


// Lấy danh sách phòng từ API
fetch(`../../BE/Admin/show_rooms.php?theaterID=${theaterID}`)
    .then(response => response.json())
    .then(rooms => {
        const roomListDiv = document.getElementById('room-list');
        roomListDiv.innerHTML = ''; // Xóa danh sách cũ (nếu có)

        // Hiển thị danh sách phòng
        rooms.forEach((room, index) => {
            // Tạo thẻ hiển thị thông tin phòng
            const roomDiv = document.createElement('div');
            roomDiv.style.display = 'flex';
            roomDiv.style.alignItems = 'center';
            roomDiv.style.marginBottom = '10px';

            // Thông tin phòng (liên kết chỉnh sửa)
            const roomLink = document.createElement('a');
            roomLink.href = `edit_room.html?roomID=${room.roomID}&theaterID=${theaterID}`;
            roomLink.textContent = `Phòng ${index + 1}`;
            roomLink.style.textDecoration = 'none';
            roomLink.style.color = '#FFF';
            roomLink.style.flexGrow = '1';

            // Nút Delete
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Xóa';
            deleteButton.style.marginLeft = '10px';
            deleteButton.style.padding = '5px 10px';
            deleteButton.style.backgroundColor = 'red';
            deleteButton.style.color = 'white';
            deleteButton.style.border = 'none'; 
            deleteButton.style.borderRadius = '10px'; 
            deleteButton.style.cursor = 'pointer';
           

            // Xử lý sự kiện xóa
            deleteButton.addEventListener('click', function () {
                if (confirm(`Bạn có chắc chắn muốn xóa Phòng ${index + 1}?`)) {
                    fetch('../../BE/Admin/delete_room.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `roomID=${encodeURIComponent(room.roomID)}`
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Server Response:', JSON.stringify(data));
                            if (data.status === 'success') {
                                window.location.reload(); // Tải lại trang để cập nhật danh sách phòng
                            } else {
                                alert('Không thể xóa phòng: ' + data.message);
                            }
                        })
                        .catch(error => {
                            alert('Có lỗi khi xóa phòng: ' + error);
                            console.error(error);
                        });
                }
            });

            // Gắn liên kết và nút xóa vào thẻ phòng
            roomDiv.appendChild(roomLink);
            roomDiv.appendChild(deleteButton);
            roomListDiv.appendChild(roomDiv);
        });
    })
    .catch(error => {
        alert('Có lỗi khi tải danh sách phòng: ' + error);
        console.error(error);
    });

// Xử lý khi bấm nút "Thêm phòng mới"
document.getElementById('add-room').addEventListener('click', function () {
    // Gửi yêu cầu thêm phòng mới mà không cần nhập tên
    fetch('../../BE/Admin/add_room.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `theaterID=${encodeURIComponent(theaterID)}`
    })
        .then(response => response.json())
        .then(data => {
            console.log('Server Response:', JSON.stringify(data));
            if (data.status === 'success') {
                alert('Thêm phòng mới thành công!');
                window.location.reload(); // Tải lại trang để cập nhật danh sách phòng
            } else {
                alert('Không thể thêm phòng: ' + data.message);
            }
        })
        .catch(error => {
            alert('Có lỗi khi thêm phòng: ' + error);
            console.error(error);
        });
});
