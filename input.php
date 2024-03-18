<?php
if (isset($_POST['submit'])) {
    $product_name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    // $img = $_POST['img'];
    if (isset($_FILES['img'])) {
        $image_name = $_FILES['img']['name'];
        $temp_location = $_FILES['img']['tmp_name'];
        $img_url = 'images/' . $image_name;
        move_uploaded_file($temp_location, $img_url);
        echo $img_url;
    }


    $con = mysqli_connect('localhost', 'root', '', 'inv_crud');
    $sql = "INSERT INTO invoice (product_name, price, qty, img)VALUES ('$product_name', $price, $qty, '$img_url')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo 'inserted';
    } else {
        echo 'not inserted';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-9  mx-auto mt-5">
                <form action="" method="post" class="bg-white px-5 pb-5 mx-auto shadow-lg" enctype="multipart/form-data">
                    <label for="" class="mt-5">Product Name</label>
                    <input type="text" name="name" class="form-control form-input form-control-sm"><br>

                    <label for="">Product Price</label>
                    <input type="text" name="price" class="form-control form-input form-control-sm"><br>

                    <label for="">Product Qty</label>
                    <input type="number" name="qty" class="form-control form-input form-control-sm"><br>

                    <label for="">Product Image</label>
                    <input type="file" name="img" class="form-control form-input form-control-sm">

                    <input type="submit" value="Submit" name="submit" class="btn btn-sm btn-info px-3 mt-3">

                    <a href="./read.php" class="btn btn-sm btn-success mt-3 mx-3">Show Data</a>

                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>