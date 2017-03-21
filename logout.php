<?php
// session_start();

// session_destroy();

// header("Location: login.php");

session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: destroy.php');
die;

?>