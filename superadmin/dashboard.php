<?php
session_start();
require_once '../backend/admin/adminSession.php';

// Deserialize the admin object
if (isset($_SESSION['admin_object'])) {
    $adminObject = unserialize($_SESSION['admin_object']);
    $adminName = $adminObject->getUsername(); // or $adminObject->admin_username if public
}

if (isset($_SESSION['login_success'])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Login Successful!',
                text: 'Welcome back,   {$adminName}!',
                icon: 'success',
                confirmButtonText: 'Continue'
            });
        });
    </script>";

    unset($_SESSION['login_success']);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color: #f5f5f5;
        }
        .top-bar {
            background-color: #0a0a6b;
            color: white;
            padding: 10px 0;
        }
        .logo-container {
            display: flex;
            align-items: center;
        }
            .icon-link {
            text-decoration: none !important;
            font-size: 1.2rem;
        }
        .logo-container img {
            height: 40px;
            margin-right: 10px;
            border-radius: 50%;
        }


        /* FONT */
        .font-inter {
        font-family: 'Inter', sans-serif;
        }









        /* Avatar Circle Styling */
        .avatar-container {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding: 10px;
        }


        .admin-card {
            width: 150px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .avatar-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #ccc;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 50%;
        }

        .role-name, .permission-group {
            font-size: 12px;
            color: #333;
            text-align: center;
            margin-top: 5px;
            word-wrap: break-word; /* Ensures long words break */
            white-space: normal;    /* Ensures multi-word phrases wrap */
        }

        .role-name {
            font-size: 13px;
            font-weight: bold;
            color: #007bff; 
        }

        .permission-group {
            color:rgb(0, 0, 0); 
        }
        .admin-name {
            font-weight: bold;
            font-size: 15px;
            color:rgb(0, 0, 0); /* Role color */
            margin-top: 4px;
        }






















        .stat-card {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        .arrow-pagination .arrow-btn {
            text-decoration: none; 
        }
        .stat-icon {
            font-size: 24px;
            width: 50px;
            height: 50px;
            line-height: 50px;
            border-radius: 50%;
            margin: 0 auto 10px;
            color: white;
        }
        .bg-gold {
            background-color: #ffc107;
        }
        .bg-teal {
            background-color: #20c997;
        }
        .bg-danger {
            background-color: #dc3545;
        }
        .bg-info {
            background-color: #17a2b8;
        }
        .stat-number {
            font-size: 24px;
            font-weight: bold;
        }

        /* activity logs */
        .activity-list {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-height: 250px;
            overflow-y: auto;
        }

        .activity-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; /* Changed from 'start' to 'flex-start' for better compatibility */
            width: 100%;
            padding: 10px;
            border-bottom: 1px solid #f0f0f0;
            gap: 10px; /* Added gap for better spacing */
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-item:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Fixed the indicator styling */
        .activity-left {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            flex-grow: 1;
        }

        .activity-indicator {
            min-width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #28a745;
            margin-top: 5px; /* Added margin-top to align with text */
            flex-shrink: 0; /* Prevent shrinking */
        }

        .activity-content {
            flex-grow: 1;
        }

        .activity-time {
            text-align: right;
            font-size: 0.85rem;
            color: #6c757d;
            white-space: nowrap; /* Prevent time from wrapping */
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        /* New styles for arrow pagination */
        .arrow-pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .arrow-pagination .arrow-btn {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            border-radius: 50%;
            color: #333;
            transition: all 0.2s;
        }

        .arrow-pagination .arrow-btn:hover {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .custom-gap {
        margin-right: 45px;
        }
        .arrow-pagination .arrow-btn:hover {
            background-color: #0a0a6b;
            color: white;
            cursor: pointer;
        }
        .arrow-pagination .arrow-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
</head>
<body>


  <!-- Top Navigation Bar -->
  <div class="top-bar font-inter">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-8">
          <div class="logo-container">
            <a href="buayaProfile.php">
                <img src="img/logo.jpg" alt="Logo" class="logo" />
            </a>
            <h5 class="mb-0">Super Admin</h5>
          </div>
        </div>
        <div class="col-4 text-end d-flex justify-content-end align-items-center">
            <a href="dashboard.php" class="text-white icon-link custom-gap"><i class="fas fa-home "></i></a>
          <div class="dropdown custom-gap">
            <button class="btn btn-link text-white p-0 icon-link" type="button" id="settingsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-cog"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="acc_mngmnt.php">Admin Account Management</a></li>
                <li><a class="dropdown-item" href="audit_log.php">Audit Logs</a></li>
                <li><a class="dropdown-item" href="adminProfile_Settings.php">Buaya Profile Settings</a></li>
            </ul>
          </div>
          <a href="../backend/admin/sign_out.php" class="text-white text-decoration-none"><i class="fas fa-sign-out-alt"></i> Sign out</a>
        </div>
      </div>
    </div>
  </div>


    <div class="container mt-4">
        <!-- admins avatars -->
        <div class="avatar-container">
            <div id="avatarList" class="d-flex justify-content-center w-100">
                <!-- avatars will be populated dynamically -->
            </div>
        </div>

        <!-- stats cards -->
        <div class="row font-inter">
            <div class="col-md-3 col-sm-6">
                <div class="stat-card" data-bs-toggle="modal" data-bs-target="#totalAdminsModal">
                    <div class="stat-icon bg-gold">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-label">Total Admins</div>
                    <div id="totalAdmins" class="stat-number"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card" data-bs-toggle="modal" data-bs-target="#activeAdminsModal">
                    <div class="stat-icon bg-teal">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-label">Active Admins</div>
                    <div id="activeAdmins" class="stat-number">0</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card" data-bs-toggle="modal" data-bs-target="#deactivatedAdminsModal">
                    <div class="stat-icon bg-danger">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-label">Deactivated</div>
                    <div id="deactivatedAdmins" class="stat-number">0</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card" data-bs-toggle="modal" data-bs-target="#recentLoginsModal">
                    <div class="stat-icon bg-info">
                        <i class="fas fa-history"></i>
                    </div>
                    <div class="stat-label">Recent Logins</div>
                    <div id="recentLogins" class="stat-number">0</div>
                </div>
            </div>
        </div>

                <!-- recent activities -->
                <div class="row mt-4">
                    <div class="col-12">
                        <h5>Recent Activities</h5>
                        <div class="activity-list">
                            <div id="activityContainer">
                                <!-- Activities will be populated dynamically -->
                            </div>
                        </div>
                                
                    <!-- arrow icon -->
                    <div class="pagination-container">
                    <div class="arrow-pagination">
                        <a href="audit_log.php" class="arrow-btn">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Modals for Admin Information -->
    <!-- Total Admins Modal -->
    <div class="modal fade" id="totalAdminsModal" tabindex="-1" aria-labelledby="totalAdminsModalLabel" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gold text-white">
                    <h5 class="modal-title" id="totalAdminsModalLabel">Total Admins</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody id="totalAdminsTable">
                                <!-- Will be populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Active Admins Modal -->
    <div class="modal fade" id="activeAdminsModal" tabindex="-1" aria-labelledby="activeAdminsModalLabel" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-teal text-white">
                    <h5 class="modal-title" id="activeAdminsModalLabel">Active Admins</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Last Active</th>
                                </tr>
                            </thead>
                            <tbody id="activeAdminsTable">
                                <!-- Will be populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Deactivated Admins Modal -->
    <div class="modal fade" id="deactivatedAdminsModal" tabindex="-1" aria-labelledby="deactivatedAdminsModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deactivatedAdminsModalLabel">Deactivated Admins</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Deactivation Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="deactivatedAdminsTable">
                                <!-- Will be populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Logins Modal -->
   <div class="modal fade" id="recentLoginsModal" tabindex="-1" aria-labelledby="recentLoginsModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="max-height: 750px; overflow-y: auto;">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="recentLoginsModalLabel">Recent Logins</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Login Date</th>
                                <th>Login Time</th>
                                <th>Session Duration</th>
                            </tr>
                        </thead>
                        <tbody id="recentLoginsTable">
                            <tr>
                                <td colspan="5" class="text-center">
                                    <div class="spinner-border text-primary my-3" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    





<!-- all admins here -->
 
<script>
    // Fetch admins and populate the avatars
    function fetchAdmins() {
        fetch('../backend/superadmin/get_allAdmins.php')
            .then(response => response.json())
            .then(data => {
                const avatarList = document.getElementById('avatarList');
                avatarList.innerHTML = ''; // Clear any previous data

                data.forEach(admin => {
                    const avatarItem = document.createElement('div');
                    avatarItem.classList.add('avatar-item', 'text-center', 'm-3');

                   // Create the avatar circle
                    avatarItem.innerHTML = `
                        <div class="admin-card text-center">
                            <div class="avatar-circle">
                                <img src="${admin.admin_image || 'default-avatar.png'}" alt="${admin.admin_username}" class="avatar-img">
                            </div>
                            <div class="admin-name mt-2 fw-bold font-inter">${admin.admin_fname} ${admin.admin_mname ? admin.admin_mname.charAt(0) + '.' : ''} ${admin.admin_lname} ${admin.admin_suffix || ''}</div>
                            <div class="role-name font-inter">${admin.role_name}</div>
                            <div class="permission-group">${admin.permission_group}</div>
                        </div>
                    `;

                    avatarList.appendChild(avatarItem);
                });
            })
            .catch(error => {
                console.error("Error fetching admins:", error);
            });
    }

    // Fetch admins when the page loads
    fetchAdmins();
</script>

    





<!-- GET THE TOTAL ADMINS -->
<script>
    $(document).ready(function () {
        $.ajax({
            url: '../backend/superadmin/get_total_admins.php',  // Update this path if necessary
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // Check if the response contains the total admins count
                if(response && response.total !== undefined) {
                    $('#totalAdmins').text(response.total);  // Update the displayed number
                } else {
                    console.error("Error: Total admins not returned correctly.");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching total admins:", error);
            }
        });
    });
</script>


<!-- display all admin here in this modal -->
<script>
$(document).ready(function() {
    $('#totalAdminsModal').on('show.bs.modal', function () {
        $.ajax({
            url: '../backend/superadmin/get_allAdmin_db.php', // adjust if needed
            method: 'GET',
            dataType: 'json',
            success: function(admins) {
                const tbody = $('#totalAdminsTable');
                tbody.empty(); // Clear old data
                admins.forEach(function(admin) {
                    const status = admin.admin_is_active ? 'Active' : 'Inactive';
                    const created = admin.created_by ? `By ${admin.created_by}` : 'Unknown';

                    tbody.append(`
                        <tr>
                            <td>${admin.admin_id}</td>
                            <td>${admin.admin_username}</td>
                            <td>${admin.admin_email}</td>
                            <td>
                                <span class="status-text pt-1 pb-1 ps-3 pe-3" style="color: white; border-radius: 5px; background-color: ${admin.admin_status === 'Active' ? 'green' : 'red'};">
                                    ${admin.admin_status}
                                </span>
                            </td>
                            <td>${admin.admin_created}</td>
                        </tr>
                    `);

                });
            },
            error: function(xhr, status, error) {
                console.error("Failed to fetch admin list:", error);
            }
        });
    });
});
</script>






<!-- GET ALL DEACTIVATED ADMINS -->
<script>
// Fetch the deactivated admin count
fetch('../backend/superadmin/get_all_total_inactive_admins.php')
    .then(response => response.json())
    .then(data => {
        // Update the Deactivated Admins count on the frontend
        document.getElementById('deactivatedAdmins').textContent = data.total;
    })
    .catch(error => {
        console.error("Error fetching deactivated admins:", error);
    });
</script>




<!-- display all deactivated admin here -->
<script>
$('#deactivatedAdminsModal').on('show.bs.modal', function () {
    fetchDeactivatedAdmins();
});

function fetchDeactivatedAdmins() {
    fetch('../backend/superadmin/get_all_inactive_admins.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('deactivatedAdminsTable');
            tableBody.innerHTML = ''; // Clear any previous data

            data.forEach(admin => {
                const row = document.createElement('tr');

                // Create table cells for each admin
                row.innerHTML = `
                    <td>${admin.admin_id}</td>
                    <td>${admin.admin_username}</td>
                    <td>${admin.admin_email}</td>
                    <td>${admin.admin_created}</td>
                    <td>
                        <!-- Actions like reactivate or delete could be added here -->
                        <button class="btn btn-sm btn-outline-success btn-reactivate" data-user-id="${admin.admin_id}">Reactivate</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => {
            console.error("Error fetching deactivated admins:", error);
        });
}

// Event delegation to handle the click event for Reactivate button
document.getElementById('deactivatedAdminsTable').addEventListener('click', function(event) {
    // Check if the clicked element is the Reactivate button
    if (event.target && event.target.classList.contains('btn-reactivate')) {
        const adminId = event.target.getAttribute('data-user-id');
        reactivateAdmin(adminId);  // Pass the adminId here
    }
});

// Function to reactivate an admin with SweetAlert
function reactivateAdmin(adminId) {
    fetch('../backend/superadmin/reactivate_admin.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ admin_id: adminId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // SweetAlert success message
            Swal.fire({
                icon: 'success',
                title: 'Admin Reactivated',
                text: 'The admin has been reactivated successfully!',
                confirmButtonText: 'Ok'
            });

            // Refresh the list of deactivated admins
            fetchDeactivatedAdmins();

            // Update the total deactivated admins count
            updateDeactivatedAdminCount();
            fetchAdmins();

        } else {
            // SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Reactivation Failed',
                text:  data.error || 'There was an issue reactivating the admin.',
                confirmButtonText: 'Ok'
            });
        }
    })
    .catch(error => {
        console.error("Error reactivating admin:", error);

        // SweetAlert error message in case of a fetch error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text:  data.error || 'Something went wrong while reactivating the admin.',
            confirmButtonText: 'Ok'
        });
    });
}

// Function to update the total deactivated admins count
function updateDeactivatedAdminCount() {
    fetch('../backend/superadmin/get_all_total_inactive_admins.php')
        .then(response => response.json())
        .then(data => {
            // Update the Deactivated Admins count on the frontend
            document.getElementById('deactivatedAdmins').textContent = data.total;
        })
        .catch(error => {
            console.error("Error fetching deactivated admins:", error);
        });
}

</script>








<script>
// Unified function to fetch total and all active admin details
function fetchAllActiveAdmins() {
    fetch('../backend/superadmin/get_all_active_admins.php')  // your new PHP file
        .then(response => response.json())
        .then(data => {
            // Update total count
            if (data.total_active !== undefined) {
                document.getElementById('activeAdmins').textContent = data.total_active;
            }

            // Update table if modal is open (or just always update)
            const tableBody = document.getElementById('activeAdminsTable');
            if (tableBody && data.admins) {
                tableBody.innerHTML = '';
                data.admins.forEach(admin => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${admin.admin_id}</td>
                        <td>${admin.admin_username}</td>
                        <td>${admin.admin_email}</td>
                        <td>${admin.login_time}</td>
                    `;
                    tableBody.appendChild(row);
                });
            }
        })
        .catch(error => {
            console.error("Error fetching active admins:", error);
        });
}

// When page loads
document.addEventListener('DOMContentLoaded', function() {
    fetchAllActiveAdmins();
    setInterval(fetchAllActiveAdmins, 5000);
});

// Optional: Refresh on modal open (if needed)
$('#activeAdminsModal').on('show.bs.modal', fetchAllActiveAdmins);
</script>




<!-- recent log ins -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('../backend/superadmin/get_count_recent_login.php')
        .then(response => response.json())
        .then(data => {
            if (data.count !== undefined) {
                const displayCount = data.count > 30 ? "30+" : data.count;
                document.getElementById('recentLogins').textContent = displayCount;
            }
        })
        .catch(error => {
            console.error('Error fetching recent login count:', error);
        });
});
</script>



<!-- recent log ins -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // When modal is shown, load the data
    $('#recentLoginsModal').on('show.bs.modal', function() {
        fetchRecentLogins();
    });

    function fetchRecentLogins() {
        fetch('../backend/superadmin/get_recent_login.php')
            .then(response => {
                if (!response.ok) throw new Error('Network error');
                return response.json();
            })
            .then(data => {
                renderRecentLogins(data);
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('recentLoginsTable').innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center text-danger">
                            Failed to load recent logins. Please try again.
                        </td>
                    </tr>`;
            });
    }

    function renderRecentLogins(logins) {
        const tableBody = document.getElementById('recentLoginsTable');
        
        if (!logins || logins.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        No login records found
                    </td>
                </tr>`;
            return;
        }

        tableBody.innerHTML = logins.map(login => {
            const loginTime = new Date(login.login_time);
            const logoutTime = login.logout_time ? new Date(login.logout_time) : null;
            
            return `
                <tr>
                    <td>${escapeHtml(login.admin_username)}<br>
                        <small class="text-muted">${escapeHtml(login.admin_fname)} ${escapeHtml(login.admin_lname)}</small>
                    </td>
                    <td>${loginTime.toLocaleDateString()}</td>
                    <td>${loginTime.toLocaleTimeString()}</td>
                    <td>
                        ${login.is_active ? 
                            '<span class="badge bg-success">Active</span>' : 
                            '<span class="badge bg-secondary">Ended</span>'}
                        ${logoutTime ? `<br><small class="text-muted">Ended: ${logoutTime.toLocaleTimeString()}</small>` : ''}
                    </td>
                </tr>`;
        }).join('');
    }

    function escapeHtml(unsafe) {
        return unsafe?.toString()
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;") || '';
    }
});
</script>


<!-- recent logs -->
<script>
$(document).ready(function() {
    // Fetch the recent activities (limit 10)
    $.ajax({
        url: '../backend/superadmin/get_recent_log.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            const container = $('#activityContainer');
            container.empty();

            if (data.length === 0) {
                container.append('<p>No recent activities found.</p>');
                return;
            }

            data.forEach(log => {
                const logItem = `
                    <div class="activity-item">
                        <div class="activity-left">
                            <span class="activity-indicator"></span>
                            <div class="activity-content">
                                <strong>${log.admin_name}</strong>: ${log.action}
                            </div>
                        </div>
                        <div class="activity-time">
                            <small class="text-muted">${log.date} at ${log.timestamp}</small>
                        </div>
                    </div>
                `;
                container.append(logItem);
            });
        },
        error: function(xhr, status, error) {
            console.error('Error fetching recent activities:', error);
            $('#activityContainer').append('<p>Error loading activities.</p>');
        }
    });
});
</script>


</body>
</html>
