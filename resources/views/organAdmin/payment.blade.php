<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMMS - Payments & Subscriptions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/orgAdmin/css/payment.css">
    <link rel="stylesheet" href="/orgAdmin/css/blog.css">
    <link rel="stylesheet" href="/orgAdmin/css/event.css">
    <link rel="stylesheet" href="/orgAdmin/js/styles.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        @include('organAdmin.sidebar nav')
        
        <!-- Main Content Area -->
        <main class="main-content">
            <header class="main-header">
                <h1>Payments & Subscriptions</h1>
                <div class="header-actions">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" id="addPaymentBtn">
                            <i class="fas fa-plus"></i> Add Payment
                            <i class="fas fa-chevron-down"></i>
                        </button>
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
                <p>Manage your organization's subscription plans and payments</p>
            </div>
            
            <!-- Tabs Navigation -->
            <div class="tabs">
                <button class="tab-btn active" data-tab="subscriptions">Payment Transactions</button>
            
                <button class="tab-btn" data-tab="invoices">Invoices & Receipts</button>
            </div>
            
            <!-- Subscriptions Tab -->
            <div class="tab-content active" id="subscriptions">
                <div class="action-bar">
                    <button class="btn btn-primary" id="createPlanBtn">
                        <i class="fas fa-plus"></i> Create Plan
                    </button>
                    
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
                                    <td>${{$payment->amount}}</td>
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
            
            <!-- Transactions Tab (Hidden by default) -->
            <div class="tab-content" id="transactions">
                <div class="card">
                    <p>Payment transactions will appear here</p>
                </div>
            </div>
            
            <!-- Invoices Tab (Hidden by default) -->
            <div class="tab-content" id="invoices">
                <div class="card">
                    <p>Invoices and receipts will appear here</p>
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
                  <!--  <div class="modal-body">
                        <form id="createPlanForm">
                            <div class="form-group">
                                <label for="planName">Plan Name</label>
                                <input type="text" id="planName" class="form-control" required>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="planPrice">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$/ETB</span>
                                        <input type="number" id="planPrice" class="form-control" min="0" step="0.01" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="billingInterval">Billing Interval</label>
                                    <select id="billingInterval" class="form-control" required>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                        <option value="one-time">One-time</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="planDescription">Description</label>
                                <textarea id="planDescription" class="form-control" rows="3"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="planFeatures">Features (one per line)</label>
                                <textarea id="planFeatures" class="form-control" rows="4" placeholder="Feature 1\nFeature 2\nFeature 3"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="planStatus">Status</label>
                                <select id="planStatus" class="form-control">
                                    <option value="available">Available</option>
                                    <option value="hidden">Hidden</option>
                                    <option value="archived">Archived</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline modal-close">Cancel</button>
                        <button class="btn btn-primary" type="submit" form="createPlanForm">Create Plan</button>
                    </div>-->
                </div>
            </div>
            
            <!-- Manual Payment Modal -->
            <div class="modal" id="manualPaymentModal">
                <div class="modal-dialog">
                    <div class="modal-header">
                        <h3>Record Manual Payment</h3>
                        <button class="btn btn-icon modal-close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="manualPaymentForm" action="{{url('uploadpayment')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                        <div class="form-group">
                                <label for="planName">Full Name</label>
                                <input type="text" id="planName" placeholder="Enter your name" name="name"  class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="planName">Organization Name</label>
                                <input type="text" id="planName" placeholder="Enter your oeganization name" name="organ_name"  class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="planName">Plan Name</label>
                                <input type="text" id="planName" placeholder="Enter your plan e.g Basic, Pro, Enter" name="plan"  class="form-control" required>
                            </div>
                            
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="paymentAmount">Amount/Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$/ETB</span>
                                        <input type="number" id="paymentAmount" class="form-control" min="0" step="0.01" name="amount" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="billingInterval">Billing Interval</label>
                                    <select id="billingInterval" class="form-control" name="billing" required>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                        <option value="one-time">One-time</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="paymentMethod">Payment Method</label>
                                <select id="paymentMethod" class="form-control"  name="payment_method" required>
                                    <option value="cash" >Cash</option>
                                    <option value="check">Check</option>
                                    <option value="bank-transfer">Bank Transfer</option>
                                    <option value="e-birr">E-Birr</option>
                                    <option value="telebirr">TeleBirr</option>
                                    
                                </select>
                            </div>
                            
                          
                            
                      
                    <div class="modal-footer">
                        <button class="btn btn-outline modal-close">Cancel</button>
                        <button class="btn btn-primary" type="submit" form="manualPaymentForm">Record Payment</button>
                    </div>
                         
                    </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="/orgAdmin/js/payment.js"></script>
    <script src="/ejs/scripts.js"></script>
    <script src="/wjs/event.js"></script>
    <script src="/orgAdmin/js/member.js"></script>
    <script src="/djs/blog.js"></script>
  


</body>
</html>