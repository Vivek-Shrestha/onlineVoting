<?php
include_once('config.php');

$cid = $_GET['cid'];
$sql = "SELECT * from canidate where cid ='.$cid'";



include_once('config.php');
$sql = "SELECT * from canidate where cid ='$cid'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

?>
<?php


if (isset($_POST['update']) && $_POST['update'] == 'update') {

    if (!empty($_FILES)) {
        $tmp_address = $_FILES['photo']['tmp_name'];
        $fname = $_FILES['photo']['name'];
        $error = $_FILES['photo']['error'];
        if ($error != 0) {
            exit();
        }
        $fname = date('y-m-d-his') . $fname;
        $photo = $fname;
        if (is_dir('images')) {
        } else {
            mkdir('images');
        }
        move_uploaded_file($tmp_address, 'images/' . $fname);
    } else {

        $photo = $data['photo'];
    }


    if (isset($_POST['update']) && $_POST['update'] == 'update') {

        //  print_r($_POST);
        $name = $_POST['name'];
        $photo = $fname;
        $address = $_POST['address'];

        include_once('config.php');
        if (is_dir('images')) {
        } else {
            mkdir('images');
        }
        move_uploaded_file($tmp_address, 'images/' . $fname);




        $sql = "Update canidate SET name='$name',photo='$photo',address='$address' where cid='$cid'";
        // echo $sql; die;
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['status'] = "update successuflly";
            $_SESSION['status_code'] = "success";
            header("Location: canidate_display.php");
        } else {
            $_SESSION['status'] = "update failed";
            $_SESSION['status_code'] = "error";
            header("Location: canidate_edit.php");
        }
    }
}
?>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container form" style="margin-top:0px; background-color:aqua;">

        <div class="card-body">

            <form method="POST" action="" enctype="multipart/form-data">
                <h2 style="text-align:center; font-weight:bold;">Canidate Form</h2>
                <input type="number" name="cid" value="<?php echo $cid ?>" hidden>
                Name:<input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" required><br>
                photo:
                <?php
                $file = 'images/' . $data['photo'];
                if (!empty($data['photo']) && is_file($file)) : ?>
                    <img src="images/<?php echo $data['photo']; ?>" width="200">
                <?php else : ?>
                    <b>No image found.</b>
                <?php endif; ?>

                <input type="file" class="form-control" name="photo" value="<?php echo $data['photo']; ?>"><br>
                address:<input type="text" class="form-control" name="address" value="<?php echo $data['address']; ?>" required><br>
                <input type="submit" name="update" value="update" class="btn btn-xs btn-primary">


            </form>



        </div>

    </div>

</body>

</html>