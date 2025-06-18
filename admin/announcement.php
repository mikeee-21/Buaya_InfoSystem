



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>New Announcement</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
html, body {
  height: 100%;
  overflow: hidden;
}

body {
  font-size: 0.9rem;
  display: flex;
  flex-direction: column;
}

.wrapper {
  display: flex !important;
  flex-direction: column;
  height: 100vh;
  overflow: hidden;
}

.content-wrapper {
  flex: 1;
  overflow-y: auto;
  padding-top: 10px;
}
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
  color: rgb(0, 34, 144); 
  text-decoration: none ;
}


/* Font color on hover */
.dropdown-menu .dropdown-item:hover,
.dropdown-menu .dropdown-item:focus,
.dropdown-menu .dropdown-item:active {
  color: rgb(0, 34, 144); 
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







.modal-header {
  background-color: #000155;
  color: white;
}

.announcement-card {
  transition: all 0.3s ease;
  font-size: 0.9rem;
}

.announcement-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
}

.announcement-image {
  max-width: 100%;
  max-height: 200px;
  margin-bottom: 10px;
  border-radius: 5px;
}

.announcement-images {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 10px;
}

.announcement-images img {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 5px;
}

.image-preview-item img, 
.announcement-image,
.announcement-images img {
  width: 80px;  /* reduced from 120px */
  height: 80px; /* reduced from 120px */
  object-fit: cover;
  border-radius: 5px;
}

.announcement-images.with-counter {
  position: relative;
}

.image-counter {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(0,0,0,0.7);
  color: white;
  padding: 5px 10px;
  border-radius: 5px;
  font-weight: bold;
  cursor: pointer;
}

@keyframes highlightNew {
  from { background-color: #e9f7f4; }
  to { background-color: white; }
}

.new-announcement {
  animation: highlightNew 2s ease;
}


.main-header {
  min-height: 50px;
}

.main-sidebar {
  padding-top: 50px;
}

.brand-link {
  height: 50px;
  padding: 0.8rem 1rem;
}

.user-panel {
  padding: 10px;
}

.card {
  margin-bottom: 15px;
}

.card-header {
  padding: 0.5rem 1rem;
}

.card-body {
  padding: 1rem;
}

.form-control-enhancedform-control {
  font-size: 0.9rem;
  padding: 0.375rem 0.75rem;
}

.btn {
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
}

.modal-body {
  padding: 1rem;
}

.modal-footer {
  padding: 0.75rem;
}

.comment-section {
  margin-top: 15px;
  border-top: 1px solid #eee;
  padding-top: 10px;
}

.comment {
  padding: 10px;
  margin-bottom: 5px;
  border-radius: 5px;
  background-color: #f8f9fa;
}

.comment-author {
  font-weight: bold;
  font-size: 14px;
}

.comment-time {
  font-size: 12px;
  color: #777;
  margin-left: 10px;
}

.comment-text {
  margin-top: 5px;
  font-size: 14px;
}

.reply {
  margin-left: 20px;
  padding: 8px;
  margin-top: 5px;
  border-radius: 5px;
  background-color: #e9f7f4;
}

.reply-author {
  font-weight: bold;
  font-size: 13px;
  color: #52AB99;
}

.reply-time {
  font-size: 11px;
  color: #777;
  margin-left: 10px;
}

.reply-text {
  margin-top: 3px;
  font-size: 13px;
}

.reply-form {
  margin-top: 5px;
  display: none;
}

.image-preview-container {
  display: flex;
  flex-wrap: wrap;
  gap: 8px; 
  margin-top: 8px;
}

.image-preview-item {
  position: relative;
  width: 80px; 
  height: 80px; 
}

.image-preview-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 5px;
}

.remove-image-btn {
  position: absolute;
  top: -8px;
  right: -8px;
  background-color: #ff4d4d;
  color: white;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  font-size: 12px;
}

.scroll-container {
  height: 650px;
  overflow-y: auto;

}

.gallery-modal .modal-body {
  padding: 0;
}

.gallery-container {
  position: relative;
  width: 100%;
  text-align: center;
  background-color: #000;
  min-height: 400px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.gallery-image {
  max-width: 100%;
  max-height: 70vh;
  object-fit: contain; 
  margin: 0 auto;
}

.gallery-nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0,0,0,0.5);
  color: white;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  font-size: 20px;
}

.gallery-nav.prev {
  left: 10px;
}

.gallery-nav.next {
  right: 10px;
}

.gallery-counter {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
  background-color: rgba(0,0,0,0.5);
  color: white;
  padding: 5px 10px;
  border-radius: 5px;
}

.image-counter-container {
  position: relative;
  cursor: pointer;
}

.image-counter {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 5px 10px;
  border-radius: 4px;
  font-weight: bold;
}

#galleryCurrentImage {
  transition: opacity 0.3s ease;
  max-height: 80vh;
  max-width: 100%;
}


.comment-section-title {
  font-weight: 600;
  color: #444;
  margin-bottom: 0.5rem;
}

.fa-comments {
  color: #6c757d; /* Bootstrap muted */
}

.like-count {
  font-size: 0.9rem;
  margin-right: 10px;
  color: #555;
}




/* post announcement card */
:root {
    --primary-color: #000155;
    --primary-hover: #000033;
    --secondary-color: #6c757d;
    --success-color: #198754;
    --border-color: #e9ecef;
    --light-bg: #f8f9fa;
    --shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    --shadow-lg: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    --border-radius: 12px;
}

.announcement-card {
    border: none;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
}

.announcement-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1);
}

.card-header-custom {
    background: linear-gradient(135deg, var(--primary-color), #1a237e);
    color: white;
    padding: 1rem;
    border: none;
    position: relative;
    overflow: hidden;
}

.card-header-custom::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transform: translate(30px, -30px);
}

.header-content {
    position: relative;
    z-index: 2;
}

.logo-container {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid rgba(255, 255, 255, 0.3);
    margin-right: 0.75rem;
}

.logo-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.header-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin: 0;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.header-subtitle {
    font-size: 0.875rem;
    opacity: 0.9;
    margin: 0;
    font-weight: 400;
}

.card-body-custom {
    padding: 2rem 1.5rem;
    background: white;
}

.upload-section {
    background: var(--light-bg);
    border: 2px dashed var(--border-color);
    border-radius: var(--border-radius);
    padding: 2rem;
    text-align: center;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.upload-section:hover {
    border-color: var(--primary-color);
    background: rgba(0, 1, 85, 0.05);
}

.upload-section.dragover {
    border-color: var(--primary-color);
    background: rgba(0, 1, 85, 0.1);
    transform: scale(1.02);
}

.upload-icon {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.upload-text {
    color: var(--secondary-color);
    margin-bottom: 0.5rem;
}

.upload-btn {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: var(--shadow);
}

.upload-btn:hover {
    background: var(--primary-hover);
    transform: translateY(-1px);
    box-shadow: 0 0.25rem 0.5rem rgba(0, 1, 85, 0.3);
}

.image-preview-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding: 1rem;
    background: var(--light-bg);
    border-radius: var(--border-radius);
}

.image-preview {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    aspect-ratio: 1;
    box-shadow: var(--shadow);
}

.image-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-remove {
    position: absolute;
    top: 5px;
    right: 5px;
    background: rgba(220, 53, 69, 0.9);
    color: white;
    border: none;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    cursor: pointer;
    transition: all 0.2s;
}

.image-remove:hover {
    background: #dc3545;
    transform: scale(1.1);
}

.form-group-enhanced {
    margin-bottom: 1.5rem;
    position: relative;
}

.form-control-enhanced {
    border: 2px solid var(--border-color);
    border-radius: 10px;
    padding: 0.875rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
}

.form-control-enhanced:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(0, 1, 85, 0.15);
    background: white;
}

.form-control-enhanced::placeholder {
    color: #adb5bd;
    font-weight: 400;
}

.floating-label {
    position: absolute;
    top: 0.875rem;
    left: 1rem;
    background: white;
    padding: 0 0.5rem;
    color: var(--secondary-color);
    font-size: 1rem;
    transition: all 0.3s ease;
    pointer-events: none;
}

.form-control-enhanced:focus + .floating-label,
.form-control-enhanced:not(:placeholder-shown) + .floating-label {
    top: -0.5rem;
    font-size: 0.875rem;
    color: var(--primary-color);
    font-weight: 500;
}

.select-enhanced {
    position: relative;
}

.select-enhanced::after {
    content: '\f107';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--secondary-color);
    pointer-events: none;
}

.select-enhanced select {
    appearance: none;
    padding-right: 3rem;
}

.textarea-enhanced {
    min-height: 120px;
    width: 100%;
    resize: vertical;
}

.action-buttons {
    display: flex;
    gap: 0.75rem;
    justify-content: flex-end;
    align-items: center;
    margin-top: 2rem;
}

.btn-cancel {
    background: transparent;
    color: var(--secondary-color);
    border: 2px solid var(--border-color);
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-cancel:hover {
    background: var(--secondary-color);
    color: white;
    border-color: var(--secondary-color);
}

.btn-post {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: var(--shadow);
    position: relative;
    overflow: hidden;
}

.btn-post::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-post:hover::before {
    left: 100%;
}

.btn-post:hover {
    background: var(--primary-hover);
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0, 1, 85, 0.3);
}

.btn-post:active {
    transform: translateY(0);
}

/* Loading state */
.btn-loading {
    position: relative;
    color: transparent;
}

.btn-loading::after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    top: 50%;
    left: 50%;
    margin-left: -10px;
    margin-top: -10px;
    border: 2px solid transparent;
    border-top-color: #ffffff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-body-custom {
        padding: 1.5rem 1rem;
    }
    
    .upload-section {
        padding: 1.5rem;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .btn-cancel,
    .btn-post {
        width: 100%;
    }
}

</style>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
   <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white " style=" border: none; box-shadow: none;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item mr-3">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                  <i class="fas fa-bars" style="color:black;"></i>
                </a>
            </li>

          <li class="nav-item">
              <span class="navbar-text font-weight-bold" style="color:black; font-size: 18px;"> BARANGAY BUAYA</span>
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



    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 " style="padding-top: 92px; background: linear-gradient(135deg, #000155, #0FCDA7);">
      <!-- Brand Logo -->
      <a href="buayaProfile.php" classs="m-1">    
        <div class="brand-link d-flex justify-content-center align-items-center">
          <img src="img/logo.jpg" alt="BrgyBuaya Logo" class="brand-image elevation-4" >
        </div>
        </a>

      <!-- Sidebar -->
      <div class="sidebar mt-5">
        
        <!-- Sidebar Menu -->
        <nav class="mt-5">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->


            <li class="nav-item menu-open">
              <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt" style="color:black;"></i>
                <p style="color:black;">
                  Dashboard
                </p>
              </a>
            </li>



            <li class="nav-item">
              <a href="announcement.php" class="nav-link">
              <i class="nav-icon fa-solid fa-circle-info" style="color:black;"></i>
                <p style="color:black;">
                  Announcements
                </p>
              </a>
            </li>



            <li class="nav-item">

              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy" style="color:black;"></i>
                <p style="color:black;">
                Document Requests
                  <i class="fas fa-angle-left right" ></i>
                </p>
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
                                <p class="nav-select" style="color:black; ">Approved Requests</p>
                              </a>
                            </li>
                          </ul>

              
            </li>



            <li class="nav-item">

              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-users" style="color:black;"></i>
                <p style="color:black;">
                  Directory
                  <i class="right fas fa-angle-left" ></i>
                </p>
              </a>


                      <ul class="nav nav-treeview">

                        <li class="nav-item">
                          <a href="brgy_officials.php" class="nav-link">
                            <i class="nav-direct-icon nav-icon fa-solid fa-users-line" ></i>
                            <p class="nav-select" style="color:black;">Barangay Officials</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="brgy_sk_officials.php" class="nav-link">
                            <i class="nav-direct-icon nav-icon fa-solid fa-users-line" ></i>
                            <p class="nav-select" style="color:black;">SK Officials</p>
                          </a>
                        </li>

                      </ul>

            </li>




            <li class="nav-item">
              
              <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-users-line" style="color:black;"></i>
                <p style="color:black;">
                  Residence
                  <i class="fas fa-angle-left right" ></i>
                </p>
              </a>

                <ul class="nav nav-treeview">
              
                  <li class="nav-item" >
                      <a href="admin_addNewResidence.php" class="nav-link" >
                        <i class=" nav-residence-icon nav-icon fa-solid fa-user-plus" ></i>
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
                        <i class="nav-residence-icon nav-icon fa-solid fa-users-slash" ></i>
                        <p class="nav-select" style="color:black;">Archive Residence</p>
                      </a>
                    </li>

                </ul>

            </li>



            <li class="nav-header text-white">OTHERS</li>



            <li class="nav-item">
              <a href="calendar.php" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt" style="color:black;"></i>
                <p style="color:black;">
                  Calendar
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reports.php" class="nav-link">
              <i class="nav-icon fa-solid fa-file" style="color:black;"></i>
                <p style="color:black;">
                  Reports
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="position.php" class="nav-link">
                <i class="nav-icon fa-solid fa-user" style="color:black;"></i>
                  <p style="color:black;">
                    Position
                  </p>
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




    <!-- content wrapper -->
    <div class="content-wrapper font-inter">
      <!-- main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row mt-2">


            <!-- new announcement Section -->
            <div class="col-md-8 col-lg-6">
                <div class="card announcement-card">
                    <div class="card-header-custom">
                        <div class="header-content d-flex align-items-center">
                            <div class="logo-container">
                                <img src="img/logo.jpg" alt="Barangay Logo">
                            </div>
                            <div>
                                <h5 class="header-title">Create Announcement</h5>
                                <p class="header-subtitle">Share important updates with your community</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body-custom">
                        <form id="announcementForm">
                            <input type="hidden" id="edit_announcement_id" name="edit_announcement_id" value="">
                            
                            <!-- Image Upload Section -->
                            <div class="upload-section" id="uploadSection">
                                <div class="upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <p class="upload-text mb-2">
                                    <strong>Click to upload</strong> or drag and drop images here
                                </p>
                                <p class="text-muted small mb-3">PNG, JPG, GIF up to 10MB each</p>
                                <button type="button" class="upload-btn" id="image-upload-btn">
                                    <i class="fas fa-plus me-2"></i>Choose Images
                                </button>
                                <input type="file" name="announcement_images[]" id="announcement_images" class="d-none" accept="image/*" multiple>
                            </div>

                            <!-- Image Preview Container -->
                            <div id="imagePreviewContainer" class="image-preview-container" style="display: none;">
                                <!-- Image previews will be added here dynamically -->
                            </div>

                            <!-- Title Input -->
                            <div class="form-group-enhanced">
                                <input type="text" class="form-control-enhanced w-100" id="announcement_title" name="announcement_title" placeholder=" " required>
                                <label class="floating-label">Announcement Title</label>
                            </div>

                            <!-- Announcement Type -->
                            <div class="form-group-enhanced">
                                <div class="select-enhanced">
                                    <select class="form-control-enhanced w-100" id="announcementType" name="announcementType" required>
                                      <option value="" selected disabled>Type of Announcement</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Content Textarea -->
                            <div class="form-group-enhanced">
                                <textarea class="form-control-enhanced textarea-enhanced" name="announcement_content" id="announcement_content" placeholder=" " required></textarea>
                                <label class="floating-label">What would you like to announce?</label>
                            </div>

                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <button type="button" id="resetFormBtn" class="btn-cancel" style="display: none;">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </button>
                                <button type="submit" class="btn-post">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    <span id="submitBtnText">Post Announcement</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            


            <!-- announcement display nga part -->
            <div class="col-md-6 ">
              <div class="card" style="display: flex; flex-direction: column;">
                <div class="card-header-custom" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <div class="header-content d-flex align-items-center">
                        <div class="logo-container">
                            <img src="img/logo.jpg" alt="Barangay Logo">
                        </div>
                        <div>
                            <h5 class="header-title">Announcements</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 scroll-container" id="announcements-container">



                  <!-- dynamic announcement diri -->




                  <div class="text-center p-4">
                    <p>No announcements available.</p>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>


<!-- image gallery modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="galleryModalLabel">Image Gallery</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <div class="gallery-container">
          <img src="" class="gallery-image" id="galleryCurrentImage">
          <div class="gallery-nav prev"><i class="fas fa-chevron-left"></i></div>
          <div class="gallery-nav next"><i class="fas fa-chevron-right"></i></div>
          <div class="gallery-counter" id="galleryCounter">1/5</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  


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

<!-- fetch all announcement type -->
 <script>
  // Load announcement types dynamically
  fetch('../backend/admin/get_all_announcement_type.php')

    .then(response => response.json())
    .then(data => {

      const select = document.getElementById('announcementType');
      data.forEach(type => {

        const option = document.createElement('option');
        option.value = type.ann_type_id;
        option.textContent = type.ann_type_name;
        select.appendChild(option);

      });

    })

    .catch(error => console.error('Error loading types:', error));

</script>






<!-- submit the announcement to the db -->
<script>
// Keep your existing form submission code for creating announcements
document.getElementById('announcementForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const form = document.getElementById('announcementForm');
  const formData = new FormData(form);
  
  // Check if we're updating or creating
  const announcementId = document.getElementById('edit_announcement_id').value;
  const isUpdate = announcementId !== '';
  
  // Determine the endpoint based on operation type
  const endpoint = isUpdate 
    ? '../backend/admin/update_announcement.php' 
    : '../backend/admin/add_announcement.php';

  fetch(endpoint, {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      Swal.fire({
        title: 'Success!',
        text: data.message,
        icon: 'success',
        confirmButtonColor: '#52AB99'
      }).then(() => {
        // Reset form and reload page
        resetForm();
        location.reload();
      });
    } else {
      Swal.fire({
        title: isUpdate ? 'Failed to Update' : 'Failed to Post',
        text: data.message,
        icon: 'error',
        confirmButtonColor: '#d33'
      });
      
      // If there are image errors, show them
      if (data.image_errors && data.image_errors.length > 0) {
        console.error('Image errors:', data.image_errors);
      }
    }
  })
  .catch(err => {
    console.error(err);
    
    Swal.fire({
      title: 'Error',
      text: 'Error submitting form.',
      icon: 'error',
      confirmButtonColor: '#d33'
    });
  });
});
</script>






<!-- image preview -->
<script>

  const imageInput = document.getElementById('announcement_images');
  const previewContainer = document.getElementById('imagePreviewContainer');

  document.getElementById('image-upload-btn').addEventListener('click', () => {
    imageInput.click();
  });

  imageInput.addEventListener('change', function () {
    previewContainer.innerHTML = '';
    previewContainer.style.display = 'flex';

    const files = Array.from(this.files);
    const maxPreview = 5;
    let dataTransfer = new DataTransfer();

    files.forEach((file, index) => {
      dataTransfer.items.add(file); // Add all selected files (including hidden)

      if (index < maxPreview) {
        const reader = new FileReader();

        reader.onload = function (e) {
          const wrapper = document.createElement('div');
          wrapper.style.position = 'relative';
          wrapper.style.marginRight = '10px';

          const img = document.createElement('img');
          img.src = e.target.result;
          img.style.width = '80px';
          img.style.height = '80px';
          img.style.objectFit = 'cover';
          img.style.border = '1px solid #ccc';
          img.style.borderRadius = '4px';

          const removeBtn = document.createElement('span');
          removeBtn.innerHTML = '&times;';
          removeBtn.style.position = 'absolute';
          removeBtn.style.top = '0';
          removeBtn.style.right = '5px';
          removeBtn.style.cursor = 'pointer';
          removeBtn.style.fontWeight = 'bold';
          removeBtn.style.color = 'red';
          removeBtn.style.fontSize = '20px';
          removeBtn.title = 'Remove image';

          removeBtn.addEventListener('click', () => {
            wrapper.remove();
            files.splice(index, 1);
            updateInputFiles(files);
            refreshPreview(); // refresh UI if an image is removed
          });

          wrapper.appendChild(img);
          wrapper.appendChild(removeBtn);
          previewContainer.appendChild(wrapper);

        };

        reader.readAsDataURL(file);
      }
    });

    // Show "+X more images" if needed
    if (files.length > maxPreview) {
      const moreImages = document.createElement('div');
      moreImages.textContent = `+${files.length - maxPreview} more images`;
      moreImages.style.width = '80px';
      moreImages.style.height = '80px';
      moreImages.style.display = 'flex';
      moreImages.style.alignItems = 'center';
      moreImages.style.justifyContent = 'center';
      moreImages.style.backgroundColor = '#f0f0f0';
      moreImages.style.border = '1px solid #ccc';
      moreImages.style.borderRadius = '4px';
      moreImages.style.fontWeight = 'bold';
      moreImages.style.fontSize = '14px';
      moreImages.style.textAlign = 'center';
      moreImages.style.color = '#555'; // optional

      previewContainer.appendChild(moreImages);
    }


    imageInput.files = dataTransfer.files;

    function updateInputFiles(updatedFiles) {
      const newDataTransfer = new DataTransfer();
      updatedFiles.forEach(file => newDataTransfer.items.add(file));
      imageInput.files = newDataTransfer.files;
    }

    function refreshPreview() {
      // re-trigger change event to refresh
      const event = new Event('change');
      imageInput.dispatchEvent(event);
    }
  });
</script>





<!-- display all announcement here -->
<script>
  function getBadgeClass(type) {
    switch (type.toLowerCase()) {
      case 'important': return 'badge-danger';
      case 'general': return 'badge-secondary';
      case 'event': return 'badge-info';
      default: return 'badge-primary';
    }
  }

  // Fetch announcements
  fetch('../backend/admin/get_announcement.php')
    .then(res => res.json())
    .then(data => {

      const container = document.getElementById('announcements-container');
      
      if (data.success && data.data.length > 0) {

        // Clear the container (including the "No announcements" message)
        container.innerHTML = '';
        
        data.data.forEach(announcement => {

          // Attach empty array if backend didn't provide images/comments
          announcement.images = announcement.images || [];
          announcement.comments = announcement.comments || [];

          renderAnnouncement(announcement);
        });

      } else {

        // Display the "No announcements" message
        container.innerHTML = '<div class="text-center p-4"><p>No announcements available.</p></div>';

      }
    })
    .catch(error => {

      console.error('Error fetching announcements:', error);
      document.getElementById('announcements-container').innerHTML = 
        '<div class="text-center p-4"><p>Error loading announcements. Please try again later.</p></div>';

    });





  function renderAnnouncement(announcement) {
    // Create image HTML if images exist
    let imagesHTML = '';
    if (announcement.images && announcement.images.length > 0) {
      imagesHTML = announcement.images.map(img => 
        `<img src="../backend/${img}" 
              alt="Announcement Image" 
              class="img-fluid mb-2 image-clickable" 
              data-group="${announcement.pos_ann_id}" 
              style="height: 80px; width: 80px; border-radius: 4px; cursor: pointer;">`
      ).join('  ');
    }

    // Create comments HTML if comments exist
    let commentsHTML = '';

    // …inside renderAnnouncement…
    if (announcement.comments && announcement.comments.length > 0) {
      commentsHTML += `
        <div class="mt-3 mb-1 d-flex align-items-center">
          <i class="fas fa-comments text-muted mr-2"></i>
          <strong>Comments</strong>
        </div>
        <div class="comment-section-scrollable" style="max-height: 150px; overflow-y: auto;">
          ${announcement.comments.map(comment => `
            <div class="comment mb-2 ml-3">
              <small><strong>Off. ${comment.user}</strong>: ${comment.text}</small>
            </div>
          `).join('')}
        </div>
      `;
    }




    const announcementHTML = `

      <div class="card announcement-card mb-2 mx-2 mt-2" id="announcement-${announcement.pos_ann_id}">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <h5 class="card-title mb-0">${announcement.pos_ann_title}</h5>
            <div class="d-flex align-items-center">
              <span class="badge ${getBadgeClass(announcement.ann_type_name)} mr-2 p-2">${announcement.ann_type_name}</span>
              <div class="dropdown">
                <button class="btn btn-sm btn-link" type="button" id="dropdownMenuButton-${announcement.pos_ann_id}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton-${announcement.pos_ann_id}">
                  <a class="dropdown-item edit-announcement" href="#" data-id="${announcement.pos_ann_id}">Edit</a>
                  <a class="dropdown-item delete-announcement" href="#" data-id="${announcement.pos_ann_id}">Delete</a>
                </div>
              </div>
            </div>
          </div>

          <p class="card-text">${announcement.pos_ann_description}</p>

          ${imagesHTML}

          <div class="d-flex justify-content-between align-items-center mt-3">
            <small class="text-muted">Posted by Off. ${announcement.admin_fname} on ${formatDate(announcement.pos_ann_date)}</small>
            <div>
              <button class="btn btn-sm btn-outline-secondary like-btn mr-2" data-id="${announcement.pos_ann_id}">
                <i class="far fa-thumbs-up"></i> 
                Like <span class="like-count">${announcement.like_count}</span>
              </button>

              <button class="btn btn-sm btn-outline-secondary comment-btn" data-id="${announcement.pos_ann_id}">
                <i class="far fa-comment"></i> Comment
              </button>
            </div>
          </div>

          <div class="comment-form mt-3" id="comment-form-${announcement.pos_ann_id}" style="display: none;">
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-sm comment-input" placeholder="Write a comment...">
              <div class="input-group-append">
                <button class="btn btn-sm text-white post-comment-btn" style="background-color: #52AB99;" data-id="${announcement.pos_ann_id}">
                  Post
                </button>
              </div>
            </div>
          </div>

          ${commentsHTML}
        </div>
      </div>
    `;

    // Insert into container
    document.getElementById('announcements-container').insertAdjacentHTML('beforeend', announcementHTML);
    initImageModal()

  }
  

  // Format date function to make it more user-friendly
  function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleString('en-US', { 
      year: 'numeric', 
      month: 'short', 
      day: 'numeric',
      hour: '2-digit',
      minute: '2-digit'
    });
  }



  // Event delegation for comment buttons
  document.addEventListener('click', function(e) {
    // Handle comment button clicks
    if (e.target.classList.contains('comment-btn') || e.target.parentElement.classList.contains('comment-btn')) {
      const id = e.target.dataset.id || e.target.parentElement.dataset.id;
      const commentForm = document.getElementById(`comment-form-${id}`);
      
      if (commentForm) {
        commentForm.style.display = commentForm.style.display === 'none' ? 'block' : 'none';
      }
    }


    // Handle delete announcement clicks
    if (e.target.classList.contains('delete-announcement')) {
      e.preventDefault();
      const announcementId = e.target.dataset.id;
      
      if (confirm('Are you sure you want to delete this announcement?')) {
        deleteAnnouncement(announcementId);
      }
    }

    // Handle edit announcement clicks
    if (e.target.classList.contains('edit-announcement')) {
      e.preventDefault();
      const announcementId = e.target.dataset.id;
      editAnnouncement(announcementId);
    }

  });










// =======================================================================================
//                               EDIT OR UPDATE ANNOUNCEMENT            
// =======================================================================================




// Global variable to track temporarily removed images during editing
let temporarilyRemovedImages = [];


// Function to edit an announcement (enhanced with temporary image removal)
function editAnnouncement(announcementId) {
  // Reset the temporarily removed images array at the start of editing
  temporarilyRemovedImages = [];
  
  // Try to get announcement data from the DOM first
  const announcementCard = document.getElementById(`announcement-${announcementId}`);
  
  if (announcementCard) {
    // Extract data from the DOM elements
    const title       = announcementCard.querySelector('.card-title').textContent;
    const description = announcementCard.querySelector('.card-text').textContent;
    const typeElement = announcementCard.querySelector('.badge');
    const type        = typeElement ? typeElement.textContent : '';
    
    // Get all images
    const images = Array.from(announcementCard.querySelectorAll('img.image-clickable')).map(img => {

    // Extract the path from the src attribute
    const src = img.getAttribute('src');
    // We need to convert from "../backend/path/to/image.jpg" to "path/to/image.jpg"
      return src.replace('../backend/', '');

    });
    
    // Populate the form fields
    document.getElementById('edit_announcement_id').value = announcementId;
    document.getElementById('announcement_title').value   = title;
    document.getElementById('announcement_content').value = description;
    
    // Set the announcement type
    const typeSelect = document.getElementById('announcementType');
    for (let i = 0; i < typeSelect.options.length; i++) {
      if (typeSelect.options[i].text === type) {
        typeSelect.selectedIndex = i;
        break;
      }
    }
    
    // Clear any existing image previews
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    imagePreviewContainer.innerHTML = '';
    
    // Show the image preview container if there are images
    if (images && images.length > 0) {
      imagePreviewContainer.style.display = 'flex';
      
      // Add each existing image to the preview
      images.forEach((img) => {

        const imageContainer = document.createElement('div');
        imageContainer.className = 'image-preview-item position-relative mr-2 mb-2';
        imageContainer.innerHTML = `
          <img src="../backend/${img}" alt="Announcement Image" class="img-thumbnail" style="height: 80px; width: 80px; object-fit: cover;">
          <button type="button" class="btn btn-sm btn-danger position-absolute remove-image-btn" style="top: -10px; right: -10px; border-radius: 50%;" 
                 data-image-path="${img}" data-announcement-id="${announcementId}">
            <i class="fas fa-times"></i>
          </button>
          <input type="hidden" name="existing_images[]" value="${img}">
        `;

        imagePreviewContainer.appendChild(imageContainer);

      });
      
      // Add event listeners for remove buttons - using temporary removal
      document.querySelectorAll('.remove-image-btn').forEach(btn => {

        btn.addEventListener('click', function() {

          const announcementId = this.dataset.announcementId;
          const imagePath = this.dataset.imagePath;
          const container = this.closest('.image-preview-item');
          
          // Use temporary removal during editing
          temporaryRemoveImage(announcementId, imagePath, container);

        });

      });

    }
    
    // Change submit button text to "Update"
    document.getElementById('submitBtnText').textContent = 'Update';
    
    // Show the reset/cancel button
    document.getElementById('resetFormBtn').style.display = 'block';
    
    // Scroll to the form
    document.getElementById('announcementForm').scrollIntoView({ behavior: 'smooth' });
  }

}


// Function to temporarily remove an image (UI only - no server action)
function temporaryRemoveImage(announcementId, imagePath, containerElement) {
  // Store the image info and container HTML for potential restoration
  temporarilyRemovedImages.push({

    announcementId: announcementId,
    imagePath: imagePath,
    containerHTML: containerElement.outerHTML,
    container: containerElement
  
  });
  
  // Hide the container but don't remove it
  containerElement.style.display = 'none';
  
  // Change the input name so it won't be included in form submission
  const hiddenInput = containerElement.querySelector('input[name="existing_images[]"]');
  if (hiddenInput) {

    hiddenInput.name = "removed_images[]";

  }
}




function restoreTemporaryRemovedImages() {
  temporarilyRemovedImages.forEach(item => {
    // Show the container again
    item.container.style.display = '';
    
    // Restore the input name
    const hiddenInput = item.container.querySelector('input[name="removed_images[]"]');

    if (hiddenInput) {

      hiddenInput.name = "existing_images[]";

    }

  });
  
  // Clear the array
  temporarilyRemovedImages = [];
}


function resetForm() {

  const form = document.getElementById('announcementForm');
  form.reset();
  
  // Clear edit id
  document.getElementById('edit_announcement_id').value = '';
  
  // Reset button text
  document.getElementById('submitBtnText').textContent = 'Post';
  
  // Hide the reset button
  document.getElementById('resetFormBtn').style.display = 'none';
  
  // Clear image preview container
  document.getElementById('imagePreviewContainer').innerHTML = '';
  document.getElementById('imagePreviewContainer').style.display = 'none';
  
  // Reset temporarily removed images array
  temporarilyRemovedImages = [];

}



// Event listener for reset/cancel button
document.getElementById('resetFormBtn').addEventListener('click', function(e) {
  e.preventDefault();
  
  // If we have temporary removed images, confirm with user
  if (temporarilyRemovedImages.length > 0) {
    Swal.fire({
      title: 'Cancel Editing?',
      text: 'Any changes you made will be lost.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, cancel editing'
    }).then((result) => {
      if (result.isConfirmed) {

        // User confirmed, reset form
        resetForm();

      }
    });

  } else {

    // No temporary removed images, just reset the form
    resetForm();

  }
});




// Function to handle server-side image removal (for the backend file)
function removeAnnouncementImage(announcementId, imagePath, containerElement) {
  // Confirm with the user
  if (!confirm('Are you sure you want to permanently remove this image?')) {
    return;
  }
  
  // Send request to delete the image
  fetch('../backend/admin/remove_announcement_image.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      announcement_id: announcementId,
      image_path: imagePath
    })
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // Remove the image container from the UI
      containerElement.remove();
      
      // If no images left, hide the preview container
      const previewContainer = document.getElementById('imagePreviewContainer');
      if (previewContainer.children.length === 0) {
        previewContainer.style.display = 'none';
      }
      
      showNotification('Image removed successfully', 'success');
    } else {

      showNotification('Failed to remove image: ' + (data.message || 'Unknown error'), 'error');

    }
  })
  .catch(error => {

    console.error('Error removing image:', error);
    showNotification('Failed to remove image: Network error', 'error');

  });
}





// ===============================================================================================================
  






// =============================================================================================================== 
//                                             DELETE ANNOUNCEMENT
// ===============================================================================================================


  // Function to delete an announcement
  function deleteAnnouncement(announcementId) {
    // Show loading state
    const announcementElement = document.getElementById(`announcement-${announcementId}`);
    if (announcementElement) {
      announcementElement.style.opacity = '0.5';
    }
    
    // Send delete request to backend
    fetch(`../backend/admin/delete_announcement.php`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        announcement_id: announcementId
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Remove announcement from DOM if deletion was successful
        if (announcementElement) {
          announcementElement.remove();
        }
        
        // Show success message
        showNotification('Announcement deleted successfully', 'success');
        
        // If no announcements left, show the empty message
        const container = document.getElementById('announcements-container');
        if (container.children.length === 0) {
          container.innerHTML = '<div class="text-center p-4"><p>No announcements available.</p></div>';
        }
      } else {
        // Reset opacity and show error message
        if (announcementElement) {
          announcementElement.style.opacity = '1';
        }
        showNotification('Failed to delete announcement: ' + (data.message || 'Unknown error'), 'error');
      }
    })
    .catch(error => {
      console.error('Error deleting announcement:', error);
      // Reset opacity and show error message
      if (announcementElement) {
        announcementElement.style.opacity = '1';
      }
      showNotification('Failed to delete announcement: Network error', 'error');
    });
  }
// =============================================================================================================== 







// =============================================================================================================== 
//                                         SHOW NOTIFICATION AFTER DELETING
// ===============================================================================================================
  
  
  
  // Function to show notification message
  function showNotification(message, type = 'info') {
    // Check if notification container exists, if not create it
    let notificationContainer = document.getElementById('notification-container');
    if (!notificationContainer) {
      notificationContainer = document.createElement('div');
      notificationContainer.id = 'notification-container';
      notificationContainer.style.position = 'fixed';
      notificationContainer.style.top = '20px';
      notificationContainer.style.right = '20px';
      notificationContainer.style.zIndex = '9999';
      document.body.appendChild(notificationContainer);
    }
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'error' ? 'danger' : type === 'success' ? 'success' : 'info'} alert-dismissible fade show`;
    notification.role = 'alert';
    notification.innerHTML = `
      ${message}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    `;
    
    // Add to container
    notificationContainer.appendChild(notification);
    
    // Remove after 5 seconds
    setTimeout(() => {
      notification.classList.remove('show');
      setTimeout(() => {
        notification.remove();
      }, 150);
    }, 5000);
  }
  







  // ===========================================================================================================
  //                                          IMAGE GALLERY MODAL
  // ===========================================================================================================

  //image modal
  function initImageModal() {

    let currentGroup = [];
    let currentIndex = 0;

    const modal = document.getElementById('galleryModal');
    const currentImage = document.getElementById('galleryCurrentImage');
    const counter = document.getElementById('galleryCounter');
    const prevBtn = modal.querySelector('.gallery-nav.prev');
    const nextBtn = modal.querySelector('.gallery-nav.next');

    // Listen to any click on .image-clickable (or whatever your image class is)
    document.addEventListener('click', function(e) {

      if (e.target.classList.contains('image-clickable')) {

        const group = e.target.dataset.group; // group ID (like post ID)
        currentGroup = Array.from(document.querySelectorAll(`.image-clickable[data-group='${group}']`)).map(img => img.src);
        currentIndex = currentGroup.indexOf(e.target.src);

        showImage();

        $('#galleryModal').modal('show');

      }

    });

    function showImage() {

      currentImage.style.opacity = 0;
      setTimeout(() => {

        currentImage.src = currentGroup[currentIndex];
        counter.textContent = `${currentIndex + 1} / ${currentGroup.length}`;
        currentImage.style.opacity = 1;
        
      }, 200);

    }

    prevBtn.addEventListener('click', function () {

      currentIndex = (currentIndex - 1 + currentGroup.length) % currentGroup.length;
      showImage();

    });

    nextBtn.addEventListener('click', function () {

      currentIndex = (currentIndex + 1) % currentGroup.length;
      showImage();

    });

  }

// =========================================================================================================




// =========================================================================================================
//                                          COMMENTING ON POST
// =========================================================================================================

document.addEventListener('click', function (e) {
  if (e.target.classList.contains('post-comment-btn')) {
    const announcementId = e.target.dataset.id;
    const commentInput = document.querySelector(`#comment-form-${announcementId} .comment-input`);
    const commentText = commentInput.value.trim();

    if (commentText) {
      fetch('../backend/admin/comment.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          announcement_id: announcementId,
          comment_text: commentText
        })
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          // Optionally re-render or append new comment
          const commentHTML = `
            <div class="comment mb-2 ml-3">
              <small><strong>${data.comment.admin_fname}</strong>: ${data.comment.text}</small>
            </div>`;
          document.querySelector(`#announcement-${announcementId} .card-body`).insertAdjacentHTML('beforeend', commentHTML);
          commentInput.value = '';
        } else {
          alert(data.message || 'Failed to post comment.');
        }
      });
    }
  }
});
// =============================================================================================================




// =============================================================================================================
//                                                    LIKE
// =============================================================================================================

document.addEventListener('click', function (event) {
  if (event.target.closest('.like-btn')) {
    const btn = event.target.closest('.like-btn');
    const annId = btn.dataset.id;

    // Send the like request
    fetch('../backend/admin/toggle_like.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ announcement_id: annId })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Update the like count on the button
        const countSpan = btn.querySelector('.like-count');
        if (countSpan) {
          countSpan.textContent = data.like_count;
        }
      } else {
        alert('Something went wrong while liking.');
      }
    })
    .catch(err => {
      console.error('Error:', err);
      alert('An error occurred.');
    });
  }
});




</script>



</body>
</html>
