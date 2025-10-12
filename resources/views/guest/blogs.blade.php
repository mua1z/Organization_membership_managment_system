<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS-Blog</title>
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

    <section class="blog-hero">
        <div class="container">
            <h1 class="hero-title">OMMS Insights</h1>
            <p class="hero-subtitle">Expert advice and best practices for membership organizations</p>
            <div class="search-box">
                <input type="text" placeholder="Search articles...">
                <button class="search-btn"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </section>

    <section class="featured-articles">
        <div class="container">
            <h2 class="section-title">Featured Articles</h2>
            <div class="featured-grid">
            @foreach ($blogs as $blog)
                <article class="featured-card">
                    <div class="article-image" >
                    <img src="imageblog/{{$blog->image}}" alt="{{$blog->title}}" class="event-image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="article-content">
                        <div class="article-meta">
                            <span class="category technology">{{$blog->category}}</span>
                            <span class="date">{{$blog->created_at}}</span>
                        </div>
                        <h3 class="article-title">{{$blog->title}}</h3>
                        <p class="article-excerpt">{{$blog->content}}</p>
                        <div class="article-footer">

                            <div class="author">

                            <img src="" alt="" >

                                <span>Author</span>
                            </div>


                            <div class="stats">
                                <span><i class="far fa-eye"></i> 234</span>
                                <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach



            </div>
            <div class="load-more">
                <a href="#" class="btn btn-outline">Load More Articles</a>
            </div>
        </div>
    </section>gg

    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h2>Stay Updated with OMMS</h2>
                <p>Get the latest membership management insights and updates delivered straight to your inbox.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email">
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
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


    <script src="/js/service.js"></script>

    <script src="/js/blog.js"></script>
</body>
</html>
