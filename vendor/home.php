<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
    header("Location: ../shared/login.html");
    return;
}
if ($_SESSION['role'] != "vendor") {
    header("Location: ../shared/login.html");
    return;
}
include "navbar.html";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
    <title>Vendor Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="vstyle.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/51e8e678fb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="sg-form">
        <form enctype="multipart/form-data" action="upload.php" method="post">
            <h2>Add Product</h2>
            <p>Fill the form to add a Product</p>
            <hr />
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" class="form-control" name="pname" placeholder="Product Name"
                        required="required" />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="number" min="0" step="0.01" class="form-control" name="price" placeholder="Price" required="required" />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <textarea class="form-control" placeholder="Product Details" name="details" rows="4" required="required"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Product Image</label>
                            <input class="form-control" type="file" accept="image/*" id="formFile" name="p_img">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Add Product</button>
                </div>
        </form>
    </div>

</body>

</html>