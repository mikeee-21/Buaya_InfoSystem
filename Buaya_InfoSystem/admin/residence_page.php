<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>All Residence</title>

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
  
<div class="wrapper">


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





    <!-- STYLE -->
    <style>
    #total{
      background-color: #FFFFFF;
      border-color: #1F6155;
      color: #000000;

      width: 50px;
      height: 25px;
      padding: 2px 6px;
      font-size: 14px;
      margin-left: 10px;
    }

    .input-group-text{
      background-color: #1F6155;
      color: #FFFFFF;
    }
    #search{
      background-color: #FA9131;
      border-color: #FA9131;
      transition: all 0.2s ease-in-out;
    }
    #search:hover{
      filter: brightness(90%);
      transition: all 0.2s ease-in-out;
    }

    #back{
      background-color: #C90701;
      border-color: #C90701;
      transition: all 0.2s ease-in-out;
    }
    #back:hover{
      filter: brightness(90%);
      transition: all 0.2s ease-in-out;
    }

    #allResidenceTable{
      background-color: #81D5C6;
    }


    tr.rounded-row td:first-child {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
  }
  tr.rounded-row td:last-child {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
  }

  .badge-yes {
    background-color: #28a745;
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
  }

  .badge-no {
    background-color: #fd7e14;
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
  }

  .badge-active {
    background-color: #ffc107;
    color: black;
    border-radius: 20px;
    padding: 5px 10px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
  }

  .badge-inactive {
    background-color: #dc3545;
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
  }

  .dot {
    width: 10px;
    height: 10px;
    background-color: black;
    border-radius: 50%;
    display: inline-block;
  }

  .align-middle {
    background-color: #E7F7F4;
  }

    
  /* STATUS TOGGLE BUTTON */
  .toggle-wrapper {
    width: 100px;
    height: 35px;
    background-color: #dc3545;
    border-radius: 999px;
    display: flex;
    align-items: center;
    padding: 0 10px;
    gap: 3px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    margin-right: 10px;
  
    transition: background-color 0.3s ease;
  }

  .toggle-circle {
    width: 18px;
    height: 18px;
    /* background-color: white; */
    border-radius: 50%;
    transition: right 0.3s ease, transform 0.3s ease;
  }

  .toggle-text {
    color: black;
    font-weight: 600;
    transition: color 0.3s ease, transform 0.3s ease;
    
  }

  /* ACTIVE STATE */
  .toggle-wrapper.inactive {
    background-color: #ffc107;
    flex-direction: row-reverse;
    gap: 5px;
  }

  /* ACTIVE CIRCLE */
  .toggle-wrapper.inactive .toggle-circle {
    background-color:black;
    transform: translateX(0px);
  }

  /* ACTIVE WORD */
  .toggle-wrapper.inactive .toggle-text {
    color: black;
    transform: translateX(-7px);
  }

  /* INACTIVE CIRCLE */
  .toggle-wrapper:not(.inactive) .toggle-circle {
    transform: translateX(0); /* Keep circle on the left */
    background-color: white;
  }

  /* INACTIVE WORD */
  .toggle-wrapper:not(.inactive) .toggle-text {
    color: white;
  }
</style>






      <!-- MAIN CONTENT -->
      <div class="content-wrapper bg-white"> 
      <section class="content bg-white">
        <div class="container-fluid bg-white"> 

          <div class="card" style="background-color: #E7F7F4;">
            <div class="card-body">
              <fieldset>
                  <legend class="tot_residence mb-4 d-flex align-items-center">NUMBER OF RESIDENCE 
                    <input type="text" id="total" class="form-control" readonly>
                  </legend>

                    <div class="row">
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">FIRST NAME</span>
                          </div>
                              <input type="search" name="first_name" id="first_name" class="form-control"> 
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">MIDDLE NAME</span>
                          </div>
                              <input type="search" name="middle_name" id="middle_name" class="form-control"> 
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">LAST NAME</span>
                          </div>
                              <input type="search" name="last_name" id="last_name" class="form-control"> 
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">VOTERS</span>
                          </div>
                            <select name="voters" id="voters" class="form-control">
                              <option value="">--SELECT VOTERS--</option>
                              <option value="YES">YES</option>
                              <option value="NO">NO</option>
                            </select>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">AGE</span>
                          </div>
                              <input type="number" name="age" id="age" class="form-control"> 
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">STATUS</span>
                          </div>
                            <select name="status" id="status" class="form-control">
                              <option value="">--SELECT STATUS--</option>
                              <option value="ACTIVE">ACTIVE</option>
                              <option value="INACTIVE">INACTIVE</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">PWD</span>
                          </div>
                            <select name="pwd" id="pwd" class="form-control">
                              <option value="">--SELECT PWD--</option>
                              <option value="YES">YES</option>
                              <option value="NO">NO</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">SINGLE PARENT</span>
                          </div>
                            <select name="single_parent" id="single_parent" class="form-control">
                              <option value="">--SELECT PARENT STATUS--</option>
                              <option value="YES">YES</option>
                              <option value="NO">NO</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">SENIOR</span>
                          </div>
                            <select name="senior" id="senior" class="form-control">
                              <option value="">--SELECT SENIOR--</option>
                              <option value="YES">YES</option>
                              <option value="NO">NO</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">RESIDENT NUMBER</span>
                          </div>
                              <input type="text" name="resident_id" id="resident_id" class="form-control">
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-4 text-center mb-4">
                        <button type="button" class="btn btn-warning px-3 elevation-3 text-white me-2" id="search"><i class="fas fa-search"></i> SEARCH</button>
                        <button type="button" class="btn btn-danger px-3 elevation-3" id="back"><i class="fas fa-undo"></i> BACK</button>
                      </div>
                      
                    </div>
                      
                    
                  <table class="table table-striped table-hover mt-4 w-100" id="allResidenceTable" style="table-layout: fixed;">
                    <thead class="text-uppercase rounded-header">
                      <tr>
                        <th style="width: 6%;">Image</th>
                        <th style="width: 15%;">Resident Number</th>
                        <th style="width: 16%">Name</th>
                        <th style="width: 6%">Age</th>
                        <th style="width: 11%">Pwd</th>
                        <th style="width: 12%">Single Parent</th>
                        <th style="width: 10%">Voters</th>
                        <th style="width: 8%">Status</th>
                        <th style="width: 11%" class="text-center">Action</th>
                      </tr>
                    </thead>

                    <tbody >
                      <tr class=" align-middle " style="height:30px;">
                        <td class="text-start align-middle rounded-row">
                          <img src="img/m1.jpg" alt="Official Image" class="img-fluid rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td class="text-start align-middle">1432657893</td>
                        <td class="text-start align-middle">Leilani Mendozahsjas hgsywqgdywg</td>
                        <td class="text-start align-middle">89</td>
                        <td class="text-start align-middle">Deaf</td>
                        <td class="text-start align-middle"><span class="badge-no">NO</span></td>
                        <td class="text-start align-middle"><span class="badge-yes">YES</span></td>

                        <td class="text-start align-middle" style="padding-left: 1px;">
                          <div class="toggle-wrapper" onclick="toggleStatus()" id="statusToggle">
                            <div class="toggle-circle" id="toggleCircle"></div>
                            <span class="toggle-text" id="toggleText">Inactive</span>
                          </div>
                        </td>
                        
                        <!-- BUTTON DELETE AND EDIT -->
                        <td class="text-center align-middle" >
                          <button class="btn btn-sm editBtn" >
                            <i class="nav-icon fa-solid fa-pen-to-square text-success"></i>
                          </button>

                          <button class="btn btn-sm rmvBtn"  type="submit">
                            <i class="nav-icon fas fa-trash-alt text-danger"></i>
                          </button>
                        </td>

                      </tr> 
                    </tbody>
                  </table>

              </fieldset>
            </div>
          </div>   


        </div><!--/. container-fluid -->
      </section>
          <!-- /.content -->
      </div>
        <!-- /.content-wrapper -->
    </div> 
    <!-- /.end of wrapper -->




















































    
<!-- Modal -->
<div class="modal font-inter" id="viewResidenceModal"  role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="position: fixed; top: 45%; left: 50%; transform: translate(-50%, -50%); width: 80%;">
        <div class="modal-content">
        <form id="editResidenceForm" method="post" enctype="multipart/form-data">
      <div class="modal-body" style="background-color: #DBF6F9;  max-height: 70vh; overflow-y: auto; padding-right: 20px; scrollbar-width: none; -ms-overflow-style: none;">
        
        <div class="container-fluid">
         
        
        <div class="dynamic_form">
       
        <table width="80%" style="font-size:9pt;" class="table table-borderless">
          <tbody>
            <tr>
              <td class="text-center">
                
              </td>
              <td class="text-center">
                <div style="font-size:12pt; font-weight: bold;">

                <div style="position:absolute; top:30px; right:40px;">
                  <img src="img/m1.jpg" alt="Resident" class="resident-image" style="width: 170px; height: 170px; object-fit: cover;">
                </div>

                Official record confirming your residency in this barangay.<br>
                Barangay Buaya District ___ <br>
                Lapu-Lapu, Cebu <br>
                  <br><br>
                  <br><br>
                  <h4 style="font-weight: bold; margin-bottom: 30px">RESIDENT NO. 127673176317 </h4>
                </div>

                
              </td>
              <td  class="text-center">
                <br>
               
              </td>
            </tr>
          </tbody>
        </table>
        <input type="hidden" id="edit_residence_id" name="edit_residence_id">
      

        <div class="table-responsive">
        <table  style="font-size:11pt;" class="table table-bordered">
          <tbody>
            
            <tr>
              <td colspan="3" style="border: 1px solid black;">
                <div class="d-flex justify-content-between">
                  <div style="font-weight: bold;"> 
                    FIRST NAME<br>
                    <input type="text"  class="editInfo form-control form-control-sm"   id="edit_first_name" name="edit_first_name" size="30" style="background-color: #DBF6F9; border: none;"> 
                    <input type="hidden" value="false" id="edit_first_name_check"> 
                  </div>
                  <div style="font-weight: bold;">
                    MIDDLE NAME<br>
                    <input type="text"  class="editInfo  form-control form-control-sm "  id="edit_middle_name" name="edit_middle_name" size="20" style="background-color: #DBF6F9; border: none;"> 
                    <input type="hidden" id="edit_middle_name_check" value="false">
                  </div>
                  <div style="font-weight: bold;">      
                    LAST NAME<br>
                    <input type="text"  class="editInfo  form-control form-control-sm"   id="edit_last_name" name="edit_last_name" size="20" style="background-color: #DBF6F9; border: none;"> 
                    <input type="hidden" value="false" id="edit_last_name_check">
                  </div>
                  <div style="font-weight: bold;">      
                    SUFFIX<br>
                    <input type="text"  class="editInfo  form-control form-control-sm"  id="edit_suffix" name="edit_suffix" size="5" style="background-color: #DBF6F9; border: none;">  
                    <input type="hidden" id="edit_suffix_check" value="false">
                  </div>
                </div>
              </td>
            <td style="border: 1px solid black; font-weight: bold; text-align: center;">
            VOTERS
              <br>
              <select name="edit_voters" id="edit_voters" class="form-control" style="background-color: #DBF6F9; border: none;">YES
                <option value="NO">NO</option>
                <option value="YES">YES</option>
              </select>
              <input type="hidden" value="false" id="edit_voters_check">
            </td>
          </tr>
          <tr>
            <td style="border: 1px solid black; font-weight: bold;">
              DATE OF BIRTH
                <br>
                
                <input type="date" class="editInfo  form-control form-control-sm" name="edit_birth_date" id="edit_birth_date" style="background-color: #DBF6F9; border: none;"/>
                <input type="hidden" id="edit_birth_date_check" value='false'>
            </td>
            <td style="border: 1px solid black; font-weight: bold;">
              PLACE OF BIRTH
                <br>
              
              <input type="text" class="editInfo  form-control form-control-sm"   name="edit_birth_place" id="edit_birth_place" style="background-color: #DBF6F9; border: none;"> 
              <input type="hidden" id="edit_birth_place_check" value="false">
            </td>
            <td style="border: 1px solid black; font-weight: bold;">
              AGE
                <br>
            
              <input type="text" class="editInfo  form-control form-control-sm"  name="edit_age" id="edit_age" style="background-color: #DBF6F9; border: none;"> 
            </td>
            <td style="border: 1px solid black; font-weight: bold;">
              SINGLE PARENT
                <br>
                <select name="edit_single_parent" id="edit_single_parent" class="form-control" style="background-color: #DBF6F9; border: none;">
                  <option value="YES">YES</option>
                  <option value="NO">NO</option>
              </select>
              <input type="hidden" id="edit_single_parent_check" value="false">
            </td>
        
        
          </tr>
          <tr>
          <td style="border: 1px solid black; font-weight: bold;">
              PWD
                <br>
                <select name="edit_pwd" id="edit_pwd" class="form-control" style="background-color: #DBF6F9; border: none;">
                  <option value="YES" >YES</option>
                  <option value="NO" >NO</option>
              </select>
              <input type="hidden" id="edit_pwd_check" value="false">
          </td>
          <td style="border: 1px solid black; font-weight: bold;">
              TYPE OF PWD
                <br>
                <input type="text" class="editInfo  form-control form-control-sm"   name="edit_pwd_info" id="edit_pwd_info" style="background-color: #DBF6F9; border: none;"> 
              <input type="hidden" id="edit_pwd_info_check" value="false">
            </td>
            <td style="border: 1px solid black; font-weight: bold;">
              GENDER
              <br>
              <select name="edit_gender" id="edit_gender" class="form-control" style="background-color: #DBF6F9; border: none;">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <input type="hidden" id="edit_gender_check" value="false">
            </td>
            <td style="border: 1px solid black; font-weight: bold;">
              CIVIL STATUS
              <br>
              <select name="edit_civil_status" id="edit_civil_status" class="form-control" style="background-color: #DBF6F9; border: none;">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
              </select>
              <input type="hidden" id="edit_civil_status_check" value="false">
            </td>
          </tr>

          <tr style="text-align: center;">
            <td colspan="2" style="border: 1px solid black; font-weight: bold;">
              RELIGION
              <br>
              <input type="text" class="editInfo  form-control form-control-sm"" name="edit_religion" id="edit_religion" style="background-color: #DBF6F9; border: none; text-align: center;">
              <input type="hidden" id="edit_religion_check" value="false">
            </td> 
            <td colspan="2" style="border: 1px solid black; font-weight: bold;">
              NATIONALITY
              <br>
                <input type="text" class="editInfo  form-control form-control-sm" name="edit_nationality" id="edit_nationality" style="background-color: #DBF6F9; border: none; text-align: center;">
                <input type="hidden" id="edit_nationality_check" value="false">
            </td> 
          </tr>

          <tr>
            <td style="border: 1px solid black; font-weight: bold;">
              PROVINCE
                <br>
              <input type="text" class="editInfo  form-control form-control-sm"  name="edit_province" id="edit_province" style="background-color: #DBF6F9; border: none;">
              <input type="hidden" id="edit_province_check" value="false">
            </td>

            <td style="border: 1px solid black; font-weight: bold;">
                ZIP CODE 
                <br>
                <input type="text" class="editInfo  form-control form-control-sm"  name="edit_zip" id="edit_zip" style="background-color: #DBF6F9; border: none;">
                <input type="hidden" id="edit_zip_check" value="false">
            </td>

            <td style="border: 1px solid black; font-weight: bold;">
              MUNICIPALITY
                <br>
              <input type="text" class="editInfo  form-control form-control-sm"  name="edit_municipality" id="edit_municipality" style="background-color: #DBF6F9; border: none;">
              <input type="hidden" id="edit_municipality_check" value="false">
            </td>

            <td style="border: 1px solid black; font-weight: bold;">
                BARANGAY
                <br>
                <input type="text" class="editInfo  form-control form-control-sm"  name="edit_barangay" id="edit_barangay" style="background-color: #DBF6F9; border: none;">
                <input type="hidden" id="edit_barangay_check" value="false">
            </td>
          </tr>

          <tr>
            <td style="border: 1px solid black; font-weight: bold;">
                ZONE
                  <br>
                  <select name="edit_zone" id="edit_zone" class="form-control" style="background-color: #DBF6F9; border: none;">
                    <option value="Z1" >Zone 1</option>
                    <option value="Z2" >Zone 2</option>
                    <option value="Z3">Zone 3</option>
                    <option value="Z4">Zone 4</option>
                    <option value="Z5">Zone 5</option>
                    <option value="Z6">Zone 6</option>
                    <option value="Z7">Zone 7</option>
                </select>
                <input type="hidden" id="edit_zone_check" value="false">
            </td>

            <td style="border: 1px solid black; font-weight: bold;">
              STREET
              <br>
              <input type="text" class="editInfo  form-control form-control-sm" name="edit_street" id="edit_street" style="background-color: #DBF6F9; border: none;">
              <input type="hidden" id="edit_street_check" value="false">
            </td>

            <td style="border: 1px solid black; font-weight: bold;">
              HOUSE NUMBER
              <br>
              <input type="text" class="editInfo  form-control form-control-sm" name="edit_house_number" id="edit_house_number" style="background-color: #DBF6F9; border: none;">
              <input type="hidden" id="edit_house_number_check" value="false">
            </td>
          
            <td  style="border: 1px solid black; font-weight: bold;">
              ADDRESS
              <br>
              <input type="text" class="editInfo  form-control form-control-sm" name="edit_address" id="edit_address" style="background-color: #DBF6F9; border: none;">
              <input type="hidden" id="edit_address_check" value="false">
            </td>      
          </tr>

          <tr style="text-align: center;">
            <td colspan="2" style="border: 1px solid black; font-weight: bold;">
              EMAIL ADDRESS
              <br>
              <input type="text" class="editInfo  form-control form-control-sm" name="edit_email_address" id="edit_email_address" style="background-color: #DBF6F9; border: none; text-align: center;">
              <input type="hidden" id="edit_email_address_check" value="false">
            </td>
            <td colspan="2" style="border: 1px solid black; font-weight: bold;">
              CONTACT NUMBER
              <br>
              <input type="text" maxlength="11" class="editInfo  form-control form-control-sm"  name="edit_contact_number" id="edit_contact_number" style="background-color: #DBF6F9; border: none; text-align: center;">
              <input type="hidden" id="edit_contact_number_check" value="false">
            </td>         
          </tr>

          <tr>
            <td style="border: 1px solid black; font-weight: bold;">
              FATHER'S NAME
              <br>
              <input type="text" class="editInfo  form-control form-control-sm"  name="edit_fathers_name" id="edit_fathers_name" style="background-color: #DBF6F9; border: none;">
              <input type="hidden" id="edit_fathers_name_check" value="false">
            </td>
            <td style="border: 1px solid black; font-weight: bold;">
              MOTHER'S NAME
              <br>
              <input type="text" class="editInfo  form-control form-control-sm"  name="edit_mothers_name" id="edit_mothers_name" style="background-color: #DBF6F9; border: none;">
              <input type="hidden" id="edit_mothers_name_check" value="false">
            </td>  
            <td style="border: 1px solid black; font-weight: bold;">
              GUARDIAN
              <br>
              <input type="text" class="editInfo  form-control form-control-sm" name="edit_guardian" id="edit_guardian" style="background-color: #DBF6F9; border: none;">
              <input type="hidden" id="edit_guardian_check" value="false">
            </td>
            <td style="border: 1px solid black; font-weight: bold;">
              GUARDIAN CONTACT
              <br>
              <input type="text" class="editInfo  form-control form-control-sm" maxlength="11" name="edit_guardian_contact" id="edit_guardian_contact" style="background-color: #DBF6F9; border: none;">
              <input type="hidden" id="edit_guardian_contact_check" value="false">
            </td>         
          </tr>

        </tbody>
      </table>
    </div>
  </div>
                    
              </div>
            </div>

                <div class="modal-footer" style="background-color: #DBF6F9; height: 15%; padding-right: 22px;">
                    <button type="button p" id="closeModal" class="btn btn-secondary btn-flat elevation-5" data-dismiss="modal" style="background-color: #DE0909; width: 10%; border-radius: 20px; border-color: #DE0909; "><i class="fas fa-times"></i> CLOSE</button>
                    
                    <button type="button" class="btn btn-primary elevation-5" id="editBtn" style="border-radius: 20px;">
                        <i class="fas fa-edit"></i> EDIT DETAILS
                    </button>
                </div>

                <div id="editActions" style="display: none; gap: 10px; margin-top: 10px;">
                    <button type="button" class="btn btn-secondary" id="cancelEditForm" style="border-radius: 20px;">
                        <i class="fas fa-times-circle"></i> CANCEL
                    </button>
                    <button type="button" class="btn btn-success" id="showConfirmation" style="border-radius: 20px;">
                        <i class="fas fa-check-circle"></i> EDIT
                    </button>
                </div>

            </form>
          </div>
        </div>
      </div>



<script>
 let isEditing = false;

// Simulate your data (replace this with real data dynamically later)
const sampleData = {
  first_name: "John",
  middle_name: "Doe",
  last_name: "Smith",
  suffix: "Jr.",
  voters: "Yes",
  birth_date: "1990-01-01",
  birth_place: "Cityville",
  age: 35,
  single_parent: "No",
  pwd: "Yes",
  pwd_info: "Some info",
  gender: "Male",
  civil_status: "Single",
  religion: "Christian",
  nationality: "Filipino",
  province: "Cebu",
  municipality: "Talisay",
  zip: "1234",
  barangay: "Poblacion",
  zone: "Zone 2",
  house_number: "123",
  street: "Main St",
  address: "123 Main St, Poblacion, Talisay",
  email_address: "johndoe@example.com",
  contact_number: "09123456789",
  fathers_name: "Father Name",
  mothers_name: "Mother Name",
  guardian: "Guardian Name",
  guardian_contact: "09123456789"
};

function openEditModal(data) {
  // Prefill form with sample data
  document.getElementById('edit_first_name').value = data.first_name;
  document.getElementById('edit_middle_name').value = data.middle_name;
  document.getElementById('edit_last_name').value = data.last_name;
  document.getElementById('edit_suffix').value = data.suffix;
  document.getElementById('edit_voters').value = data.voters;
  document.getElementById('edit_birth_date').value = data.birth_date;
  document.getElementById('edit_birth_place').value = data.birth_place;
  document.getElementById('edit_age').value = data.age;
  document.getElementById('edit_single_parent').value = data.single_parent;
  document.getElementById('edit_pwd').value = data.pwd;
  document.getElementById('edit_pwd_info').value = data.pwd_info;
  document.getElementById('edit_gender').value = data.gender;
  document.getElementById('edit_civil_status').value = data.civil_status;
  document.getElementById('edit_religion').value = data.religion;
  document.getElementById('edit_nationality').value = data.nationality;
  document.getElementById('edit_province').value = data.province;
  document.getElementById('edit_municipality').value = data.municipality;
  document.getElementById('edit_zip').value = data.zip;
  document.getElementById('edit_barangay').value = data.barangay;
  document.getElementById('edit_zone').value = data.zone;
  document.getElementById('edit_house_number').value = data.house_number;
  document.getElementById('edit_street').value = data.street;
  document.getElementById('edit_address').value = data.address;
  document.getElementById('edit_email_address').value = data.email_address;
  document.getElementById('edit_contact_number').value = data.contact_number;
  document.getElementById('edit_fathers_name').value = data.fathers_name;
  document.getElementById('edit_mothers_name').value = data.mothers_name;
  document.getElementById('edit_guardian').value = data.guardian;
  document.getElementById('edit_guardian_contact').value = data.guardian_contact;

  $('#viewResidenceModal').modal('show');
  resetFooter();  // Ensure footer is reset when opening
}

// When the pencil icon is clicked
document.querySelectorAll('.editBtn').forEach(function(button) {
  button.addEventListener('click', function () {
    openEditModal(sampleData); // Or pass the actual data
  });
});

// Toggle between Edit and View modes
document.addEventListener('click', function (e) {
  if (e.target && e.target.id === 'editDetailsBtn') {
    if (!isEditing) {
      // Set modal to editing mode
      isEditing = true;
      const footer = document.querySelector(".modal-footer");
      footer.innerHTML = `
        <button type="button" class="btn btn-secondary" id="cancelEditBtn"  style="border-radius: 20px;"><i class="fas fa-times-circle"></i> CANCEL</button>
        <button type="button" class="btn btn-primary" id="finalEditBtn" style="border-radius: 20px;"><i class="fas fa-check-circle"></i> SAVE CHANGES</button>
      `;
      // Enable editing on the form fields
      document.querySelectorAll('.modal-body input').forEach(function(input) {
        input.disabled = false;
      });
    }
  }
});



// CANCEL Edit
document.addEventListener('click', function (e) {
  if (e.target && e.target.id === 'cancelEditBtn') {
    $('#viewResidenceModal').modal('hide');
    isEditing = false;
    resetFooter();
  }
});

// // Finalize Edit (Save changes)
// document.addEventListener('click', function (e) {
//   if (e.target && e.target.id === 'finalEditBtn') {
//     // Collect updated data from form
//     const updatedData = {
//       first_name: document.getElementById('edit_first_name').value,
//       last_name: document.getElementById('edit_last_name').value,
//       email_address: document.getElementById('edit_email_address').value,
//       contact_number: document.getElementById('edit_contact_number').value
//     };

//     console.log("Final Data Submitted:", updatedData);

//     // You can send this data to your views here if necessary
//     alert("Form has been updated!");
//     $('#viewResidenceModal').modal('hide');
//     isEditing = false;
//     resetFooter();
//   }
// });


document.addEventListener('click', function (e) {
  if (e.target && e.target.id === 'finalEditBtn') {
    const updatedData = {
      first_name: document.getElementById('edit_first_name').value,
      last_name: document.getElementById('edit_last_name').value,
      email_address: document.getElementById('edit_email_address').value,
      contact_number: document.getElementById('edit_contact_number').value
    };

    console.log("Final Data Submitted:", updatedData);

    // Confirmation alert
    Swal.fire({
        title: "ARE YOU SURE?",
        text: "You are about to update this information.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745", // green
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, update it!"
    }).then((result) => {
        if (result.isConfirmed) {    
            
            Swal.fire({
            title: "UPDATED",
            text: "Updated successfully!",
            icon: "success"
            });

            $('#viewResidenceModal').modal('hide');
                isEditing = false;
                resetFooter();
    
        }
    });

  }
});

document.addEventListener('click', function (e) {
  if (e.target && e.target.id === 'closeModal') {
    $('#viewResidenceModal').modal('hide');
  }
});


function resetFooter() {
  const footer = document.querySelector(".modal-footer");
  footer.innerHTML = `
    <button type="button" id="closeModal" class="btn btn-secondary btn-flat elevation-5" data-bs-dismiss="modal" style="background-color: #DE0909; width: 10%; border-radius: 20px; border-color: #DE0909;"><i class="fas fa-times"></i> CLOSE</button>
    <button type="button" class="btn btn-primary elevation-5" id="editDetailsBtn" style="border-radius: 20px;"><i class="fas fa-edit"></i> EDIT DETAILS</button>
  `;
  document.querySelectorAll('.modal-body input').forEach(input => input.disabled = true);
}

  
</script>









    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



<!-- jQuery and Bootstrap JS (required for modal to function) -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>


<!-- dropdown directory management -->
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






<!--FOR ARCHIVED ICON  (using sweetalert) -->
<script>
    // General function for handling both edit and remove buttons
    function handleButtonClick(actionType) {
        let title, text, confirmButtonText, confirmButtonColor, successTitle, successText;

        if (actionType === 'remove') {

            title = "ARE YOU SURE?";
            text = "You are about to archive this resident.";
            confirmButtonText = "Yes, archive it!";
            confirmButtonColor = "#28a745"; // red for removal
            successTitle = "ARCHIVED";
            successText = "Archived Successfully!";

        } 
        // Show SweetAlert with dynamic values based on action type
        Swal.fire({
            title: title,
            text: text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: confirmButtonColor,
            cancelButtonColor: "#d33", // Red cancel color
            confirmButtonText: confirmButtonText
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: successTitle,
                    text: successText,
                    icon: "success"
                });
            }
        });
    }

    // Loop through all elements with class rmvBtn
    document.querySelectorAll(".rmvBtn").forEach(button => {
        button.addEventListener("click", function(e) {
            e.preventDefault();
            handleButtonClick('remove');
        });
    });

</script>



</body>
</html>
