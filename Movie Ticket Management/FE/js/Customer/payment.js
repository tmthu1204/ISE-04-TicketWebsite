document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const transactionID = urlParams.get('transactionID');

    if (transactionID) {
        fetch(`../../BE/Customer/get_transaction_details.php?transactionID=${transactionID}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Populate the page with transaction data
                    document.getElementById('seatList').textContent = 'Seats: ' + data.seatsBooked;
                    document.getElementById('snackList').textContent = 'Snacks: ' + data.snack;
                    document.getElementById('totalAmount').textContent = 'Total: ' + data.totalAmount + ' VND';
                }
            })
            .catch(err => alert('Error fetching transaction details.'));
    }
});
