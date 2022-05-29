<?php

include_once('config.php');
$sql = "SELECT * from vote_table JOIN usertable ON vote_table.vid = usertable.vid";
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
            <tr style="font-size:25px;background-color:black;color:green;">

                <td>voterId</td>
                <td>Citizenship Number</td>
                <td>Vote Name</td>
                <td>Canidate</td>
            </tr>
            <?php while ($data = mysqli_fetch_assoc($result)) {

            ?>
                <tr>

                    <td><?php echo $data['vid'] ?></td>
                    <td><?php echo $data['cn'] ?></td>
                    <td><?php echo $data['name'] ?></td>

                    <td><?php $candidateData = mysqli_query($conn, "SELECT * FROM canidate WHERE cid = " . $data['cid']);
                        $candidateData = mysqli_fetch_assoc($candidateData);
                        echo $candidateData['name'];
                        ?></td>

                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>