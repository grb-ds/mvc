<?php

declare(strict_types = 1);
require_once './Modal/repository/RegisterRepository.php';


class RegisterController
{
    private $databaseManager;

    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;

    }

    public function render(array $get, array $post)
    {
        //var_dump($_SESSION);
        
        $error = null;
        if (isset($_POST)) {
            
            $error = register($this->databaseManager);
            errorMessage($error);
        }
        require "View/register_profile.php";
    }
}