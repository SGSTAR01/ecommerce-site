<?php

session_start();

include "../shared/connection.php";

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!=true){
    header("Location: ../shared/login.html");
    return;
}
if($_SESSION['role']!="vendor"){
    header("Location: ../shared/login.html");
    return;
}

print_r($_POST);

echo "<br>";

print_r($_FILES);

$source= $_FILES["p_img"]["tmp_name"];
$target= "../shared/images/".$_FILES["p_img"]["name"];

move_uploaded_file($source,$target);


if($conn){
    echo "<br>Connected to Database";
    $name=$_POST['pname'];
    $price=$_POST['price'];
    $details=$_POST['details'];
    $owner=$_SESSION['userid'];
    $img_path=$_FILES['p_img']['name'];
    $sql="INSERT INTO product (name,price,details,owner,img_path) VALUES ('$name','$price','$details','$owner','$target')";
    if(mysqli_query($conn,$sql)){
        echo "<br>Product Added";
    }
    else{
        echo "<br>Failed to Add Product";
    }
}
else{
    echo "<br>Unable to Connect";
}



?>