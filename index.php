<?php
declare(strict_types = 1);

require_once 'setup.php';

// files for log in
require_once 'Controller/UserController.php';
require_once 'Controller/ChallengeController.php';


require_once 'Modal/repository/UserRepository.php';
require_once 'Modal/repository/RegisterRepository.php';

require_once 'Modal/business/User.php';
require_once 'Modal/business/Coacher.php';
require_once 'Modal/business/Challenge.php';

if(isset($_POST['registerNow'])) {
    //files for Registering
require_once 'View/register_profile.php';
require_once 'Controller/RegisterController.php';
require_once 'Modal/repository/RegisterRepository.php';

}

$email = $password = "";
$email_err = $password_err = "";
$databaseManager->connect();
$result = null;
$nextWatch = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $userController = new UserController($databaseManager);

        $userController->render($_GET, $_POST);
    }
}

if (isset($_GET["page"]) && $_GET["page"] == "coach_profile" && isset($_SESSION) && !empty($_SESSION["userEmail"]) && !empty($_SESSION["userPassword"])) {
    $userController = new UserController($databaseManager);
    require_once "View/coach_profile.php";
}

if (isset($_GET["page"]) && $_GET["page"] == "student_profile" && isset($_SESSION) && !empty($_SESSION["userEmail"]) && !empty($_SESSION["userPassword"])) {
    $userController = new UserController($databaseManager);
    require_once "View/student_profile.php";
}

if (isset($_GET["page"]) && $_GET['page'] == 'register'){
    require_once 'Controller/RegisterController.php';
    require_once 'Modal/repository/RegisterRepository.php';

    $controller = new RegisterController($databaseManager);
    $controller->render($_GET, $_POST);
} 

if (isset($_GET["page"]) && $_GET["page"] === "createChallenge" ) {
    $challengeController = new ChallengeController($databaseManager);

    $challengeController->render($_GET, $_POST);
}


if (isset($_GET["page"]) && $_GET['page'] === "home" ) {
    require_once "Controller/SessionDestroyer.php";
}

if(empty($_GET)){
    require_once 'View/public_homepage.php';
}