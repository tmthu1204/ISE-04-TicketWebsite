async function loadMovies() {
    try {
        const response = await fetch('../../BE/Common/movie-tab.php');
        const data = await response.json();

        // Check if the data is properly structured
        console.log(data); // Log full data
        console.log(data.now_showing); // Log now_showing data
        console.log(data.upcoming); // Log upcoming data (check if it's correct)

        // Now showing movies
        const nowShowingList = document.getElementById('now-showing-list');
        if (data.now_showing && data.now_showing.length > 0) {
            let row = document.createElement('div');
            row.classList.add('row'); // Create a new row for every 4 movies
            let slide = document.createElement('div');
            slide.classList.add('carousel-item'); // Create the first carousel slide
            let isFirstSlide = true; // Flag to mark the first slide

            data.now_showing.forEach((movie, index) => {
                const item = document.createElement('div');
                item.classList.add('col-lg-3'); // Each item takes up 1/4 of the row

                // Add active class to the first movie in the first slide
                if (isFirstSlide && index === 0) {
                    slide.classList.add('active');
                    isFirstSlide = false; // Only add active to the first movie
                }

                item.innerHTML = `
                    <div class="card movie-card">
                        <img src="../images/${movie.description.image}" alt="Movie Poster">
                        <div class="movie-details">
                            <p>• ${movie.genre}<br>• ${movie.duration}'<br>• ${movie.description.country || 'N/A'}<br>• ${movie.description.language || 'N/A'}</p>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <h5 class="card-title">${movie.title}</h5>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="#" id="movieDetailLink-${movie.movieID}" class="btn btn-danger btn-sm">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                `;

                row.appendChild(item);

                // After every 4 movies, move to the next slide
                if ((index + 1) % 4 === 0 || index === data.now_showing.length - 1) {
                    slide.appendChild(row);
                    nowShowingList.appendChild(slide);
                    row = document.createElement('div');
                    row.classList.add('row');
                    slide = document.createElement('div');
                    slide.classList.add('carousel-item');
                }
            });

            // Wait for setting the movie detail links
            await setMovieDetailLinks(data.now_showing);
        } else {
            nowShowingList.innerHTML = '<p>No movies are currently showing.</p>';
        }

        // Upcoming movies
        const upcomingList = document.getElementById('upcoming-list');
        if (data.upcoming && data.upcoming.length > 0) {
            let row = document.createElement('div');
            row.classList.add('row'); // Create a new row for every 4 movies
            let slide = document.createElement('div');
            slide.classList.add('carousel-item'); // Create the first carousel slide
            let isFirstSlide = true; // Flag to mark the first slide

            data.upcoming.forEach((movie, index) => {
                const item = document.createElement('div');
                item.classList.add('col-lg-3'); // Each item takes up 1/4 of the row

                // Add active class to the first movie in the first slide
                if (isFirstSlide && index === 0) {
                    slide.classList.add('active');
                    isFirstSlide = false; // Only add active to the first movie
                }

                item.innerHTML = `
                    <div class="card movie-card">
                        <img src="../images/${movie.description.image}" alt="Movie Poster">
                        <div class="movie-details">
                            <p>• ${movie.genre}<br>• ${movie.duration}'<br>• ${movie.description.country || 'N/A'}<br>• ${movie.description.language || 'N/A'}</p>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <h5 class="card-title">${movie.title}</h5>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="#" id="movieDetailLink-${movie.movieID}" class="btn btn-danger btn-sm">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                `;

                row.appendChild(item);

                // After every 4 movies, move to the next slide
                if ((index + 1) % 4 === 0 || index === data.upcoming.length - 1) {
                    slide.appendChild(row);
                    upcomingList.appendChild(slide);
                    row = document.createElement('div');
                    row.classList.add('row');
                    slide = document.createElement('div');
                    slide.classList.add('carousel-item');
                }
            });

            // Wait for setting the movie detail links
            await setMovieDetailLinks(data.upcoming);
        } else {
            upcomingList.innerHTML = '<p>No upcoming movies.</p>';
        }

    } catch (error) {
        console.error('Error loading movie data:', error);
    }
}

async function setMovieDetailLinks(movies) {
    try {
        const { loggedIn, role } = await isUserLoggedIn();
        console.log(`Logged In: ${loggedIn}, Role: ${role}`); // Log the login status and role

        movies.forEach(movie => {
            const movieDetailLink = document.getElementById(`movieDetailLink-${movie.movieID}`);
            console.log(`Setting link for movie ${movie.movieID}`); // Check which movie is being processed

            if (loggedIn && role === "customer") {
                console.log(`Setting link for customer to movie-details-user.html?movieID=${movie.movieID}`); // Debug link
                movieDetailLink.href = `movie-details-user.html?movieID=${movie.movieID}`;
            } else {
                console.log(`Setting link for non-logged-in user to movie-details.html?movieID=${movie.movieID}`); // Debug link
                movieDetailLink.href = `movie-details.html?movieID=${movie.movieID}`;
            }
        });
    } catch (error) {
        console.error('Error setting movie detail links:', error);
    }
}

// Load the movies when the page is ready
window.onload = loadMovies;
