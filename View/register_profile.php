
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeCode2U</title>
</head>
<body>
    
    <header>
    
    </header>

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
        <button type="submit" name="register" value="register" id="register">Register now!</button>
    </form>

    <?php if(!empty($error)) : ?>
        <h3 style="color: red; font-size: 16px;"><?= errorMessage($error) ?></h3>
    <?php  endif; ?>
</body>
</html>