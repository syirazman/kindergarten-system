<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <script src="https://kit.fontawesome.com/7a009050af.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="src/css/navbar.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

        
        <title>Dashboard</title>
    </head>
    <body id="body-pd"> 
        <header class="header" id="header">
            <div class="header__toggle">
                <i class="fas fa-bars" id="header-toggle"></i>
			</div>
        </header> 
		
<!----navigation bar side--->
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a class="nav__logo">
                        <i class="fas fa-chalkboard-teacher nav__logo-icon"></i>
                        <span class="nav__logo-name">GURU</span>
                    </a>
                    <div class="nav__list">
                        <a href="dashboard.php" class="nav__link">
                        <i class="fas fa-tachometer-alt"></i>
                            
                            <span class="nav__name">Dashboard</span>
                        </a>
                        <a href="viewprofile.php" class="nav__link">
                        <i class="fas fa-user"></i>
                            <span class="nav__name">Profile Guru</span>
                        </a>
                        <a href="record.php" class="nav__link">
                            <i class="far fa-calendar-check"></i>
                            <span class="nav__name">Rekod Kehadiran</span>
                        </a>
                        <a href="student.php" class="nav__link">
                            <i class="fas fa-clipboard-list"></i>
                            <span class="nav__name">Kehadiran Murid</span>
                        </a>
                        <a href="activity.php" class="nav__link">
                            <i class="fas fa-address-book"></i>
                            <span class="nav__name">Rekod Aktiviti</span>
                        </a>
                    </div>
                </div>
                <a href="logout.php" class="nav__link">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

         <!--===== MAIN JS =====-->
         <script src="src/js/main.js"></script>
    </body>
</html>