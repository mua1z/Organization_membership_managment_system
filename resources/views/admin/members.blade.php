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
                <section class="members-table-section">
                    <div class="table-filters">
                        <div class="filter-group">
                            <label for="organization-filter">Organization:</label>
                            <select id="organization-filter">
                                <option value="all">All Organizations</option>

                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="status-filter">Status:</label>
                            <select id="status-filter">
                                <option value="all">All Statuses</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="date-filter">Join Date:</label>
                            <select id="date-filter">
                                <option value="all">All Time</option>
                                <option value="today">Today</option>
                                <option value="week">This Week</option>
                                <option value="month">This Month</option>
                                <option value="year">This Year</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
                    </div>

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
                   <div class="table-responsive">
                        <table class="members-table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Organization</th>
                                    <th>Join Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member as $members)
                                @php
                                 $date = $members->created_at;
                                 $date = Carbon\Carbon::parse($date);
                                 $elapsed= $date->diffForHumans();
                                @endphp
                                <tr>
                                    <td><input type="checkbox" class="member-checkbox"></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <img src="imagemember/{{$members->profile_photo_path}}" alt="{{$members->name}}">
                                            </div>
                                            <div class="user-details">
                                                <h4>{{$members->name}}</h4>
                                                <p>Member ID: MEM- {{$members->id}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$members->email}}</td>
                                    <td>{{$members->organization_name}}</td>
                                    <td>{{$elapsed}}</td>
                                    <td><span class="badge badge-active">{{$members->status}}</span></td>
                                    <td>
                                        <div class="action-buttons">
                                           <a href="{{url('deletemembers', $members->id)}}">Delete<button class="btn-action delete-btn" title="delete">
                                                <i class="fas fa-delete"></i>
                                            </button></a>
                                           <a href="{{url('editmembers', $members->id)}}"> <button class="btn-action edit-btn" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button></a>
                                            <button class="btn-action deactivate-btn" title="Deactivate">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                            <button class="btn-action transfer-btn" title="Transfer">
                                                <i class="fas fa-exchange-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <!--
                                <tr>
                                    <td><input type="checkbox" class="member-checkbox"></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <img src="https://randomuser.me/api/portraits/men/2.jpg" alt="Bob Johnson">
                                            </div>
                                            <div class="user-details">
                                                <h4>Bob Johnson</h4>
                                                <p>Member ID: MEM-002</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>bob.johnson@example.com</td>
                                    <td>TechStart Inc</td>
                                    <td>Feb 3, 2023</td>
                                    <td><span class="badge badge-active">Active</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action impersonate-btn" title="Impersonate">
                                                <i class="fas fa-user-secret"></i>
                                            </button>
                                            <button class="btn-action edit-btn" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action deactivate-btn" title="Deactivate">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                            <button class="btn-action transfer-btn" title="Transfer">
                                                <i class="fas fa-exchange-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="member-checkbox"></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <img src="https://randomuser.me/api/portraits/women/3.jpg" alt="Carol Smith">
                                            </div>
                                            <div class="user-details">
                                                <h4>Carol Smith</h4>
                                                <p>Member ID: MEM-003</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>carol.smith@example.com</td>
                                    <td>Global Solutions</td>
                                    <td>Mar 12, 2023</td>
                                    <td><span class="badge badge-inactive">Inactive</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action impersonate-btn" title="Impersonate">
                                                <i class="fas fa-user-secret"></i>
                                            </button>
                                            <button class="btn-action edit-btn" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action activate-btn" title="Activate">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                            <button class="btn-action transfer-btn" title="Transfer">
                                                <i class="fas fa-exchange-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="member-checkbox"></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <img src="https://randomuser.me/api/portraits/men/4.jpg" alt="Dave Brown">
                                            </div>
                                            <div class="user-details">
                                                <h4>Dave Brown</h4>
                                                <p>Member ID: MEM-004</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>dave.brown@example.com</td>
                                    <td>Creative Minds</td>
                                    <td>Apr 5, 2023</td>
                                    <td><span class="badge badge-active">Active</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action impersonate-btn" title="Impersonate">
                                                <i class="fas fa-user-secret"></i>
                                            </button>
                                            <button class="btn-action edit-btn" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action deactivate-btn" title="Deactivate">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                            <button class="btn-action transfer-btn" title="Transfer">
                                                <i class="fas fa-exchange-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" class="member-checkbox"></td>
                                    <td>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <img src="https://randomuser.me/api/portraits/women/5.jpg" alt="Eve Davis">
                                            </div>
                                            <div class="user-details">
                                                <h4>Eve Davis</h4>
                                                <p>Member ID: MEM-005</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>eve.davis@example.com</td>
                                    <td>Health Partners</td>
                                    <td>May 22, 2023</td>
                                    <td><span class="badge badge-active">Active</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action impersonate-btn" title="Impersonate">
                                                <i class="fas fa-user-secret"></i>
                                            </button>
                                            <button class="btn-action edit-btn" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn-action deactivate-btn" title="Deactivate">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                            <button class="btn-action transfer-btn" title="Transfer">
                                                <i class="fas fa-exchange-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Pagination -->
                <section class="pagination-section">
                    <div class="pagination-info">
                        Showing 1 to 5 of 25 members
                    </div>
                    <div class="pagination-controls">
                        <button class="pagination-btn" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="pagination-btn active">1</button>
                        <button class="pagination-btn">2</button>
                        <button class="pagination-btn">3</button>
                        <button class="pagination-btn">4</button>
                        <button class="pagination-btn">5</button>
                        <button class="pagination-btn">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <!-- Bulk Actions Modal -->
    <div class="modal" id="bulk-actions-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Bulk Actions</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="bulk-action">Select Action:</label>
                    <select id="bulk-action">
                        <option value="">Choose an action...</option>
                        <option value="activate">Activate Selected</option>
                        <option value="deactivate">Deactivate Selected</option>
                        <option value="transfer">Transfer to Another Organization</option>
                        <option value="delete">Delete Selected</option>
                    </select>
                </div>
                <div class="form-group transfer-group" style="display: none;">
                    <label for="transfer-org">Transfer to:</label>
                    <select id="transfer-org">
                        <option value="">Select Organization</option>
                        <option value="acme">Acme Corp</option>
                        <option value="techstart">TechStart Inc</option>
                        <option value="global">Global Solutions</option>
                        <option value="creative">Creative Minds</option>
                        <option value="health">Health Partners</option>
                    </select>
                </div>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Warning:</strong> This action will affect <span id="selected-count">0</span> members.
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary modal-cancel">Cancel</button>
                <button class="btn btn-primary modal-submit" disabled>Apply Action</button>
            </div>
        </div>
    </div>

    <!-- Transfer Member Modal -->
    <div class="modal" id="transfer-member-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Transfer Member</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <p>Transfer <strong id="transfer-member-name">Alice Williams</strong> to another organization.</p>
                <div class="form-group">
                    <label for="new-organization">New Organization:</label>
                    <select id="new-organization">
                        <option value="">Select Organization</option>
                        <option value="acme">Acme Corp</option>
                        <option value="techstart">TechStart Inc</option>
                        <option value="global">Global Solutions</option>
                        <option value="creative">Creative Minds</option>
                        <option value="health">Health Partners</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="notify-member"> Notify member about this transfer
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary modal-cancel">Cancel</button>
                <button class="btn btn-primary modal-submit">Transfer Member</button>
            </div>
        </div>
    </div>

    <!-- Impersonate Modal -->
    <div class="modal" id="impersonate-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Impersonate Member</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <p>You are about to impersonate <strong id="impersonate-member-name">Alice Williams</strong> from <strong id="impersonate-member-org">Acme Corp</strong>.</p>
                <p>This will log you in as this member until you manually logout.</p>
                <div class="form-group">
                    <label for="impersonate-reason">Reason (optional)</label>
                    <textarea id="impersonate-reason" rows="3" placeholder="Enter reason for impersonation..."></textarea>
                </div>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Warning:</strong> All actions will be attributed to this member's account.
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary modal-cancel">Cancel</button>
                <button class="btn btn-primary modal-submit">Impersonate</button>
            </div>
        </div>
    </div>

    <script src="/admin/js/members.js"></script>
</body>
</html>
