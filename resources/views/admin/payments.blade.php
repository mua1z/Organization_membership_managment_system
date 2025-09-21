<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS - Payments & Subscriptions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/css/payment.css">
    <link rel="stylesheet" href="/admin/css/blog.css">
    <link rel="stylesheet" href="/admin/css/event.css">
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
        <!-- Main Content Area -->
        <main class="main-content">
            <header class="main-header">
                <h1>Payments & Subscriptions</h1>
                <div class="header-actions">
                    <div class="dropdown">

                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item" id="manualPaymentBtn"><i class="fas fa-hand-holding-usd"></i> Manual Payment</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-exchange-alt"></i> Record Transfer</a>
                        </div>

                    </div>
                    </div>
                    <x-app-layout>



</x-app-layout>



            </header>

            <!-- Page Description -->
            <div class="page-description">
                <p>Manage all organization's subscription plans and payments</p>
            </div>

            <!-- Tabs Navigation -->
            <div class="tabs">
                <button class="tab-btn active" data-tab="subscriptions">Payment Transactions</button>

                <button class="tab-btn" data-tab="invoices">Invoices & Receipts</button>
            </div>

            <!-- Subscriptions Tab -->
            <div class="tab-content active" id="subscriptions">
                <div class="action-bar">
                   <div></div>

                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search plans..." id="planSearch">
                    </div>
                </div>


            <div class="modal-body" style="padding: 20px; font-family: Arial, sans-serif;">
@if(session()->has('message'))
    <div class="alert alert-success" style="background-color: blue; color: white; padding: 15px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 4px; position: relative;">
        <a href="{{url('payment')}}" style="text-decoration: none;">
            <button type="button" class="close" data-dismiss="alert" style="position: absolute; top: 5px; right: 10px; background: transparent; border: none; font-size: 20px; color: white; cursor: pointer;">cancel</button>
        </a>
        {{session()->get('message')}}
    </div>
@endif
</div>

                <div class="card">
                    <div class="table-responsive">
                        <table class="plans-table">
                            <thead>
                                <tr>
                                    <th>Plan Name</th>
                                    <th>Amount/Price</th>
                                    <th>Billing Interval</th>
                                    <th>Oranization Admin</th>
                                    <th>Organization Name</th>
                                    <th>Payment Method</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- Plan Row 1 -->
                                @foreach ($payments as $payment)
                                <tr>
                                    <td>{{$payment->plan}}</td>
                                    <td>ETB{{$payment->amount}}</td>
                                    <td>{{$payment->billing}}</td>
                                    <td>{{$payment->name}}</td>
                                    <td>{{$payment->organ_name}}</td>
                                    <td>
                                        <span class="badge status-current">{{$payment->payment_method}}</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-icon dropdown-toggle">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="#" class="dropdown-item"><i class="fas fa-users"></i> View Members</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                         @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <!-- Create Plan Modal -->
            <div class="modal" id="createPlanModal">
                <div class="modal-dialog">
                    <div class="modal-header">
                        <h3>Create New Subscription Plan</h3>
                        <button class="btn btn-icon modal-close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
<!-->Create New Subscription Plan<-->
                </div>
            </div>


                </div>
            </div>
        </main>
    </div>

    <script src="/admin/js/payment.js"></script>
    <script src="/ejs/scripts.js"></script>
    <script src="/wjs/event.js"></script>
    <script src="/admin/js/member.js"></script>
    <script src="/djs/blog.js"></script>



</body>
</html>
