<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS - Blog & Announcements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/orgAdmin/css/blog.css">
    <link rel="stylesheet" href="/orgAdmincss/styles.css">
    <link rel="stylesheet" href="/orgAdmin/js/styles.css">
    <link rel="stylesheet" href="/orgAdmin/css/event.css">

</head>ghkl
<body>
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        @include('organAdmin.sidebar nav')
        
        <!-- Main Content Area -->
        <main class="main-content">
            <header class="main-header">
                <h1>Blog & Announcements</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" id="createPostBtn">
                        <i class="fas fa-plus"></i> Create Post
                    </button>
                 
                </div>
                <x-app-layout>



</x-app-layout>
            </header>
            
            <!-- Page Description -->
            <div class="page-description">
                <p>Manage your organization's content</p>
            </div>
            
            <!-- Content Filters -->
            <div class="content-filters">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search posts..." id="postSearch">
                </div>
                
                <div class="filter-group">
                    <label for="statusFilter">Status:</label>
                    <select id="statusFilter" class="form-control">
                        <option value="all">All</option>
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="categoryFilter">Category:</label>
                    <select id="categoryFilter" class="form-control">
                        <option value="all">All</option>
                        <option value="urgent">Urgent</option>
                        <option value="update">Update</option>
                        <option value="general">General</option>
                        <option value="other">other</option>
                    </select>
                </div>
            </div>
            <div class="modal-body" style="padding: 20px; font-family: Arial, sans-serif;">
@if(session()->has('message'))
    <div class="alert alert-success" style="background-color: blue; color: white; padding: 15px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 4px; position: relative;">
        <a href="{{url('blog')}}" style="text-decoration: none;">
            <button type="button" class="close" data-dismiss="alert" style="position: absolute; top: 5px; right: 10px; background: transparent; border: none; font-size: 20px; color: white; cursor: pointer;">cancel</button>
        </a>
        {{session()->get('message')}}
    </div>
@endif
</div>  

            <!-- Posts Grid -->
            <div class="posts-grid">
                <!-- Post Card 1 -->
                @foreach ($blogs as $blog)
                @php
                                 $date = $blog->created_at;
                                 $date = Carbon\Carbon::parse($date);
                                 $elapsed= $date->diffForHumans();
                                @endphp
                <div class="post-card">
                    <div class="post-header">
                        <h3 class="post-title">{{$blog->title}}</h3>
                        <div class="post-meta">
                        @foreach ($users as $user)
                            <span class="post-author">{{$user->name}}</span>
                            @endforeach
                            <span class="post-date">{{    $elapsed}}</span>
                        </div>
                    </div>
                    <div class="post-excerpt">
                    {{$blog->content}}
                    </div>
                    <div class="post-footer">
                        <span class="post-category general">{{$blog->category}}</span>
                        <span class="post-status published">{{$blog->status}}</span>
                        <div class="dropdown">
                                        <button class="btn btn-icon dropdown-toggle">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{url('deleteblog',$blog->id)}}"" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                            <a href="{{url('editblog',$blog->id)}}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="dropdown-item"><i class="fas fa-envelope"></i> Send Reminders</a>
                                            <a href="#" class="dropdown-item"><i class="fas fa-users"></i> Manage Attendees</a>
                                            <div class="dropdown-divider"></div>
                                          
                                        </div>
                                    </div>
                    </div>
                </div>
                @endforeach
              
                
                
            </div>
            
            <!-- Create Post Modal -->
            <div class="modal" id="createPostModal">
                <div class="modal-dialog">
                    <div class="modal-header">
                        <h3>Create New Post</h3>
                        <button class="btn btn-icon modal-close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="createPostForm" action="{{url('uploadblog')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="postTitle">Title</label>
                                <input type="text" id="postTitle" name="title"  class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="postOrgan">Organization Name</label>
                                <input type="text" id="postOrgan" name="organ_name"  class="form-control" required>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="postContent">Content</label>
                                <textarea id="postContent" class="form-control" name="content" rows="6"></textarea>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="postCategory">Category</label>
                                    <select id="postCategory" class="form-control" name="category">
                                        <option value="general">General</option>
                                        <option value="update">Update</option>
                                        <option value="urgent">Urgent</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="postStatus">Status</label>
                                    <select id="postStatus" name="status"  class="form-control">
                                        <option value="draft">Draft</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="postImage">Featured Image</label>
                                <input type="file" id="postImage" class="form-control" name="file" accept="image/*">
                            </div>
                            <div class="modal-footer">
                        <button class="btn btn-outline modal-close">Cancel</button>
                        <button class="btn btn-primary" type="submit" form="createPostForm">Publish Post</button>
                    </div>
                           
                        </form>
                    </div>
                   
                </div>
            </div>
        </main>
    </div>

    <script src="/orgAdmin/js/blog.js"></script>
  
</body>
</html>
