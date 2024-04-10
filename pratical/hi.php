<?php
// Start the session
session_start();

// Retrieve the variable from the session
$receivedVariable = $_SESSION['variable1'];
// Display the value
echo $receivedVariable;  // Outputs: Hello, world!

?>
