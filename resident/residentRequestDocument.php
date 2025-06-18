<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Request Document</title>

  
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
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

</head>
<!--
body tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->



<!-- ADDED STYLE -->
<style>

html, body {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
        }

        .wrapper {
            min-height: calc(100vh - 200px);
        }

        /* Main Navbar Container */
        .navbar-universal {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: none;
            box-shadow: 0 2px 20px rgba(46, 140, 124, 0.1);
            padding: 5px 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Navbar when scrolled */
        .navbar-universal.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 30px rgba(46, 140, 124, 0.15);
            padding: 10px 0;
        }

        /* Navigation Links Container */
        .navbar-nav-universal {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            width: 100%;
            gap: 10px;
            padding: 0 10px;
            list-style: none; /* Remove default list styling */
            margin: 0; /* Remove default margin */
        }

        /* Individual Nav Items */
        .nav-item-universal {
            position: relative;
            list-style: none; /* Remove dots from list items */
        }

        /* Nav Link Styling */
        .nav-link-universal {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            color:  #000155 !important;
            font-size: 20px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            background: rgba(46, 140, 124, 0.05);
            border: 2px solid transparent;
            overflow: hidden;
        }

        /* Hover Effects */
        .nav-link-universal:hover {
            color: white !important;
            background: linear-gradient(135deg, #000155 0%,rgb(24, 97, 244) 100%);
            border-color:rgb(6, 9, 191);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(6, 9, 191);
        }

        /* Ripple Effect */
        .nav-link-universal::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(15, 205, 167, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.4s ease;
            z-index: -1;
        }

        .nav-link-universal:hover::before {
            width: 80px;
            height: 80px;
        }

        /* Active State */
        .nav-link-universal.active {
            background: linear-gradient(135deg, #000155 0%, #2E8C7C 100%);
            color: white !important;
            box-shadow: 0 5px 15px rgba(0, 1, 85, 0.3);
        }

        /* Logo Styling */
        .logo-universal {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            border: 3px solid rgba(46, 140, 124, 0.2);
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-left: 15px;
            object-fit: cover;
        }

        .logo-universal:hover {
            transform: rotate(360deg) scale(1.1);
            border-color:  #000155;
            box-shadow: 0 8px 25px rgba(15, 205, 167, 0.4);
        }

        /* Enhanced Dropdown Menu */
        .dropdown-menu-universal {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(46, 140, 124, 0.2);
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            margin-top: 15px;
            padding: 10px;
            min-width: 280px;
            animation: dropdownSlideIn 0.3s ease-out;
            list-style: none; /* Remove dots from dropdown items */
        }

        @keyframes dropdownSlideIn {
            0% {
                opacity: 0;
                transform: translateY(-10px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Dropdown Items */
        .dropdown-item-universal {
            color: #333 !important;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 10px;
            margin: 3px 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .dropdown-item-universal i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            color: #000155;
            transition: all 0.3s ease;
        }

        .dropdown-item-universal:hover {
            background: linear-gradient(135deg, rgba(15, 205, 167, 0.1) 0%, rgba(46, 140, 124, 0.1) 100%);
            color:  #000155 !important;
            transform: translateX(8px);
            box-shadow: 0 3px 10px rgba(15, 205, 167, 0.2);
        }

        .dropdown-item-universal:hover i {
            color:  #000155;
            transform: scale(1.1);
        }

        /* Dropdown Toggle */
        .dropdown-toggle-universal::after {
            display: none;
        }

        /* Tooltip for nav items */
        .nav-tooltip {
            position: absolute;
            bottom: -35px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
            z-index: 1001;
        }

        .nav-tooltip::before {
            content: '';
            position: absolute;
            top: -5px;
            left: 50%;
            transform: translateX(-50%);
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid rgba(0, 0, 0, 0.8);
        }

        .nav-item-universal:hover .nav-tooltip {
            opacity: 1;
            bottom: -40px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-nav-universal {
                gap: 5px;
                padding: 0 10px;
            }

            .nav-link-universal {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }

            .logo-universal {
                width: 45px;
                height: 45px;
                margin-left: 10px;
            }

            .dropdown-menu-universal {
                min-width: 250px;
                margin-right: 10px;
            }

            .nav-tooltip {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .navbar-nav-universal {
                gap: 3px;
                padding: 0 5px;
            }

            .nav-link-universal {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .logo-universal {
                width: 40px;
                height: 40px;
            }
        }

    




/* FONT */
.font-inter {
  font-family: 'Inter', sans-serif;
}


/* GLOVAL BACKGROUND */
.border-none{
  border: none;
}





/* ========================================================================================= */
/* MAIN CONTENT STYLE */
body {
    background-color: #EFF9F8; /* light mint background */
}

.form-container {
    background: white;
    border-radius: 8px;
    padding: 20px;
    max-height: 650px; /* control height */
   
    overflow-y: auto; /* scroll inside only if necessary */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

.form-header {
    background-color:  #000155;
    color: white;
    padding: 25px 25px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    margin: -20px -20px 20px -20px;
    font-weight: bold;
    font-size: 25px;
}

/* Hide scrollbar if not needed */
.form-container::-webkit-scrollbar {
    width: 5px;
}

.form-container::-webkit-scrollbar-thumb {
    background-color:rgb(0, 2, 149);
    border-radius: 15px;
    border: 1px solid white;
}

.bg{
  background-color: white;
}
</style>



<body class="hold-transition sidebar-mini bg">
  <div class="wrapper">
 <!-- Universal Navbar Component -->
    <nav class="navbar-universal" id="mainNavbar">
        <div class="container-fluid">
            <ul class="navbar-nav-universal">
                <!-- HOME -->
                <li class="nav-item-universal">
                    <a href="homepage.php" class="nav-link-universal" data-page="home">
                        <i class="fas fa-house"></i>
                    </a>
                    <div class="nav-tooltip">Home</div>
                </li>

                <!-- ABOUT US / PROFILE -->
                <li class="nav-item-universal">
                    <a href="admin_profile.php" class="nav-link-universal" data-page="profile">
                        <i class="fas fa-address-card"></i>
                    </a>
                    <div class="nav-tooltip">Profile</div>
                </li>

                <!-- CONTACT -->
                <li class="nav-item-universal">
                    <a href="admin_profile.php" class="nav-link-universal" data-page="contact">
                        <i class="fas fa-phone"></i>
                    </a>
                    <div class="nav-tooltip">Contact</div>
                </li>

                <!-- MENU DROPDOWN -->
                <li class="nav-item-universal dropdown">
                    <a class="nav-link-universal dropdown-toggle-universal" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </a>
                    <div class="nav-tooltip">Menu</div>
                    
                    <ul class="dropdown-menu dropdown-menu-universal dropdown-menu-end" aria-labelledby="settingsDropdown">
                        <li>
                            <a class="dropdown-item-universal" href="admin_profile.php">
                                <i class="fas fa-building"></i>
                                Barangay Buaya Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item-universal" href="announcement_resident.php">
                                <i class="fas fa-bullhorn"></i>
                                Announcements
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item-universal" href="residentViewOfficials.php">
                                <i class="fas fa-users"></i>
                                Officials
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item-universal" href="residentRequestDocument.php">
                                <i class="fas fa-file-alt"></i>
                                Request Document
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item-universal" href="calendar.php">
                                <i class="fas fa-calendar"></i>
                                Event Calendar
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- LOGO -->
                <li class="nav-item-universal">
                    <img src="img/logo.jpg" alt="Barangay Logo" class="logo-universal">
                </li>
            </ul>
        </div>
    </nav>







      <!-- MAIN CONTENT -->
      <div class="container form-wrapper font-inter bg mt-3" style="margin-bottom: 100px; margin-top: -55px;">
          <div class="form-container mx-auto">
              <div class="form-header">Request Form</div>

              <form id="requestForm" enctype="multipart/form-data">
                  <div class="row mb-3">
                      <div class="col-md-6">
                          <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="lastName" name="last_name" required>
                      </div>
                      <div class="col-md-6">
                          <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="firstName" name="first_name" required>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <div class="col-md-6">
                          <label for="middleName" class="form-label">M.I</label>
                          <input type="text" maxlength="1" class="form-control" id="middleName" name="middle_name">
                      </div>
                      <div class="col-md-6">
                          <label for="suffix" class="form-label">Suffix</label>
                          <input type="text" class="form-control" id="suffix" name="suffix">
                      </div>
                  </div>

                  <div class="row mb-3">
                      <div class="col-md-6">
                          <label for="contactNumber" class="form-label">Contact Number <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="contactNumber" name="contact" pattern="[0-9]{11}" maxlength="11" required>
                          <small class="form-text text-muted">Format: 09XXXXXXXXX</small>
                      </div>
                      <div class="col-md-6">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email">
                      </div>
                  </div>

                  <div class="row mb-3">
                      <div class="col-md-6">
                          <label for="dateOfBirth" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                          <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth" required>
                      </div>
                      <div class="col-md-6">
                          <label for="placeOfBirth" class="form-label">Place of Birth</label>
                          <input type="text" class="form-control" id="placeOfBirth" name="place_of_birth">
                      </div>
                  </div>

                  <div class="row mb-3">
                      <div class="col-md-6">
                          <label for="yearsResident" class="form-label">No. of Years as a Buaya Resident</label>
                          <input type="number" class="form-control" id="yearsResident" name="years_resident" min="0">
                      </div>
                      <div class="col-md-6">
                          <label for="civilStatus" class="form-label">Civil Status</label>
                          <select class="form-control" name="civil_status" id="civilStatus">
                              <option value="">Select Civil Status</option>
                              <option value="single">Single</option>
                              <option value="married">Married</option>
                              <option value="widowed">Widowed</option>
                              <option value="divorced">Divorced</option>
                          </select>
                      </div>
                  </div>

                  <div class="mb-3">
                      <label for="documentRequest" class="form-label">Document to be Requested <span class="text-danger">*</span></label>
                      <select class="form-select" id="documentRequest" name="certificate_type" required>
                          <option value="">Select a document</option>
                          <!-- Options will be loaded dynamically -->
                      </select>
                  </div>

                  <div class="mb-3">
                      <label for="purpose" class="form-label">Purpose <span class="text-danger">*</span></label>
                      <textarea class="form-control" id="purpose" name="purpose" rows="3" required></textarea>
                  </div>

                  <!-- Resident Status Alert -->
                  <div id="residentAlert" class="alert" style="display: none;"></div>

                  <div class="d-flex justify-content-end mt-4">
                      <button type="reset" class="btn btn-warning me-2">Cancel</button>
                      <button type="button" class="btn btn-success" id="requestBtn">
                          <span id="btnText">Submit Request</span>
                          <span id="btnLoader" class="spinner-border spinner-border-sm" style="display: none;"></span>
                      </button>
                  </div>
              </form>
          </div>
      </div>


    </div>
    <!-- end of wrapper -->






    <!-- REQUEST MODAL -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="height: 250px; border-radius: 20px;">
                <div class="modal-body text-center mt-5">
                    <h5 style="font-size: 30px; color: #1F6155; font-weight:bold;">Request Successfully!</h5>
                </div>
                <div class="modal-footer justify-content-center mb-5">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" style="border-radius: 15px;">OK</button>
                </div>
            </div>
        </div>
    </div>







    <!-- footer -->
    <footer class="p-2 pt-5 bg">
        
        <div class="row  p-1 pt-3" style="  background-color:rgb(238, 238, 238);">
            
            <div class="col-3 text-center mb-2" style=" height: 150px; ">
            <img src="img/logo.jpg" alt="" style=" height: 100%; object-fit:cover; border-radius: 50%; box-shadow: 0 5px 10px #808080;">
            </div>

            <div class="col-3  pl-2" >
                <div class="row mb-2">
                <a href="#" class="nav-link  font-inter " role="button" style="color:black;">
                    <i class="nav-icon1 fa-solid fa-location-dot mr-3"></i>
                    <span id="location" class="mr-4"> </span>
                </a>
                </div>
                <div class="row mb-2">
                <a href="#" class="nav-link  font-inter" role="button" style="color:black;">
                    <i class="nav-icon1 fa-solid fa-phone-volume mr-2"></i>
                    <span >Contact: <span id="contact"></span> </span>
                </a>
                </div>
                <div class="row mb-2">
                <a href="#" class="nav-link  font-inter" role="button" style="color:black;">
                    <i class="nav-icon1 fa-solid fa-clock mr-2"></i> Open:
                    <span id="available"></span>
                </a>
                </div>
                <div class="row mb-2">
                <a href="../admin/admin_login2.php" class="nav-link font-inter" style="color:black;"  role="button">
                        <i class="nav-icon1 fa-solid fa-user-tie mr-2"></i>
                        <span  id="app_name_value" class="ml-1 ">Buaya InfoSystem </span>
                    </a>
                </div>
            </div>

            <div class="col-3 text-center">
                <h5 class=" pr-3 font-inter">Navigations</h5>
                <div class="row mt-4 pl-5 pr-5">

                  <div class="row w-100 mb-3">
                    <div class="col">  <a href="homepage.php"> <i class="nav-icon1 fa-solid fa-house"></i></a> </div>
                    <div class="col">  <a href="admin_profile.php"> <i class="nav-icon1 fa-solid fa-address-card"></i> </a></div>
                    <div class="col">  <a href="admin_profile.php"> <i class="nav-icon1 fa-solid fa-phone"></i></a></div>
                    <div class="col">  <a href="announcement_resident.php"> <i class="nav-icon1 fa-solid fa-bullhorn"></i></a> </div>
                  </div>

                  <div class="row w-100">
                    <div class="col">  <a href="residentViewOfficials.php"> <i class="nav-icon1 fa-solid fa-users"></i></a> </div>
                    <div class="col">  <a href="residentRequestDocument.php"> <i class="nav-icon1 fa-solid fa-file"></i></a> </div>
                    <div class="col"> <a href="calendar.php"> <i class="nav-icon1 fa-solid fa-calendar-days"></i></a> </div>
                  </div>

                </div>
            </div>

            <div class="col-3 font-inter">
                <h3 class="mb-4 font-inter " >Help us improve the <br> design system</h3>
                <a href="#" style=" padding:10px; border: 1px solid rgb(0, 0, 0); text-decoration: none; color: black;">Send us a message</a>
            </div>
        </div>

        <div class="row  p-1 font-inter text-white justify-content-center align-items-center" 
            style="background-color: #000155; display: flex; text-align: center;">
            <p class="mb-0">© 2025 Buaya Info System. <br> All rights reserved.</p>
        </div>

    </footer>













    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
                      
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
  let residentId = null;
    $(document).ready(function() {
        
        
        // Load certificates dynamically
        loadCertificates();
        
        // Check resident when name and DOB are filled
        $('#firstName, #lastName, #dateOfBirth').on('blur', function() {
            checkResident();
        });
        
        // Submit form
        $('#requestBtn').click(function() {
            submitRequest();
        });
        
        // Reset form
        $('button[type="reset"]').click(function() {
            $('#residentAlert').hide();
            residentId = null;
        });
    });

    function loadCertificates() {
        $.ajax({
            url: '../backend/resident/request_document.php', // Adjust path as needed
            type: 'GET',
            data: { action: 'get_certificates' },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    let options = '<option value="">Select a document</option>';
                    response.data.forEach(cert => {
                        options += `<option value="${cert.cer_type_id}">${cert.cer_type_name}</option>`;
                    });
                    $('#documentRequest').html(options);
                } else {
                    console.error('Failed to load certificates:', response.message);
                    showAlert('error', 'Failed to load available documents');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                showAlert('error', 'Error loading available documents');
            }
        }); 
    }

    function checkResident() {
        const firstName = $('#firstName').val();
        const lastName = $('#lastName').val();
        const dateOfBirth = $('#dateOfBirth').val();
        
        if (firstName && lastName && dateOfBirth) {
            $.ajax({
                url: '../backend/resident/request_document.php', // Adjust path as needed
                type: 'POST',
                data: {
                    action: 'check_resident',
                    first_name: firstName,
                    last_name: lastName,
                    date_of_birth: dateOfBirth
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        if (response.resident_exists) {
                            residentId = response.res_id;
                            showAlert('success', 'Great! You are a registered resident of the barangay.');
                        } else {
                            residentId = null;
                            showAlert('warning', 'You are not found in our resident database. Your request will still be processed, but verification may take longer.');
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error checking resident:', error);
                }
            });
        }
    }

    function submitRequest() {
        // Validate required fields
        if (!validateForm()) {
            return;
        }
        
        // Show loading
        $('#btnText').text('Submitting...');
        $('#btnLoader').show();
        $('#requestBtn').prop('disabled', true);
        
        // Prepare form data
        const formData = new FormData();
        formData.append('action', 'submit_request');
        formData.append('first_name', $('#firstName').val());
        formData.append('last_name', $('#lastName').val());
        formData.append('middle_name', $('#middleName').val());
        formData.append('suffix', $('#suffix').val());
        formData.append('contact', $('#contactNumber').val());
        formData.append('email', $('#email').val());
        formData.append('date_of_birth', $('#dateOfBirth').val());
        formData.append('place_of_birth', $('#placeOfBirth').val());
        formData.append('years_resident', $('#yearsResident').val());
        formData.append('civil_status', $('#civilStatus').val());
        formData.append('certificate_type', $('#documentRequest').val());
        formData.append('certificate_type_name', $('#documentRequest option:selected').text()); // Add the certificate name
        formData.append('purpose', $('#purpose').val());
        formData.append('res_id', residentId);

        $.ajax({
            url: '../backend/resident/request_document.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    showAlert('success', response.message);
                    $('#requestForm')[0].reset();
                    $('#residentAlert').hide();
                    residentId = null;
                    
                    // Get the selected certificate type name
                    const certificateType = $('#documentRequest option:selected').text().toLowerCase();
                    
                    // Define requirements for each certificate type
                    const requirements = {
                        'barangay clearance': [
                            'Valid ID',
                            'Cedula',
                            'Payment'
                        ],
                        'barangay certificate': [
                            'Valid ID',
                            'Cedula',
                            'Payment'
                        ],
                        'cedula': [
                            'Valid ID',
                            'Payment'
                        ],
                        'certificate of indigency': [
                            'Valid ID',
                            'Payment',
                            'Prepare for short interview'
                        ],
                        'certificate of residency': [
                            'Valid ID',
                            'Cedula',
                            'Payment'
                        ]
                    };
                    
                    // Get requirements for the selected certificate or use default
                    let requiredDocs = requirements[certificateType] || [
                        'Valid ID',
                        'Payment'
                    ];
                    
                    // Alternative if no valid ID
                    const noValidIdAlternative = 'If no valid ID is available, please bring a parent/guardian with their valid ID and proof of relationship.';
                    
                    // Format requirements as HTML list
                    const requirementsHtml = requiredDocs.map(req => `<li>${req}</li>`).join('');
                    
                    // Show SweetAlert with requirements
                    Swal.fire({
                        title: 'Request Submitted!',
                        html: `Your request has been submitted successfully!<br><br>
                            <strong>Request ID:</strong> ${response.request_id} <br><br>
                            <strong>Requirements to bring:</strong>
                            <ul>${requirementsHtml}</ul>
                            <small>${noValidIdAlternative}</small><br><br>
                            <strong>Visit the Barangay during weekdays to claim your requested document.</strong> 
                            <strong>Thank You.</strong>`,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6',
                    });
                } else {
                    showAlert('error', response.message);
                    Swal.fire({
                        title: 'Error',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33',
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                showAlert('error', 'An error occurred while submitting your request. Please try again.');
                Swal.fire({
                    title: 'Error',
                    text: 'An error occurred while submitting your request. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#d33',
                });
            },
            complete: function() {
                // Hide loading
                $('#btnText').text('Submit Request');
                $('#btnLoader').hide();
                $('#requestBtn').prop('disabled', false);
            }
        });
    }

    function validateForm() {
        const requiredFields = ['firstName', 'lastName', 'contactNumber', 'dateOfBirth', 'documentRequest', 'purpose'];
        let isValid = true;
        
        requiredFields.forEach(fieldId => {
            const field = $(`#${fieldId}`);
            if (!field.val()) {
                field.addClass('is-invalid');
                isValid = false;
            } else {
                field.removeClass('is-invalid');
            }
        });
        
        // Validate contact number format
        const contact = $('#contactNumber').val();
        if (contact && !/^09\d{9}$/.test(contact)) {
            $('#contactNumber').addClass('is-invalid');
            showAlert('error', 'Contact number must be in format: 09XXXXXXXXX');
            isValid = false;
        }
        
        if (!isValid) {
            showAlert('error', 'Please fill in all required fields correctly.');
        }
        
        return isValid;
    }

    function showAlert(type, message) {
        const alertTypes = {
            'success': 'alert-success',
            'error': 'alert-danger',
            'warning': 'alert-warning',
            'info': 'alert-info'
        };
        
        $('#residentAlert')
            .removeClass('alert-success alert-danger alert-warning alert-info')
            .addClass(alertTypes[type])
            .html(message)
            .show();
        
        // Auto hide after 5 seconds for success messages
        if (type === 'success') {
            setTimeout(() => {
                $('#residentAlert').fadeOut();
            }, 5000);
        }
    }
</script>




<script>
    document.addEventListener('DOMContentLoaded', function() {

    // Show loading message
    console.log('Loading barangay data...');

    // Fetch data from your PHP script
    fetch('../backend/resident/get_barangay.php')
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);
            
            if (data.success) {
                // Update the HTML elements with database data
                const barangayData = data.data;
                
                
                if (barangayData.bar_available_start_time && barangayData.bar_available_end_time) {
                    document.getElementById('available').textContent = 
                        barangayData.bar_available_start_time + ' - ' + barangayData.bar_available_end_time;
                } 

                // Location - FIXED: No more hardcoded override
                if (barangayData.bar_name && barangayData.bar_municipality) {
                    document.getElementById('location').textContent = 
                        'Barangay ' + barangayData.bar_name + ', ' + barangayData.bar_municipality;
                }

                    if (barangayData.bar_contact_cellphone) {
                    document.getElementById('contact').textContent = barangayData.bar_contact_cellphone;
                }
                

                
                console.log('Data loaded successfully!');
                
            } else {
                console.error('Error:', data.message);
                // Show user-friendly error message
                Swal.fire({
                    icon: 'error',
                    title: 'Error Loading Data',
                    text: 'Failed to load barangay information. Please refresh the page.',
                    confirmButtonColor: '#000155'
                });
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            // Show user-friendly error message
            Swal.fire({
                icon: 'error',
                title: 'Connection Error',
                text: 'Unable to connect to the server. Please check your internet connection and try again.',
                confirmButtonColor: '#000155'
            });
        });
    });
</script>






</body>
</html>