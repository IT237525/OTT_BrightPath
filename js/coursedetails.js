// Carousel Functionality
let slideIndex = 0;
showSlides();

function showSlides() {
    const slides = document.querySelectorAll('.carousel-images img');
    const dots = document.querySelectorAll('.dot');
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    slides[slideIndex-1].classList.add('active');
    dots[slideIndex-1].classList.add('active');
    setTimeout(showSlides, 3000); // Change image every 3 seconds
}

// Modal Functionality
const modal = document.getElementById('courseModal');
const btn = document.querySelector('.add-course-btn');
const span = document.querySelector('.close');

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
