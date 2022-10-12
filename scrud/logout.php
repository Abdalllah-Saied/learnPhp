<?php
session_start();
$_SESSION=array();
session_destroy();
header("LOCATION:../scrud/login.php");