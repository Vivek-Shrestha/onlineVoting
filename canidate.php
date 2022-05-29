<?php

if (!empty($_POST)) {
  $tmp_address = $_FILES['photo']['tmp_name'];
  $fname = $_FILES['photo']['name'];
  $error = $_FILES['photo']['error'];
  if ($error != 0) {
    exit();
  }
  $fname = date('y-m-d-his') . $fname;

  if (isset($_POST['submit']) && $_POST['submit'] == 'submit') {
    $name = $_POST['name'];
    $photo = $fname;
    $post = $_POST['post'];
    $address = $_POST['address'];


    include_once('config.php');
    if (is_dir('images')) {
    } else {
      mkdir('images');
    }
    move_uploaded_file($tmp_address, 'images/' . $fname);
    $sql = "INSERT INTO canidate(name,photo,post,address) Values('$name','$photo','$post','$address')";
    $result = mysqli_query($conn, $sql);
  }
}

?>
<html>

<head>
  <title>
  </title>

  <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <!-- <div class="col-md-12">
            <form  action=""method="POST" enctype="multipart/form-data" >
            <h2 >Canidate Form</h2>
           
                Name:<br><br><input type="text" name="name" placeholder="Enter your name here" required><br><br>
              
              Photo:<br><br><input type="file" name="photo" placeholder="add your photo here" required><br><br>

                Address:<br><br><input type="text" name="address" placeholder="Enter address.."required><br><br>
                <input type="submit" name="submit" value="submit" class="btn btn-xs btn-primary">

            </div>
            </form>
            </div> -->

<body style="background:black;">
  <div class="container">
    <?php include_once('layout/navlogout.php'); ?>
  </div>


  <div class="col-md-12" style="margin-top: 8%;margin-left: 15%;">
    <div class="row">
      <div class="col-md-4">
        <h1 style="color:green;">Candidate Form</h1>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name" style="color:green;">Name</label>
            <input type="text" name="name" class="form-control form-control-sm" required>
          </div>
          <div class="form-group">
            <label for="email" style="color:green;">Photo</label>
            <input type="file" name="photo" class="form-control form-control-sm" required>
          </div>
          <div class="form-group">
            <label for="post" style="color:green;">Post</label>
            <input type="text" name="post" class="form-control form-control-sm" required>
          </div>
          <div class="form-group" style="color:green;">
            <label for="email" style="color:green;">Address</label>
            <input type="text" name="address" class="form-control form-control-sm" required>
          </div>
          <div class="form-group">
            <button type="submit" name="submit" value="submit" class="btn btn-success">Add Candidate</button>
          </div>
        </form>
      </div>


</body>

</html>