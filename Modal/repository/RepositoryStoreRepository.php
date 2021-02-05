<?php

class RepositoryStoreRepository
{
    private $databaseManager;
    private $repositoryStore;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
        $this->repositoryStore = new RepositoryStore();
    }

    public function create($user_id, $challenge_id, $name, $url)
    {
        $query = "INSERT INTO repository (user_id, challenge_id, name, url)  VALUES (:user_id1, :challenge_id1, :name1, :url1)";

        $sqlStatement = $this->databaseManager->database->prepare($query);

        $sqlStatement->bindParam(':user_id1', $user_id, PDO::PARAM_INT);
        $sqlStatement->bindParam(':challenge_id1', $challenge_id, PDO::PARAM_INT);
        $sqlStatement->bindParam(':name1', $name, PDO::PARAM_STR,255);
        $sqlStatement->bindParam(':url1', $url, PDO::PARAM_STR,255);

        $result =  $sqlStatement->execute();

        return $result;
    }

    public function getChallengesByClassId($classId)
    {
        $query = 'SELECT t1.* FROM challenge t1 INNER JOIN classes t2 ON t1.class_id = t2.id and t2.id = :classId1';
        $sqlStatement = $this->databaseManager->database->prepare($query);

        $sqlStatement->bindParam(':classId1', $classId, PDO::PARAM_INT);
        $sqlStatement->execute();

        $statementResult = $sqlStatement->fetchALL();

        if ($statementResult) {
            return $statementResult;
        } else {
            $result = false;
            return $result;
        }
    }

    public function getIncompleteChallenges($userId){
        $query = 'SELECT t1.*, t2.name training, t2.date_open, t2.date_due, t3.username FROM classes t1 INNER JOIN training t2 ON t1.training_id = t2.id INNER JOIN user t3 ON t1.coacher_id = t3.id and t1.status = :status1';
    }


    // Get one
   public function find()
    {

    }

   /* // Get all
    public function get()
    {
        $query = 'SELECT * FROM challenge WHERE email = :email and password = :password';
        $sqlStatement = $this->databaseManager->database->prepare($query);

        $sqlStatement->bindParam(':email', $email, PDO::PARAM_STR,255);
        $sqlStatement->bindParam(':password', $password, PDO::PARAM_STR,25);
        $sqlStatement->execute();

        $statementResult = $sqlStatement->fetch(PDO::FETCH_ASSOC);
        var_dump($statementResult);

        if ($statementResult) {
           var_dump($statementResult);
            //$this->mapper($statementResult);
            return $this->user;
        } else {
            $result = false;
            return $result;
        }
    }*/

    public function update()
    {

    }

    public function delete($id)
    {

    }
//
//    public function mapper($array)
//    {
//        $this->user->setId($array["id"]);
//        $this->user->setUsername($array["username"]);
//        $this->user->setPassword($array["password"]);
//        $this->user->setEmail($array["email"]);
//        $this->user->setRoleId($array["role_id"]);
//        $this->user->setCreateTime($array["create_time"]);
//        $this->user->setStatus($array["status"]);
//        $this->user->setLastLogin($array["last_login"]);
//    }

}