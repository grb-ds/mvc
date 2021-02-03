<?php
declare(strict_types = 1);
//With the fullcalendar.js php cannot call directly inside script tag
//create this controller to with the return of data array for the input in javascript


require_once '../setup.php';


    $databaseManager->connect();
    $user = new BaseController($databaseManager);

    $user->getWatchSchedule();
  
?>
