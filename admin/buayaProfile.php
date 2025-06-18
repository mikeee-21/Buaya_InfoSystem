<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buaya Profile</title>

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


        

        /* ======================================================================================= */
        /* MAIN CONTENT (CARD-HEADER) */
        .nav-tabs .nav-link.active {
            background-color: #E7F7F4 !important;
            color: #000000 !important;
        }

        /* Inactive tab font color */
        .nav-tabs .nav-link {
            color: white !important;
        }

        .font-color{
            color: #000155;
        }

        .bg1{
            background-color: #000155;
        }

        /* FIXED: Barangay logo styling - perfect circle */
        .barangay-logo {
            width: 250px ;
            height: 250px;
            border-radius: 50% !important;
            object-fit: cover !important;
            border: 4px solid #000155;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .contact-container{
            width: 310px;
            height: 369px;
            border-radius: 30px;
            color:white;
            font-family: 'Inter', sans-serif;
            padding:20px;
            background-color: #000155;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            transition: .5s ease-in-out;
        }

        .contact-container:hover{
            transform:translateY(-5px);
            transition: .5s ease-in-out;
        }

        .contact-container i{
            width: 80px;
            height: 80px;
            background-color: white;

            border-radius: 50%;
            color:#000155;
            font-size: 50px;
            margin-bottom: 10px;

            display: flex;
            justify-content: center;
            align-items: center;
            transition: .5s ease-in-out;
        }

        .contact-container i:hover{
            background-color: #000155;
            color: white;
            transition: .5s ease-in-out;
        }

        .contact-container p{
            font-size: 18px;
            color: white;
            font-family: 'Inter', sans-serif;
        }

        /* FIXED: Information section text color */
        .info-text {
            color: #000155 !important;
            font-weight: 600;
        }

        .info-value {
            background-color: white !important;
            color: #000155 !important;
            border: 1px solid #dee2e6;
        }

        /* Dropdown improvements */
        .dropdown-toggle::after {
            display: none;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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
              <a href="#" class="d-block w-100" id="directoryToggle">
                Directory Management <i class="fas fa-caret-down float-right"></i>
              </a>

                <!-- Submenu -->
              <div id="directorySubmenu" style="display: none;" class="sub mt-2 font-inter">
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

 
      <!-- main content -->
    <div class="content-wrapper ml-0 mr-0 bg-white pt-5">   
        <div class="content">
            <div class="container-fluid">
                
                <div class="row-12 w-100 d-flex justify-content-center " >
                    <img src="" alt="Barangay Logo" class="barangay-logo" style=" width:250px; height: 250px; border-radius:50%" id="barangayLogo">
                </div>

                <div class="row m-5 p-3 d-flex justify-content-between">

                    <div class="col-5 pt-5" 
                        style="height:450px; display:flex; flex-direction: column; align-items:center; padding: 20px; text-align: center;">
                      
                      <h3 class="mt-2 mb-5 font-inter font-weight-bold font-color" style="font-size: 30px; margin-bottom: 20px;">
                        Mission
                      </h3>

                      <p id="mission_value" class="font-inter font-color" style="font-size:18px;">
                        Loading mission statement...
                      </p>

                    </div>

                    <div class="col-1 d-flex justify-content-center"> 
                        <div style="width:1px; height:100%; border:3px solid #000155;"></div>
                    </div>

                    <div class="col-5 pt-5" 
                         style="height:450px; display:flex; flex-direction: column; align-items:center; padding: 20px; text-align: center;">
                        
                        <h3 class="mt-2 mb-5 font-inter font-weight-bold font-color" style="font-size: 30px;">Vision</h3>

                        <p id="vision_value" class="font-inter font-color" style="font-size:18px;">
                            Loading vision statement...
                        </p>

                    </div>
                </div>

                <div class="row mb-5 d-flex justify-content-center align-items-center">

                  <div class="row mt-5 mb-5">
                    <h3 class="ms-5 font-inter font-weight-bold font-color">Contact Us</h3>
                  </div>

                  <div class="row mt-1 p-3 w-100">

                      <div class="col-4 d-flex justify-content-center align-items-center">
                          <div class="contact-container">
                              <i class="fa-solid fa-envelope"></i>
                              <h5 class="mb-5">Email</h5>
                              <p id="email_value">Loading...</p>
                          </div>
                      </div>

                      <div class="col-4 p-5 d-flex justify-content-center align-items-center">
                          <div class="contact-container">
                              <i class="fa-solid fa-clock"></i>
                              <h5 class="mb-5">Opening Hours</h5>
                              <p id="opening_day_value">Loading...</p>
                              <p id="opening_time_value">Loading...</p>
                          </div>
                      </div>
                      
                      <div class="col-4 p-5 d-flex justify-content-center align-items-center">
                          <div class="contact-container">
                              <i class="fa-solid fa-phone-volume"></i>
                              <h5 class="mb-5">Contact</h5>
                              <p id="contact_value">Loading...</p>
                          </div>
                      </div>

                  </div>

                </div>

                <div class="row mt-5 p-5 d-flex flex-column justify-content-center align-items-start">
                  
                    <div class="row ml-5 font-inter font-color">
                      <i class="mr-5 fa-solid fa-location-dot" style="color: #F73535; font-size:30px;"></i>
                      <h3 class="font-weight-bolder" id="location_value">Loading location...</h3>
                    </div>

                    <div class="row p-5 w-100">
                      <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15701.355102485479!2d123.98509522810944!3d10.314749347992304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a997729dab384d%3A0xdad4395d00f92e5e!2sBuaya%2C%20Lapu-Lapu%20City%2C%20Cebu!5e0!3m2!1sen!2sph!4v1744473339966!5m2!1sen!2sph" 
                            width="100%" 
                            height="400" 
                            style="border-radius:10px; border:none;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                      </iframe>
                    </div>
                
                </div>

                <!-- FIXED: Information section with proper text colors -->
                <div class="row mb-5 p-5 mx-auto w-75 align-items-center font-inter text-white bg1" style="border-radius: 30px;">
                    <div class="col text-center">
                      <h3 class="font-weight-bold text-white">Information</h3>
                    </div>

                    <div class="col-12 p-3 d-flex flex-wrap">
                      <div class="col-sm-6 p-2">
                        <p class="p-2 mb-1 text-white font-weight-bold">Full Name</p>
                        <p class="p-3 rounded info-value" id="brgyName">
                          Loading...
                        </p>  
                      </div>

                      <div class="col-sm-6 p-2">
                        <p class="p-2 mb-1 text-white font-weight-bold">Zip Code</p>
                        <p class="p-3 rounded info-value" id="brgyZipCode">
                          Loading...
                        </p>  
                      </div>
                    </div>

                    <div class="col-12 p-3 d-flex flex-wrap">
                      <div class="col-sm-6 p-2">
                        <p class="p-2 mb-1 text-white font-weight-bold">Provincial</p>
                        <p class="p-3 rounded info-value" id="brgyProvince">
                          Loading...
                        </p>  
                      </div>

                      <div class="col-sm-6 p-2">
                        <p class="p-2 mb-1 text-white font-weight-bold">Municipality</p>
                        <p class="p-3 rounded info-value" id="brgyMunicipality">
                          Loading...
                        </p>  
                      </div>
                    </div>

                </div>

            </div>
            <!-- end of container fluid -->
        </div>
        <!-- end of content -->
    </div>
    <!-- end of content-wrapper -->

    
<!-- REQUIRED SCRIPTS -->
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


<!--load the barangay profile  -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    
    // Show loading message
    console.log('Loading barangay data...');
    
    // Fetch data from your PHP script
    fetch('../views/superadmin/get_barangay.php')
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);
            
            if (data.success) {
                // Update the HTML elements with database data
                const barangayData = data.data;
                
                // Mission and Vision
                if (barangayData.bar_mission) {
                    document.getElementById('mission_value').textContent = barangayData.bar_mission;
                }
                
                if (barangayData.bar_vision) {
                    document.getElementById('vision_value').textContent = barangayData.bar_vision;
                }
                
                // Contact Information
                if (barangayData.bar_email) {
                    document.getElementById('email_value').textContent = barangayData.bar_email;
                }
                
                if (barangayData.bar_contact_cellphone) {
                    document.getElementById('contact_value').textContent = barangayData.bar_contact_cellphone;
                }
                
                // Opening Hours
                if (barangayData.bar_available_start_day && barangayData.bar_available_end_day) {
                    document.getElementById('opening_day_value').textContent = 
                        barangayData.bar_available_start_day + ' - ' + barangayData.bar_available_end_day;
                }
                
                if (barangayData.bar_available_start_time && barangayData.bar_available_end_time) {
                    document.getElementById('opening_time_value').textContent = 
                        barangayData.bar_available_start_time + ' - ' + barangayData.bar_available_end_time;
                }
                
                // Location - FIXED: No more hardcoded override
                if (barangayData.bar_name && barangayData.bar_municipality) {
                    document.getElementById('location_value').textContent = 
                        'Barangay ' + barangayData.bar_name + ', ' + barangayData.bar_municipality;
                }
                
                // Information Section
                if (barangayData.bar_name) {
                    document.getElementById('brgyName').textContent = barangayData.bar_name;
                }
                
                if (barangayData.bar_zip_code) {
                    document.getElementById('brgyZipCode').textContent = barangayData.bar_zip_code;
                }
                
                if (barangayData.bar_province) {
                    document.getElementById('brgyProvince').textContent = barangayData.bar_province;
                }
                
                if (barangayData.bar_municipality) {
                    document.getElementById('brgyMunicipality').textContent = barangayData.bar_municipality;
                }
                
                // FIXED: Logo with proper error handling and perfect circle styling
                if (barangayData.bar_logo) {
                    const logoImg = document.getElementById('barangayLogo');
                    if (logoImg) {
                        logoImg.src = `../server_imgs/${barangayData.bar_logo}`;
                    }
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