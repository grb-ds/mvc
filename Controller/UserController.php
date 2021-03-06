<?php
declare(strict_types = 1);
require_once './Modal/repository/UserRepository.php';
require_once './Modal/business/User.php';

class UserController 
{
    private $userRepository;
    public $loginError;
    private $message;

    private $databaseManager;
    public $watchSchedule;
    public $nextWatch;
    public $class1;
    public $class2;
    public $reminder;
    public $classmates;
    public $challenges;

    public function __construct(DatabaseManager $databaseManager)
    {
        $this->userRepository = new UserRepository($databaseManager);
        $this->message = "";
        $this->databaseManager = $databaseManager;
    }

    public function render(array $get, array $post)
    {
        $user = $this->login($post['email'], $post['password']);

        if ($user) {
            $_SESSION["userEmail"] = $user->getEmail();
            $_SESSION["userPassword"] = $user->getPassword();
            $_SESSION["logginUserId"] = $user->getId();
            $_SESSION["logginUserName"] = $user->getUsername();
            $_SESSION["user_role"] = $user->getRoleId();
            $_SESSION["challenges"] = $this->getChallenges();
            $this->watchSchedule = $this->getWatchSchedule();
            $_SESSION["watchSchedule"] = $this->watchSchedule;
        }

        //load the view
        $this->renderByUserRole($user);
        exit();
    }

    public function login($username, $password)
    {
        return $this->userRepository->find($username,$password);
    }

    public function getChallengesByClassId($classId)
    {
        return $this->userRepository->getChallengesByClassId($classId);
    }

    public function renderByUserRole($user)
    {
        if ($user) {
            switch ($user->getRoleId()) {
                case 1:

                    // Below function for the coach, needed to be loaded on the login page
                    //$this->upComingWatch();
                    $this->class1 = $this->getClassmates(1);
                    $_SESSION["class1"] = $this->class1;

                    $this->class2 = $this->getClassmates(2);
                    $_SESSION["class2"] = $this->class2;


                    require "View/coach_profile.php";
                    require 'View/includes/nav_coach.php';
                  //  header("location: ./View/coach_profile.php");

                    break;
                case 2:
                    
                    // Below function for the student, needed to be loaded on the login page
                    $id = $_SESSION["logginUserId"];

                    $this->reminder=$this->watchReminder($id);
                    $_SESSION["reminder"] = $this->reminder;
                    $classNumber=$this->getClassNumber($id);
                    //$_SESSION["classNumber"] = $this->classNumber;
                    $this->classmates = $this->getClassmates($classNumber);  
                    $_SESSION["classmates"] = $this->classmates;


                    require "View/student_profile.php";
                    require 'View/includes/nav_student.php';
                    break;
            }
            $this->sucessMessage();
        } else {
            require_once "./View/public_homepage.php";
            $this->errorMessage();
        }
    }

    public function errorMessage()
    {
        $this->message = '<h3 style="color: red; font-size: 16px;">INVALID LOGIN!</h3>';
        return $this->message;
    }

    public function sucessMessage()
    {
        $this->message = '<h3 style="color: green; font-size: 16px;">WELCOME!</h3>';
        return $this->message;
    }

    public function getMessage(){
        return $this->message;
    }

    // get the same values in getWatchSchedule function now - 
    // public function upComingWatch()
    // {
    //     $sql = "SELECT watch.id, watch.name, watch.date, students.first_name FROM watch, students WHERE students.id=watch.student_id;";

    //     $databaseUser = $this->databaseManager->database->prepare($sql);
    //     $databaseUser->execute();
    //     $this->nextWatch = $databaseUser->fetch();
    //     //return $this->nextWatch;
    //     $_SESSION["nextWatch"] =$this->nextWatch;
    // }

    public function watchReminder($id)
    {
        $sql = "SELECT user.id, user.username, user.email, watch.date 
        FROM user, watch, students 
        WHERE students.user_id=user.id AND watch.student_id=students.id AND user.id=$id";

        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute([$id]);
        $result = $databaseUser->fetch();
        return $result;
    }

    public function getClassNumber($id)
    {
        $sql ="SELECT class_id FROM students where user_id = $id";

        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute([$id]);
        $result = $databaseUser->fetch();
        return $result["class_id"];
    }

    public function getClassmates($classNumber)
    {
        $sql ="SELECT students.first_name, classes.name
                FROM students, classes
                WHERE students.class_id=classes.id AND classes.id=$classNumber";

        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute([$classNumber]);
        $result = $databaseUser->fetchALL();
        return $result;
    }

    public function getChallenges()
    {
        $sql ="SELECT * FROM challenge";

        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute();
        $result = $databaseUser->fetchALL();
        return $result;
    }

    public function getWatchSchedule()
    {
        $sql = "SELECT watch.id, watch.name, watch.date, students.first_name 
                FROM watch, students WHERE students.id=watch.student_id 
                ORDER BY watch.date";
    
        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute();
        $result = $databaseUser->fetchAll();
        return $result;    
    }
}