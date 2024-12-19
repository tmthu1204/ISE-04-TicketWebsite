document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const transactionID = urlParams.get('transactionID');

    if (transactionID) {
        fetch(`../../BE/Customer/get_transaction_details.php?transactionID=${transactionID}`)
            .then(response => response.json())
            .then(data => {
                    document.getElementById('movieTitle').textContent = data.title;
                    document.getElementById('moviePoster').src = `../images/${data.poster}`;
                    document.getElementById('movieTheater').textContent = 'Theater: ' + data.showtime.theater;
                    document.getElementById('showtimeRoom').textContent = 'Room: ' + data.showtime.room;
                    document.getElementById('showtimeTime').textContent = `Time: ${data.showtime.startTime} - ${data.showtime.endTime}`;
                    document.getElementById('seatList').textContent = 'Seats: ' + data.seatsBooked;  // Display cleaned-up or joined seats
                    document.getElementById('snackList').textContent = 'Snacks: ' + data.snack.join(', ');
                    document.getElementById('totalAmount').textContent = 'Total: ' + data.totalAmount + ' VND';
                
            })
            .catch(err => alert('Error fetching transaction details: ' + err.message));

    } else {
        alert('Transaction ID is missing.');
    }
});
