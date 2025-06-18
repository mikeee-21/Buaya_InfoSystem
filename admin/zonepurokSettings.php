<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zone Setting</title>

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

<!-- Include SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Include SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">



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

tr.rounded-row td:first-child {

border-top-left-radius: 10px;
border-bottom-left-radius: 10px;
}
tr.rounded-row td:last-child {
border-top-right-radius: 10px;
border-bottom-right-radius: 10px;
}

table {
border-spacing: 0 5px;  /* Horizontal and Vertical spacing between rows (0 for no space between columns, 10px for rows) */
border-collapse: separate; /* Important: To make border-spacing work */
}


/* table design */
        .elevation-2 {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .elevation-3 {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .rounded-row {
            transition: all 0.3s ease;
        }
        .rounded-row:hover {
            background-color: #f8f9fa !important;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .stats-card {
            background: linear-gradient(135deg, #000155, #0FCDA7);
            border-radius: 15px;
            transition: transform 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-2px);
        }
        .search-input {
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .search-input:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 1, 85, 0.25);
            border-color: #000155;
        }
        .btn-enhanced {
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        .btn-enhanced:hover {
            transform: translateY(-2px);
        }
        .table-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .loading-spinner {
            display: none;
        }
        .no-data-message {
            color: #6c757d;
            font-style: italic;
        }
        .filter-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .input-group-text {
            border: none;
            font-weight: 600;
        }
        .form-control {
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #000155;
            box-shadow: 0 0 0 0.2rem rgba(0, 1, 85, 0.25);
        }
        .badge-count {
            background: white;
            color: #000155;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }
        .table-header {
            background: linear-gradient(135deg, #000155, #0FCDA7);;
        }
        .resident-row {
            border-bottom: 1px solid #e9ecef;
        }
        .resident-row:last-child {
            border-bottom: none;
        }
        .age-badge {
            background-color: #28a745;
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }
        .zone-badge {
            background-color: #17a2b8;
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }
        .gender-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 5px;
        }
        .male-icon {
            background-color: #007bff;
            color: white;
        }
        .female-icon {
            background-color: #e83e8c;
            color: white;
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
        <a href="#" class="d-block w-100 font-inter" id="directoryToggle">
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
    <a class="nav-link" data-widget="fullscreen" href="notification." role="button">
      <i class="fas fa-expand-arrows-alt" style="color:black;"></i>
    </a>
  </li>

  <!-- ADMIN -->
  <li class="nav-item mr-4 font-inter">
    <a class="nav-link" href="admin_profile.php" >
      <i class="fa-solid fa-user mr-1" style="color:black;"></i>
      <span style="color:black; ">Admin</span>
    </a>
  </li>

  <!-- SIGN OUT -->
  <li class="nav-item mr-4 font-inter">
    <a class="nav-link" href="../backend/admin/sign_out.php" role="button">
      <i class="fa-solid fa-right-from-bracket mr-1" style="color:black;"></i>
      <span style="color:black;">Sign Out</span>
    </a>
  </li>

</ul>
</nav>



    
    <!-- MAIN CONTENT -->

    <div class="content-wrapper m-0 p-1 bg-white font-inter" >
        <div class="col p-2 d-flex justify-content-between">
            <div class="col-4 p-2">
                <div class="row-4 p-3 mb-3 elevation-2" style="background-color:rgb(255, 255, 255); border: 1px solid rgb(194, 194, 194);
                                                   border-radius: 10px;">
                    <div class="row-2 mb-3 ">
                        <div class="d-flex align-items-center justify-content-center p-2 w-50 font-inter text-white font-weight-bold" 
                             style="height: 50px; background: linear-gradient(135deg, #000155, #0FCDA7); border-radius: 10px;">   

                            <i class="mr-2 mb-1 fa-solid fa-plus"></i>
                            <p class="m-0">Add New Zone or Purok</p>
                            
                        </div>
                    </div>
                    <div class="row mb-3 " style="border: 1px solid rgb(135, 135, 135); border-radius: 10px; height: 60px;">
                        <input type="text" id="zoneName"  class="p-2 pl-4 pr-4 w-100 h-100" style="background-color:rgb(255, 255, 255); border:none; border-radius: 10px;" 
                                placeholder="Type the name here" >
                    </div>
                    <div class="row-2 d-flex justify-content-end font-inter" >      
                        <button type="submit" class="btn px-3 font-weight-bold text-white" style="background-color:#000155; border-radius: 10px;" id="addBtn"> <i class="mr-2 fa-solid fa-plus"></i>Add</button>
                    </div>
                </div> 
                <div class="row-7 p-0 elevation-2" style="background-color:rgb(251, 251, 251); border: 1px solid rgb(194, 194, 194); 
                                       border-radius: 10px; max-height: 450px; overflow: auto;">
                    <table class="table table-striped table-hover" id="officialTable" style="width: 100%;">
                        <thead class="m-0" style="font-size:14px;  background-color:rgb(255, 255, 255); position: sticky; top: 0; z-index: 10;">
                            <tr>
                                <th class="px-2 text-center" style="width: 40%; ">Zone || Purok</th>
                                <th class="px-2 text-center" style="width: 35; ">Number of Resident</th>
                                <th class="px-2 text-center" style="width: 25%; ">Actions</th>
                            </tr>
                        </thead>
                        <tbody  id="zoneTableBody" >
                        </tbody>
                    </table>
                </div>
            </div>
        
            <div class="col-8 p-2">
                <div class="container-fluid p-2 elevation-2" style="border: 1px solid rgb(194, 194, 194); border-radius: 10px; background-color:rgb(255, 255, 255);">
                    <div class="card elevation-0" style="background-color:rgb(255, 255, 255); min-height:650px;">
                        <div class="card-body p-2" style="border: none;">
                            <fieldset>
                                <!-- Enhanced Stats Section -->
                                <div class="p-2 w-100">
                                    <div class="row p-2 mb-4">
                                        <div class="col-4">
                                            <div class="stats-card p-3 text-white d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="m-0 font-weight-bold">Total Residents</h6>
                                                    <small class="opacity-75">Active Records</small>
                                                </div>
                                                <div class="badge-count">
                                                    <span id="resident_value">0</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="stats-card p-3 text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                                                <div>
                                                    <h6 class="m-0 font-weight-bold">Filtered Results</h6>
                                                    <small class="opacity-75">Current View</small>
                                                </div>
                                                <div class="badge-count">
                                                    <span id="filtered_count">0</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="stats-card p-3 text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #ffc107 0%, #ff8c00 100%);">
                                                <div>
                                                    <h6 class="m-0 font-weight-bold">Active Filters</h6>
                                                    <small class="opacity-75">Search Criteria</small>
                                                </div>
                                                <div class="badge-count">
                                                    <span id="active_filters">0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Enhanced Search Form -->
                                    <div class="filter-section">
                                        <h5 class="mb-3 text-dark"><i class="fas fa-filter mr-2"></i>Search & Filter Residents</h5>
                                        <form id="searchForm">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text text-white" style="background: linear-gradient(135deg, #000155, #0FCDA7);">
                                                                <i class="fas fa-user mr-1"></i>Last Name
                                                            </span>
                                                        </div>
                                                        <input type="search" name="last_name" id="last_name" class="form-control search-input" placeholder="Enter last name...">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text text-white" style="background: linear-gradient(135deg, #000155, #0FCDA7);">
                                                                <i class="fas fa-user mr-1"></i>First Name
                                                            </span>
                                                        </div>
                                                        <input type="search" name="first_name" id="first_name" class="form-control search-input" placeholder="Enter first name...">
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text text-white" style="background: linear-gradient(135deg, #000155, #0FCDA7);">
                                                                <i class="fas fa-map-marker-alt mr-1"></i>Zone
                                                            </span>
                                                        </div>
                                                        <select name="zone" id="zone" class="form-control">
                                                            <option value="">All Zones</option>
                                                            <!-- zones will be populated dynamically -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <button type="button" class="btn btn-warning btn-enhanced px-4 mr-2" id="search">
                                                        <i class="fas fa-search mr-2"></i>Search Residents
                                                    </button>
                                                    <button type="button" id="resetBtn" class="btn btn-danger btn-enhanced px-4 mr-2">
                                                        <i class="fas fa-undo mr-2"></i>Reset Filters
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-enhanced px-4" id="exportBtn">
                                                        <i class="fas fa-download mr-2"></i>Print Result
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Enhanced Table Header -->
                                <div class="col p-3 bg-white" style="border-radius: 12px 12px 0 0; border-bottom: 3px solid #000155;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0 text-dark"><i class="fas fa-users mr-2"></i>Resident Directory</h5>
                                        <div class="loading-spinner">
                                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Enhanced Table -->
                                <div class="table-container">
                                    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                        <table class="table table-hover mb-0" id="residentTable">
                                            <thead class="table-header text-white sticky-top">
                                                <tr>
                                                    <th class="px-3 text-center border-0" style="width: 20%;">
                                                        <i class="fas fa-sort mr-1"></i>Last Name
                                                    </th>
                                                    <th class="px-3 text-center border-0" style="width: 20%;">
                                                        <i class="fas fa-sort mr-1"></i>First Name
                                                    </th>
                                                    <th class="px-3 text-center border-0" style="width: 10%;">Initial</th>
                                                    <th class="px-3 text-center border-0" style="width: 15%;">
                                                        <i class="fas fa-venus-mars mr-1"></i>Gender
                                                    </th>
                                                    <th class="px-3 text-center border-0" style="width: 10%;">
                                                        <i class="fas fa-birthday-cake mr-1"></i>Age
                                                    </th>
                                                    <th class="px-3 text-center border-0" style="width: 25%;">
                                                        <i class="fas fa-map-marker-alt mr-1"></i>Zone
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- residents will be displayed here dynamically -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Enhanced No Data Message -->
                                <div id="noDataMessage" class="text-center py-5" style="display: none;">
                                    <div class="mb-3">
                                        <i class="fas fa-search fa-3x text-muted"></i>
                                    </div>
                                    <h5 class="text-muted">No residents found</h5>
                                    <p class="text-muted">Try adjusting your search criteria or check back later.</p>
                                </div>

                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>




        </div>
        <!-- END OF COL -->

    </div>
    <!-- END OF CONTENT WRAPPER -->



</div>
<!-- ./wrapper -->





    <!-- EDIT CERTIFICATE MODAL -->
    <div class="modal fade font-inter" id="editCertificateModal" data-backdrop="static" data-keyboard="false" 
        tabindex="-1" role="dialog" >

        
        <div  class="modal-dialog modal-lg modal-dialog-centered p-3" role="document" >
            <div class="modal-content p-3 bg-white w-75 mx-auto  elevation-2" style="border-radius: 20px;">

                    <div class="row-4 p-3 mb-3">
                        <div class="row-2 mb-3 ">
                            <div class="d-flex align-items-center justify-content-center p-2 w-50 font-inter text-white font-weight-bold" 
                                style="height: 50px; background-color:  #000155; border-radius: 10px;">   

                                <i class="mr-2 nav-icon fa-solid fa-pen-to-square"></i>
                                <p class="m-0">Edit Certificate</p>
                                
                            </div>
                        </div>
                        <div class="row mb-3" style="border: 1px solid rgb(135, 135, 135); border-radius: 10px; height: 60px;">
                            <!-- Hidden input to store ID -->
                            <input type="hidden" id="editZoneId">

                            <!-- Input for new zone name -->
                            <input type="text" id="editZoneName" class="p-2 pl-4 pr-4 w-100 h-100"
                                style="background-color:rgb(255, 255, 255); border:none; border-radius: 10px;" 
                                placeholder="Enter the new name">
                        </div>
                        <div class="row-2 d-flex justify-content-end font-inter" >
                            <button type="button" class="btn px-3 elevation-5 mr-2" style="background-color: #FFF153; border-radius: 20px;" id="closeBtn" data-dismiss="modal"><i class="mr-2 nav-icon fas fa-times"></i> Close</button>
                            <button type="button" class="btn px-3 elevation-5" style="background-color: #81D5C6; border-radius: 20px;" id="saveBtn">
                                <i class="mr-2 nav-icon fa-solid fa-share"></i> Save
                            </button>
                        </div>
                    </div>

            </div>
        </div>

    </div>






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
  document.getElementById('addBtn').addEventListener('click', function () {
    const zoneName = document.getElementById('zoneName').value.trim();

    if (!zoneName) {
        Swal.fire({
            icon: 'warning',
            title: 'Missing Zone Name',
            text: 'Please enter a zone name.',
        });
        return;
    }

    fetch('../backend/admin/add_zone.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ zone_name: zoneName })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Zone Added',
                text: data.message || 'Zone added successfully!',
            });
            document.getElementById('zoneName').value = '';
            loadZones();
        } else {
            // Check if backend returned a duplicate warning
            const errorMsg = data.message || data.error || 'Something went wrong!';
            const isDuplicate = errorMsg.toLowerCase().includes('already exists');

            Swal.fire({
                icon: isDuplicate ? 'warning' : 'error',
                title: isDuplicate ? 'Duplicate Zone' : 'Error',
                text: errorMsg,
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Fetch Error',
            text: 'Unable to connect to the server.',
        });
    });
});
</script>




<!-- Display All Zone -->
<script>
function loadZones() {
    fetch('../backend/admin/get_all_zone.php')
        .then(res => res.json())
        .then(data => {
            const tbody = document.getElementById('zoneTableBody');
            tbody.innerHTML = ''; // Clear previous rows

            data.forEach(zone => {
                const row = `
                    <tr class="bg-white text-center align-middle rounded-row" style="height: 40px;">
                        <td class="text-center align-middle">${zone.zone_name}</td>
                        <td class="text-center align-middle">${zone.num_residents}</td>
                        <td class="text-center align-middle">
                            <button  class="btn btn-sm bg-white editBtn"
                                    data-id="${zone.zone_id}"
                                    data-name="${zone.zone_name}"
                                    data-toggle="modal"
                                    data-target="#editCertificateModal">
                                <i class="nav-icon fa-solid fa-pen-to-square text-success"></i>
                            </button>
                        </td>
                    </tr>
                `;
                tbody.insertAdjacentHTML('beforeend', row);
            });
        })
        .catch(err => {
            console.error('Failed to load zones:', err);
        });
}

// Call this after successful add or on page load
loadZones();

document.addEventListener('click', function(e) {
    if (e.target.closest('.editBtn')) {
        const btn = e.target.closest('.editBtn');
        const zoneId = btn.getAttribute('data-id');
        const zoneName = btn.getAttribute('data-name');

        // Set values in the modal
        document.getElementById('editZoneId').value = zoneId;
        document.getElementById('editZoneName').value = zoneName;
    }
});

</script>






<!-- edit zone -->
<script>
    document.getElementById('saveBtn').addEventListener('click', function() {
        const zoneId = document.getElementById('editZoneId').value;
        const zoneName = document.getElementById('editZoneName').value.trim();

        if (!zoneName) {
            Swal.fire({
                icon: 'warning',
                title: 'Missing Zone Name',
                text: 'Please enter a zone name.',
            });
            return;
        }

        // Send the data via fetch to update the zone name in the database
        fetch('../backend/admin/update_zone.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                zone_id: zoneId,
                zone_name: zoneName
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: data.message || 'Zone updated successfully!',
                });

                // Close modal after successful update
                $('#editCertificateModal').modal('hide');

                // Optionally, update the UI with the new zone name
                const zoneNameDisplay = document.getElementById('zoneNameDisplay');
                if (zoneNameDisplay) {
                    zoneNameDisplay.textContent = zoneName; // Update the UI element
                }
                loadZones();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message || 'Something went wrong.',
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Fetch Failed',
                text: 'Unable to connect to the server.',
            });
        });
    });
</script>





<!-- get all zone name -->
<script>
  // Fetch the zones from the backend
  fetch('../backend/admin/get_all_zone_name.php')
    .then(response => response.json())
    .then(zones => {

      const zoneSelect = document.getElementById('zone');
      zoneSelect.innerHTML = '<option value="">Select Zone</option>'; // default option

      zones.forEach(zone => {
        const option = document.createElement('option');
        option.value = zone.zone_id;
        option.textContent = zone.zone_name;
        zoneSelect.appendChild(option);
      });
    })
    .catch(err => console.error('Error loading zones:', err));
</script>






<!-- get all resident -->
<script>
let allResidents = [];
let filteredResidents = [];

function getMiddleInitial(middleName) {
    return middleName ? middleName.charAt(0).toUpperCase() + '.' : '';
}

function calculateAge(birthDateString) {
    const birthDate = new Date(birthDateString);
    const today = new Date();
    let age = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function showLoading(show = true) {
    const spinner = document.querySelector('.loading-spinner');
    spinner.style.display = show ? 'block' : 'none';
}

function updateStats() {
    document.getElementById('resident_value').textContent = allResidents.length;
    document.getElementById('filtered_count').textContent = filteredResidents.length;
    
    // Count active filters (removed gender)
    const lastName = document.getElementById('last_name').value;
    const firstName = document.getElementById('first_name').value;
    const zone = document.getElementById('zone').value;
    
    let activeFilters = 0;
    if (lastName) activeFilters++;
    if (firstName) activeFilters++;
    if (zone) activeFilters++;
    
    document.getElementById('active_filters').textContent = activeFilters;
}

function renderResidents(residents) {
    const tbody = document.querySelector('#residentTable tbody');
    const noDataMessage = document.getElementById('noDataMessage');
    
    tbody.innerHTML = '';
    
    if (residents.length === 0) {
        noDataMessage.style.display = 'block';
        document.querySelector('.table-container').style.display = 'none';
    } else {
        noDataMessage.style.display = 'none';
        document.querySelector('.table-container').style.display = 'block';
        
        residents.forEach((resident, index) => {
            const tr = document.createElement('tr');
            tr.className = 'text-center align-middle rounded-row bg-white resident-row';
            tr.style.animationDelay = `${index * 0.1}s`;
            
            const middleInitial = getMiddleInitial(resident.res_middle_name);
            const age = resident.res_age || calculateAge(resident.res_date_of_birth);
            
            // Gender icon (kept for display purposes)
            const genderIcon = resident.res_sex === 'Male' 
                ? '<span class="gender-icon male-icon"><i class="fas fa-mars"></i></span>'
                : '<span class="gender-icon female-icon"><i class="fas fa-venus"></i></span>';
            
            tr.innerHTML = `
                <td class="font-weight-semibold">${resident.res_last_name}</td>
                <td class="font-weight-semibold">${resident.res_first_name}</td>
                <td class="text-muted">${middleInitial}</td>
                <td>${genderIcon}${resident.res_sex}</td>
                <td><span class="age-badge">${age}</span></td>
                <td><span class="zone-badge">${resident.zone_name || 'N/A'}</span></td>
            `;
            
            tbody.appendChild(tr);
        });
    }
    
    filteredResidents = residents;
    updateStats();
}

// get all resident
function fetchAllResidents() {
    showLoading(true);

    // Your actual fetch code:
    fetch('../backend/admin/all_resident.php')
        .then(response => response.json())
        .then(data => {
            allResidents = data;
            renderResidents(allResidents);
            showLoading(false);
        })
        .catch(err => {
            console.error('Failed to fetch residents:', err);
            showLoading(false);
        });
    
    
    // Simulate API call delay
    setTimeout(() => {
        renderResidents(allResidents);
        showLoading(false);
    }, 1000);
}

// filtering (removed gender parameter)
function fetchResidents() {
    const lastName = document.getElementById('last_name').value;
    const firstName = document.getElementById('first_name').value;
    const zone = document.getElementById('zone').value;
    
    showLoading(true);
    
    // Your actual fetch code (removed gender from query):
    const query = new URLSearchParams({
        last_name: lastName,
        first_name: firstName,
        zone: zone
    }).toString();

    fetch(`../backend/admin/filter_resident_in_zone.php?${query}`)
        .then(response => response.json())
        .then(data => {
            renderResidents(data);
            showLoading(false);
        })
        .catch(err => {
            console.error('Search failed:', err);
            showLoading(false);
            // Show error message to user
            const tbody = document.querySelector('#residentTable tbody');
            tbody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Error loading data. Please try again.</td></tr>';
        });
}

function clearField(fieldId) {
    document.getElementById(fieldId).value = '';
    fetchResidents();
}

function resetFilters() {
    document.getElementById('searchForm').reset();
    renderResidents(allResidents);
}

// Modified exportData/print function to match the new print_filter_zone.php
function exportData() {
    // Get current filter values
    const lastName = document.getElementById('last_name').value;
    const firstName = document.getElementById('first_name').value;
    const zone = document.getElementById('zone').value;
    
    // Create query string from current filters
    const params = new URLSearchParams();
    if (lastName) params.append('last_name', lastName);
    if (firstName) params.append('first_name', firstName);
    if (zone) params.append('zone', zone);
    
    // Open print page with filters as URL parameters
    const printUrl = `print_filter_zone.php?${params.toString()}`;
    const printWindow = window.open(printUrl, '_blank');
    
    // Focus the window (helps with some browsers' popup blockers)
    if (printWindow) {
        printWindow.focus();
    } else {
        alert('Please allow popups for this site to use the print feature.');
    }
}



// Event listeners (removed gender from search inputs)
document.addEventListener('DOMContentLoaded', () => {
    fetchAllResidents();
    
    // Search input listeners with debounce (removed 'gender' from array)
    let searchTimeout;
    const searchInputs = ['last_name', 'first_name', 'zone'];
    
    searchInputs.forEach(inputId => {
        document.getElementById(inputId).addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(fetchResidents, 300);
        });
    });
    
    // Clear button listeners
    
    // Button listeners
    document.getElementById('search').addEventListener('click', fetchResidents);
    document.getElementById('resetBtn').addEventListener('click', resetFilters);
    document.getElementById('exportBtn').addEventListener('click', exportData);
});
</script>

</body>
</html>
