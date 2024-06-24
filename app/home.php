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
    <title>Homepage</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">

            <?php

               $id = $_SESSION['id'];
               $query = pg_query($con, "SELECT * FROM users WHERE id = $id");

               while($result = pg_fetch_assoc($query)) {
                $res_Uname = $result['username'];
                $res_Email = $result['email'];
                $res_Age = $result['age'];
                $res_id = $result['id'];
               }
               echo"<a href='edit.php?id=$res_id'>Edit Profil</a>"
            ?>
            <a href="logout.php"><button class="btn">Log Out</button></a>

        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Halo <b>Litto</b>, Selamat datang!</p>
                </div>
                <div class="box">
                    <p>Email mu <b>litto@gmail.com</b></p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>Umurmu adalah <b>17 Tahun</b></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>