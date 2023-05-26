<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="registerpage_saku.css">
</head>
<body>
    <!-- section start -->
    <section>
        <div class="image1"></div>

        <div class="form">
            <h1>Sign Up</h1>
            
            <form action="" method="post">
                <div class="input_field">
                    <input type="text" name="nama" placeholder="nama lengkap" required>
                </div>
                <div class="input_field">
                    <input type="text" name="username" placeholder="username" required>
                </div>
                <div class="input_field">
                    <input type="email" name="email" placeholder="email" required>
                </div>
                <div class="input_field">
                    <input type="password" name="password" placeholder="password" required>
                </div>
                <div class="submit_field">
                    <button type="submit" name="submit" value="Sign Up">Register</button>
                    <label>already have an account? <a href="../LoginPage/loginpage_saku.php">Login</a></label>
                </div>
            </form>
            <?php
                 if(isset($_POST['submit'])){
                    session_start();

                    include 'db.php';

                    $temp = "SELECT * FROM user";
                    if ($result = mysqli_query($con, $temp)) {
  
                        // Return the number of rows in result set
                        $rowcountbf = mysqli_num_rows( $result );
                    }
                     
                    $user = $_POST['username'];
                    $email = $_POST['email'];
                    $nama = $_POST['nama'];
                    $password = $_POST['password'];

                    $cek = mysqli_query($con, "SELECT * FROM user WHERE user_email = '".$email."'");
                    if(mysqli_num_rows($cek) > 0 ){
                        echo '<script>alert("Email tersebut sudah terdaftar!")</script>';
                    }   
                    else{
                        $insert = mysqli_query($con, "INSERT INTO user (user_username,user_nama,user_email,user_password) VALUES ('".$user."','".$nama."','".$email."','".$password."')");
    
                        if ($result2 = mysqli_query($con, $temp)) {
      
                            // Return the number of rows in result set
                            $rowcountaf = mysqli_num_rows($result2);
                        }
                        if( $rowcountbf = ($rowcountaf + 1) ){
                            $_SESSION['status_login'] = true;
    
                            echo '<script>window.location = "loginpage_saku.php"</script>';
                        }
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