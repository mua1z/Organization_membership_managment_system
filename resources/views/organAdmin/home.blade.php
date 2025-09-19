
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS - Organization Membership Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/orgAdmin/css/styles.css">
    <link rel="stylesheet" href="/orgAdmin/js/styles.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
       @include('organAdmin.sidebar nav')

        <!-- Main Content Area -->
        <main class="main-content">
            <header class="main-header">
                <h1>Dashboard</h1>
                <div class="header-actions">
                    <button class="btn btn-notification">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    <button class="btn btn-help">
                        <i class="fas fa-question-circle"></i>
                    </button>
                    <x-app-layout>



                    </x-app-layout>
                </div>
            </header>

            <!-- Stats Cards -->
            <section class="stats-section">
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Total Members</h3>
                        <div class="stat-value">{{$members}}</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i> +12 this month
                        </div>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Active Events</h3>
                        <div class="stat-value">{{$events}}</div>
                        <div class="stat-change">
                             upcoming this week
                        </div>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Total blogs</h3>
                        <div class="stat-value">{{$blogs}}</div>
                        <div class="stat-change negative">
                     +12 Blogs
                        </div>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-content">
                        <h3> Total Paid Payments</h3>
                        <div class="stat-value">${{$payments}}</div>
                        <div class="stat-change negative">
                         Total paied this week
                        </div>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                </div>
            </section>

            <!-- Two Column Layout -->
            <div class="two-column-layout">
                <!-- Left Column -->
                <div class="column-left">
                    <!-- Upcoming Events -->
                    <section class="card upcoming-events">
                        <div class="card-header">
                            <h2>Upcoming Events</h2>
                            <button class="btn btn-text">View All</button>
                        </div>
                        <div class="card-body">
                            <p>You have 3 events scheduled this week:</p>

                            <div class="event-item">
                                <div class="event-date">
                                    <div class="event-day">Tomorrow</div>
                                    <div class="event-time">10:00 AM</div>
                                </div>
                                <div class="event-details">
                                    <h4>Annual General Meeting</h4>
                                    <div class="event-actions">
                                        <button class="btn btn-sm btn-outline">Details</button>
                                        <button class="btn btn-sm btn-primary">Confirm Venue</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </section>

                    <!-- Recent Member Activity -->

                </div>

                <!-- Right Column -->
                <div class="column-right">
                    <!-- Reminders -->
                    <section class="card reminders">
                        <div class="card-header">
                            <h2>Reminders</h2>
                            <span class="badge">5</span>
                        </div>
                        <div class="card-body">
                            <p>Items requiring your attention</p>



                            <div class="reminder-item priority-low">
                                <div class="reminder-icon">
                                    <i class="fas fa-blog"></i>
                                </div>
                                <div class="reminder-details">
                                    <h4>Blog Post Review</h4>
                                    <p>Review and publish quarterly update post</p>
                                    <button class="btn btn-sm btn-primary">Review Post</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>

    <script src="/orgAdmin/js/scripts.js"></script>
</body>
</html>
