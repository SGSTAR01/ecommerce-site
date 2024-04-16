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
    
    include "navbar.html";
    include "../shared/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vendor Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body style="z-index: 1; background-color: #d9afd9;
background-image: linear-gradient(0deg, #d9afd9 0%, #97d9e1 100%);
background-position: center center;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;">
    <div class="container">
        <h1 class="text-center">     ‎      </h1>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
    
    $sql="SELECT * FROM product";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<div class='card m-2 text-center' style='width: 18rem; display: inline-block;'>";
            echo "<img src=".$row['img_path']." class='card-img-top' alt='...'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>".$row['name']."</h5>";
            echo "<p class='card-text'>".$row['details']."</p>";
            echo "<p class='card-text h3'>₹".$row['price']."</p>";
            echo "<a href='addcart.php?id=".$row['pid']."' class='btn btn-danger m-1'>Add to Cart</a>";
            
            echo "</div>";
            echo "</div>";
        }
    }
    else{
        echo "<h1>No Products Found</h1>";
    }

?>