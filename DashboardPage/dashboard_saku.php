<?php
    error_reporting(0);
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location = "../HomePage/homepage_saku.html"</script>';
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
                <a href="../DashboardPage/dashboard_saku.php" target="_self">SAKU.co</a>
            </div>

            <div class="nav">
                <a href="../ProfilePage/profilepage_saku.php">Profile</a>
                <a href="../MenuPage/MenuPage_SAKU.html">Menu</a>
                <a href="../DashboardPage/keluar.php">Keluar </a>

            </div>
        </nav>
    </div>

    <!-- konten --> 
    <div class="container-menu">
        <div class="dashboard-menu">
            <img src="../img/dining4.jpg" alt="#">
            <div class="dashboard-menup">
                <h3>Menu</h3>
                <p>SAKU.co menyediakan makanan yang berkualitas dan ramah dikantong atau bersahabat dengan dompet anda, dijamin enak dan mantap. Minuman yang disediakan oleh SAKU.co juga tidak kalah segar dan nikmat, dijamin haus hilang harga tetap bersahabat, BELI sekarang!</p>
                <button onclick="window.location = '../MenuPage/MenuPage_SAKU.html'" type="submit" name="submit">Lihat</button>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <p class="copy">Copyright SAKU.co All Rights Reserved 2023</p>
    </div>
</body>
</html>