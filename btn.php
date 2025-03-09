<?php
session_start();

if (isset($_SESSION["email"])) {
    header("Location: perfil.php");
} else {
    header("Location: login.html");
}

?>
