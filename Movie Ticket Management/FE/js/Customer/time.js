document.addEventListener('DOMContentLoaded', function () {
    const branchCards = document.querySelectorAll('.branch-card');
    const countElement = document.getElementById('count');
    const confirmBtn = document.getElementById('confirmBtn');
    const showtimeModal = new bootstrap.Modal(document.getElementById('showtimeModal'));
    const selectedBranchElement = document.getElementById('selectedBranch');
    const showtimesContainer = document.getElementById('showtimes');
    const confirmShowtimeBtn = document.getElementById('confirmShowtime');
    const randomDatesContainer = document.createElement('div'); // Container for random dates
    let selectedBranches = 0;
    let selectedDate = null;
    let selectedShowtime = null;

    // Generate random dates for the current month
    function generateRandomDates() {
        const today = new Date();
        const currentYear = today.getFullYear();
        const currentMonth = today.getMonth(); // Months are 0-indexed
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
        const randomDates = new Set();

        while (randomDates.size < 3) { // Generate 10 random dates
            const randomDay = Math.floor(Math.random() * daysInMonth) + 1;
            randomDates.add(randomDay);
        }

        return Array.from(randomDates)
            .map(day => new Date(currentYear, currentMonth, day))
            .sort((a, b) => b - a); // Sort in descending order
    }

    // Display random dates
    function displayRandomDates(dates) {
        randomDatesContainer.innerHTML = '<h6 class="custom-instruction">Vui lòng chọn ngày và giờ để tiếp tục:</h6>';
        dates.forEach(date => {
            const day = date.getDate().toString().padStart(2, '0'); // Lấy ngày
            const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Lấy tháng (0-indexed)
            const formattedDate = `${day}/${month}`; // Định dạng ngày/tháng

            const dateButton = document.createElement('button');
            dateButton.className = 'btn btn-outline m-1 random-date-btn';
            dateButton.textContent = formattedDate; // Hiển thị ngày/tháng
            dateButton.addEventListener('click', function () {
                document.querySelectorAll('.random-date-btn').forEach(btn => btn.classList.remove('selected'));
                this.classList.add('selected');
                selectedDate = date; // Lưu ngày đầy đủ để sử dụng khi xác nhận
                confirmShowtimeBtn.disabled = false;
            });
            randomDatesContainer.appendChild(dateButton);
        });
        showtimesContainer.parentElement.insertBefore(randomDatesContainer, showtimesContainer);
    }

    branchCards.forEach(card => {
        card.addEventListener('click', function () {
            if (this.classList.contains('selected')) {
                this.classList.remove('selected');
                selectedBranches = 0;
            } else {
                branchCards.forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
                selectedBranches = 1;
            }
            countElement.textContent = selectedBranches;
            confirmBtn.disabled = selectedBranches === 0;
        });
    });

    confirmBtn.addEventListener('click', function () {
        const selectedBranch = document.querySelector('.branch-card.selected');
        if (selectedBranch) {
            const branchName = selectedBranch.querySelector('.card-title').textContent;
            selectedBranchElement.textContent = `Chi nhánh: ${branchName}`;

            const randomDates = generateRandomDates();
            displayRandomDates(randomDates);

            const showtimes = generateRandomShowtimes();
            showtimesContainer.innerHTML = '';

            showtimes.forEach(time => {
                const button = document.createElement('button');
                button.className = 'btn showtime-btn';
                button.textContent = time;

                button.addEventListener('click', function () {
                    document.querySelectorAll('.showtime-btn').forEach(btn => btn.classList.remove('selected'));
                    this.classList.add('selected');
                    selectedShowtime = time;
                    confirmShowtimeBtn.disabled = false;
                });

                showtimesContainer.appendChild(button);
            });

            showtimeModal.show();
        }
    });

    confirmShowtimeBtn.addEventListener('click', function () {
        if (selectedShowtime && selectedDate) {
            const selectedBranch = document.querySelector('.branch-card.selected .card-title').textContent;

            // Định dạng ngày cho thông báo
            const day = selectedDate.getDate().toString().padStart(2, '0'); // Lấy ngày
            const month = (selectedDate.getMonth() + 1).toString().padStart(2, '0'); // Lấy tháng
            const formattedDate = `${day}/${month}`; // Định dạng dd/MM

            alert(`Bạn đã chọn chi nhánh: ${selectedBranch}\nNgày: ${formattedDate}\nGiờ chiếu: ${selectedShowtime}`);
            showtimeModal.hide();
        }
    });


    function generateRandomShowtimes() {
        const showtimes = [];
        for (let i = 10; i <= 22; i += 2) {
            showtimes.push(`${i}:00`);
            if (i !== 22) {
                showtimes.push(`${i}:30`);
            }
        }
        return showtimes;
    }

    function generateRandomDates() {
        const today = new Date();
        const currentYear = today.getFullYear();
        const currentMonth = today.getMonth(); // Months are 0-indexed
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
        const randomDates = new Set();

        while (randomDates.size < 5) { // Generate 5 random dates
            const randomDay = Math.floor(Math.random() * daysInMonth) + 1;
            randomDates.add(randomDay);
        }

        return Array.from(randomDates)
            .map(day => new Date(currentYear, currentMonth, day))
            .sort((a, b) => a - b); // Sắp xếp theo thứ tự tăng dần
    }

    confirmShowtimeBtn.addEventListener('click', function () {
        if (selectedShowtime) {
            const selectedBranch = document.querySelector('.branch-card.selected .card-title').textContent;
            // Redirect to seat selection page with branch and showtime information
            window.location.href = `../Customer/seat-selection.html?branch=${encodeURIComponent(selectedBranch)}&showtime=${encodeURIComponent(selectedShowtime)}`;
        }
    });
});
