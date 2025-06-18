
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Admin Account</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <!-- SweetAlert2 -->
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
    }

    .logo-container img {
      height: 40px;
      margin-right: 10px;
      border-radius: 50%;
    }

    .icon-link {
      text-decoration: none !important;
      font-size: 1.2rem;
    }

    .custom-gap {
      margin-right: 45px;
    }

    .form-container {
      background-color: white;
      border-radius: 10px;
      padding: 30px;
      margin: 30px auto;
      max-width: 850px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .loader-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(255, 255, 255, 0.8);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      display: none;
    }

    .loader {
      --r1: 154%;
      --r2: 68.5%;
      width: 60px;
      aspect-ratio: 1;
      border-radius: 50%;
      background:
        radial-gradient(var(--r1) var(--r2) at top, #0000 79.5%, #269af2 80%),
        radial-gradient(var(--r1) var(--r2) at bottom, #269af2 79.5%, #0000 80%),
        radial-gradient(var(--r1) var(--r2) at top, #0000 79.5%, #269af2 80%),
        #ccc;
      background-size: 50.5% 220%;
      background-position: -100% 0%, 0% 0%, 100% 0%;
      background-repeat: no-repeat;
      animation: l9 2s infinite linear;
    }

    @keyframes l9 {
      33%  {background-position: 0% 33%, 100% 33%, 200% 33%}
      66%  {background-position: -100% 66%, 0% 66%, 100% 66%}
      100% {background-position: 0% 100%, 100% 100%, 200% 100%}
    }
  </style>
</head>

<body>

<!-- Loader Overlay -->
<div class="loader-overlay" id="loader">
  <div class="loader"></div>
</div>

<!-- Top Navigation Bar -->
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
        <a href="../backend/admin/sign_out.php" class="text-white text-decoration-none"><i class="fas fa-sign-out-alt"></i> Sign out</a>
      </div>
    </div>
  </div>
</div>

<!-- Form -->
<div class="container">
  <div class="form-container">
    <h3 class="mb-4">Edit Admin Account</h3>
    <form id="editAdminForm">
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="fname" class="form-label">First Name</label>
          <input type="text" class="form-control" id="fname" required>
        </div>
        <div class="col-md-6">
          <label for="lname" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lname" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="mname" class="form-label">Middle Name</label>
          <input type="text" class="form-control" id="mname">
        </div>
        <div class="col-md-4">
          <label for="suffix" class="form-label">Suffix</label>
          <input type="text" class="form-control" id="suffix">
        </div>


<!-- Role Display -->
<div class="col-md-4">
  <label for="role" class="form-label">Role <small class="text-muted">(This field is not editable)</small></label>
  <input type="text" class="form-control-plaintext bg-white border border-secondary rounded px-2 py-1" id="role" readonly>
</div>

<!-- Permission Groups Display -->
<div class="mb-3 mt-4">
  <label class="form-label">Permission Group <small class="text-muted">(This field is not editable)</small>s</label>
  <div id="permission_groups_display" class="border p-3 rounded bg-light">
    <!-- Permission groups and permissions will be displayed here -->
    <p class="text-muted">Below are the permissions associated with the selected role. You cannot edit them from this view.</p>
  </div>
</div>




      <div class="row mb-3">
        <div class="col-md-6">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" required>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="contact" class="form-label">Contact Number</label>
          <input type="text" class="form-control" id="contact" required>
        </div>
        <div class="col-md-6">
          <label for="image" class="form-label">Update Image</label>
          <input type="file" class="form-control" id="image" accept="image/*">
        </div>
      </div>

      <div class="mb-3">
        <label for="superpass" class="form-label">Superadmin Password (for verification)</label>
        <input type="password" class="form-control" id="superpass" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Update Account</button>
    </form>
  </div>
</div>






























<!-- JavaScript -->
<script>
  const urlParams = new URLSearchParams(window.location.search);
  const adminId = urlParams.get('id');
  console.log("Admin ID from URL:", adminId);

  let permissionGroups = []; 

  if (adminId) {
    fetch(`../backend/superadmin/get_admin_data_to_edit.php?id=${adminId}`)
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: data.error,
            confirmButtonColor: '#dc3545'
          }).then(() => {
            window.location.href = 'acc_mngmnt.php';
          });
        } else {
          document.getElementById("fname").value = data.admin_fname;
          document.getElementById("lname").value = data.admin_lname;
          document.getElementById("mname").value = data.admin_mname;
          document.getElementById("suffix").value = data.admin_suffix;
          document.getElementById("username").value = data.admin_username;
          document.getElementById("email").value = data.admin_email;
          document.getElementById("contact").value = data.admin_contact;

          // Set current role in the dropdown
          loadRoleAndPermissions(data.role_id);
        }
      })
      .catch(error => {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'There was an issue fetching the admin data.',
          confirmButtonColor: '#dc3545'
        });
      });
  }








  // Function to load and display role and permissions
  function loadRoleAndPermissions(roleId) {
  fetch(`../backend/superadmin/get_role_permision.php?role_id=${roleId}`)
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log(data); 

      if (data && data.groups) {
        // Set role name (if available)
        if (data.role_name) {
          document.getElementById('role').value = capitalizeWords(data.role_name);
        }

        const container = document.getElementById('permission_groups_display');
        container.innerHTML = ''; // Clear existing content

        data.groups.forEach(group => {
          const groupDiv = document.createElement('div');
          groupDiv.classList.add('mb-2');

          // Group name
          const groupName = document.createElement('h5');
          groupName.textContent = capitalizeWords(group.group_name);
          groupDiv.appendChild(groupName);

          // Permissions list
          const permList = document.createElement('ul');
          group.permissions.forEach(permission => {
            const permItem = document.createElement('li');
            permItem.textContent = capitalizeWords(permission.per_name);
            permList.appendChild(permItem);
          });

          groupDiv.appendChild(permList);
          container.appendChild(groupDiv);
        });
      } else {
        console.error('Invalid data structure or missing groups');
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Failed to load valid role and permissions.',
          confirmButtonColor: '#dc3545'
        });
      }
    })
    .catch(error => {
      console.error('Error loading role and permissions:', error);
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Failed to load role and permissions.',
        confirmButtonColor: '#dc3545'
      });
    });
}





// capitalize the first letter
function capitalizeWords(str) {
  return str.replace(/\b\w/g, char => char.toUpperCase());
}








  // Submit form
  const form = document.getElementById("editAdminForm");
  form.addEventListener("submit", function(e) {
  e.preventDefault();



  // Create FormData to handle file upload along with other form data
  const formData = new FormData();
  formData.append("admin_id", adminId);
  formData.append("fname", document.getElementById("fname").value);
  formData.append("lname", document.getElementById("lname").value);
  formData.append("mname", document.getElementById("mname").value);
  formData.append("suffix", document.getElementById("suffix").value);
  formData.append("username", document.getElementById("username").value);
  formData.append("email", document.getElementById("email").value);
  formData.append("contact", document.getElementById("contact").value);
  formData.append("superpass", document.getElementById("superpass").value);


    // Add the image file to the FormData
  const imageFile = document.getElementById('image').files[0];
  if (imageFile) {
    const validTypes = ['image/jpeg', 'image/png'];
    if (!validTypes.includes(imageFile.type)) {
      Swal.fire({
        icon: 'error',
        title: 'Invalid Image Format',
        text: 'Please upload a JPEG or PNG image.',
        confirmButtonColor: '#d33'
      });
      loader.style.display = 'none';
      return;
    }
    formData.append('image', imageFile);
  }



    fetch('../backend/superadmin/update_admin_data.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
      .then(result => {
        if (result.success) {
          Swal.fire({
            icon: 'success',
            title: 'Account Updated',
            text: 'The admin account details were successfully updated!',
            confirmButtonColor: '#28a745'
          }).then(() => {
            window.location.href = 'acc_mngmnt.php';
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Update Failed',
            text: result.error,
            confirmButtonColor: '#dc3545'
          });
        }
    })
  .catch(error => {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'There was an issue updating the admin data.',
      confirmButtonColor: '#dc3545'
    });
  });
});
</script>



<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>
