<?php
// echo "<pre>";

if(isset($_POST['update']) && $_POST['update']=='update'){

$tmp_address=$_FILES['photo']['tmp_name'];
$fname = $_FILES['photo']['name'];
$error = $_FILES['photo']['error'];
if($error != 0 ){
  exit();
}
$fname = date('y-m-d-his').$fname;

if(isset($_POST['submit']) && $_POST['submit']=='submit'){
$name=$_POST['name'];
$photo=$fname;
$address=$_POST['address'];


include_once('config.php');
if(is_dir('images')){

}else{
  mkdir('images');
}
move_uploaded_file($tmp_address,'images/'.$fname);
//$sql=" INTO canidate(name,photo,address) Values('$name','$photo','$address')";
$sql="Update canidate SET name='$name',photo='$photo',address='$address' where cid='$cid'";
$result=mysqli_query($conn,$sql);
}
}
