<?php

declare(strict_types = 1);

// Show errors so we get helpful information
<<<<<<< HEAD
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
=======
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
>>>>>>> 67dfae99b7c45542831616833c5936343df58b24

// ini_set('session.save_path', 'session');
// session_save_path();
session_start();

// Load you classes
require_once 'config.php';
require_once 'Modal/DatabaseManager.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['databaseName']);


// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection