<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS-About</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/service.css">f
d
</head>
<body>
<!-- Navigation -->
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
<!-- About Section with Green Color Palette -->
<section class="about" id="about">
    <div class="container">
        <div class="about-header">
            <h2 class="section-title">Our Story & Vision</h2>
            <p class="section-subtitle">Empowering organizations to focus on what truly matters</p>
        </div>

        <div class="about-timeline">
            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2015</div>
                    <div class="timeline-details">
                        <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="OMMS Founding" class="timeline-img">
                        <h3>Our Humble Beginnings</h3>
                        <p>Founded by a team of nonprofit professionals and tech enthusiasts who saw the need for better membership management tools. Started in a small office with just 5 team members.</p>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2017</div>
                    <div class="timeline-details">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="First Major Release" class="timeline-img">
                        <h3>First Major Release</h3>
                        <p>Launched our comprehensive membership management platform serving 100+ organizations. Received the "Innovation in Nonprofit Tech" award.</p>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2020</div>
                    <div class="timeline-details">
                        <img src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Global Expansion" class="timeline-img">
                        <h3>Global Expansion</h3>
                        <p>Expanded to serve international organizations. Launched multilingual support and added 15 new team members across 3 continents.</p>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2023</div>
                    <div class="timeline-details">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Current Team" class="timeline-img">
                        <h3>Today's OMMS</h3>
                        <p>Supporting over 12,000 organizations worldwide with a team of 45+ dedicated professionals. Continuously innovating to serve our community better.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-mission">
            <div class="mission-content">
                <h3>Our Mission</h3>
                <p>To simplify membership management so organizations can focus on their core missions. We believe technology should empower, not complicate.</p>
                <div class="mission-stats">
                    <div class="stat-box">
                        <i class="fas fa-users"></i>
                        <h4>12,000+</h4>
                        <p>Organizations</p>
                    </div>
                    <div class="stat-box">
                        <i class="fas fa-globe"></i>
                        <h4>45+</h4>
                        <p>Countries</p>
                    </div>
                    <div class="stat-box">
                        <i class="fas fa-calendar-check"></i>
                        <h4>275,000+</h4>
                        <p>Events Managed</p>
                    </div>
                </div>
            </div>
            <div class="mission-image">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="OMMS Team Working" class="mission-img">
            </div>
        </div>

        <div class="team-section">
            <h3>Meet Our Leadership</h3>
            <div class="team-grid">
                <div class="team-member">
                    <img src="" alt="CEO">
                    <h4>muaz Amin</h4>
                    <p>Founder & CEO</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-member">
                    <img src="" alt="CTO">
                    <h4>Obsa Amin</h4>
                    <p>Chief Technology Officer</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div class="team-member">
                    <img src="" alt="COO">
                    <h4>Affe Amin</h4>
                    <p>Chief Operations Officer</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="values-section">
            <h3>Our Core Values</h3>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>Member-Centric</h4>
                    <p>We design every feature with the end-user experience in mind.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4>Innovation</h4>
                    <p>Continuously evolving to meet changing organizational needs.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Integrity</h4>
                    <p>We do what's right, even when no one is watching.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h4>Collaboration</h4>
                    <p>We succeed when our clients succeed - your goals are our goals.</p>
                </div>
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

<script src="/js/script.js"></script>



</body>
</html>
