
// scripts.js

// Filter properties based on user input
document.getElementById('filter-form').addEventListener('input', function() {
    const location = document.getElementById('location').value.toLowerCase();
    const price = document.getElementById('price').value;
    const propertyType = document.getElementById('property-type').value;

    const properties = document.querySelectorAll('.property-item');

    properties.forEach(property => {
        const propertyLocation = property.getAttribute('data-location').toLowerCase();
        const propertyPrice = property.getAttribute('data-price');
        const propertyTypeValue = property.getAttribute('data-type');

        if (propertyLocation.includes(location) && 
            propertyPrice <= price && 
            propertyTypeValue === propertyType) {
            property.style.display = 'block'; // Show property
        } else {
            property.style.display = 'none'; // Hide property
        }
    });
});



// Validate login form before submission
document.getElementById('login-form').addEventListener('submit', function(event) {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username === '' || password === '') {
        alert('Please fill in both username and password.');
        event.preventDefault(); // Stop form from submitting
    }
});

// Toggle mobile menu
document.getElementById('menu-toggle').addEventListener('click', function() {
    document.querySelector('nav ul').classList.toggle('show-menu');
});
