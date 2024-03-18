<?php
$con = mysqli_connect('localhost', 'root', '', 'inv_crud');
if ($_REQUEST['add_qty']) {
    $id = $_REQUEST['add_qty'];
    $sql = "SELECT * FROM invoice where id = $id";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);
    // print_r($data);
}
if (isset($_POST['submit'])) {
    // $id = $_POST['id'];
    $addqty = $_POST['addqty'];
    $old_qty = $data['qty'];
    // $qty_sql = "SELECT qty FROM invoice WHERE id = $id";
    // $result = mysqli_query($con, $qty_sql);
    // $old_qty = mysqli_fetch_assoc($result);
    // $old_qty = $old_qty['qty'];

    $add_qty_sql = $old_qty + $addqty;
    $update_q_sql = "UPDATE invoice SET qty = $add_qty_sql WHERE id = $id";
    mysqli_query($con, $update_q_sql);

    header('location: read.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Qty</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row col-6 mx-auto">

                <form action="" method="post" class="bg-white shadow mx-auto mt-5 form-control" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <div class="mt-3">
                        <label for="">Add Qty</label>
                        <input type="number" name="addqty" class="form-control"><br>
                    </div>
                    <div class="mb-4">
                        <input type="submit" value="Submit" name="submit" class="bg-secondary text-white border-0 rounded py-2 px-4">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>