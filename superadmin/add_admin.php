<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Admin Account</title>

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

    .icon-link {
      text-decoration: none !important;
      font-size: 1.2rem;
    }

    .logo-container img {
      height: 40px;
      margin-right: 10px;
      border-radius: 50%;
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
        <a href="../views/admin/sign_out.php" class="text-white text-decoration-none"><i class="fas fa-sign-out-alt"></i> Sign out</a>
      </div>
    </div>
  </div>
</div>

<!-- Form -->
<div class="container">
  <div class="form-container">
    <h3 class="mb-4">Create Admin Account</h3>
    <form id="adminForm" action="../views/create_admin_account.php" method="POST" enctype="multipart/form-data">
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
        <div class="col-md-4">
          <label for="role" class="form-label">Role</label>
          <select class="form-select" id="role" required>
            <option value="" disabled selected>Select Role</option>
            <!-- Dynamic role options will be inserted here by JavaScript -->
          </select>
        </div>
      </div>
      <div class="mb-3">
      <label for="permission_group_select">Permission Group</label>
        <select id="permission_group_select" class="form-select"></select>
        <div id="permission_list" style="margin-top: 10px;"></div>  
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
          <label for="image" class="form-label">Formal Image</label>
          <input type="file" class="form-control" id="image" accept="image/*" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" required>
        </div>
        <div class="col-md-6">
          <label for="repassword" class="form-label">Re-enter Password</label>
          <input type="password" class="form-control" id="repassword" required>
        </div>
      </div>
      <div class="mb-3">
        <label for="superpass" class="form-label">Superadmin Password (for verification)</label>
        <input type="password" class="form-control" id="superpass" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Create Account</button>
    </form>
  </div>
</div>










<script>



 function loadRoles() {
  fetch('../views/superadmin/get_roles.php')
    .then(response => response.json())
    .then(data => {
      console.log("Roles Data:", data); // Check if data is correctly fetched
      const roleSelect = document.getElementById('role');
      data.roles.forEach(role => {
        const option = document.createElement('option');
        option.value = role.role_id;
        option.textContent = role.role_name;
        roleSelect.appendChild(option);
      });
    })
    .catch(error => {
      console.error('Error loading roles:', error);
      Swal.fire({
        icon: 'error',
        title: 'Error Loading Roles',
        text: 'There was an issue loading the roles. Please try again later.',
        confirmButtonColor: '#d33'
      });
    });
}



let permissionGroups = [];

function loadPermissionGroups() {
  fetch('../views/superadmin/get_permision.php')
    .then(response => response.json())
    .then(data => {
      permissionGroups = data.groups;
      const select = document.getElementById('permission_group_select');
      select.innerHTML = '<option value="" disabled selected>Select Permission Group</option>';

      data.groups.forEach(group => {
        const option = document.createElement('option');
        option.value = group.group_id;
        option.textContent = group.group_name;
        select.appendChild(option);
      });
    })
    .catch(error => console.error('Error loading permission groups:', error));
}

document.getElementById('permission_group_select').addEventListener('change', function () {
  const selectedGroupId = this.value;
  const group = permissionGroups.find(g => g.group_id == selectedGroupId);
  const container = document.getElementById('permission_list');
  container.innerHTML = '';

  if (group && group.permissions.length > 0) {
    const list = document.createElement('ul');
    group.permissions.forEach(p => {
      const li = document.createElement('li');
      li.textContent = p.per_name;
      list.appendChild(li);
    });
    container.appendChild(list);
  } else {
    container.innerHTML = '<p>No permissions under this group.</p>';
  }
});













// Handle form submission
document.getElementById('adminForm').addEventListener('submit', function(event) {
  event.preventDefault();  // Prevent default form submission


  // Create FormData object manually since we aren't using form elements with name attributes
  const formData = new FormData();
  
  // Add all form fields to the FormData object
  formData.append('fname', document.getElementById('fname').value);
  formData.append('lname', document.getElementById('lname').value);
  formData.append('mname', document.getElementById('mname').value);
  formData.append('suffix', document.getElementById('suffix').value);
  formData.append('role', document.getElementById('role').value);
  
  // Handle permission data
  const selectedPermissions = [];
  const selectedGroupId = document.getElementById('permission_group_select').value;
  const selectedGroup = permissionGroups.find(group => group.group_id === parseInt(selectedGroupId));
  
  if (selectedGroup) {
    selectedPermissions.push({
      group_id: selectedGroup.group_id,
      group_name: selectedGroup.group_name,
      permissions: selectedGroup.permissions.map(permision => ({
        per_id: permision.per_id,
        per_name: permision.per_name
      }))
    });
  }
  formData.append('permission', JSON.stringify(selectedPermissions));

  formData.append('username', document.getElementById('username').value);
  formData.append('email', document.getElementById('email').value);
  formData.append('contact', document.getElementById('contact').value);
  formData.append('password', document.getElementById('password').value);
  formData.append('repassword', document.getElementById('repassword').value);
  formData.append('superpass', document.getElementById('superpass').value);

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

  // Add password validation
  if (document.getElementById('password').value !== document.getElementById('repassword').value) {
    loader.style.display = 'none';
    Swal.fire({
      icon: 'error',
      title: 'Password Mismatch',
      text: 'The passwords do not match. Please try again.',
      confirmButtonColor: '#d33'
    });
    return;
  }

// Send data to views
fetch('../views/superadmin/create_admin_account.php', {
  method: 'POST',
  body: formData
})
.then(response => response.json())
.then(data => {
  if (data.success) {
    Swal.fire({
      icon: 'success',
      title: 'Account Created',
      text: 'The admin account has been successfully created!',
      confirmButtonColor: '#3085d6'
    }).then(() => {
      document.getElementById('adminForm').reset();
      window.location.href = 'add_admin.php';
    });
  }  else if (data.permissions && data.assigned_to) {
  const capitalizedName = data.assigned_to
    .split(' ')
    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
    .join(' ');

  const formattedPermissions = data.permissions.map(p => {
    return p.per_name
      .split(' ')
      .map(word => word.charAt(0).toUpperCase() + word.slice(1))
      .join(' ');
  });

  Swal.fire({
    icon: 'warning',
    title: 'Role Already Assigned',
    html: `
      <p><strong>${capitalizedName}</strong> already has this role.</p>
      <p><strong>Permissions:</strong></p>
      <ul style="text-align: left;">${formattedPermissions.map(p => `<li>${p}</li>`).join('')}</ul>
    `,
    confirmButtonColor: '#d33'
  });
}
 else {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: data.error || 'An unknown error occurred',
      confirmButtonColor: '#d33'
    });
  }
})
.catch(error => {
  loader.style.display = 'none';
  Swal.fire({
    icon: 'error',
    title: 'Fetch Error',
    text: error.message || 'Something went wrong, please try again later.',
    confirmButtonColor: '#d33'
  });
});

});


window.onload = function() {
  loadRoles();
  loadPermissionGroups();
};
</script>




<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


</body>
</html>
