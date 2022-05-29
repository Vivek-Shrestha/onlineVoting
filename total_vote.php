<?php

include_once('config.php');
$sql = "SELECT * from canidate";
$result = mysqli_query($conn, $sql);

// die();

// select count('cid') from vote_table where cid = id;


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

    <h2 class="text-center text-info" style=" margin-top:50px;">Canidate's Vote</h2>

    <div>
        <table class="table table-bordered table-striped table-responsive">
            <tr style="font-size:25px">


                <td>Canidate</td>
                <td>Post</td>


                <td>Total votes</td>
            </tr>
            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <!-- print_r($res);
      die(); -->

                <tr>

                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['post'] ?></td>

                    <?php
                    $sq = "SELECT count(vid) as vote from vote_table WHERE cid=" . $data['cid'];

                    $res = mysqli_query($conn, $sq);
                    $res = mysqli_fetch_assoc($res);
                    ?>
                    <td><?php if (isset($res['vote'])) {
                            echo $res['vote'];
                        } else {

                            echo "N/A";
                        } ?></td>





                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>