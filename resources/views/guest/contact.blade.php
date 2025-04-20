<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | OMMS</title>
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/service.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                <li><a href="{{route('login')}}" class="btn btn-primary" style="color:white">Log in</a></li>
                <li><a href="{{route('register')}}" class="btn btn-primary" style="color:white">Get Started</a></li>
            </ul>
        </div>
    </nav>

    <section class="" >
        <div class="container"style="justify-content: right;">
            <h1 class="" style="justify-content: right; margin-top:40px ; padding-left: 300px;">Contact OMMS</h1>
            <p class=""style="justify-content: right; padding-left: 200px;">Have questions about our membership management System? Choose the way you can touch us, We're here to help.</p>
        </div>
    </section>

    <section class="contact-options">
        <div class="container">
            <div class="options-grid">
                <div class="option-card">
                    <div class="option-icon">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <h3>Live Chat</h3>
                    <p>Get instant help from our support team</p>
                    <a href="#" class="btn btn-primary">Start Chat</a>
                </div>

                <div class="option-card">
                    <div class="option-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email Us</h3>
                    <p>Send us your questions anytime</p>
                    <a href="mailto:contact@omms.com" class="btn btn-outline">contact@omms.com</a>
                </div>

                <div class="option-card">
                    <div class="option-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>Call Us</h3>
                    <p>Speak with our support team directly</p>
                    <a href="tel:+251912345678" class="btn btn-outline">+251 91 234 5678</a>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-details">
        <div class="container">
            <div class="details-grid">
                <div class="details-card">
                    <h3><i class="fas fa-map-marker-alt"></i> Our Headquarters</h3>
                    <address>
                        <p>Dire Dawa City Center<br>
                        Near Dire Dawa University<br>
                        Dire Dawa, Ethiopia</p>
                    </address>
                </div>

                <div class="details-card">
                    <h3><i class="fas fa-users"></i> Our Team</h3>
                    <ul class="team-contacts">
                        <li><strong>Sales:</strong> <a href="mailto:sales@omms.com">sales@omms.com</a></li>
                        <li><strong>Support:</strong> <a href="mailto:support@omms.com">support@omms.com</a></li>
                        <li><strong>Press:</strong> <a href="mailto:press@omms.com">press@omms.com</a></li>
                    </ul>
                </div>

                <div class="details-card">
                    <h3><i class="far fa-clock"></i> Business Hours</h3>
                    <ul class="business-hours">
                        <li><strong>Monday - Friday:</strong> 9:00 AM - 6:00 PM</li>
                        <li><strong>Saturday:</strong> 10:00 AM - 4:00 PM</li>
                        <li><strong>Sunday:</strong> Closed</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form-section">
        <div class="container">
            <div class="form-container">
                <div class="form-header">
                    <h2>Send Us a Message</h2>
                    <p>Fill out the form below and we'll get back to you as soon as possible</p>
                </div>
                <form class="contact-form">
                    <div class="form-group">
                        <label for="full-name">Full Name</label>
                        <input type="text" id="full-name" placeholder="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" placeholder="+251 91 234 5678">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" placeholder="john@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="company">Company Name</label>
                        <input type="text" id="company" placeholder="Your Company">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select id="subject" required>
                            <option value="" disabled selected>Select a subject</option>
                            <option value="sales">Sales Inquiry</option>
                            <option value="support">Technical Support</option>
                            <option value="partnership">Partnership Opportunity</option>
                            <option value="feedback">Product Feedback</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" rows="5" placeholder="How can we help you?" required></textarea>
                    </div>
                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="newsletter">
                        <label for="newsletter">Subscribe to our newsletter for updates and insights</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <section class="map-section">
        <div class="container">
            <h2 class="section-title">Our Location</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.755530152687!2d41.86011131536326!3d9.022035293553082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1635a1a0c0a9a6a5%3A0x3d3d3d3d3d3d3d3d!2sDire%20Dawa%20University!5e0!3m2!1sen!2set!4v1620000000000!5m2!1sen!2set" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="location-details">
                <div class="location-card">
                    <h3>Dire Dawa Office</h3>
                    <address>
                        Dire Dawa City Center<br>
                        Near Dire Dawa University<br>
                        Dire Dawa, Ethiopia
                    </address>
                </div>
              
            </div>
        </div>
    </section>
<!-- Footer -->
<footer class="footer" id="contact">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-about">
                <h3 style="color: white;">OMMS</h3>
                <p>A comprehensive organization management system designed to streamline member management, event planning, payment processing, and more.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="footer-links">
                <h3 style="color: white;">Company</h3>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="service.html">Services</a></li>
                    <li><a href="event.html">Event</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h3 style="color: white;">Services</h3>
                <ul>
                    <li><a href="#">Member Management</a></li>
                    <li><a href="#">Event Management</a></li>
                    <li><a href="#">Payment Processing</a></li>
                    <li><a href="#">Reporting & Analytics</a></li>
               
                </ul>
            </div>
            
            <div class="footer-links">
                <h3 style="color: white;">Resources</h3>
                <ul>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Guides & Tutorials</a></li>
                    <li><a href="#">API Documentation</a></li>
                    <li><a href="#">Community Forum</a></li>
                    <li><a href="#">System Status</a></li>
                </ul>
            </div>
            
            <div class="footer-contact">
                <h3 style="color: white;">Contact Us</h3>
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


    <script src="/js/contact.js"></script>
    <script src="/js/service.js"></script>
</body>
</html>