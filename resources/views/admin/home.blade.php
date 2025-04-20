<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS | Super Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/css/styles.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1 class="logo">OMMS</h1>
                <p class="logo-subtitle">Super Admin Dashboard</p>
            </div>
            <nav class="sidebar-nav">
                <ul>
                <li class="active"><a href="{{url('/home')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="{{url('organ')}}"><i class="fas fa-building"></i> Organizations</a></li>
                    <li><a href="{{url('organadmin')}}"><i class="fas fa-user-shield"></i> OrgAdmins</a></li>
                    <li><a href="{{url('members')}}"><i class="fas fa-users"></i> Members</a></li>
                    <li><a href="{{url('payments')}}"><i class="fas fa-credit-card"></i> Payments</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> System Config</a></li>
             
                </ul>
            </nav>
           
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="main-header">
                <h2>Dashboard</h2>
                <div class="header-actions">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search...">
                    </div>
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    <x-app-layout>



                   </x-app-layout>

                </div>
            </header>

            <div class="content-wrapper">
                <!-- Welcome Section -->
                <section class="welcome-section">
                    <h3>Welcome back, Super Admin</h3>
                    <p>Here's what's happening across the platform.</p>
                </section>

                <!-- Stats Cards -->
                <section class="stats-section">
                  
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-building"></i>
                        </div>

                        <div class="stats-info">
                            <h4>Total Organizations</h4>
                            <p class="stats-number">+{{$organ}}</p>
                            <p class="stats-change positive">+19 from last month</p>
                        </div>
                    </div>


                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="stats-info">
                            <h4>Active OrgAdmins</h4>
                            <p class="stats-number">+{{$organ}}</p>
                            <p class="stats-change positive"></p>
                        </div>
                    </div>


                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-info">
                            <h4>Active Members</h4>
                            <p class="stats-number">+{{$members}}</p>
                            <p class="stats-change positive"> </p>
                        </div>
                    </div>
                    

                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stats-info">
                            <h4>Monthly Revenue</h4>
                            <p class="stats-number">${{$payments}}</p>
                            <p class="stats-change positive">+11.6% from last month</p>
                        </div>
                    </div>
                </section>

                <!-- Financial Metrics -->
                <section class="metrics-section">
                    <div class="section-header">
                        <h3>Financial Metrics</h3>
                        <p>Platform-wide revenue and expenses over time</p>
                    </div>
                    <div class="metrics-content">
                        <div class="metrics-summary">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Total Revenue</th>
                                        <th>Total Expenses</th>
                                        <th>Profit Margin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>${{$payments}}</td>
                                        <td>${{$payments}}</td>
                                        <td>34.3%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="metrics-chart">
                            <canvas id="financialChart"></canvas>
                        </div>
                    </div>
                </section>

                <!-- System Health -->
                <section class="system-section">
                    <div class="section-header">
                        <h3>System Health</h3>
                        <p>Current system performance metrics</p>
                    </div>
                    <div class="system-content">
                        <div class="system-metric">
                            <h4>CPU Usage</h4>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 63%"></div>
                            </div>
                            <span>63%</span>
                        </div>
                        <div class="system-metric">
                            <h4>Memory Usage</h4>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 59%"></div>
                            </div>
                            <span>59%</span>
                        </div>
                        <div class="system-metric">
                            <h4>Disk Space</h4>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 20%"></div>
                            </div>
                            <span>20%</span>
                        </div>
                        <div class="system-metric">
                            <h4>Network Load</h4>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 23%"></div>
                            </div>
                            <span>23%</span>
                        </div>
                        <div class="system-metric">
                            <h4>System Uptime</h4>
                            <p class="uptime">19 days, 18 hours</p>
                        </div>
                    </div>
                    <div class="last-updated">
                        Last updated: <span id="current-time"></span>
                    </div>
                </section>

                <!-- Recent Activities -->
</div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/admin/js/scripts.js"></script>
</body>
</html>