<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS - Events</title>
    <link rel="stylesheet" href="/css/event.css">
    <link rel="stylesheet" href="/css/service.css">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="">
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

    
    <section id="events" class="events-section">
        <div class="container">
            <h2 class="section-title">Upcoming Events</h2>
            <p class="section-subtitle">Join our community for these exclusive events</p>
            
            <div class="events-grid">
                <!-- Event 1 -->
                 @foreach ($events as $event)
                <div class="event-card">
                    <div class="event-badge">{{$event->type}}</div>
                    <div class="event-image"  >
                     
                        <img src="imageevent/{{$event->image}}" alt="{{$event->title}}" class="event-image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                    </div>

                    <div class="event-content">
                        <h3 class="event-title">{{$event->title}}</h3>
                        <div class="event-meta">
                            <span><i class="fas fa-calendar-alt"></i> {{$event->start_date}}</span>
                            <span><i class="fas fa-clock"></i> {{$event->start_time}} - {{$event->end_time}}</span>
                            <span><i class="fas fa-map-marker-alt"></i> {{$event->location}}</span>
                            <span><i class="fas fa-users"></i> {{$event->capacity}} attendees</span>
                        </div>
                        <p class="event-description">{{$event->description}}</p>
                        <a href="#" class="btn btn-primary">Register Now</a>
                    </div>
                </div>
                @endforeach
                
           
            </div>
        </div>
    </section>

    <section class="host-event">
        <div class="container">
            <div class="host-content">
                <h2 class="section-title">Want to Host Your Own Event?</h2>
                <p class="section-subtitle">Use OMMS Event Management to plan and execute successful events for your members</p>
                <ul class="feature-list">
                    <li><i class="fas fa-check-circle"></i> Easy online registration and ticketing</li>
                    <li><i class="fas fa-check-circle"></i> Automated reminders and follow-ups</li>
                    <li><i class="fas fa-check-circle"></i> Real-time attendance tracking</li>
                    <li><i class="fas fa-check-circle"></i> Integrated member communication</li>
                    <li><i class="fas fa-check-circle"></i> Post-event analytics and reporting</li>
                </ul>
                <a href="#" class="btn btn-primary">Learn More</a>
            </div>
            <div class="host-image">
                <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80" alt="Event Planning">
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

    <script src="/js/event.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>