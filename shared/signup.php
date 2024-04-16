<?php


function connectToDatabase() {
    $con = mysqli_connect("localhost", "root", "", "starmart", 3307);
    if ($con) {
        echo "<br>Connected to Database";
        return $con;
    } else {
        echo "<br>Unable to Connect";
        return null;
    }
}

function checkUsernameExists($con, $uname) {
    $sql = "SELECT * FROM users WHERE username = '$uname'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function checkEmailExists($con,$email) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}



function insertRecord($con,$name,$uname,$email,$hashed_password,$phone,$role) {
    $sql = "INSERT INTO users (name,username,email,password_hashed,phone_number,role) VALUES ('$name','$uname','$email','$hashed_password','$phone','$role')";
    if (mysqli_query($con, $sql)) {
        echo "<br><h1>Record Inserted</h1>";
    } else {
        echo "<br><h1>Record Not Inserted</h1>";
    }
}

function closeConnection($con) {
    mysqli_close($con);
}

$role = $_POST['role'];
$uname = $_POST['username'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass = $_POST['password'];

$hashed_password = password_hash($pass, PASSWORD_BCRYPT);

if($uname=="" || $name=="" || $phone=="" || $email=="" || $pass==""){
    echo "<br>Username or Password cannot be empty";
    return;
}



$con = connectToDatabase();
if ($con) {
    if (checkUsernameExists($con, $uname)) {
        echo "<br><h1>Username Already Exists</h1>";
    } else if (checkEmailExists($con,$email)) {
        echo "<br><h1>Email Already Exists</h1>";
    } else {    
        insertRecord($con,$name,$uname,$email,$hashed_password,$phone,$role);
    }
    closeConnection($con);
}

?>