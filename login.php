<?php

include("config/db.php");

session_start();

if ($_SESSION['login_state'] === 1) {
    header("location: /cackle/");
} else {
    include("inc/head.php");
    include("inc/header.php");
    include("inc/login.php");
    include("views/not-logged-in.php");
}

