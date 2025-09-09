<?php
    #	session_start();

    include 'const.php';
    include 'projClass.php';

    $instance = new projClass();

    try {
        $conn = $instance->connect();
    }catch(Exception $e) {
        echo 'Error: ' .$e->getMessage();
    }

