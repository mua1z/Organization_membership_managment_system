<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Participation</title>
  <style>
    /* === Reset & Base === */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fc;
      color: #333;
    }
    h2 { margin-bottom: 8px; }
    a { text-decoration: none; }

    /* === Layout === */
    .container {
      display: flex;
      min-height: 100vh;
    }
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

    .content {
      flex: 1;
      padding: 20px;
    }

    /* === Top Bar === */
    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 16px;
      flex-wrap: wrap;
    }
    .view-toggle button {
      border: 1px solid #ddd;
      background: #fff;
      padding: 6px 14px;
      margin-left: 5px;
      border-radius: 6px;
      cursor: pointer;
    }
    .view-toggle button.active {
      background: #2d64ff;
      color: #fff;
    }

    /* === Filters === */
    .filters {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 20px;
    }
    .filter-btn {
      border: 1px solid #ddd;
      background: #fff;
      padding: 6px 14px;
      border-radius: 20px;
      cursor: pointer;
      transition: 0.2s;
    }
    .filter-btn.active,
    .filter-btn:hover {
      background: #2d64ff;
      color: #fff;
    }

    /* === Event Cards === */
    .event-card {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 16px;
      margin-bottom: 16px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .event-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .tag {
      background: #eef3ff;
      color: #2d64ff;
      padding: 2px 8px;
      border-radius: 12px;
      font-size: 12px;
    }
    .agenda {
      margin-top: 10px;
      font-size: 14px;
    }
    .agenda li { margin: 4px 0; }

    /* RSVP Buttons */
    .rsvp {
      margin-top: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .rsvp-buttons button {
      border: none;
      padding: 6px 12px;
      margin: 0 4px;
      border-radius: 20px;
      cursor: pointer;
      transition: 0.2s;
    }
    .rsvp-buttons button.yes { background: #d4f8d4; }
    .rsvp-buttons button.maybe { background: #fff3cd; }
    .rsvp-buttons button.no { background: #f8d7da; }
    .rsvp-buttons button.active { font-weight: bold; border: 2px solid #333; }

    /* Ticket Button */
    .ticket-btn {
      margin-top: 10px;
      display: inline-block;
      background: #2d64ff;
      color: #fff;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 14px;
    }

    /* Calendar View */
    .calendar {
      display: none;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
    }

    /* Responsive */
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
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <h3>Member Dashboard</h3>
      <ul>
          <li class="active"><a href="{{url('/home')}}">📊 Overview</a></li>
      <li><a href="{{url('profile')}}">👤 Profile</a></li>
      <li><a href="{{url('event1')}}">📅 Events</a></li>
      <li><a href="blog.html">📰 Blog</a></li>
      <li><a href="#">💳 Payments</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        <x-app-layout>



                    </x-app-layout>
      <div class="topbar">
        <div>
          <h2>📆 Event Participation</h2>
          <p>Browse events, RSVP, and manage your participation</p>
        </div>
        <div class="view-toggle">
          <button id="listViewBtn" class="active">List</button>
          <button id="calendarViewBtn">Calendar</button>
        </div>
      </div>

      <!-- Filters -->
      <div class="filters">
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="meeting">Meeting</button>
        <button class="filter-btn" data-filter="volunteer">Volunteer</button>
        <button class="filter-btn" data-filter="fundraiser">Fundraiser</button>
        <button class="filter-btn" data-filter="training">Training</button>
      </div>

      <!-- Event List -->
      <div id="listView">
        <!-- Upcoming Event -->
        <div class="event-card" data-category="meeting">
          <div class="event-header">
            <h3>Board Meeting</h3>
            <span class="tag">Meeting</span>
          </div>
          <p>📅 2025-06-15 | 🕙 10:00 AM - 12:00 PM</p>
          <p>📍 Conference Room A, Main Office</p>
          <p>👥 12/15 attendees</p>
          <p>Monthly board meeting to discuss updates and planning.</p>
          <ul class="agenda">
            <li>Budget Review</li>
            <li>New Member Applications</li>
            <li>Upcoming Events Planning</li>
          </ul>
          <div class="rsvp">
            <span>RSVP Status:</span>
            <div class="rsvp-buttons">
              <button class="yes">Yes</button>
              <button class="maybe">Maybe</button>
              <button class="no">No</button>
            </div>
          </div>
          /*<a href="#" class="ticket-btn">🎟 Download Ticket</a>*/
        </div>

        <!-- Volunteer Event -->
        <div class="event-card" data-category="volunteer">
          <div class="event-header">
            <h3>Community Outreach Program</h3>
            <span class="tag">Volunteer</span>
          </div>
          <p>📅 2024-02-18 | 🕑 2:00 PM - 5:00 PM</p>
          <p>📍 Community Center, Downtown</p>
          <p>👥 25/30 attendees</p>
          <p>Volunteer opportunity to help with outreach and engagement.</p>
          <ul class="agenda">
            <li>Setup and Preparation</li>
            <li>Community Engagement</li>
            <li>Cleanup</li>
          </ul>
          <div class="rsvp">
            <span>RSVP Status:</span>
            <div class="rsvp-buttons">
              <button class="yes">Yes</button>
              <button class="maybe">Maybe</button>
              <button class="no">No</button>
            </div>
          </div>
        /*  <a href="#" class="ticket-btn">🎟 Download Ticket</a>*/
        </div>

        <!-- Past Event -->
        <div class="event-card" data-category="training">
          <div class="event-header">
            <h3>Leadership Training</h3>
            <span class="tag">Past Event</span>
          </div>
          <p>📅 2023-12-10 | 🕒 9:00 AM - 4:00 PM</p>
          <p>📍 Training Hall, City Center</p>
          <p>👥 40/40 attendees</p>
          <p>Past event: Leadership skills and organizational growth workshop.</p>
          <p><em>✅ You attended this event</em></p>
        </div>
      </div>

      <!-- Calendar View -->
      <div id="calendarView" class="calendar">
        <h3>📅 Calendar View</h3>
        <p>[Here you could integrate a real calendar plugin or events grid]</p>
      </div>
    </div>
  </div>

  <script>
    // RSVP Selection
    document.querySelectorAll('.rsvp button').forEach(btn => {
      btn.addEventListener('click', () => {
        const parent = btn.parentElement;
        parent.querySelectorAll('button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
      });
    });

    // Filter Events
    document.querySelectorAll('.filter-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        let filter = btn.dataset.filter;
        document.querySelectorAll('.event-card').forEach(card => {
          card.style.display = (filter === "all" || card.dataset.category === filter) ? "block" : "none";
        });
      });
    });

    // View Toggle
    const listBtn = document.getElementById('listViewBtn');
    const calBtn = document.getElementById('calendarViewBtn');
    const listView = document.getElementById('listView');
    const calView = document.getElementById('calendarView');

    listBtn.addEventListener('click', () => {
      listBtn.classList.add('active');
      calBtn.classList.remove('active');
      listView.style.display = "block";
      calView.style.display = "none";
    });

    calBtn.addEventListener('click', () => {
      calBtn.classList.add('active');
      listBtn.classList.remove('active');
      listView.style.display = "none";
      calView.style.display = "block";
    });

    // Example: Simple Reminder Alert (demo only)
    setTimeout(() => {
      alert("🔔 Reminder: You have 'Board Meeting' tomorrow at 10:00 AM");
    }, 5000);
  </script>
</body>
</html>
