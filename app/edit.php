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
            <p><a href="edit.php">Logo</a></p>
        </div>

        <div class="right-links">
            <a href="#">Edit Profil</a>
            <a href="logout.php"><button class="btn">Log Out</button></a>

        </div>
    </div>

    <div class="container">
        <div class="box form-box">
            <header>Edit Profil</header>
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
                    <input type="submit" class="btn" name="submit" value="Edit" autocomplete="off" required>
                </div>

            </form>
        </div>
    </div>
</body>
</html>