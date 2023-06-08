<?php
    include '../DashboardPage/db.php';
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location = "../HomePage/homepage_saku.html"</script>';
    }
    $data = mysqli_query($con, "SELECT * FROM user WHERE user_Id ='".$_SESSION['id']."'");
    $d = mysqli_fetch_object($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="profilepage_saku.css">
</head>
<body>
     <!-- navvigasi bar -->
     <div class="nav-body">
        <nav class="navbar">
            <div class="judul">
                <a href="../DashboardPage/dashboard_saku.php" target="_self">SAKU.co</a>
            </div>

            <div class="nav">
                <a href="#">Profile</a>
                <a href="../MenuPage/MenuPage_SAKU.html">Menu</a>
                <a href="../DashboardPage/keluar.php">Keluar </a>

            </div>
        </nav>
    </div>

    <!-- konten --> 
    <div class="content">
            <h3>Profile</h3> 
            <div class="box">
                <form action="" method="POST">
                <div class="inputbox">
                    <input type="text" name="username" placeholder="Username" value="<?php echo "$d->user_username"?>" required>
                    <input type="text" name="nama" placeholder="Nama lengkap" value="<?php echo "$d->user_nama"?>" required>
                    <input type="email" name="email" placeholder="Email" value="<?php echo "$d->user_email"?>" required>
                    <input type="password" name="password-awal" placeholder="Password awal"  required>
                    <input type="password" name="password-baru" placeholder="Password baru"  required>
                    <input type="password" name="confirm-password" placeholder="Confirm password" required>
                </div>
                <div class="submit-btn">
                    <button type="submit" name="submit" value="Ubah Data">Ubah Data</button>
                </div>
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $nama               = $_POST['nama'];
                        $username           = $_POST['username'];
                        $email              = $_POST['email'];
                        $passwordawal       = $_POST['password-awal'];
                        $passwordbaru       = $_POST['password-baru'];
                        $confirmpassword    = $_POST['confirm-password'];

                        if($passwordawal != $d->user_password){
                            echo '<script>alert("Pastikan password anda benar!")</script>';

                        }
                        elseif($passwordbaru != $confirmpassword){
                            echo '<script>alert("Konfirmasi password anda salah!")</script>';
                        }
                        else{
                            $update = mysqli_query($con, "UPDATE user SET
                            user_username   ='".$username."',
                            user_nama       ='".$nama."',
                            user_email      ='".$email."',
                            user_password   ='".$passwordbaru."'
                            WHERE user_Id   ='".$d->user_Id."'");
                            
                            echo '<script>alert("Ubah data berhasil!")</script>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="footer">
        <p class="copy">Copyright SAKU.co All Rights Reserved 2023</p>
    </div>
</body>
</html>