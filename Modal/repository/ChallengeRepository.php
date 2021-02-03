<?php

class ChallengeRepository
{
    private $databaseManager;
    private $challenge;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
        $this->challenge = new Challenge();
    }

    public function create($name, $description, $dateOpen, $dateDue, $url, $type, $classId)
    {
        $query = 'INSERT challenge (name, description, date_open, date_due, url, type, class_id )  VALUES (:s-name, :s-description, :t-date_open, :t-date_due, :s-url, :s-type, :i-class_id )';
        $sqlStatement = $this->databaseManager->database->prepare($query);

        $sqlStatement->bindParam(':s-name', $name, PDO::PARAM_STR,255);
        $sqlStatement->bindParam(':s-description', $description, PDO::PARAM_STR,255);
        $sqlStatement->bindParam(':t-date_open', NOW(), PDO::PARAM_TIMESTAMP);
        $sqlStatement->bindParam(':t-date_due', NOW(), PDO::PARAM_STR);
        $sqlStatement->bindParam(':s-url', $url, PDO::PARAM_STR);
        $sqlStatement->bindParam(':s-type', $type, PDO::PARAM_STR,30);
        $sqlStatement->bindParam(':i-class_id ', $classId, PDO::PARAM_INT);

         $sqlStatement->execute();

        $result = $sqlStatement->fetch(PDO::FETCH_ASSOC);

        var_dump($result);

        if ($result) {
          //  $this->mapper($statementResult);
            //return $this->challenge;
            return $result;
        } else {
            $result = false;
            return $result;
        }

    }

    // Get one
   /* public function find($email, $password)
    {
        $query = 'SELECT * FROM user WHERE email = :email and password = :password';
        $sqlStatement = $this->databaseManager->database->prepare($query);

        $sqlStatement->bindParam(':email', $email, PDO::PARAM_STR,255);
        $sqlStatement->bindParam(':password', $password, PDO::PARAM_STR,25);
        $sqlStatement->execute();

        $statementResult = $sqlStatement->fetch(PDO::FETCH_ASSOC);
        var_dump($statementResult);

        if ($statementResult) {
            $this->mapper($statementResult);
            return $this->user;
        } else {
            $result = false;
            return $result;
        }
    }*/

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