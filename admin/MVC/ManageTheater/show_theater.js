// Fetch the theater data from the PHP API
fetch('show_theater.php')
    .then(response => response.json())
    .then(theaters => {
        const theaterListElement = document.getElementById('theater-list');
        theaterListElement.innerHTML = ''; // Clear existing content

        // Loop through the theaters and create a table row for each
        theaters.forEach((theater, index) => {
            const row = document.createElement('tr');
            
            // Create table cells
            const sttCell = document.createElement('td');
            sttCell.textContent = index + 1;

            const idCell = document.createElement('td');
            idCell.textContent = theater.theaterID;

            const nameCell = document.createElement('td');
            nameCell.textContent = theater.name;

            const locationCell = document.createElement('td');
            locationCell.textContent = theater.location;

            const numberOfRoomCell = document.createElement('td');
            numberOfRoomCell.textContent = theater.numberOfRoom;

            // Append cells to row
            row.appendChild(sttCell);
            row.appendChild(idCell);
            row.appendChild(nameCell);
            row.appendChild(locationCell);
            row.appendChild(numberOfRoomCell);

            // Append row to the table body
            theaterListElement.appendChild(row);
        });
    })
    .catch(error => {
        console.error('Error fetching theater data:', error);
    });
