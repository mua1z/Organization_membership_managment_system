

const menuToggle = document.getElementById('mobile-menu');
const navList = document.querySelector('.nav-list');
const navLinks = document.querySelectorAll('.nav-list a');

menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('active');
    navList.classList.toggle('active');
    
    // Animate hamburger icon
    const bars = document.querySelectorAll('.menu-toggle .bar');
    if (navList.classList.contains('active')) {
        bars[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
        bars[1].style.opacity = '0';
        bars[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
    } else {
        bars[0].style.transform = 'rotate(0) translate(0)';
        bars[1].style.opacity = '1';
        bars[2].style.transform = 'rotate(0) translate(0)';
    }
});

// Close mobile menu when clicking on a link
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        menuToggle.classList.remove('active');
        navList.classList.remove('active');
        
        // Reset hamburger icon
        const bars = document.querySelectorAll('.menu-toggle .bar');
        bars[0].style.transform = 'rotate(0) translate(0)';
        bars[1].style.opacity = '1';
        bars[2].style.transform = 'rotate(0) translate(0)';
        
        // Smooth scroll to section
        const targetId = link.getAttribute('href');
        if (targetId !== '#') {
            const targetSection = document.querySelector(targetId);
            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        }
    });
});

// Navbar scroll effect
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
    
    // Highlight active section in navbar
    const scrollPosition = window.scrollY + 100;
    
    navLinks.forEach(link => {
        const section = document.querySelector(link.getAttribute('href'));
        if (section) {
            if (
                section.offsetTop <= scrollPosition &&
                section.offsetTop + section.offsetHeight > scrollPosition
            ) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        }
    });
});


// Counter Animation
const counters = document.querySelectorAll('.counter');
const speed = 200;

function animateCounters() {
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText.replace(/[+,]/g, '');
        const increment = target / speed;
        
        if (count < target) {
            counter.innerText = Math.ceil(count + increment).toLocaleString();
            setTimeout(animateCounters, 1);
        } else {
            counter.innerText = target.toLocaleString() + (counter.getAttribute('data-target') === "99" ? '%' : '+');
        }
    });
}

// Initialize counters when they come into view
const statsSection = document.querySelector('.stats');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            observer.unobserve(entry.target);
        }
    });
});

observer.observe(statsSection);

// Testimonial Slider
const testimonialTrack = document.querySelector('.testimonial-track');
const testimonialSlides = document.querySelectorAll('.testimonial-slide');
const dots = document.querySelectorAll('.dot');
const prevBtn = document.querySelector('.slider-prev');
const nextBtn = document.querySelector('.slider-next');

let currentIndex = 0;
let slideWidth = testimonialSlides[0].offsetWidth;
let visibleSlides = getVisibleSlidesCount();

// Set initial positions
updateSlider();

// Handle window resize
window.addEventListener('resize', function() {
    slideWidth = testimonialSlides[0].offsetWidth;
    visibleSlides = getVisibleSlidesCount();
    updateSlider();
});

// Next button click
nextBtn.addEventListener('click', function() {
    if (currentIndex < testimonialSlides.length - visibleSlides) {
        currentIndex++;
        updateSlider();
    }
});

// Previous button click
prevBtn.addEventListener('click', function() {
    if (currentIndex > 0) {
        currentIndex--;
        updateSlider();
    }
});

// Dot navigation
dots.forEach((dot, index) => {
    dot.addEventListener('click', function() {
        currentIndex = index;
        updateSlider();
    });
});

// Update slider position and controls
function updateSlider() {
    const newPosition = -currentIndex * slideWidth;
    testimonialTrack.style.transform = `translateX(${newPosition}px)`;
    
    // Update dots
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentIndex);
    });
    
    // Update button states
    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex >= testimonialSlides.length - visibleSlides;
}

// Get number of visible slides based on screen size
function getVisibleSlidesCount() {
    if (window.innerWidth < 768) return 1;
    if (window.innerWidth < 992) return 2;
    return 3;
}

// Auto-advance (optional)
let autoSlideInterval = setInterval(function() {
    if (currentIndex >= testimonialSlides.length - visibleSlides) {
        currentIndex = 0;
    } else {
        currentIndex++;
    }
    updateSlider();
}, 5000);

// Pause auto-slide on hover
testimonialTrack.addEventListener('mouseenter', function() {
    clearInterval(autoSlideInterval);
});

testimonialTrack.addEventListener('mouseleave', function() {
    autoSlideInterval = setInterval(function() {
        if (currentIndex >= testimonialSlides.length - visibleSlides) {
            currentIndex = 0;
        } else {
            currentIndex++;
        }
        updateSlider();
    }, 5000);
});

// Dynamic Hero Background Images
const heroBg = document.querySelector('.hero-bg');
const heroImages = [
    'https://source.unsplash.com/random/1600x900/?dashboard,management',
    'https://source.unsplash.com/random/1600x900/?organization,software',
    'https://source.unsplash.com/random/1600x900/?membership,app'
];
let currentBgIndex = 0;

function changeHeroBackground() {
    currentBgIndex = (currentBgIndex + 1) % heroImages.length;
    heroBg.style.opacity = 0;
    
    setTimeout(() => {
        heroBg.style.backgroundImage = `url('${heroImages[currentBgIndex]}')`;
        heroBg.style.opacity = 0.1;
    }, 500);
}

// Change background every 8 seconds
setInterval(changeHeroBackground, 8000);



//

// About Section Animations
document.addEventListener('DOMContentLoaded', function() {
    // Animate timeline items on scroll
    const timelineItems = document.querySelectorAll('.timeline-item');
    
    const timelineObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateX(0)';
                }, index * 200);
            }
        });
    }, { threshold: 0.1 });
    
    timelineItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-30px)';
        item.style.transition = 'all 0.5s ease';
        timelineObserver.observe(item);
    });
    
    // Animate team members on scroll
    const teamMembers = document.querySelectorAll('.team-member');
    const valuesCards = document.querySelectorAll('.value-card');
    
    const teamObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 150);
            }
        });
    }, { threshold: 0.1 });
    
    teamMembers.forEach(member => {
        member.style.opacity = '0';
        member.style.transform = 'translateY(30px)';
        member.style.transition = 'all 0.5s ease';
        teamObserver.observe(member);
    });
    
    valuesCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.5s ease';
        teamObserver.observe(card);
    });
    
    // Mission image hover effect
    const missionImage = document.querySelector('.mission-image');
    if (missionImage) {
        missionImage.addEventListener('mouseenter', () => {
            missionImage.querySelector('.mission-img').style.transform = 'scale(1.05)';
        });
        
        missionImage.addEventListener('mouseleave', () => {
            missionImage.querySelector('.mission-img').style.transform = 'scale(1)';
        });
    }
});

