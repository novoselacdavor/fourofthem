import './main.scss';

class ImageTextSection extends HTMLElement {
  constructor() {
    super();

    // Define an array of blog showcases
    const blogShowcases = [
      {
        image: "img/blog-showcase-one.svg",
        icons: [
          "img/icons/blog-showcase-one-icon.svg"
        ],
        text: "Sparkling Triple Citrus & Mint Mocktail"
      },
      {
        image: "img/blog-showcase-two.svg",
        icons: [
          "img/icons/blog-showcase-two-icon-one.svg",
          "img/icons/blog-showcase-two-icon-two.svg"
        ],
        text: "Sparkling Triple Citrus & Mint Mocktail"
      },
      {
        image: "img/blog-showcase-three.svg",
        icons: [
          "img/icons/blog-showcase-three-icon.svg"
        ],
        text: "Sparkling Triple Citrus & Mint Mocktail"
      }
    ];

    // Generate the HTML using a loop
    const blogShowcaseHTML = blogShowcases.map((showcase) => `
      <div class="blog-showcase__item">
        <a href="#" class="blog-showcase__link">
          <div class="blog-showcase__images mb-2">
            <img src="${showcase.image}" alt="Blog Showcase Image" class="blog-showcase__image">
            ${showcase.icons.map(icon => `<img src="${icon}" alt="Blog Showcase Icon" class="blog-showcase__icon">`).join('')}
          </div>
          <h3 class="blog-showcase__text">${showcase.text}</h3>
        </a>
      </div>
    `).join('');

    // Define entry text
    this.heading = "Our Recipes";
    this.text = "Great on its own or as a mixer. Fun cocktail & mocktail recipes to try.";
    this.btnText = "View all recipes";

    // Set the HTML content of the elements
    this.section = document.createElement('section');
    this.section.classList.add('blog-showcase', 'py-1');
    this.section.innerHTML = `
      <div class="blog-showcase__entry px-1 px-md-1 mb-2 mb-md-2">
        <h1 class="mb-1">${this.heading}</h1>
        <p class="mb-1">${this.text}</p>
        <button>${this.btnText}</button>
      </div>
      <div class="blog-showcase__items px-2 px-md-2">
        ${blogShowcaseHTML}
      </div>
    `;

    // Append the elements
    this.appendChild(this.section);
  }
}

// Register the custom element
customElements.define('blog-showcase', ImageTextSection);
