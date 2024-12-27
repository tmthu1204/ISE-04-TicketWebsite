document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const transactionID = urlParams.get('transactionID');

    if (!transactionID) {
        alert('Transaction ID is missing.');
        window.location.href = 'homepage.html'; // Redirect to a safe page if transactionID is missing
        return;
    }

    // Fetch transaction details
    fetch(`../../BE/Customer/get_transaction_details.php?transactionID=${transactionID}`)
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

    // Add event listeners for payment method forms
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            const paymentMethod = form.querySelector('input[name="momo"]') ? 'momo' : 'ATM';
            const paymentInfo = JSON.stringify({
                method: paymentMethod,
                datetime: new Date().toISOString(),
                status: 1, // Assuming the payment succeeds
            });

            // Update the transaction with payment information
            fetch('../../BE/Customer/update_transaction.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ transactionID, paymentInfo }),
            })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        alert('Payment information updated successfully! Redirecting...');
                        window.open(form.action, '_blank'); // Open the respective payment gateway
                    } else {
                        alert(`Failed to update payment information: ${result.error}`);
                    }
                })
                .catch(error => {
                    console.error('Error updating payment information:', error.message);
                    alert('An error occurred while updating payment information. Please try again.');
                });
        });
    });
});
