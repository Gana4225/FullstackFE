<?php
session_start();

// Check if the code has already been executed
if (!isset($_SESSION['payment_executed'])) {
    $servername = "localhost";
    $username = "gana225";
    $password = "gana225";
    $dbname = "bank";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $unm = $_SESSION['nm'];

    $q55 = "select acno from register where username='$unm'";
    $kl = $conn->query($q55);
    $kll = $kl->fetch_assoc();
    $klll = $kll['acno'];

    $acno = $_POST['acno'];
    $acno1 = $klll;
    $amt = $_POST['amt'];
    $_SESSION['jk'] = $acno1;

    $q1 = "select amount from cus where acno='$acno1'";
    $res1 = $conn->query($q1);
    $row1 = $res1->fetch_assoc();
    $nm1 = $row1['amount'];
    $g = $nm1 - $amt;
    $q11 = "select amount from cus where acno='$acno'";
    $res11 = $conn->query($q11);
    $row11 = $res11->fetch_assoc();
    $nm11 = $row11['amount'];
    $gt = $nm11 + $amt;
    if ($acno1 != $acno) {

        $que = "select acno from cus where acno='$acno'";
        $aaa = $conn->query($que);
        $a2268 = $aaa->fetch_assoc();
        $a22 = $a2268['acno'];
        $que1 = "select acno from cus where acno='$acno1'";
        $aaa1 = $conn->query($que1);
        $a2215 = $aaa1->fetch_assoc();
        $a221 = $a2215['acno'];

        if ($acno1 == $a221) {
            if ($acno == $a22) {

                if ($nm1 >= $amt) {
                    $q2 = "update cus set amount='$g' where acno='$acno1'";
                    $res1 = $conn->query($q2);

                    $q22 = "update cus set amount='$gt' where acno='$acno'";
                    $res12 = $conn->query($q22);

                    echo "Transaction Successful<br>";
                    echo "Current balance: $g";

                    // Set the flag indicating the code has been executed
                    $_SESSION['payment_executed'] = true;
                } else {
                    echo "Insufficient Balance: $nm1";
                }
            } else {
                echo "Receiver account is invalid";
            }
        } else {
            echo "Sender account number is invalid";
        }
    } else {
        echo "Cannot transfer to the same account";
    }

    $conn->close();
} else {
    echo "Payment has already been processed.";
}
?>
