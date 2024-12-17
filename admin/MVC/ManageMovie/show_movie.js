// Fetch the movie data from the PHP API
fetch('show_movie.php')
    .then(response => response.json())
    .then(movies => {
        const movieListElement = document.getElementById('movie-list');
        movieListElement.innerHTML = ''; // Clear existing content

        // Loop through the movies and create a table row for each
        movies.forEach((movie, index) => {
            const row = document.createElement('tr');
            
            // Create table cells
            const sttCell = document.createElement('td');
            sttCell.textContent = index + 1;

            const idCell = document.createElement('td');
            idCell.textContent = movie.movieID;

            const titleCell = document.createElement('td');
            titleCell.textContent = movie.title;

            const imageCell = document.createElement('td');
            if (movie.description.image) {
                const img = document.createElement('img');
                // Update image path to be relative to the project root
                img.src = './images/' + movie.description.image;  // Assuming images are in 'images' folder in the root
                img.alt = movie.title;
                img.style.width = '100px';  // Adjust image size
                imageCell.appendChild(img);
            }

            const countryCell = document.createElement('td');
            countryCell.textContent = movie.description.country || 'N/A';

            const languageCell = document.createElement('td');
            languageCell.textContent = movie.description.language || 'N/A';

            const introCell = document.createElement('td');
            introCell.textContent = movie.description.intro || 'N/A';

            const trailerCell = document.createElement('td');
            trailerCell.textContent = movie.trailerURL || 'N/A';

            const durationCell = document.createElement('td');
            durationCell.textContent = movie.duration || 'N/A';

            const genreCell = document.createElement('td');
            genreCell.textContent = movie.genre || 'N/A';

            const releaseDateCell = document.createElement('td');
            releaseDateCell.textContent = movie.releaseDate || 'N/A';

            const actionCell = document.createElement('td');
            actionCell.innerHTML = `<a href="edit_movie.html?movieID=${movie.movieID}">Edit</a>| <a href="delete_movie.html?movieID=${movie.movieID}">Delete</a>`;

            // Append cells to row
            row.appendChild(sttCell);
            row.appendChild(idCell);
            row.appendChild(titleCell);
            row.appendChild(imageCell);
            row.appendChild(countryCell);
            row.appendChild(languageCell);
            row.appendChild(introCell);
            row.appendChild(trailerCell);
            row.appendChild(durationCell);
            row.appendChild(genreCell);
            row.appendChild(releaseDateCell);
            row.appendChild(actionCell);

            // Append row to the table body
            movieListElement.appendChild(row);
        });
    })
    .catch(error => {
        console.error('Error fetching movie data:', error);
    });
