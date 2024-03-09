<?php
$con = mysqli_connect('localhost', 'root', '', 'inv_crud');
$sql = "SELECT * FROM invoice";
$data = mysqli_query($con, $sql);

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM invoice WHERE id = $id";
    mysqli_query($con, $delete_sql);
    header('location: read.php');
}

if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    header("location: edit.php?edit_id=$id");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-9 mx-auto mt-5">
                <table border="1" cellpadding="10" class="table shadow-lg">
                    <thead>
                        <tr class="table-info">
                            <td class="fw-bold">Id</td>
                            <td class="fw-bold">Product Name</td>
                            <td class="fw-bold">Product Price</td>
                            <td class="fw-bold">Product Qty</td>
                            <td class="fw-bold">Product Image</td>
                            <td class="fw-bold text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($data)) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['product_name'] . '</td>';
                            echo '<td>' . $row['price'] . '</td>';
                            echo '<td>' . $row['qty'] . '</td>';
                            echo '<td>
                            <img src="' . $row['img'] . '" alt="Product Image" class="img-thumbnail" width="60px">
                            </td>';
                            echo '<td>
                                <a href="?add_qty=' . $row['id'] . '" class="btn btn-sm btn-info px-3 py-1">Add Qty</a>
                                <a href="?edit_id=' . $row['id'] . '" class="btn btn-sm btn-success px-3 py-1 mx-3">Edit</a>
                                <a href="?delete_id=' . $row['id'] . '" class="btn btn-sm btn-danger px-3 py-1">Delete</a>
                                </td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <span><a href="./index.php" class="btn btn-sm btn-secondary px-5 py-1">Create</a></span>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>