<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Membership Profile</title>
  <style>
    * {margin:0;padding:0;box-sizing:border-box;font-family:Arial, sans-serif;}

    body {
      display: flex;
      min-height: 100vh;
      background: #f5f7fb;
      color: #333;
    }

    /* Sidebar */.sidebar {
      width: 240px;
      background: #fff;
      border-right: 1px solid #ddd;
      padding: 20px;
    }
    .sidebar h3 { margin-bottom: 20px; font-size: 18px; }
    .sidebar ul { list-style: none; }
    .sidebar li { margin: 10px 0; }
    .sidebar a {
      display: block;
      padding: 10px;
      border-radius: 6px;
      color: #333;
      transition: 0.2s;
    }
    .sidebar a.active, .sidebar a:hover {
      background: #eef3ff;
      color: #2d64ff;
      font-weight: bold;
    }
    .sidebar ul li:hover, .sidebar ul li.active {
      background: #f0f4ff;
      border-left: 4px solid #2563eb;
      color: #2563eb;
    }
    .sidebar ul li a {
      color: inherit;
      text-decoration: none;
      display: block;
    }

    /* Main */
    .main {
      flex: 1;
      padding: 20px;
      margin-bottom: 60px;
    }
    .header {
      margin-bottom: 20px;
    }
    .header h1 { font-size: 20px; }
    .header p { font-size: 14px; color:#555; }

    /* Profile Layout */
    .profile-container {
      display: grid;
      grid-template-columns: 300px 1fr;
      gap: 20px;
    }
    .profile-card, .info-card {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .profile-card {
      text-align: center;
    }
    .profile-card img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin-bottom: 10px;
      object-fit: cover;
    }
    .upload-btn {
      display: inline-block;
      font-size: 12px;
      color: #2563eb;
      cursor: pointer;
      margin-bottom: 15px;
    }
    .profile-card p {
      margin: 6px 0;
      font-size: 14px;
    }
    .status {
      color: green;
      font-weight: bold;
    }

    .info-card h3 {
      margin-bottom: 10px;
      font-size: 16px;
    }
    .form-group {
      margin-bottom: 12px;
    }
    .form-group label {
      display: block;
      font-size: 13px;
      margin-bottom: 4px;
      color: #555;
    }
    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }

    /* Buttons */
    .btns {
      display: flex;
      gap: 10px;
      margin-bottom: 15px;
    }
    .btn {
      padding: 8px 12px;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
    }
    .btn-download {
      background: #22c55e;
      color: white;
    }
    .btn-edit {
      background: #2563eb;
      color: white;
    }

    /* Bottom Navigation (Mobile/Tablet) */


    /* Responsive */
    @media (max-width: 900px) {
      .profile-container {
        grid-template-columns: 1fr;
      }
    }
    @media (max-width: 768px) {
      body { flex-direction: column; }
      .sidebar { display: none; }
      .bottom-nav { display: flex; }
    }

      /* Responsive */
@media(max-width: 768px) {
  .container { flex-direction: column; }

  /* Sidebar turns into bottom nav */
  .sidebar {
    width: 100%;
    border-right: none;
    border-top: 1px solid #ddd;
    border-bottom: none;
    position: fixed;
    bottom: 0;
    left: 0;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 10px 0;
    z-index: 1000;
  }

  .sidebar h3 { display: none; }
  .sidebar ul {
    display: flex;
    width: 100%;
    justify-content: space-around;
  }
  .sidebar li { margin: 0; }
  .sidebar a {
    padding: 10px;
    font-size: 14px;
    border-radius: 0;
  }

  /* Push content above bottom nav */
  .content {
    padding-bottom: 70px;
  }

  .rsvp { flex-direction: column; align-items: flex-start; }
  .rsvp-buttons { margin-top: 8px; }
}
  </style>
</head>
<body>
  <!-- Sidebar -->
   @include('member.sidebar')

  <!-- Main -->
  <div class="main">
    <x-app-layout>



                    </x-app-layout>
    <div class="header">
      <h1>Membership Profile</h1>
      <p>Manage your personal information and membership details</p>
    </div>

    <div class="btns">
      <button class="btn btn-download"></button>
      <button class="btn btn-edit">✎ Edit Profile</button>
    </div>

    <div class="profile-container">
      <!-- Left: Profile Info -->
      <div class="profile-card">
        <img src="https://via.placeholder.com/120" alt="Profile Picture">
        <label class="upload-btn">📷 Change Photo</label>
        <p><strong>Membership Type:</strong> Premium Member</p>
        <p><strong>Member Since:</strong> Aug 2025</p>
        <p><strong>Status:</strong> <span class="status">Active</span></p>
        <p><strong>Renewal Date:</strong> Oct 31, 2025</p>
        <p><strong> Role:</strong> Member of Organization</p>
      </div>

      <!-- Right: Personal Info -->
      <div class="info-card">
        <h3>Personal Information</h3>
        <div class="form-group">
          <label>First Name</label>
          <input type="text" value="Harife">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" value="E">
        </div>
        <div class="form-group">
          <label>Email Address</label>
          <input type="email" value="harife@email.com">
        </div>
        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" value="+251 911 223344">
        </div>
        <div class="form-group">
          <label>Address</label>
          <input type="text" value="Dire Dawa">
        </div>
        <div class="form-group">
          <label>City</label>
          <input type="text" value="Dire Dawa">
        </div>
        <div class="form-group">
          <label>State</label>
          <input type="text" value="Dire Dawa">
        </div>
        <div class="form-group">
          <label>ZIP Code</label>
          <input type="text" value="">
        </div>
        <div class="form-group">
          <label>Date of Birth</label>
          <input type="text" value="03/15/2003">
        </div>
        <h3>Emergency Contact</h3>
        <div class="form-group">
          <label>Contact Name</label>
          <input type="text" value="Harife E">
        </div>
        <div class="form-group">
          <label>Contact Phone</label>
          <input type="text" value="+251 911 223344">
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Navigation (Mobile/Tablet) -->

  <script>
    // Bottom nav active toggle
    document.querySelectorAll('.bottom-nav div').forEach(item => {
      item.addEventListener('click', () => {
        document.querySelectorAll('.bottom-nav div').forEach(nav => nav.classList.remove('active'));
        item.classList.add('active');
      });
    });
  </script>
</body>
</html>
