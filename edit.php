<?php
$con = mysqli_connect('localhost', 'root', '', 'inv_crud');
if ($_REQUEST['edit_id']) {
    $id = $_REQUEST['edit_id'];
    $sql = "SELECT * FROM invoice where id = $id";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);
    // print_r($data);
}

if (isset($_POST['update'])) {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    if (isset($_FILES['img'])) {
        $image_name = $_FILES['img']['name'];
        $temp_location = $_FILES['img']['tmp_name'];
        $img_url = 'images/' . $image_name;
        move_uploaded_file($temp_location, $img_url);
        // echo $img_url;
    }

    $sql = "UPDATE invoice set product_name = '$product_name', price= $price, qty=$qty, img='$img_url' where id = $id";
    mysqli_query($con, $sql);
    header('location: read.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-9 mx-auto mt-5">
                <form action="" method="post" class="bg-white px-5 pb-5 mx-auto shadow-lg" enctype="multipart/form-data">
                    <!-- <label for="">Id</label> -->
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">

                    <label for="" class="mt-5">Product Name</label>
                    <input type="text" name="name" value="<?php echo $data['product_name']; ?>" class="form-control form-input form-control-sm"><br>

                    <label for="">Product Price</label>
                    <input type="text" name="price" value="<?php echo $data['price']; ?>" class="form-control form-input form-control-sm"><br>

                    <label for="">Product Qty</label>
                    <input type="number" name="qty" value="<?php echo $data['qty']; ?>" class="form-control form-input form-control-sm"><br>

                    <label for="">Product Image</label>
                    <input type="file" name="img" value="<?php echo $data['img']; ?>" class="form-control form-input form-control-sm">
                    <input type="submit" value="Update" name="update" class=" bg-info my-3 py-2 px-4 border-0 shadow text-white">

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>