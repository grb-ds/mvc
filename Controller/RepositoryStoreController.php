<?php
declare(strict_types = 1);

require_once './Modal/business/RepositoryStore.php';
require_once './Modal/repository/RepositoryStoreRepository.php';

class RepositoryStoreController {

    private $repositoryStoreRepository;
    public  $message;
    public $challenges;

    /**
     * UserController constructor.
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->repositoryStoreRepository = new RepositoryStoreRepository($databaseManager);
        $this->message = "";
    }

    public function render($get, $post) {

        $this->challenges = $this->getChallenges(1);

        if (isset($_POST["addRepository"])) {

            $repository = $this->create($_SESSION['logginUserId'],
                            $_POST['challengeSelected'],
                            $_POST['name'],
                            $_POST['url']);

          if ($repository) {
             $this->sucessMessage();
          } else {
             $this->errorMessage();
          }
        }

        require "View/create_repository.php";
    }

     public function create($user_id, $challenge_id, $name, $url){

        return $this->repositoryStoreRepository->create($user_id, $challenge_id, $name, $url);
    }

    public function getChallenges($classId){
        return $this->repositoryStoreRepository->getChallengesByClassId($classId);
    }


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