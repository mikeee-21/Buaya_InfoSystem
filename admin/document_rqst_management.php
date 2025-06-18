<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document Management</title>

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

<!-- SweetAlert2 JS (Include only once) -->
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
  color:rgb(0, 34, 144);
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



/* adding certificate part */
 /* Enhanced animations and styles */
    .enhanced-row {
        animation: slideInUp 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-bottom: 1px solid #f1f3f4;
        position: relative;
    }

    @keyframes slideInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .certificate-icon-wrapper {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #e3f2fd, #bbdefb);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .certificate-icon {
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .enhanced-row:hover .certificate-icon-wrapper {
        background: linear-gradient(135deg, #2196f3, #1976d2);
        transform: rotate(5deg) scale(1.1);
    }

    .enhanced-row:hover .certificate-icon {
        color: white !important;
    }

    .certificate-title {
        font-size: 1rem;
        color: #2c3e50;
        margin-bottom: 2px;
    }

    .certificate-subtitle {
        font-size: 0.75rem;
        color: #7f8c8d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .request-count-badge {
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        min-width: 60px;
        justify-content: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .badge-zero {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        color: #6c757d;
    }

    .badge-low {
        background: linear-gradient(135deg, #fff3cd, #ffeaa7);
        color: #856404;
        border-color: #ffeaa7;
    }

    .badge-medium {
        background: linear-gradient(135deg, #cce5ff, #99d6ff);
        color: #0066cc;
        border-color: #99d6ff;
    }

    .badge-high {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        border-color: #c3e6cb;
    }

    .badge-very-high {
        background: linear-gradient(135deg, #f8d7da, #f1c2c6);
        color: #721c24;
        border-color: #f1c2c6;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .enhanced-action-group {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .enhanced-action-btn {
        border: none;
        padding: 10px 14px;
        border-radius: 10px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        min-width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .enhanced-action-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.5s ease;
    }

    .enhanced-action-btn:hover::before {
        left: 100%;
    }

    .edit-action-btn {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
        box-shadow: 0 4px 15px rgba(21, 87, 36, 0.2);
    }

    .edit-action-btn:hover {
        background: linear-gradient(135deg, #c3e6cb, #b8dcc8);
        transform: translateY(-3px) rotate(3deg);
        box-shadow: 0 8px 25px rgba(21, 87, 36, 0.3);
    }

    .delete-action-btn {
        background: linear-gradient(135deg, #f8d7da, #f1c2c6);
        color: #721c24;
        box-shadow: 0 4px 15px rgba(114, 28, 36, 0.2);
    }

    .delete-action-btn:hover {
        background: linear-gradient(135deg, #f1c2c6, #ecb7bc);
        transform: translateY(-3px) rotate(-3deg);
        box-shadow: 0 8px 25px rgba(114, 28, 36, 0.3);
    }

    .modern-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #007bff;
        border-radius: 50%;
        animation: modernSpin 1s linear infinite;
    }

    @keyframes modernSpin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .pulse-btn {
        animation: gentlePulse 2s infinite;
    }

    @keyframes gentlePulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.02); }
        100% { transform: scale(1); }
    }

    .loading-container, .empty-state-container, .error-state-container {
        animation: fadeInScale 0.5s ease-out;
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* SweetAlert2 enhancements */
    .swal2-popup.animated {
        animation-duration: 0.5s;
        animation-fill-mode: both;
    }

    .swal2-popup.animated.fadeInDown {
        animation-name: fadeInDown;
    }

    .swal2-popup.animated.fadeInUp {
        animation-name: fadeInUp;
    }

    .swal2-popup.animated.bounceIn {
        animation-name: bounceIn;
    }

    .swal2-popup.animated.shake {
        animation-name: shake;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translate3d(0, -100%, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 100%, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes bounceIn {
        from, 20%, 40%, 60%, 80%, to {
            animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
        }
        0% {
            opacity: 0;
            transform: scale3d(.3, .3, .3);
        }
        20% {
            transform: scale3d(1.1, 1.1, 1.1);
        }
        40% {
            transform: scale3d(.9, .9, .9);
        }
        60% {
            opacity: 1;
            transform: scale3d(1.03, 1.03, 1.03);
        }
        80% {
            transform: scale3d(.97, .97, .97);
        }
        to {
            opacity: 1;
            transform: scale3d(1, 1, 1);
        }
    }

    @keyframes shake {
        from, to {
            transform: translate3d(0, 0, 0);
        }
        10%, 30%, 50%, 70%, 90% {
            transform: translate3d(-10px, 0, 0);
        }
        20%, 40%, 60%, 80% {
            transform: translate3d(10px, 0, 0);
        }
    }

    .btn-hover-effect {
        transition: all 0.3s ease;
    }

    .btn-hover-effect:hover {
        transform: translateY(-2px);
    }



/* table design */
.main-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            border: none;
            overflow: hidden;
        }

        .stats-container {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            padding: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            transition: width 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .stat-card:hover::before {
            width: 8px;
        }

        .stat-card.approved::before {
            background: var(--approved-green);
        }

        .stat-card.pending::before {
            background: var(--pending-yellow);
        }

        .stat-card.rejected::before {
            background: var(--rejected-red);
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 1.2rem;
            margin-left: auto;
        }

        .stat-card.approved .stat-icon {
            background: linear-gradient(135deg, var(--approved-green), #059669);
        }

        .stat-card.pending .stat-icon {
            background: linear-gradient(135deg, var(--pending-yellow), #d97706);
        }

        .stat-card.rejected .stat-icon {
            background: linear-gradient(135deg, var(--rejected-red), #dc2626);
        }

        .search-filter-section {
            padding: 1.5rem;
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }

        .search-input-container {
            position: relative;
        }

        .search-input {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 45px 12px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .search-input:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(0, 1, 85, 0.1);
            background: white;
            outline: none;
        }

        .search-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            transition: color 0.3s ease;
        }

        .search-input:focus + .search-icon {
            color: var(--primary-blue);
        }

        .filter-select {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 15px;
            background: #f8fafc;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .filter-select:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(0, 1, 85, 0.1);
            background: white;
            outline: none;
        }

        .table-container {
            max-height: 370px;
            overflow: auto;
            margin: 1.5rem;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }

        .table-container::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .table-container::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .table-container::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .modern-table {
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .modern-table thead th {
            background: linear-gradient(135deg, #000155 0%, #1e3c72 100%) !important;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding: 1rem 0.75rem;
            border: none;
            position: sticky;
            top: 0;
            z-index: 10;
            text-align: center;
        }

        .modern-table thead th:first-child {
            border-top-left-radius: 10px;
        }

        .modern-table thead th:last-child {
            border-top-right-radius: 10px;
        }

        .modern-table tbody tr {
            background: white;
            transition: all 0.3s ease;
            border-bottom: 1px solid #f1f5f9;
        }

        .modern-table tbody tr:hover {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            transform: scale(1.001);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .modern-table tbody td {
            padding: 1rem 0.75rem;
            border: none;
            text-align: center;
            vertical-align: middle;
            font-size: 14px;
        }

         /* Status Badges */
        .status-badge {
            padding: 8px 16px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .status-badge:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .status-pending {
            background: linear-gradient(135deg, #ffeaa7 0%, #fdcb6e 100%);
            color: #d63031;
            box-shadow: 0 3px 10px rgba(253, 203, 110, 0.4);
        }

        .status-approved {
            background: linear-gradient(135deg, #81ecec 0%, #00b894 100%);
            color: #ffffff;
            box-shadow: 0 3px 10px rgba(0, 184, 148, 0.4);
        }

        .status-rejected {
            background: linear-gradient(135deg, #fd79a8 0%, #e84393 100%);
            color: #ffffff;
            box-shadow: 0 3px 10px rgba(232, 67, 147, 0.4);
        }

        .claimed-requests-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.3);
        }

        .claimed-requests-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
            color: white;
            text-decoration: none;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #64748b;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        @media (max-width: 768px) {
            .stats-container {
                padding: 1rem;
            }
            
            .stat-card {
                margin-bottom: 0.5rem;
            }
            
            .search-filter-section {
                padding: 1rem;
            }
            
            .modern-table {
                font-size: 12px;
            }
            
            .modern-table tbody td,
            .modern-table thead th {
                padding: 0.5rem 0.25rem;
            }
        }

</style>



<body class="hold-transition sidebar-mini">

<div class="wrapper">
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
          <a class="nav-link" href="../backend/admin/sign_out.php" role="button">
            <i class="fa-solid fa-right-from-bracket mr-1" style="color:black;"></i>
            <span style="color:black;">Sign Out</span>
          </a>
        </li>

      </ul>
    </nav>



    
    <!-- MAIN CONTENT -->

    <div class="content-wrapper m-0 p-2 bg-white font-inter" >
        <div class="col p-2 d-flex justify-content-between">
            
            <div class="col-4 p-2 " style="height: 700px;" >
                <div class="row-4 p-3 mb-3  " style="background-color:rgb(255, 255, 255); border: 1px solid rgb(194, 194, 194);
                                                   border-radius: 10px;">
                    <div class="row-2 mb-3 ">
                        <div class="d-flex align-items-center text-white justify-content-center p-2 w-50 font-inter font-weight-bold" 
                             style="height: 50px; background-color: #001556; border-radius: 10px;">   

                            <i class="mr-2 fa-solid fa-plus"></i>
                            <p class="m-0">Add New Certificate</p>
                            
                        </div>
                    </div>
                    <div class="row mb-3 " style="border: 1px solid rgb(135, 135, 135); border-radius: 10px; height: 60px;">
                        <input type="text" id="certificate_name" class="p-2 pl-4 pr-4 w-100 h-100" style="background-color:rgb(255, 255, 255); border:none; border-radius: 10px;" 
                                placeholder="Name of the Certificate" >
                    </div>
                    <div class="row-2 d-flex justify-content-end font-inter" >      
                        <button type="submit" class="btn px-3 font-weight-bold text-white" style="background-color: #000155; border-radius: 10px;" id="addBtn"> <i class="mr-2 fa-solid fa-plus"></i>Add</button>
                    </div>
                </div>

                <div class="row-7 p-0 " style="background-color:rgb(255, 255, 255); border: 1px solid rgb(194, 194, 194); 
                                       border-radius: 10px; height: 450px; overflow: auto;">
                    <table class="table table-striped table-hover" id="officialTable" style="width: 100%;">
                        <thead class="m-0" style="font-size:14px;  background-color:rgb(255, 255, 255); position: sticky; top: 0; z-index: 10;">
                            <tr>
                                <th class="px-2 text-center" style="width: 40%; ">Certificate</th>
                                <th class="px-2 text-center" style="width: 35; ">Number of Request</th>
                                <th class="px-2 text-center" style="width: 25%; ">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="certificate_table">
                        </tbody>
                    </table>
                </div>
            

            </div>
                        
            <div class="container-fluid py-4">
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="main-container">
                            <!-- Stats Section -->
                            <div class="stats-container">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-3 col-6">
                                        <div class="stat-card approved fade-in">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1 text-muted">Approved</h6>
                                                    <h4 class="mb-0 fw-bold text-success" id="approved-count">0</h4>
                                                </div>
                                                <div class="stat-icon">
                                                    <i class="fas fa-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="stat-card pending fade-in" style="animation-delay: 0.1s">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1 text-muted">Pending</h6>
                                                    <h4 class="mb-0 fw-bold text-warning" id="pending-count">0</h4>
                                                </div>
                                                <div class="stat-icon">
                                                    <i class="fas fa-clock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="stat-card rejected fade-in" style="animation-delay: 0.2s">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="mb-1 text-muted">Rejected</h6>
                                                    <h4 class="mb-0 fw-bold text-danger" id="rejected-count">0</h4>
                                                </div>
                                                <div class="stat-icon">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="fade-in" style="animation-delay: 0.3s">
                                            <a href="claimed_certificatet_set.php" class="claimed-requests-btn w-100 justify-content-center">
                                                <i class="fas fa-check-to-slot"></i>
                                                Claimed Requests
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Search and Filter Section -->
                            <div class="search-filter-section">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-6">
                                        <div class="search-input-container">
                                            <input type="text" id="searching" class="form-control search-input" placeholder="Search by name, purpose, or certificate..." autocomplete="off">
                                            <i class="fas fa-search search-icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center gap-3">
                                            <label class="fw-semibold text-muted mb-0">Filter:</label>
                                            <select id="status-filter" class="form-select filter-select">
                                                <option value="all">All Status</option>
                                                <option value="approved">Approved Only</option>
                                                <option value="pending">Pending Only</option>
                                                <option value="rejected">Rejected Only</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Table Section -->
                            <div class="table-container">
                                <table class="table modern-table">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Purpose</th>
                                            <th>Date Requested</th>
                                            <th>Certificate Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="requests-table-body">
                                        <!-- Sample data for demonstration -->
                                    </tbody>
                                </table>
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
                    tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

                    
                    <div  class="modal-dialog modal-lg modal-dialog-centered p-3" role="document" >
                        <div class="modal-content p-3 bg-white w-75 mx-auto  elevation-2" style="border-radius: 20px;">

                                <div class="row-4 p-3 mb-3">
                                    <div class="row-2 mb-3 ">
                                        <div class="d-flex align-items-center justify-content-center p-2 w-50 font-inter text-white font-weight-bold" 
                                            style="height: 50px; background-color: #000155; border-radius: 10px;">   

                                            <i class="mr-2  fa-solid fa-pen-to-square"></i>
                                            <p class="m-0">Edit Certificate</p>
                                            
                                        </div>
                                    </div>


                                    
                                    <div class="row mb-3" style="border: 1px solid rgb(135, 135, 135); border-radius: 10px; height: 60px;">
                                        <!-- Hidden input to store ID -->
                                        <input type="hidden" id="edit_cert_id">
                                        <!-- Input for new zone name -->
                                        <input type="text"   id="edit_cert_name" class="p-2 pl-4 pr-4 w-100 h-100" style="background-color:rgb(255, 255, 255); border:none; border-radius: 10px;" 
                                                placeholder="Enter the new name" >
                                    
                                    </div>

                                    <div class="row-2 d-flex justify-content-end font-inter" >
                                        <button type="button" class="btn px-3 elevation-5 mr-2" style="background-color: #FFF153; border-radius: 20px;" id="closeBtn" data-dismiss="modal"><i class="mr-2  fas fa-times"></i> Close</button>
                                        <button type="submit" class="btn px-3 elevation-5" style="background-color: #81D5C6; border-radius: 20px;" id="saveBtn"> <i class="mr-2  fa-solid fa-share"></i>Save</button>
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


<!-- submit the new certificate -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addBtn = document.getElementById("addBtn");
        const certificateInput = document.getElementById("certificate_name");
        
        // Enhanced add certificate function
        function addCertificateEnhanced() {
            const certName = certificateInput.value.trim();

            if (certName === "") {
                Swal.fire({
                    icon: "warning",
                    title: "Missing Input",
                    text: "Certificate name cannot be empty.",
                    background: '#fff',
                    customClass: {
                        popup: 'animated fadeInDown'
                    }
                });
                certificateInput.focus();
                certificateInput.style.borderColor = '#dc3545';
                setTimeout(() => {
                    certificateInput.style.borderColor = '';
                }, 2000);
                return;
            }

            // Show loading state on button
            const originalBtnContent = addBtn.innerHTML;
            addBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Adding...';
            addBtn.disabled = true;
            addBtn.style.background = 'linear-gradient(135deg, #6c757d, #495057)';

            fetch("../backend/admin/add_certificate.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ name: certName })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Success animation
                    addBtn.innerHTML = '<i class="fas fa-check me-2"></i>Added!';
                    addBtn.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
                    
                    Swal.fire({
                        icon: "success",
                        title: "Certificate Added!",
                        text: data.message,
                        timer: 1000,
                        showConfirmButton: false,
                        background: '#fff',
                        customClass: {
                            popup: 'animated fadeInUp'
                        }
                    });
                    
                    // Clear input with animation
                    certificateInput.style.transform = 'scale(0.95)';
                    certificateInput.style.opacity = '0.7';
                    
                    setTimeout(() => {
                        certificateInput.value = "";
                        certificateInput.style.transform = 'scale(1)';
                        certificateInput.style.opacity = '1';
                        certificateInput.focus();
                    }, 500);
                    
                    // Reload certificates with delay for better UX
                    setTimeout(() => {
                        loadCertificatesEnhanced();
                    }, 500);
                    
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Failed to Add Certificate",
                        text: data.message,
                        background: '#fff',
                        customClass: {
                            popup: 'animated shake'
                        }
                    });
                }
            })
            .catch(err => {
                console.error("Fetch error:", err);
                Swal.fire({
                    icon: "error",
                    title: "Connection Error",
                    text: "Something went wrong while adding the certificate. Please try again.",
                    background: '#fff',
                    customClass: {
                        popup: 'animated shake'
                    }
                });
            })
            .finally(() => {
                // Reset button after delay
                setTimeout(() => {
                    addBtn.innerHTML = originalBtnContent;
                    addBtn.disabled = false;
                    addBtn.style.background = '';
                }, 2000);
            });
        }

        // Event listeners for add certificate
        addBtn.addEventListener("click", function (e) {
            e.preventDefault();
            addCertificateEnhanced();
        });

        // Enter key support
        certificateInput.addEventListener("keypress", function(e) {
            if (e.key === "Enter") {
                e.preventDefault();
                addCertificateEnhanced();
            }
        });

        // Real-time validation
        certificateInput.addEventListener("input", function() {
            const value = this.value.trim();
            if (value.length > 0) {
                this.style.borderColor = '#28a745';
            } else {
                this.style.borderColor = '';
            }
        });
    });
</script>




<!-- get all certificate -->
<script>
        function loadCertificatesEnhanced() {
        const tbody = document.getElementById('certificate_table');
        
        // Enhanced loading state
        const loadingHtml = `
            <tr class="loading-row">
                <td colspan="3" class="text-center py-5">
                    <div class="loading-container">
                        <div class="modern-spinner"></div>
                        <p class="mt-3 text-muted fw-medium mb-0">Loading certificates...</p>
                    </div>
                </td>
            </tr>
        `;
        
        tbody.innerHTML = loadingHtml;
        
        fetch('../backend/admin/get_all_certificate.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                tbody.innerHTML = ''; // Clear loading state
                
                if (data.success && data.data.length > 0) {
                    // Add certificates with staggered animation
                    data.data.forEach((cert, index) => {
                        setTimeout(() => {
                            addEnhancedCertificateRow(cert, tbody, index);
                        }, index * 100);
                    });
                    
                    // Update statistics
                    updateCertificateStatistics(data.data);
                } else {
                    // Enhanced empty state
                    tbody.innerHTML = `
                        <tr class="empty-row">
                            <td colspan="3" class="text-center py-5">
                                <div class="empty-state-container">
                                    <div class="empty-icon mb-3">
                                        <i class="fas fa-certificate" style="font-size: 4rem; color: #dee2e6;"></i>
                                    </div>
                                    <h5 class="text-muted fw-semibold mb-2">No Certificates Found</h5>
                                    <p class="text-muted mb-3">Start by adding your first certificate type above</p>
                                    <button class="btn btn-outline-primary btn-sm pulse-btn" onclick="document.getElementById('certificate_name').focus()">
                                        <i class="fas fa-plus me-2"></i>Add Your First Certificate
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                }
            })
            .catch(error => {
                console.error("Error loading certificates:", error);
                tbody.innerHTML = `
                    <tr class="error-row">
                        <td colspan="3" class="text-center py-5">
                            <div class="error-state-container">
                                <div class="error-icon mb-3">
                                    <i class="fas fa-exclamation-triangle" style="font-size: 4rem; color: #ffc107;"></i>
                                </div>
                                <h5 class="text-danger fw-semibold mb-2">Failed to Load Certificates</h5>
                                <p class="text-muted mb-3">Please check your connection and try again</p>
                                <button class="btn btn-outline-danger btn-sm" onclick="loadCertificatesEnhanced()">
                                    <i class="fas fa-redo me-2"></i>Try Again
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
            });
    }

    // Enhanced function to add certificate rows
    function addEnhancedCertificateRow(cert, tbody, index) {
        const tr = document.createElement('tr');
        tr.className = "certificate-row enhanced-row";
        tr.style.animationDelay = `${index * 0.1}s`;
        tr.setAttribute('data-cert-id', cert.cer_type_id);
        
        tr.innerHTML = `
            <td class="text-start align-middle certificate-name-cell" style="padding: 20px 15px;">
                <div class="d-flex align-items-center">
                    
                    <div class="certificate-info">
                        <div class="certificate-title fw-semibold">${cert.cer_type_name}</div>
                        <small class="text-muted certificate-subtitle">Certificate Type</small>
                    </div>
                </div>
            </td>
            <td class="text-center align-middle" style="padding: 20px 15px;">
                <span class="request-count-badge me-4 ${getEnhancedCountBadgeClass(cert.request_count)}" 
                    <i class="fas fa-file-alt me-3"></i>
                    ${cert.request_count}
                </span>
            </td>
            <td class="text-center align-middle" style="padding: 20px 15px;">
                <div class="enhanced-action-group">
                    <button class="enhanced-action-btn edit-action-btn editBtn" 
                            data-id="${cert.cer_type_id}" 
                            data-name="${cert.cer_type_name}" 
                            data-toggle="modal" 
                            data-target="#editCertificateModal"
                            title="Edit ${cert.cer_type_name}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="enhanced-action-btn delete-action-btn" 
                            data-id="${cert.cer_type_id}"
                            data-name="${cert.cer_type_name}"
                            onclick="deleteCertificateEnhanced(this)"
                            title="Delete ${cert.cer_type_name}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </td>
        `;
        
        // Add enhanced hover effects
        tr.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.02)';
            this.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.15)';
            this.style.zIndex = '1';
        });
        
        tr.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = 'none';
            this.style.zIndex = 'auto';
        });
        
        tbody.appendChild(tr);
    }

    // Enhanced badge class function
    function getEnhancedCountBadgeClass(count) {
        if (count === 0) return 'badge-zero';
        if (count <= 3) return 'badge-low';
        if (count <= 10) return 'badge-medium';
        if (count <= 20) return 'badge-high';
        return 'badge-very-high';
    }

    // Update statistics function
    function updateCertificateStatistics(certificates) {
        const totalCerts = certificates.length;
        const totalRequests = certificates.reduce((sum, cert) => sum + parseInt(cert.request_count), 0);
        const avgRequests = totalRequests > 0 ? (totalRequests / totalCerts).toFixed(1) : 0;
        
        console.log(`📊 Statistics - Total Certificates: ${totalCerts}, Total Requests: ${totalRequests}, Average: ${avgRequests}`);
    }

    // Initial load
    document.addEventListener('DOMContentLoaded', function() {
        loadCertificatesEnhanced();
    });
</script>



<!-- edit certificate name -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Enhanced edit button handler
        document.addEventListener('click', function(e) {
            if (e.target.closest('.editBtn')) {
                const btn = e.target.closest('.editBtn');
                const cer_Id = btn.getAttribute('data-id');
                const cer_Name = btn.getAttribute('data-name');

                // Enhanced button loading state
                const originalHtml = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                btn.disabled = true;

                // Set values in the modal
                document.getElementById('edit_cert_id').value = cer_Id;
                document.getElementById('edit_cert_name').value = cer_Name;

                // Reset button state
                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                    btn.disabled = false;
                }, 800);

                // Enhanced modal behavior
                $('#editCertificateModal').on('shown.bs.modal', function () {
                    const input = document.getElementById('edit_cert_name');
                    input.focus();
                    input.select();
                    
                    // Add glow effect to input
                    input.style.boxShadow = '0 0 0 3px rgba(0, 123, 255, 0.25)';
                    setTimeout(() => {
                        input.style.boxShadow = '';
                    }, 1000);
                });
            }
        });

    // Enhanced save function
    const saveBtn = document.getElementById('saveBtn');
    if (saveBtn) {
        saveBtn.addEventListener('click', function(e) {
                e.preventDefault();

                const id = document.getElementById('edit_cert_id').value;
                const name = document.getElementById('edit_cert_name').value.trim();

                console.log('📝 Editing Certificate - ID:', id, 'Name:', name);

                if (!id || id.trim() === "") {
                    Swal.fire({
                        icon: "error",
                        title: "Invalid Data",
                        text: "Certificate ID is missing or invalid.",
                        customClass: {
                            popup: 'animated shake'
                        }
                    });
                    return;
                }

                if (!name || name === "") {
                    Swal.fire({
                        icon: "warning",
                        title: "Missing Name",
                        text: "Certificate name cannot be empty.",
                        customClass: {
                            popup: 'animated shake'
                        }
                    });
                    document.getElementById('edit_cert_name').focus();
                    return;
                }

                // Enhanced button loading state
                const originalBtnContent = saveBtn.innerHTML;
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Updating...';
                saveBtn.disabled = true;

                fetch('../backend/admin/update_certificate.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id, name })
                })
                .then(res => {
                    if (!res.ok) {
                        throw new Error(`HTTP error! status: ${res.status}`);
                    }
                    return res.json();
                })
                .then(data => {
                    if (data.success) {
                        // Success animation
                        saveBtn.innerHTML = '<i class="fas fa-check me-2"></i>Updated!';
                        saveBtn.style.background = '#28a745';

                        Swal.fire({
                            icon: "success",
                            title: "Certificate Updated!",
                            text: data.message,
                            timer: 1000,
                            showConfirmButton: false,
                            customClass: {
                                popup: 'animated bounceIn'
                            }
                        });

                        // Close modal with delay
                        setTimeout(() => {
                            $('#editCertificateModal').modal('hide');
                            loadCertificatesEnhanced();
                        }, 1500);

                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Update Failed",
                            text: data.message,
                            customClass: {
                                popup: 'animated shake'
                            }
                        });
                    }
                })
                .catch(err => {
                    console.error('Update error:', err);
                    Swal.fire({
                        icon: "error",
                        title: "Connection Error",
                        text: "Something went wrong while updating. Please try again.",
                        customClass: {
                            popup: 'animated shake'
                        }
                    });
                })
                .finally(() => {
                    // Reset button
                    setTimeout(() => {
                        saveBtn.innerHTML = originalBtnContent;
                        saveBtn.disabled = false;
                        saveBtn.style.background = '';
                    }, 2000);
                });
            });
        }
    });
</script>





<!-- delete -->
<script>
    function deleteCertificateEnhanced(btn) {
        const id = btn.getAttribute('data-id');
        const name = btn.getAttribute('data-name') || 'this certificate';
        

        // Enhanced SweetAlert confirmation
        Swal.fire({
            title: "Delete Certificate?",
            html: `Are you sure you want to delete <strong>"${name}"</strong>?<br><small class="text-muted">This action cannot be undone.</small>`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc3545",
            cancelButtonColor: "#6c757d",
            confirmButtonText: '<i class="fas fa-trash-alt me-2"></i>Yes, Delete It!',
            cancelButtonText: '<i class="fas fa-times me-2"></i>Cancel',
            reverseButtons: true,
            customClass: {
                popup: 'animated fadeInDown',
                confirmButton: 'btn-hover-effect',
                cancelButton: 'btn-hover-effect'
            },
            backdrop: `
                rgba(0,0,0,0.4)
                center
                no-repeat
            `
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading state on the delete button
                const originalHtml = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                btn.disabled = true;

                // Add loading animation to the row
                const row = btn.closest('tr');
                row.style.opacity = '0.6';
                row.style.transform = 'scale(0.98)';

                fetch('../backend/admin/delete_certificate.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Success animation
                        row.style.transition = 'all 0.5s ease';
                        row.style.transform = 'translateX(-100%) scale(0.8)';
                        row.style.opacity = '0';

                        Swal.fire({
                            icon: "success",
                            title: "Certificate Deleted!",
                            text: data.message,
                            timer: 1000,
                            showConfirmButton: false,
                            customClass: {
                                popup: 'animated bounceIn'
                            }
                        });

                        // Remove row and reload after animation
                        setTimeout(() => {
                            loadCertificatesEnhanced();
                        }, 500);

                    } else {
                        // Reset row state on error
                        row.style.opacity = '1';
                        row.style.transform = 'scale(1)';
                        btn.innerHTML = originalHtml;
                        btn.disabled = false;

                        Swal.fire({
                            icon: "error",
                            title: "Delete Failed",
                            text: data.message,
                            customClass: {
                                popup: 'animated shake'
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Delete error:', error);
                    
                    // Reset row state on error
                    row.style.opacity = '1';
                    row.style.transform = 'scale(1)';
                    btn.innerHTML = originalHtml;
                    btn.disabled = false;

                    Swal.fire({
                        icon: "error",
                        title: "Connection Error",
                        text: "Something went wrong while deleting. Please try again.",
                        customClass: {
                            popup: 'animated shake'
                        }
                    });
                });
            }
        });
    }

    // Legacy function for compatibility
    function deleteCertificate(btn) {
        deleteCertificateEnhanced(btn);
    }
</script>




<script>
$(document).ready(function() {
    // Function to fetch and display requests
    function fetchRequests(filter = 'all') {
        $.ajax({
            url: '../backend/admin/get_all_request.php',
            type: 'GET',
            data: { filter: filter },
            dataType: 'json',
           success: function(response) {
            // Update counts with smooth animation
            updateCountWithAnimation('#approved-count', response.counts.approved);
            updateCountWithAnimation('#pending-count', response.counts.pending);
            updateCountWithAnimation('#rejected-count', response.counts.rejected);
            
            // Clear table body
            const tableBody = document.getElementById('requests-table-body');
            tableBody.innerHTML = '';
            
            // Check if there are no requests
            if (!response.requests || response.requests.length === 0) {
                showEmptyState();
                return;
            }
            
            // Add each request to the table with enhanced styling and animations
            response.requests.forEach(function(request, index) {
                // Format full name
                let fullName = request.req_first_name + ' ' + 
                            (request.req_middle_name ? request.req_middle_name.charAt(0) + '. ' : '') + 
                            request.req_last_name + 
                            (request.req_suffix ? ' ' + request.req_suffix : '');
                
                // Determine status styling
                let statusClass = '';
                let statusText = '';
                if (request.req_status === 'approved') {
                    statusClass = 'status-approved';
                    statusText = 'Approved';
                } else if (request.req_status === 'pending') {
                    statusClass = 'status-pending';
                    statusText = 'Pending';
                } else if (request.req_status === 'rejected') {
                    statusClass = 'status-rejected';
                    statusText = 'Rejected';
                }
                
                // Create table row with enhanced styling
                let row = document.createElement('tr');
                row.className = 'fade-in';
                row.style.animationDelay = (index * 0.05) + 's'; // Staggered animation
                
                row.innerHTML = `
                    <td class="fw-semibold">${fullName}</td>
                    <td>${request.req_purpose}</td>
                    <td>${formatDate(request.req_requested_date)}</td>
                    <td>${request.cer_type_name || 'Certificate'}</td>
                    <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                `;
                
                // Add click event if needed for row selection
                row.addEventListener('click', function() {
                    handleRowClick(request);
                });
                
                tableBody.appendChild(row);
            });
            
            // Set up enhanced modal handlers
            setupModalHandlers();
            
            // Initialize enhanced search and filter
            initializeEnhancedFeatures();
        },
            error: function(xhr, status, error) {
                console.error('Error fetching requests:', error);
            }
        });
    }
    
    // Initial load
    fetchRequests();
    
    // Filter change handler
    // $('#status-filter').change(function() {
    //     fetchRequests($(this).val());
    // });
    
    // Search functionality
    // $('#searching').keyup(function() {
    //     let searchText = $(this).val().toLowerCase();
    //     $('#requests-table-body tr').filter(function() {
    //         $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1);
    //     });
    // });
});

// Helper function to animate count updates
function updateCountWithAnimation(selector, newValue) {
    const element = document.querySelector(selector);
    if (!element) return;
    
    const currentValue = parseInt(element.textContent) || 0;
    
    if (currentValue !== newValue) {
        // Add pulse animation
        element.classList.add('pulse');
        
        // Animate the number change
        animateNumber(element, currentValue, newValue, 500);
        
        // Remove pulse after animation
        setTimeout(() => {
            element.classList.remove('pulse');
        }, 600);
    }
}

// Smooth number animation
function animateNumber(element, start, end, duration) {
    const startTime = performance.now();
    const difference = end - start;
    
    function updateNumber(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function for smooth animation
        const easeOutQuart = 1 - Math.pow(1 - progress, 4);
        const current = Math.round(start + (difference * easeOutQuart));
        
        element.textContent = current;
        
        if (progress < 1) {
            requestAnimationFrame(updateNumber);
        }
    }
    
    requestAnimationFrame(updateNumber);
}

// Show empty state when no data is available
function showEmptyState() {
    const tableBody = document.getElementById('requests-table-body');
    tableBody.innerHTML = `
        <tr>
            <td colspan="5" class="empty-state">
                <i class="fas fa-inbox"></i>
                <h5 class="mt-3 mb-2">No requests found</h5>
                <p class="text-muted mb-0">Try adjusting your search or filter criteria</p>
            </td>
        </tr>
    `;
}

// Enhanced date formatting
function formatDate(dateString) {
    if (!dateString) return 'N/A';
    
    try {
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    } catch (e) {
        return dateString; // Return original if parsing fails
    }
}



// Initialize enhanced search and filter features
function initializeEnhancedFeatures() {
    // Enhanced search functionality
    const searchInput = document.getElementById('searching');
    if (searchInput) {
        // Remove existing listeners to avoid duplicates
        searchInput.removeEventListener('input', handleSearch);
        searchInput.addEventListener('input', handleSearch);
    }
    
    // Enhanced filter functionality
    const statusFilter = document.getElementById('status-filter');
    if (statusFilter) {
        statusFilter.removeEventListener('change', handleFilter);
        statusFilter.addEventListener('change', handleFilter);
    }
}

// Enhanced search handler
function handleSearch(e) {
    const searchTerm = e.target.value.toLowerCase().trim();
    const rows = document.querySelectorAll('#requests-table-body tr');
    let visibleCount = 0;
    
    rows.forEach(row => {
        if (row.children.length <= 1) return; // Skip empty state row
        
        const text = row.textContent.toLowerCase();
        const isVisible = !searchTerm || text.includes(searchTerm);
        
        // Smooth show/hide animation
        if (isVisible) {
            row.style.display = '';
            row.classList.add('fade-in');
            visibleCount++;
            
            // Highlight search terms
            if (searchTerm) {
                highlightSearchTerm(row, searchTerm);
            } else {
                removeHighlight(row);
            }
        } else {
            row.style.display = 'none';
        }
    });
    
    // Show empty state if no results
    if (visibleCount === 0 && searchTerm) {
        showSearchEmptyState(searchTerm);
    }
}

// Enhanced filter handler
function handleFilter(e) {
    const filterValue = e.target.value;
    const rows = document.querySelectorAll('#requests-table-body tr');
    let visibleCount = 0;
    
    rows.forEach(row => {
        if (row.children.length <= 1) return; // Skip empty state row
        
        const statusElement = row.querySelector('.status-badge');
        if (!statusElement) return;
        
        const status = statusElement.textContent.toLowerCase();
        const isVisible = filterValue === 'all' || status === filterValue;
        
        if (isVisible) {
            row.style.display = '';
            row.classList.add('fade-in');
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });
    
    // Show empty state if no results
    if (visibleCount === 0 && filterValue !== 'all') {
        showFilterEmptyState(filterValue);
    }
}

// Highlight search terms
function highlightSearchTerm(row, searchTerm) {
    // Remove existing highlights
    removeHighlight(row);
    
    // Add subtle background highlight to the row
    row.style.background = 'rgba(59, 130, 246, 0.08)';
    row.style.borderLeft = '3px solid #3b82f6';
}

// Remove search highlights
function removeHighlight(row) {
    row.style.background = '';
    row.style.borderLeft = '';
}

// Show empty state for search results
function showSearchEmptyState(searchTerm) {
    const tableBody = document.getElementById('requests-table-body');
    tableBody.innerHTML = `
        <tr>
            <td colspan="5" class="empty-state">
                <i class="fas fa-search"></i>
                <h5 class="mt-3 mb-2">No results found</h5>
                <p class="text-muted mb-0">No requests match "<strong>${searchTerm}</strong>"</p>
                <small class="text-muted">Try different keywords or check your spelling</small>
            </td>
        </tr>
    `;
}

// Show empty state for filter results
function showFilterEmptyState(filterValue) {
    const tableBody = document.getElementById('requests-table-body');
    const filterText = filterValue.charAt(0).toUpperCase() + filterValue.slice(1);
    
    tableBody.innerHTML = `
        <tr>
            <td colspan="5" class="empty-state">
                <i class="fas fa-filter"></i>
                <h5 class="mt-3 mb-2">No ${filterText} requests</h5>
                <p class="text-muted mb-0">There are currently no requests with "${filterText}" status</p>
                <small class="text-muted">Try selecting a different filter option</small>
            </td>
        </tr>
    `;
}

// Advanced table features
function initializeAdvancedFeatures() {
    // Add loading state
    showLoadingState();
    
    // Add table sorting (optional)
    initializeTableSorting();
    
    // Add keyboard shortcuts
    initializeKeyboardShortcuts();
    
    // Add export functionality (optional)
    initializeExportFeatures();
}

// Show loading state
function showLoadingState() {
    const tableBody = document.getElementById('requests-table-body');
    tableBody.innerHTML = `
        <tr>
            <td colspan="5" class="empty-state">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <h5 class="mt-3 mb-2">Loading requests...</h5>
                <p class="text-muted mb-0">Please wait while we fetch the data</p>
            </td>
        </tr>
    `;
}

// Initialize table sorting
function initializeTableSorting() {
    const headers = document.querySelectorAll('.modern-table thead th');
    
    headers.forEach((header, index) => {
        if (index < 4) { // Don't make status column sortable for now
            header.style.cursor = 'pointer';
            header.innerHTML += ' <i class="fas fa-sort ms-1 text-white-50"></i>';
            
            header.addEventListener('click', () => sortTable(index));
        }
    });
}

// Sort table by column
function sortTable(columnIndex) {
    const table = document.getElementById('requests-table-body');
    const rows = Array.from(table.rows);
    
    // Skip if empty state or loading
    if (rows.length === 0 || rows[0].children.length <= 1) return;
    
    const sortDirection = table.dataset.sortDirection === 'asc' ? 'desc' : 'asc';
    table.dataset.sortDirection = sortDirection;
    
    rows.sort((a, b) => {
        const aText = a.children[columnIndex].textContent.trim();
        const bText = b.children[columnIndex].textContent.trim();
        
        // Handle date sorting
        if (columnIndex === 2) { // Date column
            const aDate = new Date(aText);
            const bDate = new Date(bText);
            return sortDirection === 'asc' ? aDate - bDate : bDate - aDate;
        }
        
        // Handle text sorting
        const comparison = aText.localeCompare(bText);
        return sortDirection === 'asc' ? comparison : -comparison;
    });
    
    // Clear and re-append sorted rows
    table.innerHTML = '';
    rows.forEach((row, index) => {
        row.style.animationDelay = (index * 0.02) + 's';
        table.appendChild(row);
    });
    
    // Update sort icons
    updateSortIcons(columnIndex, sortDirection);
}

// Update sort icons in headers
function updateSortIcons(activeColumn, direction) {
    const headers = document.querySelectorAll('.modern-table thead th');
    
    headers.forEach((header, index) => {
        const icon = header.querySelector('i');
        if (!icon) return;
        
        if (index === activeColumn) {
            icon.className = direction === 'asc' ? 
                'fas fa-sort-up ms-1 text-white' : 
                'fas fa-sort-down ms-1 text-white';
        } else {
            icon.className = 'fas fa-sort ms-1 text-white-50';
        }
    });
}

// Initialize keyboard shortcuts
function initializeKeyboardShortcuts() {
    document.addEventListener('keydown', (e) => {
        // Ctrl/Cmd + F for search focus
        if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
            e.preventDefault();
            document.getElementById('searching').focus();
        }
        
        // Escape to clear search
        if (e.key === 'Escape') {
            const searchInput = document.getElementById('searching');
            if (searchInput.value) {
                searchInput.value = '';
                handleSearch({ target: searchInput });
            }
        }
    });
}

// Initialize export features (optional)
function initializeExportFeatures() {
    // Add export button to the stats section if needed
    const exportButton = `
        <div class="col-md-3 col-6">
            <button class="btn btn-outline-primary w-100" id="export-btn">
                <i class="fas fa-download me-2"></i>Export Data
            </button>
        </div>
    `;
    
    // Add event listener for export
    document.addEventListener('click', (e) => {
        if (e.target.id === 'export-btn' || e.target.closest('#export-btn')) {
            exportTableData();
        }
    });
}

// Export table data to CSV
function exportTableData() {
    const rows = document.querySelectorAll('#requests-table-body tr');
    if (rows.length === 0 || rows[0].children.length <= 1) return;
    
    let csv = 'Full Name,Purpose,Date Requested,Certificate Type,Status\n';
    
    rows.forEach(row => {
        if (row.style.display !== 'none' && row.children.length > 1) {
            const cells = Array.from(row.children);
            const rowData = cells.map(cell => {
                const text = cell.textContent.trim();
                return `"${text.replace(/"/g, '""')}"`;
            }).join(',');
            csv += rowData + '\n';
        }
    });
    
    // Create and download file
    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute('download', `certificate_requests_${new Date().toISOString().split('T')[0]}.csv`);
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Real-time status updates (WebSocket or polling)
function initializeRealTimeUpdates() {
    // Example using polling (replace with WebSocket for better performance)
    setInterval(() => {
        // Only update if page is visible
        if (!document.hidden) {
            refreshTableData();
        }
    }, 30000); // Update every 30 seconds
}

// Refresh table data
function refreshTableData() {
    // Add subtle loading indicator
    const refreshIcon = document.querySelector('.fa-sync-alt');
    if (refreshIcon) {
        refreshIcon.classList.add('fa-spin');
        setTimeout(() => refreshIcon.classList.remove('fa-spin'), 1000);
    }
    
    // Your existing AJAX call here
    // This would be your original AJAX request
}

// Initialize all enhanced features when document is ready
document.addEventListener('DOMContentLoaded', function() {
    initializeEnhancedFeatures();
    initializeAdvancedFeatures();
    initializeRealTimeUpdates();
    
    // Add smooth scrolling to table container
    const tableContainer = document.querySelector('.table-container');
    if (tableContainer) {
        tableContainer.style.scrollBehavior = 'smooth';
    }
    
    // Add focus management for accessibility
    document.getElementById('searching').addEventListener('focus', function() {
        this.parentElement.classList.add('search-focused');
    });
    
    document.getElementById('searching').addEventListener('blur', function() {
        this.parentElement.classList.remove('search-focused');
    });
});

// Error handling for AJAX calls
function handleAjaxError(xhr, status, error) {
    console.error('Error fetching requests:', error);
    
    const tableBody = document.getElementById('requests-table-body');
    tableBody.innerHTML = `
        <tr>
            <td colspan="5" class="empty-state text-danger">
                <i class="fas fa-exclamation-triangle"></i>
                <h5 class="mt-3 mb-2">Error Loading Data</h5>
                <p class="mb-2">There was a problem loading the certificate requests.</p>
                <button class="btn btn-primary btn-sm" onclick="location.reload()">
                    <i class="fas fa-refresh me-1"></i>Retry
                </button>
            </td>
        </tr>
    `;
    
    // Reset counts to 0
    updateCountWithAnimation('#approved-count', 0);
    updateCountWithAnimation('#pending-count', 0);
    updateCountWithAnimation('#rejected-count', 0);
}


</script>


</body>
</html>
