<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS | Organizations Management</title>
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
                <h2>Organizations</h2>
                <div class="header-actions">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search organizations...">
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
                <!-- Page Header -->
                <section class="page-header">
                    <h3>Manage all organizations on the platform</h3>
                    <button class="btn btn-primary" id="add-organization-btn">
                        <i class="fas fa-plus"></i> Add Organization
                    </button>
                </section>
                <div class="modal-body" style="padding: 20px; font-family: Arial, sans-serif;">
@if(session()->has('message'))
    <div class="alert alert-success" style="background-color: blue; color: white; padding: 15px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 4px; position: relative;">
        <a href="{{url('organ')}}" style="text-decoration: none;">
            <button type="button" class="close" data-dismiss="alert" style="position: absolute; top: 5px; right: 10px; background: transparent; border: none; font-size: 20px; color: white; cursor: pointer;">cancel</button>
        </a>
        {{session()->get('message')}}
    </div>
@endif
</div>  
                <!-- Organizations Table -->
                <section class="organizations-table-section">
                    <div class="table-responsive">
                        <table class="organizations-table">
                            <thead>
                                <tr>
                                    <th>Organization</th>
                                    <th>OrganAdmins</th>
                                    <th>Members</th>
                                    <th>Plan</th>
                                    <th>OrganType</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($organ as $users)
                                <tr>
                                    <td>
                                        <div class="org-info">
                                            <div class="org-avatar">
                                                <img src="imageorgan/{{$users->profile_photo_path}}" alt="{{$users->organization_name}}" onerror="this.src='https://ui-avatars.com/api/?name=Global+Solutions&background=random'">
                                               
                                            </div>
                                            <div class="org-details">
                                                <h4>{{$users->organization_name}}</h4>
                                                <p>{{$users->created_at}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->member}}</td>
                                    <td><span class="badge badge-enterprise">{{$users->plan}}</span></td>
                                    <td><span class="badge badge-active">{{$users->organization_type}}</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{url('deleteorgan', $users->id)}}">delete<button class="btn-action delete-btn" title="Delete">
                                               
                                            </button></a>
                                           <a href="{{url('editorgan', $users->id)}}"><button class="btn-action edit-btn" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button></a> 
                                            <button class="btn-action deactivate-btn" title="Deactivate">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Pagination -->
                <section class="pagination-section">
                    <div class="pagination-info">
                        Showing 1 to 5 of 15 organizations
                    </div>
                    <div class="pagination-controls">
                        <button class="pagination-btn" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="pagination-btn active">1</button>
                        <button class="pagination-btn">2</button>
                        <button class="pagination-btn">3</button>
                        <button class="pagination-btn">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <!-- Add Organization Modal -->
    <div class="modal" id="add-organization-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Organization</h3>
                <button class="modal-close">&times;</button>
            </div>
          @include('admin.addorgan')
        </div>
    </div>

    <script src="/admin/js/organ.js"></script>
</body>
</html>