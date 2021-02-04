<?php
declare(strict_types = 1);
require_once './Modal/business/Challenge.php';
require_once './Modal/repository/ChallengeRepository.php';

class ChallengeController {

    private $challengeRepository;
    public  $message;

    public function __construct(DatabaseManager $databaseManager)
    {
        $this->challengeRepository = new ChallengeRepository($databaseManager);
        $this->message = "";
    }

    public function render($get, $post) 
    {
        if (isset($_POST["addChallenge"])) {
            $challenge = $this->create(
                $_POST['name'],
                $_POST['description'],
                $_POST['dayStart'],
                $_POST['monthStart'],
                $_POST['yearStart'],
                $_POST['dayEnd'],
                $_POST['monthEnd'],
                $_POST['yearEnd'],
                $_POST['url'],
                $_POST['type'],
                (int)$_POST['classes']
            );

            if ($challenge) {
                $this->sucessMessage();
            } else {
                $this->errorMessage();
            }
        }
        require "View/create_challenge.php";
    }

    public function create($name, $description, $dayOpen, $monthOpen, $yearOpen, $dayEnd, $monthEnd, $yearEnd, $url, $type, $classId)
    {
        $dateStartS = date_create($yearOpen."-".$monthOpen."-".$dayOpen);
        $dateEndS = date_create($yearEnd."-".$monthEnd."-".$dayEnd);
        $dateStart = $dateStartS->format('Y-m-d H:i:s');
        $dateEnd = $dateEndS->format('Y-m-d H:i:s');

        return $this->challengeRepository->create($name, $description, $dateStart, $dateEnd, $url, $type, $classId);
    }

    // public function getByClassId($classId)
    // {
    //     return $this->challengeRepository->findByClassId($classId);
    // }

    public function errorMessage()
    {
        $this->message = '<h3 style="color: red; font-size: 16px;">PROCESS WITH ERROR!</h3>';
        return $this->message;
    }

    public function sucessMessage()
    {
        $this->message = '<h3 style="color: green; font-size: 16px;">SUCESS!</h3>';
        return $this->message;
    }

    public function getMessage(){
        return $this->message;
    }
}