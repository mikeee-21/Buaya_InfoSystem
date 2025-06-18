

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pending Requests</title>

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


/* Target ang container nga naay scrollbar */
.container::-webkit-scrollbar {
  width: 6px; /* Puti gamay */
}

/* Scrollbar Track */
.container::-webkit-scrollbar-track {
  border-radius: 10px;
}

/* Scrollbar Thumb */
.container::-webkit-scrollbar-thumb {
  background: #81D5C6; /* Darker thumb */
  border-radius: 10px;
}

/* Scrollbar Thumb on Hover */
.container::-webkit-scrollbar-thumb:hover {
  background: #81D5C6; /* Even darker when hover */
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

.cards{
  transition: .5s ease-in-out;
}


.cards:hover{
  transform: translateY(-5px);
  transition: .5s ease-in-out;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}



/* Target ang container nga naay scrollbar */
.modal-body::-webkit-scrollbar {
  width: 6px; /* Puti gamay */
}

/* Scrollbar Track */
.modal-body::-webkit-scrollbar-track {
  border-radius: 10px;
}

/* Scrollbar Thumb */
.modal-body::-webkit-scrollbar-thumb {
  background: #81D5C6; /* Darker thumb */
  border-radius: 10px;
}

/* Scrollbar Thumb on Hover */
.modal-body ::-webkit-scrollbar-thumb:hover {
  background: #81D5C6; /* Even darker when hover */
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



/* table */

        fieldset {
            border: none;
            padding: 0;
        }

        /* Pending Count Card Enhancement */
        .pending-card {
            background: linear-gradient(135deg, #000155 0%, #1e3c72 100%) !important;
            border-radius: 15px !important;
            box-shadow: 0 8px 25px rgba(0, 1, 85, 0.3);
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .pending-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(0, 1, 85, 0.4);
        }

        .pending-count-badge {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%) !important;
            border-radius: 10px !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #000155;
            transition: all 0.3s ease;
        }

        .pending-count-badge:hover {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
        }

        /* Search Container Enhancement */
        .search-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        .search-input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            color: #000155;
            z-index: 10;
            font-size: 1.1rem;
        }

        .search-input {
            border: 2px solid transparent !important;
            border-radius: 25px !important;
            padding: 12px 20px 12px 45px !important;
            background: rgba(255, 255, 255, 0.9) !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05) !important;
        }

        .search-input:focus {
            outline: none !important;
            border-color: #000155 !important;
            background: rgba(255, 255, 255, 1) !important;
            box-shadow: 0 5px 20px rgba(0, 1, 85, 0.15) !important;
            transform: translateY(-1px);
        }

        /* Enhanced Table Container */
        .table-container {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .table-responsive {
            border-radius: 20px;
        }

        /* Enhanced Table Header */
        #officialTable thead th {
            background: linear-gradient(135deg, #000155 0%, #1e3c72 100%) !important;
            border: none !important;
            padding: 18px 15px !important;
            font-weight: 600 !important;
            font-size: 0.9rem !important;
            letter-spacing: 0.5px !important;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        /* Enhanced Table Body */
        #officialTable tbody tr {
            transition: all 0.3s ease;
            border: none;
            background: rgba(255, 255, 255, 0.95);
        }

        #officialTable tbody tr:nth-child(even) {
            background: rgba(248, 249, 250, 0.8);
        }

        #officialTable tbody tr:hover {
            background: linear-gradient(90deg, #f8f9ff 0%, #e8f0ff 100%) !important;
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0, 1, 85, 0.1);
            border-left: 4px solid #000155;
        }

        #officialTable tbody td {
            padding: 15px 12px !important;
            vertical-align: middle !important;
            border: none !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
            font-size: 0.9rem;
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

        /* Enhanced Action Button */
        .action-btn {
            background: linear-gradient(135deg, #000155 0%, #1e3c72 100%) !important;
            border: none !important;
            border-radius: 12px !important;
            padding: 10px 16px !important;
            color: white !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 15px rgba(0, 1, 85, 0.3) !important;
            font-weight: 500 !important;
            font-size: 0.85rem !important;
        }

        .action-btn:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(0, 1, 85, 0.4) !important;
            background: linear-gradient(135deg, #1e3c72 0%, #000155 100%) !important;
            color: white !important;
        }

        .action-btn:focus {
            box-shadow: 0 6px 20px rgba(0, 1, 85, 0.4) !important;
        }

        /* Enhanced Data Styling */
        .name-cell {
            font-weight: 600;
            color: #2d3436;
        }

        .purpose-cell {
            color: #636e72;
            font-style: italic;
        }

        .date-badge {
            background: rgba(0, 1, 85, 0.1);
            color: #000155;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-block;
        }

        .certificate-badge {
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-block;
            box-shadow: 0 2px 8px rgba(108, 92, 231, 0.3);
        }

        /* Custom Scrollbar */
        .table-responsive::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #000155, #1e3c72);
            border-radius: 10px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #1e3c72, #000155);
        }

        /* Loading Animation */
        .loading-row {
            text-align: center;
            padding: 50px;
        }

        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #000155;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 15px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .pending-card {
                margin-bottom: 15px;
            }
            
            #officialTable {
                font-size: 0.8rem;
            }
            
            #officialTable thead th,
            #officialTable tbody td {
                padding: 10px 8px !important;
            }
            
            .action-btn {
                padding: 8px 12px !important;
                font-size: 0.75rem !important;
            }
            
            .status-badge {
                padding: 6px 10px;
                font-size: 0.7rem;
            }
        }

        /* Animation for table rows */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #requestTableBody tr {
            animation: fadeInUp 0.5s ease forwards;
        }

        #requestTableBody tr:nth-child(1) { animation-delay: 0.1s; }
        #requestTableBody tr:nth-child(2) { animation-delay: 0.2s; }
        #requestTableBody tr:nth-child(3) { animation-delay: 0.3s; }
        #requestTableBody tr:nth-child(4) { animation-delay: 0.4s; }
        #requestTableBody tr:nth-child(5) { animation-delay: 0.5s; }


/* modal */

        .modal-backdrop {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
        }
        
        .modal-dialog {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .modal-content {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(16px);
            position: relative;
            overflow: hidden;
        }
        
        .modal-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #81D5C6, #FFF153, #FF453F);
            z-index: 1;
        }
        
        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 1.5rem 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .modal-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: shimmer 3s infinite;
        }
        
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        .modal-header h3 {
            margin: 0;
            font-weight: 600;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .modal-header h3::before {
            content: '\f007';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: rgba(255, 255, 255, 0.8);
        }
        
        .modal-body {
            padding: 2rem;
            max-height: 550px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #81D5C6 #f1f5f9;
        }
        
        .modal-body::-webkit-scrollbar {
            width: 6px;
        }
        
        .modal-body::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }
        
        .modal-body::-webkit-scrollbar-thumb {
            background: #81D5C6;
            border-radius: 3px;
        }
        
        .field-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .field-label {
            color: #64748b;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .field-value {
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 50px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .field-value::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(129, 213, 198, 0.1), transparent);
            transition: left 0.5s;
        }
        
        .field-value:hover {
            border-color: #81D5C6;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(129, 213, 198, 0.2);
        }
        
        .field-value:hover::before {
            left: 100%;
        }
        
        .status-field {
            background: linear-gradient(135deg, #FFF153 0%, #FFE066 100%);
            color: #8B5CF6;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(255, 241, 83, 0.3);
        }
        
        .form-control, input[type="date"] {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.8);
        }
        
        .form-control:focus, input[type="date"]:focus {
            border-color: #81D5C6;
            box-shadow: 0 0 0 3px rgba(129, 213, 198, 0.1);
            outline: none;
        }
        
        .modal-footer {
            background: rgba(248, 250, 252, 0.8);
            border: none;
            padding: 1.5rem 2rem;
            gap: 1rem;
            display: flex;
            justify-content: flex-end;
        }
        
        .action-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            border: none;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.875rem;
        }
        
        .action-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transition: all 0.5s;
            transform: translate(-50%, -50%);
        }
        
        .action-btn:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-close {
            background: linear-gradient(135deg, #FFF153 0%, #FFE066 100%);
            color: #6B7280;
            box-shadow: 0 4px 15px rgba(255, 241, 83, 0.3);
        }
        
        .btn-close:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 241, 83, 0.4);
            color: #374151;
        }
        
        .btn-reject {
            background: linear-gradient(135deg, #FF453F 0%, #FF6B6B 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 69, 63, 0.3);
        }
        
        .btn-reject:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 69, 63, 0.4);
            color: white;
        }
        
        .btn-approve {
            background: linear-gradient(135deg, #81D5C6 0%, #A8E6CF 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(129, 213, 198, 0.3);
        }
        
        .btn-approve:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(129, 213, 198, 0.4);
            color: white;
        }
        
        .row {
            margin-bottom: 0.5rem;
        }
        
        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 2rem 0;
        }
        
        .icon-personal::before { content: '\f007'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .icon-contact::before { content: '\f095'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .icon-location::before { content: '\f3c5'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .icon-calendar::before { content: '\f073'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .icon-certificate::before { content: '\f0a3'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .icon-status::before { content: '\f05a'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .icon-message::before { content: '\f27a'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        .icon-purpose::before { content: '\f0eb'; font-family: 'Font Awesome 6 Free'; font-weight: 900; }
        
        @media (max-width: 768px) {
            .modal-dialog {
                margin: 1rem;
                width: auto;
                max-width: none;
            }
            
            .modal-body {
                padding: 1rem;
            }
            
            .modal-footer {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .action-btn {
                width: 100%;
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
                <a class="dropdown-item ml-3 font-inter href="settings_addNew_off.php">Add New Official</a>
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
  <div class="content-wrapper bg-white ">

    <!-- Main Content -->
    <section class="content ">
        <div class="container-fluid  p-2">
            <div class="card p-0 font-inter">
                <div class="col p-2 elevation-2 d-flex justify-content-between">
                
                    <div class="col p-2">
                        <div class="container-fluid p-2 elevation-2"  style=" border-radius: 10px;">
                            <div class="card elevation-0" >
                                <div class="card-body p-2" style="border: none;">
                                    <!-- request_document_table.html -->
                                    <fieldset>
                                                <div class="p-2 w-100">
                                                    <div class="row p-2 mb-3">
                                                        <div class="col-2 text-center p-2 mr-3 d-flex justify-content-between pending-card" style="border-radius:15px;">
                                                            <p class="m-0 text-center text-white font-weight-bold mt-1">
                                                                <i class="fas fa-clock mr-2"></i>Pending
                                                            </p>
                                                            <div class="pending-count-badge p-1 font-weight-bold" style="width: 35px; height: 35px; border-radius: 10px;">
                                                                <p id="pendingCount" class="m-0">0</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="search-container">
                                                        <div class="row p-2 d-flex justify-content-between">
                                                            <div class="col-5 search-input-group">
                                                                <i class="fas fa-magnifying-glass search-icon"></i>
                                                                <input type="text" id="searching" class="form-control search-input" placeholder="Search by Name, Purpose, or Certificate..." autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="table-container">
                                                    <div class="table-responsive" style="max-height: 400px; overflow: auto;">
                                                        <table class="table table-hover mb-0" id="officialTable">
                                                            <thead class="text-uppercase text-white">
                                                                <tr>
                                                                    <th class="px-3 text-center" style="width: 20%;">
                                                                        <i class="fas fa-user mr-2"></i>Full Name
                                                                    </th>
                                                                    <th class="px-3 text-center" style="width: 15%;">
                                                                        <i class="fas fa-clipboard-list mr-2"></i>Purpose
                                                                    </th>
                                                                    <th class="px-3 text-center" style="width: 20%;">
                                                                        <i class="fas fa-calendar mr-2"></i>Date Requested
                                                                    </th>
                                                                    <th class="px-3 text-center" style="width: 20%;">
                                                                        <i class="fas fa-certificate mr-2"></i>Certificate
                                                                    </th>
                                                                    <th class="px-3 text-center" style="width: 15%;">
                                                                        <i class="fas fa-info-circle mr-2"></i>Status
                                                                    </th>
                                                                    <th class="px-3 text-center" style="width: 10%;">
                                                                        <i class="fas fa-cogs mr-2"></i>Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="requestTableBody">
                                                                <!-- Loading state -->
                                                                <tr class="loading-row">
                                                                    <td colspan="6">
                                                                        <div class="loading-spinner"></div>
                                                                        <p class="text-muted mb-0">Loading certificate requests...</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- END OF COL -->
            </div>
            <!-- END OF CARD -->
        </div>
        <!-- CONTAINER-FLUID ENDING -->
    </section>
    <!-- SECTION ENDING -->
  </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->







<!-- VIEW OF REQUEST PROFILE MODAL -->
    <div class="modal fade font-inter animate-fade-in" id="newModalPosition" data-backdrop="static" data-keyboard="false" 
         tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

        <div class="modal-dialog modal-lg p-3" role="document" 
              style="border-radius: 20px; height: 750px; width: 980px;">
            <div class="modal-content p-0" style="border-radius: 20px; height: 680px; border: none;">
                <div class="modal-header m-0" style="position: sticky; top: 0; z-index: 10; border-radius: 20px 20px 0 0;">
                    <h3>Profile Overview</h3>
                </div>
                <div class="modal-body p-1 m-2">
                    <div class="container-fluid p-1">
                        
                        <!-- Personal Information Section -->
                        <div class="row">
                           <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-personal">First Name</p>
                                    <p class="field-value" id="fname">John</p>
                                </div>    
                           </div>
                           <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-personal">Last Name</p>
                                    <p class="field-value" id="lname">Doe</p>
                                </div>   
                           </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-personal">Middle Name</p>
                                    <p class="field-value" id="mname">Michael</p>
                                </div>    
                           </div>
                           <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-personal">Suffix</p>
                                    <p class="field-value" id="suffix">Jr.</p>
                                </div>   
                           </div>
                        </div>
                        
                        <div class="section-divider"></div>
                        
                        <!-- Birth & Location Information -->
                        <div class="row">
                            <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-calendar">Date of Birth</p>
                                    <p class="field-value" id="date_of_birth">January 15, 1990</p>
                                </div>   
                            </div>
                            <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-location">Place of Birth</p>
                                    <p class="field-value" id="place_of_birth">New York, NY</p>
                                </div>   
                            </div>
                        </div>
                        
                        <div class="section-divider"></div>
                        
                        <!-- Contact Information -->
                        <div class="row">
                          <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-contact">Email</p>
                                    <p class="field-value" id="email">john.doe@email.com</p>
                                </div>   
                           </div>
                           <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-contact">Contact Number</p>
                                    <p class="field-value" id="contactNum">+1 (555) 123-4567</p>
                                </div>   
                           </div>
                        </div>
                        
                        <div class="section-divider"></div>
                        
                        <!-- Request Information -->
                        <div class="row">
                            <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-calendar">Date Requested</p>
                                    <p class="field-value" id="dateRequested">12-21-2003</p>
                                </div>   
                            </div>
                            <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-certificate">Certificate</p>
                                    <p class="field-value" id="certificateRequested">Birth Certificate</p>
                                </div>    
                           </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-calendar">Years of Residence</p>
                                    <p class="field-value" id="yrs_of_residence">5 years</p>
                                </div>   
                            </div>
                            <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-personal">Civil Status</p>
                                    <p class="field-value" id="civil_status">Single</p>
                                </div>   
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-status">Status</p>
                                    <p class="field-value status-field" id="request_status">Pending Review</p>
                                </div>   
                            </div>
                        </div>
                        
                        <div class="section-divider"></div>
                        
                        <!-- Purpose & Message -->
                        <div class="row">
                            <div class="col p-2">
                                <div class="field-group">
                                    <p class="field-label icon-purpose">Purpose</p>
                                    <p class="field-value" id="purpose">For employment requirements</p>
                                </div>   
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col p-2">
                                <div class="field-group">
                                    <p class="field-label icon-message">Message</p>
                                    <form id="message" method="POST">
                                    <textarea 
                                        class="form-control w-100" 
                                        rows="3" 
                                        placeholder="Type your message here..."></textarea>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="section-divider"></div>
                        
                        <!-- Date Fields -->
                        <div class="row">
                            <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-calendar">Date Issued</p>
                                    <input type="date" class="w-100" id="dateIssued">
                                </div>
                            </div>
                            <div class="col-6 p-2">
                                <div class="field-group">
                                    <p class="field-label icon-calendar">Date Issued Expiration</p>
                                    <input type="date" class="w-100" id="dateIssuedExpiration">
                                </div> 
                           </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="action-btn btn-close" id="closeModalBtn" data-dismiss="modal">
                    <i class="fas fa-times"></i> Close
                  </button>
                  <button type="button" class="action-btn btn-reject" id="rejectModalBtn">
                    <i class="fa-solid fa-thumbs-down"></i> Reject
                  </button>
                  <button type="submit" class="action-btn btn-approve" id="approvedModalBtn">
                    <i class="fa-solid fa-thumbs-up"></i> Approve
                  </button>
                </div>
            </div>
        </div>
    </div>






<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../assets/dist/js/adminlte.js"></script>




<!-- SCRIPT FOR SETTINGS DROP DOWN -->
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
        // Enhanced JavaScript that works with your existing views
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch data from server
            fetch('../views/admin/get_request.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update pending count with animation
                        const pendingCountElement = document.getElementById('pendingCount');
                        const currentCount = parseInt(pendingCountElement.textContent) || 0;
                        const targetCount = data.pendingCount;
                        animateCount(pendingCountElement, currentCount, targetCount);
                        
                        // Populate table
                        const tableBody = document.getElementById('requestTableBody');
                        tableBody.innerHTML = '';
                        
                        data.data.forEach((row, index) => {
                            // Format full name
                            let fullName = `${row.req_last_name}, ${row.req_first_name}`;
                            if (row.req_middle_name) {
                                fullName += ` ${row.req_middle_name.charAt(0)}.`;
                            }
                            if (row.req_suffix) {
                                fullName += ` ${row.req_suffix}`;
                            }
                            
                            // Format date
                            const requestedDate = new Date(row.req_requested_date).toISOString().split('T')[0];
                            
                            // Get status badge
                            const statusBadge = getStatusBadge(row.req_status);
                            
                            // Create table row
                            const tr = document.createElement('tr');
                            tr.className = 'text-center align-middle';
                            tr.style.animationDelay = `${index * 0.1}s`;
                            
                            tr.innerHTML = `
                                <td class="text-center align-middle">
                                    <div class="name-cell">${escapeHtml(fullName)}</div>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="purpose-cell">${escapeHtml(row.req_purpose)}</div>
                                </td>
                                <td class="text-center align-middle">
                                    <span class="date-badge">${requestedDate}</span>
                                </td>
                                <td class="text-center align-middle">
                                    <span class="certificate-badge">${escapeHtml(row.cer_type_name || 'N/A')}</span>
                                </td>
                                <td class="text-center align-middle">
                                    ${statusBadge}
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn action-btn modalBtn" 
                                            data-id="${row.req_id}" data-toggle="modal" data-target="#newModalPosition"
                                            title="View Details">
                                        <i class="fa-solid fa-eye mr-1"></i>View
                                    </button>
                                </td>
                            `;
                            
                            tableBody.appendChild(tr);
                        });
                        



                        // Add event listeners to modal buttons
                        document.querySelectorAll('.modalBtn').forEach(btn => {
                          btn.addEventListener('click', function() {
                              const reqId = this.getAttribute('data-id');
                              // Find the request data
                              const request = data.data.find(item => item.req_id == reqId);
                              
                              if (request) {
                                  // Populate modal fields
                                  document.getElementById('fname').textContent = request.req_first_name || 'N/A';
                                  document.getElementById('lname').textContent = request.req_last_name || 'N/A';
                                  document.getElementById('mname').textContent = request.req_middle_name || 'N/A';
                                  document.getElementById('suffix').textContent = request.req_suffix || 'N/A';
                                  document.getElementById('date_of_birth').textContent = request.req_date_of_birth ? formatDate(request.req_date_of_birth) : 'N/A';
                                  document.getElementById('place_of_birth').textContent = request.req_place_of_birth || 'N/A';
                                  document.getElementById('email').textContent = request.req_email || 'N/A';
                                  document.getElementById('contactNum').textContent = request.req_contact || 'N/A';
                                  document.getElementById('dateRequested').textContent = formatDate(request.req_requested_date);
                                  document.getElementById('certificateRequested').textContent = request.cer_type_name || 'N/A';
                                  document.getElementById('yrs_of_residence').textContent = request.req_years_resident || 'N/A';
                                  document.getElementById('civil_status').textContent = request.req_civil_status || 'N/A';
                                  document.getElementById('request_status').textContent = capitalizeFirstLetter(request.req_status);
                                  document.getElementById('purpose').textContent = request.req_purpose || 'N/A';
                                  
                                  // Set status color
                                  const statusElement = document.getElementById('request_status');
                                  statusElement.style.backgroundColor = '';
                                  if (request.req_status === 'approved') {
                                      statusElement.style.backgroundColor = '#81D5C6';
                                  } else if (request.req_status === 'rejected') {
                                      statusElement.style.backgroundColor = '#FF453F';
                                  } else {
                                      statusElement.style.backgroundColor = '#FFF153';
                                  }
                                  
                                  // Set date inputs
                                  document.getElementById('dateIssued').value = request.req_date_issued || '';
                                  document.getElementById('dateIssuedExpiration').value = request.req_date_expiration || '';
                                  
                                  // Set message if exists
                                  document.querySelector('#message textarea').value = request.req_message || '';
                                  
                                  // Show modal
                                  $('#newModalPosition').modal('show');
                                  
                                  // Store the request ID in the modal buttons
                                  document.getElementById('rejectModalBtn').setAttribute('data-id', reqId);
                                  document.getElementById('approvedModalBtn').setAttribute('data-id', reqId);
                              }
                          });
                      });
                      
                      // Helper function to format date
                      function formatDate(dateString) {
                          if (!dateString) return 'N/A';
                          const date = new Date(dateString);
                          return date.toISOString().split('T')[0];
                      }
                      
                      // Add event listeners for approve/reject buttons
                      document.getElementById('approvedModalBtn').addEventListener('click', function() {
                          showNotification('Request has been approved successfully!', 'success');
                          updateRequestStatus(this.getAttribute('data-id'), 'approved');
                      });
                      
                      document.getElementById('rejectModalBtn').addEventListener('click', function() {
                          showNotification('Request has been rejected.', 'warning');
                          updateRequestStatus(this.getAttribute('data-id'), 'rejected');
                      });
                      
                      // Function to update request status
                      function updateRequestStatus(reqId, status) {
                          const message = document.querySelector('#message textarea').value;
                          const dateIssued = document.getElementById('dateIssued').value;
                          const dateExpiration = document.getElementById('dateIssuedExpiration').value;
                          
                          fetch('../views/admin/update_request_status.php', {
                              method: 'POST',
                              headers: {
                                  'Content-Type': 'application/json',
                              },
                              body: JSON.stringify({
                                  req_id: reqId,
                                  status: status,
                                  message: message,
                                  date_issued: dateIssued,
                                  date_expiration: dateExpiration
                              })
                          })
                          .then(response => response.json())
                          .then(data => {
                              if (data.success) {
                                  location.reload(); // Refresh the page to see changes
                              } else {
                                  alert('Error: ' + (data.error || 'Failed to update status'));
                              }
                          })
                          .catch(error => {
                              console.error('Error:', error);
                              alert('An error occurred while updating the status');
                          });
                      }
                      
                        attachModalListeners(data.data);
                        
                    } else {
                        showErrorState();
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    showErrorState();
                });
            
            // Enhanced search functionality with debounce
            let searchTimeout;
            document.getElementById('searching').addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    const searchTerm = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#requestTableBody tr');
                    
                    rows.forEach(row => {
                        if (row.classList.contains('loading-row') || row.classList.contains('error-row')) return;
                        
                        const name = row.cells[0].textContent.toLowerCase();
                        const purpose = row.cells[1].textContent.toLowerCase();
                        const certificate = row.cells[3].textContent.toLowerCase();
                        
                        const matches = name.includes(searchTerm) || 
                                       purpose.includes(searchTerm) || 
                                       certificate.includes(searchTerm);
                        
                        row.style.display = matches ? '' : 'none';
                        
                        // Add fade effect
                        if (matches) {
                            row.style.opacity = '0';
                            setTimeout(() => {
                                row.style.opacity = '1';
                                row.style.transition = 'opacity 0.3s ease';
                            }, 50);
                        }
                    });
                }, 300);
            });
        });

        // Enhanced status badge function
        function getStatusBadge(status) {
            const statusConfig = {
                'pending': {
                    class: 'status-pending',
                    icon: 'fas fa-clock',
                    text: 'Pending'
                },
                'approved': {
                    class: 'status-approved',
                    icon: 'fas fa-check-circle',
                    text: 'Approved'
                },
                'rejected': {
                    class: 'status-rejected',
                    icon: 'fas fa-times-circle',
                    text: 'Rejected'
                }
            };

            const config = statusConfig[status] || statusConfig['pending'];
            
            return `<span class="status-badge ${config.class}">
                        <i class="${config.icon}"></i>
                        ${config.text}
                    </span>`;
        }

        // Auto-hide success/error messages
            function showNotification(message, type = 'success') {
                const notification = $(`
                    <div class="alert alert-${type} alert-dismissible fade show position-fixed" 
                         style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
                        <strong>${type === 'success' ? 'Success!' : 'Error!'}</strong> ${message}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                `);
                
                $('body').append(notification);
                
                setTimeout(() => {
                    notification.alert('close');
                }, 5000);
            }

        // Animate count function
        function animateCount(element, start, end) {
            const duration = 1000;
            const increment = (end - start) / (duration / 16);
            let current = start;
            
            const timer = setInterval(() => {
                current += increment;
                if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
                    current = end;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 16);
        }

        // Show error state
        function showErrorState() {
            const tableBody = document.getElementById('requestTableBody');
            tableBody.innerHTML = `
                <tr class="error-row">
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                        <h5 class="text-muted">Unable to load data</h5>
                        <p class="text-muted mb-3">Please check your connection and try again</p>
                        <button class="btn btn-outline-primary" onclick="location.reload()">
                            <i class="fas fa-refresh mr-2"></i>Refresh
                        </button>
                    </td>
                </tr>
            `;
        }

        // Attach modal listeners (your existing code)
        function attachModalListeners(data) {
            document.querySelectorAll('.modalBtn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const reqId = this.getAttribute('data-id');
                    const request = data.find(item => item.req_id == reqId);
                    
                    if (request) {
                        // Your existing modal population code here...
                        populateModal(request);
                    }
                });
            });
        }

        // Your existing helper functions
        function escapeHtml(unsafe) {
            return unsafe
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        // Add your existing modal population and update functions here...
</script>

</body>
</html>
