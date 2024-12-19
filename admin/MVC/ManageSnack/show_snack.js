// Fetch the snack data from the PHP API
fetch('show_snack.php')
    .then(response => response.json())
    .then(snacks => {
        console.log('Response data:', snacks); // Kiểm tra dữ liệu phản hồi
        const snackListElement = document.getElementById('snack-list');
        snackListElement.innerHTML = ''; // Clear existing content

        // Loop through the snacks and create a table row for each
        snacks.forEach((snack, index) => {
            const row = document.createElement('tr');
            
            // Create table cells
            const sttCell = document.createElement('td');
            sttCell.textContent = index + 1;
            
            const nameCell = document.createElement('td');
            nameCell.textContent = snack.name;

            const priceCell = document.createElement('td');
            priceCell.textContent = snack.price + ' VND';

            const actionCell = document.createElement('td');
            actionCell.innerHTML = `
                <a href="edit_snack.html?snackID=${snack.snackID}">Edit</a> | 
                <button class="delete-button" data-snackID="${snack.snackID}">Delete</button>
            `;

            // Append cells to row
            row.appendChild(sttCell);
            row.appendChild(nameCell);
            row.appendChild(priceCell);
            row.appendChild(actionCell);

            // Append row to the table body
            snackListElement.appendChild(row);
        });

        // Add event listeners to delete buttons
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const snackID = this.getAttribute('data-snackID');
                if (confirm(`Are you sure you want to delete snack ID ${snackID}?`)) {
                    fetch('delete_snack.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'snackID=' + encodeURIComponent(snackID)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            window.location.reload(); // Reload the page to update the snack list
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
        console.error('Error fetching snack data:', error);
    });
