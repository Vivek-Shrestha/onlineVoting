<?php
//  include_once('./layouts/header.php');
// include_once('./layouts/sidebar.php'
include_once('config.php');
$sql = "SELECT * from canidate";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php include_once('layout/navlogout.php'); ?>
    </div>
    <h2 class="text-center text-info" style=" margin-top:50px;">canidate Information</h2>

    <div>

        <table class="table table-bordered table-striped table-responsive">
            <tr style="font-size:25px">
                <td>CID</td>
                <td>Name</td>
                <td>Photo</td>
                <td>Post</td>
                <td>Address</td>
                <td>Action</td>


            </tr>
            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $data['cid'] ?></td>
                    <td><?php echo $data['name'] ?></td>
                    <td>
                        <!-- is_file() -->
                        <?php if (!empty($data['photo'])) : ?>
                            <img src="images/<?= $data['photo'] ?>" width="100">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $data['post'] ?></td>
                    <td><?php echo $data['address'] ?></td>

                    <td><a class="btn btn-primary" href="canidate_edit.php?cid=<?php echo $data['cid']; ?>" )>Edit</a>
                        <a class="btn btn-danger" href="canidate_delete.php?cid=<?php echo $data['cid']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
<script src="js/sweetalert.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status'] ?>",

            icon: "<?php echo $_SESSION['status_code'] ?>",
            button: "Ok.Done!",
        });
    </script>
<?php
    unset($_SESSION['status']);
}
?>


</html>