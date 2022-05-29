<?php
include_once('config.php');
// session_start();




// print_r($_POST);
// session_start();
$sql1 = "SELECT * FROM canidate";
$result11 = mysqli_query($conn, $sql1);
$result1 = $result11->fetch_all(MYSQLI_ASSOC);
// print_r($result1);
// exit();
// print_r($_SESSION);
// $sql="SELECT * from canidate";
// $result=mysqli_query($conn,$sql);
// print_r($data['0']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Voting </title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

  <style>
    body {
      margin: 0px;
      padding: 0px;
    }

    .headerFont {
      font-family: 'Ubuntu', sans-serif;
      font-size: 24px;
    }

    .subFont {
      font-family: 'Raleway', sans-serif;
      font-size: 14px;

    }

    .specialHead {
      font-family: 'Oswald', sans-serif;
    }

    .normalFont {
      font-family: 'Roboto Condensed', sans-serif;
    }

    a {
      color: #FFFFFF;
      text-decoration: none;
    }

    a:link {
      color: #FFFFFF;
      text-decoration: none;
    }

    /* visited link */
    a:visited {
      color: #FFFFFF;
      text-decoration: none;
    }

    /* mouse over link */
    a:hover {
      color: #FFFFFF;
      text-decoration: none;
    }

    /* selected link */
    a:active {
      color: #FFFFFF;
      text-decoration: none;
    }
  </style>


</head>

<body>
  <div class="conatiner-fluid" style="background-color: powderblue;">
    <div class="container">
      <span class="normalFont"><a href="login.php" class="btn btn-danger navbar-right navbar-btn"><strong>Log Out</strong></a></span>
    </div>






    <!-- while admin need to see votes => SELECT count('vote') where UNIQUE('voterid') WHERE candidate = id -->

    <!-- <div class="contai" -->
    <div class="container" style="margin-top: 10%;margin-left: 15%;">
      <div class="container_fluid">
        <div class="row justify-content-center">
          <?php
          // if(mysqli_num_rows($result11) > 0) :
          ?>
          <?php foreach ($result1 as $data) :  ?>

            <div class="col-sm-4 mb-4">
              <div class="card shadow">
                <div style="max-height:200px;overflow:hidden">
                  <?php if (!empty($data['photo']) && is_file('images/' . $data['photo'])) : ?>
                    <img src="images/<?= $data['photo'] ?>" height="250px" width="300px" class="card-img-top" alt="...">
                  <?php else : ?>
                    <img src="images/0.jpg" class="card-img-top" alt="...">
                  <?php endif; ?>
                </div>
                <div class="card-body text-center" style="margin-bottom:15%">
                  <h5 class="card-title"><?= $data['name']; ?></h5>
                  <h5 class="card-title"><?= $data['post']; ?></h5>

                  <form method="post" action="count.php">
                    <!-- single voter can't vote multiple candidates in one program -->
                    <!-- <input type="hidden" name="programid">  -->
                    <input type="hidden" name="voterID" value="<?= $_SESSION['voterID']; ?>">
                    <input type="hidden" name="cid" value="<?= $data['cid']; ?>">
                    <button class="btn btn-success" type="submit">vote</button>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <?php
          // endif; 
          ?>
        </div>
      </div>


      <!-- 
voter id
candidate id

 -->


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