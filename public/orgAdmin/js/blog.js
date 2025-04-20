document.addEventListener('DOMContentLoaded', function() {
    // Create post modal
    const createPostModal = document.getElementById('createPostModal');
    const createPostBtn = document.getElementById('createPostBtn');
    const modalCloseBtns = document.querySelectorAll('.modal-close');
    
    if (createPostBtn && createPostModal) {
        createPostBtn.addEventListener('click', function() {
            createPostModal.classList.add('show');
        });
    }
    
    modalCloseBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.modal').forEach(modal => {
                modal.classList.remove('show');
            });
        });
    });
    
    // Close modal when clicking on backdrop
    if (createPostModal) {
        createPostModal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('show');
            }
        });
    }
    
    /*Form submission
    const createPostForm = document.getElementById('createPostForm');
    if (createPostForm) {
        createPostForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Post created successfully!');
            createPostModal.classList.remove('show');
            this.reset();
        });
    }*/
    
    // Search functionality
    const postSearch = document.getElementById('postSearch');
    if (postSearch) {
        postSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const cards = document.querySelectorAll('.post-card');
            
            cards.forEach(card => {
                const title = card.querySelector('.post-title').textContent.toLowerCase();
                const excerpt = card.querySelector('.post-excerpt').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
    
    // Filter functionality
    const statusFilter = document.getElementById('statusFilter');
    const categoryFilter = document.getElementById('categoryFilter');
    
    function filterPosts() {
        const statusValue = statusFilter.value;
        const categoryValue = categoryFilter.value;
        const cards = document.querySelectorAll('.post-card');
        
        cards.forEach(card => {
            const cardStatus = card.querySelector('.post-status').textContent.toLowerCase();
            const cardCategory = card.querySelector('.post-category').textContent.toLowerCase();
            
            const statusMatch = statusValue === 'all' || cardStatus === statusValue;
            const categoryMatch = categoryValue === 'all' || cardCategory === categoryValue;
            
            if (statusMatch && categoryMatch) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
    
    if (statusFilter && categoryFilter) {
        statusFilter.addEventListener('change', filterPosts);
        categoryFilter.addEventListener('change', filterPosts);
    }
    
    // Post action dropdowns
    const postActionBtns = document.querySelectorAll('.post-actions .btn-icon');
    postActionBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            // In a real app, this would show a dropdown menu with actions
            alert('Post actions would appear here (Edit, Delete, etc.)');
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    // Toggle dropdown menus
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const dropdown = this.closest('.dropdown');
            dropdown.classList.toggle('show');
            
            // Close other open dropdowns
            document.querySelectorAll('.dropdown').forEach(otherDropdown => {
                if (otherDropdown !== dropdown) {
                    otherDropdown.classList.remove('show');
                }
            });
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    });
    
    // View toggle functionality
    const listViewBtn = document.getElementById('listViewBtn');
    const calendarViewBtn = document.getElementById('calendarViewBtn');
    
    if (listViewBtn && calendarViewBtn) {
        listViewBtn.addEventListener('click', function() {
            this.classList.add('active');
            calendarViewBtn.classList.remove('active');
        });
        
        calendarViewBtn.addEventListener('click', function() {
            this.classList.add('active');
            listViewBtn.classList.remove('active');
            alert('Calendar view would be implemented here');
        });
    }
    
    // Modal functionality
    const createEventModal = document.getElementById('createEventModal');
    const createEventBtn = document.getElementById('createEventBtn');
    const modalCloseBtns = document.querySelectorAll('.modal-close');
    
    if (createEventBtn && createEventModal) {
        createEventBtn.addEventListener('click', function() {
            createEventModal.classList.add('show');
        });
    }
    
    modalCloseBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.modal').forEach(modal => {
                modal.classList.remove('show');
            });
        });
    });
    
    // Close modal when clicking on backdrop
    if (createEventModal) {
        createEventModal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('show');
            }
        });
    }
});