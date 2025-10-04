

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS - Event Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/orgAdmin/css/event.css">
    <link rel="stylesheet" href="/orgAdmin/css/styles.css">
    <link rel="stylesheet" href="/orgAdmin/js/styles.css">
    <style>

    </style>
</head>
<body>
    <div class="dashboard-container">
    @include('organAdmin.sidebar nav')

        <!-- Main Content Area -->
        <main class="main-content">
            <header class="main-header">
                <h1>Event Management</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" id="createEventBtn">
                        <i class="fas fa-plus"></i> Create Event
                    </button>
                    <button class="btn btn-notification">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">2</span>
                    </button>

                </div>
                <x-app-layout>



</x-app-layout>
            </header>

            <!-- Page Description -->
            <div class="page-description">
                <p>Create and manage organization events</p>
            </div>

                         {{-- Session Alert / Modal --}}
@if(session('message'))
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" id="sessionModal">
        <div class="bg-black rounded-xl shadow-lg w-90 max-w-md p-6 animate-fadeIn">
            {{-- Header --}}
            <div class="flex items-center mb-4">
                <div class="rounded-full h-12 w-12 flex items-center justify-center mr-3
                            {{ session('alert_type') === 'error' ? 'bg-red-600 text-white' : 'bg-green-600 text-white' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        @if(session('alert_type') === 'error')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                        @endif
                    </svg>
                </div>
                <h3 class="text-xl font-semibold {{ session('alert_type') === 'error' ? 'text-red-600' : 'text-green-600' }}">
                    {{ session('alert_type') === 'error' ? 'Event' : 'success' }}
                </h3>
            </div>

            {{-- Message --}}
            <p class="text-gray-700 mb-6 text-sm {{ session('alert_type') === 'error' ? 'text-red-600' : 'text-green-700' }}">
                {{ session('message') }}
            </p>

            {{-- Button --}}
            <div class="flex justify-end">
                @if(session('alert_type') === 'error')
                    <a href="{{ url('event') }}"
                       class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors font-medium">
                        Ok
                    </a>
                @else
                    <button onclick="document.getElementById('sessionModal').remove()"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors font-medium">
                        OK
                    </button>
                @endif
            </div>
        </div>
    </div>

    {{-- Fade-in animation and auto-close / redirect --}}
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }
    </style>

    <script>
        // Auto-close success modal after 5 seconds
        setTimeout(() => {
            const modal = document.getElementById('sessionModal');
            if(modal && '{{ session('alert_type') }}' === 'success') modal.remove();
        }, 5000);

        // Auto-redirect error modal after 5 seconds
        setTimeout(() => {
            if('{{ session('alert_type') }}' === 'error') {
                window.location.href = "{{ url('event') }}";
            }
        }, 5000);
    </script>
@endif
            <!-- View Toggle -->
            <div class="view-toggle">
                <button class="btn btn-outline active" id="listViewBtn">
                    <i class="fas fa-list"></i> List View
                </button>
                <button class="btn btn-outline" id="calendarViewBtn">
                    <i class="fas fa-calendar"></i> Calendar View
                </button>
            </div>

            <!-- Event Actions Bar -->
            <div class="action-bar">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search events..." id="eventSearch">
                </div>




                <div class="action-buttons">
                    <button class="btn btn-outline" id="exportEventsBtn">
                        <i class="fas fa-file-export"></i> Export
                    </button>
                    <div class="dropdown">
                        <button class="btn btn-outline dropdown-toggle" id="filterEventsBtn">
                            <i class="fas fa-filter"></i> Filter
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item"><i class="fas fa-circle text-success"></i> Upcoming</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-circle text-danger"></i> Completed</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-circle text-warning"></i> Draft</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="fas fa-times"></i> Clear Filters</a>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Event Table -->
            <div class="card">
                <div class="table-responsive">
                    <table class="event-table">
                        <thead>
                            <tr>
                                <th>Event</th>
                                <th>Date & Time</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Attendees</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Event Row 1 -->

                            @foreach ($events as $event)

                            <tr>
                                <td>

                                        <div class="event-info">
                                        <div class="event-title">{{ $event->title }}</div>
                                        <div class="event-description">{{ $event->description }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="event-date">{{ $event->start_date}}<br>
                                    {{  $event->start_time }}</div>
                                </td>
                                <td>{{ $event->location }}</td>
                                <td>
                                    <span class="badge status-upcoming">{{ $event->status }}</span>
                                </td>
                                <td>
                                    <div class="attendees-progress">
                                        <div class="progress-bar" style="width: 50%"></div>
                                        <span>25/50</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-icon dropdown-toggle">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{url('deleteevent', $event->id)}}" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                            <a href="{{url('editevent', $event->id)}}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="dropdown-item"><i class="fas fa-envelope"></i> Send Reminders</a>
                                            <a href="#" class="dropdown-item"><i class="fas fa-users"></i> Manage Attendees</a>
                                            <div class="dropdown-divider"></div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>

                <!-- Table Footer -->
                <div class="table-footer">
                    <div class="table-info">
                        Showing 1 to 6 of 8 events
                    </div>
                    <div class="pagination">
                        <button class="btn btn-outline" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="btn btn-outline active">1</button>
                        <button class="btn btn-outline">2</button>
                        <button class="btn btn-outline">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Create Event Modal -->
            <div class="modal" id="createEventModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-header">
                        <h3>Create New Event</h3>
                        <button class="btn btn-icon modal-close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form id="createEventForm" action="{{url('uploadevent')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="eventTitle">Event Title</label>
                                    <input type="text" id="eventTitle" name="title"  class="form-control"  required>
                                </div>
                                <div class="form-group">
                                    <label for="eventType">Event Type</label>
                                    <select id="eventType" name="type"  class="form-control">
                                        <option value="meeting">Meeting</option>
                                        <option value="workshop">Workshop</option>
                                        <option value="social">Social Event</option>
                                        <option value="fundraiser">Fundraiser</option>
                                        <option value="conference">Conference</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="eventDescription">Description</label>
                                <textarea id="eventDescription" name="description"  class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="eventStartDate">Start Date</label>
                                    <input type="date" id="eventStartDate" name="start_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="eventStartTime">Start Time</label>
                                    <input type="time" id="eventStartTime" name="start_time"  class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="eventEndDate">End Date</label>
                                    <input type="date" id="eventEndDate" name="end_date"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="eventEndTime">End Time</label>
                                    <input type="time" id="eventEndTime" name="end_time"  class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="eventLocation">Location</label>
                                    <input type="text" id="eventLocation" name="location"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="eventOrgan">Oranization Name</label>
                                    <input type="text" id="eventOrgan" name="organ_name"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="eventCapacity">Capacity</label>
                                    <input type="number" id="eventCapacity" name="capacity"  class="form-control" min="0">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="rsvpDeadline">RSVP Deadline</label>
                                    <input type="date" id="rsvpDeadline" name="rsvp_deadline"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="eventStatus">Status</label>
                                    <select id="eventStatus" name="status"  class="form-control">
                                        <option value="draft">Draft</option>
                                        <option value="upcoming">Upcoming</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="eventImage">Event Image</label>
                                <input type="file" id="eventImage" name="file"  class="form-control" >
                            </div>


                            <div class="modal-footer">
                        <button class="btn btn-outline modal-close">Cancel</button>
                        <button class="btn btn-primary" type="submit" form="createEventForm">Create Event</button>
                    </div>

                        </form>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <script>
        // JavaScript will be placed here
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

            // Form submission
            /*const createEventForm = document.getElementById('createEventForm');
            if (createEventForm) {
                createEventForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Event created successfully!');
                    document.getElementById('createEventModal').classList.remove('show');
                    this.reset();
                });
            }*/

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

            // Notification button
            const notificationBtn = document.querySelector('.btn-notification');
            if (notificationBtn) {
                notificationBtn.addEventListener('click', function() {
                    this.querySelector('.notification-badge').style.display = 'none';
                });
            }
        });
    </script>
</body>
</html>
