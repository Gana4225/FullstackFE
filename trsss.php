<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Succes</title>
</head>
<body>
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
    $amt=$_POST['amt'];

    echo 100+$amt;
    $conn->close();
    



    ?>
</body>
</html>