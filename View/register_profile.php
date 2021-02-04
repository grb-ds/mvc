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
<header>
    <nav class="login">
        <a href="index.php"><i class="fas fa-arrow-left"></i>  RETURN TO SIGN IN</a>
    </nav>
</header>

<div class="signin-container">
    <div class="signin-form">
        <h1>Register<br>A New Account</h1>
        <form action="" method="POST">
           
            <input type="text" name="userName" placeholder="Full Name">
            <br><br>
            <input type="text" name="email" placeholder="Email address">
            <br><br>
            <input type="password" name="password" placeholder="Password">
            <br><br>
            <input type="password" name="repeatPassword" placeholder="Re-enter password">
            <br><br>
            <select name="userRole" id="userRole">
                <option value="1">Coach</option>
                <option value="2">Student</option>
            </select>
            <br><br>
            <!-- <hr> -->
            <button type="submit" name="register" value="register" id="login">Register Now!</button>
            <br>
            <?php if(!empty($error)) : ?>
                <h3 style="color: red; font-size: 16px;"><?= errorMessage($error) ?></h3>
            <?php endif; ?>
        </form>
    </div>
</div>
</body>
</html>