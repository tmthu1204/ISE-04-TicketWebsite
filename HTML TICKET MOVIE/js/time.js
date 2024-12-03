document.addEventListener('DOMContentLoaded', function () {
    const branchCards = document.querySelectorAll('.branch-card');
    const countElement = document.getElementById('count');
    const confirmBtn = document.getElementById('confirmBtn');
    const showtimeModal = new bootstrap.Modal(document.getElementById('showtimeModal'));
    const selectedBranchElement = document.getElementById('selectedBranch');
    const showtimesContainer = document.getElementById('showtimes');
    const confirmShowtimeBtn = document.getElementById('confirmShowtime');
    let selectedBranches = 0;
    let selectedShowtime = null;

    branchCards.forEach(card => {
        card.addEventListener('click', function () {
            if (this.classList.contains('selected')) {
                // Unselect the branch
                this.classList.remove('selected');
                selectedBranches = 0;
            } else {
                // Select the new branch and unselect others
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

            // Thêm dòng chữ "Chọn khung giờ" ở đầu modal
            const instruction = document.createElement('p');
            instruction.textContent = "Chọn khung giờ:";
            instruction.style.fontWeight = 'bold'; // Kiểu chữ đậm
            instruction.style.color = 'black'; // Màu chữ đen
            instruction.style.marginBottom = '10px'; // Thêm khoảng cách dưới nếu cần

            // Generate random showtimes (replace with actual data in a real application)
            const showtimes = generateRandomShowtimes();
            showtimesContainer.innerHTML = ''; // Xóa nội dung cũ

            // Đặt dòng chữ phía trên danh sách khung giờ
            showtimesContainer.parentElement.insertBefore(instruction, showtimesContainer);

            showtimes.forEach(time => {
                const button = document.createElement('button');
                button.className = 'btn showtime-btn';
                button.textContent = time;

                button.addEventListener('click', function () {
                    // Loại bỏ hiệu ứng đã chọn khỏi tất cả các nút
                    document.querySelectorAll('.showtime-btn').forEach(btn => btn.classList.remove('selected'));

                    // Áp dụng hiệu ứng cho nút được chọn
                    this.classList.add('selected');

                    // Ghi lại giờ chiếu đã chọn
                    selectedShowtime = time;

                    // Bật nút "Xác nhận"
                    confirmShowtimeBtn.disabled = false;
                });

                showtimesContainer.appendChild(button);
            });

            showtimeModal.show();
        }
    });

    confirmShowtimeBtn.addEventListener('click', function() {
        if (selectedShowtime) {
            const selectedBranch = document.querySelector('.branch-card.selected .card-title').textContent;
            // Redirect to seat selection page with branch and showtime information
            window.location.href = `seat-selection.html?branch=${encodeURIComponent(selectedBranch)}&showtime=${encodeURIComponent(selectedShowtime)}`;
        }
    });

    confirmShowtimeBtn.addEventListener('click', function () {
        if (selectedShowtime) {
            const selectedBranch = document.querySelector('.branch-card.selected .card-title').textContent;
            alert(`Bạn đã chọn chi nhánh: ${selectedBranch}\nGiờ chiếu: ${selectedShowtime}`);
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
});