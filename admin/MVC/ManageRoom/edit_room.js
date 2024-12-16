const urlParams = new URLSearchParams(window.location.search);
const roomID = urlParams.get('roomID');

const rowsInput = document.getElementById('rows');
const colsInput = document.getElementById('cols');
const generateBtn = document.getElementById('generate');
const saveBtn = document.getElementById('save');
const layoutDiv = document.getElementById('layout');

let seatLayout = []; // Mảng lưu trạng thái ghế

// Hàm tạo mảng 2 chiều
generateBtn.addEventListener('click', function () {
    const rows = parseInt(rowsInput.value);
    const cols = parseInt(colsInput.value);

    seatLayout = Array.from({ length: rows }, () => Array(cols).fill("0")); // Mặc định tất cả ghế là 0
    renderLayout();
});

// Hàm hiển thị layout ghế
function renderLayout() {
    layoutDiv.innerHTML = ''; // Xóa layout cũ
    seatLayout.forEach((row, i) => {
        const rowDiv = document.createElement('div');
        row.forEach((seat, j) => {
            const seatBtn = document.createElement('button');
            seatBtn.textContent = seat;
            seatBtn.className = seat === "0" ? 'available' : 'unavailable'; // Sử dụng chuỗi "0" và "-1"

            // Xử lý khi bấm vào ghế
            seatBtn.addEventListener('click', function () {
                seatLayout[i][j] = seatLayout[i][j] === "0" ? "-1" : "0"; // Đổi trạng thái giữa "0" và "-1"
                renderLayout();
            });

            rowDiv.appendChild(seatBtn);
        });
        layoutDiv.appendChild(rowDiv);
    });
}

// Hàm tải layout từ server khi trang được tải
window.addEventListener('load', function () {
    if (roomID) {
        fetchLayout(roomID);
    }
});

// Fetch seat layout from server
function fetchLayout(roomID) {
    fetch(`get_layout.php?roomID=${roomID}`)
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            if (data.status === 'success' && data.layout) {
                // Nếu có layout, xử lý và hiển thị
                seatLayout = JSON.parse(data.layout); // Assign the seat layout from the server
                const rows = seatLayout.length;
                const cols = seatLayout[0].length;
                rowsInput.value = rows;  // Set the rows input value
                colsInput.value = cols;  // Set the columns input value
                renderLayout(); // Render the layout after data is fetched

            }
        })
        .catch((error) => alert('Có lỗi xảy ra khi lấy layout: ' + error));
}

// Hàm lưu layout vào cơ sở dữ liệu
saveBtn.addEventListener('click', function () {
    const layoutData = JSON.stringify(seatLayout); // Chuyển đổi mảng thành chuỗi JSON
    if (!roomID || !seatLayout) {
        alert('Thiếu roomID hoặc seatLayout');
        return;
    }

    fetch('edit_room.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `roomID=${roomID}&seatLayout=${layoutData}`,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.status === 'success') {
                window.location.href = 'show_rooms.html';   
            } else {
                alert('Lỗi khi lưu layout: ' + data.message);
            }
        })
        .catch((error) => alert('Có lỗi xảy ra: ' + error));
});
