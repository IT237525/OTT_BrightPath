// Select the favorite button element
const favoriteButton = document.getElementById('favoriteButton');

// Add a click event listener to the button
favoriteButton.addEventListener('click', function() {
    // Toggle the 'active' class on the button to change its appearance
    this.classList.toggle('active');
});