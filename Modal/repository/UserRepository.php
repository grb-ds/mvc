<?php

class UserRepository
{
    private $databaseManager;
    private $user;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
        $this->user = new User();
    }

    public function create()
    {
    }

    // Get one
    public function find($email, $password)
    {
        $query = 'SELECT * FROM user WHERE email = :email and password = :password';
        $sqlStatement = $this->databaseManager->database->prepare($query);

        $sqlStatement->bindParam(':email', $email, PDO::PARAM_STR,255);
        $sqlStatement->bindParam(':password', $password, PDO::PARAM_STR,25);
        $sqlStatement->execute();

        $statementResult = $sqlStatement->fetch(PDO::FETCH_ASSOC);

        if ($statementResult) {
            $this->mapper($statementResult);
            return $this->user;
        } else {
            $result = false;
            return $result;
        }
    }

    // Get all
    public function get()
    {

    }

    public function update()
    {

    }

    public function delete($id)
    {

    }

    public function mapper($array)
    {
        $this->user->setId($array["id"]);
        $this->user->setUsername($array["username"]);
        $this->user->setPassword($array["password"]);
        $this->user->setEmail($array["email"]);
        $this->user->setRoleId($array["role_id"]);
        $this->user->setCreateTime($array["create_time"]);
        $this->user->setStatus($array["status"]);
        $this->user->setLastLogin($array["last_login"]);
    }


    public function getChallengesByClassId($classId)
    {
        $query = 'SELECT t1.* FROM challenge t1 INNER JOIN classes t2 ON t1.class_id = t2.id and t2.id = :classId1';
        $sqlStatement = $this->databaseManager->database->prepare($query);

        $sqlStatement->bindParam(':classId1', $classId, PDO::PARAM_INT);
        $sqlStatement->execute();

        $statementResult = $sqlStatement->fetchALL();

        if ($statementResult) {
            var_dump($statementResult);
            /* $this->mapper($statementResult);*/
             return $statementResult;
        } else {
             $result = false;
             return $result;
        }
    }


 

}