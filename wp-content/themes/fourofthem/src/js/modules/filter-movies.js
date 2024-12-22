document.addEventListener('DOMContentLoaded', () => {
  const genreFilter = document.getElementById('genre-filter');

  if (genreFilter) {
    const urlParams = new URLSearchParams(window.location.search);
    const currentGenre = urlParams.get('genre');

    if (currentGenre) {
      genreFilter.value = currentGenre;
    }

    genreFilter.addEventListener('change', (event) => {
      const loader = document.querySelector('.loader');
      const genre = event.target.value;
      const movieList = document.querySelector('#movie-list .item-listing');

      // Show the loader
      loader.classList.add('active');

      // Empty the movie list
      movieList.innerHTML = '';

      if (genre === '') {
        // Reset the filter and reload the page
        const url = new URL(window.location.href);
        url.searchParams.delete('genre');
        history.pushState(null, null, url.href);
        location.reload();
      } else {
        // Update the URL with the new genre
        const newUrl = `${window.location.pathname}?genre=${genre}`;
        history.pushState(null, null, newUrl);

        fetch(`/wp-json/wp/v2/movies/genre/${genre}`)
          .then((response) => response.json())
          .then((data) => {
            data.map((movie) => {
              const movieID = movie.ID;

              getMediaImageByMovieId(movieID).then(featuredMediaId => {
                getFeaturedImage(featuredMediaId).then(imageHtml => {
                  const movieItem = `
                    <article class="card card--movie post-${movie.id} movie type-movie status-${movie.post_status} has-post-thumbnail hentry genre-drama">
                      <a class="card__link" href="${movie.guid}">
                        <div class="card__img-wrap">
                          ${imageHtml}
                        </div>
                        <div class="card__content">
                          <h3 class="card__title">${movie.post_title}</h3>
                          <div class="card__description">
                            <p>${movie.post_excerpt}</p>
                          </div>
                        </div>
                      </a>
                    </article>
                  `;
                  movieList.insertAdjacentHTML('beforeend', movieItem);
                });
              });
            });

            // Show the movie list
            movieList.classList.remove('hidden');

            // Hide the loader
            loader.classList.remove('active');
          });
      }
    });
  }
});

/**
 * Fetches the featured image for a given media ID and returns the HTML
 * string for the image tag.
 * @param {number} mediaID - The ID of the media item.
 * @return {Promise<string>} A promise that resolves to the HTML string of the
 * image tag.
 */
function getFeaturedImage(mediaID) {
  return fetch(`/wp-json/wp/v2/media/${mediaID}`)
    .then(response => response.json())
    .then(media => {
      const imageUrl = media.media_details.sizes['img-3x2-450'].source_url;
      const imageWidth = media.media_details.sizes['img-3x2-450'].width;
      const imageHeight = media.media_details.sizes['img-3x2-450'].height;
      const srcset = media.media_details.sizes['img-3x2-450'].source_url + ' 450w, ' + media.media_details.sizes['img-3x2-1200'].source_url + ' 1200w';
      const sizes = '(max-width: 450px) 100vw, 450px';

      return `<img width="${imageWidth}" height="${imageHeight}" src="${imageUrl}" class="attachment-img-3x2-450 size-img-3x2-450 wp-post-image" alt="" decoding="async" fetchpriority="high" srcset="${srcset}" sizes="${sizes}">`;
    });
}

/**
 * Gets the ID of the featured media image for a given movie ID.
 *
 * @param {number} movieID The ID of the movie.
 * @return {Promise<number>} The ID of the featured media image.
 */
function getMediaImageByMovieId(movieID) {
  return fetch(`/wp-json/wp/v2/movie/${movieID}`)
    .then(response => response.json())
    .then(postData => {
      const featuredMediaId = postData.featured_media;
      return featuredMediaId;
    });
}
