<?php

// This class will manage the connection to the database
// It will be passed on the other classes who need it
class DatabaseManager
{
    private $host;
    private $name;
    private $password;
    private $databaseName;

    public function __construct(string $host, string $name, string $password, string $databaseName)
    {
        $this->host = $host;
        $this->name = $name;
        $this->password = $password;
        $this->databaseName = $databaseName;
    }

    public function connect()
    {
        try{
            //use $dsn for just clearer view
            $dsn = "mysql:host=$this->host;dbname=$this->databaseName;";

            //PDO require the dsn, username and password
            $this->database = new PDO($dsn, $this->name, $this->password);

            $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->database->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        } catch (PDOException $exception) { //to get error if connection failed
            
            echo "Connection Error - " . $exception->getMessage();
        }
        
    }
}