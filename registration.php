<?php

include_once('config.php');
$name = $_POST['username'];
$pass = $_POST['password'];
$cn = $_POST['cn'];
$sql = "SELECT * FROM usertable WHERE
name='$name'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num == 1) {
    $_SESSION['status'] = "username already exists";
    $_SESSION['status_code'] = "error";
    header("Location: login.php");
} else {
    $reg = "INSERT INTO usertable(name,password,cn) 
    VALUES('$name','$pass','$cn')";
    mysqli_query($conn, $reg);
    $_SESSION['status'] = "regester successfully";
    $_SESSION['status_code'] = "success";
    header("Location: login.php");
}

// for CN  

$sql = "SELECT * FROM usertable WHERE
cn='$cn'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num == 1) {
    $_SESSION['status'] = "Citizenship already exists";
    $_SESSION['status_code'] = "error";
    header("Location: login.php");
} else {
    $reg = "INSERT INTO usertable(name,password,cn) 
    VALUES('$name','$pass','$cn')";
    mysqli_query($conn, $reg);
    $_SESSION['status'] = "regester successfully";
    $_SESSION['status_code'] = "success";
    header("Location: login.php");
}



// if ($num == 1) {
//     header('Location:login.php');
//     echo "username is already taken";
// } else {
//     $reg = "INSERT INTO usertable(name,password) 
//     VALUES('$name','$pass')";
//     mysqli_query($conn, $reg);
//     header('Location:login.php');
//     echo "registration success";
// }
