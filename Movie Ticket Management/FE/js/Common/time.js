document.addEventListener("DOMContentLoaded", () => {
    const branchContainer = document.getElementById("branchContainer");
    const selectedBranch = document.getElementById("selectedBranch");
    const showtimesContainer = document.getElementById("showtimes");
    const showtimeModal = new bootstrap.Modal(document.getElementById("showtimeModal"));
    let selectedTheaterID = null;
    let selectedDate = null;

    const movieID = 1; // Assuming movieID is 1 for demonstration purposes

    // Fetch and display theaters for the selected movie
    fetch(`../../BE/Common/choose_theatre.php?movieID=${movieID}`)
        .then(response => response.json())
        .then(theaters => {
            console.log('Fetched theaters:', theaters);  // Log fetched theaters data

            if (theaters.error) {
                branchContainer.innerHTML = `<p class="text-danger">${theaters.error}</p>`;
            } else {
                // Check if the theaters array is empty
                if (theaters.length === 0) {
                    branchContainer.innerHTML = "<p class='text-warning'>Không tìm thấy rạp nào!</p>";
                } else {
                    // Create the HTML content for theaters
                    const theatersHTML = theaters.map(theater => {
                        const decodedName = decodeURIComponent(theater.name);
                        const decodedLocation = decodeURIComponent(theater.location);
                        return `
                            <div class="col">
                                <div class="card branch-card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color:white">${decodedName}</h5>
                                        <p class="card-text" style="color:white">${decodedLocation}</p>
                                        <button class="btn btn-primary select-branch-btn" data-id="${theater.theaterID}">Chọn</button>
                                    </div>
                                </div>
                            </div>
                        `;
                    }).join("");  // Join all HTML strings into one large string

                    branchContainer.innerHTML = theatersHTML;  // Inject HTML into the container
                }
            }
        })
        .catch(error => {
            console.error("Error fetching theaters:", error);
            branchContainer.innerHTML = `<p class="text-danger">Unable to load theaters. Please try again later.</p>`;
        });

    // Event: Theater selected
    branchContainer.addEventListener("click", event => {
        if (event.target.classList.contains("select-branch-btn")) {
            selectedTheaterID = event.target.dataset.id;
            selectedBranch.textContent = "Chi Nhánh đã chọn: " + event.target.closest(".card").querySelector(".card-title").textContent;
    
            // Fetch and display available dates, now including theaterID
            fetch(`../../BE/Common/get_available_dates.php?movieID=${movieID}&theaterID=${selectedTheaterID}`)
                .then(response => response.json())
                .then(dates => {
                    if (dates.error) {
                        showtimesContainer.innerHTML = `<p class="text-danger">${dates.error}</p>`;
                    } else {
                        // Sort the dates in increasing order
                        const sortedDates = dates.sort((a, b) => new Date(a) - new Date(b));
    
                        const datesHTML = sortedDates.map(date => {
                            const formattedDate = formatDate(date);  // Format the date as DD/MM
                            return `
                                <button class="btn btn-outline-primary m-2 date-btn">${formattedDate}</button>
                            `;
                        }).join("");
                        showtimesContainer.innerHTML = datesHTML;
    
                        // Enable modal
                        showtimeModal.show();
                    }
                })
                .catch(error => {
                    console.error("Error fetching available dates:", error);
                    showtimesContainer.innerHTML = `<p class="text-danger">Unable to load available dates. Please try again later.</p>`;
                });
        }
    });

    // Event: Date selected
    showtimesContainer.addEventListener("click", event => {
        if (event.target.classList.contains("date-btn")) {
            selectedDate = event.target.textContent.trim();  // Trim to remove any extra spaces
            console.log("Selected date:", selectedDate);
    
            // Check if selectedDate is a valid date
            const dateParts = selectedDate.split('/');
            if (dateParts.length === 2) {
                const day = dateParts[0];
                const month = dateParts[1];
                const year = new Date().getFullYear();  // Current year
    
                // Format the date to YYYY-MM-DD
                if (month === '01' && day < 12) {
                    selectedDate = `${year + 1}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`; // Correct year calculation
                } else {
                    selectedDate = `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;  // Standard year formatting
                }

                console.log("Formatted date for backend:", selectedDate);
                
                // Fetch and display available showtimes for the selected date
                fetchShowtimesForSelectedDate(selectedDate);
            } else {
                console.error("Invalid date format:", selectedDate);
            }
        }
    });

    // Function to format date as DD/MM
    function formatDate(date) {
        const dateObj = new Date(date);
        const day = String(dateObj.getDate()).padStart(2, '0');
        const month = String(dateObj.getMonth() + 1).padStart(2, '0');  // Month is 0-indexed
        return `${day}/${month}`;
    }

    // Fetch and display showtimes for the selected date
    function fetchShowtimesForSelectedDate(date) {
        console.log(`Fetching showtimes for: movieID=${movieID}, theaterID=${selectedTheaterID}, selectedDate=${selectedDate}`);
    
        fetch(`../../BE/Common/get_showtimes.php?movieID=${movieID}&theaterID=${selectedTheaterID}&selectedDate=${selectedDate}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(showtimes => {
                console.log('Fetched showtimes:', showtimes);
    
                if (showtimes.error) {
                    showtimesContainer.innerHTML = `<p class="text-danger">${showtimes.error}</p>`;
                } else if (showtimes.length === 0) {
                    showtimesContainer.innerHTML = `<p class="text-warning">No showtimes available for this date.</p>`;
                } else {
                    const sortedShowtimes = showtimes.sort((a, b) => new Date(a.startTime) - new Date(b.startTime));
                    const showtimesHTML = sortedShowtimes.map(showtime => {
                        const formattedTime = new Date(showtime.startTime).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                        const availableSeats = showtime.availableSeats !== null ? showtime.availableSeats : 0;  // Handle null value
                        return `
                            <button class="btn btn-outline-success m-2 showtime-btn" data-showtime-id="${showtime.showtimeID}" data-available-seats="${availableSeats}">
                                ${formattedTime} - ${availableSeats} seats available
                            </button>
                        `;
                    }).join("");
    
                    showtimesContainer.innerHTML = showtimesHTML;
                }
            })
            .catch(error => {
                console.error("Error fetching showtimes:", error);
                showtimesContainer.innerHTML = `<p class="text-danger">Unable to load showtimes. Please try again later.</p>`;
            });
    }

    // Event: Showtime selected
    showtimesContainer.addEventListener("click", event => {
        if (event.target.classList.contains("showtime-btn")) {
            const showtimeID = event.target.dataset.showtimeId;
            const availableSeats = event.target.dataset.availableSeats;

            // Redirect to seat-selection-user.html with parameters
            window.location.href = `seat-selection-user.html?showtimeID=${showtimeID}&theaterID=${selectedTheaterID}&movieID=${movieID}&selectedDate=${selectedDate}&availableSeats=${availableSeats}`;
        }
    });
});
