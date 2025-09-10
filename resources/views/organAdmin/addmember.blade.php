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
                   <a href="{{url('addmember')}}"> <button class="btn btn-primary" id="addMemberBtn" >
                        <i class="fas fa-plus"></i> Add Member page
                    </button></a>

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
                            <a href="" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Delete Selected</a>
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

<form id="addMemberForm" action="{{ url('upload_member') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Full Name -->
    <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <!-- Organization Name (manual) -->
    <div class="form-group">
        <label for="organ_name">Organization Name</label>
        <input type="text" id="organ_name" name="organ_name" class="form-control" required>
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <!-- Sex -->
    <div class="form-group">
        <label for="sex">Sex</label>
        <select id="sex" name="sex" class="form-control">
            <option value="">Select Sex</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>

    <!-- Phone -->
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" class="form-control">
    </div>

    <!-- Address -->
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" class="form-control">
    </div>

    <!-- Join Date -->
    <div class="form-group">
        <label for="join_date">Join Date</label>
        <input type="date" id="join_date" name="join_date" class="form-control">
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <!-- Confirm Password -->
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
    </div>

    <!-- Photo -->
    <div class="form-group">
        <label for="file">Photo</label>
        <input type="file" id="file" name="file" class="form-control">
    </div>

    <!-- Send Invitation Checkbox -->
    <div class="form-group form-check">
        <input type="checkbox" id="sendInvite" name="sendInvite" class="form-check-input">
        <label class="form-check-label" for="sendInvite">Send invitation email</label>
    </div>

    <!-- Submit / Cancel -->
    <div class="modal-footer">
        <button type="button" class="btn btn-outline modal-close">Cancel</button>
        <button class="btn btn-primary" type="submit" form="addMemberForm">Add Member</button>
    </div>
</form>

</div>
</main>
    </div>

    <script src="/orgAdmin/js/member.js"></script>
</body>
</html>
