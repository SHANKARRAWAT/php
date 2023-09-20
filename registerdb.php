<?php 
$flag=0;
$insert=false;

// echo "<pre>";
// print_r($_POST);die;
if(!empty($_POST)) {

     if($_POST['name']==""){
        header("Location:register.php", true, 301);  
        exit();
     }
     

            $server="localhost";
            $username="root";
            $password="";
            // $db = 'users';

            $con=mysqli_connect($server,$username,$password);
            if(!$con){
                die("connection to the databse failed  due to ".mysqli_connect_error());
            
            }
//echo" successfully connected";
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $address=$_POST['address'];
            $phone=$_POST['phone'];
            $sql="INSERT INTO  `details`.`employe` values('$name','$email','$password','$address','$phone')";
//echo $sql;
//arrow objec ->
            if($con->query($sql)==true){
             $insert=true;
             $flag=1;
             echo"successfully inserted";
            }
            else{
            echo"error ";
            }

        $con->close();

}


if($insert==true){
    echo"inside insert if";
    header("Location:index.php", true, 301);  
    exit();
}


?>


