<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php 

echo"in login ";
var_dump($_POST);
$success=false;

if(!empty($_POST)) {
       $server="localhost";
       $username="root";
       $password="";
       // $db = 'users';

       $con=mysqli_connect($server,$username,$password);
       if(!$con){
           die("connection to the databse failed  due to ".mysqli_connect_error());
         
       }

echo" successfully connected";
       $name=$_POST['name'];
       $password=$_POST['password'];
    
       $sql ="SELECT * from `details`.`employe` where name='$name' and password='$password' ";
       
//arrow objec ->
        $result = $con->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $success=true;
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
     
   $con->close();

   if($success==true){
    header("Location:success.php", true, 301);  
    exit();
   }
}
else{
header("Location:index.php", true, 301);  
exit();
}
?>