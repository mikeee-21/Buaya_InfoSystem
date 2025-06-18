<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Position</title>

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




/* Center the header text */
#positionTable th {
        text-align: center;
        vertical-align: middle; /* Ensures the text is vertically centered */
    }

    /* Optional: Style table cells for better alignment */
    #positionTable td, #positionTable th {
        padding: 10px;
        border-radius: 10px;
    }

    /* Optional: Style the table for a more attractive look */
    #positionTable {
        width: 100%;
    }

    /* Optional: Add hover effect for rows */
    #positionTable tr:hover {
        background-color: #f1f1f1;
    }

    /* Center content in the body of the table */
    #positionTable td {
        text-align: center;
    }

    /* Center the table itself in the container */
    #positionTable {
        margin: 0 auto;
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




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white font-inter " >


<!-- Main content -->
<section class="content bg-white pt-3">
    <div class="container-fluid bg-white p-2">
        <div class="card p-2 elevation-2" style="border-radius: 12px; border: none; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);">
            <div class="card-header" style="background: white; border-bottom: 1px solid rgba(0, 0, 0, 0.08);">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h3 class="m-0 mr-3" style="color: #000155; font-family: 'Inter', sans-serif; font-weight: 600;">
                        <i class="fas fa-user-tie mr-2"></i>Position Management
                    </h3>
                    <button type="button" class="btn px-4 py-2 text-white" style="background:linear-gradient(135deg, #000155, #0FCDA7); border-radius:8px; box-shadow: 0 2px 6px rgba(0, 1, 85, 0.3); transition: all 0.3s;" 
                            id="buttonPosition" data-toggle="modal" data-target="#newModalPosition"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 8px rgba(0, 1, 85, 0.4)'"
                            onmouseout="this.style.transform=''; this.style.boxShadow='0 2px 6px rgba(0, 1, 85, 0.3)'">
                            <i class="fas fa-plus mr-2"></i> ADD POSITION
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
                            <div class="input-group-prepend" style="background: linear-gradient(135deg, #000155, #0FCDA7);">
                                <span class="input-group-text text-white border-0" style="font-weight: 500; background: linear-gradient(135deg, #000155, #0FCDA7);">
                                    <i class="fas fa-search mr-2"></i>SEARCH
                                </span>
                            </div>
                            <input type="text" class="form-control border-0" id="searching" autocomplete="off" 
                                   placeholder="Search positions..." style="height: 45px;">
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-secondary" style="border-radius: 8px 0 0 8px;">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                            <button type="button" class="btn btn-outline-secondary" style="border-radius: 0 8px 8px 0;">
                                <i class="fas fa-sort"></i> Sort
                            </button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="positionTable" style="border-radius: 8px; overflow: hidden;">
                        <thead style="background: linear-gradient(135deg, #000155, #0FCDA7); color: white;">
                            <tr>
                                <th style="padding: 15px; font-weight: 500;">POSITION</th>
                                <th style="padding: 15px; font-weight: 500;">LIMIT</th>
                                <th style="padding: 15px; font-weight: 500;">DESCRIPTION</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #f9f9f9;">
                            <!-- Data will be populated here -->
                        </tbody>
                    </table>
                    <div id="noResults" class="text-center py-5" style="display: none;">
                        <i class="fas fa-search fa-3x mb-3" style="color: #ddd;"></i>
                        <h4 style="color: #666;">No positions found</h4>
                        <p class="text-muted">Try adjusting your search or filter</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted" style="background: white; border-top: 1px solid rgba(0, 0, 0, 0.08);">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-sm">
                        Showing <span id="showingCount">0</span> of <span id="totalCount">0</span> positions
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm m-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div><!--/. container-fluid -->
</section>
<!-- /.content -->



</div>
<!-- /.content-wrapper -->



<!-- Modal -->
<div class="modal fade font-inter" id="newModalPosition" data-backdrop="static" data-keybaord="false" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="newPositionForm" method="post">  
          <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Position</label>
                          <!-- <input type="text" name="add_position"  id="add_position" class="form-control text-uppercase"> -->
                          <select name="position_opt" id="position_opt" class="form-control text-uppercase" required>
                            <option value=""></option>
                            <option value="captain"> Captain</option>
                            <option value="councilor">Councilor</option>
                            <option value="sk chairman">SK Chairman</option>
                            <option value="sk councilor">SK Councilor</option>
                            <option value="secretary">Secretary</option>
                            <option value="treasurer">reasurer</option>

                          </select>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Limit</label>
                          <input type="number" min="1" max="7" name="limit" id="limit" class="form-control"  required>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Description</label>
                          <textarea class="form-control" name="add_description" id="add_description" rows="3"></textarea>
                      </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn px-3 elevation-5 text-white" style="background-color:rgb(62, 157, 25); border-radius: 20px;" id="closeModalBtn" data-dismiss="modal"><i class="fas fa-times"></i> CLOSE</button>
              <button type="submit" class="btn px-3 elevation-5 text-white" style="background-color: #000155; border-radius: 20px;" id="saveModalBtn"> <i class="fas fa-share-square"></i> SAVE</button>
          </div>
      </form>   
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








<!-- get user input -->
<script>
    document.getElementById('newPositionForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const position = document.getElementById('position_opt').value;
    const limit = document.getElementById('limit').value;
    const description = document.getElementById('add_description').value;

    if (!position || !limit) {
        Swal.fire({
            icon: 'warning',
            title: 'Missing Fields',
            text: 'Position and limit are required.',
        });
        return;
    }

    fetch('../views/admin/add_position.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            position: position,
            limit: limit,
            description: description
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: data.message,
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                document.getElementById('newPositionForm').reset();
                $('#newModalPosition').modal('hide');
                // Optional: reload table or UI
                fetchPositions();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message,
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Unexpected Error',
            text: 'Something went wrong. Please try again.',
        });
    });
});

</script>


<!-- display all position -->
<!-- Enhanced JavaScript -->
<script>
    // Fetch and display positions with enhanced UI
    function fetchPositions() {
        fetch('../views/admin/get_all_position.php')
            .then(response => response.json())
            .then(data => {
                const table = document.getElementById('positionTable');
                const tbody = table.getElementsByTagName('tbody')[0] || table.createTBody();
                const noResults = document.getElementById('noResults');
                
                tbody.innerHTML = '';
                document.getElementById('totalCount').textContent = data.length;
                
                if (data.length === 0) {
                    noResults.style.display = 'block';
                    document.getElementById('showingCount').textContent = '0';
                    return;
                } else {
                    noResults.style.display = 'none';
                }
                
                let visibleCount = 0;
                
                data.forEach(position => {
                    const row = tbody.insertRow();
                    row.style.transition = 'all 0.3s';
                    row.style.cursor = 'pointer';
                    row.onmouseover = () => row.style.backgroundColor = '#f0f0f0';
                    row.onmouseout = () => row.style.backgroundColor = '';
                    
                    // Position cell
                    const cellPosition = row.insertCell(0);
                    cellPosition.style.padding = '12px 15px';
                    cellPosition.style.fontWeight = '500';
                    cellPosition.style.color = '#333';
                    cellPosition.textContent = position.pos_name.charAt(0).toUpperCase() + position.pos_name.slice(1);
                    
                    // Limit cell
                    const cellLimit = row.insertCell(1);
                    cellLimit.style.padding = '12px 15px';
                    cellLimit.innerHTML = `<span class="badge badge-pill" style="background-color: #0FCDA7; color: white; font-weight: 500;">${position.pos_limit}</span>`;
                    
                    // Description cell
                    const cellDescription = row.insertCell(2);
                    cellDescription.style.padding = '12px 15px';
                    cellDescription.style.color = '#666';
                    cellDescription.textContent = position.pos_description || 'No description available';
                    
                    visibleCount++;
                });
                
                document.getElementById('showingCount').textContent = visibleCount;
            })
            .catch(error => {
                console.error('Error fetching positions:', error);
                document.getElementById('noResults').innerHTML = `
                    <i class="fas fa-exclamation-triangle fa-3x mb-3" style="color: #ffc107;"></i>
                    <h4 style="color: #666;">Error loading positions</h4>
                    <p class="text-muted">Please try again later</p>
                `;
                document.getElementById('noResults').style.display = 'block';
            });
    }

    // Enhanced search functionality
    document.getElementById('searching').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#positionTable tbody tr');
        let visibleCount = 0;
        
        rows.forEach(row => {
            const position = row.cells[0]?.textContent.toLowerCase();
            const limit = row.cells[1]?.textContent.toLowerCase();
            const description = row.cells[2]?.textContent.toLowerCase();
            const isVisible = position.includes(searchTerm) || 
                            limit.includes(searchTerm) || 
                            description.includes(searchTerm);
            
            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });
        
        document.getElementById('showingCount').textContent = visibleCount;
        document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
    });

    // Call the function when the page loads
    document.addEventListener('DOMContentLoaded', fetchPositions);
</script>



</body>
</html>
