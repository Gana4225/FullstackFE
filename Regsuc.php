<?php
$servername = "localhost";
$username = "gana225";
$password = "gana225";
$dbname ="bank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$acno=$_POST['acno'];
$un=$_POST['un'];
$ifsc=$_POST['ifsc'];
$pwd=$_POST['pwd'];
$rpwd=$_POST['rpwd'];
if($pwd == $rpwd)
{
$q="insert into register values('$acno','$un','$ifsc','$pwd','$rpwd')";
$conn->query($q);
}
else{
    echo("password does not match");
}
$conn->close();
?>