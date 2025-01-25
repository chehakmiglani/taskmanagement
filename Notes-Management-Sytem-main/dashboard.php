<?php
// dashboard.php (example)
// You can adapt any PHP logic/data here as needed.
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TaskMinder - Dashboard (PHP)</title>

  <!-- Google Fonts (optional) -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <!-- FontAwesome (optional, for icons) -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
  
  <!-- Inline CSS -->
  <style>
    /* Base resets */
    * {
      margin: 0; 
      padding: 0; 
      box-sizing: border-box;
    }
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f7f9fc;
      color: #333;
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      display: flex;
      flex-direction: column;
      padding: 1rem;
    }
    .logo {
      display: flex;
      align-items: center;
      padding: 1rem 0;
      font-weight: 600; 
      font-size: 1.2rem;
    }
    .logo i {
      margin-right: 0.5rem;
      color: #6366f1; /* Purple accent */
    }
    .nav-links {
      list-style: none; 
      margin-top: 2rem;
    }
    .nav-links li {
      padding: 0.8rem 0; 
      cursor: pointer;
      display: flex; 
      align-items: center;
      color: #555; 
      transition: background 0.3s;
    }
    .nav-links li i {
      margin-right: 1rem; 
      width: 20px;
    }
    .nav-links li.active,
    .nav-links li:hover {
      color: #6366f1;
    }
    .badge {
      background: #f87171;
      color: #fff;
      border-radius: 8px;
      padding: 0.2rem 0.6rem;
      font-size: 0.8rem;
      margin-left: auto;
    }
    .promo-box {
      background: #eef2ff;
      margin-top: auto;
      padding: 1rem;
      text-align: center;
      border-radius: 8px;
    }
    .promo-box h4 {
      margin-bottom: 1rem; 
      font-size: 0.9rem; 
      line-height: 1.4;
    }
    .promo-box button {
      background: #6366f1; 
      color: #fff;
      border: none; 
      padding: 0.5rem 1rem;
      border-radius: 6px; 
      cursor: pointer;
    }

    /* Main content */
    .main-content {
      flex: 1; 
      padding: 1rem 2rem;
    }

    /* Topbar */
    .topbar {
      display: flex; 
      align-items: center;
      justify-content: space-between;
      margin-bottom: 2rem;
    }
    .topbar h2 {
      font-weight: 600; 
      font-size: 1.5rem;
    }
    .user-highlight { 
      color: #6366f1; 
    }
    .topbar p {
      color: #888; 
      margin-left: 1rem;
    }
    .search-bar {
      margin-left: auto; 
      margin-right: 2rem;
      position: relative; 
      display: inline-block;
    }
    .search-bar input {
      padding: 0.5rem 2rem 0.5rem 0.8rem;
      border: 1px solid #ddd; 
      border-radius: 20px;
      font-size: 0.9rem;
    }
    .search-bar i {
      position: absolute; 
      right: 0.8rem; 
      top: 50%;
      transform: translateY(-50%);
      color: #aaa;
    }
    .topbar-profile {
      display: flex; 
      align-items: center;
    }
    .topbar-profile img {
      width: 40px; 
      height: 40px; 
      border-radius: 50%;
      margin-right: 0.5rem;
    }
    .topbar-profile .user-name {
      font-weight: 500; 
      margin-right: 0.5rem;
    }
    .topbar-profile .user-role {
      font-size: 0.8rem; 
      color: #aaa;
      margin-right: 1rem;
    }
    .topbar-profile i {
      font-size: 1.2rem; 
      color: #6366f1;
      margin-left: 0.5rem; 
      cursor: pointer;
    }

    /* Dashboard Cards (Top row) */
    .dashboard-cards {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .task-card {
      background: #fff;
      border-radius: 8px;
      padding: 1rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.02);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
    }
    .task-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .task-card h3 {
      font-size: 1rem; 
      margin-bottom: 0.5rem;
    }
    .subtext {
      font-size: 0.85rem; 
      color: #777;
      margin-bottom: 1rem;
    }
    .progress-row {
      display: flex; 
      justify-content: space-between;
      font-size: 0.85rem; 
      margin-bottom: 0.2rem;
    }
    .progress-bar {
      height: 6px; 
      background: #e5e7eb;
      border-radius: 4px; 
      margin-bottom: 1rem;
    }
    .progress-fill {
      height: 100%; 
      background: #6366f1;
      border-radius: 4px;
    }
    .card-footer {
      display: flex; 
      align-items: center;
      justify-content: space-between;
    }
    .due-date {
      font-size: 0.8rem;
      background: #fee2e2;
      color: #ef4444;
      padding: 0.3rem 0.6rem;
      border-radius: 6px;
    }
    .stats {
      display: flex; 
      gap: 0.5rem;
      font-size: 0.85rem; 
      color: #555;
    }
    .avatar-group img {
      border-radius: 50%; 
      margin-left: -8px;
      border: 2px solid #fff;
    }

    /* Detail Button on each card */
    .detail-btn {
      margin-top: 1rem;
      background: #6366f1;
      color: #fff;
      border: none; 
      padding: 0.5rem 1rem;
      border-radius: 6px; 
      cursor: pointer;
      font-size: 0.9rem;
    }

    /* Projects Section */
    .projects-section {
      display: grid; 
      grid-template-columns: 2fr 2fr 1fr; 
      gap: 1.5rem;
    }
    .projects-list h2 {
      margin-bottom: 1rem; 
      font-size: 1.2rem;
    }
    .projects-list .project-card {
      background: #fff; 
      padding: 1rem; 
      margin-bottom: 1rem;
      border-radius: 8px; 
      box-shadow: 0 0 10px rgba(0,0,0,0.02);
      position: relative;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .projects-list .project-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }
    .projects-list .project-card h4 {
      font-size: 1rem; 
      margin-bottom: 0.3rem;
    }
    .projects-list .project-card p {
      font-size: 0.85rem; 
      color: #666; 
      margin-bottom: 1rem;
    }
    .tag-row {
      display: flex; 
      gap: 0.5rem; 
      margin-bottom: 0.5rem;
    }
    .tag {
      padding: 0.3rem 0.6rem; 
      border-radius: 6px;
      font-size: 0.75rem; 
      background: #eef2ff; 
      color: #6366f1;
    }
    .avatar-group {
      display: flex;
    }
    .avatar-group img {
      width: 28px; 
      height: 28px; 
      border-radius: 50%;
      margin-left: -8px; 
      border: 2px solid #fff;
    }

    /* Activity Section */
    .activity-section {
      display: flex; 
      flex-direction: column; 
      gap: 1rem;
    }
    .task-activity {
      background: #fff; 
      border-radius: 8px; 
      padding: 1rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.02);
    }
    .task-activity h3 { 
      margin-bottom: 1rem; 
    }

    /* Engaging Donut Chart Animation */
    .donut-chart {
      position: relative; 
      width: 120px; 
      height: 120px;
      margin: 1rem auto; 
      border-radius: 50%;
      background: conic-gradient(#6366f1 0% 58%, #fbbf24 58% 90%, #93c5fd 90% 100%);

      /* pop-in animation on page load */
      transform-origin: center;
      animation: chartLoad 0.8s ease-out forwards;
    }
    @keyframes chartLoad {
      0% {
        transform: scale(0);
      }
      100% {
        transform: scale(1);
      }
    }
    /* slight hover effect */
    .donut-chart:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .chart-circle {
      position: absolute; 
      top: 50%; 
      left: 50%;
      width: 80px; 
      height: 80px; 
      background: #fff;
      border-radius: 50%; 
      transform: translate(-50%, -50%);
    }
    .chart-label {
      position: absolute; 
      top: 50%; 
      left: 50%;
      transform: translate(-50%, -50%);
      font-weight: 600; 
      font-size: 1.2rem; 
      color: #444;
    }
    .chart-legend {
      display: flex; 
      justify-content: space-around;
      margin-top: 1rem; 
      font-size: 0.85rem;
    }
    .legend-color {
      display: inline-block; 
      width: 12px; 
      height: 12px;
      margin-right: 0.3rem; 
      border-radius: 2px;
    }
    .progress-color { background: #6366f1; }
    .todo-color { background: #fbbf24; }
    .completed-color { background: #93c5fd; }

    .member-comments {
      background: #fff; 
      border-radius: 8px; 
      padding: 1rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.02);
    }
    .member-comments h3 { 
      margin-bottom: 1rem; 
    }
    .member-comments ul { 
      list-style: none; 
    }
    .member-comments li { 
      margin-bottom: 1rem; 
    }
    .member-comments li strong {
      display: inline-block; 
      margin-right: 1rem; 
      color: #333;
    }
    .comment-date {
      font-size: 0.75rem; 
      color: #aaa; 
      margin-left: 0.2rem;
    }
    .member-comments p { 
      font-size: 0.9rem; 
      margin-top: 0.3rem; 
    }

    /* Popup Overlay */
    .task-popup {
      display: none; /* Hidden by default */
      position: fixed; 
      z-index: 999;
      left: 0; 
      top: 0; 
      width: 100%; 
      height: 100%;
      overflow: auto; 
      background-color: rgba(0,0,0,0.4);
      justify-content: center; 
      align-items: center;
    }

    /* Popup Content Box */
    .task-popup-content {
      background: #fff; 
      margin: 10% auto;
      padding: 2rem; 
      width: 400px; 
      border-radius: 8px;
      position: relative;
    }

    /* Close button (X) */
    .task-popup-content .close {
      position: absolute; 
      top: 1rem; 
      right: 1rem;
      font-size: 1.2rem; 
      cursor: pointer;
    }

    /* Progress Label in Pop-up */
    .popup-progress-value {
      margin-top: 0.5rem;
      font-size: 0.9rem;
      color: #555;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="logo">
      <i class="fas fa-tasks"></i>
      <span>TaskMinder</span>
    </div>
    <ul class="nav-links">
      <li class="active"><i class="fas fa-home"></i> Dashboard</li>
      <li><i class="fas fa-clipboard-list"></i> Projects</li>
      <li><i class="fas fa-chart-line"></i> Analytics</li>
      <li><i class="fas fa-calendar-alt"></i> Calendar</li>
      <li><i class="fas fa-envelope"></i> Message <span class="badge">5</span></li>
      <li><i class="fas fa-file-alt"></i> Reports</li>
      <li><i class="fas fa-cog"></i> Settings</li>
    </ul>
    <div class="promo-box">
      <h4>Free promotion of<br>your first resume</h4>
      <button>Learn more</button>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Topbar -->
    <header class="topbar">
      <h2>Hello, <span class="user-highlight">Chehak</span></h2>
      <p>Lets organize your Daily Tasks</p>
      <div class="search-bar">
        <input type="text" placeholder="Search">
        <i class="fas fa-search"></i>
      </div>
      <div class="topbar-profile">
        <span class="user-name">Chehak Miglani</span>
        <small class="user-role">User</small>
        <i class="fas fa-bell"></i>
      </div>
    </header>

    <!-- Dashboard Cards (Top row) -->
    <section class="dashboard-cards">
      <!-- Card #1 -->
      <div class="task-card" data-taskid="1" data-progress="80">
        <h3>Design few mobile screens</h3>
        <p class="subtext">Dropbox mobile app</p>
        <div class="progress-row">
          <span>Progress</span>
          <span>8/10</span>
        </div>
        <div class="progress-bar">
          <div class="progress-fill" style="width:80%;"></div>
        </div>
        <div class="card-footer">
          <p class="due-date">26 AUG 2023</p>
          <div class="stats">
            <span><i class="far fa-comment"></i> 4</span>
            <span><i class="far fa-eye"></i> 5</span>
          </div>
        </div>
        <!-- Detail Button -->
        <button class="detail-btn" onclick="openDetails('popup-1')">Details</button>
      </div>
      <!-- Popup #1 -->
      <div class="task-popup" id="popup-1">
        <div class="task-popup-content">
          <span class="close" onclick="closeDetails('popup-1')">&times;</span>
          <h2>Task Details</h2>
          <p><strong>Task:</strong> Design few mobile screens</p>
          <p><strong>Due Date:</strong> 26 AUG 2023</p>
          <label for="progress-range-1">Progress (0-100):</label>
          <input 
            type="range" 
            id="progress-range-1" 
            min="0" 
            max="100" 
            value="80" 
            oninput="updateProgress(this.value, 'popup-1')"
          >
          <p class="popup-progress-value">Current Progress: <span>80%</span></p>
          <button onclick="markAsComplete('popup-1')">Mark as Completed</button>
        </div>
      </div>

      <!-- Card #2 -->
      <div class="task-card" data-taskid="2" data-progress="50">
        <h3>Design more mobile screens</h3>
        <p class="subtext">Additional layout tweaks</p>
        <div class="progress-row">
          <span>Progress</span>
          <span>5/10</span>
        </div>
        <div class="progress-bar">
          <div class="progress-fill" style="width:50%;"></div>
        </div>
        <div class="card-footer">
          <p class="due-date">10 SEP 2023</p>
          <div class="stats">
            <span><i class="far fa-comment"></i> 2</span>
            <span><i class="far fa-eye"></i> 6</span>
          </div>
        </div>
        <!-- Detail Button -->
        <button class="detail-btn" onclick="openDetails('popup-2')">Details</button>
      </div>
      <!-- Popup #2 -->
      <div class="task-popup" id="popup-2">
        <div class="task-popup-content">
          <span class="close" onclick="closeDetails('popup-2')">&times;</span>
          <h2>Task Details</h2>
          <p><strong>Task:</strong> Design more mobile screens</p>
          <p><strong>Due Date:</strong> 10 SEP 2023</p>
          <label for="progress-range-2">Progress (0-100):</label>
          <input 
            type="range" 
            id="progress-range-2" 
            min="0" 
            max="100" 
            value="50" 
            oninput="updateProgress(this.value, 'popup-2')"
          >
          <p class="popup-progress-value">Current Progress: <span>50%</span></p>
          <button onclick="markAsComplete('popup-2')">Mark as Completed</button>
        </div>
      </div>
    </section>

    <!-- Projects Sections -->
    <section class="projects-section">
      <!-- "To Do (03)" with dummy tasks + pop-ups -->
      <div class="projects-list">
        <h2>To Do (03)</h2>

        <!-- To Do #1 -->
        <div class="project-card" id="todo-1">
          <h4>Complete Operating Systems Assignment</h4>
          <p>Focus on memory management chapter. Due next Monday.</p>
          <div class="tag-row">
            <span class="tag">School</span>
            <span class="tag">OS</span>
          </div>
          <div class="avatar-group">

        </div>
          <button class="detail-btn" onclick="openDetails('popup-3')">Details</button>
        </div>
        <!-- Popup #3 -->
        <div class="task-popup" id="popup-3">
          <div class="task-popup-content">
            <span class="close" onclick="closeDetails('popup-3')">&times;</span>
            <h2>Task Details</h2>
            <p><strong>Task:</strong> Complete OS Assignment</p>
            <p><strong>Deadline:</strong> Next Monday</p>
            <label for="progress-range-3">Progress (0-100):</label>
            <input 
              type="range" 
              id="progress-range-3" 
              min="0" 
              max="100" 
              value="0" 
              oninput="updateProgress(this.value, 'popup-3')"
            >
            <p class="popup-progress-value">Current Progress: <span>0%</span></p>
            <button onclick="markAsComplete('popup-3')">Mark as Completed</button>
          </div>
        </div>

        <!-- To Do #2 -->
        <div class="project-card" id="todo-2">
          <h4>Prepare for Mid-Sem Exams</h4>
          <p>Topics: DBMS, OOP, Data Structures. Create revision notes.</p>
          <div class="tag-row">
            <span class="tag">Study</span>
          </div>
          <div class="avatar-group">


        </div>
          <button class="detail-btn" onclick="openDetails('popup-4')">Details</button>
        </div>
        <!-- Popup #4 -->
        <div class="task-popup" id="popup-4">
          <div class="task-popup-content">
            <span class="close" onclick="closeDetails('popup-4')">&times;</span>
            <h2>Task Details</h2>
            <p><strong>Task:</strong> Prepare for Mid-Sem Exams</p>
            <p><strong>Focus:</strong> DBMS, OOP, Data Structures</p>
            <label for="progress-range-4">Progress (0-100):</label>
            <input 
              type="range" 
              id="progress-range-4" 
              min="0" 
              max="100" 
              value="0" 
              oninput="updateProgress(this.value, 'popup-4')"
            >
            <p class="popup-progress-value">Current Progress: <span>0%</span></p>
            <button onclick="markAsComplete('popup-4')">Mark as Completed</button>
          </div>
        </div>

        <!-- To Do #3 -->
        <div class="project-card" id="todo-3">
          <h4>Organize College Club Event</h4>
          <p>Plan date, venue, and sponsorship for the Tech Club workshop.</p>
          <div class="tag-row">
            <span class="tag">Event</span>
            <span class="tag">Leadership</span>
          </div>
          <div class="avatar-group">
           
          </div>
          <button class="detail-btn" onclick="openDetails('popup-5')">Details</button>
        </div>
        <!-- Popup #5 -->
        <div class="task-popup" id="popup-5">
          <div class="task-popup-content">
            <span class="close" onclick="closeDetails('popup-5')">&times;</span>
            <h2>Task Details</h2>
            <p><strong>Task:</strong> Organize College Club Event</p>
            <p><strong>Goal:</strong> Venue & sponsorship planning</p>
            <label for="progress-range-5">Progress (0-100):</label>
            <input 
              type="range" 
              id="progress-range-5" 
              min="0" 
              max="100" 
              value="0" 
              oninput="updateProgress(this.value, 'popup-5')"
            >
            <p class="popup-progress-value">Current Progress: <span>0%</span></p>
            <button onclick="markAsComplete('popup-5')">Mark as Completed</button>
          </div>
        </div>
      </div>

      <!-- "In Progress (03)" with dummy tasks + pop-ups -->
      <div class="projects-list">
        <h2>In Progress (03)</h2>

        <!-- In Progress #1 -->
        <div class="project-card" id="inprogress-1">
          <h4>Build a React Project</h4>
          <p>Focus on user auth and DB integration. Final submission soon.</p>
          <div class="tag-row">
            <span class="tag">React</span>
            <span class="tag">JS</span>
          </div>
          <div class="avatar-group">
          </div>
          <button class="detail-btn" onclick="openDetails('popup-6')">Details</button>
        </div>
        <!-- Popup #6 -->
        <div class="task-popup" id="popup-6">
          <div class="task-popup-content">
            <span class="close" onclick="closeDetails('popup-6')">&times;</span>
            <h2>Task Details</h2>
            <p><strong>Task:</strong> Build a React Project</p>
            <p><strong>Focus:</strong> Auth & DB Integration</p>
            <label for="progress-range-6">Progress (0-100):</label>
            <input 
              type="range" 
              id="progress-range-6" 
              min="0" 
              max="100" 
              value="40" 
              oninput="updateProgress(this.value, 'popup-6')"
            >
            <p class="popup-progress-value">Current Progress: <span>40%</span></p>
            <button onclick="markAsComplete('popup-6')">Mark as Completed</button>
          </div>
        </div>

        <!-- In Progress #2 -->
        <div class="project-card" id="inprogress-2">
          <h4>Study for Algorithms Lab Test</h4>
          <p>Practice sorting, graph algorithms, complexity analysis.</p>
          <div class="tag-row">
            <span class="tag">Algorithms</span>
          </div>
          <div class="avatar-group">
            
          </div>
          <button class="detail-btn" onclick="openDetails('popup-7')">Details</button>
        </div>
        <!-- Popup #7 -->
        <div class="task-popup" id="popup-7">
          <div class="task-popup-content">
            <span class="close" onclick="closeDetails('popup-7')">&times;</span>
            <h2>Task Details</h2>
            <p><strong>Task:</strong> Study for Algorithms Lab Test</p>
            <p><strong>Topics:</strong> Sorting, Graphs, Complexity</p>
            <label for="progress-range-7">Progress (0-100):</label>
            <input 
              type="range" 
              id="progress-range-7" 
              min="0" 
              max="100" 
              value="20" 
              oninput="updateProgress(this.value, 'popup-7')"
            >
            <p class="popup-progress-value">Current Progress: <span>20%</span></p>
            <button onclick="markAsComplete('popup-7')">Mark as Completed</button>
          </div>
        </div>

        <!-- In Progress #3 -->
        <div class="project-card" id="inprogress-3">
          <h4>Internship Application Prep</h4>
          <p>Update resume and LinkedIn, gather references and portfolio.</p>
          <div class="tag-row">
            <span class="tag">Career</span>
            <span class="tag">Resume</span>
          </div>
          <div class="avatar-group">
          </div>
          <button class="detail-btn" onclick="openDetails('popup-8')">Details</button>
        </div>
        <!-- Popup #8 -->
        <div class="task-popup" id="popup-8">
          <div class="task-popup-content">
            <span class="close" onclick="closeDetails('popup-8')">&times;</span>
            <h2>Task Details</h2>
            <p><strong>Task:</strong> Internship Application Prep</p>
            <p><strong>Focus:</strong> Resume, LinkedIn, References</p>
            <label for="progress-range-8">Progress (0-100):</label>
            <input 
              type="range" 
              id="progress-range-8" 
              min="0" 
              max="100" 
              value="30" 
              oninput="updateProgress(this.value, 'popup-8')"
            >
            <p class="popup-progress-value">Current Progress: <span>30%</span></p>
            <button onclick="markAsComplete('popup-8')">Mark as Completed</button>
          </div>
        </div>
      </div>

      <div class="activity-section">
        <div class="task-activity">
          <h3>Task Activity</h3>
          <div class="donut-chart">
            <div class="chart-circle"></div>
            <div class="chart-label">58%</div>
          </div>
          <div class="chart-legend">
            <div><span class="legend-color progress-color"></span> Progress</div>
            <div><span class="legend-color todo-color"></span> To-Do</div>
            <div><span class="legend-color completed-color"></span> Completed</div>
          </div>
        </div>

        <div class="member-comments">
          <h3>Member Comments</h3>
          <ul>
            <li>
              <strong>Godwin</strong>
              <span class="comment-date">Today</span>
              <p>Creative work man, change the color</p>
            </li>
            <li>
              <strong>Raji</strong>
              <span class="comment-date">11 Apr 2023</span>
              <p>Ok Well done</p>
            </li>
            <li>
              <strong>Johan</strong>
              <span class="comment-date">11 Apr 2023</span>
              <p>Good Job Man!</p>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>

  <!-- Inline JavaScript -->
  <script>
  // Show pop-up details
  function openDetails(popupId) {
    document.getElementById(popupId).style.display = 'flex';
  }

  // Hide pop-up details
  function closeDetails(popupId) {
    document.getElementById(popupId).style.display = 'none';
  }

  // Live-update the progress text in the pop-up
  function updateProgress(value, popupId) {
    const popup = document.getElementById(popupId);
    const progressValue = popup.querySelector('.popup-progress-value span');
    if (progressValue) {
      progressValue.textContent = value + '%';
    }
  }

  // Mark as completed sets progress to 100%
  function markAsComplete(popupId) {
    const popup = document.getElementById(popupId);
    const range = popup.querySelector('input[type="range"]');
    if (range) {
      range.value = 100;
      updateProgress(100, popupId);
    }
  }
  </script>

</body>
</html>
