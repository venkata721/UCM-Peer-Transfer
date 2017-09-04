<?php
session_start();
$user = $_SESSION['username'];
session_destroy();
header("refresh: 1; url=Homepage.html");


?>