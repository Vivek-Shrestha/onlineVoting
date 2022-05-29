<?php
$cid = $_GET['cid'];
include_once('config.php');
// $sql="Select img from student where sid='$sid'";
// $result=mysqli_query($connection,$sql);
// $data=mysqli_fetch_assoc($result);
// unlink("photo/".$data['img']);
$sql = "DELETE FROM canidate where cid=" . $cid;
header('location:canidate_display.php');
$result = mysqli_query($conn, $sql);
if ($result) {
    $_SESSION['status'] = "Delete successuflly";
    $_SESSION['status_code'] = "success";
    header("Location: canidate_display.php");
} else {
    $_SESSION['status'] = "Delete failed";
    $_SESSION['status_code'] = "error";
    header("Location: canidate_edit.php");
}
