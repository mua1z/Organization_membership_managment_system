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
    </section>



    <script src="/js/service.js"></script>

    <script src="/js/blog.js"></script>
</body>
</html>
