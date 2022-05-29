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


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <div class="container">
    <?php include_once('layout/navlogout.php'); ?>
  </div>

  <div class="container-fluid">

    <div class="container" style="margin-top: 10%;margin-left: 15%;">

      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card shadow" style="width: 20rem;">
            <img src="image.JPG" class="card-img-top" alt="...">
            <div class="card-body text-center">
              <h5 class="card-title">Canidate</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="canidate.php" class="btn btn-primary">click here to add canidate</a><br>
              <br>
              <a href="canidate_display.php" class="btn btn-success">click here to view canidate</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card shadow" style="width: 20rem;">
            <img src="image.JPG" class="card-img-top" alt="...">
            <div class="card-body text-center">
              <h5 class="card-title">voters</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="voters_display.php" class="btn btn-success">click here to view voters</a>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-4">
        <div class="card shadow" style="width: 20rem;">
          <img src="image.JPG" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">Canidate</h5>
        
            <a href="total_vote.php" class="btn btn-success">clicl here to view canidate's vote</a>
          </div>
        </div>
      </div> -->
        <div class="col-md-4">
          <div class="card shadow" style="width: 20rem;">
            <img src="image.JPG" class="card-img-top" alt="...">
            <div class="card-body text-center">
              <h5 class="card-title">canidate</h5>
              <p class="card-text">total votes is here.</p>
              <a href="total_vote.php" class="btn btn-success">click here to view vote's</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>