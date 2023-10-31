<?php

session_start();
include_once "LogOut.php";

logout();
header("Location:index.php");
exit();

?>