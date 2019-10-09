<?php

if(isset($_GET['logout']) == "true") {
    session_destroy();
    unset($_SESSION['User_ID']);
    unset($_SESSION['Perfil_ID']);
    header('location:../index.php');
}