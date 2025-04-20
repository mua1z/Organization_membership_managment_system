// Animate elements when they come into view
const animateOnScroll = function() {
    const elements = document.querySelectorAll('.featured-card, .article-card, .newsletter-content');
    
    elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        
        if (elementPosition < windowHeight - 100) {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }
    });
};

// Set initial state for animated elements
document.querySelectorAll('.featured-card, .article-card, .newsletter-content').forEach(element => {
    element.style.opacity = '0';
    element.style.transform = 'translateY(20px)';
    element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
});

// Run once on load
animateOnScroll();

// Run on scroll
window.addEventListener('scroll', animateOnScroll);

// Newsletter form submission
const newsletterForm = document.querySelector('.newsletter-form');
if (newsletterForm) {
    newsletterForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const emailInput = this.querySelector('input[type="email"]');
        const email = emailInput.value.trim();
        
        if (email) {
            // Here you would typically send the data to your server
            alert('Thank you for subscribing to our newsletter!');
            emailInput.value = '';
        }
    });
}

// Search functionality
const searchBox = document.querySelector('.search-box input');
const searchBtn = document.querySelector('.search-btn');

if (searchBox && searchBtn) {
    searchBtn.addEventListener('click', function() {
        performSearch(searchBox.value);
    });
    
    searchBox.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch(this.value);
        }
    });
}

function performSearch(query) {
    if (query.trim()) {
        alert(`Searching for: ${query}`);
        // In a real implementation, you would filter articles or make an API call
    }
}
