<?php
session_start();
require_once '../views/admin/adminSession.php';

// Deserialize the admin object
if (isset($_SESSION['admin_object'])) {
    $adminObject = unserialize($_SESSION['admin_object']);
    $adminName = $adminObject->getUsername(); // or $adminObject->admin_username if public
}

if (isset($_SESSION['login_success'])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Login Successful!',
                text: 'Welcome back, {$adminName}!',
                icon: 'success',
                confirmButtonText: 'Continue'
            });
        });
    </script>";

    unset($_SESSION['login_success']);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
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
  background-color:rgb(131, 131, 131); /* hover background color */
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
  color: white !important;
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
  color:white !important;
}

.nav-item i{
  font-size: 19px !important;  
}

/* SETTINGS DD STYLE */
/* Hover effect for submenu links */
#directorySubmenu .dropdown-item:hover {
  color: rgb(0, 34, 144);
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
  color: rgb(0, 34, 144) ; 
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




.content-wrapper {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
}

.dashboard-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.dashboard-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.section-header {
    background: linear-gradient(135deg, #000155, #0FCDA7);;
    color: white;
    padding: 15px 20px;
    border-radius: 15px 15px 0 0;
    margin: -1px -1px 0 -1px;
    font-weight: 600;
    font-size: 1.1rem;
    position: sticky;
    top: 0;
    z-index: 10;
}

.action-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
    border: 2px solid transparent;
    border-radius: 15px;
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
}

.action-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.action-card:hover::before {
    opacity: 0.1;
}

.action-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    border-color: #667eea;
}

.action-card .info-box-content {
    position: relative;
    z-index: 2;
}

.action-card .info-box-icon {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    position: relative;
    z-index: 2;
}

.admin-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 3px solid #31A24C;
    object-fit: cover;
    transition: all 0.3s ease;
    position: relative;
}

.admin-container {
    transition: transform 0.3s ease;
    cursor: pointer;
}

.admin-container:hover {
    transform: scale(1.05);
}

.admin-container:hover .admin-avatar {
    box-shadow: 0 8px 25px rgba(49, 162, 76, 0.4);
}

.status-indicator {
    width: 18px;
    height: 18px;
    background: linear-gradient(135deg, #31A24C 0%, #4CAF50 100%);
    border: 3px solid white;
    border-radius: 50%;
    position: absolute;
    bottom: 5px;
    right: 5px;
    box-shadow: 0 2px 8px rgba(49, 162, 76, 0.3);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.pending-request-item {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
    border: 1px solid rgba(102, 126, 234, 0.1);
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.pending-request-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
    border-radius: 0 4px 4px 0;
}

.pending-request-item:hover {
    transform: translateX(5px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
}

.btn-action {
    border-radius: 25px;
    padding: 8px 20px;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    font-size: 0.9rem;
}

.btn-view {
    background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
    color: #333;
}

.btn-view:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
    color: #333;
}

.btn-reject {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
    color: white;
}

.btn-reject:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
    color: white;
}

.btn-approve {
    background: linear-gradient(135deg, #51cf66 0%, #40c057 100%);
    color: white;
}

.btn-approve:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(81, 207, 102, 0.4);
    color: white;
}

.official-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
    border-radius: 15px;
    border: 1px solid rgba(102, 126, 234, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    margin-bottom: 15px;
}

.official-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
}

.official-image {
    width: 90px;
    height: 90px;
    border-radius: 12px;
    object-fit: cover;
    border: 2px solid rgba(102, 126, 234, 0.2);
    transition: all 0.3s ease;
}

.official-card:hover .official-image {
    border-color: #667eea;
    transform: scale(1.05);
}

.see-more-btn {
    background: linear-gradient(135deg, #000155, #0FCDA7);
    color: white;
    border-radius: 15px;
    padding: 15px 30px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.see-more-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    color: white;
    text-decoration: none;
}

.see-more-icon {
    background: rgba(255, 255, 255, 0.2);
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.see-more-btn:hover .see-more-icon {
    transform: translateX(5px);
    background: rgba(255, 255, 255, 0.3);
}

.chart-card {
    background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
    border-radius: 20px;
    border: 2px solid rgba(102, 126, 234, 0.1);
    overflow: hidden;
}

.chart-header {
    background: linear-gradient(135deg, #000155, #0FCDA7);
    color: white;
    padding: 20px;
    text-align: center;
    font-weight: 700;
    font-size: 1.3rem;
}

.scroll-container {
    scrollbar-width: thin;
    scrollbar-color: rgba(102, 126, 234, 0.3) transparent;
}

.scroll-container::-webkit-scrollbar {
    width: 6px;
    height: 6px;
}

.scroll-container::-webkit-scrollbar-track {
    background: rgba(102, 126, 234, 0.1);
    border-radius: 10px;
}

.scroll-container::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 10px;
}

.scroll-container::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #5a67d8 0%, #6b63b8 100%);
}

.loading-spinner {
    display: inline-block;
    width: 40px;
    height: 40px;
    border: 4px solid rgba(102, 126, 234, 0.3);
    border-radius: 50%;
    border-top-color: #667eea;
    animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

.fade-in {
    animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.position-badge {
    background: linear-gradient(135deg, #000155, #0FCDA7);;
    color: white;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

@media (max-width: 768px) {
    .action-card {
        margin-bottom: 15px;
    }
    
    .admin-avatar {
        width: 60px;
        height: 60px;
    }
    
    .official-image {
        width: 70px;
        height: 70px;
    }
}

</style>














<body class="hold-transition sidebar-mini">
<div class="wrapper">     


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white" style="border: none; box-shadow: none;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item mr-3">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                  <i class="fas fa-bars" style="color:black;"></i>
                </a>
            </li>

          <li class="nav-item">
              <span class="navbar-text font-weight-bold font-inter" style="color:black; font-size: 18px;"> BARANGAY BUAYA</span>
          </li>
          
          
        </ul>



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
                    <a class="dropdown-item ml-3 font-inter" href="settings_addNew_off.php">Add New Official</a>
                    <a class="dropdown-item ml-3 font-inter" href="settings_list_official.php">List of Officials</a>
                    <a class="dropdown-item ml-3 font-inter" href="settings_officials_endterm.php">Officials End Terms</a>
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
        <li class="nav-item mr-4 font-inter">
          <a class="nav-link" href="admin_profile.php" >
            <i class="fa-solid fa-user mr-1" style="color:black;"></i>
            <span style="color:black;">Admin</span>
          </a>
        </li>

        <!-- SIGN OUT -->
        <li class="nav-item mr-4 font-inter">
          <a class="nav-link" href="../views/admin/sign_out.php" role="button">
            <i class="fa-solid fa-right-from-bracket mr-1" style="color:black;"></i>
            <span style="color:black;">Sign Out</span>
          </a>
        </li>

      </ul>
    </nav>











  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4" style="background: linear-gradient(135deg, #000155, #0FCDA7);">
    <!-- Brand Logo -->
     <a href="buayaProfile.php">    
      <div class="brand-link d-flex justify-content-center align-items-center">
        <img src="img/logo.jpg" alt="BrgyBuaya Logo" class="brand-image elevation-4" >
      </div>
      </a>


    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">




          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt" style="color:black;"></i>
              <p style="color:black;">Dashboard</p>
            </a>
          </li>




       
            <li class="nav-item">
              <a href="announcement.php" class="nav-link">
                <i class="nav-icon fa-solid fa-circle-info" style="color:black;"></i>
                <p style="color:black;">Announcements</p>
              </a>
            </li>





       

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy" style="color:black;"></i>
                <p style="color:black;">Document Requests <i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview">
      
                <li class="nav-item">
                  <a href="pending_request.php" class="nav-link">
                    <i class="nav-dr-icon nav-icon fa-solid fa-hourglass-end"></i>
                    <p class="nav-select" style="color:black; font-size: 15px; margin-left: 8px;">Pending Requests</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="approved_request.php" class="nav-link" style="color:black;">
                    <i class="nav-dr-icon nav-icon fa-solid fa-person-circle-check"></i>
                    <p class="nav-select" style="color:black;">Approved Requests</p>
                  </a>
                </li>

              </ul>

            </li>
      




          <li class="nav-item">

            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-users" style="color:black;"></i>
              <p style="color:black;">Directory <i class="right fas fa-angle-left"></i></p>
            </a>

            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="brgy_officials.php" class="nav-link">
                  <i class="nav-direct-icon nav-icon fa-solid fa-users-line"></i>
                  <p class="nav-select" style="color:black;">Barangay Officials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="brgy_sk_officials.php" class="nav-link">
                  <i class="nav-direct-icon nav-icon fa-solid fa-users-line"></i>
                  <p class="nav-select" style="color:black;">SK Officials</p>
                </a>
              </li>

            </ul>

          </li>





            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-users-line" style="color:black;"></i>
                <p style="color:black;">Residence <i class="fas fa-angle-left right"></i></p>
              </a>
              
              <ul class="nav nav-treeview">
              
                <li class="nav-item">
                  <a href="admin_addNewResidence.php" class="nav-link">
                    <i class="nav-residence-icon nav-icon fa-solid fa-user-plus"></i>
                    <p class="nav-select" style="color:black;">New Residence</p>
                  </a>
                </li>
              
                <li class="nav-item">
                  <a href="admin_allResidence.php" class="nav-link">
                    <i class="nav-residence-icon nav-icon fa-solid fa-users-line"></i>
                    <p class="nav-select" style="color:black;">All Residence</p>
                  </a>
                </li>
              
                <li class="nav-item">
                  <a href="admin_archieveResidence.php" class="nav-link">
                    <i class="nav-residence-icon nav-icon fa-solid fa-users-slash"></i>
                    <p class="nav-select" style="color:black;">Archive Residence</p>
                  </a>
                </li>
              
              </ul>
            </li>




          <li class="nav-header text-white">OTHERS</li>



        
            <li class="nav-item">
              <a href="calendar.php" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt" style="color:black;"></i>
                <p style="color:black;">Calendar</p>
              </a>
            </li>
       




            <li class="nav-item">
              <a href="reports.php" class="nav-link">
                <i class="nav-icon fa-solid fa-file" style="color:black;"></i>
                <p style="color:black;">Reports</p>
              </a>
            </li>






            <li class="nav-item">
              <a href="position.php" class="nav-link">
                <i class="nav-icon fa-solid fa-user" style="color:black;"></i>
                <p style="color:black;">Position</p>
              </a>
            </li>



          



            <li class="nav-item">
              <a href="activity_Log.php" class="nav-link">
                <i class="nav-icon fa-solid fa-user" style="color:black;"></i>
                <p style="color:black;">Activity logs</p>
              </a>
            </li>





        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


















  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid p-3">
                <div class="dashboard-card p-0">
                    <div class="row m-3 p-0">
                        <!-- Main Content Column -->
                        <div class="col-lg-8">
                            
                            <!-- Active Admins Section -->
                            <div class="dashboard-card mb-4 fade-in">
                                <div class="section-header">
                                    <i class="fas fa-users-cog mr-2"></i>Active Administrators
                                </div>
                                <div class="p-3">
                                    <div class="d-flex flex-nowrap overflow-auto scroll-container" id="activeAdminsContainer" style="gap: 20px; padding: 10px 0;">
                                        <!-- Loading state -->
                                        <div class="text-center w-100 py-4">
                                            <div class="loading-spinner mx-auto"></div>
                                            <p class="mt-3 text-muted">Loading active administrators...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Cards -->
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <a href="announcement.php" style="text-decoration: none; color: inherit;">
                                        <div class="action-card p-4 h-100">
                                            <div class="d-flex align-items-center">
                                                <div class="action-card .info-box-icon mr-3">
                                                    <i class="fas fa-bullhorn"></i>
                                                </div>
                                                <div class="info-box-content">
                                                    <h6 class="mb-1 font-weight-bold">Post New Announcement</h6>
                                                    <p class="text-muted mb-0 small">Share important updates with residents</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <a href="admin_addNewResidence.php" style="text-decoration: none; color: inherit;">
                                        <div class="action-card p-4 h-100">
                                            <div class="d-flex align-items-center">
                                                <div class="action-card .info-box-icon mr-3">
                                                    <i class="fas fa-user-plus"></i>
                                                </div>
                                                <div class="info-box-content">
                                                    <h6 class="mb-1 font-weight-bold">Register New Resident</h6>
                                                    <p class="text-muted mb-0 small">Add new community members</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!-- Pending Requests Section -->
                            <div class="dashboard-card mb-4 fade-in">
                                <div class="section-header">
                                    <i class="fas fa-clock mr-2"></i>Pending Requests
                                    <span class="badge badge-warning ml-2" id="pendingCount">0</span>
                                </div>
                                <div class="scroll-container" style="height: 300px; overflow-y: auto;">
                                    <div class="p-3" id="pendingRequestsContainer">
                                        <!-- Sample pending request (replace with your dynamic content) -->
                                        <div class="pending-request-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1 font-weight-bold">Jay Mike Palang</h6>
                                                    <p class="text-muted mb-0 small">
                                                        <i class="fas fa-calendar mr-1"></i>Submitted 2 hours ago
                                                    </p>
                                                    <span class="badge badge-info mt-1">Certificate Request</span>
                                                </div>
                                                <div class="d-flex gap-2" style="gap: 10px;">
                                                    <a href="pending_request.php" class="btn-action btn-view">
                                                        <i class="fas fa-eye mr-1"></i>View
                                                    </a>
                                                    <a href="#" class="btn-action btn-approve">
                                                        <i class="fas fa-check mr-1"></i>Approve
                                                    </a>
                                                    <a href="#" class="btn-action btn-reject">
                                                        <i class="fas fa-times mr-1"></i>Reject
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Add more sample requests -->
                                        <div class="pending-request-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1 font-weight-bold">Maria Santos</h6>
                                                    <p class="text-muted mb-0 small">
                                                        <i class="fas fa-calendar mr-1"></i>Submitted 5 hours ago
                                                    </p>
                                                    <span class="badge badge-success mt-1">Business Permit</span>
                                                </div>
                                                <div class="d-flex gap-2" style="gap: 10px;">
                                                    <a href="pending_request.php" class="btn-action btn-view">
                                                        <i class="fas fa-eye mr-1"></i>View
                                                    </a>
                                                    <a href="#" class="btn-action btn-approve">
                                                        <i class="fas fa-check mr-1"></i>Approve
                                                    </a>
                                                    <a href="#" class="btn-action btn-reject">
                                                        <i class="fas fa-times mr-1"></i>Reject
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- See More Button -->
                                    <div class="text-center p-3 border-top">
                                        <a href="pending_request.php" class="see-more-btn">
                                            View All Pending Requests
                                            <div class="see-more-icon">
                                                <i class="fas fa-arrow-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Officials Profile Section -->
                            <div class="dashboard-card fade-in">
                                <div class="section-header">
                                    <i class="fas fa-user-tie mr-2"></i>Barangay Officials
                                </div>
                                <div class="scroll-container" style="height: 300px; overflow-y: auto;">
                                    <div class="p-3">
                                        <div class="container-item-officials">
                                            <!-- Loading state -->
                                            <div class="text-center py-4">
                                                <div class="loading-spinner mx-auto"></div>
                                                <p class="mt-3 text-muted">Loading officials...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <!-- Chart Column -->
                        <div class="col-lg-4">
                            <div class="chart-card fade-in" style="height: fit-content;">
                                <div class="chart-header">
                                    <i class="fas fa-chart-pie mr-2"></i>Population Distribution
                                </div>
                                <div class="p-4">
                                    <canvas id="pieChart" style="height: 300px; width: 100%;"></canvas>
                                </div>
                                <div id="pieLegend" class="scroll-container px-4 pb-4" style="max-height: 550px; overflow-y: auto;"></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>



</div>
<!-- ./wrapper -->




<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../assets/dist/js/adminlte.js"></script>

<!-- for chart -->
 <!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>


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


<!-- get all active admins -->
<script>
        // Enhanced Active Admins Script
        document.addEventListener('DOMContentLoaded', function() {
            fetchActiveAdmins();
            fetchPendingRequests();
            
            function fetchActiveAdmins() {
                fetch('../views/admin/get_active_admins.php')
                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        return response.json();
                    })
                    .then(admins => {
                        renderActiveAdmins(admins);
                    })
                    .catch(error => {
                        console.error('Error fetching active admins:', error);
                        document.getElementById('activeAdminsContainer').innerHTML = `
                            <div class="text-center py-4 w-100">
                                <div class="alert alert-danger border-0" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%); color: white; border-radius: 15px;">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                    Failed to load active admins. Please try again later.
                                </div>
                            </div>`;
                    });
            }
            
            function renderActiveAdmins(admins) {
                const container = document.getElementById('activeAdminsContainer');
                
                if (!admins || admins.length === 0) {
                    container.innerHTML = `
                        <div class="text-center py-4 w-100">
                            <i class="fas fa-users text-muted" style="font-size: 3rem; opacity: 0.3;"></i>
                            <p class="text-muted mt-3">No active admins found</p>
                        </div>`;
                    return;
                }
                
                container.innerHTML = admins.map(admin => `
                    <div class="admin-container d-flex flex-column align-items-center" style="flex: 0 0 auto; min-width: 120px;">
                        <div style="position: relative;">
                            <img src="${admin.admin_image ? '../server_imgs/' + admin.admin_image : 'img/default-admin.jpg'}" 
                                 alt="${admin.admin_fname}"
                                 class="admin-avatar"
                                 onerror="this.src='img/default-admin.jpg'">
                            <div class="status-indicator"></div>
                        </div>
                        <h6 class="mt-3 mb-0 font-weight-bold text-center" style="font-size: 0.9rem;">
                            ${admin.admin_fname}
                        </h6>
                        <p class="text-muted small mb-0">Administrator</p>
                    </div>
                `).join('');
                
                // Add fade-in animation
                container.querySelectorAll('.admin-container').forEach((el, index) => {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        el.style.transition = 'all 0.5s ease';
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            }
        });

        // Enhanced Pending Requests Script
        function fetchPendingRequests() {
            fetch('../views/admin/get_some_request.php')
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(result => {
                    if (result.success) {
                        renderPendingRequests(result.data);
                        updatePendingCount(result.count);
                    } else {
                        throw new Error(result.error || 'Failed to fetch pending requests');
                    }
                })
                .catch(error => {
                    console.error('Error fetching pending requests:', error);
                    document.getElementById('pendingRequestsContainer').innerHTML = `
                        <div class="text-center py-4">
                            <div class="alert alert-danger border-0" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%); color: white; border-radius: 15px;">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Failed to load pending requests. Please try again later.
                            </div>
                        </div>`;
                });
        }

        function renderPendingRequests(requests) {
            const container = document.getElementById('pendingRequestsContainer');
            
            if (!requests || requests.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-5">
                        <i class="fas fa-clipboard-check text-success" style="font-size: 4rem; opacity: 0.3;"></i>
                        <h5 class="text-muted mt-3">No Pending Requests</h5>
                        <p class="text-muted">All requests have been processed!</p>
                    </div>`;
                return;
            }

            container.innerHTML = requests.map((request, index) => {
                // Get certificate type badge color
                const badgeColor = getCertificateTypeBadgeColor(request.certificate_type);
                
                return `
                    <div class="pending-request-item fade-in" style="animation-delay: ${index * 0.1}s;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <h6 class="mb-1 font-weight-bold">${request.full_name}</h6>
                                <p class="text-muted mb-2 small">
                                    <i class="fas fa-calendar mr-1"></i>Submitted ${request.time_ago}
                                </p>
                                <div class="d-flex flex-wrap gap-2" style="gap: 8px;">
                                    <span class="badge ${badgeColor}">${request.certificate_type}</span>
                                    
                                </div>
                            </div>
                            <div class="d-flex gap-2 ml-3" style="gap: 8px;">
                                <a href="pending_request.php?req_id=${request.req_id}" 
                                   class="btn-action btn-view" 
                                   title="View Request Details">
                                    <i class="fas fa-eye mr-1"></i>View
                                </a>
                                <button onclick="approveRequest(${request.req_id})" 
                                        class="btn-action btn-approve" 
                                        title="Approve Request">
                                    <i class="fas fa-check mr-1"></i>Approve
                                </button>
                                <button onclick="rejectRequest(${request.req_id})" 
                                        class="btn-action btn-reject" 
                                        title="Reject Request">
                                    <i class="fas fa-times mr-1"></i>Reject
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');

            // Add fade-in animation
            container.querySelectorAll('.pending-request-item').forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.5s ease';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100);
            });
        }

        function getCertificateTypeBadgeColor(certificateType) {
            const typeColors = {
                'Certificate of Residency': 'badge-primary',
                'Barangay Clearance': 'badge-success',
                'Certificate of Indigency': 'badge-info',
                'Business Permit': 'badge-warning',
                'Barangay ID': 'badge-secondary',
                'Certificate of Employment': 'badge-dark'
            };
            
            return typeColors[certificateType] || 'badge-secondary';
        }

        // Action functions for approve/reject buttons
        function approveRequest(reqId) {
            // Redirect to pending_request.php after short delay
          setTimeout(() => {
              window.location.href = 'pending_request.php';
          }, 1000);
        }

        function rejectRequest(reqId) {
            // Redirect to pending_request.php after short delay
          setTimeout(() => {
              window.location.href = 'pending_request.php';
          }, 1000);
        }

        // Notification function
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} position-fixed`;
            notification.style.cssText = `
                top: 20px;
                right: 20px;
                z-index: 9999;
                min-width: 300px;
                border-radius: 10px;
                border: none;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                animation: slideInRight 0.3s ease;
            `;
            notification.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'} mr-2"></i>
                    ${message}
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Update pending requests count
        function updatePendingCount(count = 0) {
            document.getElementById('pendingCount').textContent = count;
        }

        //  Pie Chart Script
        $(function () {
            const pieChartCanvas = $('#pieChart').get(0);

            if (!pieChartCanvas) {
                console.warn("pieChart element not found.");
                return;
            }

            const ctx = pieChartCanvas.getContext('2d');

            fetch('../views/admin/get_resident_each_zone.php')
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(item => item.zone_name);
                    const counts = data.map(item => parseInt(item.count));

                    const baseColors = [
                        '#012D3A', '#023948', '#0A4C5F', '#116278', '#007D9E',
                        '#1899B5', '#2BB2D7', '#4CB9D6', '#59DAFC', '#A5ECFF', '#E0F7FA'
                    ];

                    const dynamicColors = labels.map((_, i) => baseColors[i % baseColors.length]);

                    const pieData = {
                        labels: labels,
                        datasets: [{
                            data: counts,
                            backgroundColor: dynamicColors,
                            borderWidth: 2,
                            borderColor: '#ffffff',
                            hoverBorderWidth: 3,
                            hoverBorderColor: '#ffffff'
                        }]
                    };

                    const pieOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: 'rgba(255, 255, 255, 0.95)',
                                titleColor: '#333',
                                bodyColor: '#666',
                                borderColor: '#e0e0e0',
                                borderWidth: 1,
                                cornerRadius: 10,
                                displayColors: true
                            }
                        },
                        animation: {
                            animateRotate: true,
                            animateScale: true,
                            duration: 1000
                        }
                    };

                    new Chart(ctx, {
                        type: 'pie',
                        data: pieData,
                        options: pieOptions
                    });

                    // Enhanced Legend
                    let legendHTML = '<div style="display: flex; flex-direction: column; gap: 12px;">';

                    labels.forEach((label, i) => {
                        legendHTML += `
                            <div style="display: flex; align-items: center; padding: 8px; border-radius: 10px; background: rgba(102, 126, 234, 0.05); transition: all 0.3s ease;" 
                                 onmouseover="this.style.background='rgba(102, 126, 234, 0.1)'" 
                                 onmouseout="this.style.background='rgba(102, 126, 234, 0.05)'">
                                <div style="width: 20px; height: 20px; background: ${dynamicColors[i]}; border-radius: 50%; margin-right: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);"></div>
                                <div style="flex: 1;">
                                    <div style="font-weight: 600; color: #333; font-size: 0.9rem;">${label}</div>
                                    <div style="color: #666; font-size: 0.8rem;">${counts[i]} residents</div>
                                </div>
                            </div>
                        `;
                    });

                    legendHTML += '</div>';
                    document.getElementById('pieLegend').innerHTML = legendHTML;
                })
                .catch(error => {
                    console.error("Error loading pie chart data:", error);
                    document.getElementById('pieLegend').innerHTML = `
                        <div class="text-center py-4">
                            <i class="fas fa-chart-pie text-muted" style="font-size: 3rem; opacity: 0.3;"></i>
                            <p class="text-muted mt-3">Failed to load chart data</p>
                        </div>`;
                });
        });

        // Officials Script
        document.addEventListener("DOMContentLoaded", function () {
            fetch("../views/admin/official.php")
                .then(response => response.json())
                .then(data => {
                    const container = document.querySelector(".container-item-officials");
                    container.innerHTML = "";

                    if (!data || data.length === 0) {
                        container.innerHTML = `
                            <div class="text-center py-4">
                                <i class="fas fa-user-tie text-muted" style="font-size: 3rem; opacity: 0.3;"></i>
                                <p class="text-muted mt-3">No officials found</p>
                            </div>`;
                        return;
                    }

                    data.forEach((official, index) => {
                        const fullName = `${official.res_first_name} ${official.res_middle_name || ''} ${official.res_last_name} ${official.res_suffix || ''}`.trim();
                        const birthdate = official.res_date_of_birth;
                        const position = official.pos_name;
                        const imagePath = official.res_image ? `../${official.res_image}` : '../server_imgs/default_user_img.jpg';

                        const template = `
                        <a href="brgy_officialProfile.php?res_id=${official.res_id}" style="text-decoration: none; color: inherit;">
                            <div class="official-card p-3 fade-in" style="animation-delay: ${index * 0.1}s;">
                                <div class="d-flex align-items-center" style="gap: 15px;">
                                    <img src="${imagePath}" alt="Profile" class="official-image">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 font-weight-bold">${fullName}</h6>
                                        <p class="text-muted mb-2 small">
                                            <i class="fas fa-birthday-cake mr-1"></i>${birthdate}
                                        </p>
                                        <span class="position-badge">${position}</span>
                                    </div>
                                    <div class="text-muted">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        `;

                        container.innerHTML += template;
                    });

                    // Add "See More" button
                    const seeMore = `
                        <div class="text-center pt-3">
                            <a href="settings_list_official.php" class="see-more-btn">
                                View All Officials
                                <div class="see-more-icon">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    `;
                    container.innerHTML += seeMore;
                })
                .catch(err => {
                    console.error("Failed to load officials:", err);
                    const container = document.querySelector(".container-item-officials");
                    container.innerHTML = `
                        <div class="text-center py-4">
                            <div class="alert alert-danger border-0" style="background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%); color: white; border-radius: 15px;">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Failed to load officials. Please try again later.
                            </div>
                        </div>`;
                });
        });

        // Update pending requests count (you can integrate this with your views)
        function updatePendingCount() {
            // Replace this with actual API call to get pending requests count
            const count = document.querySelectorAll('.pending-request-item').length;
            document.getElementById('pendingCount').textContent = count;
        }

        // Call after DOM loads
        setTimeout(updatePendingCount, 1000);

        // Add smooth scroll behavior for containers
        document.querySelectorAll('.scroll-container').forEach(container => {
            container.addEventListener('wheel', function(e) {
                if (this.scrollHeight > this.clientHeight) {
                    e.preventDefault();
                    this.scrollTop += e.deltaY;
                }
            });
        });

        // Add click animations for action cards
        document.querySelectorAll('.action-card').forEach(card => {
            card.addEventListener('mousedown', function() {
                this.style.transform = 'translateY(-3px) scale(0.98)';
            });
            
            card.addEventListener('mouseup', function() {
                this.style.transform = 'translateY(-5px) scale(1)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
</script>


</body>
</html>
