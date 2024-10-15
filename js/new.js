let slideIndex = 0;
const slides = document.getElementById('slides');
const dots = document.querySelectorAll('.dot');

// Function to show the current slide
function showSlide(index) {
    const totalSlides = slides.children.length;
    slideIndex = (index + totalSlides) % totalSlides; // wrap around the slides
    slides.style.transform = `translateX(${-slideIndex * 100}%)`;
    updateDots();
}

// Automatically move to the next slide every 5 seconds
function autoSlide() {
    slideIndex++;
    showSlide(slideIndex);
}

// Update the dots (indicator) to reflect the current slide
function updateDots() {
    dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === slideIndex);
    });
}

// Move to the specific slide when a dot is clicked
function currentSlide(index) {
    showSlide(index);
}

// Set the autoSlide to move every 5 seconds
let slideInterval = setInterval(autoSlide, 5000);

// Stop auto-slide on mouse enter and resume on mouse leave
slides.addEventListener('mouseenter', () => clearInterval(slideInterval));
slides.addEventListener('mouseleave', () => slideInterval = setInterval(autoSlide, 5000));

document.addEventListener('DOMContentLoaded', function () {
    const benefitItems = document.querySelectorAll('.benefit-feature');
    
    window.addEventListener('scroll', function () {
        const scrollPos = window.scrollY;
        benefitItems.forEach((item, index) => {
            if (scrollPos > item.offsetTop - window.innerHeight + 150) {
                item.style.transform = 'translateY(0)';
                item.style.opacity = '1';
            }
        });
    });
});
// JavaScript to control the scrolling of the carousel
const carousel = document.querySelector('.carousel');
let isDown = false;
let startX, scrollLeft;

carousel.addEventListener('mousedown', (e) => {
  isDown = true;
  startX = e.pageX - carousel.offsetLeft;
  scrollLeft = carousel.scrollLeft;
});

carousel.addEventListener('mouseleave', () => {
  isDown = false;
});

carousel.addEventListener('mouseup', () => {
  isDown = false;
});

carousel.addEventListener('mousemove', (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - carousel.offsetLeft;
  const walk = (x - startX) * 2; // Adjust scroll speed
  carousel.scrollLeft = scrollLeft - walk;
});

// Auto-scroll functionality
let scrollSpeed = 1; // You can adjust this for faster/slower scrolling
function autoScroll() {
  carousel.scrollLeft += scrollSpeed;
  
  // If the scroll reaches the end, reset to the start
  if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth) {
    carousel.scrollLeft = 0;
  }
}

setInterval(autoScroll, 20); // 20ms interval for smooth scrolling
