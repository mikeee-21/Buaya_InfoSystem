<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Account Management</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
      border-radius: 50%;
    }

    .logo-container img {
      height: 40px;
      margin-right: 10px;
      border-radius: 50%;
    }

    .icon-link {
      text-decoration: none;
      font-size: 1.2rem;
    }

    .custom-gap {
      margin-right: 45px;
    }

    .main-container {
      max-width: 1100px;
      background-color: white;
      margin: 40px auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .form-control:focus {
      box-shadow: none;
    }


    .btn-add-admin {
      background-color: #ffde00;
      color: black;
      border: none;
      border-radius: 5px;
      padding: 8px 20px;
      font-weight: 600;
    }

    .btn-add-admin:hover {
      background-color: #f1d500;
    }






/*---------------------- table css ---------------------*/

.admin-table {
  border-collapse: separate;
  border-spacing: 0 10px;
  width: 100%;
  font-family: Arial, sans-serif;
}

.admin-table thead tr {
  background-color: #d0e7f9;
  border-radius: 5px;
}

.admin-table thead th {
  padding: 12px 10px;
  text-align: center;
  font-weight: bold;
}

.admin-table tbody tr {
  background-color: #e9f4fc;
  border-radius: 5px;
  text-align: center;
}

.admin-table tbody td {
  padding: 12px 10px;
  white-space: nowrap;
  overflow-x: auto;
  overflow-y: hidden;
  max-width: 200px;
  border-top: 1px solid #cce3f6;
  border-bottom: 1px solid #cce3f6;
}

.admin-table tbody td:first-child {
  border-left: 1px solid #cce3f6;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}

.admin-table tbody td:last-child {
  border-right: 1px solid #cce3f6;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.action-cell {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
}

.action-cell i {
  font-size: 0.95rem;
  cursor: pointer;
}













    
    .admin-image {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
    }

    .modal-dialog {
      max-width: 800px;
    }

    .modal-body {
      padding: 2rem;
    }

    .modal-page {
      display: none;
    }

    .modal-page.active {
      display: block;
    }

    .modal-content {
      background-color: #C2E3FF;
      padding: 15px;
    }

    .input-group-text {
      cursor: pointer;
    }


    .btn-edit {
      background-color: #007bff;
      color: white;
      font-weight: 600;
    }

    .btn-edit:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="top-bar">
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
          <a href="dashboard.php" class="text-white icon-link custom-gap"><i class="fas fa-home"></i></a>
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
          <a href="../views/admin/sign_out.php" class="text-white text-decoration-none"><i class="fas fa-sign-out-alt"></i> Sign out</a>
        </div>
      </div>
    </div>
  </div>

  <div class="main-container">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
      <div class="d-flex align-items-center">
        <div class="input-group">
          <span class="input-group-text bg-warning"><i class="fas fa-search"></i></span>
          <input type="text" class="form-control" id="searchInput" placeholder="Search admin..." />
        </div>
      </div>
      <div class="d-flex align-items-center mb-3">
        <label for="roleFilter" class="form-label mb-0 me-2">Filter by:</label>
        <select id="roleFilter" class="form-select w-auto">
          <option selected disabled>Select Role</option>
          <option>Barangay Captain</option>
          <option>Barangay Councilor</option>
          <option>Barangay Secretary</option>
          <option>SK Chairman</option>
          <option>SK Councilor</option>
        </select>
      </div>
    </div>


    <table class="admin-table w-100">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Permission</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="adminList">
    </tbody>
  </table>    







    <div class="text-end mt-4">
      <a href="add_admin.php" class="btn btn-add-admin">Add Admin</a>
    </div>
  </div>

  <div class="modal fade" id="adminDetailsModal" tabindex="-1" aria-labelledby="adminDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminDetailsModalLabel">Admin Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="adminDetailsContent"></div>
        </div>
      </div>
    </div>
  </div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
  $.ajax({
    url: '../views/superadmin/get_allAdmins.php',
    method: 'GET',
    success: function(data) {
      const admins = JSON.parse(data);  // Parse the JSON response
      let adminRows = '';
      admins.forEach(admin => {
        const fullName = `${admin.admin_fname} ${admin.admin_mname} ${admin.admin_lname} ${admin.admin_suffix}`;
        adminRows += `
          <tr class="admin-row"
              data-id="${admin.admin_id}"
              data-name="${fullName}"
              data-role="${admin.role_name}"
              data-permission="${admin.permission_group}"
              data-email="${admin.admin_email}"
              data-contact="${admin.admin_contact}"
              data-username="${admin.admin_username}"
              data-password="${admin.admin_password}"
              data-image="${admin.admin_image || 'img/default.jpg'}">

            <td>${fullName}</td>
            <td>${admin.admin_email}</td>
            <td>${admin.role_name}</td>
            <td>${admin.permission_group}</td>
            <td class="action-cell">
              <i class="fas fa-eye text-primary me-2" data-id="${admin.admin_id}"></i>
              <i class="fas fa-trash text-danger" onclick="deleteAdmin(this)"></i>
            </td>
          </tr>`;
      });

      $('#adminList').html(adminRows); // Inject HTML
    },
    error: function() {
      $('#adminList').html('<p>Error loading admin list.</p>');
    }
  });

</script>





<script>
  // Toggle password and username visibility (MAKE THIS GLOBAL)
  function toggleVisibility(fieldId, iconSpan) {
    const input = document.getElementById(fieldId);
    const icon = iconSpan.querySelector("i");
    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }

  function nextModalPage() {
    document.getElementById('modalPage1').classList.remove('active');
    document.getElementById('modalPage2').classList.add('active');
  }

  function prevModalPage() {
    document.getElementById('modalPage2').classList.remove('active');
    document.getElementById('modalPage1').classList.add('active');
  }

  $(document).ready(function () {
    $('body').on('click', '.fa-eye[data-id]', function () {
      const adminId = $(this).data('id');
      const adminRow = $(`tr[data-id="${adminId}"]`);

      const fullName = adminRow.data('name');
      const role = adminRow.data('role');
      const permission_group = adminRow.data('permission');
      const email = adminRow.data('email');
      const contact = adminRow.data('contact') || 'N/A';
      const username = adminRow.data('username') || 'N/A';
      const image = adminRow.data('image') || 'img/default.jpg';

      const content = `
        <div class="modal-page active" id="modalPage1">
          <div class="row mb-3">
            <div class="col-md-4 text-center">
              <img src="${image}" alt="${fullName}" class="admin-image mb-2" />
            </div>
            <div class="col-md-8">
              <div class="row mb-2">
                <div class="col-md-6">
                  <label class="form-label">Full Name</label>
                  <input type="text" class="form-control" value="${fullName}" readonly>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Role</label>
                  <input type="text" class="form-control" value="${role}" readonly>
                </div>
              </div>
              <div class="mb-2">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="${email}" readonly>
              </div>
              <div class="mb-3">
                <label class="form-label">Permission</label>
                <input type="text" class="form-control" value="${permission_group}" readonly>
              </div>
            </div>
          </div>
          <div class="text-end">
            <button class="btn btn-primary" onclick="nextModalPage()">Next</button>
          </div>
        </div>
        <div class="modal-page" id="modalPage2">
          <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="text" class="form-control" value="${contact}" readonly>
          </div>
          <div class="mb-3 position-relative">
            <label class="form-label">Username</label>
            <div class="input-group">
              <input type="password" class="form-control" id="usernameField" value="${username}" readonly>
              <span class="input-group-text" onclick="toggleVisibility('usernameField', this)">
                <i class="fas fa-eye"></i>
              </span>
            </div>
          </div>
          <!-- Add this new password field section -->
          <div class="mb-3 position-relative">
            <label class="form-label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="passwordField" value="${adminRow.data('password')}" readonly>
              <span class="input-group-text" onclick="toggleVisibility('passwordField', this)">
                <i class="fas fa-eye"></i>
              </span>
            </div>
          </div>
          <div class="text-end">
            <button class="btn btn-edit me-2">
              <a href="edit_admin.php?id=${adminId}" class="text-white text-decoration-none">Edit</a>
            </button>
            <button class="btn btn-secondary me-2" onclick="prevModalPage()">Back</button>
            <button class="btn btn-success" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      `;

      $('#adminDetailsContent').html(content);

      // Force close existing modal before showing again (just in case)
      const modalInstance = bootstrap.Modal.getOrCreateInstance(document.getElementById('adminDetailsModal'));
      modalInstance.show();
    });

    // On modal hidden, remove dark overlay if still present
    $('#adminDetailsModal').on('hidden.bs.modal', function () {
      $('body').removeClass('modal-open');
      $('.modal-backdrop').remove();
    });
  });





  //search
  $(document).ready(function () {


    $.ajax({
      url: '../views/superadmin/get_roles_for_searching.php',
      method: 'GET',
      success: function(response) {
        const roles = JSON.parse(response);
        const roleFilter = $('#roleFilter');
        roleFilter.empty().append('<option selected disabled>Select Role</option>');

        roles.forEach(role => {
          roleFilter.append(`<option value="${role.role_name}">${role.role_name}</option>`);
        });
      },
      error: function() {
        console.error('Failed to fetch roles');
      }
});




  // Filter by search input
  $('#searchInput').on('keyup', function () {
    const value = $(this).val().toLowerCase();
    $('#adminList tr').each(function () {
      const rowText = $(this).text().toLowerCase();
      if (rowText.includes(value)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  // Filter by role selection
  $('#roleFilter').on('change', function () {
    const selectedRole = $(this).val().toLowerCase();
    $('#adminList tr').each(function () {
      const role = $(this).data('role').toLowerCase();
      if (selectedRole === 'select role' || role.includes(selectedRole)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });


});






// Delete admin 
function deleteAdmin(icon) {
  const row = $(icon).closest('tr');
  const adminId = row.data('id');

  // Use SweetAlert2 for confirmation
  Swal.fire({
    title: 'Are you sure?',
    text: "You want to delete this admin?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      // Make AJAX call to delete admin
      $.ajax({
        url: '../views/superadmin/delete_admin.php',
        method: 'POST',
        data: { admin_id: adminId },
        success: function (response) {
          const result = JSON.parse(response);
          if (result.success) {
            row.remove(); // Remove from HTML table
            Swal.fire(
              'Deleted!',
              'Admin has been deleted.',
              'success'
            );
          } else {
            Swal.fire(
              'Failed!',
              'Failed to delete admin: ' + result.message,
              'error'
            );
          }
        },
        error: function () {
          Swal.fire(
            'Error!',
            'Something went wrong.',
            'error'
          );
        }
      });
    }
  });
}







</script>



</body>
</html>
