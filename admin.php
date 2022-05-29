<?php

include_once('config.php');


// if(mysqli_connect_errno()) {  
//         die("Failed to connect with MySQL: ". mysqli_connect_error());  
//     }  
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM authentication WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {

        header('Location:adminpanal.php');
    } else {
        $_SESSION['error'] = "<span style='color:blue'><b>Invalid Username or Password</b></span>";;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script rel="stylesheet" src="js/jquery.min.js"></script>
</head>

<body>
    <div class="container login-bg">
        <div class="col-sm-6">
            <div class="card text-center login-card">
                <div class="card-header">
                    <h2>Admin Page</h2>

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
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('.alert').css('display', 'none');
        }, 3000);
    })
</script>