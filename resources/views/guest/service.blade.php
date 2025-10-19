<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS-Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/service.css">
    <link rel="stylesheet" href="/css/footer.css">

</head>d
<body>
    <header>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">

            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/')}}" class="logo" style="height: 60px; width: 70px;  margin: bottom 20px;"> <img src="/asset/image.png " alt="logo" ></a>


            <div class="menu-toggle" id="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-list">
                <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/')}}">Home</a></li>
                <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/about')}}">About</a></li>
                <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/service')}}" class="activ">Service</a></li>
                <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/events')}}">Event</a></li>
                <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/blogs')}}">Blog</a></li>
                <li><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{url('/contact')}}">Contact</a></li>
                <li><a href="{{route('login')}}" class="btn btn-primary" style="color:white">Log in</a></li>
                <li><a href="{{route('register')}}" class="btn btn-primary" style="color:white">Get Started</a></li>
            </ul>
        </div>
    </nav>
    </header>

    <!-- Hero Section -->

    <!-- Core Services Section -->
    <section id="core-services" class="core-services">
        <div class="container">

            <div class="section-header">
            <h1 style="margin:25px; padding: 25px;">Our Service</h1>
                <h2>Essential Tools for Every Organization</h2>
                <p>Our core services provide the foundation for efficient membership management</p>
            </div>

            <div class="services-grid">
                <!-- Service 1 -->
                <div class="service-card" data-service="member-management">
                    <div class="service-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Member Management</h3>
                    <p>Comprehensive member profiles, custom fields, automated renewals, and member self-service portal.</p>
                    <a href="{{url('/about')}}" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>

                <!-- Service 2 -->
                <div class="service-card" data-service="payment-processing">
                    <div class="service-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h3>Payment Processing</h3>
                    <p>Secure payment collection, subscription management, invoicing, and financial reporting.</p>
                    <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>

                <!-- Service 3 -->
                <div class="service-card" data-service="event-management">
                    <div class="service-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Event Management</h3>
                    <p>Create and manage events, handle registrations, send reminders, and track attendance.</p>
                    <a href="{{url('/events')}}" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>

                <!-- Service 4 -->
                <div class="service-card" data-service="reporting-analytics">
                    <div class="service-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3>Reporting & Analytics</h3>
                    <p>Gain insights with customizable reports, dashboards, and data visualization tools.</p>
                    <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Services Section -->
    <section class="additional-services">
        <div class="container">
            <div class="section-header">
                <h2>Enhance Your Organization's Capabilities</h2>
                <p>Take your organization to the next level with these powerful tools</p>
            </div>

            <div class="services-grid">
                <!-- Service 5 -->
                <div class="service-card" data-service="communication-tools">
                    <div class="service-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Communication Tools</h3>
                    <p>Email campaigns, newsletters, SMS notifications, and targeted messaging.</p>
                    <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>

                <!-- Service 6 -->
                <div class="service-card" data-service="document-management">
                    <div class="service-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3>Document Management</h3>
                    <p>Store, share, and manage documents with version control and access permissions.</p>
                    <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>

                <!-- Service 7 -->
                <div class="service-card" data-service="access-control">
                    <div class="service-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3>Access Control</h3>
                    <p>Role-based permissions, secure login, and data protection features.</p>
                    <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>

                <!-- Service 8 -->
                <div class="service-card" data-service="website-builder">
                    <div class="service-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>Website Builder</h3>
                    <p>Create and manage your organization's website with customizable templates.</p>
                    <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Advanced Solutions Section -->
    <section class="advanced-solutions">
        <div class="container">
            <div class="section-header">
                <h2>Enterprise-Grade Capabilities</h2>
                <p>For organizations with complex needs and advanced requirements</p>
            </div>

            <div class="solutions-grid">
                <!-- Solution 1 -->
                <div class="solution-card">
                    <div class="solution-image">
                        <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Mobile App">
                    </div>
                    <div class="solution-content">
                        <h3>Mobile App</h3>
                        <p>Native mobile applications for iOS and Android for on-the-go management.</p>
                        <ul class="solution-features">
                            <li><i class="fas fa-check"></i> Member directory</li>
                            <li><i class="fas fa-check"></i> Event registration</li>
                            <li><i class="fas fa-check"></i> Digital membership cards</li>
                            <li><i class="fas fa-check"></i> Push notifications</li>
                        </ul>
                        <a href="#" class="btn btn-outline">Explore Mobile App</a>
                    </div>
                </div>

                <!-- Solution 2 -->
                <div class="solution-card">
                    <div class="solution-image">
                        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Community Platform">
                    </div>
                    <div class="solution-content">
                        <h3>Community Platform</h3>
                        <p>Foster engagement with discussion forums, groups, and member networking.</p>
                        <ul class="solution-features">
                            <li><i class="fas fa-check"></i> Discussion forums</li>
                            <li><i class="fas fa-check"></i> Interest groups</li>
                            <li><i class="fas fa-check"></i> Member messaging</li>
                            <li><i class="fas fa-check"></i> Content sharing</li>
                        </ul>
                        <a href="#" class="btn btn-outline">Explore Community</a>
                    </div>
                </div>

                <!-- Solution 3 -->
                <div class="solution-card">
                    <div class="solution-image">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="API & Integrations">
                    </div>
                    <div class="solution-content">
                        <h3>API & Integrations</h3>
                        <p>Connect OMMS with your existing tools and systems through our robust API.</p>
                        <ul class="solution-features">
                            <li><i class="fas fa-check"></i> RESTful API</li>
                            <li><i class="fas fa-check"></i> Webhook support</li>
                            <li><i class="fas fa-check"></i> Third-party integrations</li>
                            <li><i class="fas fa-check"></i> Data synchronization</li>
                        </ul>
                        <a href="#" class="btn btn-outline">Explore Integrations</a>
                    </div>
                </div>

                <!-- Solution 4 -->
                <div class="solution-card">
                    <div class="solution-image">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Customization Services">
                    </div>
                    <div class="solution-content">
                        <h3>Customization Services</h3>
                        <p>Tailor OMMS to your specific needs with custom development and configuration.</p>
                        <ul class="solution-features">
                            <li><i class="fas fa-check"></i> Custom workflows</li>
                            <li><i class="fas fa-check"></i> Branded experience</li>
                            <li><i class="fas fa-check"></i> Custom fields</li>
                            <li><i class="fas fa-check"></i> Automation rules</li>
                        </ul>
                        <a href="#" class="btn btn-outline">Explore Customization</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Implementation Process Section -->
    <section class="implementation-process">
        <div class="container">
            <div class="section-header">
                <h2>Getting Started is Easy</h2>
                <p>Our streamlined implementation process gets you up and running quickly</p>
            </div>

            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Consultation</h3>
                        <p>We'll discuss your needs and recommend the right solutions for your organization.</p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Setup</h3>
                        <p>Our team configures OMMS to match your organization's structure and requirements.</p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Training</h3>
                        <p>We provide comprehensive training for your team members to ensure successful adoption.</p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Ongoing Support</h3>
                        <p>Our support team is always available to help with any questions or issues.</p>
                    </div>
                </div>
            </div>

            <div class="cta-section">
                <h3>Ready to Transform Your Organization?</h3>
                <p>Join thousands of organizations that have streamlined their operations with OMMS.</p>
                <div class="cta-buttons">
                    <a href="{{route('register')}}" class="btn btn-primary">Get Started Today</a>
                    <a href="{{route('register')}}" class="btn btn-secondary">Schedule a Demo</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>OMMS</h3>
                    <p>A comprehensive organization management system designed to streamline member management, event planning, payment processing, and more.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="footer-links">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="service.html">Services</a></li>
                        <li><a href="event.html">Event</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Member Management</a></li>
                        <li><a href="#">Event Management</a></li>
                        <li><a href="#">Payment Processing</a></li>
                        <li><a href="#">Reporting & Analytics</a></li>

                    </ul>
                </div>

                <div class="footer-links">
                    <h3>Resources</h3>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Guides & Tutorials</a></li>
                        <li><a href="#">API Documentation</a></li>
                        <li><a href="#">Community Forum</a></li>
                        <li><a href="#">System Status</a></li>
                    </ul>
                </div>

                <div class="footer-contact">
                    <h3>Contact Us</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Dire dawa, Ethiopia</p>
                    <p><i class="fas fa-envelope"></i> info@omms.com</p>
                    <p><i class="fas fa-phone"></i> +251939696877</p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 OMMS. All rights reserved.</p>
                <div class="footer-legal">
                    <a href="#">Terms of Service</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Cookie Policy</a>
                    <a href="#">Security</a>
                </div>
            </div>
        </div>
    </footer>



    <script src="/js/service.js"></script>
</body>
</html>
