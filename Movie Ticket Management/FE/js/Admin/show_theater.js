// Fetch the theater data from the PHP API
fetch('../../BE/Admin/show_theater.php')
    .then(response => response.json())
    .then(theaters => {
        console.log('Response data:', theaters); // Kiểm tra dữ liệu phản hồi
        const theaterListElement = document.getElementById('theater-list');
        theaterListElement.innerHTML = ''; // Clear existing content

        // Loop through the theaters and create a table row for each
        theaters.forEach((theater, index) => {
            const row = document.createElement('tr');

            // Create table cells
            const sttCell = document.createElement('td');
            sttCell.textContent = index + 1;

            const nameCell = document.createElement('td');
            nameCell.textContent = theater.name;

            const locationCell = document.createElement('td');
            locationCell.textContent = theater.location;

            const numberOfRoomsCell = document.createElement('td');
            numberOfRoomsCell.textContent = theater.numberOfRooms;

            const actionCell = document.createElement('td');
            actionCell.innerHTML = `
            <a href="edit_theater.html?theaterID=${theater.theaterID}" title="Edit">
            <i class="fa-solid fa-pencil"></i>
            </a> | 
            <button class="delete-button" data-theaterID="${theater.theaterID}" title="Delete" style="background: none; border: none; cursor: pointer;">
            <i class="fa-solid fa-trash"></i>
            </button>
            `;  


            // Append cells to row
            row.appendChild(sttCell);
            row.appendChild(nameCell);
            row.appendChild(locationCell);
            row.appendChild(actionCell);

            // Append row to the table body
            theaterListElement.appendChild(row);
        });
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.style.color = 'red'; 
            button.addEventListener('click', function () {
                const theaterID = this.getAttribute('data-theaterID');
                if (confirm(`Are you sure you want to delete theater ID ${theaterID}?`)) {
                    fetch('../../BE/Admin/delete_theater.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'theaterID=' + encodeURIComponent(theaterID)
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                window.location.reload(); // Reload the page to update the theater list
                            } else {
                                alert('Error: ' + data.message);
                            }
                        })
                        .catch(error => {
                            alert('An error occurred: ' + error);
                        });
                }
            });
        });
    })
    .catch(error => {
        console.error('Error fetching theater data:', error);
    });
