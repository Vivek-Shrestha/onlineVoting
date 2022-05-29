
<?php      
session_start();
include_once('config.php');
// if(mysqli_connect_errno()) {  
//         die("Failed to connect with MySQL: ". mysqli_connect_error());  
//     }  
if(isset($_POST['login'])=='submit'){

    $username = $_POST['adminName'];  
    $password = $_POST['adminPassword'];  
      
      
        $sql = "SELECT * FROM authentication WHERE adminName = '$username' and adminPassword = '$password'";  
        $result = mysqli_query($conn, $sql);  
        // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
      
          
        if($count == 1){  
             
            header('Location:adminpanal.php');
        }  
        else{  
            echo "Invalid Username or Password";
             
             
        }  
      
?>  
