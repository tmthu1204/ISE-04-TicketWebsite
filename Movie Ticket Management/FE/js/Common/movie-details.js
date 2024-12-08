// Get the movieID from the URL
const urlParams = new URLSearchParams(window.location.search);
const movieID = urlParams.get('movieID');

// Function to load movie details
async function loadMovieDetails() {
    if (movieID) {
        try {
            const response = await fetch(`../../BE/Common/movie-details.php?movieID=${movieID}`);
            const data = await response.json();

            if (data.error) {
                alert(data.error);
            } else {
                // Set movie title
                document.getElementById('movie-title').textContent = data.title;

                // Set movie description
                const description = data.description;
                document.getElementById('movie-country').textContent = description.country;
                document.getElementById('movie-language').textContent = description.language;
                document.getElementById('movie-description').textContent = description.intro;

                // Set movie thumbnail (image)
                document.getElementById('movie-thumbnail').src = `../images/${description.image}`;

                // Set movie info
                document.getElementById('movie-duration').textContent = `${data.duration} minutes`;
                document.getElementById('movie-genre').textContent = data.genre;
                document.getElementById('movie-release-date').textContent = data.releaseDate;
                document.getElementById('movie-trailer').href = data.trailerURL;

                // Check if the user is logged in
                const loggedIn = await isUserLoggedIn(); // Using the imported function

                // Redirect to the correct page based on login status
                const purchaseButton = document.querySelector('.movie-content-button a');
                if (loggedIn.loggedIn) {
                    // Redirect to choose-theatre-user.html if logged in
                    purchaseButton.href = `../Customer/choose-theatre-user.html?movieID=${movieID}`;
                } else {
                    // Redirect to choose-theatre.html if not logged in
                    purchaseButton.href = `../Common/choose-theatre.html?movieID=${movieID}`;
                }
            }
        } catch (error) {
            console.error('Error fetching movie data:', error);
            alert('Error loading movie details');
        }
    } else {
        alert('No movieID provided in the URL');
    }
}

// Call the function to load movie details
loadMovieDetails();
