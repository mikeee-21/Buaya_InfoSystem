

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>New Residence</title>

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
  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

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


</style>


<body class="hold-transition sidebar-mini">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white " style="border: none; box-shadow: none;">
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
  <aside class="main-sidebar elevation-4" style="background: linear-gradient(135deg, #000155, #0FCDA7); height: 100vh; position: fixed; top: 0; left: 0; width: 250px;">
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







    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper font-inter" style="background-color: #FFFFFF; overflow: hidden; ">
    

    <!-- Main content -->
    <section class="content mt-3" >
      <div class="container-fluid" >

      <form id="newResidenceForm" enctype="multipart/form-data">
        <div class="row mb-3 font-inter">
          <div class="col-sm-4">
            <div class="card card-outline h-100" style="max-height:680px; overflow-y: auto;border-top: 3px solid rgb(255, 255, 255);" >
              <div class="card-body box-profile" style=" padding: 10px;">
                  <div class="text-center" style="margin-top: 5px;">
                    <img
                      class="profile-user-img img-fluid img-thumbnail"
                      src="../server_imgs/default_user_img.jpg"
                      alt="User profile picture"
                      style="cursor: pointer; width: 150px; height: 150px; object-fit: cover; border-radius: 50%;"
                      id="image_residence">
                    <input type="file" hidden name="add_image" id="add_image" style="display: none;">
                  </div>


                <h3 class="profile-username text-center "><span id="keyup_first_name"></span>  <span id="keyup_middle_name"></span> <span id="keyup_last_name"></span></h3>
  
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group" style="margin-bottom: 5px; margin-left: 10px; margin-right: 10px;">
                      <label>Voters</label>
                      <select name="add_voters" id="add_voters" class="form-control" required >
                      <option value=""></option>
                        <option value="NO">NO</option>
                        <option value="YES">YES</option>
                      </select>
                    </div>

                      <div class="col-sm-12" id="precinct_container" style="display: none;">
                        <div class="form-group" style="margin-bottom: 5px; margin-left: 10px; margin-right: 10px;">
                          <label>Precinct Number</label>
                          <input type="text" name="add_precinct_number" id="add_precinct_number" class="form-control" required>
                        </div>
                      </div>
                      
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group " style="margin-bottom: 5px; margin-left: 10px; margin-right: 10px;">
                      <label >Gender</label>
                      <select name="add_gender" id="add_gender" class="form-control" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group " style="margin-bottom: 5px; margin-left: 10px; margin-right: 10px;">
                      <label >Date of Birth</label>
                      <input type="date" class="form-control" id="add_birth_date" name="add_birth_date" max="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group " style="margin-bottom: 5px; margin-left: 10px; margin-right: 10px;">
                      <label >Place of Birth</label>
                      <input type="text" class="form-control" id="add_birth_place" name="add_birth_place" required>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group " style="margin-bottom: 5px; margin-left: 10px; margin-right: 10px;">
                      <label >PWD</label>
                      <select name="add_pwd" id="add_pwd" class="form-control" required>
                      <option value=""></option>
                        <option value="NO">NO</option>
                        <option value="YES">YES</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12" id="pwd_check" style="display: none;">
                    <div class="form-group " style="margin-bottom: 5px; margin-left: 10px; margin-right: 10px;">
                      <label >TYPE OF PWD</label>
                        <input type="text" class="form-control" id="add_pwd_info" name="add_pwd_info">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group " style="margin-bottom: 5px; margin-left: 10px; margin-right: 10px;">
                      <label >Single Parent</label>
                      <select name="add_single_parent" id="add_single_parent" class="form-control" required>
                        <option value=""></option>
                        <option value="NO">NO</option>
                        <option value="YES">YES</option>
                      </select>
                    </div>
                  </div>
                </div>



                
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-sm-8">
            <div class="card card-tabs h-90" style="max-height:650px; overflow-y: auto; background-color:rgb(255, 255, 255);">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="basic-info-tab" data-toggle="pill" href="#basic-info" role="tab" aria-controls="basic-info" aria-selected="true" style="border: none; ">Basic Info</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="other-info-tab" data-toggle="pill" href="#other-info" role="tab" aria-controls="other-info" aria-selected="false" style="border: none; ">Other Info</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="guardian-tab" data-toggle="pill" href="#guardian" role="tab" aria-controls="guardian" aria-selected="false" style="border: none; ">Guardian</a>
                  </li>
                </ul>
              </div>
              <div class="card-body" style="background-color:rgb(255, 255, 255);">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade active show" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
                      <p class="lead text-center" style="font-weight: 400;">Personal Details</p>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group ">
                            <label>First Name </label>
                            <input type="text" class="form-control" id="add_first_name" name="add_first_name" required >
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group ">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" id="add_middle_name" name="add_middle_name" >
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group ">
                            <label>Last Name </label>
                            <input type="text" class="form-control" id="add_last_name" name="add_last_name"required >
                          </div>  
                        </div>
                      </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group ">
                              <label >Suffix</label>
                              <input type="text" class="form-control" id="add_suffix" name="add_suffix" >
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group ">
                              <label >Civil Status</label>
                              <select name="add_civil_status" id="add_civil_status" class="form-control" required>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Divorced">Divorced</option>
                              </select>
                            </div>
                          </div>
                          
                          <div class="col-sm-6">
                            <div class="form-group ">
                              <label >Religion</label>
                              <input type="text" class="form-control" id="add_religion" name="add_religion" required>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group ">
                              <label >Nationality</label>
                              <input type="text" class="form-control" id="add_nationality" name="add_nationality" required>
                            </div>
                          </div>                              
                        </div>
                  </div>
                  <div class="tab-pane fade" id="other-info" role="tabpanel" aria-labelledby="other-info-tab">
                        <p class="lead text-center" style="font-weight: 400;">Address</p>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Province</label>
                              <input type="text" class="form-control" id="add_province" name="add_province" readonly>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Zip Code</label>
                              <input type="text" class="form-control" id="add_zip" name="add_zip" readonly>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Municipality</label>
                              <input type="text" class="form-control" id="add_municipality" name="add_municipality" readonly>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Baranggay</label>
                                <!-- hidden -->
                              <input type="hidden" id="add_baranggay" name="add_baranggay">
                              <input type="text" class="form-control" id="add_barangay" name="add_barangay" readonly>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="form-group ">
                              <label >Zone</label>
                              <select name="add_zone" id="add_zone" class="form-control" required>
                              </select>
                            </div>
                          </div>
                            
                          <div class="col-sm-6">
                            <div class="form-group">
                            <label>Street</label>
                            <input type="text" class="form-control" id="add_street" name="add_street" >
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>House Number</label>
                              <input type="text" class="form-control" id="add_house_number" name="add_house_number" >
                            </div>
                          </div>


                          <div class="col-sm-6">
                            <div class="form-group">
                              <label >Contact Number</label>
                              <input type="text" class="form-control" maxlength="11" id="add_contact_number" name="add_contact_number" width="100%" required>
                            </div>
                          </div>
                          
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Email Address</label>
                              <input type="text" class="form-control" id="add_email_address" name="add_email_address" >
                            </div>
                          </div>
                        </div>
                  </div>      
                  <div class="tab-pane fade" id="guardian" role="tabpanel" aria-labelledby="guardian-tab">
                    
                      <p class="lead text-center" style="font-weight: 400;">Guardian</p>
                      <div class="row">

                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Father's Name</label>
                            <input type="text" class="form-control" id="add_father_name" name="add_father_name">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Mother's Name</label>
                            <input type="text" class="form-control" id="add_mother_name" name="add_mother_name">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Guardian</label>
                            <input type="text" class="form-control" id="add_guardian" name="add_guardian" >
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Guardian Contact</label>
                            <input type="text" class="form-control" maxlength="11" id="add_guardian_contact" name="add_guardian_contact" >
                          </div>
                        </div>

                      </div>
                    
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-end" style="background-color:rgb(255, 255, 255);">
                <button type="reset" class="btn btn-secondary px-4 mr-4 elevation-3" style="border-radius: 15px;">
                  <i class="fas fa-undo"></i> RESET
                </button>
                <button type="submit" class="btn btn-success px-4 elevation-3" style="border-radius: 15px;">
                  <i class="fas fa-user-plus"></i> ADD NEW RESIDENT
                </button>
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



<!-- display address dynamically -->
<script>
$(document).ready(function() {
    $.ajax({
        url: '../views/admin/get_barangay_profile.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);  // Check if data is coming back correctly
            $('input[name="add_province"]').val(data.bar_province);
            $('input[name="add_municipality"]').val(data.bar_municipality);
            $('input[name="add_zip"]').val(data.bar_zip_code);
            $('input[name="add_barangay"]').val(data.bar_barangay);
            $('input[name="add_baranggay"]').val(data.bar_id); // hidden input
        }
    });
});
</script>




<script>
  document.getElementById("add_first_name").addEventListener("keyup", function() {
    document.getElementById("keyup_first_name").innerText = this.value;
  });
  

  document.getElementById("add_middle_name").addEventListener("keyup", function() {
    document.getElementById("keyup_middle_name").innerText = this.value;
  });

  document.getElementById("add_last_name").addEventListener("keyup", function() {
    document.getElementById("keyup_last_name").innerText = this.value;
  });
</script>


<script>
  document.getElementById("add_pwd").addEventListener("change", function () {
    const pwdCheck = document.getElementById("pwd_check");
    pwdCheck.style.display = this.value === "YES" ? "block" : "none";
  });
</script>


<script>
  document.getElementById('add_voters').addEventListener('change', function () {
    const precinctContainer = document.getElementById('precinct_container');
    if (this.value === 'YES') {
      precinctContainer.style.display = 'block';
      document.getElementById('add_precinct_number').setAttribute('required', true);
    } else {
      precinctContainer.style.display = 'none';
      document.getElementById('add_precinct_number').removeAttribute('required');
    }
  });
</script>




<script>
  document.getElementById("image_residence").addEventListener("click", function () {
    document.getElementById("add_image").click();
  });

  document.getElementById("add_image").addEventListener("change", function (e) {
    const reader = new FileReader();
    reader.onload = function () {
      document.getElementById("image_residence").src = reader.result;
    };
    reader.readAsDataURL(e.target.files[0]);
  });
</script>


<!-- display all zone -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    fetch('../views/admin/get_all_zone_to_display.php')
      .then(response => response.json())
      .then(data => {
        const select = document.getElementById('add_zone');
        select.innerHTML = ''; // Clear loading text

        data.forEach(zone => {
          const option = document.createElement('option');
          option.value = zone.zone_id;
          option.textContent = zone.zone_name;
          select.appendChild(option);
        });
      })
      .catch(error => {
        console.error('Error fetching zones:', error);
        const select = document.getElementById('add_zone');
        select.innerHTML = '<option disabled>Error loading zones</option>';
      });
  });
</script>


<!-- save to db -->
<script>
$(function () {
  $('#newResidenceForm').on('submit', function (e) {
    e.preventDefault();                     
    const formData = new FormData(this);    

    $.ajax({
      url: '../views/admin/add_resident.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      dataType: 'json', // expect JSON from PHP
      success: function(res) {
        if (res.status === "success") {
            Swal.fire({
              icon: 'success',
              text: res.message
            }).then(() => {
              location.reload(); // Refresh the page after alert is closed
            });
          } else {
            Swal.fire({ icon: 'error', text: res.message });
          }
        },
                error: function(xhr) {
        Swal.fire({ 
          icon: 'error', 
          title: 'Server Error',
          text: xhr.responseJSON?.message || xhr.statusText 
        });
      }
    });
  });
});
</script>


</body>
</html>
