<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS - Member Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/orgAdmin/css/member.css">
    <link rel="stylesheet" href="/orgAdmin/css/styles.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        @include('organAdmin.sidebar nav')
        
        <!-- Main Content Area -->

        <main class="main-content">
            <header class="main-header">
                <h1>Member Management</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" id="addMemberBtn"
                    >
                        <i class="fas fa-edit"></i> Update Member
                    </button>
                
                    <button class="btn btn-notification">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    <x-app-layout>

                     </x-app-layout>
                </div>
            </header>
            
            <!-- Page Description -->
            <div class="page-description">
                <p>Manage your organization members</p>
            </div>
            
            <!-- Member Actions Bar -->
            <div class="action-bar">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search members..." id="memberSearch">
                </div>
                
                <div class="action-buttons">
                    <button class="btn btn-outline" id="exportBtn">
                        <i class="fas fa-file-export"></i> Export
                    </button>
                    <button class="btn btn-outline" id="importBtn">
                        <i class="fas fa-file-import"></i> Import
                    </button>
                    <div class="dropdown">
                        <button class="btn btn-outline dropdown-toggle" id="bulkActionsBtn">
                            <i class="fas fa-tasks"></i> Bulk Actions
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item"><i class="fas fa-envelope"></i> Send Email</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-tag"></i> Change Status</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-user-tag"></i> Assign Role</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Delete Selected</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body" style="padding: 20px; font-family: Arial, sans-serif;">
@if(session()->has('message'))
    <div class="alert alert-success" style="background-color: blue; color: white; padding: 15px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 4px; position: relative;">
        <a href="{{url('member')}}" style="text-decoration: none;">
            <button type="button" class="close" data-dismiss="alert" style="position: absolute; top: 5px; right: 10px; background: transparent; border: none; font-size: 20px; color: white; cursor: pointer;">cancel</button>
        </a>
        {{session()->get('message')}}
    </div>
@endif
</div>




  

<form id="addMemberForm" action="{{url('editmember', $data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                          
                <h2>Update Member</h2>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name"  value="{{$data->name}}" class="form-control" required>
                            </div>
                           
                         
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email"  value="{{$data->email}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" name="role" value="{{$data->role}}" class="form-control" >
                                    <option value="member">Member</option>
                                    <option value="treasurer">Treasurer</option>
                                    <option value="secretary">Secretary</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" value="{{$data->status}}" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="join_date">Join Date:</label>
  <input type="date" id="join_date" name="join_date" value="{{$data->join_date}}" required>
  </div>
 

  <div class="form-group">
  <label for="password">Password: </label>
  <input type="password" id="password" name="password" value="{{$data->password}}" required> >
    </div>
  <div class="form-group">
  <label for="photo">Photo:</label>
  <input type="file" id="file" name="file" value="{{$data->photo}}" >
    </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" id="sendInvite"> Send invitation email
                                </label>
                            </div>
                      
                   
                    <div class="modal-footer">
                        <button class="btn btn-outline modal-close">Cancel</button>
                        <button class="btn btn-primary" type="submit" form="addMemberForm">update member</button>
                       
                        
                    </div>
                </form>

     

</main>
    </div>

    <script src="/orgAdmin/js/member.js"></script>
</body>
</html>