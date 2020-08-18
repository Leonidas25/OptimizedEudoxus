<?php
    session_start();
    require_once "config.php";

    if(isset($_SESSION['isbn'])){
        $_SESSION['isbn'].= $_GET["isbn"].",";
    } else {
        $_SESSION['isbn']= $_GET["isbn"].",";
    }

    if(isset($_SESSION['sem'])){
        $_SESSION['sem'].= $_GET["sem"].",";
    } else {
        $_SESSION['sem']= $_GET["sem"].",";
    }
?>