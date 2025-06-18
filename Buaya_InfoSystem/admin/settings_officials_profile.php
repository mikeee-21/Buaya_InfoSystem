<?php
  if (!isset($_GET['res_id']) || !is_numeric($_GET['res_id'])) {
    echo "<script>alert('Invalid or missing Resident ID!'); window.location.href = 'settings_list_official.php';</script>";

  }
  $resId = (int) $_GET['res_id'];
?>


<!-- FOR OFFICIALS SETTINGS PROFILE
     ONCE MO CLICK SILA SA CERTAIN NA OFFICIALS
     MO DISPLAY NI NGA FILE THAT CONTAINS OFFICIALS PROFILE 
     AND ALLOWED TO EDIT -->




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
.nav-link {
  display: flex;
  align-items: center;   /* Align icon and text vertically */
  gap: 8px;              /* Optional: spacing between icon and text */
  color: black;          /* Ensures the text color matches icon if needed */
}

.nav-link p {
  margin: 0;             /* Remove default margins from <p> */
}

/* For main menu items */
.nav-sidebar .nav-item > .nav-link:hover {
  background-color:rgb(255, 255, 255); /* hover background color */
  border-radius: 10px;
  color: white !important;
}
/* For submenu items */
.nav-treeview .nav-link:hover {
  background-color:rgb(255, 255, 255); /* submenu hover background color */
  border-radius: 10px;
  color: white;
}

.nav-treeview li a i, .nav-treeview li a p{
  font-size: 15px !important;
}

.nav-icon {
  font-size: 20px !important; 
  color: black;
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

.nav-tabs .nav-link.active {
    background-color:rgb(255, 255, 255) !important;  /* light greenish */
    color:rgb(0, 0, 0) !important;             /* optional: white text */
    border-color:rgb(255, 255, 255) !important;      /* optional: border same as bg */
}

.nav-tabs .nav-link:hover{
    color:rgb(0, 0, 0);
    transition: 0.5 ease-in-out;
}

/* FONT */
.font-inter {
  font-family: 'Inter', sans-serif;
}


</style>



<body class="hold-transition sidebar-mini">
  
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white " style="border: none; box-shadow: none;">


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
            <li class="dropdown-item ">
              <a href="#" class="d-block w-100" id="directoryToggle">
                Directory Management <i class="nav-icon fas fa-caret-down float-right"></i>
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
            <i class="nav-icon fas fa-expand-arrows-alt"></i>
          </a>
        </li>

        <!-- ADMIN -->
        <li class="nav-item mr-4 font-inter ">
          <a href="admin_profile.php" class="nav-link" role="button">
            <i class="nav-icon fa-solid fa-user mr-1" ></i>
            <span style="color:black; ">Admin</span>
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





  <!-- MAIN CONTENT -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white ml-5 mr-5 font-inter">
    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid  pt-5 p-2" style="height: 670px;">


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
                                    <input type="file" id="imageUploader" accept="image/*" style="display: none;"  disabled/>
                                </div>




                                <h3 class="profile-username text-center" style=" margin: 0 10; font-size: 15px; font-weight: 15px;"><span id="keyup_first_name"></span> <span id="keyup_last_name"></span></h3>

                                <div class="row">
                                <div class="col">
                                    <input type="hidden" name="official_id" value="">
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
                                            <input type="text" name="add_committee" id="add_committee" class="form-control" required>
                                            <input type="hidden" id="edit_committee" value="false">
                                        </div>
                                </div>


                                    <div class="col-sm-12">
                                        <div class="form-group font-inter">
                                            <label>Short Description:</label>
                                            <textarea name="add_description" id="add_description" class="form-control rounded" style="height: 150px;" required></textarea>
                                        </div>
                                    </div>



                                <div class="col-sm-6">
                                    <div class="form-group ">
                                    <label >Start</label>
                                    <input type="date" class="form-control" id="edit_term_from" name="edit_term_from" value="">
                                    <input type="hidden" name="start_term" id="edit_term_from_check" value="false">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group ">
                                    <label >End</label>
                                    <input type="date" class="form-control" id="edit_term_to" name="edit_term_to" value="">
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

                                
                                <div class="card-footer" style="background-color:rgb(255, 255, 255);">
                                    <input type="text" hidden name="off_id" id="off_id">
                                    <button type="submit"  id="updateBtn" class="btn btn-success px-4 elevation-3"> <i class="fas fa-edit"></i> UPDATE</button>
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



<!-- all active admins -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Initial load
    fetchActiveAdmins();
    
    // Refresh every 30 seconds to update status
    setInterval(fetchActiveAdmins, 30000);
    
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
                const container = document.getElementById('activeAdminsContainer');
                if (!container.innerHTML.includes('alert')) { // Don't overwrite if already showing error
                    container.innerHTML = `
                        <div class="col-12 text-center py-3">
                            <div class="alert alert-warning py-2">
                                <small>Connection issue. Trying to reconnect...</small>
                            </div>
                        </div>`;
                }
            });
    }
    
    function renderActiveAdmins(admins) {
        const container = document.getElementById('activeAdminsContainer');
        
        if (!admins || admins.length === 0) {
            container.innerHTML = `
                <div class="col-12 text-center py-3">
                    <p class="text-muted">No admins currently logged in</p>
                </div>`;
            return;
        }
        
        container.innerHTML = admins.map(admin => `
            <div class="col-2 d-flex flex-column align-items-center px-2" style="min-width: 100px;">
                <div style="position: relative;">
                    <img src="${admin.admin_image ? '../' + admin.admin_image : 'img/default-admin.jpg'}" 
                         alt="${admin.admin_fname} ${admin.admin_lname}"
                         class="admin-avatar"
                         onerror="this.src='img/default-admin.jpg'">
                    <span class="admin-status-indicator active"></span>
                </div>
                <p class="mt-2 mb-0 font-inter admin-name">
                    ${admin.admin_fname} ${admin.admin_lname}
                </p>
                <small class="text-muted">Online</small>
            </div>
        `).join('');
    }
});
</script>




<!-- get all information of officials -->
<script>

    const resId = <?= json_encode($resId) ?>;
    fetch('../views/admin/get_all_officials_profile.php?res_id=' + resId)

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
        document.getElementById('off_id').value                         = official.off_id ;

        document.getElementById('edit_position').value                  = official.pos_id ; // Make sure you also load options
        document.getElementById('add_committee').value                  = official.off_committee ;
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




<!-- for clicking image handler -->
 <script>
  document.getElementById('imageUploader').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('image_official').src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  });
</script>






<script>
document.getElementById('editOfficialForm').addEventListener('submit', async function(e) {
    e.preventDefault(); // Prevent page reload

    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch('../views/admin/update_officials.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.status === 'success') {
            // Use SweetAlert for success
            Swal.fire({
                icon: 'success',
                title: 'Profile updated successfully!',
                showConfirmButton: false,
                timer: 1500
            });
            // Optional: refresh the page or update UI
            //location.reload();
        } else {
            // Use SweetAlert for error
            Swal.fire({
                icon: 'error',
                title: 'Update failed',
                text: result.message
            });
        }
    } catch (error) {
        console.error('Error:', error);
        // Use SweetAlert for error in case of exception
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong!',
            text: 'There was an error while updating the profile.'
        });
    }
});

</script>



</body>
</html>


            