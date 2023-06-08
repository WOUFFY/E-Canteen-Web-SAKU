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
    <div class="dashboard-makanan">
        <img src="../img/dining3.jpg" alt="#">
        <div class="dashboard-makananp">
            <h3>Makanan</h3> 
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque fugiat, maiores voluptas voluptatem nemo porro non earum consequatur optio, dolorem aliquid quae iure! Voluptatem earum molestiae, aperiam quasi maiores dolore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic eos facere quo rem facilis mollitia, voluptatum exercitationem. Sit eos magni quis praesentium, ipsam animi. Quod architecto quasi eos inventore in. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque dolores repudiandae porro.</p>
            <button onclick="window.location = '../MenuPage/MenuPage_SAKU.html'" type="submit" name="submit">Lihat</button>
        </div>
    </div>
    <div class="dashboard-minuman">
        <img src="../img/dining4.jpg" alt="#">
        <div class="dashboard-minumanp">
            <h3>Minuman</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque fugiat, maiores voluptas voluptatem nemo porro non earum consequatur optio, dolorem aliquid quae iure! Voluptatem earum molestiae, aperiam quasi maiores dolore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic eos facere quo rem facilis mollitia, voluptatum exercitationem. Sit eos magni quis praesentium, ipsam animi. Quod architecto quasi eos inventore in. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque dolores repudiandae porro.</p>
            <button onclick="window.location = '../MenuPage/MenuPage_SAKU.html'" type="submit" name="submit">Lihat</button>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <p class="copy">Copyright SAKU.co All Rights Reserved 2023</p>
    </div>
</body>
</html>