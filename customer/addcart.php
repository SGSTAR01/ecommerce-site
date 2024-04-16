<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
    header("Location: ../shared/login.html");
    return;
}
if ($_SESSION['role'] != "customer") {
    header("Location: ../shared/login.html");
    return;
}

include "../shared/connection.php";

$pid = $_GET['id'];
$uid = $_SESSION['userid'];

$sql = "INSERT INTO cart (pid,user_id) VALUES ('$pid','$uid')";
if (mysqli_query($conn, $sql)) {
    echo "<br>Product Added to Cart";
} else {
    echo "<br>Failed to Add Product to Cart";
}

header("Location: cart.php");



?>