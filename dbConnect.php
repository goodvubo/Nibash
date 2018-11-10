<?php

$host="localhost";
$user="root";
$password="";
$database="estatebd";

$conn=new mysqli($host, $user, $password, $database);

if ($conn->connect_error)
{
    die($conn->connect_error);
}

date_default_timezone_set("Asia/Dhaka");
$date_ = date("d/m/Y");

