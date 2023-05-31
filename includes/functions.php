<?php

function connectToDB() {
    $host = 'devkinsta_db'; // change this to devkinsta_db
    $dbname = 'feedback'; // use your own database name
    $dbuser = 'root';
    $dbpassword = 'aqvEwR9D41FvwC6l'; // use your own password

    $database = new PDO (
        "mysql:host=$host;dbname=$dbname",
        $dbuser,
        $dbpassword
    );

    return $database;
}

function isUserLoggedIn() {
    return isset( $_SESSION['user'] ) ? true : false;
}