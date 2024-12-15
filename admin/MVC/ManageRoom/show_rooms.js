// show_rooms.js

const urlParams = new URLSearchParams(window.location.search);
const theaterID = urlParams.get('theaterID');

// Lấy danh sách phòng của rạp từ API
fetch(`show_rooms.php?theaterID=${theaterID}`)
    .then(response => response.json())
    .then(rooms => {
            const roomListDiv = document.getElementById('room-list');
            rooms.forEach(room => {
                const roomDiv = document.createElement('div');
                roomDiv.textContent = `Phòng: ${room.roomID}`;
                const roomLink = document.createElement('a');
                roomLink.href = `edit_room.html?roomID=${room.roomID}`;
                roomLink.textContent = ' Chỉnh sửa layout';
                roomDiv.appendChild(roomLink);
                roomListDiv.appendChild(roomDiv);
            });

        })
    .catch(error => alert('Có lỗi khi tải danh sách phòng: ' + error));

document.getElementById('add-room').addEventListener('click', function() {
    // Thêm phòng mới
    const roomName = prompt("Nhập tên phòng:");
    if (roomName) {
        fetch('add_room.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `theaterID=${theaterID}&roomName=${roomName}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                window.location.reload();  // Tải lại trang để cập nhật danh sách phòng
            } else {
                alert('Không thể thêm phòng.');
            }
        })
        .catch(error => alert('Có lỗi khi thêm phòng: ' + error));
    }
});
