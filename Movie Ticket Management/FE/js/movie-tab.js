function loadMovies() {
    fetch('../BE/movie-tab.php')
        .then(response => response.json())
        .then(data => {
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
                            <img src="./images/${movie.description.image}" alt="Movie Poster">
                            <div class="movie-details">
                                <p>• ${movie.genre}<br>• ${movie.duration}'<br>• ${movie.description.country || 'N/A'}<br>• ${movie.description.language || 'N/A'}</p>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <h5 class="card-title">${movie.title}</h5>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a href="movie-details.html?movieID=${movie.movieID}" target="_blank" class="btn btn-danger btn-sm">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    `;

                    row.appendChild(item);

                    // After every 4 movies, move to the next slide
                    if ((index + 1) % 4 === 0 || index === data.now_showing.length - 1) {
                        slide.appendChild(row);
                        nowShowingList.appendChild(slide); // Add the current slide to the carousel
                        row = document.createElement('div'); // Start a new row for the next set of movies
                        row.classList.add('row');
                        slide = document.createElement('div'); // Create a new slide
                        slide.classList.add('carousel-item');
                    }
                });
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
                            <img src="./images/${movie.description.image}" alt="Movie Poster">
                            <div class="movie-details">
                                <p>• ${movie.genre}<br>• ${movie.duration}'<br>• ${movie.description.country || 'N/A'}<br>• ${movie.description.language || 'N/A'}</p>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <h5 class="card-title">${movie.title}</h5>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a href="movie-details.html?movieID=${movie.movieID}" target="_blank" class="btn btn-danger btn-sm">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    `;

                    row.appendChild(item);

                    // After every 4 movies, move to the next slide
                    if ((index + 1) % 4 === 0 || index === data.upcoming.length - 1) {
                        slide.appendChild(row);
                        upcomingList.appendChild(slide); // Add the current slide to the carousel
                        row = document.createElement('div'); // Start a new row for the next set of movies
                        row.classList.add('row');
                        slide = document.createElement('div'); // Create a new slide
                        slide.classList.add('carousel-item');
                    }
                });
            } else {
                upcomingList.innerHTML = '<p>No upcoming movies.</p>';
            }

        })
        .catch(error => console.error('Error loading movie data:', error));
}

// Load the movies when the page is ready
window.onload = loadMovies;
