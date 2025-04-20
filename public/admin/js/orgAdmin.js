// Add these to your existing script.js file

// OrgAdmins Management Page Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Add Admin Modal
    const addAdminBtn = document.getElementById('add-admin-btn');
    const addAdminModal = document.getElementById('add-admin-modal');
    
    if (addAdminBtn) {
        addAdminBtn.addEventListener('click', function() {
            addAdminModal.classList.add('show');
        });
    }
    
    // Reset Password Modal
    const resetPasswordModal = document.getElementById('reset-password-modal');
    const resetBtns = document.querySelectorAll('.reset-btn');
    
    resetBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const adminName = row.querySelector('.user-details h4').textContent;
            const adminEmail = row.querySelector('td:nth-child(2)').textContent;
            
            document.getElementById('reset-admin-name').textContent = adminName;
            document.getElementById('reset-admin-email').textContent = adminEmail;
            resetPasswordModal.classList.add('show');
        });
    });
    
    // Impersonate Modal
    const impersonateModal = document.getElementById('impersonate-modal');
    const impersonateBtns = document.querySelectorAll('.impersonate-btn');
    
    impersonateBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const adminName = row.querySelector('.user-details h4').textContent;
            const adminOrg = row.querySelector('td:nth-child(3)').textContent;
            
            document.getElementById('impersonate-admin-name').textContent = adminName;
            document.getElementById('impersonate-admin-org').textContent = adminOrg;
            impersonateModal.classList.add('show');
        });
    });
    
    // Close all modals
    const modalCloses = document.querySelectorAll('.modal-close, .modal-cancel');
    modalCloses.forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.modal').forEach(modal => {
                modal.classList.remove('show');
            });
        });
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal')) {
            document.querySelectorAll('.modal').forEach(modal => {
                modal.classList.remove('show');
            });
        }
    });
    
    /*Form submissions
    const addAdminForm = document.getElementById('add-admin-form');
    if (addAdminForm) {
        addAdminForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would typically handle the form submission via AJAX
            alert('Admin created successfully!');
            addAdminModal.classList.remove('show');
            addAdminForm.reset();
        });
    }
*/
    
    // Reset password form
    const resetPasswordSubmit = document.querySelector('#reset-password-modal .modal-submit');
    if (resetPasswordSubmit) {
        resetPasswordSubmit.addEventListener('click', function() {
            // Here you would typically handle the password reset via AJAX
            alert('Password reset link sent successfully!');
            resetPasswordModal.classList.remove('show');
        });
    }
    
    // Impersonate form
    const impersonateSubmit = document.querySelector('#impersonate-modal .modal-submit');
    if (impersonateSubmit) {
        impersonateSubmit.addEventListener('click', function() {
            // Here you would typically handle the impersonation via AJAX
            alert('You are now impersonating this admin. You will be redirected to their dashboard.');
            impersonateModal.classList.remove('show');
        });
    }
    
    // Toggle admin status
    const activateBtns = document.querySelectorAll('.activate-btn');
    const deactivateBtns = document.querySelectorAll('.deactivate-btn');
    
    activateBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const statusBadge = row.querySelector('.badge');
            statusBadge.classList.remove('badge-inactive');
            statusBadge.classList.add('badge-active');
            statusBadge.textContent = 'Active';
            
            // Change button to deactivate
            this.innerHTML = '<i class="fas fa-ban"></i>';
            this.title = 'Deactivate';
            this.classList.remove('activate-btn');
            this.classList.add('deactivate-btn');
            
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
            
            // Change button to activate
            this.innerHTML = '<i class="fas fa-check-circle"></i>';
            this.title = 'Activate';
            this.classList.remove('deactivate-btn');
            this.classList.add('activate-btn');
            
            // In a real app, you would make an AJAX call here to update the status
        });
    });
    
    // Filter functionality
    const statusFilter = document.getElementById('status-filter');
    const roleFilter = document.getElementById('role-filter');
    const orgFilter = document.getElementById('org-filter');
    const searchInput = document.querySelector('.search-box input');
    
    function filterAdmins() {
        const statusValue = statusFilter.value;
        const roleValue = roleFilter.value;
        const orgValue = orgFilter.value;
        const searchValue = searchInput.value.toLowerCase();
        
        const rows = document.querySelectorAll('.admins-table tbody tr');
        
        rows.forEach(row => {
            const status = row.querySelector('.badge').textContent.toLowerCase();
            const role = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
            const org = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            const name = row.querySelector('.user-details h4').textContent.toLowerCase();
            const email = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            
            const statusMatch = statusValue === 'all' || 
                              (statusValue === 'active' && status === 'active') || 
                              (statusValue === 'inactive' && status === 'inactive');
            
            const roleMatch = roleValue === 'all' || 
                            (roleValue === 'primary' && role.includes('primary')) || 
                            (roleValue === 'admin' && !role.includes('primary'));
            
            const orgMatch = orgValue === 'all' || org.includes(orgValue);
            
            const searchMatch = searchValue === '' || 
                              name.includes(searchValue) || 
                              email.includes(searchValue);
            
            if (statusMatch && roleMatch && orgMatch && searchMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
    
    statusFilter.addEventListener('change', filterAdmins);
    roleFilter.addEventListener('change', filterAdmins);
    orgFilter.addEventListener('change', filterAdmins);
    searchInput.addEventListener('input', filterAdmins);
    
    // Export functionality
    const exportBtn = document.getElementById('export-admins-btn');
    if (exportBtn) {
        exportBtn.addEventListener('click', function() {
            // In a real app, this would trigger a CSV/Excel export
            alert('Exporting admins data...');
        });
    }
    
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

});