<?php
$con = mysqli_connect('localhost', 'root', '', 'inv_crud');
if ($_REQUEST['sele_id']) {
    $id = $_REQUEST['sele_id'];
    $sql = "SELECT * FROM invoice where id = $id";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);
    // print_r($data);
}

if (isset($_POST['submit'])) {
    // $id = $_POST['id'];
    $saleqty = $_POST['saleqty'];
    $old_qty = $data['qty'];

    // $qty_sql = "SELECT qty FROM invoice WHERE id = $id";
    // $result = mysqli_query($con, $qty_sql);
    // $old_qty = mysqli_fetch_assoc($result);
    // $old_qty = $old_qty['qty'];
    // echo $old_qty;
    // echo $id;
    // echo $addqty;

    $add_qty_sql = $old_qty - $saleqty;
    $update_q_sql = "UPDATE invoice SET qty = $add_qty_sql WHERE id = $id";
    mysqli_query($con, $update_q_sql);
    // echo $add_qty_sql;
    header('location: read.php');

    // print_r($update_q);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row col-6 mx-auto">

                <form action="" method="post" class="bg-white shadow mx-auto mt-5 form-control" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">

                    <div class="mt-3">
                        <label for="">Sale Qty</label>
                        <input type="number" class="form-control" name="saleqty"><br>
                    </div>
                    <div class="mb-4">
                        <input type="submit" name="submit" value="Submit" class="bg-danger text-white border-0 rounded py-2 px-4">
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>