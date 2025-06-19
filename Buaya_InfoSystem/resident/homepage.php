

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Home</title>



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

  <!-- AOS CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


  <style>


        /* Hero Section Styling */
        .hero-section {
            position: relative;
            height: 100vh;
            background: linear-gradient(135deg, rgba(0, 1, 85, 0.9) 0%, rgba(46, 140, 124, 0.8) 50%, rgba(15, 205, 167, 0.7) 100%),
                        url('img/buayabg1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            overflow: hidden;
        }

        /* Animated Background Elements */
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 20%, rgba(15, 205, 167, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(0, 1, 85, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(46, 140, 124, 0.1) 0%, transparent 50%);
            animation: backgroundPulse 8s ease-in-out infinite;
        }

        @keyframes backgroundPulse {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.7; }
        }

        /* Enhanced Navbar */
        .navbar-custom {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 1000;
            backdrop-filter: blur(20px);
            border-radius: 0 0 0 30px;
            padding: 20px 30px;
            margin: 0;
            animation: slideInFromTop 1s ease-out;
        }

        @keyframes slideInFromTop {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .nav-link-custom {
            color: white !important;
            font-size: 20px;
            margin: 0 15px;
            padding: 12px;
            border-radius: 50%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .nav-link-custom:hover {
            color: #0FCDA7 !important;
            background: rgba(15, 205, 167, 0.2);
            border-color: rgba(15, 205, 167, 0.5);
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 10px 25px rgba(15, 205, 167, 0.3);
        }

        .nav-link-custom::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(15, 205, 167, 0.4) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.4s ease;
            z-index: -1;
        }

        .nav-link-custom:hover::before {
            width: 60px;
            height: 60px;
        }

        .logo-nav {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .logo-nav:hover {
            transform: rotate(360deg) scale(1.1);
            border-color: #0FCDA7;
            box-shadow: 0 8px 25px rgba(15, 205, 167, 0.4);
        }

        /* Enhanced Dropdown */
        .dropdown-menu-custom {
            background: rgba(0, 1, 85, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            margin-top: 10px;
        }

        .dropdown-item-custom {
            color: white !important;
            padding: 12px 20px;
            transition: all 0.3s ease;
            border-radius: 10px;
            margin: 5px;
        }

        .dropdown-item-custom:hover {
            background: linear-gradient(135deg, rgba(15, 205, 167, 0.2) 0%, rgba(46, 140, 124, 0.2) 100%);
            color: #0FCDA7 !important;
            transform: translateX(10px);
        }

        /* Content Section */
        .content-container {
            position: absolute;
            top: 50%;
            left: 5%;
            transform: translateY(-50%);
            z-index: 100;
            max-width: 600px;
        }

        .welcome-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 20px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 1.2s ease-out 0.3s both;
        }

        .welcome-subtitle {
            font-size: 1.4rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 40px;
            line-height: 1.6;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1.2s ease-out 0.6s both;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            animation: fadeInUp 1.2s ease-out 0.9s both;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #0FCDA7 0%, #2E8C7C 100%);
            border: none;
            border-radius: 50px;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 25px rgba(15, 205, 167, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-primary-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary-custom:hover::before {
            left: 100%;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(15, 205, 167, 0.4);
        }

        .btn-secondary-custom {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            padding: 13px 28px;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .btn-secondary-custom:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: #0FCDA7;
            color: #0FCDA7;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Enhanced Moving Text */
        .moving-text-container {
            position: absolute;
            width: 100%;
            top: 50%;
            left: 0;
            overflow: hidden;
            height: 200px;
            z-index: 50;
            transform: translateY(-50%);
            opacity: 0.1;
        }

        .main-title {
            font-size: 12rem;
            font-weight: 900;
            white-space: nowrap;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            animation: moveRightToLeft 15s linear infinite;
            background: linear-gradient(45deg, #0FCDA7, #2E8C7C, #000155);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: none;
        }

        @keyframes moveRightToLeft {
            0% {
                transform: translateX(100%) translateY(-50%);
            }
            100% {
                transform: translateX(-100%) translateY(-50%);
            }
        }

        /* Floating Elements */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .floating-element {
            position: absolute;
            width: 20px;
            height: 20px;
            background: rgba(15, 205, 167, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 20%;
            right: 20%;
            animation-delay: 1s;
        }

        .floating-element:nth-child(3) {
            bottom: 30%;
            left: 30%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(4) {
            bottom: 20%;
            right: 10%;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) scale(1);
                opacity: 0.1;
            }
            50% {
                transform: translateY(-20px) scale(1.2);
                opacity: 0.3;
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .welcome-title {
                font-size: 2.5rem;
            }
            
            .welcome-subtitle {
                font-size: 1.1rem;
            }
            
            .main-title {
                font-size: 8rem;
            }
            
            .navbar-custom {
                border-radius: 0 0 0 20px;
                padding: 15px 20px;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            .welcome-title {
                font-size: 2rem;
            }
            
            .main-title {
                font-size: 5rem;
            }
            
            .content-container {
                left: 3%;
                max-width: 90%;
            }
        }

        /* Scroll indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            text-align: center;
            animation: bounce 2s infinite;
            z-index: 100;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            40% {
                transform: translateX(-50%) translateY(-10px);
            }
            60% {
                transform: translateX(-50%) translateY(-5px);
            }
        }
    












    /*GLOBAL FONT */
    .font-inter {
      font-family: 'Inter', sans-serif;
    }

    /* GLOVAL BACKGROUND */
    .bg{
      background-color:rgb(255, 255, 255);
    }

    /* GLOBAL BORDER NONE */
    .border-none{
      border:none;
    }


    /* BUTTON HOVER */
    .btn {
      background-color:   #000155 !important;
      color: white !important;
      transition: .5s ease-in-out;
    }

    .btn:hover {
      background-color: white !important;
      color: #000155 !important;
      transition: .5s ease-in-out;
    }

    

    /* request document parrt */

    .req-div{
      background-image: url("img/bg.jpg"); 
      background-repeat: no-repeat; 
      background-size: cover; 
      background-position: center;
    }



    .request-btn{
      background-color:  #000155;
      width: 200px;
      padding: 8px;
      text-align: center;
      color: white;
      text-decoration: none;
      font-weight: medium;
      font-size: 18px;
      border-radius: 15px;
      transition: .5s ease-in-out;
    }


    .request-btn:hover{
      background-color: white;
      color:  #000155;
      transition: .5s ease-in-out;
    }




/* ANNOUNCEMENT CARDS */
.announcement-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0, 1, 85, 0.1);
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    height: 540px;
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(0, 1, 85, 0.08);
    margin: 0;
}

.announcement-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 20px rgba(0, 1, 85, 0.15);
}

.announcement-content {
    padding: 1rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.announcement-title {
    color: #000155;
    font-weight: 700;
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.announcement-date {
    color:rgb(0, 0, 0);
    font-weight: 500;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

.announcement-author {
    color: #666;
    font-size: 0.85rem;
    margin-bottom: 1rem;
    font-style: italic;
}

.announcement-type {
    background: linear-gradient(135deg, #316D6C 0%, #52AB99 100%);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    align-self: flex-start;
}

.announcement-description {
    color: #555;
    line-height: 1.6;
    margin: 1rem 0;
    flex-grow: 1;
}

.announcement-image-container {
    height: 270px;
    overflow: hidden;
    position: relative;
    border-radius: 8px;
    background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
}

.announcement-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.announcement-card:hover .announcement-image {
    transform: scale(1.03);
}

.announcement-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    margin-top: auto;
    border-top: 1px solid rgba(0, 1, 85, 0.1);
}

.likes-count {
    display: flex;
    align-items: center;
    color: #316D6C;
    font-weight: 500;
}

.likes-count i {
    margin-right: 0.5rem;
    color: #52AB99;
}

.read-more-btn {
    background: none;
    border: none;
    color: #1178FF;
    font-weight: 600;
    padding: 0;
    cursor: pointer;
    display: flex;
    align-items: center;
    transition: all 0.2s ease;
}

.read-more-btn:hover {
    color: #0d5cb6;
    transform: translateX(3px);
}

.read-more-btn i {
    margin-left: 0.5rem;
    transition: all 0.2s ease;
}

.read-more-btn:hover i {
    transform: translateX(3px);
}

/* SEE MORE TAG ENHANCEMENT */
.seemore-tag-announcement {
    width: 140px;
    height: 140px;
    background: linear-gradient(135deg, #000155 0%, #1a1c8f 100%);
    margin-top: 150px;
    border-radius: 50%;
    box-shadow: 0 5px 25px rgba(0, 1, 85, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    position: relative;
    overflow: hidden;
}

.seemore-tag-announcement::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        to bottom right,
        rgba(255, 255, 255, 0.3) 0%,
        rgba(255, 255, 255, 0) 60%
    );
    transform: rotate(30deg);
    transition: all 0.5s ease;
}

.seemore-tag-announcement:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgb(13, 14, 49);
    background: linear-gradient(135deg, #1a1c8f 0%, #000155 100%);
}

.seemore-tag-announcement:hover::before {
    transform: rotate(30deg) translate(10%, 10%);
}

.seemore-tag-announcement a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    font-size: 1.2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 1;
}

.seemore-tag-announcement i {
    font-size: 1.5rem;
    margin-top: 0.5rem;
    transition: all 0.3s ease;
}

.seemore-tag-announcement:hover i {
    transform: translateX(5px);
}

/* SWIPER ENHANCEMENTS */
.swiper {
    padding-bottom: 20px !important;
}

.swiper-pagination {
    position: relative;
    margin-top: 40px;
}

.swiper-pagination-bullet {
    width: 12px;
    height: 12px;
    background-color: rgba(0, 1, 85, 0.2);
    opacity: 1;
    transition: all 0.3s ease;
}

.swiper-pagination-bullet-active {
    background-color: #52AB99;
    transform: scale(1.2);
    box-shadow: 0 0 10px rgba(82, 171, 153, 0.5);
}

/* CARD HEADER ENHANCEMENT */
.card-header.bg {
    background: transparent !important;
}

.announcement-header {
    color: #000155 !important;
    font-weight: 700 !important;
    font-size: 2rem !important;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
    display: inline-block;
    padding-bottom: 0.5rem;
}


/* RESPONSIVE ADJUSTMENTS */
@media (max-width: 768px) {
    .swiper-slide {
        margin-right: 20px !important;
    }
    
    .announcement-header {
        font-size: 1.5rem !important;
    }
    
    .seemore-tag-announcement {
        width: 100px;
        height: 100px;
        margin-left: 150px;
    }
}



/* styles for announcement modal */
#announcementModal .modal-content {
    border-radius: 10px;
    overflow: hidden;
}

#announcementModal .modal-header {
    border-bottom: none;
}

#announcementModal .modal-body {
    padding: 2rem;
}

.no-image-placeholder {
    padding: 2rem;
    border-radius: 8px;
    background: #f8f9fa;
}


/*------------------------------------ OFFICIALS CONTAINER PART ------------------*/
.officials-section {
  background: linear-gradient(135deg, #000155 0%, #316D6C 100%);
  border-radius: 30px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  overflow: hidden;
}

.officials-header {
  color: #000155 !important;
  font-weight: 700 !important;
  font-size: 2rem !important;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
  padding-bottom: 1rem;
  border-bottom: 2px solid rgba(255, 255, 255, 0.1);
}

.profile-container {
  width: 160px;
  height: 220px;
  margin: 10px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
}

.profile-container:hover {
  transform: translateY(-5px);
}

.profile-container img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  object-fit: cover;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  margin-bottom: 15px;
  border: 3px solid #FFFFFF;
  transition: all 0.3s ease;
}

.profile-container:hover img {
  transform: scale(1.05);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
}

.profile-container h5 {
  font-size: 16px;
  font-weight: 600;
  color: #FFFFFF;
  margin-bottom: 5px;
  text-align: center;
  text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
  line-height: 1.3;
}

.profile-container h4 {
  font-size: 14px;
  color: #FFFFFF;
  font-weight: 500;
  text-align: center;
  background: rgba(46, 140, 124, 0.7);
  padding: 4px 10px;
  border-radius: 20px;
  margin-top: 5px;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}

.profile {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding: 15px 5px;
}

.swiper-pagination-profile {
  position: relative;
  text-align: center;
  z-index: 10;
  margin-top: 10px;
  padding-bottom: 10px;
}

/* Dots styling */
.swiper-pagination-bullet {
  background-color: rgba(186, 186, 186, 0.7);
  opacity: 1;
  width: 10px;
  height: 10px;
  margin: 0 5px !important;
  transition: all 0.3s ease;
}

.swiper-pagination-bullet-active {
  background-color: #FFFFFF;
  width: 30px;
  border-radius: 5px;
}

.seemore-tag {
  width: 200px;
  height: 200px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  margin: 0 15px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 15px;
  transition: all 0.3s ease;
}

.seemore-tag:hover {
  background: rgba(255, 255, 255, 0.2);
  transform: scale(1.02);
}

.seemore-tag a {
  text-decoration: none;
  color: white;
  font-weight: 600;
  font-size: 22px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.seemore-tag i {
  margin-top: 15px;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #FFFFFF;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #2E8C7C;
  font-size: 18px;
  transition: all 0.3s ease;
}

.seemore-tag:hover i {
  background-color: #FFFFFF;
  color: #000155;
  transform: rotate(45deg);
}

/* Responsive adjustments */
@media (max-width: 1200px) {
  .profile-container {
    width: 140px;
    height: 200px;
  }
  
  .profile-container img {
    width: 90px;
    height: 90px;
  }
}

@media (max-width: 992px) {
  .profile-container {
    width: 120px;
    height: 180px;
  }
  
  .profile-container img {
    width: 80px;
    height: 80px;
  }
  
  .profile-container h5 {
    font-size: 14px;
  }
  
  .profile-container h4 {
    font-size: 12px;
  }
  
  .seemore-tag {
    width: 180px;
    height: 180px;
  }
}

@media (max-width: 768px) {
  .profile-container {
    width: 100px;
    height: 160px;
    margin: 5px;
  }
  
  .profile-container img {
    width: 70px;
    height: 70px;
  }
  
  .seemore-tag {
    width: 160px;
    height: 160px;
  }
  
  .seemore-tag a {
    font-size: 18px;
  }
  
  .seemore-tag i {
    width: 40px;
    height: 40px;
    font-size: 16px;
  }
}

@media (max-width: 576px) {
  .officials-header {
    font-size: 1.5rem !important;
  }
  
  .profile-container {
    width: 80px;
    height: 140px;
  }
  
  .profile-container img {
    width: 60px;
    height: 60px;
  }
  
  .profile-container h5 {
    font-size: 12px;
  }
  
  .profile-container h4 {
    font-size: 10px;
    padding: 2px 8px;
  }
  
  .seemore-tag {
    width: 140px;
    height: 140px;
  }
}

/* Simpler highlight */
.profile-container.captain-highlight {
  transform: scale(1.05);
}

.profile-container.captain-highlight img {
  border: 3px solid gold;
  box-shadow: 0 0 15px rgba(255, 215, 0, 0.6);
}

.profile-container.captain-highlight h4.position {
  background: gold;
  color: #000;
  font-weight: bold;
}







/* 6th row part */
.view-calendar-btn{
    background-color:  #000155;
    width: 300px;
    padding: 8px;
    text-align: center;
    color: white;
    text-decoration: none;
    font-weight: medium;
    font-size: 18px;
    border-radius: 15px;
    transition: .5s ease-in-out;
  }

  .view-calendar-btn:hover{
      background-color: white;
      color: #000155;
      transition: .5s ease-in-out;
    }


   /* CALENDAR */
.calendar-container {
    width: 80%;
    max-width: 1100px;
    margin: 0 auto;
    padding: 0; 
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden; 
}

.event-header {
    color: #000155 !important;
    font-weight: 700 !important;
    font-size: 2rem !important;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    padding-bottom: 1rem;
    border-bottom: 2px solid rgba(255, 255, 255, 0.1);
}

.calendar-content {
    padding: 15px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.calendar-table {
    width: 100%;
    border-collapse: collapse;
    flex-grow: 1;
}

.calendar-table th, .calendar-table td {
    text-align: center;
    padding: 6px;
    border: 1px solid #f0f0f0;
}

.calendar-table th {
    background-color: #f8f9fa;
    font-weight: 500;
}

.calendar-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.month-year {
    font-size: 1.5rem;
    font-weight: 500;
}

.day-cell {
    height: 60px;
    width: 14.28%;
    vertical-align: top;
    position: relative;
    cursor: pointer;
    transition: background-color 0.2s;
}

.day-cell:hover {
    background-color: #f0f0f0;
}

.day-number {
    position: absolute;
    top: 5px;
    left: 5px;
    font-weight: 500;
}

.inactive-day {
    color: #aaa;
    background-color: #f8f9fa;
}

.current-day {
    background-color: rgba(77, 186, 172, 0.1);
    font-weight: bold;
}

.event-indicator {
    position: absolute;
    bottom: 5px;
    left: 50%;
    transform: translateX(-50%);
    width: 6px;
    height: 6px;
    background-color: #4dbaac;
    border-radius: 50%;
}

.view-buttons {
    display: flex;
    gap: 5px;
    margin-bottom: 10px;
    margin-left: auto; 
}

.btn-nav {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #4dbaac;
}

.btn-nav:hover {
    color: #3a8a80;
}

#calendarContainer {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.main-container {
    display: flex;
    flex-direction: column;
    height: 100vh;
    padding: 10px;
    padding-top: 0 !important;
}

td.current-day {
    background-color: rgb(45, 130, 84);
    color: white;
    font-weight: bold;
}

.calendar-header h6 {
    font-size: 25px;
    font-weight: bold;
}

.view-button {
    background-color: #000155;
    color: white;
    padding: 5px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    border: none;
    transition: all 0.2s;
}

.view-button:hover {
    background-color: #000155;
    opacity: 0.9;
}

.view-button.active {
    background-color: white;
    color: #52AB98;
    border: 1px solid #52AB98;
}

/* Week View Styles */
.week-view-events {
    margin-top: 25px;
    max-height: 300px;
    overflow-y: auto;
}

.week-event {
    padding: 5px;
    margin: 3px 0;
    font-size: 12px;
    text-align: left;
    background-color: #f8f9fa;
    border-radius: 3px;
}

/* Day View Styles */
.day-view {
    padding: 15px;
}

.day-events-container {
    margin-top: 20px;
}

.day-event {
    padding: 15px;
    margin-bottom: 15px;
    background-color: #f8f9fa;
    border-radius: 5px;
}

.event-time {
    font-size: 14px;
    color: #666;
    margin-bottom: 5px;
}

.event-title {
    font-size: 16px;
    margin-bottom: 5px;
}

.event-description {
    font-size: 14px;
    color: #555;
    margin-top: 5px;
}

.event-desc {
    display: inline-block;
    margin: 0 1px;
    cursor: pointer;
    padding: 5px;
    border-radius: 5px;
}


  </style>









</head>
<body class=" sidebar-mini">
  <div class="wrapper">


    <div class="container-fluid p-0 m-0" >
        
  
<div class="hero-section">
        <!-- Floating Elements -->
        <div class="floating-elements">
            <div class="floating-element"></div>
            <div class="floating-element"></div>
            <div class="floating-element"></div>
            <div class="floating-element"></div>
        </div>

        <!-- Enhanced Navbar -->
        <nav class="navbar-custom">
            <ul class="navbar-nav d-flex flex-row align-items-center">
                <li class="nav-item">
                    <a href="#" class="nav-link-custom">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin_profile.php" class="nav-link-custom">
                        <i class="fas fa-address-card"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin_profile.php" class="nav-link-custom">
                        <i class="fas fa-phone"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link-custom dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-custom dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item dropdown-item-custom" href="admin_profile.php">
                            <i class="fas fa-building me-2"></i>Barangay Buaya Profile
                        </a></li>
                        <li><a class="dropdown-item dropdown-item-custom" href="announcement_resident.php">
                            <i class="fas fa-bullhorn me-2"></i>Announcements
                        </a></li>
                        <li><a class="dropdown-item dropdown-item-custom" href="residentViewOfficials.php">
                            <i class="fas fa-users me-2"></i>Officials
                        </a></li>
                        <li><a class="dropdown-item dropdown-item-custom" href="residentRequestDocument.php">
                            <i class="fas fa-file-alt me-2"></i>Request Document
                        </a></li>
                        <li><a class="dropdown-item dropdown-item-custom" href="calendar.php">
                            <i class="fas fa-calendar me-2"></i>Event Calendar
                        </a></li>
                    </ul>
                </li>
                <li class="nav-item ms-3">
                    <img src="img/logo.jpg" alt="Logo" class="logo-nav">
                </li>
            </ul>
        </nav>

        <!-- Moving Text Background -->
        <div class="moving-text-container">
            <div class="main-title" id="animatedText"></div>
        </div>

        <!-- Main Content -->
        <div class="content-container">
            <h1 class="welcome-title">Welcome to<br>Barangay Buaya</h1>
            <p class="welcome-subtitle">
                Your digital gateway to community services, announcements, and civic engagement. 
                Connecting residents with their local government through modern technology.
            </p>
            <div class="cta-buttons">
                <a href="residentRequestDocument.php" class="btn-primary-custom">
                    <i class="fas fa-file-alt me-2"></i>Request Documents
                </a>
                <a href="announcement_resident.php" class="btn-secondary-custom">
                    <i class="fas fa-bullhorn me-2"></i>View Announcements
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <div>
                <i class="fas fa-chevron-down"></i>
            </div>
            <small>Scroll to explore</small>
        </div>
    </div>

      

        <!-- 2nd row -->
        <div class="row p-2 m-0 bg">
          
              <div class="col-6 p-5 d-flex justify-content-center m-0" >

                <div  class="col text-center elevation-3"  style="height:500px;">
                    <img src="img/logo.jpg" alt="" id="bar_logo" class="shadow-lg"  style="width: 500px; height: 500px; object-fit: cover; border-radius: 50%;">
                </div>

              </div>

              <div class="col-6 p-3 pt-5" >

                  <div class="card mt-3" style="border: none;" >
                    
                    <div class="card-header p-3 bg border-none" >
                        <h3 style="font-weight: semi-bold; font-size: 25px">BARANGAY BUAYA</h3>
                    </div>

                    <div class="card-body p-3 bg font-inter border-none">
                      <div>
                        <h4 class="mb-3">Mission</h4>
                        <p style="font-weight:normal; font-size: 18px;" id="mission">
                          Loading...
                        </p>
                      </div>

                      <div>
                        <h4 class="mb-3">Vision</h4 >
                        <p style="font: weight normal;; font-size: 16px;" id="vision">
                          Loading...
                        </p>
                      </div>

                    </div>

                    <div class="card-footer bg p-3 border-none" >
                      <a href="admin_profile.php" class="btn px-5 text-white shadow-lg" style="background-color:  #000155; border-radius: 30px; font-size: 25px;" >More</a>
                    </div>

                  </div>

              </div>

        </div>
        <!-- END OF ROW -->



        <!-- 3RD -->
        <div class="row bg p-3 mb-5" >
            <div class="card p-2 mt-2 border-none">
                <div class="card-header bg ps-5 border-none">
                    <h4 class="announcement-header">Latest Announcements</h4>
                </div>
                <div class="card-body font-inter" style="background: linear-gradient(135deg, #000155 0%, #316D6C 100%); border-radius: 20px;">
                    <!-- Swiper -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper p-4" id="announcements-container">

                            <!-- Announcements will be dynamically inserted here -->
                            
                            <!-- See more tag (keep this as the last slide) -->
                            <div class="swiper-slide d-flex justify-content-center align-items-center" >
                                <div class="seemore-tag-announcement font-inter">
                                    <a href="announcement_resident.php">
                                        <span>See more</span> <br>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Pagination Dots -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>





        







        <!-- 4th Row -->
         <div class="row req-div m-0 p-5 bg">
            <div class="row ps-5 pb-3 text-white mt-2" style="margin-left: 70px; font-size: 50px; font-weight: semi-bold;">
                <h3 > Request Barangay <br> Documents</h3>
            </div>

            <div class="row ps-5 text-white font-inter mt-2" style="margin-left: 70px; font-size: 30px; font-weight: regular;">
              <h5 >Request Certifications, <br> clearances, or other official <br> documents online.</h5>
            </div>

            <div class="row justify-content-end " style="padding-right: 170px;">
                <a href="residentRequestDocument.php" class="request-btn font-inter">  Request Documents</a>
            </div>
         </div>
         <!-- END OF 4TH ROW -->








          <!-- ROW 5 -->
          <div class="row p-4 p-lg-5">
            <div class="card border-0 bg-transparent font-inter">
              <div class="card-header border-0 bg-transparent">
                <h4 class="officials-header">Meet Your Barangay Officials</h4>
                <p class="text-white mb-0">Dedicated public servants working for our community</p>
              </div>

              <div class="card-body p-0">
                <!-- Loading State -->
                <div id="officials-loading" class="d-flex justify-content-center align-items-center py-5">
                  <div class="spinner-grow text-light" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <span class="ms-3 text-white">Loading officials...</span>
                </div>
                
                <!-- Error State -->
                <div id="officials-error" class="alert alert-danger py-5 text-center d-none">
                  <i class="fas fa-exclamation-circle me-2"></i>
                  Failed to load officials. Please try again later.
                  <button class="btn btn-sm btn-outline-danger ms-3" onclick="window.location.reload()">
                    <i class="fas fa-sync-alt me-1"></i> Reload
                  </button>
                </div>
                
                <!-- Empty State -->
                <div id="officials-empty" class="alert alert-info py-5 text-center d-none">
                  <i class="fas fa-info-circle me-2"></i>
                  No officials data available at this time.
                </div>
                
                <!-- Swiper Container -->
                <div id="officials-swiper" class="swiper mySwiper2 pb-3 pt-0 px-0 d-none officials-section">
                  <div class="swiper-wrapper pb-2 px-0">
                    <!-- Will be populated by JavaScript -->
                  </div>
                  <!-- Pagination Dots -->
                  <div class="swiper-pagination-profile mt-0"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- END OF 5TH ROW -->




         <!-- 6th Row -->
         <div class="row bg p-5 pb-5">
            <div class="card bg border-none">
                
                <div class="card-header bg ps-3">
                  <h4 class="event-header">Upcoming Events</h4>
                </div>

                <div class="card-body ">
                  <div class="calendar-container px-0 font-inter">
                    <div class="calendar-header p-3" >
                        <h6>Calendar Event</h6>
                    </div>
                    <div class="calendar-content">
                        <div class="calendar-nav">
                            <button class="btn-nav" id="prevMonth"><i class="bi bi-chevron-left"></i></button>
                            <div class="month-year" id="monthYear"></div>
                            <button class="btn-nav" id="nextMonth"><i class="bi bi-chevron-right"></i></button>
                        </div>
                        <div class="view-buttons">
                            <button class="view-button active" id="monthView">Month</button>
                            <button class="view-button" id="weekView">Week</button>
                            <button class="view-button" id="dayView">Day</button>
                        </div>
                        <div id="calendarContainer"></div>
                    </div>
                  </div>
                </div>

                <div class="card-footer bg">
                  <div class="row justify-content-end " style="padding-right: 170px;">
                    <a href="calendar.php" class="view-calendar-btn font-inter">  View Full Calendar </a>
                  </div>
                </div>

            </div>
        <!-- end or row -->

  



      
      
      </div>
      <!-- END OF CONTAINER-FLUID -->
  </div>
  <!-- end or wrapper -->






  <!-- footer -->
  <footer class="p-2 pt-5 bg ">
    
    <div class="row p-2 pt-3" style=" background-color:rgb(238, 238, 238);">
        
        <div class="col-3  text-center" style=" height: 150px; ">
          <img src="img/logo.jpg" alt="" id="footer_img "style=" height: 100%; object-fit:cover; border-radius: 50%;">
        </div>

        <div class="col-3 pt-1 ps-2 " >
            <div class="row mb-2">
              <a href="#" class="nav-link  font-inter " role="button" style="color:black;">
                <i class="nav-icon1 fa-solid fa-location-dot m-0 me-3"></i>
                <span id="location" class="me-4"> </span>
              </a>
            </div>
            <div class="row mb-2">
              <a href="#" class="nav-link  font-inter" role="button" style="color:black;">
                  <i class="nav-icon1 fa-solid fa-phone-volume m-0 me-2"></i>
                  <span >Contact: <span id="contact"></span> </span>
              </a>
            </div>
            <div class="row mb-2">
              <a href="#" class="nav-link  font-inter" role="button" style="color:black; ">
                  <i class="nav-icon1 fa-solid fa-clock m-0 me-2"></i> Open:
                  <span id="available"> Loading... </span>
              </a>
            </div>
            <div class="row mb-2">
              <a href="../admin/admin_login2.php" class="nav-link font-inter" style="color:black;"  role="button">
                    <i class="nav-icon1 fa-solid fa-user-tie m-0 me-2"></i>
                    <span  id="app_name_value" class="ms-1 ">Buaya InfoSystem </span>
                </a>
            </div>
        </div>

        <div class="col-3 text-center">
            <h5 class=" pe-3">Navigations</h5>
            <div class="row mt-4 ps-5 pe-5">
              <div class="row mb-3">
                <div class="col">  <a href="homepage.php"> <i class="nav-icon1 fa-solid fa-house"></i></a> </div>
                <div class="col">  <a href="admin_profile.php"> <i class="nav-icon1 fa-solid fa-address-card"></i> </a></div>
                <div class="col">  <a href="admin_profile.php"> <i class="nav-icon1 fa-solid fa-phone"></i></a></div>
                <div class="col">  <a href="announcement_resident.php"> <i class="nav-icon1 fa-solid fa-bullhorn"></i></a> </div>
              </div>
              <div class="row">
                <div class="col">  <a href="residentViewOfficials.php"> <i class="nav-icon1 fa-solid fa-users"></i></a> </div>
                <div class="col">  <a href="residentRequestDocument.php"> <i class="nav-icon1 fa-solid fa-file"></i></a> </div>
                <div class="col">  <a href="calendar.php"> <i class="nav-icon1 fa-solid fa-calendar-days"></i></a> </div>
              </div>
            </div>
        </div>

        <div class="col-3 font-inter">
            <h3 class="mb-4 font-inter " >Help us improve the <br> design system</h3>
            <a href="feedback.php" style=" padding:10px; border: 1px solid rgb(0, 0, 0); text-decoration: none; color: black;">Send us a message</a>
        </div>
    </div>
    <div class="row  p-1 text-center align-center font-inter text-white" style="background-color:  #000155; ">
        <p class="mb-0">© 2025 Buaya Info System. <br> All rights reserved.</p>
    </div>
  </footer>




<!-- Modal for announcement upon clicking -->




<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<!-- Bootstrap Bundle with Popper (REQUIRED for modals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- dropdown menu -->
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


<!-- dot swipier for announcement-->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 2,
    spaceBetween: 45,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
        slidesPerGroup: 1
      },
      768: {
        slidesPerView: 2,
        slidesPerGroup: 2
      }
    }
  });
</script>



<!-- ANIIMATION (BRGY BUAYA) -->
<!-- Enhanced Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Enhanced moving text animation
            const text = "BARANGAY\u00A0\u00A0\u00A0BUAYA";
            const animatedText = document.getElementById('animatedText');
            
            // Create animated text
            text.split('').forEach((char, index) => {
                const span = document.createElement('span');
                span.className = 'letter';
                span.textContent = char;
                span.style.animationDelay = `${index * 0.1}s`;
                animatedText.appendChild(span);
            });

            // Navbar scroll effect
            let lastScrollTop = 0;
            const navbar = document.querySelector('.navbar-custom');
            
            window.addEventListener('scroll', function() {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    // Scrolling down
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    // Scrolling up
                    navbar.style.transform = 'translateY(0)';
                }
                
                lastScrollTop = scrollTop;
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add sparkle effect on hover for buttons
            const buttons = document.querySelectorAll('.btn-primary-custom, .btn-secondary-custom');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    createSparkles(this);
                });
            });

            function createSparkles(element) {
                const sparkle = document.createElement('div');
                sparkle.style.position = 'absolute';
                sparkle.style.width = '4px';
                sparkle.style.height = '4px';
                sparkle.style.background = '#fff';
                sparkle.style.borderRadius = '50%';
                sparkle.style.pointerEvents = 'none';
                sparkle.style.animation = 'sparkle 0.6s ease-out forwards';
                
                const rect = element.getBoundingClientRect();
                sparkle.style.left = Math.random() * rect.width + 'px';
                sparkle.style.top = Math.random() * rect.height + 'px';
                
                element.style.position = 'relative';
                element.appendChild(sparkle);
                
                setTimeout(() => {
                    sparkle.remove();
                }, 600);
            }

            // Add sparkle animation to CSS
            const style = document.createElement('style');
            style.textContent = `
                @keyframes sparkle {
                    0% {
                        transform: scale(0) rotate(0deg);
                        opacity: 1;
                    }
                    100% {
                        transform: scale(1) rotate(180deg);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        });
    </script>












<!-- for image in announcement overview -->
<script>
  // Example: array of image URLs
  const images = [
    'img/m1.jpg',
  ];

  // Get the container div
  const imageDiv = document.querySelector('.swiper-slide .container div');

  // Create an img element for the first image
  if (images.length > 0) {
    const img = document.createElement('announte-img');
    img.src = images[0]; // only first image
    img.alt = 'announcement image';
    img.style.width = '100%';
    img.style.height = '270px';
    img.style.objectFit = 'cover';
    imageDiv.appendChild(img);
  }
</script>




<!-- FULL EVENT CALENDAR SCRIPT -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // initial variables
        let currentDate = new Date();
        let currentView = 'month';
        let events = [];
        
        // Fetch events from views
        fetchEvents();
        
        // initialize calendar
        updateCalendar();
        
        // Event listeners
        document.getElementById('prevMonth').addEventListener('click', function() {
            navigate(-1);
        });
        
        document.getElementById('nextMonth').addEventListener('click', function() {
            navigate(1);
        });
        
        document.getElementById('monthView').addEventListener('click', function() {
            currentView = 'month';
            updateActiveViewButton(this);
            updateCalendar();
        });
        
        document.getElementById('weekView').addEventListener('click', function() {
            currentView = 'week';
            updateActiveViewButton(this);
            updateCalendar();
        });
        
        document.getElementById('dayView').addEventListener('click', function() {
            currentView = 'day';
            updateActiveViewButton(this);
            updateCalendar();
        });
        
        function navigate(direction) {
            if (currentView === 'month') {
                currentDate.setMonth(currentDate.getMonth() + direction);
            } else if (currentView === 'week') {
                currentDate.setDate(currentDate.getDate() + (7 * direction));
            } else if (currentView === 'day') {
                currentDate.setDate(currentDate.getDate() + direction);
            }
            updateCalendar();
        }
        
        function updateActiveViewButton(activeButton) {
            document.querySelectorAll('.view-button').forEach(button => {
                button.classList.remove('active');
            });
            activeButton.classList.add('active');
        }
        
        function updateCalendar() {
            if (currentView === 'month') {
                renderMonthView();
            } else if (currentView === 'week') {
                renderWeekView();
            } else if (currentView === 'day') {
                renderDayView();
            }
        }
        
        // Helper functions
        function formatDate(date) {
            const d = new Date(date);
            let month = '' + (d.getMonth() + 1);
            let day = '' + d.getDate();
            const year = d.getFullYear();
            
            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;
            
            return [year, month, day].join('-');
        }
        
        function hasEvents(date) {
            const dateStr = formatDate(date);
            return events.some(event => {
                // Handle both date-only and datetime strings
                const eventDate = new Date(event.date);
                const eventDateStr = formatDate(eventDate);
                return eventDateStr === dateStr;
            });
        }
        
        function getEventsForDate(date) {
            const dateStr = formatDate(date);
            return events.filter(event => {
                const eventDate = new Date(event.date);
                const eventDateStr = formatDate(eventDate);
                return eventDateStr === dateStr;
            });
        }
        
        function formatTime(timeStr) {
            if (!timeStr) return '';
            try {
                // Handle both HH:MM:SS and HH:MM formats
                const timeParts = timeStr.split(':');
                const hours = timeParts[0];
                const minutes = timeParts[1] || '00';
                return new Date(`1970-01-01T${hours}:${minutes}:00`).toLocaleTimeString([], { 
                    hour: '2-digit', 
                    minute: '2-digit',
                    hour12: true 
                });
            } catch (e) {
                console.error('Error formatting time:', e);
                return timeStr; // Return original if formatting fails
            }
        }
        
        // Fetch events from views
        function fetchEvents() {
            fetch('../views/resident/get_events.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Fetched events:', data); // Debug log
                    events = Array.isArray(data) ? data : [];
                    updateCalendar();
                })
                .catch(error => {
                    console.error('Error fetching events:', error);
                });
        }
        
        // Render functions
        function renderMonthView() {
            const now = new Date();
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            
            document.getElementById('monthYear').textContent = new Date(year, month, 1).toLocaleString('default', { 
                month: 'long', 
                year: 'numeric' 
            });
            
            const firstDayOfMonth = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const daysInPrevMonth = new Date(year, month, 0).getDate();
            
            let calendarHTML = '<table class="calendar-table"><thead><tr>';
            const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            weekdays.forEach(day => {
                calendarHTML += `<th>${day}</th>`;
            });
            calendarHTML += '</tr></thead><tbody>';
            
            let dayCount = 1;
            let nextMonthDayCount = 1;
            const rows = Math.ceil((firstDayOfMonth + daysInMonth) / 7);
            
            for (let i = 0; i < rows; i++) {
                calendarHTML += '<tr>';
                
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDayOfMonth) {
                        // Previous month
                        const prevDay = daysInPrevMonth - (firstDayOfMonth - j - 1);
                        const prevDate = new Date(year, month - 1, prevDay);
                        const hasEvent = hasEvents(prevDate);
                        
                        calendarHTML += `<td class="day-cell inactive-day">
                            <div class="day-number">${prevDay}</div>
                            ${hasEvent ? '<div class="event-indicator"></div>' : ''}
                        </td>`;
                    } else if (dayCount > daysInMonth) {
                        // Next month
                        const nextDate = new Date(year, month + 1, nextMonthDayCount);
                        const hasEvent = hasEvents(nextDate);
                        
                        calendarHTML += `<td class="day-cell inactive-day">
                            <div class="day-number">${nextMonthDayCount}</div>
                            ${hasEvent ? '<div class="event-indicator"></div>' : ''}
                        </td>`;
                        nextMonthDayCount++;
                    } else {
                        // Current month
                        const cellDate = new Date(year, month, dayCount);
                        const isToday = dayCount === now.getDate() && month === now.getMonth() && year === now.getFullYear();
                        const cellClass = isToday ? 'day-cell current-day' : 'day-cell';
                        const hasEvent = hasEvents(cellDate);
                        
                         calendarHTML += `<td class="${cellClass}" data-date="${formatDate(cellDate)}">
                              <div class="day-number">${dayCount}</div>
                              <div class="event-description">${getEventDescriptions(cellDate)}</div>
                          </td>`;
                          dayCount++;
                    }
                }
                
                calendarHTML += '</tr>';
            }
            
            calendarHTML += '</tbody></table>';
            document.getElementById('calendarContainer').innerHTML = calendarHTML;
            
            // Add click handlers for each day cell
            document.querySelectorAll('.day-cell').forEach(cell => {
                cell.addEventListener('click', function() {
                    const dateStr = this.getAttribute('data-date');
                    if (dateStr) {
                        currentDate = new Date(dateStr);
                        currentView = 'day';
                        updateActiveViewButton(document.getElementById('dayView'));
                        updateCalendar();
                    }
                });
            });
        }
        
        function renderWeekView() {
            const date = new Date(currentDate);
            const now = new Date();
            const dayOfWeek = date.getDay();
            const firstDayOfWeek = new Date(date);
            firstDayOfWeek.setDate(date.getDate() - dayOfWeek);
            
            const lastDayOfWeek = new Date(firstDayOfWeek);
            lastDayOfWeek.setDate(firstDayOfWeek.getDate() + 6);
            
            let title = '';
            if (firstDayOfWeek.getMonth() === lastDayOfWeek.getMonth()) {
                title = `${firstDayOfWeek.toLocaleString('default', { month: 'long' })} ${firstDayOfWeek.getFullYear()}`;
            } else {
                title = `${firstDayOfWeek.toLocaleString('default', { month: 'short' })} - ${lastDayOfWeek.toLocaleString('default', { month: 'short' })} ${lastDayOfWeek.getFullYear()}`;
            }
            document.getElementById('monthYear').textContent = title;
            
            let weekHTML = '<table class="calendar-table"><thead><tr>';
            
            for (let i = 0; i < 7; i++) {
                const day = new Date(firstDayOfWeek);
                day.setDate(firstDayOfWeek.getDate() + i);
                weekHTML += `<th>${day.toLocaleString('default', { weekday: 'short' })} ${day.getDate()}</th>`;
            }
            
            weekHTML += '</tr></thead><tbody><tr>';
            
            for (let i = 0; i < 7; i++) {
                const day = new Date(firstDayOfWeek);
                day.setDate(firstDayOfWeek.getDate() + i);
                
                const isToday = day.getDate() === now.getDate() && 
                              day.getMonth() === now.getMonth() && 
                              day.getFullYear() === now.getFullYear();
                
                const cellClass = isToday ? 'day-cell current-day' : 'day-cell';
                const dayEvents = getEventsForDate(day);
                
                weekHTML += `<td class="${cellClass}" data-date="${formatDate(day)}">`;
                
                if (dayEvents.length > 0) {
                    weekHTML += `<div class="week-view-events">`;
                    dayEvents.forEach(event => {
                        weekHTML += `<div class="week-event" style="border-left: 3px solid ${event.color || '#3c8dbc'}">
                            <strong>${event.title}</strong>
                            <div>${formatTime(event.start)}</div>
                        </div>`;
                    });
                    weekHTML += `</div>`;
                }
                
                weekHTML += `</td>`;
            }
            
            weekHTML += '</tr></tbody></table>';
            document.getElementById('calendarContainer').innerHTML = weekHTML;
            
            // Add click handlers for each day cell
            document.querySelectorAll('.day-cell').forEach(cell => {
                cell.addEventListener('click', function() {
                    const dateStr = this.getAttribute('data-date');
                    if (dateStr) {
                        currentDate = new Date(dateStr);
                        currentView = 'day';
                        updateActiveViewButton(document.getElementById('dayView'));
                        updateCalendar();
                    }
                });
            });
        }
        
        function renderDayView() {
            document.getElementById('monthYear').textContent = currentDate.toLocaleString('default', { 
                weekday: 'long', 
                month: 'long', 
                day: 'numeric', 
                year: 'numeric' 
            });
            
            const dayEvents = getEventsForDate(currentDate);
            
            let dayHTML = '<div class="day-view">';
            
            if (dayEvents.length === 0) {
                dayHTML += '<p class="text-center mt-3">No events scheduled for this day.</p>';
            } else {
                dayHTML += '<div class="day-events-container">';
                dayEvents.forEach(event => {
                    dayHTML += `
                    <div class="day-event" style="border-left: 3px solid ${event.color || '#3c8dbc'}">
                        <div class="event-time">${formatTime(event.start)} - ${formatTime(event.end)}</div>
                        <div class="event-title"><strong>${event.title}</strong></div>
                        ${event.description ? `<div class="event-description">${event.description}</div>` : ''}
                    </div>`;
                });
                dayHTML += '</div>';
            }
            
            dayHTML += '</div>';
            document.getElementById('calendarContainer').innerHTML = dayHTML;
        }

        // New helper function to get event descriptions
        function getEventDescriptions(date) {
            const events = getEventsForDate(date);
            if (events.length === 0) return '';
            
            return events.map(event => 
                `<div class="event-desc" style="color: ${event.color || '#3c8dbc'}">
                ${event.title}
                </div>`
            ).join('');
        }

        function getEventDescriptions(date) {
          const events = getEventsForDate(date);
          if (events.length === 0) return '';
          
          return events.map(event => 
              `<div class="event-desc" style="background-color: ${event.color || '#3c8dbc'}; color: white">
              ${event.title}
              </div>`
          ).join('');
      }

    });
</script>







<!-- Load some officials -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const loadingEl = document.getElementById('officials-loading');
    const errorEl = document.getElementById('officials-error');
    const emptyEl = document.getElementById('officials-empty');
    const swiperEl = document.getElementById('officials-swiper');
    const swiperWrapper = swiperEl.querySelector('.swiper-wrapper');
    
    // Show loading state
    loadingEl.classList.remove('d-none');
    errorEl.classList.add('d-none');
    emptyEl.classList.add('d-none');
    swiperEl.classList.add('d-none');
    
    // Fetch officials from API
    fetch('../views/resident/get_officials.php')
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (!data.success) throw new Error(data.message || 'Failed to load data');
            
            loadingEl.classList.add('d-none');
            
            // Check if data is empty
            if (!data.data || data.data.length === 0) {
                emptyEl.classList.remove('d-none');
                return;
            }
            
            // Sort officials - Captain first, then others
            const sortedOfficials = [...data.data].sort((a, b) => {
                const isACaptain = a.pos_name && a.pos_name.toLowerCase().includes('captain');
                const isBCaptain = b.pos_name && b.pos_name.toLowerCase().includes('captain');
                return isBCaptain - isACaptain; // Captain comes first
            });
            
            swiperEl.classList.remove('d-none');
            
            // Clear any existing content
            swiperWrapper.innerHTML = '';
            
            // Split officials into slides (8 per slide)
            const officialsPerSlide = 8;
            const totalOfficials = sortedOfficials.length;
            
            for (let i = 0; i < totalOfficials; i += officialsPerSlide) {
                const slideOfficials = sortedOfficials.slice(i, i + officialsPerSlide);
                swiperWrapper.appendChild(createOfficialSlide(slideOfficials));
            }
            
            // Add "See More" slide only if there are officials
            if (totalOfficials > 0) {
                swiperWrapper.appendChild(createSeeMoreSlide());
            }
            
            // Initialize Swiper
            initSwiper();
        })
        .catch(error => {
            console.error('Error loading officials:', error);
            loadingEl.classList.add('d-none');
            errorEl.classList.remove('d-none');
        });

      function createOfficialSlide(officials) {
          const slide = document.createElement('div');
          slide.className = 'row profile swiper-slide';
          
          // Sort officials within slide to ensure captain appears first
          const sortedSlideOfficials = [...officials].sort((a, b) => {
              const isACaptain = a.pos_name && a.pos_name.toLowerCase().includes('captain');
              const isBCaptain = b.pos_name && b.pos_name.toLowerCase().includes('captain');
              return isBCaptain - isACaptain;
          });
          
          slide.innerHTML = sortedSlideOfficials.map(official => {
              // Image path logic
              const imagePath = official.res_image 
                  ? `../${official.res_image}`
                  : '../server_imgs/default_user_img.jpg';

              // Handle name display
              const fullName = [
                  official.res_first_name,
                  official.res_middle_name,
                  official.res_last_name
              ].filter(Boolean).join(' ');

              // Check if this is the captain
              const isCaptain = official.pos_name && 
                  official.pos_name.toLowerCase().includes('captain');
              
              // Special class for captain
              const containerClass = isCaptain ? 'profile-container captain-highlight' : 'profile-container';

              return `
                  <div class="${containerClass}">
                      <img src="${imagePath}" 
                          alt="${fullName}"
                          onerror="this.onerror=null;this.src='../server_imgs/default_user_img.jpg'">
                      <h5 class="name">${fullName}</h5> 
                      <h4 class="position">${official.pos_name ? capitalizeWords(official.pos_name) : 'Official'}</h4>
                  </div>
              `;
          }).join('');
          
          return slide;
        }

    function createSeeMoreSlide() {
        const slide = document.createElement('div');
        slide.className = 'row profile sk-officials-container swiper-slide';
        slide.innerHTML = `
            <div class="seemore-tag font-inter">
                <a href="residentViewOfficials.php"> 
                    <span>See All Officials</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        `;
        return slide;
    }

    function initSwiper() {
        if (typeof Swiper === 'undefined') {
            console.error('Swiper library not loaded');
            // Fallback - display all officials without swiper
            swiperEl.classList.remove('swiper');
            swiperWrapper.classList.remove('swiper-wrapper');
            document.querySelector('.swiper-pagination-profile').style.display = 'none';
            return;
        }
        
        new Swiper('.mySwiper2', {
            pagination: {
                el: '.swiper-pagination-profile',
                clickable: true,
                dynamicBullets: true,
                dynamicMainBullets: 3
            },
            slidesPerView: 1,
            spaceBetween: 20,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            loop: false,
            grabCursor: true,
            keyboard: {
                enabled: true,
                onlyInViewport: true
            },
            effect: 'slide',
            speed: 600
        });
    }

    function capitalizeWords(str) {
      return str.replace(/\b\w/g, c => c.toUpperCase());
    }

  });
</script>


<!-- load some announcements -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Store announcements data globally for modal access
    let announcementsData = [];
    const MAX_CONTENT_LENGTH = 150; // Character limit for truncated content
    
    // 1. First, check if the container exists
    const container = document.querySelector('.swiper-wrapper');
    if (!container) {
        console.error('Swiper wrapper element not found!');
        return;
    }

    // 2. Fetch announcements from server
    fetch('../views/resident/get_announcement.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Received data:', data);
            
            if (!data.success || !data.data) {
                throw new Error(data.message || 'Invalid data format');
            }
            
            announcementsData = data.data;
            
            // 3. Clear existing slides (except the last "See more" slide)
            const slides = container.querySelectorAll('.swiper-slide:not(:last-child)');
            slides.forEach(slide => slide.remove());
            
            // 4. Handle empty results
            if (data.data.length === 0) {
                container.insertBefore(createNoAnnouncementsSlide(), container.lastElementChild);
                return;
            }
            
            // 5. Add new announcements
            data.data.forEach(announcement => {
                const slide = createAnnouncementSlide(announcement);
                container.insertBefore(slide, container.lastElementChild);
            });
            
            // 6. Reinitialize Swiper
            initializeSwiper();
        })
        .catch(error => {
            console.error('Error:', error);
            const errorSlide = createErrorSlide(error);
            while (container.firstChild) {
                container.removeChild(container.firstChild);
            }
            container.appendChild(errorSlide);
        });

    // Helper functions
    function createAnnouncementSlide(announcement) {
        const slide = document.createElement('div');
        slide.className = 'swiper-slide';
        
        const imagePath = announcement.image_path ? `../views/${announcement.image_path}` : null;
        const shouldTruncate = announcement.content && announcement.content.length > MAX_CONTENT_LENGTH;
        const shortContent = shouldTruncate ? 
            announcement.content.substring(0, MAX_CONTENT_LENGTH) + '...' : 
            announcement.content;

        slide.innerHTML = `
            <div class="container bg-white p-5 m-0 announcement-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 style="font-weight: 600;">${announcement.title || 'No title'}</h5>
                        <h6 class="fw-semibold">${announcement.formatted_date || ''}</h6>
                        <small class="text-muted">Posted by: ${announcement.author || 'Admin'}</small>
                    </div>
                    <span class="badge bg-primary">${announcement.type || 'General'}</span>
                </div>
                
                <p class="mt-3 mb-0 announcement-description">
                    ${announcement.content ? shortContent : 'No description available'}
                </p>
                ${shouldTruncate ? `<a href="#" class="see-more-link" data-full-content="${announcement.content.replace(/"/g, '&quot;')}">See more</a>` : ''}
                
                <div class="mt-3 announcement-image-container">
                    ${imagePath 
                        ? `<img src="${imagePath}" alt="${announcement.title}" style="width: 100%; height: 350px; object-fit: cover;"
                            onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'no-image-placeholder\'><i class=\'fas fa-image fa-3x text-muted\'></i><p>Image not available</p></div>'">`
                        : `<div class="no-image-placeholder d-flex flex-column justify-content-center align-items-center w-100 h-100"">
                            <i class="fas fa-image fa-3x text-muted"></i>
                            <p>No image available</p>
                          </div>`}
                </div>
                
                <footer class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <i class="fas fa-thumbs-up text-primary"></i>
                        <span class="ms-2">${announcement.like_count || 0} likes</span>
                    </div>
                    <button type="button" class="btn btn-link read-more-btn p-2" 
                            data-id="${announcement.id}">
                        Read More <i class="fas fa-arrow-right ms-1"></i>
                    </button>
                </footer>
            </div>
        `;
        
        return slide;
    }

    function initializeSwiper() {
        if (window.mySwiper) {
            window.mySwiper.destroy();
        }
        
        window.mySwiper = new Swiper('.mySwiper', {
            slidesPerView: 'auto',
            spaceBetween: 45,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    // Create modal element dynamically
    const modalHTML = `
    <div class="modal fade" id="announcementModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalAnnouncementTitle"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted" id="modalAnnouncementDate"></span>
                        <span class="badge bg-secondary p-2" id="modalAnnouncementType"></span>
                    </div>
                    <div class="mb-4 text-center" id="modalAnnouncementImageContainer"></div>
                    <div class="mb-3" id="modalAnnouncementContent"></div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-thumbs-up text-primary me-2"></i>
                        <span id="modalAnnouncementLikes"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <small class="text-muted me-auto">Posted by: <span id="modalAnnouncementAuthor"></span></small>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>`;
    
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    const announcementModal = new bootstrap.Modal(document.getElementById('announcementModal'));

    // Event delegation for dynamic elements
    document.addEventListener('click', function(e) {
        // See more/less toggle - UPDATED VERSION
        if (e.target.classList.contains('see-more-link')) {
            e.preventDefault();
            const link = e.target;
            const description = link.previousElementSibling;
            const fullContent = link.dataset.fullContent;
            
            if (description.textContent.includes('...')) {
                description.textContent = fullContent;
                link.textContent = 'See less';
            } else {
                const shortContent = fullContent.substring(0, MAX_CONTENT_LENGTH) + '...';
                description.textContent = shortContent;
                link.textContent = 'See more';
            }
        }
        
        // Read more button - MODAL VERSION
        if (e.target.closest('.read-more-btn')) {
            e.preventDefault();
            const btn = e.target.closest('.read-more-btn');
            const announcementId = parseInt(btn.getAttribute('data-id'));
            const announcement = announcementsData.find(a => a.id === announcementId);
            
            if (announcement) {
                showAnnouncementModal(announcement);
            } else {
                console.error('Announcement not found:', announcementId);
            }
        }
    });

    function showAnnouncementModal(announcement) {
        document.getElementById('modalAnnouncementTitle').textContent = announcement.title || 'No Title';
        document.getElementById('modalAnnouncementDate').textContent = announcement.formatted_date || '';
        document.getElementById('modalAnnouncementType').textContent = announcement.type || 'General';
        document.getElementById('modalAnnouncementContent').textContent = announcement.content || 'No content available';
        document.getElementById('modalAnnouncementLikes').textContent = `${announcement.like_count || 0} likes`;
        document.getElementById('modalAnnouncementAuthor').textContent = announcement.author || 'Admin';
        
        const imageContainer = document.getElementById('modalAnnouncementImageContainer');
        if (announcement.image_path) {
            const imagePath = `../views/${announcement.image_path}`;
            imageContainer.innerHTML = `
                <img src="${imagePath}" alt="${announcement.title}" 
                    class="img-fluid rounded mx-auto d-block"
                    style="max-height: 400px; max-width: 100%; object-fit: contain;"
                    onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'no-image-placeholder\'><i class=\'fas fa-image fa-3x text-muted\'></i><p>Image not available</p></div>'">
            `;
        } else {
            imageContainer.innerHTML = `
                <div class="no-image-placeholder py-4">
                    <i class="fas fa-image fa-3x text-muted mb-2"></i>
                    <p class="text-muted">No image available</p>
                </div>
            `;
        }
        
        announcementModal.show();
    }
  });
</script>



<!-- get some barangay info -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Show loading message
    console.log('Loading barangay data...');
    
    // Fetch data from your PHP script
    fetch('../views/resident/get_barangay.php')
        .then(response => response.json())
        .then(data => {
            console.log('Data received:', data);
            
            if (data.success) {
                // Update the HTML elements with database data
                const barangayData = data.data;
                
                // Mission and Vision
                if (barangayData.bar_mission) {
                    document.getElementById('mission').textContent = barangayData.bar_mission;
                }
                
                if (barangayData.bar_vision) {
                    document.getElementById('vision').textContent = barangayData.bar_vision;
                }
                
                if (barangayData.bar_available_start_time && barangayData.bar_available_end_time) {
                    document.getElementById('available').textContent = 
                        barangayData.bar_available_start_time + ' - ' + barangayData.bar_available_end_time;
                } 

                // Location - FIXED: No more hardcoded override
                if (barangayData.bar_name && barangayData.bar_municipality) {
                    document.getElementById('location').textContent = 
                        'Barangay ' + barangayData.bar_name + ', ' + barangayData.bar_municipality;
                }

                 if (barangayData.bar_contact_cellphone) {
                    document.getElementById('contact').textContent = barangayData.bar_contact_cellphone;
                }
                
                // FIXED: Logo with proper error handling and perfect circle styling
                if (barangayData.bar_logo) {
                    const logoImg = document.getElementById('bar_logo');
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

