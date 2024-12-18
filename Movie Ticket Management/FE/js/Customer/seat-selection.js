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
            case "0": return 'available';
            case "1": return 'selected';
            case "-1": return 'unavailable';
            default: return 'unavailable';
        }
    }

    /** Add event listeners for seat selection */
    function addSeatSelectionListeners() {
        document.querySelectorAll('.seat.available').forEach(seat => {
            seat.addEventListener('click', function () {
                this.classList.toggle('selected');
                updateSelectedSeats();
            });
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
