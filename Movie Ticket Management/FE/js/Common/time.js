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
                selectedDate = `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;
                console.log("Formatted date:", selectedDate);
                
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

    function formatDateForBackend(date) {
        const dateObj = new Date(date);
        const year = dateObj.getFullYear();
        const month = String(dateObj.getMonth() + 1).padStart(2, '0');  // Month is 0-indexed
        const day = String(dateObj.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Fetch and display showtimes for the selected date
    // Fetch and display showtimes for the selected date
    function fetchShowtimesForSelectedDate(date) {
        const formattedDate = formatDateForBackend(date); // Format date for backend (YYYY-MM-DD)

        // Log the request URL to verify if it's correct
        console.log(`Fetching showtimes for: movieID=${movieID}, theaterID=${selectedTheaterID}, selectedDate=${formattedDate}`);

        // Fetch showtimes based on movieID, theaterID, and selected date
        fetch(`../../BE/Common/get_showtimes.php?movieID=${movieID}&theaterID=${selectedTheaterID}&selectedDate=${formattedDate}`)
            .then(response => response.json())
            .then(showtimes => {
                // Log the showtimes to see what is being returned
                console.log('Fetched showtimes:', showtimes);
                
                if (showtimes.error) {
                    showtimesContainer.innerHTML = `<p class="text-danger">${showtimes.error}</p>`;
                } else {
                    // Check if showtimes is an empty array
                    if (showtimes.length === 0) {
                        showtimesContainer.innerHTML = `<p class="text-warning">No showtimes available for this date.</p>`;
                    } else {
                        // Sort the showtimes in increasing order
                        const sortedShowtimes = showtimes.sort((a, b) => {
                            const timeA = new Date(a.startTime);
                            const timeB = new Date(b.startTime);
                            return timeA - timeB;
                        });

                        // Generate showtime buttons for each available showtime
                        const showtimesHTML = sortedShowtimes.map(showtime => {
                            const formattedTime = new Date(showtime.startTime).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });  // Format time to "HH:mm"
                            const availableSeats = showtime.availableSeats;
                            return `
                                <button class="btn btn-outline-success m-2 showtime-btn" data-showtime-id="${showtime.showtimeID}" data-available-seats="${availableSeats}">
                                    ${formattedTime} - ${availableSeats} seats available
                                </button>
                            `;
                        }).join("");  // Join all the showtime buttons into one string

                        // Inject showtimes into the container
                        showtimesContainer.innerHTML = showtimesHTML;
                    }
                }
            })
            .catch(error => {
                console.error("Error fetching showtimes:", error);
                showtimesContainer.innerHTML = `<p class="text-danger">Unable to load showtimes. Please try again later.</p>`;
            });
        }

    // Event: Showtime selected
    showtimesContainer.addEventListener("click", async event => {
        if (event.target.classList.contains("showtime-btn")) {
            // Check if user is logged in
            const loginStatus = await isUserLoggedIn();
            
            if (loginStatus.loggedIn) {
                // If user is logged in, proceed to seat-selection-user.html
                window.location.href = `../Customer/seat-selection-user.html?showtimeID=${event.target.dataset.showtimeId}`;
            } else {
                // If user is not logged in, alert and redirect to login page
                alert("Bạn cần đăng nhập trước khi chọn ghế!");
                window.location.href = "../../FE/Common/login.html";
            }
        }
    });
});
