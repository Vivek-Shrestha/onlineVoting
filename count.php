<?php
include_once('config.php');

// print_r($_POST);
if (isset($_POST['voterID']) && isset($_POST['cid'])) {
    $sql = "SELECT * from vote_table WHERE vid=" . $_POST['voterID'];
    // print_r($_POST);
    // echo $sql;
    $result = mysqli_query($conn, $sql);

    // $row=mysqli_fetch_assoc($result);
    // print_r($row);
    // die();
    // exit();
    // if($result=mysqli_query($conn,$sql)){
    $row = mysqli_num_rows($result);
    //     // echo $row;
    //     // die();
    // }


    if (!$row >= 1) {
        $vid = $_POST['voterID'];
        $cid = $_POST['cid'];
        $sql1 = "INSERT INTO vote_table(vid,cid) VALUES('$vid','$cid')";
        // header('Location:voting_panal.php');

        mysqli_query($conn, $sql1);
        $_SESSION['status'] = "Thank you for voting";
        $_SESSION['status_code'] = "success";
        header("Location: voting_panal.php");
    } else {

        mysqli_query($conn, $reg);
        $_SESSION['status'] = " sorry,you are not allowed to vote multiple times";
        $_SESSION['status_code'] = "error";
        header("Location: voting_panal.php");
        // die();

        // alert('Thank You for Login ');
        // // Redirecting to other page or webste code. 
        // window.location = "#"; 


        //     echo "<script>alert('Thank You For Voting !!!');
        //     window.location.href='voting_panal.php';
        // </script>";
        // } else {
        //     echo "<script>alert('you are not allowed to vote multiple times');
        //         window.location.href='voting_panal.php';
        //     </script>";
        //     // header('Location:voting_panal.php');
        //     // echo 'Thank You For Not Voting !!!';
        // }
    }
}
// select count('cid') from vote_table where cid = id count();
