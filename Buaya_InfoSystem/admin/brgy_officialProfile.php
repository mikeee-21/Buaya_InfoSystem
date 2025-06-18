
<?php
  if (!isset($_GET['res_id']) || !is_numeric($_GET['res_id'])) {
    echo "<script>alert('Invalid or missing Resident ID!'); window.location.href = 'dashboard.php';</script>";

  }
  $resId = (int) $_GET['res_id'];
?>


<!-- FOR OFFICIALS DIRECTORY PROFILE
     ONCE MO CLICK SILA SA CERTAIN NA DIV
     MO DISPLAY NI NGA FILE THAT CONTAINS OFFICIALS PROFILE 
     BUT NOT ALLOWED TO EDIT -->




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Official Profile</title>

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


  <!-- SweetAlert2 CSS (optional, for styling) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <!-- SweetAlert2 JS -->
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


/* Target ang container nga naay scrollbar */
.col::-webkit-scrollbar {
  width: 6px; /* Puti gamay */
}

/* Scrollbar Track */
.col::-webkit-scrollbar-track {
  border-radius: 10px;
}

/* Scrollbar Thumb */
.col::-webkit-scrollbar-thumb {
  background:rgb(0, 21, 126); /* Darker thumb */
  border-radius: 10px;
}

/* Scrollbar Thumb on Hover */
.col-sm-8::-webkit-scrollbar-thumb:hover {
  background:rgb(49, 0, 174); /* Even darker when hover */
}

.col-sm-8::-webkit-scrollbar {
  width: 6px; /* Puti gamay */
}

/* Scrollbar Track */
.col-sm-8::-webkit-scrollbar-track {
  border-radius: 10px;
}

/* Scrollbar Thumb */
.col-sm-8::-webkit-scrollbar-thumb {
  background:rgb(0, 29, 146); /* Darker thumb */
  border-radius: 10px;
}

/* Scrollbar Thumb on Hover */
.col-sm-8::-webkit-scrollbar-thumb:hover {
  background:rgb(0, 27, 110); /* Even darker when hover */
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
  color:rgb(0, 34, 144) ; 
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

</style>



<body class="hold-transition sidebar-mini">
 
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white font-inter" style="border: none; box-shadow: none;">
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
                              <i class="nav-dr-icon nav-icon fa-solid fa-hourglass-end" ></i>
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
              <p style="color:black;">
                Residence
                <i class="fas fa-angle-left right" ></i>
              </p>
            </a>

              <ul class="nav nav-treeview">
            
                <li class="nav-item" >
                    <a href="admin_addNewResidence.php" class="nav-link" >
                      <i class=" nav-residence-icon nav-icon fa-solid fa-user-plus"></i>
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
                <p style="color:black;">
                  Activity logs
                </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>






  <!-- MAIN CONTENT -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid">


<form id="editOfficialForm" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="row mb-3 elevation-1 p-3">
                    <div class="col" style="max-height: 580px; overflow-y: auto;">

                        <div class="card card-outline " style="background-color:rgb(255, 255, 255);">
                            <div class="card-header">
                                <div class="card-title" style="font-family: 'Inter', sans-serif; font-size: 18px;">
                                    View Details Official
                                </div>
                            </div>
                            <div class="card-body box-profile" style="font-family: 'Inter', sans-serif; font-size: 18px;">

                                <div class="text-center mb-3" style="width: 150px; height: 150px; border-radius: 50%; border: 2px solid rgb(220, 220, 220); margin: 0 auto;">
                                    <label for="imageUploader" style="cursor: pointer;">
                                        <img class="profile-user-img img-fluid img-thumbnail"
                                            src="img/default_user_img.jpg"
                                            alt="User profile picture"
                                            id="image_official"
                                            style="width: 150px; height: 150px; border-radius: 50%; border: 2px solid #000155;" />
                                    </label>
                                    <input type="file" id="imageUploader" accept="image/*" style="display: none;"  readonly/>
                                </div>




                                <h3 class="profile-username text-center" style=" margin: 0 10; font-size: 15px; font-weight: 15px;"><span id="keyup_first_name"></span> <span id="keyup_last_name"></span></h3>

                                <div class="row">
                                <div class="col">
                                    <input type="hidden" name="official_id" value=""readonly>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label>Position</label>
                                        <select name="edit_position" id="edit_position" class="form-control  text-uppercase" readonly>                        
                                        </select>
                                        <input type="hidden" id="edit_position_check" value="false">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                        <div class="form-group font-inter">
                                            <label>Assigned Committee</label>
                                            <input type="text" name="add_committee" id="add_committee" class="form-control" readonly>
                                            <input type="hidden" id="edit_committee" value="false">
                                        </div>
                                </div>


                                    <div class="col-sm-12">
                                        <div class="form-group font-inter">
                                            <label>Short Description:</label>
                                            <textarea name="add_description" id="add_description" class="form-control rounded" style="height: 150px;" readonly></textarea>
                                        </div>
                                    </div>



                                <div class="col-sm-6">
                                    <div class="form-group ">
                                    <label >Start</label>
                                    <input type="date" class="form-control" id="edit_term_from" name="edit_term_from" value="" readonly>
                                    <input type="hidden" name="start_term" id="edit_term_from_check" value="false">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                    <label >End</label>
                                    <input type="date" class="form-control" id="edit_term_to" name="edit_term_to" value="" readonly>
                                    <input type="hidden" name="end_term" id="edit_term_to_check" value="false">
                                    </div>
                                </div>



                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Voters</label>
                                        <select name="edit_voters" id="edit_voters" class="form-control"readonly>
                                            <option value="false">NO</option>
                                            <option value="true">YES</option>
                                        </select>
                                        <input type="hidden" value="false" id="edit_voters_check">
                                    </div>
                                </div>

                                 <div class="col-sm-12" id="precinct_container" >
                                        <div class="form-group">
                                            <label>Precinct Number</label>
                                            <input type="text" name="add_precinct_number" id="add_precinct_number" class="form-control" readonly>
                                        </div>
                                    </div>
                                

                                <div class="col-sm-12">
                                    <div class="form-group ">
                                    <label >Date of Birth</label>
                                    <input type="date" class="form-control" id="edit_birth_date" name="edit_birth_date" value=""readonly>
                                    <input type="hidden" id="edit_birth_date_check" value='false'>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group ">
                                    <label >Place of Birth</label>
                                    <input type="text" class="form-control" id="edit_birth_place" name="edit_birth_place" value=""readonly>
                                    <input type="hidden" id="edit_birth_place_check" value="false">
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Pwd</label>
                                        <select name="edit_pwd" id="edit_pwd" class="form-control"readonly>
                                            <option value="false">NO</option>
                                            <option value="true">YES</option>
                                        </select>
                                        <input type="hidden" id="edit_pwd_check" value="false">
                                    </div>
                                </div>
                                <div class="col-sm-12" id="pwd_check">
                                    <div class="form-group ">
                                        <label >TYPE OF PWD</label>
                                        <input type="text" class="form-control" id="edit_pwd_info" name="edit_pwd_info" value=""readonly>
                                        <input type="hidden" id="edit_pwd_info_check" value="false">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Single Parent</label>
                                        <select name="edit_single_parent" id="edit_single_parent" class="form-control" readonly>
                                            <option value="false">NO</option>
                                            <option value="true">YES</option>
                                        </select>
                                        <input type="hidden" id="edit_single_parent_check" value="false">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>


                    <div class="col-sm-8 p-3"  style="max-height: 600px; overflow-y: auto; font-family: 'Inter', sans-serif; font-size:15px;">

                        <div class="card card-tabs" style="background-color:rgb(255, 255, 255);">
                            <div class="card-header p-2">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist" >
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basic-info-tab" data-toggle="pill" href="#basic-info" role="tab" aria-controls="basic-info" aria-selected="true">Basic Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="other-info-tab" data-toggle="pill" href="#other-info" role="tab" aria-controls="other-info" aria-selected="false">Other Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="guardian-tab" data-toggle="pill" href="#guardian" role="tab" aria-controls="guardian" aria-selected="false">Guardian</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body" style="font-family: 'Inter', sans-serif; font-size: 18px;" >

                                <div class="tab-content" id="custom-tabs-one-tabContent">

                                    <div class="tab-pane fade active show" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
                                        <p class="lead text-center mb-0">Personal Details</p>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group ">
                                                    <label>First Name </label>
                                                    <input type="text" class="form-control" id="edit_first_name" name="edit_first_name" value=""readonly>
                                                    <input type="hidden" value="false" id="edit_first_name_check">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group ">
                                                    <label>Middle Name </label>
                                                    <input type="text" class="form-control" id="edit_middle_name" name="edit_middle_name" value=""readonly>
                                                    <input type="hidden" id="edit_middle_name_check" value="false">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group ">
                                                    <label>Last Name </label>
                                                    <input type="text" class="form-control" id="edit_last_name" name="edit_last_name" value=""readonly>
                                                    <input type="hidden" value="false" id="edit_last_name_check">
                                                </div>  
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label >Suffix </label>
                                                    <input type="text" class="form-control" id="edit_suffix" name="edit_suffix" value=""readonly>
                                                    <input type="hidden" id="edit_suffix_check" value="false">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label >Age </label>
                                                    <input type="text" class="form-control" id="edit_age" value="" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label >Gender</label>
                                                    <select name="edit_gender" id="edit_gender" class="form-control"readonly>
                                                        <option value="Male">Male</option>
                                                        <option value="Female" >Female</option>
                                                    </select>
                                                    <input type="hidden" id="edit_gender_check" value="false">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label >Civil Status</label>
                                                    <select name="edit_civil_status" id="edit_civil_status" class="form-control"readonly>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widowed">Widowed</option>
                                                        <option value="Divorced">Divorced</option>
                                                    </select>
                                                    <input type="hidden" id="edit_civil_status_check" value="false">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label >Religion</label>
                                                    <input type="text" class="form-control" id="edit_religion" name="edit_religion" value=""readonly>
                                                    <input type="hidden" id="edit_religion_check" value="false">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group ">
                                                    <label >Nationality</label>
                                                    <input type="text" class="form-control" id="edit_nationality" name="edit_nationality" value=""readonly>
                                                    <input type="hidden" id="edit_nationality_check" value="false">
                                                </div>
                                            </div>                              
                                        </div>
                                    </div>

                                    
                                    <div class="tab-pane fade" id="other-info" role="tabpanel" aria-labelledby="other-info-tab">
                                         <p class="lead text-center mb-0">Address</p>
                                        <div class="row">
                                            <div class="col-sm-6">

                                                 <div class="form-group">
                                                    <label>Province</label>
                                                    <input type="text" class="form-control" id="edit_province" name="edit_province" value="" readonly>
                                                    <input type="hidden" id="edit_province_check" value="false">
                                                </div>
                                                <div class="form-group">
                                                    <label>Municipality</label>
                                                    <input type="text" class="form-control" id="edit_municipality" name="edit_municipality" value="" readonly>
                                                    <input type="hidden" id="edit_municipality_check" value="false">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Zip</label>
                                                    <input type="text" class="form-control" id="edit_zip" name="edit_zip" value="" readonly>
                                                    <input type="hidden" id="edit_zip_check" value="false">
                                                </div>
                                                <div class="form-group">
                                                    <label>Barangay</label>
                                                    <input type="text" class="form-control" id="edit_barangay" name="edit_barangay" value="" readonly>
                                                    <input type="hidden" id="edit_barangay_check" value="false">
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                    <input type="text" class="form-control" id="edit_street" name="edit_street" value=""readonly>
                                                    <input type="hidden" id="edit_street_check" value="false">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>House Number</label>
                                                    <input type="text" class="form-control" id="edit_house_number" name="edit_house_number" value=""readonly>
                                                    <input type="hidden" id="edit_house_number_check" value="false">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Full Address</label>
                                                    <input type="text" class="form-control" id="edit_address" name="edit_address" value="" readonly>
                                                    <input type="hidden" id="edit_address_check" value="false">
                                                </div>
                                            </div>
                                             <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label >Contact Number</label>
                                                    <input type="text" class="form-control" maxlength="11" id="edit_contact_number" name="edit_contact_number" value=""readonly>
                                                    <input type="hidden" id="edit_contact_number_check" value="false">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email Address</label>
                                                    <input type="text" class="form-control" id="edit_email_address" name="edit_email_address" value="" readonly>
                                                    <input type="hidden" id="edit_email_address_check" value="false">
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="guardian" role="tabpanel" aria-labelledby="guardian-tab">
                                    
                                        <p class="lead text-center mb-0">Guardian</p>
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Father's Name</label>
                                                    <input type="text" class="form-control" id="edit_fathers_name" name="edit_fathers_name" value="" readonly>
                                                    <input type="hidden" id="edit_fathers_name_check" value="false">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Mother's Name</label>
                                                    <input type="text" class="form-control" id="edit_mothers_name" name="edit_mothers_name" value="" readonly>
                                                    <input type="hidden" id="edit_mothers_name_check" value="false">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Guardian</label>
                                                    <input type="text" class="form-control" id="edit_guardian" name="edit_guardian" value="" readonly>
                                                    <input type="hidden" id="edit_guardian_check" value="false">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Guardian Contact</label>
                                                    <input type="text" class="form-control" maxlength="11" id="edit_guardian_contact" name="edit_guardian_contact" value="" readonly>
                                                    <input type="hidden" id="edit_guardian_contact_check" value="false">
                                                </div>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </div>

                                

                            </div>


                            <!-- /.card -->
                        </div>

                    </div>
                </div>
            </form>




        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../assets/dist/js/adminlte.js"></script>



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




<!-- get all information of officials -->
<script>

    const resId = <?= json_encode($resId) ?>;
    fetch('../views/admin/official_profile.php?res_id=' + resId)

    .then(res => res.json())
    .then(data => {



        if (data.status === 'success') {

            function setAge(dob, ageFieldId) {
                const birthDate = new Date(dob);  
                const today = new Date();  
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDifference = today.getMonth() - birthDate.getMonth();

                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }

                // Set the value of the age input field
                document.getElementById(ageFieldId).value = age;
            }

        const official = data.data;
        const fullAddress = `${official.bar_barangay}, ${official.bar_municipality}, ${official.bar_province}`; 
        const imgEl = document.querySelector('#image_official'); 
        if (imgEl) {

            imgEl.src = official.res_image ? `../${official.res_image}`  : '../server_imgs/default_user_img.jpg';

        }

        
    

        // NAME display only
        document.getElementById('keyup_first_name').textContent         = official.res_first_name;
        document.getElementById('keyup_last_name').textContent          = official.res_last_name;

        // Fill form fields

        document.getElementById('edit_position').value                  = official.pos_id ; // Make sure you also load options
        document.getElementById('add_committee').value                  = official.off_committee.toUpperCase() ;
        document.getElementById('add_description').value                = official.off_description;
        document.getElementById('edit_term_from').value                 = official.off_start_term;
        document.getElementById('edit_term_to').value                   = official.off_end_term;
        document.getElementById('edit_voters').value                    = official.res_voter_status;
        document.getElementById('add_precinct_number').value            = official.res_precinct_number ;
        document.getElementById('edit_birth_date').value                = official.res_date_of_birth;
        document.getElementById('edit_birth_place').value               = official.res_place_of_birth;
        document.getElementById('edit_pwd').value                       = official.res_pwd_status;
        document.getElementById('edit_pwd_info').value                  = official.res_pwd_type;
        document.getElementById('edit_single_parent').value             = official.res_single_parent_status;

        document.getElementById("edit_first_name").value                = official.res_first_name;
        document.getElementById("edit_middle_name").value               = official.res_middle_name;
        document.getElementById("edit_last_name").value                 = official.res_last_name;
        document.getElementById("edit_suffix").value                    = official.res_suffix;

        setAge(official.res_date_of_birth, "edit_age");

        document.getElementById("edit_gender").value                    = official.res_sex;
        document.getElementById("edit_civil_status").value              = official.res_civil_status;
        document.getElementById("edit_religion").value                  = official.res_religion;
        document.getElementById("edit_nationality").value               = official.res_nationality;

        document.getElementById("edit_province").value                  = official.bar_province;
        document.getElementById("edit_municipality").value              = official.bar_municipality;
        document.getElementById("edit_zip").value                       = official.bar_zip_code;
        document.getElementById("edit_barangay").value                  = official.bar_barangay;
        document.getElementById("edit_house_number").value              = official.res_house_number;
        document.getElementById("edit_street").value                    = official.res_street;
        document.getElementById("edit_address").value                   = fullAddress;

        document.getElementById("edit_email_address").value             = official.res_email_address;
        document.getElementById("edit_contact_number").value            = official.res_contact_number;
        document.getElementById("edit_fathers_name").value              = official.res_father_name;
        document.getElementById("edit_mothers_name").value              = official.res_mother_name;
        document.getElementById("edit_guardian").value                  = official.res_guardian_name;
        document.getElementById("edit_guardian_contact").value          = official.res_guardian_contact;


        // Optional: show/hide containers based on values
        if (official.res_voter_status === true) {
            document.getElementById('precinct_container').style.display = "block";
        } else {
            document.getElementById('precinct_container').style.display = "none";
        }

        if (official.res_pwd_status === true) {
            document.getElementById('pwd_check').style.display = "block";
        } else {
            document.getElementById('pwd_check').style.display = "none";
        }

        } else {
            alert('Official not found');
        }

    })
    .catch(error => {
        console.error(error);
        alert('Failed to load official profile.');
    });

  </script>


<script>
    // Fetch positions dynamically
    fetch('../views/admin/get_all_position2.php')
        .then(response => response.json())
        .then(data => {
            const selectElement = document.getElementById('edit_position');
            
            if (data.status === 'success') {
                // Loop through the positions and append them to the select dropdown
                data.data.forEach(position => {

                    const option = document.createElement('option');
                    option.value = position.pos_id; 
                    option.textContent = position.pos_name;  
                    selectElement.appendChild(option);

                });

            } else {

                console.error('Failed to load positions:', data.message);
            }
        })
        .catch(error => {
            console.error('Error fetching positions:', error);
        });
</script>


</body>
</html>


