<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TaskMinder - Dashboard</title>
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
  <!-- Your custom stylesheet -->
  <link rel="stylesheet" href="{% static 'css/style.css' %}">
<script src="{% static 'js/main.js' %}"></script>
<style>
    /* Reset and base fonts */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
html, body {
  font-family: 'Inter', sans-serif;
  background-color: #f7f9fc;
  color: #333;
}

/* Layout wrapper */
body {
  display: flex;
}

/* Sidebar styling */
.sidebar {
  width: 250px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0,0,0,0.05);
  display: flex;
  flex-direction: column;
  padding: 1rem;
  min-height: 100vh;
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
  color: #6366f1;  /* Purple accent */
}
.sidebar .nav-links {
  list-style: none;
  margin-top: 2rem;
}
.sidebar .nav-links li {
  padding: 0.8rem 0;
  cursor: pointer;
  display: flex;
  align-items: center;
  color: #555;
  transition: background 0.3s;
}
.sidebar .nav-links li i {
  margin-right: 1rem;
  width: 20px;
}
.sidebar .nav-links li.active,
.sidebar .nav-links li:hover {
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
  min-height: 100vh;
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

/* Dashboard Cards (top row) */
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
.stats i {
  margin-right: 0.2rem;
}
.avatar-group img {
  border-radius: 50%;
  margin-left: -8px;
  border: 2px solid #fff;
}

/* Projects Section */
.projects-section {
  display: grid;
  grid-template-columns: 2fr 2fr 1fr;
  gap: 1.5rem;
}
/* Two columns for projects, one for side activity */
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
.donut-chart {
  position: relative;
  width: 120px;
  height: 120px;
  margin: 1rem auto;
  border-radius: 50%;
  background: conic-gradient(#6366f1 0% 58%, #fbbf24 58% 90%, #93c5fd 90% 100%);
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

</style>
</head>
<body>

  <!-- Sidebar Navigation -->
  <aside class="sidebar">
    <div class="logo">
      <i class="fas fa-tasks"></i>
      <span>TaskMinder</span>
    </div>
    <ul class="nav-links">
      <li class="active"><i class="fas fa-home"></i> Dashboard</li>
      <li><i class="fas fa-clipboard-list"></i> Projects</li>
      <li><i class="fas fa-users"></i> Clients</li>
      <li><i class="fas fa-chart-line"></i> Analytics</li>
      <li><i class="fas fa-calendar-alt"></i> Calendar</li>
      <li><i class="fas fa-envelope"></i> Message <span class="badge">5</span></li>
      <li><i class="fas fa-file-alt"></i> Reports</li>
      <li><i class="fas fa-cog"></i> Settings</li>
    </ul>
    <div class="promo-box">
      <h4>Free promotion of <br />your first resume</h4>
      <button>Learn more</button>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Header / Topbar -->
    <header class="topbar">
      <h2>Hello, <span class="user-highlight">Chehak</span></h2>
      <p>Lets organize your Daily Tasks</p>
      <div class="search-bar">
        <input type="text" placeholder="Search" />
        <i class="fas fa-search"></i>
      </div>
      <div class="topbar-profile">
        <img src="https://via.placeholder.com/40" alt="User" />
        <span class="user-name">Masical Sumons</span>
        <small class="user-role">User</small>
        <i class="fas fa-bell"></i>
      </div>
    </header>

    <!-- Dashboard Overview -->
    <section class="dashboard-cards">
      <div class="task-card">
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
      </div>

      <div class="task-card">
        <h3>Create wireframe for ios app</h3>
        <p class="subtext">Oreo iOS app project</p>
        <div class="progress-row">
          <span>Progress</span>
          <span>7/10</span>
        </div>
        <div class="progress-bar">
          <div class="progress-fill" style="width:70%;"></div>
        </div>
        <div class="card-footer">
          <p class="due-date">14 NOV 2023</p>
          <div class="avatar-group">
            <img src="https://via.placeholder.com/24" alt="User 1" />
            <img src="https://via.placeholder.com/24" alt="User 2" />
          </div>
        </div>
      </div>

      <div class="task-card">
        <h3>Make twitter banner</h3>
        <p class="subtext">Twitter marketing</p>
        <div class="progress-row">
          <span>Progress</span>
          <span>9/10</span>
        </div>
        <div class="progress-bar">
          <div class="progress-fill" style="width:90%;"></div>
        </div>
        <div class="card-footer">
          <p class="due-date">08 JUN 2023</p>
          <div class="avatar-group">
            <img src="https://via.placeholder.com/24" alt="User" />
            <img src="https://via.placeholder.com/24" alt="User" />
          </div>
        </div>
      </div>

      <div class="task-card">
        <h3>Add more ui/ux mockups</h3>
        <p class="subtext">Pinterest promotion</p>
        <div class="progress-row">
          <span>Progress</span>
          <span>9/10</span>
        </div>
        <div class="progress-bar">
          <div class="progress-fill" style="width:90%;"></div>
        </div>
        <div class="card-footer">
          <p class="due-date">12 FEB 2023</p>
          <div class="avatar-group">
            <img src="https://via.placeholder.com/24" alt="User" />
          </div>
        </div>
      </div>
    </section>

    <!-- Projects Sections -->
    <section class="projects-section">
      <div class="projects-list">
        <h2>Working <span>(03)</span></h2>
        <div class="project-card">
          <h4>Slack</h4>
          <p>Creating a recognizable brand identity is pivotal in ensuring visibility.</p>
          <div class="tag-row">
            <span class="tag">iOS App</span>
            <span class="tag">Android</span>
          </div>
          <div class="avatar-group">
            <img src="https://via.placeholder.com/28" alt="User" />
            <img src="https://via.placeholder.com/28" alt="User" />
          </div>
        </div>

        <div class="project-card">
          <h4>Google</h4>
          <p>These Project will need a new brand identity where they will get recognize.</p>
          <div class="tag-row">
            <span class="tag">Branding</span>
          </div>
          <div class="avatar-group">
            <img src="https://via.placeholder.com/28" alt="User" />
            <img src="https://via.placeholder.com/28" alt="User" />
            <img src="https://via.placeholder.com/28" alt="User" />
          </div>
        </div>

        <div class="project-card">
          <h4>Blackberry</h4>
          <p>A strong brand identity is crucial for gaining recognition and establishing.</p>
          <div class="tag-row">
            <span class="tag">iOS App</span>
            <span class="tag">Android</span>
          </div>
          <div class="avatar-group">
            <img src="https://via.placeholder.com/28" alt="User" />
            <img src="https://via.placeholder.com/28" alt="User" />
          </div>
        </div>
      </div>

      <div class="projects-list">
        <h2>In progress <span>(03)</span></h2>
        <div class="project-card">
          <h4>Twitter</h4>
          <p>Establishing a distinctive brand identity is essential for achieving recognition</p>
          <div class="tag-row">
            <span class="tag">Website</span>
          </div>
          <div class="avatar-group">
            <img src="https://via.placeholder.com/28" alt="User" />
            <img src="https://via.placeholder.com/28" alt="User" />
          </div>
        </div>

        <div class="project-card">
          <h4>Maxis Tyres</h4>
          <p>These Project will need a new brand identity where they will get recognize.</p>
          <div class="tag-row">
            <span class="tag">iOS App</span>
            <span class="tag">Android</span>
          </div>
          <div class="avatar-group">
            <img src="https://via.placeholder.com/28" alt="User" />
            <img src="https://via.placeholder.com/28" alt="User" />
          </div>
        </div>

        <div class="project-card">
          <h4>Samsung</h4>
          <p>These Project will need a new brand identity where they will get recognize.</p>
          <div class="tag-row">
            <span class="tag">IOT</span>
            <span class="tag">AR</span>
          </div>
          <div class="avatar-group">
            <img src="https://via.placeholder.com/28" alt="User" />
            <img src="https://via.placeholder.com/28" alt="User" />
          </div>
        </div>
      </div>

      <div class="activity-section">
        <div class="task-activity">
          <h3>Task Activity</h3>
          <!-- Donut Chart Placeholder -->
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

</body>
</html>
