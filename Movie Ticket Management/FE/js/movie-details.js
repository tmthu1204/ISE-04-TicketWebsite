// Get the movieID from the URL
const urlParams = new URLSearchParams(window.location.search);
const movieID = urlParams.get('movieID');

if (movieID) {
    fetch(`../BE/movie-details.php?movieID=${movieID}`)
        .then(response => response.json())
        .then(data => {
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
                document.getElementById('movie-thumbnail').src = `./images/${description.image}`;

                // Set movie info
                document.getElementById('movie-duration').textContent = `${data.duration} minutes`;
                document.getElementById('movie-genre').textContent = data.genre;
                document.getElementById('movie-release-date').textContent = data.releaseDate;
                document.getElementById('movie-trailer').href = data.trailerURL;
            }
        })
        .catch(error => {
            console.error('Error fetching movie data:', error);
            alert('Error loading movie details');
        });
} else {
    alert('No movieID provided in the URL');
}