document.addEventListener('DOMContentLoaded', function() {
  // Movie data
  const movies = [
      {
          id: 1,
          title: "Inception",
          year: "2010",
          director: "Christopher Nolan",
          plot: "A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.",
          poster: "https://example.com/inception-poster.jpg",
          cast: [
              "Leonardo DiCaprio",
              "Joseph Gordon-Levitt",
              "Ellen Page",
              "Tom Hardy",
              "Ken Watanabe"
          ],
          ratings: [
              { source: "IMDb", value: "8.8/10" },
              { source: "Rotten Tomatoes", value: "87%" },
              { source: "Metacritic", value: "74/100" }
          ]
      },
      {
          id: 2,
          title: "The Matrix",
          year: "1999",
          director: "The Wachowskis",
          plot: "A computer programmer discovers that reality as he knows it is a simulation created by machines to subjugate humanity.",
          poster: "https://example.com/matrix-poster.jpg",
          cast: ["Keanu Reeves", "Laurence Fishburne", "Carrie-Anne Moss", "Hugo Weaving"],
          ratings: [
              { source: "IMDb", value: "8.7/10" },
              { source: "Rotten Tomatoes", value: "88%" }
          ]
      }
  ];

  // Compile Handlebars template for movie details
  const movieDetailsSource = document.getElementById('movie-details-template').innerHTML;
  const movieDetailsTemplate = Handlebars.compile(movieDetailsSource);

  // Event listener for displaying movie details
  document.getElementById('movie-list').addEventListener('click', function(event) {
      if (event.target.closest('.movie-item')) {
          const movieItem = event.target.closest('.movie-item');
          const movieId = movieItem.getAttribute('data-id');
          const selectedMovie = movies.find(movie => movie.id == movieId);

          // Render movie details
          document.getElementById('movie-details').innerHTML = movieDetailsTemplate(selectedMovie);
      }
  });

  console.log('Movie library has been loaded and is interactive.');
});