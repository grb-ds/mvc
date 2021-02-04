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
        $date = new DateTime();
        $dateFormat =  $date->format('Y-m-d H:i:s');

        $query = "INSERT INTO challenge (name, description, date_open, date_due, url, type, class_id )  VALUES (:name1, :description1, :date_open1, :date_due1, :url1, :type1, :class_id1 )";

        $sqlStatement = $this->databaseManager->database->prepare($query);

        $sqlStatement->bindParam(':name1', $name, PDO::PARAM_STR,255);
        $sqlStatement->bindParam(':description1', $description, PDO::PARAM_STR,255);
        $sqlStatement->bindParam(':date_open1', $dateOpen);
        $sqlStatement->bindParam(':date_due1', $dateDue);
        $sqlStatement->bindParam(':url1', $url, PDO::PARAM_STR,255);
        $sqlStatement->bindParam(':type1', $type, PDO::PARAM_STR,255);
        $sqlStatement->bindParam(':class_id1', $classId, PDO::PARAM_INT);

        $result =  $sqlStatement->execute();

        return $result;
    }
}