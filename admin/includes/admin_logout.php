<?php
session_start();
unset($_SESSION ["user_id"]);
unset($_SESSION["password"]);
header("Location:../login.php");

?>