<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Activity Logs</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Google Font: Inter -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">

  <style>
    /* Navbar styles */
    .nav-link {
      display: flex;
      align-items: center;
      gap: 8px;
      color: black;
    }
    
    .nav-link p {
      margin: 0;
    }
    
    .nav-sidebar .nav-item > .nav-link:hover {
      background-color: rgb(255, 255, 255);
      border-radius: 10px;
      color: white !important;
    }
    
    .nav-icon {
      font-size: 18px !important; 
      color: black;
    }
    
    /* Settings dropdown style */
    #directorySubmenu .dropdown-item:hover {
      color:rgb(0, 34, 144);
      transition: 0.2s ease-in-out;
    }
    
    #directoryToggle {
      color: black;
      text-decoration: none;
      transition: 0.2s ease-in-out; 
    }
    
    #directoryToggle:focus,
    #directoryToggle:hover,
    #directoryToggle:active {
      color:rgb(0, 34, 144); 
      text-decoration: none;
    }
    
    .dropdown-menu .dropdown-item:hover,
    .dropdown-menu .dropdown-item:focus,
    .dropdown-menu .dropdown-item:active {
      color: rgb(0, 34, 144); 
      background-color: transparent;
      text-decoration: none;
      transition: 0.2s ease-in-out;
    }
    
    .dropdown-item {
      font-size: 17px !important; 
      font-weight: 200;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    
    /* Font */
    .font-inter {
      font-family: 'Inter', sans-serif;
    }
    
    /* Enhanced Activity Log Styles */
    .activity-logs-container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 20px;
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      max-height: 550px;
      overflow-y: auto;
    }
    
    .activity-logs-title {
      color: #000155;
      text-align: center;
      margin-bottom: 30px;
      font-family: 'Inter', sans-serif;
      font-weight: 700;
      font-size: 2rem;
      margin-top: 40px;
      position: relative;
    }
    
    .activity-logs-title::after {
      content: '';
      display: block;
      width: 80px;
      height: 4px;
      background: linear-gradient(90deg, #0FCDA7, #000155);
      margin: 10px auto 0;
      border-radius: 2px;
    }
    
    /* Modern Timeline Design */
    .timeline {
      position: relative;
      padding-left: 50px;
    }
    
    .timeline::before {
      content: '';
      position: absolute;
      left: 20px;
      top: 0;
      bottom: 0;
      width: 2px;
      background: #e0e0e0;
    }
    
    .timeline-group {
      position: relative;
      margin-bottom: 30px;
    }
    
    .timeline-date {
      position: absolute;
      left: -50px;
      top: 0;
      width: 120px;
      padding: 5px 10px;
      background: #000155;
      color: white;
      border-radius: 20px;
      text-align: center;
      font-weight: 600;
      font-size: 0.85rem;
      box-shadow: 0 2px 8px rgba(0, 1, 85, 0.2);
    }
    
    .timeline-item {
      position: relative;
      padding: 15px 20px 15px 30px;
      margin-bottom: 15px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
      border-left: 3px solid #0FCDA7;
      transition: all 0.3s ease;
    }
    
    .timeline-item:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }
    
    .timeline-item::before {
      content: '';
      position: absolute;
      left: -10px;
      top: 20px;
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: #0FCDA7;
      border: 3px solid white;
      box-shadow: 0 0 0 2px #0FCDA7;
    }
    
    .timeline-content {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }
    
    .timeline-text {
      flex: 1;
      font-family: 'Inter', sans-serif;
      font-size: 14px;
      line-height: 1.5;
    }
    
    .timeline-text strong {
      color: #000155;
    }
    
    .timeline-time {
      margin-left: 15px;
      color: #666;
      font-size: 12px;
      white-space: nowrap;
      background: #f5f5f5;
      padding: 3px 8px;
      border-radius: 12px;
      font-weight: 500;
    }
    
    /* Search and Filter Section */
    .logs-filter {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
      gap: 15px;
    }
    
    .search-box {
      flex: 1;
      position: relative;
    }
    
    .search-box input {
      width: 100%;
      padding: 10px 15px 10px 40px;
      border: 1px solid #ddd;
      border-radius: 25px;
      font-family: 'Inter', sans-serif;
      transition: all 0.3s;
    }
    
    .search-box input:focus {
      outline: none;
      border-color: #0FCDA7;
      box-shadow: 0 0 0 2px rgba(15, 205, 167, 0.2);
    }
    
    .search-box i {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
    }
    
    .filter-dropdown {
      position: relative;
    }
    
    .filter-btn {
      padding: 10px 20px;
      background: white;
      border: 1px solid #ddd;
      border-radius: 25px;
      font-family: 'Inter', sans-serif;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    
    .filter-btn:hover {
      background: #f5f5f5;
    }
    
    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 40px 20px;
      color: #666;
    }
    
    .empty-state i {
      font-size: 50px;
      color: #ddd;
      margin-bottom: 15px;
    }
    
    .empty-state h4 {
      color: #444;
      margin-bottom: 10px;
    }
    
    /* Scrollbar Styling */
    .activity-logs-container::-webkit-scrollbar {
      width: 8px;
    }
    
    .activity-logs-container::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 4px;
    }
    
    .activity-logs-container::-webkit-scrollbar-thumb {
      background: #c1c1c1;
      border-radius: 4px;
    }
    
    .activity-logs-container::-webkit-scrollbar-thumb:hover {
      background: #a1a1a1;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
      <!-- Navbar (unchanged) -->
      <nav class="main-header navbar navbar-expand navbar-white font-inter" style="border: none; box-shadow: none;">
      <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <!-- HOME -->
          <li class="nav-item mr-4">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fa-solid fa-house"></i>
            </a>
          </li>

          <!-- REVIEWS -->
          <li class="nav-item mr-3">
            <a class="nav-link" href="reviews_settings.php">
              <i class="nav-icon fa-solid fa-comment-dots"></i>
            </a>
          </li>

          <!-- SETTINGS -->
          <li class="nav-item dropdown mr-3">
            <a class="nav-link " href="#" id="settingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nav-icon fa-solid fa-gear" ></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="settingsDropdown" style="width: 250px;">
              
              <!-- Directory Management -->
              <li class="dropdown-item">
                <a href="#" class="d-block w-100" id="directoryToggle">
                  Directory Management <i class="nav-icon fas fa-caret-down float-right"></i>
                </a>

                  <!-- Submenu -->
                <div id="directorySubmenu" style="display: none;" class="sub mt-2">
                  <a class="dropdown-item ml-3 " href="settings_addNew_off.php">Add New Official</a>
                  <a class="dropdown-item ml-3 " href="settings_list_official.php">List of Officials</a>
                  <a class="dropdown-item ml-3 " href="settings_officials_endterm.php">Officials End Terms</a>
                </div>

              </li>

              <li><a class="dropdown-item" href="document_rqst_management.php">Document Management</a></li>
              <li><a class="dropdown-item" href="zonepurokSettings.php">Zone and Purok Management</a></li>
            </ul>
          </li>


          <!-- FULL SCREEN -->
          <li class="nav-item mr-4">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="nav-icon fas fa-expand-arrows-alt"></i>
            </a>
          </li>

          <!-- ADMIN -->
          <li class="nav-item mr-4 font-inter">
            <a href="admin_profile.php" class="nav-link" role="button">
              <i class="nav-icon fa-solid fa-user mr-1" ></i>
              <span style="color:black;">Admin</span>
            </a>
          </li>

          <!-- SIGN OUT -->
          <li class="nav-item mr-4 font-inter">
            <a class="nav-link" href="../views/admin/sign_out.php" role="button">
              <i class="nav-icon fa-solid fa-right-from-bracket mr-1" ></i>
              <span style="color:black;">Sign Out</span>
            </a>
          </li>

        </ul>
      </nav>

      <h1 class="activity-logs-title">ACTIVITY LOGS</h1>
      
      <!-- Content Wrapper -->
      <div class="content-wrapper" style="background-color: white; margin-left: 0;">
        <div class="activity-logs-container">
          <!-- Search and Filter Section -->
          <div class="logs-filter">
            <div class="search-box">
              <i class="fas fa-search"></i>
              <input type="text" id="searchLogs" placeholder="Search activities...">
            </div>
            <div class="filter-dropdown">
              <button class="filter-btn">
                <i class="fas fa-filter"></i>
                Filter
              </button>
              <!-- Filter dropdown content would go here -->
            </div>
          </div>
          
          <!-- Timeline Activity Logs -->
          <div class="timeline" id="activityLogsList">
            <!-- Logs will be added dynamically here -->
          </div>
        </div>
      </div>
  </div>





<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>





<script>
  $(function() {
    // Prevent the dropdown from closing when clicking inside
    $('.dropdown-menu').on('click', function(e) {
      e.stopPropagation();
    });

    // Toggle submenu visibility
    $("#directoryToggle").on("click", function(e) {
      e.preventDefault();
      $("#directorySubmenu").slideToggle("fast");
    });

    // Group logs by date for the timeline
    function groupLogsByDate(logs) {
      const grouped = {};
      
      logs.forEach(log => {
        if (!grouped[log.date]) {
          grouped[log.date] = [];
        }
        grouped[log.date].push(log);
      });
      
      return grouped;
    }

    function displayActivityLogs(logs) {
      const logsContainer = $('#activityLogsList');
      logsContainer.empty();

      if (logs.length === 0) {
        logsContainer.html(`
          <div class="empty-state">
            <i class="far fa-calendar-check"></i>
            <h4>No Activity Logs Found</h4>
            <p>There are no activities to display at this time.</p>
          </div>
        `);
        return;
      }

      const groupedLogs = groupLogsByDate(logs);
      
      // Create timeline structure
      let timelineHTML = '';
      
      for (const date in groupedLogs) {
        timelineHTML += `
          <div class="timeline-group">
            <div class="timeline-date">${date}</div>
        `;
        
        groupedLogs[date].forEach(log => {
          timelineHTML += `
            <div class="timeline-item">
              <div class="timeline-content">
                <div class="timeline-text ml-3">
                  <strong>${log.admin_name}:</strong> ${log.action}
                </div>
                <div class="timeline-time">
                  ${log.timestamp}
                </div>
              </div>
            </div>
          `;
        });
        
        timelineHTML += `</div>`; // Close timeline-group
      }
      
      logsContainer.html(timelineHTML);
    }

    // Search functionality
    $('#searchLogs').on('input', function() {
      const searchTerm = $(this).val().toLowerCase();
      
      if (searchTerm === '') {
        $('.timeline-item').show();
        $('.timeline-group').show();
        return;
      }
      
      let anyVisible = false;
      
      $('.timeline-group').each(function() {
        const group = $(this);
        let groupHasVisibleItems = false;
        
        group.find('.timeline-item').each(function() {
          const itemText = $(this).text().toLowerCase();
          const isVisible = itemText.includes(searchTerm);
          
          $(this).toggle(isVisible);
          
          if (isVisible) {
            groupHasVisibleItems = true;
            anyVisible = true;
          }
        });
        
        group.toggle(groupHasVisibleItems);
      });
      
      if (!anyVisible) {
        $('#activityLogsList').html(`
          <div class="empty-state">
            <i class="fas fa-search"></i>
            <h4>No Matching Activities</h4>
            <p>No logs match your search criteria.</p>
          </div>
        `);
      }
    });

    // Fetch logs from server (dynamic)
    function fetchActivityLogs() {
      $.ajax({
        url: '../views/admin/get_logs.php',
        method: 'GET',
        success: function(response) {
          if (Array.isArray(response)) {
            displayActivityLogs(response);
          } else {
            $('#activityLogsList').html(`
              <div class="empty-state">
                <i class="fas fa-exclamation-triangle"></i>
                <h4>Error Loading Logs</h4>
                <p>Please try again later.</p>
              </div>
            `);
            console.error(response);
          }
        },
        error: function(xhr, status, error) {
          $('#activityLogsList').html(`
            <div class="empty-state">
              <i class="fas fa-exclamation-triangle"></i>
              <h4>Connection Error</h4>
              <p>Could not load activity logs.</p>
            </div>
          `);
        }
      });
    }

    // Call on page load
    fetchActivityLogs();
  });
</script>




</body>
</html>