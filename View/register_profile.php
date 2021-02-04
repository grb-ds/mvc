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


<div class="signin-container">
    <div class="signin-form">
        <form action="" method="POST">
            <h3>Register a new account:</h3>
            </select><br>
            <input type="text" name="userName" placeholder="Your full name...">
            <br><br>
            <input type="text" name="email" placeholder="Your email adress...">
            <br><br>
            <input type="password" name="password" placeholder="Your password...">
            <br><br>
            <input type="password" name="repeatPassword" placeholder="Repeat your password...">
            <br><br>
            <select name="userRole" id="userRole">
                <option value="1">Coach</option>
                <option value="2">Student</option>
            </select>
            <br><br>
            <hr>
            <button type="submit" name="register" value="register" id="register-db">Register Now!</button>
        </form>
    </div>
</div>

<?php if(!empty($error)) : ?>
<h3 style="color: red; font-size: 16px;"><?= errorMessage($error) ?></h3>
<?php  endif; ?>
</body>

</html>