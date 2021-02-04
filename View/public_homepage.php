<?php var_dump($_SESSION); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
        integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="style/b.png" />
    <link rel="stylesheet" href="style/style.css">
    <title>Becode2U</title>
</head>
<body>
  
  
<div class="signin-container">
    <div class="signin-form">
    <h1>WELCOME BACK! </h1> 
    <p>Please log in to continue</p>

    <form action="" method="POST">
        <h3>Log in to continue:</h3>
        </select><br>
        <input type="text" name="email" placeholder="Email Address">
        <br><br>
        <input type="password" name="password" placeholder="Password">
        <!-- <br><br><br>
        <hr> -->

        <button type="submit" name="login" value="login" id="login"><p>Log in</p></button>
        <!-- <br><br> -->
        <button name="registerNow" id="register"><a href="index.php?page=register"><p>Register new account!</p></a></button>

    </form>

    </div>
</div>


</body>
</html>