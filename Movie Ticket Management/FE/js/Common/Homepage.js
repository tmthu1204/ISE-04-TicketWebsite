function loadMovies() {
    fetch('../../BE/Common/Homepage.php')
        .then(response => response.json())
        .then(data => {
            // Check if the data is properly structured
            console.log(data); // Log full data
            console.log(data.now_showing); // Log now_showing data

            // Now showing movies
            const nowShowingList = document.getElementById('now-showing-list');
            if (data.now_showing && data.now_showing.length > 0) {
                let row = document.createElement('div');
                row.classList.add('row'); // Create a new row for every 4 movies
                let slide = document.createElement('div');
                slide.classList.add('carousel-item'); // Create the first carousel slide
                let isFirstSlide = true; // Flag to mark the first slide

                // Check login status
                isUserLoggedIn().then(({ loggedIn, role }) => {
                    data.now_showing.forEach((movie, index) => {
                        const item = document.createElement('div');
                        item.classList.add('col-lg-3'); // Each item takes up 1/4 of the row

                        // Add active class to the first movie in the first slide
                        if (isFirstSlide && index === 0) {
                            slide.classList.add('active');
                            isFirstSlide = false; // Only add active to the first movie
                        }

                        // Set the link based on login status
                        let movieLink = loggedIn 
                            ? `movie-details-user.html?movieID=${movie.movieID}` 
                            : `movie-details.html?movieID=${movie.movieID}`;

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
                                        <a href="${movieLink}" target="_blank" class="btn btn-danger btn-sm">Xem thêm</a>
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
                });
            } else {
                nowShowingList.innerHTML = '<p>No movies are currently showing.</p>';
            }
        })
        .catch(error => console.error('Error loading movie data:', error));
}

// Load the movies when the page is ready
window.onload = loadMovies;
