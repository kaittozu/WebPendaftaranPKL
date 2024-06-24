<?php
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])) {
        header("Location: index.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Edit Profil</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="edit.php">Sarastya Technology Integrata</a></p>
        </div>

        <div class="right-links">
            <a href="#">Edit Profil</a>
            <a href="php/logout.php"><button class="btn">Log Out</button></a>

        </div>
    </div>

    <div class="container">
        <div class="box form-box">
        <?php

            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];

                $id = $_SESSION['id'];

                $edit_query = pg_query($con, "UPDATE users SET username ='$username', email='$email', age='$age' WHERE id = $id") or die("Error Occurred");

                if($edit_query) {
                    echo "<div class='message'>
                    <p>Profil telah diperbarui</p>
                    </div><br>";
                     echo "<a href='home.php'><button class='btn'>Kembali ke homepage</button>";
                }
            } else {

                $id = $_SESSION['id'];
                $query = pg_query($con, "SELECT * FROM users WHERE id = $id");

                while($result = pg_fetch_assoc($query)) {
                    $res_Uname = $result['username'];
                    $res_Email = $result['email'];
                    $res_Age = $result['age'];   
                }

        ?>

            <header>Edit Profil</header>
            <form action="" method="post">

                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?php echo $res_Uname ?>" id="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $res_Email ?>" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Umur</label>
                    <input type="number" name="age" value="<?php echo $res_Age ?>" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <input type="submit" class="btn" name="submit" value="Edit" autocomplete="off" required>
                </div>

            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>