document.addEventListener('DOMContentLoaded', function() {
    // Tab functionality
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            
            // Update active tab button
            tabBtns.forEach(tabBtn => {
                tabBtn.classList.remove('active');
            });
            this.classList.add('active');
            
            // Show corresponding tab content
            tabContents.forEach(content => {
                content.classList.remove('active');
            });
            document.getElementById(tabId).classList.add('active');
        });
    });
    
    // Create plan modal
    const createPlanModal = document.getElementById('createPlanModal');
    const createPlanBtn = document.getElementById('createPlanBtn');
    
    if (createPlanBtn && createPlanModal) {
        createPlanBtn.addEventListener('click', function() {
            createPlanModal.classList.add('show');
        });
    }
    
    // Manual payment modal
    const manualPaymentModal = document.getElementById('manualPaymentModal');
    const manualPaymentBtn = document.getElementById('manualPaymentBtn');
    
    if (manualPaymentBtn && manualPaymentModal) {
        manualPaymentBtn.addEventListener('click', function(e) {
            e.preventDefault();
            manualPaymentModal.classList.add('show');
        });
    }
    
    // Close modals
    const modalCloseBtns = document.querySelectorAll('.modal-close');
    modalCloseBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.modal').forEach(modal => {
                modal.classList.remove('show');
            });
        });
    });
    
    // Close modal when clicking on backdrop
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('show');
            }
        });
    });
    
    // Form submissions
    /*
    const createPlanForm = document.getElementById('createPlanForm');
    if (createPlanForm) {
        createPlanForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Subscription plan created successfully!');
            createPlanModal.classList.remove('show');
            this.reset();
        });
    }
    
    const manualPaymentForm = document.getElementById('manualPaymentForm');
    if (manualPaymentForm) {
        manualPaymentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Manual payment recorded successfully!');
            manualPaymentModal.classList.remove('show');
            this.reset();
        });
    }*/
    
    // Search functionality
    const planSearch = document.getElementById('planSearch');
    if (planSearch) {
        planSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.plans-table tbody tr');
            
            rows.forEach(row => {
                const planName = row.querySelector('td:first-child').textContent.toLowerCase();
                
                if (planName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});