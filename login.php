<?php
$servername = "localhost";
$username = "gana225";
$password = "gana225";
$dbname ="bank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$un=$_POST['un'];
$pwd=$_POST['pwd'];
$q="select username from register where username='$un'";
$res=$conn->query($q);
$row = $res->fetch_assoc();
$nm=$row['username'];
session_start();
$_SESSION['nm']=$nm;

$q1="select password from register where password='$pwd'";
$res1=$conn->query($q1);
$row1 = $res1->fetch_assoc();
$nm1=$row1['password'];
if($un==$nm)
{
   if($pwd==$nm1){
    header("Location:transaction.html");
    exit();
   }
   else{
    echo "incorrect password";
   }
}
else{
    echo "incorrect username";
}




?>