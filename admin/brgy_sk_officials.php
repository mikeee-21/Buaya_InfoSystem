<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Barangay SK Officials </title>

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

.cards{
  transition: .5s ease-in-out;
}


.cards:hover{
  transform: translateY(-5px);
  transition: .5s ease-in-out;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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
          <a class="nav-link" href="../backend/admin/sign_out.php" role="button">
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




<!-- MAIN CONTENT -->
<div class="content-wrapper p-0 bg-white font-inter">
    <section class="content p-3" >
        <div class="col pt-4 elevation-2" style="max-height: 700px; overflow-y: auto;">
            
            




          <div id="officials-container" class="font-inter"></div>
          <script>
              fetch('../backend/admin/get_brgy_sk_officials.php')
                  .then(res => res.json())
                  .then(data => {
                      if (data.status === 'success') {

                          const officials = data.data;
                          const container = document.getElementById('officials-container');
                          let councilorRow = null;
                          officials.forEach((off, i) => {

                              

                              const mname = off.res_middle_name ? `${off.res_middle_name}.` : "";
                              const fullName = `${off.res_first_name} ${mname} ${off.res_last_name}`;

                              const image    = off.res_image ? `../${off.res_image}`  : '../server_imgs/default_user_img.jpg';

                        

                                const cardHTML = `



                                  <div class="row-item p-3 elevation-1 elevation-2 cards" style="width:49%; height:100%; border-radius:10px;  cursor: pointer;">
                                      <div class="row-12" style="display: flex;">
                                          <div class="mr-2" style="width: 150px; height: 150px; overflow: hidden;">
                                              <img src="${image}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                          </div>
                                          <div class="pl-2" style="width: 360px; height: 150px;">
                                              <div class="first_div" style="font-family:'Inter', sans-serif; font-size: 20px;">

                                                  <p class="m-0 fw-bold">${fullName}</p>

                                                  <p style="font-size: 15px;"> <i class="icon mr-2 fa-solid fa-user-tie"></i>
                                                    ${off.pos_name.toUpperCase()}
                                                  </p>

                                              </div>
                                              <div class="sec_div" style="font-family:'Inter', sans-serif; font-size:15px;">

                                                  <p class="m-0"> <i class="icon mr-2 fa-solid fa-calendar-days"></i> Start Term: <span class="ml-4" style="font-weight: bold;">${off.off_start_term}</span></p>
                                                  <p class="m-0"> <i class="icon mr-2 fa-solid fa-calendar-days"></i> End Term:   <span  class="ml-4" style="font-weight: bold;">${off.off_end_term}</span></p>
                                                  <p class="m-0"> <i class="icon mr-2 fa-solid fa-list-check"></i> Committee: <span class="ml-3" style="font-weight: bold;">${off.off_committee}</span></p>

                                              </div>
                                          </div>
                                      </div>
                                      <div class="row-12 mt-3" style="display: flex;">
                                          <div class="col ml-0" style="font-family:'Inter', sans-serif;">
                                              <p> <i class="icon fa-solid fa-calendar"></i> Date of Birth: <span style="font-weight: bold;">${off.res_date_of_birth}</span></p>
                                              <p> <i class="icon mr-2 fa-solid fa-user-tie"></i> Age: <span style="font-weight: bold;">${calculateAge(off.res_date_of_birth)}</span></p>
                                          </div>
                                          <div class="col" style="font-family:'Inter', sans-serif;">
                                              <p> <i class="icon fa-solid fa-phone"></i> : <span style="font-weight: bold;">${off.res_contact_number}</span></p>
                                              <p> <i class="icon fa-solid fa-envelope"></i> : <span style="font-weight: bold;">${off.res_email_address}</span></p>
                                          </div>
                                      </div>
                                  </div>



                              `;

                              if (off.pos_name === 'Captain') {
                                  const row = document.createElement('div');
                                  row.className = 'row p-2 m-2 d-flex justify-content-center';
                                  row.innerHTML = cardHTML;
                                  container.appendChild(row);
                              } else {
                                  if (!councilorRow || councilorRow.children.length >= 2) {
                                      councilorRow = document.createElement('div');
                                      councilorRow.className = 'row p-2 m-2';
                                      councilorRow.style.display = 'flex';
                                      councilorRow.style.justifyContent = 'space-between';
                                      container.appendChild(councilorRow);
                                  }
                                  const wrapper = document.createElement('div');
                                  wrapper.innerHTML = cardHTML;
                                  councilorRow.appendChild(wrapper.firstElementChild);
                              }
                          });
                      } else {
                          console.error(data.message);
                      }
                  });

              function calculateAge(dob) {
                  const birthDate = new Date(dob);
                  const today = new Date();
                  let age = today.getFullYear() - birthDate.getFullYear();
                  const m = today.getMonth() - birthDate.getMonth();
                  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                      age--;
                  }
                  return age;
              }
          </script>




        </div>
        <!-- EMD OF COL -->
    </section>
    <!-- END OF COTENT -->
</div>
<!-- END OF CONTENT WRAPPER -->




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






</body>
</html>
