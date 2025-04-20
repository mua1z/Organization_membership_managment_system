// Add these to your existing script.js file

// Members Management Page Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Bulk Actions Modal
    const bulkActionsBtn = document.getElementById('bulk-actions-btn');
    const bulkActionsModal = document.getElementById('bulk-actions-modal');
    const bulkActionSelect = document.getElementById('bulk-action');
    const transferGroup = document.querySelector('.transfer-group');
    const selectedCount = document.getElementById('selected-count');
    const bulkSubmitBtn = document.querySelector('#bulk-actions-modal .modal-submit');
    
    if (bulkActionsBtn) {
        bulkActionsBtn.addEventListener('click', function() {
            const selected = document.querySelectorAll('.member-checkbox:checked').length;
            if (selected === 0) {
                alert('Please select at least one member to perform bulk actions.');
                return;
            }
            selectedCount.textContent = selected;
            bulkActionsModal.classList.add('show');
        });
    }
    
    // Show/hide transfer organization field based on bulk action
    if (bulkActionSelect) {
        bulkActionSelect.addEventListener('change', function() {
            transferGroup.style.display = this.value === 'transfer' ? 'block' : 'none';
            bulkSubmitBtn.disabled = this.value === '';
        });
    }
    
    // Select all checkbox
    const selectAll = document.getElementById('select-all');
    if (selectAll) {
        selectAll.addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.member-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    }
    
    // Transfer Member Modal
    const transferMemberModal = document.getElementById('transfer-member-modal');
    const transferBtns = document.querySelectorAll('.transfer-btn');
    
    transferBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const memberName = row.querySelector('.user-details h4').textContent;
            
            document.getElementById('transfer-member-name').textContent = memberName;
            transferMemberModal.classList.add('show');
        });
    });
    
    // Impersonate Member Modal
    const impersonateModal = document.getElementById('impersonate-modal');
    const impersonateBtns = document.querySelectorAll('.impersonate-btn');
    
    impersonateBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const memberName = row.querySelector('.user-details h4').textContent;
            const memberOrg = row.querySelector('td:nth-child(4)').textContent;
            
            document.getElementById('impersonate-member-name').textContent = memberName;
            document.getElementById('impersonate-member-org').textContent = memberOrg;
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
    
    // Bulk actions form submission
    if (bulkSubmitBtn) {
        bulkSubmitBtn.addEventListener('click', function() {
            const action = bulkActionSelect.value;
            const transferOrg = document.getElementById('transfer-org').value;
            
            if (action === 'transfer' && !transferOrg) {
                alert('Please select an organization to transfer members to.');
                return;
            }
            
            // Here you would typically handle the bulk action via AJAX
            alert(`Bulk action "${action}" applied to ${selectedCount.textContent} members.`);
            bulkActionsModal.classList.remove('show');
        });
    }
    
    // Transfer member form submission
    const transferSubmit = document.querySelector('#transfer-member-modal .modal-submit');
    if (transferSubmit) {
        transferSubmit.addEventListener('click', function() {
            const newOrg = document.getElementById('new-organization').value;
            const notify = document.getElementById('notify-member').checked;
            
            if (!newOrg) {
                alert('Please select an organization to transfer the member to.');
                return;
            }
            
            // Here you would typically handle the transfer via AJAX
            alert(`Member transferred successfully. ${notify ? 'Notification sent.' : ''}`);
            transferMemberModal.classList.remove('show');
        });
    }
    
    // Impersonate member form submission
    const impersonateSubmit = document.querySelector('#impersonate-modal .modal-submit');
    if (impersonateSubmit) {
        impersonateSubmit.addEventListener('click', function() {
            const reason = document.getElementById('impersonate-reason').value;
            
            // Here you would typically handle the impersonation via AJAX
            alert('You are now impersonating this member. You will be redirected to their dashboard.');
            impersonateModal.classList.remove('show');
        });
    }
    
    // Toggle member status
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
    const orgFilter = document.getElementById('organization-filter');
    const statusFilter = document.getElementById('status-filter');
    const dateFilter = document.getElementById('date-filter');
    const searchInput = document.querySelector('.search-box input');
    
    function filterMembers() {
        const orgValue = orgFilter.value;
        const statusValue = statusFilter.value;
        const dateValue = dateFilter.value;
        const searchValue = searchInput.value.toLowerCase();
        
        const rows = document.querySelectorAll('.members-table tbody tr');
        
        rows.forEach(row => {
            const org = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
            const status = row.querySelector('.badge').textContent.toLowerCase();
            const date = row.querySelector('td:nth-child(5)').textContent;
            const name = row.querySelector('.user-details h4').textContent.toLowerCase();
            const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            
            const orgMatch = orgValue === 'all' || org.includes(orgValue);
            const statusMatch = statusValue === 'all' || status === statusValue;
            const dateMatch = dateValue === 'all' || checkDateMatch(date, dateValue);
            const searchMatch = searchValue === '' || 
                              name.includes(searchValue) || 
                              email.includes(searchValue);
            
            if (orgMatch && statusMatch && dateMatch && searchMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
    
    function checkDateMatch(dateString, filterValue) {
        // In a real app, you would implement proper date comparison
        // This is a simplified version for demonstration
        const date = new Date(dateString);
        const now = new Date();
        
        switch(filterValue) {
            case 'today':
                return date.toDateString() === now.toDateString();
            case 'week':
                const weekStart = new Date(now);
                weekStart.setDate(now.getDate() - now.getDay());
                return date >= weekStart;
            case 'month':
                return date.getMonth() === now.getMonth() && 
                       date.getFullYear() === now.getFullYear();
            case 'year':
                return date.getFullYear() === now.getFullYear();
            default:
                return true;
        }
    }
    
    orgFilter.addEventListener('change', filterMembers);
    statusFilter.addEventListener('change', filterMembers);
    dateFilter.addEventListener('change', filterMembers);
    searchInput.addEventListener('input', filterMembers);
    
    // Export functionality
    const exportBtn = document.getElementById('export-members-btn');
    if (exportBtn) {
        exportBtn.addEventListener('click', function() {
            // In a real app, this would trigger a CSV/Excel export
            alert('Exporting members data...');
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