document.addEventListener('DOMContentLoaded', function() {
    // Animation for cards when they come into view
    const animateOnScroll = () => {
        const cards = document.querySelectorAll('.card, .stat-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });
    };
    
    // Initialize animations
    animateOnScroll();
    
    // Toggle sidebar on mobile
    const toggleSidebar = () => {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('collapsed');
    };
    
    // Add click event to sidebar toggle if you add a toggle button
    // document.querySelector('.sidebar-toggle').addEventListener('click', toggleSidebar);
    
    // Simulate loading data
    setTimeout(() => {
        // This would be replaced with actual API calls in a real application
        console.log('Data loaded');
    }, 1000);
    
    // Handle notification button click
    document.querySelector('.btn-notification').addEventListener('click', function() {
        // In a real app, this would show notifications
        this.querySelector('.notification-badge').textContent = '0';
        this.querySelector('.notification-badge').style.display = 'none';
    });
    
    // Add hover effects to buttons programmatically
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Handle reminder item clicks
    const reminderItems = document.querySelectorAll('.reminder-item');
    reminderItems.forEach(item => {
        item.addEventListener('click', function(e) {
            // Don't trigger if clicking on a button inside
            if (e.target.tagName === 'BUTTON') return;
            
            // In a real app, this would navigate to the relevant section
            console.log('Navigating to:', this.querySelector('h4').textContent);
        });
    });
    
    // Responsive adjustments
    window.addEventListener('resize', function() {
        // Any responsive adjustments can be handled here
    });
});