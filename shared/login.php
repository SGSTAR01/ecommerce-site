<?php
    session_start();
    include "connection.php";

    $uname=$_POST['username'];
    $upass=$_POST['password'];

    if($uname=="" || $upass==""){
        echo "<br>Username or Password cannot be empty";
        return;
    }

    
    if($conn){
        echo "<br>Connected to Database";
        $sql="SELECT * FROM users WHERE username='$uname'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            if(password_verify($upass,$row['password_hashed'])){
                echo "<br>Logged In";

               
                $_SESSION['username']=$uname;
                $_SESSION['role']=$row['role'];
                $_SESSION['logged_in']=true;
                $_SESSION['userid']=$row['id'];
                
                if($row['role']=="vendor"){
                    header("Location: ../vendor/home.php");
                }
                else if($row['role']=="customer"){
                    header("Location: ../customer/home.php");
                }

            }
            else{
                echo "<br>Invalid Password";
            }
        }
        else{
            echo "<br>Invalid Username";
        }
    }
    else{
        echo "<br>Unable to Connect";
    }
?>