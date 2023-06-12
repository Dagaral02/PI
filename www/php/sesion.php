<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../html/error.html");
        exit;
    }
?>