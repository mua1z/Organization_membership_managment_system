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

</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        @include('organAdmin.sidebar nav')

        <!-- Main Content Area -->
        <main class="main-content">
            <header class="main-header">
                <h1>Edid your profile</h1>



                <x-app-layout>



</x-app-layout>
            </header>

            <!-- Page Description -->
            <div class="page-description">
                <p>Manage your organization's profile</p>
            </div>


            <div class="modal-body" style="padding: 20px; font-family: Arial, sans-serif;">
@if(session()->has('message'))
    <div class="alert alert-success" style="background-color: blue; color: white; padding: 15px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 4px; position: relative;">
        <a href="{{url('home')}}" style="text-decoration: none;">
            <button type="button" class="close" data-dismiss="alert" style="position: absolute; top: 5px; right: 10px; background: transparent; border: none; font-size: 20px; color: white; cursor: pointer;">cancel</button>
        </a>
        {{session()->get('message')}}
    </div>
@endif
</div>

            <!-- Posts Grid -->
            <div class="modal-body">
                <form id="add-organization-form" action="{{url('updateprofile', $data->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf

                    <div class="form-group">
                        <label for="name">OranAdmin name</label>
                        <input type="text" id="name" placeholder="OrgAdmin name" name="name" value="{{$data->name}}" required>
                    </div>

                    <div class="form-group">
                    <label for="email">Admin email</label>
                        <input type="email" id="email" placeholder="" name="email" value="{{$data->email}}" required>
                    </div>

                    <div class="form-group">
                        <label for="organization_name">Organization Name</label>
                        <input type="text" id="organization_name" name= "organization_name" value="{{$data->organization_name}}" required>
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
                          <label for="photo">Add profile photo:</label>
  <input type="file" id="file" name="file" placeholder="Enter your photo" value="{{$data->profile_photo_path}}" >
  </div>
            <div class="modal-footer">
                <button class="btn btn-secondary modal-cancel">Cancel</button>
                <button class="btn btn-primary modal-submit">Change Profile</button>
            </div>
            </form>
            </div>

            </div>
        </main>
    </div>

    <script src="/orgAdmin/js/blog.js"></script>

</body>
</html>
