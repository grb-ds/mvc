<?php
declare(strict_types = 1);

/*require_once './Modal/business/Coacher.php';
require_once './Modal/business/Student.php';*/
/*require_once '../Modal/repository/UserRepository.php';*/
/*require_once '../Modal/business/User.php';
require_once '../Modal/repository/CoacherRepository.php';*/

require_once './Modal/business/Challenge.php';
require_once './Modal/repository/ChallengeRepository.php';

class ChallengeController {

    private $challengeRepository;
   // public $loginError;
    private $message;

    /**
     * UserController constructor.
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->challengeRepository = new ChallengeRepository($databaseManager);
        $this->message = "";
    }

    public function render($get, $post) {

        if (isset($post["addChallenge"])) {
            var_dump($post["addChallenge"]);
       /*     $dateStartS = date_create($_POST['yearStart']."-".$_POST['monthStart']."-".$_POST['dayStart']);
            $dateEndS = date_create($_POST['yearEnd']."-".$_POST['monthEnd']."-".$_POST['dayEnd']);
            date_timestamp_set($dateStartS);
            date_timestamp_set($dateEndS);
            $dateStart = date_format($dateStartS, 'Y-m-d H:i:s');
            $dateEnd = date_format($dateEndS, 'Y-m-d H:i:s');*/

            $challenge =  $this->create($_POST['name'],
                            $_POST['description'],
                            $_POST['dayStart'],
                            $_POST['monthStart'],
                            $_POST['yearStart'],
                            $_POST['dayEnd'],
                            $_POST['monthEnd'],
                            $_POST['yearEnd'],
                            $_POST['url'],
                            $_POST['type'],
                            (int)$_POST['classes']);

           if ($challenge) {
               var_dump($challenge);
           }
        }

        require "View/create_challenge.php";
    }


    public function create($name, $description, $dayOpen, $monthOpen, $yearOpen, $dayEnd, $monthEnd, $yearEnd, $url, $type, $classId)
    {
        $dateStartS = date_create($yearOpen."-".$monthOpen."-".$dayOpen);
        $dateEndS = date_create($yearEnd."-".$monthEnd."-".$dayEnd);
        date_timestamp_set($dateStartS);
        date_timestamp_set($dateEndS);
        $dateStart = date_format($dateStartS, 'Y-m-d H:i:s');
        $dateEnd = date_format($dateEndS, 'Y-m-d H:i:s');

        return $this->challengeRepository->create($name, $description, $dateStart, $dateEnd, $url, $type, $classId);
    }

    public function renderByUserRole($user)
    {
        if ($user)
        {
            switch ($user->getRoleId()) {
                case 1:
                    require_once "./View/coach_profile.php";

                    break;
                case 2:
                    require_once "./View/student_profile.php";
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


}