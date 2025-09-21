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
    <link rel="stylesheet" href="/orgAdmin/js/styles.css">
</head>
<body>
    <div class="dashboard-container">
    @include('organAdmin.sidebar nav')

        <!-- Main Content Area -->
        <main class="main-content">
            <header class="main-header">
                <h1>Member Management</h1>
                <div class="header-actions">
                   <a href="{{url('addmember')}}"> <button class="btn btn-primary" id="addMemberBtn" >
                        <i class="fas fa-plus"></i> Add Member
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

            <!-- Member Table -->
            <div class="card">

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
                <div class="table-responsive">
                    <table class="member-table">
                        <thead>
                            <tr>
                                <th width="40px">
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th>Member</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Join Date</th>
                                <th>Last Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Member Row 1 -->

                            @foreach ($member as $members)
                            @php
                                 $date = $members->created_at;
                                 $date = Carbon\Carbon::parse($date);
                                 $elapsed= $date->diffForHumans();
                                @endphp
                            <tr>
                                <td><input type="checkbox" class="member-checkbox"></td>
                                <td>
                                    <div class="member-info">


<img src="imagemember/{{$members->photo}}" alt="{{$members->name}}" class="member-avatar">



                                        <div>
                                            <div class="member-name">{{$members->name}}</div>
                                            <div class="member-email">{{$members->email}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge role-member">{{$members->role}}</span>
                                </td>
                                <td>
                                    <span class="badge status-active">{{$members->status}}</span>
                                </td>
                                <td>{{$members->created_at}}</td>
                                <td>{{   $elapsed}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-icon dropdown-toggle">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                          <!--  <a href="#" class="dropdown-item"><i class="fas fa-eye"></i> View</a>-->
                                            <a href="{{url('edit', $members->id)}}" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="{{url('deletemember', $members->id)}}" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Remove</a>
                                            <a href="#" class="dropdown-item"><i class="fas fa-envelope"></i> Message</a>
                                            <div class="dropdown-divider"></div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>

                <!-- Table Footer -->
                <div class="table-footer">
                    <div class="table-info">
                        Showing 1 to 7 of 245 members
                    </div>
                    <div class="pagination">
                        <button class="btn btn-outline" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="btn btn-outline active">1</button>
                        <button class="btn btn-outline">2</button>
                        <button class="btn btn-outline">3</button>
                        <span class="pagination-ellipsis">...</span>
                        <button class="btn btn-outline">35</button>
                        <button class="btn btn-outline">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Add Member Modal-->
            <div class="modal" id="addMemberModal">
                <div class="modal-dialog">
                    <div class="modal-header">

                        <button class="btn btn-icon modal-close" >
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">




                </div>
</div>
        </main>
    </div>

    <script src="/orgAdmin/js/member.js"></script>
</body>
</html>
