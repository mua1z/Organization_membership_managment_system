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
                        <i class="fas fa-edit"></i> Update Organization
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
                <div class="modal-body">
                <form id="add-organization-form" action="{{url('updateorgan', $data->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                        <label for="organization_name">Organization Name</label>
                        <input type="text" id="organization_name" name= "organization_name" value="{{$data->organization_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">OranAdmin name</label>
                        <input type="text" id="name" placeholder="OrgAdmin name" name="name" value="{{$data->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="plan">Subscription Plan</label>
                        <select id="plan" name="plan" value="{{$data->plan}}" required>
                            <option value="">Select a plan</option>
                            <option value="basic">Basic</option>
                            <option value="professional">Professional</option>
                            <option value="enterprise">Enterprise</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="member">Member</label>
                        <input type="number" id="member" placeholder="1000" name="member" value="{{$data->member}}" required>
                    </div> 
                    <div class="form-group">
                    <label for="email">Admin email</label>
                        <input type="email" id="email" placeholder="" name="email" value="{{$data->email}}" required>
                    </div> 
                       
                    <div class="form-group">
                        <label for="organization_type">Organization_type</label>
                        <select id="organization_type" name="organization_type" value="{{$data->organization_type}}" required>
                            <option value="startup">Startup</option>
                            <option value="educational">Educational</option>
                            <option value="government">Government</option>
                            <option value="corporate">Corporate</option>
                          
                        </select>
                        </div> 
                        
                        <div class="form-group">
                        
                    <label for="password">passwor</label>
                        <input type="" id="password" placeholder="" name="password" value="{{$data->password}}" required>
                        </div> 
                        <div class="form-group">
                          <label for="photo">Photo:</label>
  <input type="file" id="file" name="file" placeholder="Enter your photo"  >
  </div> 
            <div class="modal-footer">
                <button class="btn btn-secondary modal-cancel">Cancel</button>
                <button class="btn btn-primary modal-submit">update Organization</button>
            </div>
            </form>
            </div>

                <!-- Pagination -->
              
            </div>
        </main>
    </div>

 

    <script src="/aadmin/js/organ.js"></script>
</body>
</html>