<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Buaya | Lapu-Lapu City</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        :root {
            --primary-blue: #000155;
            --primary-blue-light: #1a1a7a;
            --accent-color: #4f46e5;
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.8);
            --shadow-light: rgba(255, 255, 255, 0.1);
            --shadow-dark: rgba(0, 0, 0, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            overflow: hidden;
            height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
        }

        /* Animated background particles */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .particle:nth-child(1) { width: 80px; height: 80px; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 20px; height: 20px; left: 20%; animation-delay: 0.2s; }
        .particle:nth-child(3) { width: 60px; height: 60px; left: 25%; animation-delay: 0.4s; }
        .particle:nth-child(4) { width: 120px; height: 120px; left: 40%; animation-delay: 0.6s; }
        .particle:nth-child(5) { width: 15px; height: 15px; left: 70%; animation-delay: 0.8s; }
        .particle:nth-child(6) { width: 90px; height: 90px; left: 80%; animation-delay: 1s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
            50% { transform: translateY(-20px) rotate(180deg); opacity: 1; }
        }
        
        .background {
            position: relative;
            width: 100%;
            height: 100vh;
            background-image: url('img/buayabg.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 1, 85, 0.2) 0%, rgba(102, 126, 234, 0.3) 100%);
            z-index: 1;
        }

        .auth-container {
            display: flex;
            position: relative;
            width: 1000px;
            height: 550px;
            overflow: hidden;
            border-radius: 25px;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            box-shadow: 
                0 25px 45px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 3;
        }

        .auth-container:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 
                0 40px 80px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }

        .panels-container {
            position: absolute;
            width: 200%;
            height: 100%;
            display: flex;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(0);
        }

        .panel {
            width: 50%;
            height: 100%;
            display: flex;
        }

        .green-panel {
            width: 350px;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
            padding: 40px 30px;
            color: var(--text-primary);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .green-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, transparent 100%);
            pointer-events: none;
        }

        .white-panel {
            width: 650px;
            height: 100%;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 40px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .logo {
            width: 180px;
            height: 180px;
            margin-bottom: 20px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .welcome-text {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0.9;
        }

        .subtitle {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 25px;
            line-height: 1.2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .form-title {
            color: var(--text-primary);
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 40px;
            text-align: center;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-floating {
            position: relative;
            margin-bottom: 25px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1) !important;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 18px 20px;
            color: var(--text-primary) !important;
            font-size: 16px;
            font-weight: 500;
            height: 60px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15) !important;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1), 0 0 20px rgba(79, 70, 229, 0.2);
            outline: none;
            transform: translateY(-2px);
        }

        .form-control::placeholder {
            color: var(--text-secondary);
            font-weight: 400;
        }

        .form-label {
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--accent-color) 0%, var(--primary-blue) 100%);
            color: white;
            border: none;
            border-radius: 15px;
            padding: 15px 40px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            height: 60px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(79, 70, 229, 0.4);
            background: linear-gradient(135deg, #5b52f0 0%, #1a1a7a 100%);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .eye-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-secondary);
            font-size: 18px;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .eye-icon:hover {
            color: var(--text-primary);
            transform: translateY(-50%) scale(1.1);
        }

        .input-group {
            position: relative;
        }

        /* Loading animation */
        .btn-login.loading {
            pointer-events: none;
        }

        .btn-login.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            margin: auto;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive design */
        @media (max-width: 1100px) {
            .auth-container {
                width: 90%;
                max-width: 900px;
            }
        }

        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
                height: auto;
                min-height: 600px;
            }
            
            .panels-container {
                position: relative;
                width: 100%;
                flex-direction: column;
            }
            
            .panel {
                width: 100%;
            }
            
            .green-panel, .white-panel {
                width: 100%;
            }
            
            .green-panel {
                order: 2;
                padding: 30px;
            }
            
            .white-panel {
                order: 1;
                padding: 40px 30px;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body>
    <!-- Animated background particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Error handling script -->
    <script>
        // Simulate error handling (replace with actual PHP logic)
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('error') === 'invalid_credentials') {
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: 'Incorrect username or password!',
                confirmButtonColor: '#4f46e5',
                background: 'rgba(255, 255, 255, 0.95)',
                backdrop: 'rgba(0, 0, 0, 0.4)'
            }).then(() => {
                if (history.replaceState) {
                    const url = new URL(window.location);
                    url.searchParams.delete('error');
                    history.replaceState(null, '', url);
                }
            });
        }
    </script>

    <div class="background">
        <div class="auth-container">
            <div class="panels-container" id="panelsContainer">
                <!-- Login panel -->
                <div class="panel">
                    <div class="white-panel">
                        <h1 class="form-title">LOG IN</h1>
                        <form class="form" action="../views/admin/login_process.php" method="POST" id="loginForm">
                            <div class="mb-4">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password" required>
                                    <i class="eye-icon bi bi-eye-slash" onclick="togglePassword('loginPassword')" style="display: none;"></i>
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn btn-login" id="loginBtn">
                                    <span class="btn-text">Sign In</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="green-panel">
                        <img src="img/logo.jpg" alt="Buaya Logo" class="logo">
                        <p class="welcome-text">Welcome To</p>
                        <h2 class="subtitle">BUAYA<br>INFOSYSTEM</h2>
                        <div style="margin-top: 20px; font-size: 14px; opacity: 0.8;">
                            Lapu-Lapu City
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            const passwordField = document.getElementById(id);
            const eyeIcon = passwordField.parentElement.querySelector('.eye-icon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            }
        }

        // Show/hide eye icon based on input
        document.addEventListener('DOMContentLoaded', function() {
            const passwordField = document.getElementById('loginPassword');
            const eyeIcon = passwordField.parentElement.querySelector('.eye-icon');
            
            passwordField.addEventListener('input', function() {
                if (this.value.length > 0) {
                    eyeIcon.style.display = 'block';
                } else {
                    eyeIcon.style.display = 'none';
                }
            });

            // Add loading state to login button
            const loginForm = document.getElementById('loginForm');
            const loginBtn = document.getElementById('loginBtn');
            
            loginForm.addEventListener('submit', function() {
                loginBtn.classList.add('loading');
                loginBtn.querySelector('.btn-text').textContent = 'Signing In...';
            });

            // Add floating label effect
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentElement.classList.remove('focused');
                    }
                });
            });

            // Add ripple effect to button
            loginBtn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add some CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.6);
                transform: scale(0);
                animation: ripple-animation 0.6s linear;
                pointer-events: none;
            }
            
            @keyframes ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>