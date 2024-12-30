document.addEventListener("DOMContentLoaded", function () {
    // Retrieve URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const showtimeID = urlParams.get('showtimeID');

    if (!showtimeID) {
        alert('Invalid showtime ID');
        return;
    }

    // Save showtimeID in sessionStorage
    sessionStorage.setItem('showtimeID', showtimeID);

    // Load seat data
    loadSeatData(showtimeID);

    // Event listener for the "Tiếp tục" button
    const continueButton = document.getElementById('confirmButton');
    if (continueButton) {
        continueButton.addEventListener('click', handleContinueClick);
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
            case "1": return 'reserved';
            case "-1": return 'unavailable';
            default: return 'unavailable';
        }
    }

    /** Add event listeners for seat selection and deselection */
    function addSeatSelectionListeners() {
        document.querySelectorAll('.seat.available').forEach(seat => {
            seat.addEventListener('click', function () {
                const row = parseInt(this.getAttribute('data-seat-row'));
                const col = parseInt(this.getAttribute('data-seat-col'));

                // Toggle seat selection
                const isSelected = this.classList.toggle('selected');
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
        sessionStorage.setItem('ticketAmount', totalPrice);
    }

    /** Handle "Tiếp tục" button click */
    function handleContinueClick() {
        const selectedSeats = JSON.parse(sessionStorage.getItem('selectedSeats')) || [];
        if (selectedSeats.length === 0) {
            alert('Vui lòng chọn ít nhất một ghế!');
            return;
        }

        //const customerID = sessionStorage.getItem('customerID');
        const showtimeID = sessionStorage.getItem('showtimeID');
        const ticketAmount = sessionStorage.getItem('ticketAmount');

        //console.log("customerID:", customerID);
        console.log("showtimeID:", showtimeID);
        console.log("selectedSeats:", selectedSeats);

        if (!showtimeID || !ticketAmount) {
            alert('Thông tin không hợp lệ. Vui lòng kiểm tra lại!');
            return;
        }

        console.log('Selected seats:', selectedSeats);
        console.log('Ticket amount:', ticketAmount);

        // Proceed to the snack selection page
        window.location.href = `snack.html`;
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
