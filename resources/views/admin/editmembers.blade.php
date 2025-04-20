<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS | Member Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/css/styles.css">
    <link rel="stylesheet" href="/admin/css/members.css">

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
                <h2>Members</h2>
                <div class="header-actions">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search members...">
                    </div>
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">4</span>
                    </button>
                    <x-app-layout>



                      </x-app-layout>

                </div>
            </header>

            <div class="content-wrapper">
                <!-- Page Header -->
                <section class="page-header">
                    <h3>Manage all members across organizations</h3>
                    <div class="header-buttons">
                        <button class="btn btn-primary" id="bulk-actions-btn">
                            <i class="fas fa-tasks"></i> Bulk Actions
                        </button>
                        <button class="btn btn-secondary" id="export-members-btn">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </div>
                </section>

                <!-- Members Table -->
                <div class="modal-body" style="padding: 20px; font-family: Arial, sans-serif;">
@if(session()->has('message'))
    <div class="alert alert-success" style="background-color: blue; color: white; padding: 15px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 4px; position: relative;">
        <a href="{{url('members')}}" style="text-decoration: none;">
            <button type="button" class="close" data-dismiss="alert" style="position: absolute; top: 5px; right: 10px; background: transparent; border: none; font-size: 20px; color: white; cursor: pointer;">cancel</button>
        </a>
        {{session()->get('message')}}
    </div>
@endif
</div>  
        

  


      <form action="{{url('updatemember', $data->id)}}" method="POST" enctype="multipart/form-data"  class="update-member-form" style="max-width: 500px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
        @csrf
  <h2>Update Member</h2>
  <div class="form-group">
  <label for="name">Full Name: </label>
  <input type="text" id="name" name="name" value="{{$data->name}}" required></div>
 
  <div class="form-group">
  <label for="email">Email Address: </label>
  <input type="email" id="email" name="email"  value="{{$data->email}}" required></div>
  <div class="form-group">
  <label for="role">Role: </label>
  <select id="role" name="role"  value="{{$data->role}}" required>
    <option value="member">Member</option>
    <option value="admin">Admin</option>
    <option value="super_admin">Super Admin</option>
  </select></div>

  <div class="form-group">
  <label for="status">Status: </label>
  <select id="status" name="status"  value="{{$data->status}}" required>
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
    <option value="pending">Pending</option>
  </select></div>
  <div class="form-group">
  <label for="join_date">Join Date: </label>
  <input type="date" id="join_date" name="join_date"  value="{{$data->join_date}}"  required>
</div>
  <div class="form-group">
  <label for="password">Password: </label>
  <input type="password" id="password" name="password"  value="{{$data->password}}" required>
</div>
  <div class="form-group">
  <label for="organ_name">Organ_name: </label>
  <input type="text" id="organ_name" name="organ_name"  value="{{$data->organ_name}}" required>
</div>
  <div class="form-group">
  <label for="photo">Photo:</label>
  <input type="file" id="file" name="file" value="{{$data->photo}}" >
</div>
<div class="modal-footer">
<button class="btn btn-secondary modal-cancel">Cancel</button>
                <button class="btn btn-primary modal-submit">update member</button>
            </div>
</form>


                <!-- Pagination -->
             
            </div>
        </main>
    </div>

   

   

    <!-- Impersonate Modal -->
    
    

    <script src="/admin/js/members.js"></script>
</body>
</html>