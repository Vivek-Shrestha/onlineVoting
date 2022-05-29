<?php
// include_once ('./layouts/header.php');
// include_once ('./layouts/sidebar.php');
// session_start();
//sinclude_once ('./layouts/header.php');
include_once('config.php');
// if(mysqli_connect_errno()) {  
//         die("Failed to connect with MySQL: ". mysqli_connect_error());  
//     }  
if (isset($_POST['login'])) {

    $citizenship = $_POST['cn'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM usertable WHERE cn='$citizenship'and name = '$username' and password = '$password'";
    //  echo $sql;
    //  die(); 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // print_r($row);
    // die();
    if (isset($row['vid'])) {
        $_SESSION['voterID'] = $row['vid'];
    }
    $count = mysqli_num_rows($result);


    if ($count == 1) {

        header('Location:voting_panal.php');
    } else {
        $_SESSION['error'] = "<span style='color:blue'><b>Invalid Username or Password</b></span>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logIn</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery.min.js"></script>


</head>

<body>
    <div class="container">
        <?php include_once('nav.php'); ?>
    </div>
    <div class="container login-bg">
        <div class="col-sm-6">

            <div class="card text-center login-card">
                <div class="card-header">
                    <h2>User Login</h2>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-primary">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </div>
                    <?php endif; ?>



                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-success" name="login" value="submit">Login</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">

            <div class="card text-center login-card">
                <div class="card-header">
                    <h2>User Register</h2>

                </div>
                <div class="card-body">

                    <form action="registration.php" method="post">
                        <label for="cn">Citizenship Number</label>
                        <input type="text" name="cn" id="cn" class="form-control" required pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{5}" title="Invalid format" placeholder="Eg: 23-45-67-34567">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-primary" name="register" value="submit">register</button>

                    </form>
                </div>
            </div>
        </div>

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
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('.alert').css('display', 'none');
        }, 3000);
    })
</script>