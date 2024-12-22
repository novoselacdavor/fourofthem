# Fourofthem Project

The Fourofthem project is a custom WordPress solution that includes several features to manage and display movie-related content.

## Features

* **Custom Post Type and Taxonomies**
	+ Created a custom post type "Movie" with a taxonomy "Genre" assigned to it.
	+ Designed single and archive pages for the "Movie" post type, showcasing title, movie thumbnail, genre, and description.
	+ Styled the single page, archive page, and movie cards for a responsive and visually appealing design.
  + Extra: Added taxonomy.php for "Genre" taxonomy to show "Movies" by taxonomy term
* **Custom Gutenberg Block**
	+ Developed a custom Gutenberg block to display favorite movie quotes, exclusive to the "Movie" post type.
	+ Included fields for quote, movie, and author using Advanced Custom Fields (ACF).
* **Shortcode for Movie List**
	+ Created a shortcode to display a list of movies, allowing filtering by "genre" taxonomy and customizable item count.
* **Slider Section**
	+ Built a responsive slider section using the Swiper.js library.
* **Custom REST API Endpoint**
	+ Developed a custom REST API endpoint to filter movie lists by "genre" taxonomy.
	+ Implemented AJAX functionality to update the movie list on the archive page based on user selection.
	+ Modified the URL to reflect the filtered list when accessing the archive page with genre parameters.

## Technologies Used

* WordPress
* Advanced Custom Fields (ACF)
* Swiper.js library
* REST API
