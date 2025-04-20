// Event Management Specific JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // View toggle functionality
    const listViewBtn = document.getElementById('listViewBtn');
    const calendarViewBtn = document.getElementById('calendarViewBtn');
    
    if (listViewBtn && calendarViewBtn) {
        listViewBtn.addEventListener('click', function() {
            this.classList.add('active');
            calendarViewBtn.classList.remove('active');
            // In a real app, this would switch to list view
        });
        
        calendarViewBtn.addEventListener('click', function() {
            this.classList.add('active');
            listViewBtn.classList.remove('active');
            // In a real app, this would switch to calendar view
            alert('Calendar view would be implemented here');
        });
    }
    
    // Create event modal
    const createEventModal = document.getElementById('createEventModal');
    const createEventBtn = document.getElementById('createEventBtn');
    
    if (createEventBtn && createEventModal) {
        createEventBtn.addEventListener('click', function() {
            createEventModal.classList.add('show');
        });
    }
    
    // Form submission
   /* const createEventForm = document.getElementById('createEventForm');
    if (createEventForm) {
        createEventForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would normally handle form submission with AJAX
            alert('Event created successfully!');
            createEventModal.classList.remove('show');
            this.reset();
        });
    }
    */
    // Search functionality
    const eventSearch = document.getElementById('eventSearch');
    if (eventSearch) {
        eventSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.event-table tbody tr');
            
            rows.forEach(row => {
                const title = row.querySelector('.event-title').textContent.toLowerCase();
                const description = row.querySelector('.event-description').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
    
    // Export events
    const exportEventsBtn = document.getElementById('exportEventsBtn');
    if (exportEventsBtn) {
        exportEventsBtn.addEventListener('click', function() {
            // In a real app, this would trigger a CSV/Excel export
            alert('Export functionality would be implemented here');
        });
    }
    
    // Filter events
    const filterDropdownItems = document.querySelectorAll('#filterEventsBtn + .dropdown-menu .dropdown-item');
    filterDropdownItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const status = this.textContent.trim().toLowerCase();
            const rows = document.querySelectorAll('.event-table tbody tr');
            
            if (status === 'clear filters') {
                rows.forEach(row => {
                    row.style.display = '';
                });
                return;
            }
            
            rows.forEach(row => {
                const rowStatus = row.querySelector('.badge').textContent.toLowerCase();
                if (rowStatus.includes(status)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});