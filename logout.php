<?php

include('database.php');
session_start();

$query = "UPDATE login_details SET last_activity=NULL WHERE login_details_id='" . $_SESSION['login_details_id'] . "'";

$statement = $connect->prepare($query);
$statement->execute();

session_destroy();

header('location:login.php');
