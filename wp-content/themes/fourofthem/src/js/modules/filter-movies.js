document.addEventListener('DOMContentLoaded', async () => {
  // Get the genre filter
  const genreFilter = document.getElementById('genre-filter');

  // If the genre filter doesn't exist, exit
  if (! genreFilter) return;

  // Get the current genre
  const urlParams    = new URLSearchParams(window.location.search);
  const currentGenre = urlParams.get('genre');

  // If the current genre is set, set the genre filter to the current genre
  if (currentGenre) {
    genreFilter.value = currentGenre;
  }

  // Add event listener to the genre filter
  genreFilter.addEventListener('change', async (event) => {
    // Getting loader, genre and movie list
    const loader    = document.querySelector('.loader');
    const genre     = event.target.value;
    const movieList = document.querySelector('#movie-list .item-listing');

    try {
      // Show the loader
      loader.classList.add('active');

      // Empty the movie list
      movieList.innerHTML = '';

      // If the genre is empty, reload the page to show all movies, or get the data
      if (genre === '') {
        // Reset the filter and reload the page
        const url = new URL(window.location.href);

        // Remove the genre parameter
        url.searchParams.delete('genre');

        // Update the URL
        history.replaceState(null, null, url.href);

        // Trigger a page reload
        window.location = url.href;
      } else {
        // Update the URL with the new genre
        const newUrl = `${window.location.pathname}?genre=${genre}`;

        // Update the URL in the browser's address bar
        history.pushState(null, null, newUrl);

        // Get the data from the API
        const response = await fetch(`/wp-json/wp/v2/movies/genre/${genre}`);
        const data     = await response.json();

        // Loop through the movies
        data.forEach((movie) => {
          // Create the movie item structure ( based on the template )
          const movieItem = `
            <article class="${movie.classes}">
              <a class="card__link" href="${movie.url}">
                <div class="card__img-wrap">
                  ${movie.image}
                </div>
                <div class="card__content">
                  <h3 class="card__title">${movie.title}</h3>
                  <div class="card__description">
                    <p>${movie.excerpt}</p>
                  </div>
                </div>
              </a>
            </article>
          `;

          // Add the movie item to the movie list
          movieList.insertAdjacentHTML('beforeend', movieItem);
        });

        // Show the movie list
        movieList.classList.remove('hidden');

        // Hide the loader
        loader.classList.remove('active');
      }
    } catch (error) {
      // Log the error
      console.error(error);
    }
  });
});
