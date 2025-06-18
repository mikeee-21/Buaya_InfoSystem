<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Claimed Requests</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->



<!-- ADDED STYLE -->
<style>

.nav-link {
  display: flex;
  align-items: center;   /* Align icon and text vertically */
  gap: 8px;              /* Optional: spacing between icon and text */
  color: black;          /* Ensures the text color matches icon if needed */
}

.nav-link p {
  margin: 0;             /* Remove default margins from <p> */
}

.brand-image {
  max-height: none !important;
  height: 180px !important;
  width: 180px !important; 
  margin-top: 30px !important;
  border-radius: 50% !important;

  transition: all 0.3s ease-in-out;
}

.sidebar-collapse .brand-image {
  height: 60px !important;
  width: 60px !important;
  margin-left: 7px;
  transition: all 0.3s ease-in-out;
}

.nav-sidebar .nav-link .nav-select{
  margin: 0;  
  font-size: 17px !important;
}

/* For main menu items */
.nav-sidebar .nav-item > .nav-link:hover {
  background-color: #a0dfd4; /* hover background color */
  border-radius: 5px;
  color: white !important;
}

/* For submenu items */
.nav-treeview .nav-link:hover {
  background-color:rgb(255, 255, 255); /* submenu hover background color */
  border-radius: 10px;
  color: white !important;
}

.nav-icon {
  font-size: 20px !important; 
}



.nav-sidebar .nav-link .nav-dr-icon, 
.nav-sidebar .nav-link .nav-residence-icon,
.nav-sidebar .nav-link .nav-direct-icon{
  font-size: 15px !important;
  margin-left: 20px;
}

li a p{
  font-size: 18px !important; 
  font-weight: 200;
}

.nav-item i{
  font-size: 19px !important;  
}

/* SETTINGS DD STYLE */
/* Hover effect for submenu links */
#directorySubmenu .dropdown-item:hover {
  color:rgb(0, 34, 144);
  transition: 0.2s ease-in-out;
}

#directoryToggle{
  color: black;
  text-decoration: none;
  transition: 0.2s ease-in-out; 
}

#directoryToggle:focus,
#directoryToggle:hover,
#directoryToggle:active {
  color:rgb(0, 34, 144) ; 
  text-decoration: none ;
}


/* Font color on hover */
.dropdown-menu .dropdown-item:hover,
.dropdown-menu .dropdown-item:focus,
.dropdown-menu .dropdown-item:active {
  color:rgb(0, 34, 144); 
  background-color: transparent;
  text-decoration: none;
  transition: 0.2s ease-in-out;
}

.sub a{
  font-size: 15px !important; 
  font-weight: 200;
}

.dropdown-item {
  font-size: 17px !important; 
  font-weight: 200;
}

/* FONT */
.font-inter {
  font-family: 'Inter', sans-serif;
}




/* main content design */
:root {
    --primary-color: #000155;
    --secondary-color: #f8f9fa;
    --success-color: #10b981;
    --warning-color: #f59e0b;
    --danger-color: #ef4444;
    --info-color: #3b82f6;
    --claimed-color: #10b981;
    --unclaimed-color: #f59e0b;
    --rejected-color: #ef4444;
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    --border-radius: 12px;
}
.content-wrapper {
    margin: 2rem;
    padding: 0;
    background-color: white;
}

.main-container {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-lg);
    border: 1px solid rgba(255, 255, 255, 0.2);
    overflow: hidden;
}

.header-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, #1e40af 100%);
    color: white;
    padding: 20px;
    position: relative;
    overflow: hidden;
}

.header-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0.1;
}

.header-content {
    position: relative;
    z-index: 1;
}

.page-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    background: linear-gradient(45deg, #fff, #e0e7ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.page-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    font-weight: 400;
}

.stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin: 1rem 0;
}

.stat-card {
    background: white;
    border-radius: var(--border-radius);
    padding: 1rem;
    box-shadow: var(--shadow-md);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--card-color), var(--card-color));
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.stat-card.claimed::before {
    --card-color: var(--claimed-color);
}

.stat-card.unclaimed::before {
    --card-color: var(--unclaimed-color);
}

.stat-card.rejected::before {
    --card-color: var(--rejected-color);
}

.stat-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.stat-info h3 {
    font-size: 0.875rem;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.5rem;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: #111827;
}

.stat-icon {
    width: 3rem;
    height: 3rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: white;
}

.stat-icon.claimed {
    background: linear-gradient(135deg, var(--claimed-color), #059669);
}

.stat-icon.unclaimed {
    background: linear-gradient(135deg, var(--unclaimed-color), #d97706);
}

.stat-icon.rejected {
    background: linear-gradient(135deg, var(--rejected-color), #dc2626);
}

.controls-section {
    padding: 2rem;
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
}

.search-container {
    position: relative;
    flex: 1;
    max-width: 400px;
}

.search-input {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 3rem;
    border: 2px solid #d1d5db;
    border-radius: var(--border-radius);
    font-size: 0.875rem;
    transition: all 0.3s ease;
    background: white;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(0, 1, 85, 0.1);
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #6b7280;
    font-size: 0.875rem;
}

.filter-container {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.filter-label {
    font-weight: 600;
    color: #374151;
    font-size: 0.875rem;
}

.filter-select {
    padding: 0.75rem 1rem;
    border: 2px solid #d1d5db;
    border-radius: var(--border-radius);
    font-size: 0.875rem;
    background: white;
    transition: all 0.3s ease;
    min-width: 160px;
}

.filter-select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(0, 1, 85, 0.1);
}

.table-section {
    padding: 2rem;
}

.table-container {
    background: white;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    border: 1px solid #e5e7eb;
}

.table-wrapper {
    max-height: 500px;
    overflow: auto;
    scrollbar-width: thin;
    scrollbar-color: #cbd5e1 #f1f5f9;
}

.table-wrapper::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.table-wrapper::-webkit-scrollbar-track {
    background: #f1f5f9;
}

.table-wrapper::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 4px;
}

.table-wrapper::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

.custom-table {
    margin: 0;
    font-size: 0.875rem;
}

.custom-table thead th {
    background: linear-gradient(135deg, var(--primary-color) 0%, #1e40af 100%);
    color: white;
    font-weight: 600;
    padding: 1rem 0.75rem;
    text-align: start;
    border: none;
    position: sticky;
    top: 0;
    z-index: 10;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.custom-table tbody tr {
    transition: all 0.2s ease;
    border-bottom: 1px solid #e5e7eb;
}

.custom-table tbody tr:hover {
    background: #f8fafc;
    transform: scale(1.01);
}

.custom-table tbody td {
    padding: 1rem 0.75rem;
    vertical-align: middle;
    border: none;
}

.status-badge {
    padding: 0.375rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    display: inline-block;
}

.status-claimed {
    background: rgba(16, 185, 129, 0.1);
    color: var(--claimed-color);
    border: 1px solid rgba(16, 185, 129, 0.2);
}

.status-unclaimed {
    background: rgba(245, 158, 11, 0.1);
    color: var(--unclaimed-color);
    border: 1px solid rgba(245, 158, 11, 0.2);
}

.status-rejected {
    background: rgba(239, 68, 68, 0.1);
    color: var(--rejected-color);
    border: 1px solid rgba(239, 68, 68, 0.2);
}

.action-button {
    width: 2.5rem;
    height: 2.5rem;
    border: none;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    margin: 0 0.125rem;
}

.btn-view {
    background: rgba(16, 185, 129, 0.1);
    color: var(--claimed-color);
}

.btn-view:hover {
    background: var(--claimed-color);
    color: white;
    transform: scale(1.1);
}

.btn-delete {
    background: rgba(239, 68, 68, 0.1);
    color: var(--rejected-color);
}

.btn-delete:hover {
    background: var(--rejected-color);
    color: white;
    transform: scale(1.1);
}

.empty-state {
    text-align: center;
    padding: 3rem 2rem;
    color: #6b7280;
}

.empty-state i {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

.empty-state h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.empty-state p {
    font-size: 0.875rem;
    opacity: 0.8;
}

@media (max-width: 768px) {
    .content-wrapper {
        margin: 1rem;
    }

    .header-section {
        padding: 1.5rem;
    }

    .page-title {
        font-size: 1.5rem;
    }

    .stats-container {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .controls-section {
        padding: 1.5rem;
    }

    .controls-section > div {
        flex-direction: column;
        gap: 1rem;
    }

    .search-container {
        max-width: 100%;
    }

    .filter-container {
        width: 100%;
        justify-content: space-between;
    }

    .table-section {
        padding: 1rem;
    }

    .custom-table {
        font-size: 0.8rem;
    }

    .custom-table thead th {
        padding: 0.75rem 0.5rem;
        font-size: 0.7rem;
    }

    .custom-table tbody td {
        padding: 0.75rem 0.5rem;
    }
}

/* Loading animation */
.loading {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 3px solid rgba(255,255,255,.3);
    border-radius: 50%;
    border-top-color: #fff;
    animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Fade in animation */
.fade-in {
    animation: fadeIn 0.5s ease-in;
}


@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}


/* modal style */
.modal-content {
            border: none;
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, #000155, #0FCDA7);
            color: white;
            border: none;
            padding: 1rem;
            position: relative;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0;
        }

        .section-header {
            color: var(--primary-color);
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border-color);
            position: relative;
        }

        .btn-close {
            background: none;
            border: none;
            color: white;
            opacity: 0.8;
            font-size: 1.25rem;
            transition: opacity 0.2s;
        }

        .btn-close:hover {
            opacity: 1;
            color: white;
        }

        .modal-body {
            padding: 2rem;
            background: white;
        }

        .section-header {
            color: var(--primary-color);
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border-color);
            position: relative;
        }

        .section-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--primary-color);
        }

        .info-group {
            margin-bottom: 2rem;
        }

        .info-item {
            margin-bottom: 1.25rem;
        }

        .info-label {
            color: var(--text-muted);
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.375rem;
            text-transform: capitalize;
        }

        .info-value {
            color: var(--primary-color);
            font-size: 1rem;
            font-weight: 400;
            font-weight: bold;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-color);
            min-height: 2.5rem;
            display: flex;
            align-items: center;
            transition: border-color 0.2s;
        }

        .info-value:hover {
            border-color: var(--primary-color);
        }

        .info-value.empty {
            color: var(--text-muted);
            font-style: italic;
        }

        .status-display {
            background: var(--light-bg);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1rem;
            text-align: center;
            border: 1px solid var(--border-color);
        }

        .status-text {
            font-size: 1.125rem;
            font-weight: 600;
            margin: 0;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-claimed {
            background: var(--success-color);
            color: white;
        }

        .status-unclaimed {
            background: var(--warning-color);
            color: white;
        }

        .status-rejected {
            background: var(--danger-color);
            color: white;
        }

        .message-section {
            background: var(--light-bg);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--primary-color);
        }

        .message-text {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
            font-weight: bold;
            margin: 0;
        }

        .rejection-section {
            background: linear-gradient(135deg, #ffeaa7, #fab1a0);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1.5rem;
            border-left: 4px solid var(--danger-color);
        }

        .rejection-label {
            color: var(--danger-color);
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.75rem;
        }

        .rejection-text {
            color: #2d3436;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }

        .dates-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .date-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.25rem;
            text-align: center;
            transition: all 0.2s;
        }

        .date-card:hover {
            border-color: var(--primary-color);
            box-shadow: var(--shadow);
        }

        .date-icon {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
        }

        .date-label {
            color: var(--text-muted);
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .date-value {
            color: var(--primary-color);
            font-size: 1rem;
            font-weight: 600;
        }

        .modal-footer {
            background: var(--light-bg);
            border: none;
            padding: 1.5rem 2rem;
        }

        .btn-modal-close {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-modal-close:hover {
            background: var(--secondary-color);
            color: white;
            transform: translateY(-1px);
            box-shadow: var(--shadow);
        }

        @media (max-width: 768px) {
            .modal-dialog {
                margin: 1rem;
            }
            
            .dates-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .modal-body {
                padding: 1.5rem;
            }
            
            .modal-header {
                padding: 1.25rem 1.5rem;
            }
        }

        /* Smooth transitions */
        * {
            transition: color 0.2s, background-color 0.2s, border-color 0.2s;
        }

</style>



<body class="hold-transition sidebar-mini">
  
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white " style="border: none; box-shadow: none;">



      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- HOME -->
        <li class="nav-item mr-4">
          <a href="dashboard.php" class="nav-link">
            <i class="fa-solid fa-house" style="color:black;"></i>
          </a>
        </li>

        <!-- REVIEWS -->
        <li class="nav-item mr-3">
          <a class="nav-link"  href="reviews_settings.php">
            <i class="fa-solid fa-comment-dots" style="color:black;"></i>
          </a>
        </li>

        <!-- SETTINGS -->
        <li class="nav-item dropdown mr-3">
          <a class="nav-link " href="#" id="settingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa-solid fa-gear" style="color:black;"></i>
          </a>

          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="settingsDropdown" style="width: 250px;">
            
            <!-- Directory Management -->
            <li class="dropdown-item">
              <a href="#" class="d-block w-100" id="directoryToggle">
                Directory Management <i class="fas fa-caret-down float-right"></i>
              </a>

                <!-- Submenu -->
              <div id="directorySubmenu" style="display: none;" class="sub mt-2">
                <a class="dropdown-item ml-3" href="settings_addNew_off.php">Add New Official</a>
                <a class="dropdown-item ml-3" href="settings_list_official.php">List of Officials</a>
                <a class="dropdown-item ml-3" href="settings_officials_endterm.php">Officials End Terms</a>
              </div>

            </li>

            <li><a class="dropdown-item" href="document_rqst_management.php">Document Management</a></li>
            <li><a class="dropdown-item" href="zonepurokSettings.php">Zone and Purok Management</a></li>
          </ul>
        </li>


        <!-- FULL SCREEN -->
        <li class="nav-item mr-4">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt" style="color:black;"></i>
          </a>
        </li>

        <!-- ADMIN -->
        <li class="nav-item mr-4">
          <a class="nav-link" href="admin_profile.php" >
            <i class="fa-solid fa-user mr-1" style="color:black;"></i>
            <span style="color:black;">Admin</span>
          </a>
        </li>

        <!-- SIGN OUT -->
        <li class="nav-item mr-4">
          <a class="nav-link" href="../backend/admin/sign_out.php" role="button">
            <i class="fa-solid fa-right-from-bracket mr-1" style="color:black;"></i>
            <span style="color:black;">Sign Out</span>
          </a>
        </li>

      </ul>
    </nav>

    <div class="content-wrapper m-0 p-5">
        <div class="main-container fade-in ">
            <!-- Header Section -->
            <div class="header-section">
                <div class="header-content">
                    <h1 class="page-title">
                        <i class="fas fa-certificate me-3"></i>
                        Claimed and Not Claimed Request
                    </h1>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="controls-section">
                <div class="stats-container">
                    <div class="stat-card claimed">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>Claimed</h3>
                                <div class="stat-number" id="claimedCount">0</div>
                            </div>
                            <div class="stat-icon claimed">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card unclaimed">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>Unclaimed</h3>
                                <div class="stat-number" id="unclaimedCount">0</div>
                            </div>
                            <div class="stat-icon unclaimed">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card rejected">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>Rejected</h3>
                                <div class="stat-number" id="rejectedCount">0</div>
                            </div>
                            <div class="stat-icon rejected">
                                <i class="fas fa-times-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search and Filter Controls -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="searching" class="search-input" placeholder="Search by name, purpose, or certificate..." autocomplete="off">
                    </div>

                    <div class="filter-container">
                        <label class="filter-label">Filter by:</label>
                        <select class="filter-select" id="statusFilter">
                            <option value="all" selected>All Requests</option>
                            <option value="claimed">Claimed</option>
                            <option value="unclaimed">Unclaimed</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-section">
                <div class="table-container">
                    <div class="table-wrapper">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th style="width: 20%;">Full Name</th>
                                    <th style="width: 15%;">Purpose</th>
                                    <th style="width: 20%;">Date Requested</th>
                                    <th style="width: 20%;">Certificate</th>
                                    <th style="width: 15%;">Status</th>
                                    <th style="width: 10%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="requestTableBody">
                                <!-- Data will be loaded here dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end of wrapper -->




<!-- Request Details Modal -->
<div class="modal fade" id="requestDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request Details</h5>
                 <span id="statusBadge" class="status-badge-header">Pending Review</span>
                
            </div>
            
            <div class="modal-body">
                <!-- Status Display -->
                <div class="status-display">
                    <div class="status-text status-claimed" id="requestStatus">Claimed</div>
                </div>

                <!-- Personal Information Section -->
                <div class="info-group">
                    <h6 class="section-header">Personal Information</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-label">First Name</div>
                                <div class="info-value" id="fname">John</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-label">Last Name</div>
                                <div class="info-value" id="lname">Doe</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-label">Middle Name</div>
                                <div class="info-value" id="mname">Smith</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-label">Suffix</div>
                                <div class="info-value empty" id="suffix">N/A</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="info-group">
                    <h6 class="section-header">Contact Information</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-label">Email Address</div>
                                <div class="info-value" id="email">john.doe@example.com</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-label">Contact Number</div>
                                <div class="info-value" id="contactNum">+1 234 567 8900</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Request Information -->
                <div class="info-group">
                    <h6 class="section-header">Request Information</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-label">Date Requested</div>
                                <div class="info-value" id="dateRequested">June 07, 2025</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <div class="info-label">Certificate Type</div>
                                <div class="info-value" id="certificateRequested">Birth Certificate</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Purpose</div>
                        <div class="info-value" id="purpose">Employment Requirements</div>
                    </div>
                </div>

                <!-- Message Section -->
                <div class="info-group">
                    <h6 class="section-header">Message</h6>
                    <div class="message-section">
                        <p class="message-text" id="messageText">
                            I need this certificate for my job application. Please process this request as soon as possible. Thank you for your assistance.
                        </p>
                    </div>
                </div>

                <!-- Certificate Dates Section -->
                <div id="datesSection" class="info-group">
                    <h6 class="section-header">Issued Information</h6>
                    <div class="dates-grid">
                        <div class="date-card">
                            <div class="date-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="date-label">Date Issued</div>
                            <div class="date-value" id="dateIssuedText">Not Set</div>
                        </div>
                        <div class="date-card">
                            <div class="date-icon">
                                <i class="fas fa-calendar-times"></i>
                            </div>
                            <div class="date-label">Expiration Date</div>
                            <div class="date-value" id="dateIssuedExpirationText">Not Set</div>
                        </div>
                    </div>
                </div>

                <!-- Rejection Section -->
                <div id="rejectionSection" class="rejection-section" style="display: none;">
                    <div class="rejection-label">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Rejection Reason
                    </div>
                    <p class="rejection-text" id="rejectionReason">
                        The submitted documents do not meet the required criteria. Please resubmit with proper documentation.
                    </p>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-modal-close" id="modalCloseButton" data-bs-dismiss="modal">
                    <i class="fas fa-check me-2"></i>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>



  
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>



<script>
  $(function () {
    // Prevent the dropdown from closing when clicking inside
    $('.dropdown-menu').on('click', function (e) {
      e.stopPropagation();
    });

    // Toggle submenu visibility
    $("#directoryToggle").on("click", function (e) {
      e.preventDefault();
      $("#directorySubmenu").slideToggle("fast");
    });
  });
</script>



<!-- display all claimed, unclaimed, rejected request -->
<script>
        let requestModal;

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize modal instance
            requestModal = new bootstrap.Modal(document.getElementById('requestDetailsModal'));
            
            // Manual close button handler
            document.getElementById('modalCloseButton')?.addEventListener('click', function() {
                requestModal.hide();
            });

            // Load all requests when page loads
            fetchAllRequests();

            // Search functionality
            document.getElementById('searching').addEventListener('input', function() {
                filterRequests();
            });

            // Filter by status
            document.getElementById('statusFilter').addEventListener('change', function() {
                filterRequests();
            });
        });

        function fetchAllRequests() {
            fetch('../backend/admin/claimed_and_unclaimed_request.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Store requests globally
                        window.allRequests = data.requests;
                        
                        // Update counts
                        updateRequestCounts();
                        
                        // Display all requests initially
                        displayRequests(data.requests);
                    } else {
                        console.error('Error:', data.error);
                        alert('Failed to load requests: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while loading requests');
                });
        }

        function updateRequestCounts() {
            const claimedCount = window.allRequests.filter(req => req.req_claim_status === 'claimed').length;
            const unclaimedCount = window.allRequests.filter(req => 
                req.req_claim_status === 'not claimed' && req.req_status !== 'rejected').length;
            const rejectedCount = window.allRequests.filter(req => req.req_status === 'rejected').length;

            // Animate count updates
            animateCount(document.getElementById('claimedCount'), claimedCount);
            animateCount(document.getElementById('unclaimedCount'), unclaimedCount);
            animateCount(document.getElementById('rejectedCount'), rejectedCount);
        }

        function animateCount(element, targetValue) {
            const currentValue = parseInt(element.textContent) || 0;
            const increment = targetValue > currentValue ? 1 : -1;
            const step = () => {
                const current = parseInt(element.textContent) || 0;
                if (current !== targetValue) {
                    element.textContent = current + increment;
                    setTimeout(step, 50);
                }
            };
            step();
        }

        function displayRequests(requests) {
            const tableBody = document.getElementById('requestTableBody');
            tableBody.innerHTML = '';

            if (requests.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="6" class="empty-state">
                            <i class="fas fa-folder-open"></i>
                            <h3>No requests found</h3>
                            <p>Try adjusting your search terms or filters</p>
                        </td>
                    </tr>
                `;
                return;
            }

            requests.forEach((request, index) => {
                const row = document.createElement('tr');
                row.className = 'fade-in';
                row.style.animationDelay = `${index * 0.05}s`;
                row.setAttribute('data-id', request.req_id);
                row.setAttribute('data-status', getRequestStatus(request));

                // Determine status display
                let statusText, statusClass;
                if (request.req_status === 'rejected') {
                    statusText = 'Rejected';
                    statusClass = 'status-rejected';
                } else if (request.req_claim_status === 'claimed') {
                    statusText = 'Claimed';
                    statusClass = 'status-claimed';
                } else {
                    statusText = 'Unclaimed';
                    statusClass = 'status-unclaimed';
                }

                // Build full name
                const fullName = `${request.req_last_name}, ${request.req_first_name}` + 
                                (request.req_middle_name ? ` ${request.req_middle_name.charAt(0)}.` : '') + 
                                (request.req_suffix ? ` ${request.req_suffix}` : '');

                row.innerHTML = `
                    <td>${escapeHtml(fullName)}</td>
                    <td>${escapeHtml(request.req_purpose)}</td>
                    <td>${escapeHtml(request.req_requested_date)}</td>
                    <td>${escapeHtml(request.cer_type_name)}</td>
                    <td>
                        <span class="status-badge ${statusClass}">${statusText}</span>
                    </td>
                    <td>
                        <button type="button" class="action-button btn-view" data-id="${request.req_id}" title="View Details">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="action-button btn-delete" data-id="${request.req_id}" title="Delete Request">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;

                tableBody.appendChild(row);
            });

            // Add event listeners
            document.querySelectorAll('.btn-view').forEach(btn => {
                btn.addEventListener('click', function() {
                    const requestId = this.getAttribute('data-id');
                    viewRequestDetails(requestId);
                });
            });

            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function() {
                    const requestId = this.getAttribute('data-id');
                    deleteRequest(requestId);
                });
            });
        }

        function filterRequests() {
            const searchTerm = document.getElementById('searching').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;

            let filteredRequests = window.allRequests;

            // Apply status filter
            if (statusFilter !== 'all') {
                filteredRequests = filteredRequests.filter(request => {
                    if (statusFilter === 'claimed') return request.req_claim_status === 'claimed';
                    if (statusFilter === 'unclaimed') return request.req_claim_status === 'not claimed' && request.req_status !== 'rejected';
                    if (statusFilter === 'rejected') return request.req_status === 'rejected';
                    return true;
                });
            }

            // Apply search filter
            if (searchTerm) {
                filteredRequests = filteredRequests.filter(request => {
                    const fullName = `${request.req_first_name} ${request.req_last_name}`.toLowerCase();
                    const purpose = request.req_purpose.toLowerCase();
                    const certificate = request.cer_type_name.toLowerCase();
                    
                    return fullName.includes(searchTerm) || 
                          purpose.includes(searchTerm) || 
                          certificate.includes(searchTerm);
                });
            }

            displayRequests(filteredRequests);
        }

        function viewRequestDetails(requestId) {

            const request = window.allRequests.find(req => req.req_id == requestId);

            if (!request) {
            
                console.error('Request not found:', requestId);
                return;

            }

            populateRequestModal(request);
            
            if (requestModal) {

                requestModal.show();

            } else {

                requestModal = new bootstrap.Modal(document.getElementById('requestDetailsModal'));
                requestModal.show();

            }

        }

        function deleteRequest(requestId) {
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (!result.isConfirmed) return;

              // Show loading state
              Swal.fire({
                  title: 'Deleting...',
                  text: 'Please wait',
                  allowOutsideClick: false,
                  didOpen: () => {
                      Swal.showLoading();
                  },
              });

              fetch('../backend/admin/delete_request.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                  },
                  body: JSON.stringify({ req_id: requestId })
              })
              .then(response => response.json())
              .then(data => {
                  // Close loading dialog
                  Swal.close();

                  if (data.success) {
                      // Remove from local data
                      window.allRequests = window.allRequests.filter(req => req.req_id != requestId);
                      
                      // Update UI
                      updateRequestCounts();
                      filterRequests();
                      
                      // Success message
                      Swal.fire(
                          'Deleted!',
                          'Request has been deleted.',
                          'success'
                      );
                  } else {
                      throw new Error(data.error || 'Failed to delete request');
                  }
              })
              .catch(error => {
                  Swal.close(); // Close loading dialog on error
                  console.error('Error:', error);
                  Swal.fire(
                      'Error!',
                      error.message,
                      'error'
                  );
              });
          });
      }

        function populateRequestModal(request) {
          try {
              // Helper function to safely set content
              function setContent(elementId, content, isHTML = false) {
                  const element = document.getElementById(elementId);
                  if (element) {
                      if (isHTML) {
                          element.innerHTML = content || 'N/A';
                      } else {
                          element.textContent = content || 'N/A';
                      }
                  } else {
                      console.warn(`Element with ID ${elementId} not found`);
                  }
              }

              // Set basic information
              setContent('fname', request.req_first_name);
              setContent('lname', request.req_last_name);
              setContent('mname', request.req_middle_name);
              setContent('suffix', request.req_suffix);
              setContent('email', request.req_email);
              setContent('contactNum', request.req_contact);
              setContent('dateRequested', request.req_requested_date);
              setContent('certificateRequested', request.cer_type_name);
              setContent('purpose', request.req_purpose);
              setContent('messageText', request.req_message);

              // Set status display
              const statusElement = document.getElementById('requestStatus');
              const statusBadge = document.getElementById('statusBadge');
              
              if (statusElement && statusBadge) {
                  if (request.req_status === 'rejected') {
                      statusElement.textContent = 'Rejected';
                      statusElement.style.backgroundColor = '#FF453F';
                      statusElement.style.color = 'white';
                      
                      statusBadge.textContent = 'Rejected';
                      statusBadge.className = 'badge bg-danger';
                      
                      // Show rejection reason and hide dates
                      setContent('rejectionReason', request.req_message || 'No reason provided');
                      document.getElementById('rejectionSection').style.display = 'block';
                      document.getElementById('datesSection').style.display = 'none';
                  } 
                  else if (request.req_claim_status === 'claimed') {
                      statusElement.textContent = 'Claimed';
                      statusElement.style.backgroundColor = '#81D5C6';
                      statusElement.style.color = 'white';
                      
                      statusBadge.textContent = 'Claimed';
                      statusBadge.className = 'badge bg-success';
                      
                      // Show dates and hide rejection
                      setContent('dateIssuedText', request.req_date_issued || 'Not set');
                      setContent('dateIssuedExpirationText', request.req_date_expiration || 'Not set');
                      document.getElementById('rejectionSection').style.display = 'none';
                      document.getElementById('datesSection').style.display = 'block';
                  } 
                  else {
                      statusElement.textContent = 'Unclaimed';
                      statusElement.style.backgroundColor = '#FFF153';
                      statusElement.style.color = 'black';
                      
                      statusBadge.textContent = 'Unclaimed';
                      statusBadge.className = 'badge bg-warning text-dark';
                      
                      // Show dates (if approved) and hide rejection
                      setContent('dateIssuedText', request.req_date_issued || 'Not issued yet');
                      setContent('dateIssuedExpirationText', request.req_date_expiration || 'Not set');
                      document.getElementById('rejectionSection').style.display = 'none';
                      document.getElementById('datesSection').style.display = 'block';
                  }
              } else {

                  console.error('Status elements not found');

              }

          } catch (error) {

              console.error('Error populating modal:', error);
              alert('An error occurred while loading request details');

          }
      }

        function getRequestStatus(request) {
          
            if (request.req_status === 'rejected') return 'rejected';
            if (request.req_claim_status === 'claimed') return 'claimed';
            return 'unclaimed';

        }

        function escapeHtml(unsafe) {
            return unsafe
                ? unsafe.toString()
                      .replace(/&/g, "&amp;")
                      .replace(/</g, "&lt;")
                      .replace(/>/g, "&gt;")
                      .replace(/"/g, "&quot;")
                      .replace(/'/g, "&#039;")
                : '';
        }

        // // Additional utility functions for enhanced UI
        // function showToast(message, type = 'success') {
        //     const toast = document.createElement('div');
        //     toast.className = `alert alert-${type} position-fixed`;
        //     toast.style.cssText = `
        //         top: 20px;
        //         right: 20px;
        //         z-index: 9999;
        //         min-width: 300px;
        //         animation: slideInRight 0.3s ease;
        //     `;
        //     toast.textContent = message;
            
        //     document.body.appendChild(toast);
            
        //     setTimeout(() => {
        //         toast.style.animation = 'slideOutRight 0.3s ease';
        //         setTimeout(() => document.body.removeChild(toast), 300);
        //     }, 3000);
        // }

        // Add CSS for toast animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            
            @keyframes slideOutRight {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);

</script>


</body>
</html>
