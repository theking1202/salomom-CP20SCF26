<?php
    session_start();
    unset( $_SESSION['dadangnhap']);
    unset( $_SESSION['user_dadangnhap']);
    header('location: testsession.php');
?>