<?php 

// require_once '../setup.php';


// if(isset($_POST["register"])){

//     $databaseManager->connect();
//     $newUser = new RegisterController($databaseManager);

//     $userName = $_POST["userName"];
//     $email=$_POST["email"];
//     $password=$_POST["password"];
//     $repeatPassword=$_POST["repeatPassword"];
//     $userRole = (int) $_POST['userRole'];

//     $_SESSION["email"] = $_POST["email"];
//     $newUser->register($userName, $email, $password, $repeatPassword, $userRole);

// }

echo "<h2>POST</h2>";
var_dump($_POST);

echo "<h2>GET</h2>";
var_dump($_GET);
// echo "<h2>SESSION</h2>";
// var_dump($_SESSION);



?>

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

    <?php if(isset($controller)) { $controller->errorMessage(); } ?>

</body>
</html>