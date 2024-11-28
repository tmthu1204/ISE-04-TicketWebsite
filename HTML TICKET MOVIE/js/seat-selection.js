// Check login status
function checkLoginStatus() {
    const userLogin = JSON.parse(localStorage.getItem("userLogin"));
    if (!userLogin || !userLogin.isLoggedIn) {
        alert("Vui lòng đăng nhập để đặt vé");
        window.location.href = "../login.html";
        return false;
    }
    return true;
}

// State management
let selectedSeats = [];
let timeLeft = movieSession.bookingTimeLimit;

function initializeMovieInfo() {
    if (!checkLoginStatus()) return;
    
    const movieInfoElement = document.getElementById('movieInfo');
    if (!movieInfoElement) return;
    movieInfoElement.textContent = `${movieSession.movieTitle} | ${movieSession.theater} | ${movieSession.cinema} | ${movieSession.timeSlot}`;
}

function initializeSeats() {
    const container = document.getElementById('seatsContainer');
    if (!container) return;
    
    container.innerHTML = '';
    
    seatLayout.rows.forEach(row => {
        const rowDiv = document.createElement('div');
        rowDiv.className = 'seat-row';
        
        const rowLabel = document.createElement('div');
        rowLabel.className = 'row-label';
        rowLabel.textContent = row;
        rowDiv.appendChild(rowLabel);

        for (let i = 1; i <= seatLayout.seatsPerRow; i++) {
            const seatId = `${row}${i}`;
            const seat = document.createElement('div');
            
            seat.className = seatLayout.unavailableSeats.includes(seatId) 
                ? 'seat unavailable' 
                : 'seat available';
            
            seat.dataset.seatId = seatId;
            seat.textContent = i;
            
            if (!seatLayout.unavailableSeats.includes(seatId)) {
                seat.addEventListener('click', () => toggleSeat(seatId));
            }
            
            rowDiv.appendChild(seat);
        }
        
        container.appendChild(rowDiv);
    });
}

function toggleSeat(seatId) {
    const seat = document.querySelector(`[data-seat-id="${seatId}"]`);
    if (!seat) return;

    const seatIndex = selectedSeats.indexOf(seatId);
    
    if (seatIndex === -1) {
        selectedSeats.push(seatId);
        seat.classList.remove('available');
        seat.classList.add('selected');
    } else {
        selectedSeats.splice(seatIndex, 1);
        seat.classList.remove('selected');
        seat.classList.add('available');
    }
    
    updateBookingSummary();
}

function updateBookingSummary() {
    const selectedSeatsDiv = document.getElementById('selectedSeats');
    const totalPriceDiv = document.getElementById('totalPrice');
    const confirmButton = document.getElementById('confirmButton');
    
    if (!selectedSeatsDiv || !totalPriceDiv || !confirmButton) return;

    selectedSeatsDiv.innerHTML = selectedSeats.length > 0 
        ? selectedSeats.join(', ')
        : '<em>Chưa chọn ghế</em>';
        
    const totalPrice = selectedSeats.length * movieSession.seatPrice.regular;
    totalPriceDiv.textContent = `${totalPrice.toLocaleString('vi-VN')} VND`;
    
    confirmButton.disabled = selectedSeats.length === 0;
}

function updateTimer() {
    const timerDiv = document.getElementById('timer');
    if (!timerDiv) return;

    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    
    timerDiv.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    
    if (timeLeft === 0) {
        alert('Hết thời gian đặt vé! Vui lòng thử lại.');
        window.location.reload();
    } else {
        timeLeft--;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (!checkLoginStatus()) return;
    
    initializeMovieInfo();
    initializeSeats();
    updateBookingSummary();
    
    const timer = setInterval(updateTimer, 1000);
    
    const confirmButton = document.getElementById('confirmButton');
    if (confirmButton) {
        confirmButton.addEventListener('click', () => {
            if (selectedSeats.length === 0) return;
            
            try {
                localStorage.setItem('selectedSeats', JSON.stringify(selectedSeats));
                // Redirect to snack selection page (to be implemented)
                alert('Đã chọn ghế: ' + selectedSeats.join(', '));
                // window.location.href = '/snack-selection.html';
            } catch (error) {
                console.error('Error saving seats:', error);
                alert('Đã xảy ra lỗi. Vui lòng thử lại.');
            }
        });
    }
});