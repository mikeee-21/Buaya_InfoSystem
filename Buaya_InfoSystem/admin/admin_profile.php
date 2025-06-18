<?php
  session_start();
  // Get admin_id
  $admin_id = $_SESSION['admin_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Active Admin</title>

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


</style>



<body class="hold-transition sidebar-mini">
  



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
          <a class="nav-link" href="../views/admin/sign_out.php" role="button">
            <i class="fa-solid fa-right-from-bracket mr-1" style="color:black;"></i>
            <span style="color:black;">Sign Out</span>
          </a>
        </li>

      </ul>
    </nav>











  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4" style="background: linear-gradient(135deg, #000155, #0FCDA7)">
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












<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid">


            <form id="editOfficialForm"  method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                    <div class="col mt-4" style="height:700px; max-height: 700px; overflow-y: auto;">

                        <div class="card card-outline  elevation-2" style="height: 610px; background-color:rgb(255, 255, 255);">
                            <div class="card-header">
                                <div class="card-title font-weight-bold" style="font-family: 'Inter', sans-serif; font-size: 18px;">
                                    Admin Profile
                                </div>
                            </div>
                            <div class="card-body box-profile" style="font-family: 'Inter', sans-serif; font-size: 18px;">

                                <div class="text-center mb-3" style="width:150px; height: 150px; border: 1px solid rgb(0, 0, 0);  margin: 0 auto;">
                                    <img src="img/m1.jpg" name="image" id='image' alt="profile" style="width:150px; height: 150px;">
                                </div>

                                <h3 class="profile-username text-center" style=" margin: 0 10; font-size: 15px; font-weight: 15px;"><span id="keyup_first_name">Jay Mike</span> <span id="keyup_last_name">Palang</span></h3>

                                <div class="row">
                                <div class="col">
                                    <input type="hidden" name="official_id" value="">
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label>Role</label>
                                    <p class="p-2 rounded" style="border: 1px solid black;" id="role">Barangay Captain</p>
                                    </div>
                                </div>
        
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label>Permission</label>
                                    <p class="p-2 rounded" style="border: 1px solid black;" id="permission">Request Document Management</p>
                                    </div>
                                </div>
                                
                               
                              </div>
                                
                                
                               
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>


                    <div class="col-sm-8 mt-4"  style="max-height: 700px; overflow-y: auto; font-family: 'Inter', sans-serif; font-size:15px;">

                        <div class="card card-tabs  elevation-2" style="background-color:rgb(255, 255, 255);">
                            <div class="card-header p-2">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist" >
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basic-info-tab" data-toggle="pill" href="#basic-info" role="tab" aria-controls="basic-info" aria-selected="true">Basic Info</a>
                                    </li>

                                </ul>
                            </div>

                            <div class="card-body" style="font-family: 'Inter', sans-serif; font-size: 18px;" >

                                <div class="tab-pane fade active show" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
                                      <p class="lead text-center mb-0">Personal Details</p>
                                      <div class="row">
                                          <div class="col-sm-12">
                                              <div class="form-group">
                                                  <label>First Name</label>
                                                  <input type="text" class="form-control" id="fname" readonly>
                                              </div>
                                          </div>
                                          <div class="col-sm-12">
                                              <div class="form-group">
                                                  <label>Last Name</label>
                                                  <input type="text" class="form-control" id="lname" readonly>
                                              </div>
                                          </div>
                                          <div class="col-sm-12">
                                              <div class="form-group">
                                                  <label>Middle Name</label>
                                                  <input type="text" class="form-control" id="mname" readonly>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label>Suffix</label>
                                                  <input type="text" class="form-control" id="suffix" readonly>
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label>Email</label>
                                                  <input type="email" class="form-control" id="email" readonly>
                                              </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label>Contact</label>
                                                  <input type="text" class="form-control" id="contact" readonly>
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



<script>
$(document).ready(function () {
  $.ajax({
    url: '../views/admin/get_admin_account.php',
    type: 'GET',
    dataType: 'json',
    success: function (response) {
      if (response.status === 'success') {
        const data = response.data;

        $('#keyup_first_name').text(data.admin_fname);
        $('#keyup_last_name').text(data.admin_lname);
        $('#role').text(data.role_name.toUpperCase());
        $('#permission').text(data.permision.toUpperCase() || 'No permissions');


        document.getElementById('fname').value    = data.admin_fname;
        document.getElementById('lname').value    = data.admin_lname;
        document.getElementById('mname').value    = data.admin_mname;
        document.getElementById('suffix').value   = data.admin_suffix || '';
        document.getElementById('email').value    = data.admin_email;
        document.getElementById('contact').value  = data.admin_contact;

          // Set image preview
        const imgEl = document.getElementById('image'); // Match the ID from your HTML
        if (imgEl) {
          imgEl.src = data.admin_image || '../server_imgs/default_user_img.jpg'; // Ensure path is correct
        }


        
      } else {
        alert('Error: ' + response.message);
      }
    },
    error: function (xhr, status, error) {
      console.error('AJAX Error:', error);
    }
  });
});
</script>


</body>
</html>
