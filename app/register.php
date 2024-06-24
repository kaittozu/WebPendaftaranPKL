<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Pendaftaran Akun</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php

            include("php/config.php");
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];

                //verifikasi email unik

                $verify_query = pg_query($con,"SELECT email FROM users WHERE email='$email'");

                if(pg_num_rows($verify_query) !=0 ){
                    echo "<div class='message'>
                            <p>Email ini sudah terpakai, coba dengan email lain!</p>
                        </div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Kembali</button>";
                }
                else {
                    pg_query($con,"INSERT INTO users(username,email,age,password) VALUES('$username','$email','$age','$password')") or die("Error occurred");
                    echo "<div class='message'>
                            <p>Registrasi Berhasil!</p>
                         </div><br>";
                    echo "<a href='index.php'><button class='btn'>Login sekarang</button>";
                }
            } else {
        ?>
            <header>Sign Up</header>
            <form action="" method="post">

                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Umur</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <input type="submit" class="btn" name="submit" value="Register" autocomplete="off" required>
                </div>

                <div class="links">
                    Sudah punya akun? <a href="index.php">Login sekarang</a>
                </div>
                
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>