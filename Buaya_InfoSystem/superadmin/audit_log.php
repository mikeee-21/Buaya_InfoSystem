<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Audit Logs</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background-color: #f5f5f5;
    }

    .top-bar {
      background-color: #0a0a6b;
      color: white;
      padding: 10px 0;
    }

    .logo-container {
      display: flex;
      align-items: center;
    }

    .icon-link {
      text-decoration: none !important;
      font-size: 1.2rem;
    }

    .logo-container img {
      height: 40px;
      margin-right: 10px;
      border-radius: 50%;
    }

    .custom-gap {
      margin-right: 45px;
    }

    .logs-container {
      background-color: white;
      border-radius: 10px;
      padding: 15px;
      margin: 20px auto;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      max-width: 1000px;
      height: 650px;
      overflow-y: auto;
    }

    .log-item {
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 5px;
      position: relative;
      display: flex;
      align-items: center;
    }

    .log-item.blue-bg {
      background-color: #e6f3ff;
    }

    .log-item.light-bg {
      background-color: #f8f9fa;
    }

    .status-indicator {
      width: 10px;
      height: 10px;
      background-color: #28a745;
      border-radius: 50%;
      display: inline-block;
      margin-right: 10px;
    }

    .timestamp {
      text-align: right;
      margin-left: auto;
      margin-top: 5px;
    }

    .timestamp div {
      margin-top: 5px;
    }

    .search-container {
      padding: 15px;
      border-bottom: 1px solid #dee2e6;
    }

    .search-btn {
      background-color: #ffd700;
      border: none;
      width: 50px;
      height: 38px;
    }

    .dropdown-menu {
      min-width: 200px;
      max-width: 300px;
      word-wrap: break-word;
      white-space: normal;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #ced4da;
    }

    .search-container .col-md-6.text-end .me-2 {
      margin-left: 0;
      margin-right: 10px;
    }
  </style>
</head>

<body>
  <!-- New Top Navigation Bar -->
  <div class="top-bar">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-8">
          <div class="logo-container">
           <a href="buayaProfile.php">
                <img src="img/logo.jpg" alt="Logo" class="logo" />
            </a>
            <h5 class="mb-0">Super Admin</h5>
          </div>
        </div>
        <div class="col-4 text-end d-flex justify-content-end align-items-center">
          <a href="dashboard.php" class="text-white icon-link custom-gap"><i class="fas fa-home "></i></a>
          <div class="dropdown custom-gap">
            <button class="btn btn-link text-white p-0 icon-link" type="button" id="settingsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-cog"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
              <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
              <li><a class="dropdown-item" href="acc_mngmnt.php">Admin Account Management</a></li>
              <li><a class="dropdown-item" href="audit_log.php">Audit Logs</a></li>
              <li><a class="dropdown-item" href="adminProfile_Settings.php">Buaya Profile Settings</a></li>
            </ul>
          </div>
          <a href="../views/admin/sign_out.php" class="text-white text-decoration-none"><i class="fas fa-sign-out-alt"></i> Sign out</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Original content begins here -->
  <div class="logs-container">
    <div class="search-container">
      <div class="row align-items-center">
        <div class="col-md-6" style="position: sticky;">
          <h5>Activity Logs</h5>
        </div>
      </div>
    </div>

    <div class="log-entries mt-3" id="logContainer">
      <!-- Logs will be injected here -->
    </div>
  </div>





  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  
 <script>
  document.addEventListener('DOMContentLoaded', function () {
    const logContainer = document.getElementById('logContainer');
    const searchInput = document.querySelector('input[aria-label="Search"]');

    // Fetch logs from PHP
    fetch('../views/superadmin/get_logs.php') 
      .then(response => response.json())
      .then(data => {
        data.forEach(log => {
          const logItem = document.createElement('div');
          logItem.className = 'log-item light-bg';
          logItem.innerHTML = `
            <span class="status-indicator"></span>
            <span><strong>${log.admin_name}</strong>: ${log.action}</span>
            <div class="timestamp">
              <div>${log.timestamp}</div>
              <div>${log.date}</div>
            </div>
          `;
          logContainer.appendChild(logItem);
        });

        // Enable search filtering after logs are loaded
        searchInput.addEventListener('keyup', function () {
          const searchTerm = this.value.toLowerCase();
          document.querySelectorAll('.log-item').forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(searchTerm) ? '' : 'none';
          });
        });
      });

    // (Optional) Dropdown filter logic — left here if needed
    document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
      toggle.addEventListener('click', function (e) {
        e.stopPropagation();
      });
    });
  });
</script>

</body>
</html>