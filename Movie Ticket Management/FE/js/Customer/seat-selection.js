document.addEventListener("DOMContentLoaded", function () {
    // Retrieve URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const transactionID = urlParams.get('transactionID');
    const selectedSeats = urlParams.get('selectedSeats');
    const showtimeID = urlParams.get('showtimeID');

    console.log('Transaction ID:', transactionID);
    console.log('Selected Seats:', selectedSeats);

    if (!showtimeID) {
        alert('Invalid showtime ID');
        return;
    }

    // Initialize transaction and load seat data
    initializeTransaction(showtimeID);
    loadSeatData(showtimeID);

    // Event listener for the "Tiếp tục" button
    const continueButton = document.getElementById('confirmButton');
    if (continueButton) {
        continueButton.addEventListener('click', handleContinueClick);
    }

    /** Initialize transaction */
    function initializeTransaction(showtimeID) {
        fetch(`../../BE/Customer/init_transaction.php?showtimeID=${showtimeID}`)
            .then(response => response.json())
            .then(data => {
                if (data.transactionID) {
                    sessionStorage.setItem('transactionID', data.transactionID);
                    console.log('Initialized Transaction ID:', data.transactionID);
                } else {
                    alert('Could not initialize transaction.');
                }
            })
            .catch(error => console.error('Error initializing transaction:', error));
    }
    

    /** Load seat data */
    function loadSeatData(showtimeID) {
        fetch(`../../BE/Customer/seat_selection.php?showtimeID=${showtimeID}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    renderMovieInfo(data);
                    renderSeatLayout(data.seats);
                }
            })
            .catch(error => console.error('Error fetching seat data:', error));
    }

    /** Render movie information */
    function renderMovieInfo(data) {
        const movieInfoDiv = document.getElementById('movieInfo');
        const movieTitle = data.movieTitle || "N/A";
        const startTime = new Date(data.startTime);
        const formattedStartTime = formatDateTime(startTime);

        movieInfoDiv.innerHTML = `
            <h4>Phim: ${movieTitle}</h4>
            <p><strong>Ngày giờ chiếu:</strong> ${formattedStartTime}</p>
        `;
    }

    /** Render seat layout */
    function renderSeatLayout(seats) {
        const seatsContainer = document.getElementById('seatsContainer');
        let seatHTML = '';

        seats.forEach((row, rowIndex) => {
            seatHTML += '<div class="row">';
            row.forEach((seatStatus, colIndex) => {
                const statusClass = getSeatClass(seatStatus);
                seatHTML += `
                    <div class="col-1 seat ${statusClass}" 
                        data-seat-row="${rowIndex}" 
                        data-seat-col="${colIndex}">
                    </div>`;
            });
            seatHTML += '</div>';
        });

        seatsContainer.innerHTML = seatHTML;
        addSeatSelectionListeners();
    }

    /** Get seat status class */
    function getSeatClass(seatStatus) {
        switch (seatStatus) {
            case "0": return 'available'; // Available for selection
            case "1": return 'reserved'; // Selected by another user
            case "-1": return 'unavailable'; // Permanently unavailable
            default: return 'unavailable'; // Fallback for unknown states
        }
    }
    

    /** Add event listeners for seat selection and deselection */
    function addSeatSelectionListeners() {
        document.querySelectorAll('.seat.available').forEach(seat => {
            if (!seat.classList.contains('reserved') && !seat.classList.contains('unavailable')){
            seat.addEventListener('click', function () {
                const row = parseInt(this.getAttribute('data-seat-row'));
                const col = parseInt(this.getAttribute('data-seat-col'));

                // Toggle seat selection
                const isSelected = this.classList.toggle('selected');
                const seatStatus = isSelected ? "1" : "0"; // "1" for selected, "0" for deselected

                // Update the seat status on the server
                updateSeatStatus(row, col, seatStatus);

                // Update the selected seats and price
                updateSelectedSeats();
            });
            }
        });
    }

    /** Update seat status on the server */
    function updateSeatStatus(row, col, status) {
        const showtimeID = sessionStorage.getItem('showtimeID') || urlParams.get('showtimeID');
        console.log('Retrieved showtimeID:', showtimeID);

        if (!showtimeID) {
            alert('Invalid showtime ID.');
            return;
        }


        fetch('../../BE/Customer/update_seat.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                showtimeID,
                row,
                col,
                status
            })
        })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    alert(`Failed to update seat status: ${data.error}`);
                } else {
                    console.log(
                        `Seat [Row ${row + 1}, Col ${col + 1}] updated to ${status === "1" ? "selected" : "available"}`
                    );
                }
            })
            .catch(error => {
                console.error('Error updating seat status:', error);
                alert('Error updating seat status.');
            });
    }



    /** Update selected seats */
    function updateSelectedSeats() {
        const selectedSeats = [];
        document.querySelectorAll('.seat.selected').forEach(seat => {
            const row = seat.getAttribute('data-seat-row');
            const col = seat.getAttribute('data-seat-col');
            selectedSeats.push(`R${parseInt(row) + 1}C${parseInt(col) + 1}`);
        });

        document.getElementById('selectedSeats').innerText = selectedSeats.join(', ') || 'Chưa chọn ghế';
        updatePrice(selectedSeats.length);
        sessionStorage.setItem('selectedSeats', JSON.stringify(selectedSeats));
    }

    /** Update total price */
    function updatePrice(selectedSeatsCount) {
        const pricePerSeat = 100000;
        const totalPrice = selectedSeatsCount * pricePerSeat;

        document.getElementById('totalPrice').innerText = totalPrice + ' VND';
        document.getElementById('confirmButton').disabled = selectedSeatsCount === 0;
    }

    /** Handle "Tiếp tục" button click */
    function handleContinueClick() {
        const selectedSeats = JSON.parse(sessionStorage.getItem('selectedSeats')) || [];
        if (selectedSeats.length === 0) {
            alert('Vui lòng chọn ít nhất một ghế!');
            return;
        }
    
        const transactionID = sessionStorage.getItem('transactionID');
        if (!transactionID) {
            alert('Transaction ID not found.');
            return;
        }
    
        console.log('Sending Transaction ID:', transactionID);
        console.log('Sending Selected Seats:', selectedSeats);
    
        // Calculate the total ticket amount
        const pricePerSeat = 100000; // Assuming the price per seat is constant
        const ticketAmount = selectedSeats.length * pricePerSeat;
    
        // Prepare parameters for the POST request
        const params = new URLSearchParams();
        params.append('transactionID', transactionID);
    
        // Pass selectedSeats as an array, not a string
        selectedSeats.forEach(seat => params.append('seats[]', seat));
    
        // Append ticketAmount to the params
        params.append('ticketAmount', ticketAmount);
    
        // If snacks are selected, append them here (use empty array if none selected)
        const selectedSnacks = [];  // Update this to get actual snack selections
        params.append('snacks', JSON.stringify(selectedSnacks));
    
        fetch('../../BE/Customer/update_transaction.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: params
        })
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    const selectedSeatsParam = encodeURIComponent(selectedSeats.join(','));
                    window.location.href = `snack.html?selectedSeats=${selectedSeatsParam}&transactionID=${transactionID}`;
                } else {
                    alert('Error updating seats: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating seat selection. ' + error.message);
            });

    }
    

    
    

    /** Format date and time */
    function formatDateTime(dateTime) {
        const day = String(dateTime.getDate()).padStart(2, '0');
        const month = String(dateTime.getMonth() + 1).padStart(2, '0');
        const year = dateTime.getFullYear();
        const hours = String(dateTime.getHours()).padStart(2, '0');
        const minutes = String(dateTime.getMinutes()).padStart(2, '0');
        return `${day}/${month}/${year} ${hours}:${minutes}`;
    }
});
