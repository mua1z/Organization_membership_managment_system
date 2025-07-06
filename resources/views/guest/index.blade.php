<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS-Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/service.css">

</head>
<body>




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
                <li><a href="{{route('login')}}" class="btn btn-primary" style="color:white"> Log in</a></li>
                <li><a href="{{route('register')}}" class="btn btn-primary" style="color:white">Get Started</a></li>
            </ul>
        </div>
    </nav>


    <div class="hero-container">
        <!-- Background Slides -->
        <div class="background-slides" id="backgroundSlides">
            <div class="background-slide" style="background-image: url('/asset/membership-management-system.webp ');"></div>
            <div class="background-slide" style="background-image: url('/asset/c_magnifying_glass_with_illustrative_people_dark.jpg ');"></div>
            <div class="background-slide" style="background-image: url('/asset/eventmanagementpowerpointpresentationslides-210810034621-thumbnail.webp');"></div>
        </div>

        <!-- Content Slides -->
        <div class="hero-content" id="heroContent">

            <div class="hero-slide active">

                <div class="hero-buttons">
                <a href="{{route('register')}}" > <button class="hero-button primary">Get start</button></a>
                <a href="{{url('/service')}}" ><button class="hero-button">Lear more</button></a>
                </div>
            </div>

            <div class="hero-slide active">

          <div class="hero-buttons">
          <a href="{{route('register')}}" > <button class="hero-button primary">Get start</button></a>
          <a href="{{url('/service')}}" ><button class="hero-button">Lear more</button></a>
          </div>
      </div>

      <div class="hero-slide active">

          <div class="hero-buttons">
          <a href="{{route('register')}}" > <button class="hero-button primary">Get start</button></a>
          <a href="{{url('/service')}}" ><button class="hero-button">Lear more</button></a>
          </div>
      </div>
        </div>

        <!-- Indicators -->
        <div class="indicator-container" id="indicatorContainer">
            <div class="indicator active"></div>
            <div class="indicator"></div>
            <div class="indicator"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const heroContent = document.getElementById('heroContent');
            const backgroundSlides = document.getElementById('backgroundSlides');
            const indicatorContainer = document.getElementById('indicatorContainer');
            const slides = document.querySelectorAll('.hero-slide');
            const indicators = document.querySelectorAll('.indicator');
            let currentIndex = 0;
            let slideInterval;

            function initSlider() {
                // Set initial active slide
                updateSlide();

                // Auto-scroll every 2 seconds
                slideInterval = setInterval(nextSlide, 2000);

                // Click event for indicators
                indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => {
                        goToSlide(index);
                    });
                });
            }

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slides.length;
                updateSlide();
            }

            function goToSlide(index) {
                currentIndex = index;
                updateSlide();
                // Reset the timer when manually changing slides
                resetInterval();
            }

            function updateSlide() {
                // Move content
                heroContent.style.transform = `translateX(-${currentIndex * 100}vw)`;

                // Move background with parallax effect (slower movement)
                backgroundSlides.style.transform = `translateX(-${currentIndex * 33.33}%)`;

                // Update active class for animation
                slides.forEach((slide, index) => {
                    if (index === currentIndex) {
                        slide.classList.add('active');
                    } else {
                        slide.classList.remove('active');
                    }
                });

                // Update indicators
                indicators.forEach((indicator, index) => {
                    if (index === currentIndex) {
                        indicator.classList.add('active');
                    } else {
                        indicator.classList.remove('active');
                    }
                });
            }

            function resetInterval() {
                clearInterval(slideInterval);
                slideInterval = setInterval(nextSlide, 2000);
            }

            // Pause on hover
            heroContent.addEventListener('mouseenter', () => {
                clearInterval(slideInterval);
            });

            heroContent.addEventListener('mouseleave', resetInterval);

            // Initialize slider
            initSlider();
        });
    </script>

    <!-- Hero Section with Dynamic Background


    <section class="hero">
        <div class="container">
            <h1 class="hero-title">Streamline Your Membership Management</h1>
            <p class="hero-subtitle">OMMS provides powerful tools to manage members, events, and payments all in one platform.</p>
            <div class="hero-buttons">
                <a href="{{route('register')}}" class="btn btn-primary">Get Started</a>
                <a href="{{url('/service')}}" class="btn btn-outline">Learn More</a>
            </div>
        </div>
    </section>-->

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stat-item">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="counter" data-target="15000">1000+</h3>
                <p>Organizations</p>
            </div>
            <div class="stat-item">
                <div class="feature-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3 class="counter" data-target="300000">1009+</h3>
                <p>Events Managed</p>
            </div>
            <div class="stat-item">
                <div class="feature-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <h3 class="counter" data-target="750">1M+</h3>
                <p>Million Processed</p>
            </div>
            <div class="stat-item">
                <div class="feature-icon">
                    <i class="fas fa-smile"></i>
                </div>
                <h3 class="counter" data-target="99">100%</h3>
                <p>Satisfaction</p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <h2 class="section-title">Powerful Features</h2>
            <p class="section-subtitle">Everything you need to manage your organization efficiently</p>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Member Management</h3>
                    <p>Easily manage member profiles, groups, and communication with our intuitive interface.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Event Coordination</h3>
                    <p>Plan, promote, and track attendance for all your organization's events in one place.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h3>Payment Processing</h3>
                    <p>Secure payment collection with support for multiple gateways and recurring billing.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3>Advanced Analytics</h3>
                    <p>Gain insights into member engagement, event success, and financial performance.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Role-Based Access</h3>
                    <p>Control permissions with customizable roles for admins, staff, and members.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h3>Custom Workflows</h3>
                    <p>Tailor the system to match your organization's unique processes and requirements.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="process">
        <div class="container">
            <h2 class="section-title">Simple Implementation</h2>
            <p class="section-subtitle">Get started in just a few easy steps</p>

            <div class="process-steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Sign Up</h3>
                    <p>Create your account and set up your organization profile.</p>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Import Members</h3>
                    <p>Bring in your existing member database with our easy import tools.</p>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Configure Settings</h3>
                    <p>Customize the platform to match your organization's needs.</p>
                </div>

                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Go Live</h3>
                    <p>Launch the system to your members and start managing efficiently.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing" id="pricing">
        <div class="container">
            <h2 class="section-title">Flexible Pricing</h2>
            <p class="section-subtitle">Choose the perfect plan for your organization</p>

            <div class="pricing-cards">
                <div class="pricing-card">
                    <h3>Starter</h3>
                    <div class="price">$0<span>/month</span></div>
                    <p>Perfect for small organizations getting started</p>
                    <ul>
                        <li>Up to 50 members</li>
                        <li>Basic member management</li>
                        <li>5 events per month</li>
                        <li>Email notifications</li>
                        <li>Community support</li>
                    </ul>
                    <a href="{{route('register')}}" class="btn secondary-btn">Get Started</a>
                </div>

                <div class="pricing-card featured">
                    <div class="popular-badge">Most Popular</div>
                    <h3>Professional</h3>
                    <div class="price">$29<span>/month</span></div>
                    <p>Ideal for growing organizations</p>
                    <ul>
                        <li>Up to 500 members</li>
                        <li>Advanced member management</li>
                        <li>Unlimited events</li>
                        <li>Payment processing</li>
                        <li>Custom forms & fields</li>
                        <li>Email & SMS notifications</li>
                    </ul>
                    <a href="{{route('register')}}" class="btn primary-btn">Choose Plan</a>
                </div>

                <div class="pricing-card">
                    <h3>Enterprise</h3>
                    <div class="price">$99<span>/month</span></div>
                    <p>For large organizations with complex needs</p>
                    <ul>
                        <li>Unlimited members</li>
                        <li>Full customization</li>
                        <li>Advanced reporting</li>
                        <li>API access</li>
                        <li>Multiple admin accounts</li>
                        <li>24/7 premium support</li>
                        <li>Custom integrations</li>
                    </ul>
                    <a href="{{route('register')}}" class="btn secondary-btn">Contact Sales</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <h2 class="section-title">Trusted by Organizations</h2>
            <p class="section-subtitle">See what our customers say about OMMS</p>

            <div class="testimonial-slider">
                <div class="testimonial-track">
                    <div class="testimonial-slide">
                        <div class="testimonial-content">
                            <p>"OMMS has revolutionized how we manage our 500+ member association. The platform is intuitive and has saved us countless hours of administrative work."</p>
                            <div class="author">
                                <img src="" alt="Muaz Amin">
                                <div class="author-info">
                                    <h4>Muaz Amin</h4>
                                    <p>Executive Director, Tech Alliance</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testimonial-content">
                            <p>"The event management features alone are worth the investment. Our member engagement has increased significantly since we started using OMMS."</p>
                            <div class="author">
                                <img src="" alt="Obsa Amin">
                                <div class="author-info">
                                    <h4>Obsa Amin</h4>
                                    <p>President, Professional Association</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testimonial-content">
                            <p>"As a treasurer, I appreciate how easy it is to track payments and generate financial reports. OMMS has made my volunteer position much more manageable."</p>
                            <div class="author">
                                <img src="" alt="Afendi Amin">
                                <div class="author-info">
                                    <h4>Afendi Amin</h4>
                                    <p>Treasurer, Community Foundation</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testimonial-content">
                            <p>"The reporting tools have given us insights we never had before. We can now make data-driven decisions about our membership strategy."</p>
                            <div class="author">
                                <img src="" alt="Hamza Amin">
                                <div class="author-info">
                                    <h4>Hamza Amin</h4>
                                    <p>Membership Director, Arts Council</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-slide">
                        <div class="testimonial-content">
                            <p>"Switching to OMMS was the best decision we made this year. The customer support team is incredibly responsive and helpful."</p>
                            <div class="author">
                                <img src="" alt="Lencho Jemal">
                                <div class="author-info">
                                    <h4>Lencho Jemal</h4>
                                    <p>Executive Director, Nonprofit Network</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slider-controls">
                    <button class="slider-prev"><i class="fas fa-chevron-left"></i></button>
                    <div class="slider-dots">
                        <span class="dot active"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                    <button class="slider-next"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Transform Your Membership Management?</h2>
            <p>Join thousands of organizations that trust OMMS to streamline their operations.</p>
            <a href="{{route('register')}}" class="btn primary-btn">Start Free Trial</a>
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

    <script src="/js/script.js"></script>

    <script src="/js/event.js"></script>





</body>
</html>
