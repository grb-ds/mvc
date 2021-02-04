<?php
declare(strict_types = 1);


/*require_once './Modal/business/Coacher.php';
require_once './Modal/business/Student.php';*/
/*require_once '../Modal/repository/UserRepository.php';*/
/*require_once '../Modal/business/User.php';
require_once '../Modal/repository/CoacherRepository.php';*/

require_once './Modal/repository/UserRepository.php';
require_once './Modal/business/User.php';
require_once './Modal/repository/CoacherRepository.php';


class UserController {

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

    /**
     * UserController constructor.
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->userRepository = new UserRepository($databaseManager);
        $this->message = "";
        $this->databaseManager = $databaseManager;
        // $challenges = $this->challenges;
        
    }

    public function render(array $get, array $post)
    {
        var_dump($_SESSION);
        //this is just example code, you can remove the line below

        $user = $this->login($post['email'], $post['password']);


        if ($user) {
            $_SESSION["userEmail"] = $post['email'];
            $_SESSION["userPassword"] = $post['password'];
            $_SESSION["logginUserId"] = $user->getId();
            $_SESSION["logginUserName"] = $user->getUsername();

           // $_SESSION['user'] = serialize((array) $user);

            $this->challenges = $this->getChallenges();
            // $this->challenges = $this->getChallengesByClassId(1);
            
        }

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

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
        if ($user)
        {
             switch ($user->getRoleId()) {
                case 1:

                    // Below function for the coach, needed to be loaded on the login page
                    $this->nextWatch = $this->upComingWatch();
                    $this->class1 = $this->getClassmates(1);
                    $this->class2 = $this->getClassmates(2);

                    require "View/coach_profile.php";
                    require 'View/includes/nav_coach.php';
                   // require 'test.php';

                  //  header("location: ./View/coach_profile.php");

                    break;
                case 2:
                    
                    // Below function for the student, needed to be loaded on the login page
                    $id = $_SESSION["logginUserId"];

                    $this->reminder=$this->watchReminder($id);
                    $classNumber=$this->getClassNumber($id);
                    $this->classmates = $this->getClassmates($classNumber);

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

   
    public function upComingWatch(){

        $sql = "SELECT watch.id, watch.name, watch.date, students.first_name FROM watch, students WHERE students.id=watch.student_id;";

        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute();
        $result = $databaseUser->fetch();
        return $result;
    }

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

    public function getClassNumber($id){

        $sql ="SELECT class_id FROM students where user_id = $id";

        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute([$id]);
        $result = $databaseUser->fetch();
        return $result["class_id"];
    }

    public function getClassmates($classNumber){

        $sql ="SELECT students.first_name, classes.name
                FROM students, classes
                WHERE students.class_id=classes.id AND classes.id=$classNumber";

        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute([$classNumber]);
        $result = $databaseUser->fetchALL();
        return $result;
    }

    public function getChallenges(){
        
        $sql ="SELECT * FROM challenge";

        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute();
        $result = $databaseUser->fetchALL();
        return $result;
       
    }

    public function getWatchSchedule()
    {
        $sql = "SELECT watch.id, watch.name, watch.date, students.first_name FROM watch, students WHERE students.id=watch.student_id;";
    
        $databaseUser = $this->databaseManager->database->prepare($sql);
        $databaseUser->execute();
        $result = $databaseUser->fetchAll();
    
        foreach($result as $row)
        {
            // echo "<pre>";
            // var_dump($result);
            // echo "</pre>";
            $myArray[] = array(
                'id'   => $row["id"],
                'title'   => $row["first_name"],
                'start'   => $row["date"],
            );
    
        }
        echo json_encode($myArray);        
        
    
        
    
    }
    
}