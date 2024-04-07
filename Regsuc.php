<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rgsphp.css">
    <title>Document</title>
</head>
<body>
    <div class="con">
        <div class="container">
        <div class="jk">
    
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

echo "<u><h1>Your registeration process is succesful </h1></u><br>";
echo("<h3>Your account number is:$acno</h3><br>");
echo("<h3>Your username is:$un</h3><br>");
echo("<h3>Your password is:$pwd</h3>");

}
else{
    echo("password does not match");
}
$conn->close();
?>
        </div>
    </div>
    </div>
</body>
</html>

