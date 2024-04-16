<?php

session_start();

include "../shared/connection.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
    header("Location: ../shared/login.html");
    return;
}
if ($_SESSION['role'] != "customer") {
    header("Location: ../shared/login.html");
    return;
}

$pid = $_GET['id'];
$uid = $_SESSION['userid'];

$sql = "DELETE FROM cart WHERE pid='$pid' AND user_id='$uid'";
if (mysqli_query($conn, $sql)) {
    echo "<br>Product Removed from Cart";
} else {
    echo "<br>Failed to Remove Product from Cart";
}

header("Location: cart.php");


?>