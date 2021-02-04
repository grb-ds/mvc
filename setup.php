<?php

declare(strict_types = 1);

session_start();

// Load you classes
require_once 'config.php';
require_once 'Modal/DatabaseManager.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['databaseName']);
