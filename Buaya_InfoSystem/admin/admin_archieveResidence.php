

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Archieved Residence</title>

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
  font-size: 16px !important;
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
  font-size: 16px !important; 
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



/* ================================================================================================== */
/* MAIN CONTENT */
#total {
  background-color: #FFFFFF;
  border-color: #1F6155;
  color: #000000;

  width: 60px;
  height: 25px;
  padding: 2px 6px;
  font-size: 14px;
  margin-left: 10px;
 

  display: inline-block;
  vertical-align: middle;
}

.input-group-text{
      background: linear-gradient(135deg, #000155, #0FCDA7);
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

     .text-uppercase{
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
    background-color: #F0F8FE;
  }

     
  /* STATUS TOGGLE BUTTON */
/* DEFAULT: ACTIVE */
.toggle-wrapper {
  width: 100px;
  height: 35px;
  background-color: #28a745; /* ✅ GREEN for ACTIVE */
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

.toggle-wrapper .toggle-circle {
  width: 18px;
  height: 18px;
  background-color: white;
  border-radius: 50%;
  transition: transform 0.3s ease;
}

.toggle-wrapper .toggle-text {
  color: white;
  font-weight: 600;
  transition: color 0.3s ease, transform 0.3s ease;
}

/* INACTIVE */
.toggle-wrapper.inactive {
  background-color: #dc3545; /* 🔴 RED for INACTIVE */
  flex-direction: row-reverse;
}

.toggle-wrapper.inactive .toggle-circle {
  background-color: white;
}

.toggle-wrapper.inactive .toggle-text {
  color: white;
}




  

/* ================================================================================= */
/* MODAL STYLE */
.resident-image, .logo-image {
  max-width: 150px;
  width: 100%;
  height: auto;
  object-fit: cover;
}

.resident-text {
    font-size: 11pt; /* change to desired size */
    font-weight: bold;
  }
  .resident-no {
    font-size: 15pt; /* change to desired size */
    font-weight: bold;
  }


@media (max-width: 768px) {
  .resident-image {
    max-width: 100px;
    height: auto;
    margin-right: -10px;
  }
  .logo-image {
    max-width: 100px;
    height: auto;
    margin-left: -10px;
  }
  
  /* FONT */
  .font-inter {
    font-family: 'Inter', sans-serif;
  }

}

</style>



<body class="hold-transition sidebar-mini font-inter">
  




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
  <div class="content-wrapper bg-white">
   

    <!-- Main content -->
    <section class="content mt-3">
      <div class="container-fluid">

    <div class="card" style="background-color:rgb(255, 255, 255)">
      <div class="card-body">
          <fieldset>
                  <legend class="tot_residence mb-4 d-flex align-items-center " >NUMBER OF RESIDENCE 
                    <input type="text" id="total" class="form-control font-inter text-center font-weight-bold fs-3" readonly>
                  </legend>
          
                  <div class="row mb-2 ">
                    <div class="col-sm-4">
                      <div div class="input-group input-group-md mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" >FIRST NAME</span>
                        </div>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div div class="input-group input-group-md mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" >MIDDLE NAME</span>
                        </div>
                        <input type="text" class="form-control" id="middle_name" name="middle_name">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div div class="input-group input-group-md mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" >LAST NAME</span>
                        </div>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div div class="input-group input-group-md mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" >RESIDENT NUMBER</span>
                        </div>
                        <input type="text" class="form-control" id="resident_id" name="resident_id">
                      </div>
                    </div>
                    <div class="col-sm-4 text-center">
                      <button type="button" class="btn btn-warning  elevation-5 px-3 text-white" id="search"><i class="fas fa-search"></i> SEARCH</button>
                      <button type="button" class="btn btn-danger  elevation-5 px-3 text-white" id="reset"><i class="fas fa-undo"></i> RESET</button>
                    </div>
                  </div>
              
            <div class="table-responsive"  style="max-height: 500px; overflow-y: auto;">
              <table class="table table-striped table-hover mt-4 w-100"  id="archiveResidenceTable">
                <thead class="text-uppercase text-white" style="background-color: #000155;">
                  <tr>
                        <th  style="position: sticky; top: 0; background-color: #000155; z-index: 2;" class="text-center">Image</th>
                        <th  style="position: sticky; top: 0; background-color: #000155; z-index: 2;" class="text-center">Resident Number</th>
                        <th  style="position: sticky; top: 0; background-color: #000155; z-index: 2;" class="text-center">Name</th>
                        <th  style="position: sticky; top: 0; background-color: #000155; z-index: 2;" class="text-center">Age</th>
                        <th  style="position: sticky; top: 0; background-color: #000155; z-index: 2;" class="text-center">Pwd</th>
                        <th  style="position: sticky; top: 0; background-color: #000155; z-index: 2;" class="text-center">Single Parent</th>
                        <th  style="position: sticky; top: 0; background-color: #000155; z-index: 2;" class="text-center">Voters</th>
                        <th  style="position: sticky; top: 0; background-color: #000155; z-index: 2;" class="text-center">Status</th>
                        <th  style="position: sticky; top: 0; background-color: #000155; z-index: 2;" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody >
                          <!-- ALL RESIDENT DYNAMICALLY ADDED HERE -->
                </tbody>
              </table>
             </div> <!-- Table responsive end -->
            
          </fieldset>
        </div>
      </div>   


      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 











  

  <!-- Modal -->
  <div class="modal font-inter" id="viewResidenceModal"  role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="position: fixed; top: 45%; left: 50%; transform: translate(-50%, -50%); width: 90vw; max-width: 1200px;" >
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
                 <div>
                   <div style="position:absolute; top:30px; left:40px;">
                     <img src="../server_imgs/logo.jpg" alt="Logo" class="logo-image img-fluid" style="border-radius: 50%;">
                   </div>
 
                   <div style="position:absolute; top:30px; right:40px;">
                     <img alt="Resident" id="edit_profile_image" style="width: 150px; height: 150px; object-fit: cover;" class="resident-image img-fluid ">
                     <input type="file" id="edit_image_input"  accept="image/*" style="display: none;">
                   </div>
 
                   <div class="resident-text">
                           Official record confirming your residency in this barangay.<br>
                           Barangay Buaya District _<br>
                           Lapu-Lapu, Cebu<br>
                           <br><br><br><br>
                   </div>
                   <h4 disabled class="resident-no" id="resident_id" style="font-weight: bold; margin-bottom: 30px">RESIDENT NO. <span ></span></h4>
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
                     <input type="text"  class="editInfo form-control form-control-sm"   id="edit_first_name" name="edit_first_name" size="30" style="background-color: #DBF6F9; border: none;" required> 
                     <input type="hidden" value="false" id="edit_first_name_check"> 
                   </div>
                   <div style="font-weight: bold;">
                     MIDDLE NAME<br>
                     <input type="text"  class="editInfo  form-control form-control-sm "  id="edit_middle_name" name="edit_middle_name" size="20" style="background-color: #DBF6F9; border: none;" > 
                     <input type="hidden" id="edit_middle_name_check" value="false">
                   </div>
                   <div style="font-weight: bold;">      
                     LAST NAME<br>
                     <input type="text"  class="editInfo  form-control form-control-sm"   id="edit_last_name" name="edit_last_name" size="20" style="background-color: #DBF6F9; border: none;" required> 
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
               <select name="edit_voters" id="edit_voters" class="form-control" style="background-color: #DBF6F9; border: none;" required>
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
                 
                 <input type="date" class="editInfo  form-control form-control-sm" name="edit_birth_date" id="edit_birth_date" style="background-color: #DBF6F9; border: none;" required >
                 <input type="hidden" id="edit_birth_date_check" value='false'>
             </td>
             <td style="border: 1px solid black; font-weight: bold;">
               PLACE OF BIRTH
                 <br>
               
               <input type="text" class="editInfo  form-control form-control-sm"   name="edit_birth_place" id="edit_birth_place" style="background-color: #DBF6F9; border: none;" required> 
               <input type="hidden" id="edit_birth_place_check" value="false">
             </td>
             <td style="border: 1px solid black; font-weight: bold;">
               AGE
                 <br>
             
               <input type="text" class="editInfo  form-control form-control-sm"  name="edit_age" id="edit_age" style="background-color: #DBF6F9; border: none;" readonly> 
             </td>
             <td style="border: 1px solid black; font-weight: bold;">
               SINGLE PARENT
                 <br>
                 <select name="edit_single_parent" id="edit_single_parent" class="form-control" style="background-color: #DBF6F9; border: none;" required>
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
                   <option value="true" >YES</option>
                   <option value="false" >NO</option>
               </select>
               <input type="hidden" id="edit_pwd_check" value="false">
           </td>
           <td style="border: 1px solid black; font-weight: bold;">
               TYPE OF PWD
                 <br>
                 <input type="text" class="editInfo  form-control form-control-sm"   name="edit_pwd_info" id="edit_pwd_info" style="background-color: #DBF6F9; border: none;" required> 
                 <input type="hidden" id="edit_pwd_info_check" value="false">
             </td>
             <td style="border: 1px solid black; font-weight: bold;">
               GENDER
               <br>
               <select name="edit_gender" id="edit_gender" class="form-control" style="background-color: #DBF6F9; border: none;" required>
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
               </select>
               <input type="hidden" id="edit_gender_check" value="false">
             </td>
             <td style="border: 1px solid black; font-weight: bold;">
               CIVIL STATUS
               <br>
               <select name="edit_civil_status" id="edit_civil_status" class="form-control" style="background-color: #DBF6F9; border: none;" required>
                 <option value="Single">Single</option>
                 <option value="Married">Married</option>
                 <option value="Widowed">Widowed</option>
                 <option value="Divorced">Divorced</option>
               </select>
               <input type="hidden" id="edit_civil_status_check" value="false">
             </td>
           </tr>
 
           <tr style="text-align: center;">
             <td colspan="2" style="border: 1px solid black; font-weight: bold;">
               RELIGION
               <br>
               <input type="text" class="editInfo  form-control form-control-sm" name="edit_religion" id="edit_religion" style="background-color: #DBF6F9; border: none; text-align: center;" required>
               <input type="hidden" id="edit_religion_check" value="false">
             </td> 
             <td colspan="2" style="border: 1px solid black; font-weight: bold;">
               NATIONALITY
               <br>
                 <input type="text" class="editInfo  form-control form-control-sm" name="edit_nationality" id="edit_nationality" style="background-color: #DBF6F9; border: none; text-align: center;" required>
                 <input type="hidden" id="edit_nationality_check" value="false">
             </td> 
           </tr>
 
           <tr>
             <td style="border: 1px solid black; font-weight: bold;">
               PROVINCE
                 <br>
               <input type="text" class="editInfo  form-control form-control-sm"  name="edit_province" id="edit_province" style="background-color: #DBF6F9; border: none;" readonly>
               <input type="hidden" id="edit_province_check" value="false">
             </td>
 
             <td style="border: 1px solid black; font-weight: bold;">
                 ZIP CODE 
                 <br>
                 <input type="text" class="editInfo  form-control form-control-sm"  name="edit_zip" id="edit_zip" style="background-color: #DBF6F9; border: none;" readonly>
                 <input type="hidden" id="edit_zip_check" value="false">
             </td>
 
             <td style="border: 1px solid black; font-weight: bold;">
               MUNICIPALITY
                 <br>
               <input type="text" class="editInfo  form-control form-control-sm"  name="edit_municipality" id="edit_municipality" style="background-color: #DBF6F9; border: none;" readonly>
               <input type="hidden" id="edit_municipality_check" value="false">
             </td>
 
             <td style="border: 1px solid black; font-weight: bold;">
                 BARANGAY
                 <br>
                 <input type="text" class="editInfo  form-control form-control-sm"  name="edit_barangay" id="edit_barangay" style="background-color: #DBF6F9; border: none;" readonly>
                 <input type="hidden" id="edit_barangay_check" value="false">
             </td>
           </tr>
 
           <tr>
             <td style="border: 1px solid black; font-weight: bold;">
                 ZONE
                   <br>
                   <select name="edit_zone" id="edit_zone" class="form-control" style="background-color: #DBF6F9; border: none;" required>
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
               <input type="text" class="editInfo  form-control form-control-sm" name="edit_address" id="edit_address" style="background-color: #DBF6F9; border: none;" readonly>
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
               <input type="text" maxlength="11" class="editInfo  form-control form-control-sm"  name="edit_contact_number" id="edit_contact_number" style="background-color: #DBF6F9; border: none; text-align: center;" required>
               <input type="hidden" id="edit_contact_number_check" value="false">
             </td>         
           </tr>
 
           <tr>
             <td style="border: 1px solid black; font-weight: bold;">
               FATHER'S NAME
               <br>
               <input type="text" class="editInfo  form-control form-control-sm"  name="edit_fathers_name" id="edit_fathers_name" style="background-color: #DBF6F9; border: none;" required>
               <input type="hidden" id="edit_fathers_name_check" value="false">
             </td>
             <td style="border: 1px solid black; font-weight: bold;">
               MOTHER'S NAME
               <br>
               <input type="text" class="editInfo  form-control form-control-sm"  name="edit_mothers_name" id="edit_mothers_name" style="background-color: #DBF6F9; border: none;" required>
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
                      <button type="button" id="closeModal" class="btn btn-secondary btn-flat elevation-5" data-dismiss="modal" style="background-color: #DE0909; border-radius: 20px; border-color: #DE0909; ">
                        <i class="fas fa-times"></i> CLOSE
                      </button>
                  </div>

                

              </form>
            </div>
          </div>
        </div>





  
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- AdminLTE -->
<script src="../assets/dist/js/adminlte.js"></script>






<!-- DISPLAY ALL RESIDENCE AND FILTERING -->
<script>
// Utility functions - defined once
function calculateAge(dob) {
  const birthDate = new Date(dob);
  const diff = Date.now() - birthDate.getTime();
  const age = new Date(diff).getUTCFullYear() - 1970;
  return isNaN(age) ? '' : age;
}

function capitalize(str) {
  if (!str) return '';
  return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
}



// Populate the modal with resident data
function populateResidentModal(data) {
  //full address
  const fullAddress = `${data.res_barangay}, ${data.res_municipality}, ${data.res_province}`; 

  document.querySelector('#resident_id span').textContent = data.res_id;
  document.getElementById('edit_first_name').value        = data.res_first_name;
  document.getElementById('edit_middle_name').value       = data.res_middle_name || 'N/A';
  document.getElementById('edit_last_name').value         = data.res_last_name;
  document.getElementById('edit_suffix').value            = data.res_suffix || 'N/A';
  document.getElementById('edit_voters').value            = data.res_voter_status;
  document.getElementById('edit_birth_date').value        = data.res_date_of_birth;
  document.getElementById('edit_birth_place').value       = data.res_place_of_birth;
  document.getElementById('edit_age').value               = calculateAge(data.res_date_of_birth);
  document.getElementById('edit_single_parent').value     = data.res_single_parent_status;
  document.getElementById('edit_pwd').value               = data.res_pwd_status;
  document.getElementById('edit_pwd_info').value          = data.res_pwd_type || 'N/A';
  document.getElementById('edit_gender').value            = data.res_sex;
  document.getElementById('edit_civil_status').value      = data.res_civil_status;
  document.getElementById('edit_religion').value          = data.res_religion;
  document.getElementById('edit_nationality').value       = data.res_nationality;
  document.getElementById('edit_house_number').value      = data.res_house_number || 'N/A';
  document.getElementById('edit_street').value            = data.res_street || 'N/A';
  document.getElementById('edit_address').value           = fullAddress;

  document.getElementById('edit_barangay').value          = data.res_barangay;
  document.getElementById('edit_municipality').value      = data.res_municipality;
  document.getElementById('edit_province').value          = data.res_province;
  document.getElementById('edit_zip').value               = data.res_zip_code;

  document.getElementById('edit_email_address').value     = data.res_email_address || 'N/A';
  document.getElementById('edit_contact_number').value    = data.res_contact_number;
  document.getElementById('edit_profile_image').src       = data.res_image;

  document.getElementById('edit_fathers_name').value      = data.res_father_name;
  document.getElementById('edit_mothers_name').value      = data.res_mother_name;
  document.getElementById('edit_guardian').value          = data.res_guardian_name || 'N/A';
  document.getElementById('edit_guardian_contact').value  = data.res_guardian_contact || 'N/A'

  // Set image preview
  const imgEl = document.querySelector('#edit_profile_image'); // Match the ID from your HTML
  if (imgEl) {
      imgEl.src = `../${data.res_image || '../server_imgs/default_user_img.jpg'}`; // Ensure path is correct
  }


  // Find the option that has the text matching the zone name
  const zoneSelect = document.getElementById('edit_zone');
  if (zoneSelect && data.res_zone_name) {
    for (let option of zoneSelect.options) {
      if (option.textContent.trim() === data.res_zone_name.trim()) {
        zoneSelect.value = option.value;
        break;
      }
    }
  }
}



// Main function to load all residents
function loadAllResidents() {
  fetch('../views/admin/get_all_archived_resident.php')
    .then(response => response.json())
    .then(data => {
      const tbody = document.querySelector("#archiveResidenceTable tbody");
      tbody.innerHTML = ""; // Clear previously fetched residents


      if (document.getElementById('total')) {
        document.getElementById('total').value = data.length;
      }


      if (data.length === 0) {
          tableBody.innerHTML = '<tr><td colspan="10">No matching residents found.</td></tr>';
        } else {
          data.forEach(res => {
            const tr = createResidentRow(res);
            tbody.appendChild(tr);
          });

    };


    });
}




// Form state management
function setFormEditable(isEditable) {
  const fields = document.querySelectorAll('#editResidenceForm input, #editResidenceForm select, #editResidenceForm textarea');
  fields.forEach(field => {
    field.disabled = !isEditable;
  });
}






// Define this outside!
function createResidentRow(res) {
  const tr = document.createElement("tr");
  tr.classList.add("text-center");

  tr.innerHTML = `
    <td class="text-start align-middle rounded-row">
      <img src="../${res.res_image}" alt="Official Image"
        class="img-fluid rounded-circle"
        style="width: 50px; height: 50px; object-fit: cover;">
    </td>

    <td class="text-start align-middle">${res.res_id}</td>
    <td class="text-start align-middle">${res.res_first_name} ${res.res_last_name}</td>
    <td class="text-start align-middle">${calculateAge(res.res_date_of_birth)}</td>
    <td class="text-start align-middle">${res.res_pwd_type || ''}</td>
    <td class="text-start align-middle">
      <span class="badge-${res.res_single_parent_status === 'YES' ? 'yes' : 'no'}">${res.res_single_parent_status}</span>
    </td>
    <td class="text-start align-middle">
      <span class="badge-${res.res_voter_status === 'YES' ? 'yes' : 'no'}">${res.res_voter_status}</span>
    </td>
    <td class="text-start align-middle">
      <div class="ml-5 toggle-wrapper ${res.res_status === 'Inactive' ? 'inactive' : ''}" 
          data-id="${res.res_id}" disabled>
        <div class="toggle-circle"></div>
        <span class="toggle-text">${capitalize(res.res_status)}</span>
      </div>
    </td>
    <td class="text-center align-middle">
      <button class="btn btn-sm editBtn" data-toggle="modal" data-target="#viewResidenceModal">
        <i class="fa-solid fa-eye text-success"></i>
      </button>
      <button class="btn btn-sm rmvBtn" data-id="${res.res_id}">
        <i class="fa-solid fa-rotate-left text-danger"></i>
      </button>
    </td>
  `;

  // Add click listener for edit
  tr.querySelector('.editBtn').addEventListener('click', () => {
    populateResidentModal(res);
    setFormEditable(false);  // Lock the fields when modal opens
  });


  // delete button listener
  tr.querySelector('.rmvBtn').addEventListener('click', (e) => {
  const resId = e.currentTarget.getAttribute('data-id');

  Swal.fire({
    title: 'Are you sure?',
    text: "Do you want to unarchive this resident?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, unarchive it!'
  }).then((result) => {
    if (result.isConfirmed) {
      archiveResident(resId, tr); // <- make sure 'tr' is in scope
      loadAllResidents();
    }
  });
});


  return tr;
}





//archive resident
function archiveResident(resId, rowElement) {
  fetch('../views/admin/unarchived_resident.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ res_id: resId })
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'success') {
      Swal.fire({
        icon: 'success',
        title: 'Archived!',
        text: 'Resident unarchived successfully.',
        timer: 1500,
        showConfirmButton: false
      });
      rowElement.remove(); // remove the row from the table
      loadAllResidents();
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Failed!',
        text: data.message
      });
    }
  })
  .catch(err => {
    console.error('Error:', err);
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'An unexpected error occurred.'
    });
  });
}











// Document ready - attach event listeners
document.addEventListener('DOMContentLoaded', function() {
  // Initial load
  loadAllResidents();
  
  // Edit button event listeners
  document.getElementById('editBtn')?.addEventListener('click', () => {
    toggleEditActions(true);
    setFormEditable(true);
    document.getElementById('editBtn').disabled = true;
  });
  
  // Cancel button event listener
  document.getElementById('cancelEditForm')?.addEventListener('click', () => {
    setFormEditable(false);
    toggleEditActions(false);
    document.getElementById('editBtn').disabled = false;
  });
  
  // Close button event listener
  document.getElementById('closeModal')?.addEventListener('click', () => {
    setFormEditable(false);
    document.getElementById('editBtn').disabled = false;
  });
});
</script>









<!-- Additional script for search/back buttons -->
<script>
$(document).ready(function () {
    // SEARCH button triggers filter
    $('#search').on('click', function () {
        window.filterResidents();
    });

    // BACK button clears filters and re-runs
    $('#back').on('click', function () {
        // Clear inputs and selects inside the form
        $('input[type="search"], input[type="text"], input[type="number"], select').val('');
        window.filterResidents();
    });
});
</script>

<script>
const searchInputs = ['#first_name', '#middle_name', '#last_name', '#resident_id'];

searchInputs.forEach(selector => {
  document.querySelector(selector).addEventListener('input', searchResidents);
});

function searchResidents() {
  const firstName = document.querySelector('#first_name').value.trim();
  const middleName = document.querySelector('#middle_name').value.trim();
  const lastName = document.querySelector('#last_name').value.trim();
  const residentId = document.querySelector('#resident_id').value.trim();

  fetch('../views/admin/filter_unarchived_resident.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      first_name: firstName,
      middle_name: middleName,
      last_name: lastName,
      resident_id: residentId
    })
  })
  .then(res => res.json())
  .then(data => {
    const tbody = document.querySelector('#archiveResidenceTable tbody');
    tbody.innerHTML = '';

    if (document.getElementById('total')) {
      document.getElementById('total').value = data.length;
    }

    if (data.length === 0) {
      tbody.innerHTML = '<tr><td colspan="10">No matching residents found.</td></tr>';
    } else {
      data.forEach(res => {
        const tr = createResidentRow(res);
        tbody.appendChild(tr);
      });
    }
  })
  .catch(err => console.error('Live search failed:', err));
}



// reset
document.querySelector('#reset').addEventListener('click', () => {
  document.querySelector('#first_name').value = '';
  document.querySelector('#middle_name').value = '';
  document.querySelector('#last_name').value = '';
  document.querySelector('#resident_id').value = '';
  
  // Reload all residents
  loadAllResidents();
});




</script>




<script>
  // Fetch the zones from the views
  fetch('../views/admin/get_all_zone_name.php')
    .then(response => response.json())
    .then(zones => {
        // Get the select element
        const zoneSelect = document.getElementById('edit_zone');

        // Clear existing options (if any)
        zoneSelect.innerHTML = '';

        // Add an empty default option (optional)
        const defaultOption = document.createElement('option');
        defaultOption.textContent = 'Select Zone';
        defaultOption.value = '';
        zoneSelect.appendChild(defaultOption);

        // Populate the select with options from the database
        zones.forEach(zone => {
            const option = document.createElement('option');
            option.value = zone.zone_id; 
            option.textContent = zone.zone_name; 
            zoneSelect.appendChild(option);
        });

        // Set the selected zone based on resident data
        zoneSelect.value = data.res_zone_name; 
    })
    .catch(error => console.error('Error fetching zones:', error));
</script>





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
