// Member Management Specific JavaScript

// Toggle dropdown menus
document.addEventListener('DOMContentLoaded', function() {
    // Initialize dropdowns
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
    
    // Select all checkbox functionality
    const selectAll = document.getElementById('selectAll');
    if (selectAll) {
        selectAll.addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.member-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    }
    /*
    // Modal functionality
    const addMemberModal = document.getElementById('addMemberModal');
    const addMemberBtn = document.getElementById('addMemberBtn');
    const modalCloseBtns = document.querySelectorAll('.modal-close');
    
    if (addMemberBtn && addMemberModal) {
        addMemberBtn.addEventListener('click', function() {
            addMemberModal.classList.add('show');
        });
    }
    */
    modalCloseBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.modal').forEach(modal => {
                modal.classList.remove('show');
            });
        });
    });
    
    // Close modal when clicking on backdrop
    addMemberModal.addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.remove('show');
        }
    });
   /* 
    // Form submission
    const addMemberForm = document.getElementById('addMemberForm');
    if (addMemberForm) {
        addMemberForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would normally handle form submission with AJAX
            alert('Member added successfully!');
            addMemberModal.classList.remove('show');
            this.reset();
        });
    }*/
    
    // Search functionality
    const memberSearch = document.getElementById('memberSearch');
    if (memberSearch) {
        memberSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.member-table tbody tr');
            
            rows.forEach(row => {
                const name = row.querySelector('.member-name').textContent.toLowerCase();
                const email = row.querySelector('.member-email').textContent.toLowerCase();
                
                if (name.includes(searchTerm) || email.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
    
    // Export button
    const exportBtn = document.getElementById('exportBtn');
    if (exportBtn) {
        exportBtn.addEventListener('click', function() {
            // In a real app, this would trigger a CSV/Excel export
            alert('Export functionality would be implemented here');
        });
    }
    
    // Import button
    const importBtn = document.getElementById('importBtn');
    if (importBtn) {
        importBtn.addEventListener('click', function() {
            // In a real app, this would open a file dialog for import
            alert('Import functionality would be implemented here');
        });
    }
});