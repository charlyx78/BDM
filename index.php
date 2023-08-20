<?php
session_start();
if( !isset($_SESSION["AUTH"])) {
    include_once "./views/login.php";
} else {
    require_once "./views/landingPage.php";
}