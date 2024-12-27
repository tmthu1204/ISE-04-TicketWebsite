const urlParams = new URLSearchParams(window.location.search);
const roomID = urlParams.get('roomID');
const theaterID = urlParams.get('theaterID');

const rowsInput = document.getElementById('rows');
const colsInput = document.getElementById('cols');
const generateBtn = document.getElementById('generate');
const saveBtn = document.getElementById('save');
const layoutDiv = document.getElementById('seatLayout');

let seatLayout = [];

generateBtn.addEventListener('click', function () {
    const rows = parseInt(rowsInput.value);
    const cols = parseInt(colsInput.value);

    seatLayout = Array.from({ length: rows }, () => Array(cols).fill("0"));
    renderLayout();
});

function renderLayout() {
    layoutDiv.innerHTML = '';
    const table = document.createElement('table');
    table.className = 'table table-bordered';
    const tbody = document.createElement('tbody');

    seatLayout.forEach((row, i) => {
        const tr = document.createElement('tr');
        row.forEach((seat, j) => {
            const td = document.createElement('td');
            const button = document.createElement('button');
            button.textContent = `${String.fromCharCode(65 + i)}${j + 1}`;
            button.className = `seat-btn ${seat === "0" ? 'seat-available' : 'seat-unavailable'}`;

            button.addEventListener('click', function () {
                seatLayout[i][j] = seatLayout[i][j] === "0" ? "-1" : "0";
                renderLayout();
            });

            td.appendChild(button);
            tr.appendChild(td);
        });
        tbody.appendChild(tr);
    });

    table.appendChild(tbody);
    layoutDiv.appendChild(table);
}

window.addEventListener('load', function () {
    if (roomID) {
        fetchLayout(roomID);
    }
});

function fetchLayout(roomID) {
    fetch(`../../BE/Admin/get_layout.php?roomID=${roomID}&theaterID=${theaterID}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success' && data.layout) {
                seatLayout = JSON.parse(data.layout);
                rowsInput.value = seatLayout.length;
                colsInput.value = seatLayout[0].length;
                renderLayout();
            }
        })
        .catch((error) => alert('Có lỗi xảy ra khi lấy layout: ' + error));
}

saveBtn.addEventListener('click', function () {
    const layoutData = JSON.stringify(seatLayout);
    if (!roomID) {
        alert('Thiếu roomID');
        return;
    }
    else if(!seatLayout){
        alert('Thiếu seatLayout');
        return;
    }

    fetch('../../BE/Admin/edit_room.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `roomID=${roomID}&theaterID=${theaterID}&seatLayout=${layoutData}`,
    })
    //console.log(`roomID=${roomID}&theaterID=${theaterID}&seatLayout=${layoutData}`);
        .then((response) => response.json())
        .then((data) => {
            if (data.status === 'success') {
                alert('Lưu layout thành công!');    
                window.location.href = `show_rooms.html?theaterID=${theaterID}`;
            } else {
                alert('Lỗi khi lưu layout: ' + data.message);
            }
        })
        .catch((error) => alert('Có lỗi xảy ra: ' + error));
});