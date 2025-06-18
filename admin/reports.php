<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reports</title>

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


.bc1{
    background:linear-gradient(135deg, #000155, #0FCDA7);
}

.scroll-x {
  overflow-x: auto;
  scrollbar-width: 8px;       /* Firefox */
  scrollbar-color: #000155 ;
}

.scroll-x::-webkit-scrollbar {
  height: 4px;                 /* height for horizontal */
}

.scroll-x::-webkit-scrollbar-track {
  background:transparent;
}

.scroll-x::-webkit-scrollbar-thumb {
  background-color:rgb(0, 81, 74);
  border-radius: 10px;
}

.cards{
  transition: .5s ease-in-out;
}


.cards:hover{
  transform: translateY(-5px);
  transition: .5s ease-in-out;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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



/* Enhanced Table Styles */
#tableReport {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
}

#tableReport thead {
    position: sticky;
    top: 0;
    z-index: 10;
}

#tableReport thead th {
    background-color: #2c3e50;
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
    padding: 12px 15px;
    text-align: left;
    border: none;
}

#tableReport tbody tr {
    transition: all 0.2s ease;
}

#tableReport tbody tr:nth-child(even) {
    background-color: #f8f9fa;
}

#tableReport tbody tr:hover {
    background-color:rgb(238, 238, 238);
    transform: scale(1.005);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

#tableReport tbody td {
    padding: 12px 15px;
    border-bottom: 1px solid #e0e0e0;
    vertical-align: middle;
    color: #333;
}

/* Status indicators */
.status-yes {
    color: #28a745 !important;
    font-weight: 700;
}

.status-no {
    color: #dc3545 !important;
}

/* Name column styling */
.name-cell {
    font-weight: 600;
    color: #2c3e50;
}

/* Age column styling */
.age-cell {
    font-weight: 600;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    #tableReport thead {
        display: none;
    }
    
    #tableReport tbody td {
        display: block;
        text-align: right;
        padding-left: 50%;
        position: relative;
    }
    
    #tableReport tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 15px;
        width: 45%;
        padding-right: 10px;
        font-weight: 600;
        text-align: left;
        color: #2c3e50;
    }
}


/* Custom scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: #555;
}

/* Ensure table header stays on top of content */
.sticky-top {
  position: sticky;
  top: 0;
}

</style>



<body class="hold-transition sidebar-mini">
  
<div class="wrapper">


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
  <aside class="main-sidebar elevation-4" style="background:linear-gradient(135deg, #000155, #0FCDA7);">

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






    <!-- main content -->
    <div class="content-wrapper bg-white font-inter" >   
      <div class="content p-1">
         <div class="container-fluid p-1">
            <div class="row p-2" >
              <div class="row-lg p-1 elevation-1 rounded " style="height: 700px;">
                <div class="card font-weight-bold elevation-0"  >
                  <div class="card-header pl-1">
                    <h3 class="card-title font-weight-bold">Resident Report</h3>
                  </div>
                  <!-- /.card-header -->

                  <div class="card-body ">
                    <form id="filterForm">
                      <div class="row">
                              <div class="col-sm-4">
                                  <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text text-white font-weight-bold bc1">VOTERS</span>
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
                                        <span class="input-group-text text-white font-weight-bold bc1">AGE</span>
                                      </div>
                                        <input type="number" name="age" id="age" class="form-control" value=""> 
                                      </select>
                                  </div>

                              </div>

                              <div class="col-sm-4">
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text text-white font-weight-bold bc1"> SEX</span>
                                      </div>
                                      <select name="status" id="status" class="form-control">
                                        <option value="">--SELECT SEX--</option>
                                        <option value="Male" >MALE</option>
                                        <option value="Female" >FEMALE</option>
                                      </select>
                                  </div>
                              </div>
                            
                              <div class="col-sm-4">
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text text-white font-weight-bold bc1">PWD</span>
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
                                        <span class="input-group-text text-white font-weight-bold bc1">CIVIL STATUS</span>
                                      </div>
                                      <select name="single_parent" id="single_parent" class="form-control">
                                        <option value="">--SELECT CIVIL STATUS--</option>
                                        <option value="Single">SINGLE</option>
                                        <option value="Married">MARRIED</option>
                                        <option value="Widowed">WIDOWED</option>
                                        <option value="Divorced">DIVORCED</option>
                                      </select>
                                  </div>
                              </div>
                      
                        
                              <div class="col-sm-4">
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text text-white font-weight-bold bc1">SENIOR</span>
                                      </div>
                                      <select name="senior" id="senior" class="form-control">
                                        <option value="">--SELECT SENIOR--</option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                      </select>
                                  </div>
                              </div>

                              <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-flat bg-info px-3 elevation-3 text-white" id="search">
                                    <i class="fas fa-filter"></i> FILTER
                                </button>
                                <button type="button" class="btn btn-flat btn-danger px-3 elevation-3" id="reset">
                                    <i class="fas fa-undo"></i> RESET
                                </button>
                            </div>
                      </div>
                    </form>
                  </div>
                  <!-- end of card body -->

                  <div class="form-group pl-3">
                      <button type="button" id="printReportBtn" class="btn btn-warning btn-flat elevation-5 px-3">
                          <i class="fas fa-print text-white"></i> PRINT
                      </button>
                  </div>
                
                    <!-- Table container with scroll -->
                  <div class="px-3 pb-3" style="max-height:350px; overflow-y: auto;">
                    <table class="table table-striped table-hover table-sm bg-white rounded" id="tableReport">
                      <thead class="sticky-top" style="z-index: 10; background-color: #2c3e50; color: white;">
                        <tr>
                          <th>NAME</th>
                          <th>SEX</th>
                          <th>CIVIL STATUS</th>
                          <th>AGE</th>
                          <th>PWD</th>
                          <th>SENIOR</th>
                          <th>VOTERS</th>
                        </tr>
                      </thead>
                      <tbody id="residentData">
                        <!-- Data will load here via AJAX -->
                      </tbody>
                    </table>
                  </div>
                
                </div>
              </div>
              <!-- end of second row -->


              <div class="row p-2 mt-3 ml-1 w-100 rounded">

                  <div class="row pl-2 w-100">
                    <h3>Charts</h3>
                  </div>

                  <div class="row ml-2 p-3 w-100">

                      <!-- CHARTS ROW -->
                      <div class="row p-2 w-100">

                           <!-- PIE CHART (population each zone) -->
                           <div class="col-6 p-1">
                            <div class="card elevation-1 cards">
                              <div class="card-header text-center">
                                <h3 class="card-title font-weight-bold">Population of each Zone</h3>
                              </div>
                              <div class="card-body w-100">
                                <canvas id="populationChart" style="height: 300px;"></canvas>
                              </div>
                            </div>
                          </div>

                          <!-- DONUT CHART (total requests each certificate)-->
                          <div class="col-6 p-1">
                            <div class="card  card-outline cards">
                              <div class="card-header">
                                <h3 class="card-title font-weight-bold" > Total Requests of each Certificate</h3>
                              </div>
                              <div class="card-body">
                                <canvas id="totalRequestsChart" style="height: 300px;"></canvas>
                              </div>
                            </div>
                          </div>

                      </div>
                      <!-- /.row -->

                      <!-- CHARTS ROW -->
                      <div class="row p-2 w-100">
                          <!-- PIE CHART ( sex chart ) -->
                          <div class="col-6 p-1">
                            <div class="card elevation-1 cards">
                              <div class="card-header text-center">
                                <h3 class="card-title font-weight-bold">Sex Breakdown</h3>
                              </div>
                              <div class="card-body w-100">
                                <canvas id="sexBrkdnChart" style="height: 300px;"></canvas>
                              </div>
                            </div>
                          </div>

                          <!-- DONUT CHART (age groups) -->
                          <div class="col-6 p-1">
                            <div class="card  card-outline cards">
                              <div class="card-header">
                                <h3 class="card-title font-weight-bold" > Age Groups</h3>
                              </div>
                              <div class="card-body">
                                <canvas id="ageGrpChart" style="height: 300px;"></canvas>
                              </div>
                            </div>
                          </div>

                      </div>
                      <!-- /.row -->


                    </div>

                    
                  </div>
                  <!-- outer row -->

              </div>
              <!-- container of row -->

            </div>
            <!-- end of first coloumn -->



          </div>
          <!-- end of container fluid -->
      </div>
      <!-- end of content -->
    </div>
    <!-- end of content-wrapper -->
  </div>
  <!-- end of wrapper -->






<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>




 <!-- ChartJS LIBRARy-->
<script src="plugins/chart.js/Chart.min.js"></script>



<!-- filtering -->
 <script>
  $(document).ready(function() {
      // Load initial data
      loadResidents();

      // Filter on button click
      $("#search").click(function() {
          loadResidents();
      });

      // Reset filters - PROPER IMPLEMENTATION
      $("#reset").click(function() {
        // Reset all select dropdowns
        $("#filterForm select").val('');
        
        // Reset all input fields
        $("#filterForm input").val('');
          loadResidents();
      });

      // Print button functionality - sends filtered data to your print page
    $("#printReportBtn").click(function() {
        // Get the current filter values
        const filters = $("#filterForm").serialize();
        
        // Store filters in sessionStorage temporarily
        sessionStorage.setItem('reportFilters', filters);
        
        // Open your print page
        window.open('print_report.php', '_blank');
    });
    
   });

  
  function loadResidents() {
      $.ajax({
          url: "../backend/admin/report.php",
          type: "POST",
          data: $("#filterForm").serialize(),
          dataType: "json",
          success: function(response) {
                let html = '';
                if (response.success && response.data.length > 0) {
                    response.data.forEach(resident => {
                        html += `
                                  <tr>
                                      <td class="name-cell" data-label="Name">${resident.res_first_name} ${resident.res_last_name}</td>
                                      <td data-label="Sex">${resident.res_sex}</td>
                                      <td data-label="Civil Status">${resident.res_civil_status}</td>
                                      <td class="age-cell" data-label="Age">${calculateAge(resident.res_date_of_birth)}</td>
                                      <td class="${resident.res_pwd_status ? 'status-yes' : 'status-no'}" data-label="PWD">
                                          ${resident.res_pwd_status ? 'YES' : 'NO'}
                                      </td>
                                      <td class="${resident.res_senior_status ? 'status-yes' : 'status-no'}" data-label="Senior">
                                          ${resident.res_senior_status ? 'YES' : 'NO'}
                                      </td>
                                      <td class="${resident.res_voter_status ? 'status-yes' : 'status-no'}" data-label="Voter">
                                          ${resident.res_voter_status ? 'YES' : 'NO'}
                                      </td>
                                  </tr>
                              `;
                    });
                } else {
                    html = `<tr><td colspan="7" class="text-center py-4 text-muted">No residents found matching your criteria</td></tr>`;
                }
                $("#residentData").html(html);
            },
          error: function(xhr, status, error) {
              console.error("AJAX Error:", error);
          }
      });
  }

  function calculateAge(dob) {
      if (!dob) return '';
      const birthDate = new Date(dob);
      const today = new Date();
      let age = today.getFullYear() - birthDate.getFullYear();
      const monthDiff = today.getMonth() - birthDate.getMonth();
      if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
          age--;
      }
      return age;
  }
</script>




<!-- pie chart for total residents on each zone-->
<!-- JavaScript -->
<script>
  $(function () {
    const canvas = $('#populationChart').get(0);
    if (!canvas) {
      console.warn("populationChart canvas not found.");
      return;
    }

    const ctx = canvas.getContext('2d');
    const dynamicColors = ['#023948', '#116278', '#007D9E', '#2BB2D7', '#4CB9D6', '#59DAFC', '#A5ECFF'];

    fetch('../backend/admin/get_resident_each_zone.php') // adjust path if needed
      .then(response => response.json())
      .then(data => {
        const labels = data.map(item => item.zone_name);
        const counts = data.map(item => item.count);

        const pieData = {
          labels: labels,
          datasets: [{
            data: counts,
            backgroundColor: dynamicColors.slice(0, labels.length)
          }]
        };

        const pieOptions = {
          maintainAspectRatio: false,
          responsive: true,
          plugins: {
            legend: { display: false }
          }
        };

        new Chart(ctx, {
          type: 'pie',
          data: pieData,
          options: pieOptions
        });

        // Legend
        let legendHTML = `<div style="display: flex; flex-direction: column; gap: 10px;">`;
        labels.forEach((label, i) => {
          legendHTML += `
            <div style="display: flex; align-items: center;">
              <span style="width: 25px; height: 18px; background-color: ${dynamicColors[i % dynamicColors.length]}; border-radius: 4px; display: inline-block; margin-right: 10px;"></span>
              <span style="max-height: 40px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                ${label}: ${counts[i]}
              </span>
            </div>`;
        });
        legendHTML += '</div>';
        $('#populationLegend').html(legendHTML);
      })
      .catch(error => {
        console.error("Error loading population chart data:", error);
      });

      
  });
</script>



<!-- dunot chart for each total requests in each certificate-->
<script>
  $(function () {
    var donutChartCanvas = $('#totalRequestsChart').get(0);

    if (donutChartCanvas) {
      var ctx = donutChartCanvas.getContext('2d');

      var donutData = {
        labels: ['Certificate', 'Clearance', 'Indigency'],
        datasets: [{ data: [30, 20, 50],
          backgroundColor: ['#B6B6B6', '#E7E7E7', '#D1D1D1'],
        }]
      };

      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
        cutout: '50%' // This makes it a donut
      };

      new Chart(ctx, {

        type: 'doughnut',
        data: donutData,
        options: donutOptions

      });
    } else {

      console.warn("donutChart element not found.");

    }
  });
</script>


<!-- pie chart for sex breakdown-->
<script>
  $(function () {
    
    var pieChartCanvas = $('#sexBrkdnChart').get(0);

    if (pieChartCanvas) {

      var ctx = pieChartCanvas.getContext('2d');

      fetch('../backend/admin/get_sex_breakdown.php')
        .then(response => response.json())
        .then(data => {

          const labels = data.map(item => item.res_sex);
          const counts = data.map(item => parseInt(item.count));
          const colors = ['#00203FFF', '#ADEFD1FF'];

          var pieData = {
            labels: labels,
            datasets: [{

              data: counts,
              backgroundColor: colors.slice(0, labels.length)

            }]
          };

          var pieOptions = {

            maintainAspectRatio: false,
            responsive: true,

          };

          new Chart(ctx, {

            type: 'pie',
            data: pieData,
            options: pieOptions

          });
        })
        .catch(error => {

          console.error("Error loading sex breakdown data:", error);

        });
    } else {

      console.warn("sexBrkdnChart element not found.");

    }
  });
</script>





<!-- age groups -->
<script>
  $(function () {

    const canvas = $('#ageGrpChart').get(0);
    if (!canvas) {
      console.warn("ageGrpChart canvas not found.");
      return;

    }
    const ctx = canvas.getContext('2d');

    const colors = ['#CCD0CF', '#9BABAB', '#4AC86A', '#253745', '#11212D'];

    fetch('../backend/admin/get_age_groups.php')
      .then(res => res.json())
      .then(data => {

        // Sort data by predefined order, just in case
        const ageOrder = ['Children', 'Teenager', 'Young Adult', 'Adult', 'Senior'];
        data.sort((a, b) => ageOrder.indexOf(a.age_group) - ageOrder.indexOf(b.age_group));

        const labels = data.map(item => item.age_group);
        const counts = data.map(item => parseInt(item.count));

        const donutData = {

          labels: labels,
          datasets: [{
            data: counts,
            backgroundColor: colors.slice(0, labels.length)
          }]

        };

        const donutOptions = {

          maintainAspectRatio: false,
          responsive: true,
          cutout: '50%'

        };

        new Chart(ctx, {

          type: 'doughnut',
          data: donutData,
          options: donutOptions

        });
      })
      .catch(err => {

        console.error("Error loading age groups data:", err);

      });
  });
</script>





<!-- settings dropdown -->
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






</body>
</html>
