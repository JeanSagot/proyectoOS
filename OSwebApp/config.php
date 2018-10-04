<?php

/**
 * Configuration for database connection
 *
 */

$host       = "163.178.173.148";
$username   = "connect";
$password   = "root";
$dbname     = "testSagot"; // will use later
$dsn        = "mysql:host=$host; dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

require "config.php";

$connection = new PDO("mysql:host=$host", $username, $password, $options);