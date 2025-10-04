<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS | Organization Admins Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/css/styles.css">
    <link rel="stylesheet" href="/admin/css/orgAdmin.css">
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
            <div class="sidebar-footer">
                <div class="user-profile">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User">
                    <div>
                        <p class="username">Super Admin</p>
                        <p class="user-role">Administrator</p>
                    </div>
                </div>
                <a href="#" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="main-header">
                <h2>Organization Admins</h2>
                <div class="header-actions">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search admins...">
                    </div>
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">2</span>
                    </button>
                    <x-app-layout>



                     </x-app-layout>

                </div>
            </header>

            <div class="content-wrapper">
                <!-- Page Header -->
                <section class="page-header">
                    <h3>Manage all organization administrators on the platform</h3>
                    <div class="header-buttons">
                        <button class="btn btn-primary" id="add-admin-btn">
                            <i class="fas fa-plus"></i> Add Admin
                        </button>
                        <button class="btn btn-secondary" id="export-admins-btn">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </div>
                </section>

                <!-- Admins Table -->
                <section class="admins-table-section">
                    <div class="table-filters">
                        <div class="filter-group">
                            <label for="status-filter">Status:</label>
                            <select id="status-filter">
                                <option value="all">All</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="role-filter">Role:</label>
                            <select id="role-filter">
                                <option value="all">All</option>
                                <option value="primary">Primary Admin</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="org-filter">Organization:</label>
                            <select id="org-filter">
                                <option value="all">All Organizations</option>
                                <option value="acme">Acme Corp</option>
                                <option value="techstart">TechStart Inc</option>
                                <option value="global">Global Solutions</option>
                                <option value="creative">Creative Minds</option>
                                <option value="health">Health Partners</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="admins-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Organization</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($org as $orgs)
                            <tr>
                                <tr>
                                    <td>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <img src="" alt="{{$orgs->name}}">
                                            </div>
                                            <div class="user-details">
                                                <h4>{{$orgs->name}}</h4>

                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$orgs->email}}</td>
                                    <td>{{$orgs->organization_name}}</td>
                                    <td><span class="badge badge-primary">{{$orgs->role}}</span></td>
                                    <td><span class="badge badge-active">{{$orgs->status}}</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action impersonate-btn" title="Impersonate">
                                                <i class="fas fa-user-secret"></i>
                                            </button>
                                            <button class="btn-action reset-btn" title="Reset Password">
                                                <i class="fas fa-key"></i>
                                            </button>
                                            <button class="btn-action edit-btn" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
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
                        Showing 1 to 5 of 12 admins
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

    <!-- Add Admin Modal -->
    <div class="modal" id="add-admin-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Organization Admin</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="add-admin-form" action="{{url('orgadmin_upload')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="admin-first-name">Full Name</label>
                            <input type="text" id="admin-first-name" name="name" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="admin-email">Email</label>
                        <input type="email" id="admin-email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="admin-organization">Organization Name</label>
                        <input type="text" id="admin-oran" name="organ_name" required>

                    </div>
                    <div class="form-group">
                        <label for="admin-role">Role</label>
                        <select id="admin-role" name="role" required>
                            <option value="">Select Role</option>
                            <option value="primary">Primary Admin</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="admin-status">Status</label>
                        <select id="admin-status" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary modal-cancel">Cancel</button>
                <button class="btn btn-primary modal-submit">Create Admin</button>
            </div>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <div class="modal" id="reset-password-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Reset Password</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to reset the password for <strong id="reset-admin-name">John Smith</strong>?</p>
                <p>A password reset link will be sent to <strong id="reset-admin-email">john.smith@acmecorp.com</strong>.</p>
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="force-reset"> Force password change on next login
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary modal-cancel">Cancel</button>
                <button class="btn btn-primary modal-submit">Send Reset Link</button>
            </div>
        </div>
    </div>

    <!-- Impersonate Modal -->
    <div class="modal" id="impersonate-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Impersonate Admin</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <p>You are about to impersonate <strong id="impersonate-admin-name">John Smith</strong> from <strong id="impersonate-admin-org">Acme Corp</strong>.</p>
                <p>This will log you in as this admin until you manually logout.</p>
                <div class="form-group">
                    <label for="impersonate-reason">Reason (optional)</label>
                    <textarea id="impersonate-reason" rows="3" placeholder="Enter reason for impersonation..."></textarea>
                </div>
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Warning:</strong> All actions will be attributed to this admin's account.
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary modal-cancel">Cancel</button>
                <button class="btn btn-primary modal-submit">Impersonate</button>
            </div>
        </div>
    </div>

    <script src="/admin/js/orgAdmin.js"></script>
</body>
</html>
