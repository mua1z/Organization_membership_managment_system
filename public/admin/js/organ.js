// Add these to your existing script.js file

// Organization Management Page Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Add Organization Modal
    const addOrgBtn = document.getElementById('add-organization-btn');
    const addOrgModal = document.getElementById('add-organization-modal');
    const modalClose = document.querySelector('.modal-close');
    const modalCancel = document.querySelector('.modal-cancel');
    
    if (addOrgBtn) {
        addOrgBtn.addEventListener('click', function() {
            addOrgModal.classList.add('show');
        });
    }
    
    if (modalClose) {
        modalClose.addEventListener('click', function() {
            addOrgModal.classList.remove('show');
        });
    }
    
    if (modalCancel) {
        modalCancel.addEventListener('click', function() {
            addOrgModal.classList.remove('show');
        });
    }
    
    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target === addOrgModal) {
            addOrgModal.classList.remove('show');
        }
    });
    
    /*Form submission
    const addOrgForm = document.getElementById('add-organization-form');
    if (addOrgForm) {
        addOrgForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would typically handle the form submission via AJAX
            alert('Organization created successfully!');
            addOrgModal.classList.remove('show');
            addOrgForm.reset();
        });
    }
    */
    // Toggle organization status
    const activateBtns = document.querySelectorAll('.activate-btn');
    const deactivateBtns = document.querySelectorAll('.deactivate-btn');
    
    activateBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const statusBadge = row.querySelector('.badge');
            statusBadge.classList.remove('badge-inactive');
            statusBadge.classList.add('badge-active');
            statusBadge.textContent = 'Active';
            
            // In a real app, you would make an AJAX call here to update the status
        });
    });
    
    deactivateBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const statusBadge = row.querySelector('.badge');
            statusBadge.classList.remove('badge-active');
            statusBadge.classList.add('badge-inactive');
            statusBadge.textContent = 'Inactive';
            
            // In a real app, you would make an AJAX call here to update the status
        });
    });
    
    // Pagination
    const paginationBtns = document.querySelectorAll('.pagination-btn:not(:disabled)');
    paginationBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            if (this.classList.contains('active')) return;
            
            document.querySelector('.pagination-btn.active').classList.remove('active');
            this.classList.add('active');
            
            // In a real app, you would load the new page data here
        });
    });
    
    // Search functionality
    const searchInput = document.querySelector('.search-box input');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.organizations-table tbody tr');
            
            rows.forEach(row => {
                const orgName = row.querySelector('.org-details h4').textContent.toLowerCase();
                if (orgName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});