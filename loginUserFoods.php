<?php  
session_start();
include '../config/config.php';


//$currentUser =$_SESSION['username'];

$username = $_POST['username'];
$password = $_POST['password'];


$sql ="SELECT * FROM users WHERE username ='$username' AND password ='$password'";

$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if($count >0){    
    $userRecord = array();
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION['username']=$current_user;
        
        //print_r($row);
         $userRecord[] = $row;
         
    }
    echo json_encode(
    array(
    "success"=> true,
    "userData"=>$userRecord[0],
    )
    );
    
  
}
 else{
    echo json_encode(
    array(
    "success"=> false
    ));
} 




?>