// show_theater.js

// Lấy danh sách rạp từ API
fetch('../ManageTheater/show_theater.php')
    .then(response => response.json())
    .then(theaters => {
        const theaterListDiv = document.getElementById('theater-list');
        theaterListDiv.innerHTML = ''; // Clear existing content

        // Loop through the theaters and create a table row for each
        theaters.forEach((theater) => {
            const theaterLink = document.createElement('a');
            theaterLink.href = `show_rooms.html?theaterID=${theater.theaterID}`;
            theaterLink.textContent = theater.name;
            theaterListDiv.appendChild(theaterLink);
            theaterListDiv.appendChild(document.createElement('br'));
        });
    })
    .catch(error => alert('Có lỗi khi tải danh sách rạp: ' + error));
