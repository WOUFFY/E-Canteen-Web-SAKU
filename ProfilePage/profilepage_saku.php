<?php
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location = "loginpage_saku.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard_saku.css">
</head>
<body>
     <!-- navvigasi bar -->
     <div class="nav-body">
        <nav class="navbar">
            <div class="judul">
                <a href="../LoginPage/dashboard_saku.php" target="_self">SAKU.co</a>
            </div>

            <div class="nav">
                <a href="#">Profile</a>
                <a href="#">Menu</a>
                <a href="../HomePage/homepage_saku.html">Keluar </a>

            </div>
        </nav>
    </div>

    <!-- konten --> 
    
    <!-- footer -->
    <div class="footer">
        <p class="copy">Copyright SAKU.co All Rights Reserved 2023</p>
    </div>
</body>
</html>