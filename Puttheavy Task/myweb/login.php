<?php
include('config.php');
session_start();
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$sql = "select * from admin where email=$email and pwd=$pwd";
$con=mysqli_query($db,$sql);

echo $email;
echo $pwd;