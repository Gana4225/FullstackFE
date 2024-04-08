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
    $acno1=$_POST['acno1'];
    $amt=$_POST['amt'];

$q1="select amount from cus where acno='$acno1'";
$res1=$conn->query($q1);
$row1 = $res1->fetch_assoc();
$nm1=$row1['amount'];
$g=$nm1-$amt;
$q11="select amount from cus where acno='$acno'";
$res11=$conn->query($q11);
$row11 = $res11->fetch_assoc();
$nm11=$row11['amount'];
$gt=$nm11+$amt;
if($acno1!=$acno)
{

if($nm1>=$amt)
{
$q2="update cus set amount='$g' where acno='$acno1'";
$res1=$conn->query($q2);

$q22="update cus set amount='$gt' where acno='$acno'";
$res12=$conn->query($q22);

echo "Transaction Successfull";

  
}

else{
    echo "Insufficient Balance:$nm1";
}
}
else{
    echo "Cannot transfer to the same account";
}


    $conn->close();
    



    ?>
</body>
</html>