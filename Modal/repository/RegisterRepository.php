<?php

function register($databaseManager)
{
    //TODO: Change GET var into a seperate var
    $_GET['error'] = null;
    $userName = $_POST["userName"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $repeatPassword=$_POST["repeatPassword"];
    $userRole = (int) $_POST['userRole'];

    if (emptyRegisterInput($userName, $email, $password, $repeatPassword) !== false) {
        $_GET['error'] = "Empty-fields";
        return $_GET['error'];
    }

    if (invalidyUsername($userName) !== false) {
        $_GET['error'] = "Invalid-username";
        return $_GET['error'];
    }

    if (invalidEmail($email) !== false) {
        $_GET['error'] = "Invalid-email";
        return $_GET['error'];
    }

    if (passwordMatch($password, $repeatPassword) !== false) {
        $_GET['error'] = "No-matching-pwd";
        return $_GET['error'];
    }

    if (userExists($databaseManager, $userName, $email) !== false) {
        $_GET['error'] = "Uid-already-exists";
        return $_GET['error'];
    }

    // header("location: index.php?page={$_GET['page']}&error={$_GET['error']}");

    createUser($databaseManager, $userName, $email, $password, $userRole);
    return $_GET['error'];
}

function emptyRegisterInput($userName, $email, $password, $repeatPassword) 
{
    $result = "";
    if (empty($userName) || empty($email) || empty($password) || empty($repeatPassword)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidyUsername($userName)
{
    $result = "";
    // preg_match is a build in function that will check if the input only containts given attributes
    if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $repeatPassword)
{
    $result = "";
    if ($password !== $repeatPassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function userExists($databaseManager, $userName, $email)
{
    $sql = "SELECT * FROM user WHERE username = :username OR email = :email;";

    $sqlStatement = $databaseManager->database->prepare($sql);

    if (!$sqlStatement) {
        require 'index.php?page=register';
        exit();
    }

    $sqlStatement->bindParam(':username', $userName, PDO::PARAM_STR);
    $sqlStatement->bindParam(':email', $email, PDO::PARAM_STR);

    $sqlStatement->execute();
    $statementResult = $sqlStatement->fetch(PDO::FETCH_ASSOC);

    if ($statementResult) {
        return $statementResult;
    } else {
        $result = false;

        return $result;
    }

    $sqlStatement->close();
}

function createUser($databaseManager, $userName, $email, $password, $userRole)
{
    $sql = "INSERT INTO user (username, email, password, role_id) VALUES (:username, :email, :password, :role_id)";
    

    $sqlStatement = $databaseManager->database->prepare($sql);

    if (!$sqlStatement) {
        require 'index.php?page=register';
        exit();
    }

    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

    $sqlStatement->bindParam(':username', $userName, PDO::PARAM_STR, 255);
    $sqlStatement->bindParam(':email', $email, PDO::PARAM_STR, 255);
    $sqlStatement->bindParam(':password', $hashedpwd, PDO::PARAM_STR, 255);
    $sqlStatement->bindParam(':role_id', $userRole, PDO::PARAM_INT);

    echo "<pre>";
    var_dump($sqlStatement);
    echo "</pre>";

    $test = $sqlStatement->execute();

    echo "<pre>";
    var_dump($test);
    echo "</pre>";

    require "index.php?page=login";
    $sqlStatement = null;
    exit();
}

function errorMessage($error)
{
    if (isset($_GET["error"])) {
        switch ($error) {

            case 'Empty-fields':
                //TODO: CLEAN This up jeez
                $errorMessage = "FILL IN ALL FIELDS!";

                break;

            case 'Invalid-username':
                $errorMessage ='<h3 style="color: red; font-size: 16px;">INVALID USERNAME!</h3>';

                break;

            case 'Invalid-email':
                $errorMessage = '<h3 style="color: red; font-size: 16px;">INVALID EMAIL!</h3>';

                break;

            case 'No-matching-pwd':
                $errorMessage ="PASSWORDS DON'T MATCH!";

                break;

            case 'Uid-already-exists':
                $errorMessage = "ACCOUNT ALREADY EXISTS!";

                break;
        } return $errorMessage;
    }
}