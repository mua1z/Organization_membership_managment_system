<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Member Dashboard</title>
  <style>
    /* Reset */
    * {margin:0;padding:0;box-sizing:border-box;font-family:Arial, sans-serif;}

    body {
      display: flex;
      min-height: 100vh;
      background: #f5f7fb;
      color: #333;
    }

    /* Sidebar (Desktop)
    .sidebar {
      width: 240px;
      background: #fff;
      border-right: 1px solid #ddd;
      padding: 20px 0;
      transition: all 0.3s ease;
    }
    .sidebar h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 18px;
      font-weight: bold;
    }
    .sidebar ul {
      list-style: none;
    }
    .sidebar ul li {
      padding: 12px 20px;
      cursor: pointer;
      transition: background 0.3s;
      text-align: left;
    }
    .sidebar ul li:hover, .sidebar ul li.active {
      background: #f0f4ff;
      border-left: 4px solid #2563eb;
      color: #2563eb;
    }
*/
    .sidebar {
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

    /* Main */
    .main {
      flex: 1;
      padding: 20px;
      margin-bottom: 60px; /* space for bottom bar on mobile */
    }
    .header {
      background: #2563eb;
      color: white;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    .header h1 { font-size: 20px; }
    .header p { font-size: 14px; }

    /* Cards */
    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin-bottom: 20px;
    }
    .card {
      background: #fff;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .card h3 {
      font-size: 14px;
      color: #666;
      margin-bottom: 8px;
    }
    .card p {
      font-size: 18px;
      font-weight: bold;
    }
    .status-active { color: green; }
    .status-expired { color: red; }

    /* Section */
    .section {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }
    .section-box {
      background: #fff;
      border-radius: 8px;
      padding: 15px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .section-box h3 {
      margin-bottom: 10px;
      font-size: 16px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .list-item {
      display: flex;
      justify-content: space-between;
      padding: 8px 0;
      border-bottom: 1px solid #eee;
      font-size: 14px;
    }
    .list-item:last-child { border-bottom: none; }

    .btn {
      color: #2563eb;
      font-size: 12px;
      cursor: pointer;
      text-decoration: underline;
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
  <!-- Sidebar (Desktop Only) -->

   @include('member.sidebar')


  <!-- Main -->
  <div class="main">
    <x-app-layout>



                    </x-app-layout>
    <div class="header">
      <h1>Welcome back, Harife!</h1>
      <p>Here’s your membership overview for today</p>
    </div>

    <div class="cards">
      <div class="card">
        <h3>Membership Status</h3>
        <p class="status-active">Active</p>
        <small>Premium Member <br> Expires: Oct 31, 2025</small>
      </div>
      <div class="card">
        <h3>Upcoming Events</h3>
        <p>5</p>
        <small>Next: Board Meeting – Sep 15, 10:00 AM</small>
      </div>
      <div class="card">
        <h3>Outstanding Dues</h3>
        <p style="color:orange;">ETB 0.00</p>
        <small>All payments up to date <br> Next due: Oct 2025</small>
      </div>
    </div>

    <div class="section">
      <div class="section-box">
        <h3>Upcoming Events <span class="btn">View All</span></h3>
        <div class="list-item">
          <span>Board Meeting (Sep 15, 10AM)</span>
          <span class="btn">RSVP</span>
        </div>
        <div class="list-item">
          <span>Community Outreach (Sep 18, 2PM)</span>
          <span class="btn">RSVP</span>
        </div>
      </div>

      <div class="section-box">
        <h3>Recent Payments <span class="btn">View All</span></h3>
        <div class="list-item">
          <span>Annual Membership Fee (Jan 15)</span>
          <span style="color:green;"> ETB 150.00 Paid</span>
        </div>
        <div class="list-item">
          <span>Event Registration (Jan 10)</span>
          <span style="color:green;">ETB 25.00 Paid</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Navigation (Mobile/Tablet) -->

  <script>
    document.querySelectorAll('.bottom-nav div').forEach(item => {
      item.addEventListener('click', () => {
        document.querySelectorAll('.bottom-nav div').forEach(nav => nav.classList.remove('active'));
        item.classList.add('active');
      });
    });
  </script>
</body>
</html>
