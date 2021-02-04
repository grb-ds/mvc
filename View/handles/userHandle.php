<?php
declare(strict_types = 1);

$userId = $userName = "";
if (isset($_SESSION["logginUserId"]) && isset($_SESSION["logginUserName"])){
    $userId = $_SESSION["logginUserId"];
    $userName = $_SESSION["logginUserName"];
}