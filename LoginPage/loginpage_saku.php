<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="loginpage_saku.css">
</head>
<body>
    <!-- section start -->
    <section>
        <div class="image1"></div>

        <div class="form">
            <h1>Log In</h1>
            
            <form action="" method="post">
                <div class="input_field">
                    <input type="text" name="username" placeholder="username" required>
                </div>
                <div class="input_field">
                    <input type="password" name="password" placeholder="password" required>
                </div>
                <div class="submit_field">
                    <button type="submit" name="submit" value="Sign Up">Login</button>
                    <label>dont have an account? <a href="../RegisterPage/registerpage_saku.php">Register</a></label>
                </div>
            </form>
            <?php
                if(isset($_POST['submit'])){
                    session_start();
                    include '../DashboardPage/db.php';
                    $user = $_POST['username'];
                    $password = $_POST['password'];

                    $cek = mysqli_query($con, "SELECT * FROM user WHERE user_username = '".$user."' AND user_password = '".$password."'");
                    if(mysqli_num_rows($cek) > 0 ){

                        $d = mysqli_fetch_object($cek);
                        $_SESSION['status_login'] = true;
                        $_SESSION['a_global'] = $d;
                        $_SESSION['id'] = $d->user_Id;

                        echo '<script>window.location = "../DashboardPage/dashboard_saku.php"</script>';
                    }
                    else{
                        echo '<script>alert("Username atau Password anda salah!")</script>';
                    }
                }
            ?>
            
            <!-- footer -->
            <div class="footer">
               <p class="copy">Copyright SAKU.co All Rights Reserved 2023</p>
           </div>
        </div>

        <div class="image2"></div>
    </section>
</body>
</html>