document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const transactionID = urlParams.get('transactionID');

    if (!transactionID) {
        alert('Transaction ID is missing.');
        window.location.href = 'homepage.html'; // Redirect to a safe page if transactionID is missing
        return;
    }

    // Fetch transaction details
    fetch(`../../BE/Customer/get_transaction_res.php?transactionID=${transactionID}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch transaction details. Status: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            // Ensure data structure is valid
            if (!data || !data.showtime || !data.seatsBooked) {
                throw new Error('Incomplete transaction data received.');
            }

            // Populate payment details on the page
            document.getElementById('movieTitle').textContent = data.title || 'Unknown Title';
            document.getElementById('moviePoster').src = data.poster ? `../images/${data.poster}` : '../images/default-poster.png';
            document.getElementById('movieTheater').textContent = `Theater: ${data.showtime.theater || 'Unknown Theater'}`;
            document.getElementById('showtimeRoom').textContent = `Room: ${data.showtime.room || 'Unknown Room'}`;
            document.getElementById('showtimeTime').textContent = `Time: ${data.showtime.startTime || ''} - ${data.showtime.endTime || ''}`;
            document.getElementById('seatList').textContent = `Seats: ${data.seatsBooked.join(', ') || 'None'}`;
            document.getElementById('snackList').textContent = `Snacks: ${data.snack?.join(', ') || 'None'}`;
            document.getElementById('totalAmount').textContent = `Total: ${data.totalAmount || '0'} VND`;
        })
        .catch(err => {
            console.error('Error fetching transaction details:', err.message);
            alert('An error occurred while retrieving transaction details. Please try again.');
        });
    });