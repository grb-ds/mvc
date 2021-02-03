<?php
declare(strict_types = 1);
//require_once '../Modal/repository/RegisterRepository.php';


class RegisterController
{
    private $databaseManager;
    // private $userName;
    // private $email;
    // private $password;
    // private $repeatPassword;

    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;

    }

    public function render(array $get, array $post)
    {
        if (isset($_POST)) {
            register($this->databaseManager);
        }
        // header("location: ../View/register_profile.php?page=register");
        require_once 'View/register_profile.php?page=register';
    }


    // public function getErrorMEssage()
    // {
    //     errorMessage();
    // }

    function errorMessage()
    {
        if (isset($_GET["error"])) {
            switch ($_GET["error"]) {

                case 'Empty-fields':
                    echo '<h3 style="color: red; font-size: 16px;">FILL IN ALL FIELDS!</h3>';

                    break;

                case 'Invalid-username':
                    echo '<h3 style="color: red; font-size: 16px;">INVALID USERNAME!</h3>';

                    break;

                case 'Invalid-email':
                    echo '<h3 style="color: red; font-size: 16px;">INVALID EMAIL!</h3>';

                    break;

                case 'No-matching-pwd':
                    echo '<h3 style="color: red; font-size: 16px;">PASSWORDS DON\'T MATCH!</h3>';

                    break;

                case 'Uid-already-exists':
                    echo '<h3 style="color: red; font-size: 16px;">ACCOUNT ALREADY EXISTS!</h3>';

                    break;
            }
        }
    }
}