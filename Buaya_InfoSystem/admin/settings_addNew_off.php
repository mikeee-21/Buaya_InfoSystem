<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add New Officials</title>

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


.autocomplete-box {
    position: absolute;
    background: #fff;
    border: 1px solid #ccc;
    z-index: 10;
    width: 98.5%;
    max-height: 200px;
    overflow-y: auto;
}
.autocomplete-item {
    padding: 8px;
    cursor: pointer;
}
.autocomplete-item:hover {
    background-color: #f0f0f0;
}


</style>



<body class="hold-transition sidebar-mini">
  
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white" style="border: none; box-shadow: none;">




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
            <span style="color:black; ">Admin</span>
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










  <!-- MAIN CONTENT -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white ml-5 mr-5 mt-3">
    <!-- Main content -->
    <section class="container-fluid ">

            <form id="editOfficialForm" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="row mb-1">
                    <div class="col-sm-4 " style="height:680px; max-height: 680px; overflow-y: auto;">
                        <div class="card card-outline" style="background-color:rgb(255, 255, 255);">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-thumbnail" src="img/default_user_img.jpg" alt="User profile picture" 
                                         style="width: 150px; height: 150px; border-radius: 50%; border: 2px solid #000155;" id="image_official">
                                </div>

                                <h3 class="profile-username text-center font-inter"><span id="keyup_first_name">First Name</span> <span id="keyup_last_name">Last Name</span></h3>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group font-inter">
                                            <label>Position</label>
                                            <select name="add_position" id="add_position" class="form-control text-uppercase" required>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group font-inter">
                                            <label>Assigned Committee</label>
                                            <input type="text" name="add_committee" id="add_committee" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group font-inter">
                                            <label>Short Description:</label>
                                            <textarea name="add_description" id="add_description" class="form-control rounded" style="height: 150px;" required></textarea>
                                        </div>
                                    </div>





                                    <div class="col-sm-6">
                                        <div class="form-group font-inter">
                                            <label >Start</label>
                                            <input type="date" class="form-control" id="add_term_from" name="add_term_from" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group font-inter">
                                            <label >End</label>
                                            <input type="date" class="form-control" id="add_term_to" name="add_term_to" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">

                                        <div class="form-group font-inter">
                                            <label>Voters</label>
                                            <select name="add_voters" id="add_voters" class="form-control" disabled>
                                                <option value=""></option>
                                                <option value="false">NO</option>
                                                <option value="true">YES</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group font-inter">
                                            <label >Date of Birth</label>
                                            <input type="date" class="form-control" id="add_birth_date" name="add_birth_date" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group ">
                                            <label >Place of Birth</label>
                                            <input type="text" class="form-control" id="add_birth_place" name="add_birth_place" disabled>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label >PWD</label>
                                            <select name="add_pwd" id="add_pwd" class="form-control" disabled>
                                                <option value=""></option>
                                                <option value="false">NO</option>
                                                <option value="true">YES</option>
                                            </select>
                                        </div>
                                    </div>
                                   


                                    <div class="col-sm-12">
                                        <div class="form-group font-inter">
                                            <label >Single Parent</label>
                                            <select name="add_single_parent" id="add_single_parent" class="form-control" disabled>
                                                <option value=""></option>
                                                <option value="false">NO</option>
                                                <option value="true">YES</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>














                    <div class="col-sm-8" style=" height: 680px; max-height: 680px; overflow-y: auto;" >
                        <div class="card  card-tabs" style="background-color:rgb(255, 255, 255);">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active font-inter" id="basic-info-tab" data-toggle="pill" href="#basic-info" role="tab" aria-controls="basic-info" aria-selected="true">Resident</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font-inter" id="other-info-tab" data-toggle="pill" href="#other-info" role="tab" aria-controls="other-info" aria-selected="false">Other Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font-inter" id="guardian-tab" data-toggle="pill" href="#guardian" role="tab" aria-controls="guardian" aria-selected="false">Guardian</a>
                                    </li>
                                </ul>
                            </div>








                            <div class="card-body font-inter">
                                <div class="tab-content font-inter"  id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade active show" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
                                        <p class="lead text-center font-inter">Resident Details</p>
                                            <div class="row">

                                                <div class="col-sm-12">
                                                    <div class="form-group ">
                                                        <label>Search from Resident </label>
                                                        <input type="text" class="form-control" id="resident" name="resident" placeholder="Search by full name (first name last Name)">
                                                        <div id="autocomplete-list" class="autocomplete-box"></div>
                                                        <button type="button" class="btn btn-warning mt-3 mb-4 elevation-2  px-3 text-white" id="search"><i class="fas fa-search"></i> SEARCH</button>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <label>First Name </label>
                                                        <input type="text" class="form-control" id="add_first_name" name="add_first_name"  disabled>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Middle Name </label>
                                                        <input type="text" class="form-control" id="add_middle_name" name="add_middle_name" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <label>Last Name </label>
                                                        <input type="text" class="form-control" id="add_last_name" name="add_last_name" disabled>
                                                    </div>  
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <label >Suffix </label>
                                                        <input type="text" class="form-control" id="add_suffix" name="add_suffix" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                        
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <label >Gender</label>
                                                        <select name="add_gender" id="add_gender" class="form-control" disabled>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <label >Civil Status</label>
                                                        <select name="add_civil_status" id="add_civil_status" class="form-control" disabled>
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
                                                        <input type="text" class="form-control" id="add_religion" name="add_religion" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <label >Nationality</label>
                                                        <input type="text" class="form-control" id="add_nationality" name="add_nationality" disabled>
                                                    </div>
                                                </div>                              
                                            </div>
                                        </div>








                                        <div class="tab-pane fade" id="other-info" role="tabpanel" aria-labelledby="other-info-tab">
                                            <p class="lead text-center">Address</p>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Municipality</label>
                                                        <input type="text" class="form-control" id="add_municipality" name="add_municipality" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Zip</label>
                                                        <input type="text" class="form-control" id="add_zip" name="add_zip"  disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Barangay</label>
                                                        <input type="text" class="form-control" id="add_barangay" name="add_barangay"  disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>House Number</label>
                                                        <input type="text" class="form-control" id="add_house_number" name="add_house_number" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Street</label>
                                                        <input type="text" class="form-control" id="add_street" name="add_street" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Full Address</label>
                                                        <input type="text" class="form-control" id="add_address" name="add_address" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input type="text" class="form-control" id="add_email_address" name="add_email_address" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label >Contact Number</label>
                                                        <input type="text" class="form-control" maxlength="11" id="add_contact_number" name="add_contact_number" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>








                                        <div class="tab-pane fade" id="guardian" role="tabpanel" aria-labelledby="guardian-tab">
                                    
                                            <p class="lead text-center">Guardian</p>
                                            <div class="row">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Father's Name</label>
                                                    <input type="text" class="form-control" id="add_fathers_name" name="add_fathers_name" disabled>
                                                </div>



                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Mother's Name</label>
                                                    <input type="text" class="form-control" id="add_mothers_name" name="add_mothers_name" disabled>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Guardian</label>
                                                    <input type="text" class="form-control" id="add_guardian" name="add_guardian" disabled >
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Guardian Contact</label>
                                                    <input type="text" class="form-control" id="add_guardian_contact" name="add_guardian_contact"disabled >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end" style="background-color:rgb(255, 255, 255);">
                                    <input type="hidden" name="resident_id" id="resident_id">
                                    <button type="submit" id="addNewBtn" class="btn text-dark elevation-3" style="background-color: #FFF153;">
                                        <i class="fas fa-share-square"></i> Add Official
                                    </button>
                                </div>


                            </div>

                           
                        <!-- /.card -->
                        </div>
                    </div>
                </div>
            </form>
    </section>
    <!-- /.container -->
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



<script>
    // When the image is clicked, trigger the file input click event
    document.getElementById("image_official").addEventListener("click", function() {
        document.getElementById("add_image").click();
    });
</script>





<script>


document.addEventListener('DOMContentLoaded', () => {
    loadPositions();
    setupResidentAutocomplete();
});


// get all position
function loadPositions() {
    fetch('../views/admin/get_all_position2.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const select = document.getElementById('add_position');
                data.data.forEach(pos => {
                    const option = document.createElement('option');
                    option.value = pos.pos_id;
                    option.textContent = pos.pos_name.toUpperCase();
                    select.appendChild(option);
                });
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(err => {
            console.error('Fetch error:', err);
        });
}




// search resident
function searchResident() {
    const residentName = document.getElementById('resident').value.trim();

    if (residentName === "") {
        alert("Please enter a name to search.");
        return;
    }

    fetch('../views/admin/search_resident.php', {

        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name: residentName })

    })
    .then(response => response.json())
    .then(data => {

        if (data.status === 'success' && data.resident) {

            fillResidentData(data.resident);
            Swal.fire({

                icon: 'success',
                title: 'Resident Found!',
                text: 'The resident data has been loaded.'

            });
        } else {
            Swal.fire({

                icon: 'error',
                title: 'No Resident Found!',
                text: 'The resident you are searching for does not exist.'

            });
        }
    })
    .catch(err => {

        console.error('Error:', err);
        Swal.fire({

            icon: 'error',
            title: 'Error',
            text: 'An unexpected error occurred while fetching data.'

        });
    });
}




// fetch resident
function fetchResidentDetails(id) {

    fetch('../views/admin/search_resident.php', {

        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: id })

    })

    .then(response => response.json())
    .then(data => {

        if (data.status === 'success' && data.resident) {

            fillResidentData(data.resident);
            Swal.fire({

                icon: 'success',
                title: 'Resident Found!',
                text: 'The resident data has been loaded.'

            });
            
        } else {

            Swal.fire({

                icon: 'error',
                title: 'No Resident Found!',
                text: 'The resident you are searching for does not exist.'

            });
        }
    })

    .catch(err => {

        console.error('Error:', err);
        Swal.fire({

            icon: 'error',
            title: 'Error',
            text: 'An unexpected error occurred while fetching data.'

        });
    });
}




// fill all the field for resident
function fillResidentData(res) {

    const fullAddress = `${res.bar_barangay}, ${res.bar_municipality}, ${res.bar_province}`; 
    const imgEl = document.querySelector('#image_official'); 
    if (imgEl) {

        imgEl.src = res.res_image ? `../${res.res_image}`  : '../server_imgs/default_user_img.jpg';

    }

    document.getElementById('resident_id').value            = res.res_id;
    document.getElementById('add_voters').value             = res.res_voter_status;
    document.getElementById('add_pwd').value                = res.res_pwd_status;
    document.getElementById('add_birth_date').value         = res.res_date_of_birth;
    document.getElementById('add_birth_place').value        = res.res_place_of_birth;
    document.getElementById('add_single_parent').value      = res.res_single_parent_status;

    document.getElementById('add_first_name').value         = res.res_first_name;
    document.getElementById('add_middle_name').value        = res.res_middle_name           || null;
    document.getElementById('add_last_name').value          = res.res_last_name;

    // // keyup
    document.getElementById('keyup_first_name').textContent = res.res_first_name;
    document.getElementById('keyup_last_name').textContent  = res.res_last_name;


    document.getElementById('add_suffix').value             = res.res_suffix                || null;
    document.getElementById('add_gender').value             = res.res_sex;
    document.getElementById('add_civil_status').value       = res.res_civil_status;
    document.getElementById('add_religion').value           = res.res_religion;
    document.getElementById('add_nationality').value        = res.res_nationality;

    document.getElementById('add_municipality').value       = res.bar_municipality;
    document.getElementById('add_zip').value                = res.bar_zip_code;
    document.getElementById('add_barangay').value           = res.bar_barangay;
    document.getElementById('add_house_number').value       = res.bar_house_number          || null;
    document.getElementById('add_street').value             = res.res_street                || null;
    document.getElementById('add_address').value            = fullAddress;

    document.getElementById('add_email_address').value      = res.res_email_address         || null;
    document.getElementById('add_contact_number').value     = res.res_contact_number;

    document.getElementById('add_fathers_name').value       = res.res_father_name;
    document.getElementById('add_mothers_name').value       = res.res_mother_name;
    document.getElementById('add_guardian').value           = res.res_gaurdian_name         || null;
    document.getElementById('add_guardian_contact').value   = res.res_guardian_contact      || null;

}



// search autocomplete
function setupResidentAutocomplete() {

    const inputField = document.getElementById('resident');
    const suggestionBox = document.getElementById('autocomplete-list');

    inputField.addEventListener('input', function () {
        const query = this.value.trim();

        if (query.length < 2) {

            suggestionBox.innerHTML = '';
            return;
        }

        fetch('../views/admin/search_suggestion.php', {

            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ query: query })

        })
        .then(response => response.json())
        .then(data => {
            
            suggestionBox.innerHTML = '';

            // if (data.status === 'success' && data.results.length > 0) {
            //     data.results.forEach(resident => {
            //         const option = document.createElement('div');
            //         option.classList.add('autocomplete-item');
            //         option.textContent = `${resident.first_name} ${resident.last_name}`;
            //         option.addEventListener('click', () => {

            //             inputField.value = option.textContent;
            //             suggestionBox.innerHTML = '';
            //             fetchResidentDetails(resident.id);
                    
            //         });

            //         suggestionBox.appendChild(option);
                    
            //     });
            // }


            if (data.status === 'success') {

                    const matches = data.results.filter(resident => {
                    const fullName = `${resident.first_name} ${resident.last_name}`.toLowerCase();
                    return fullName.includes(inputField.value.toLowerCase());
                
                });

                suggestionBox.innerHTML = ''; // Clear previous suggestions

                if (matches.length > 0) {

                    matches.forEach(resident => {
                        
                        const option = document.createElement('div');
                        option.classList.add('autocomplete-item');
                        option.textContent = `${resident.first_name} ${resident.last_name}`;

                        option.addEventListener('click', () => {

                            inputField.value = option.textContent;
                            suggestionBox.innerHTML = '';
                            fetchResidentDetails(resident.id);

                        });

                        suggestionBox.appendChild(option);

                    });

                } else {

                    const noResult = document.createElement('div');
                    noResult.classList.add('autocomplete-item', 'no-result');
                    noResult.textContent = 'No matching resident found';
                    suggestionBox.appendChild(noResult);
                }
            }



        })
        .catch(err => {
            console.error('Error fetching suggestions:', err);
        });
    });
}
 </script>



<script>
document.getElementById('editOfficialForm').addEventListener('submit', function (e) {
    e.preventDefault();

            // Get the value of the "Assigned Committee" input
            let committee = document.getElementById('add_committee').value;
            // Capitalize first letter of each word and trim extra spaces
            committee = committee.replace(/\b\w/g, char => char.toUpperCase()).trim();

    const formData = {

        resident_id:        document.getElementById('resident_id').value,
        position:           document.getElementById('add_position').value,
        term_from:          document.getElementById('add_term_from').value,
        term_to:            document.getElementById('add_term_to').value,
        committee:          committee, 
        description:        document.getElementById('add_description').value

    };

    fetch('../views/admin/add_official.php', {

        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)

    })
    .then(res => res.json())
    .then(data => {

        if (data.status === 'success') {

            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: data.message,
                confirmButtonColor: '#3085d6'
                
            });
               // location.reload();
        } else {

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message,
                confirmButtonColor: '#d33'
            });

        }
    })
    .catch(err => {

        console.error('Error saving official:', err);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong while saving!',
            confirmButtonColor: '#d33'
            
        });
    });
});

</script>

<!-- controling the possible date selected for end term -->
<script>
    // Set min date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById("add_term_to").setAttribute("min", today);
</script>

</body>
</html>
