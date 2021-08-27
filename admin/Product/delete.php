<?php 

require '../helpers/functions.php';
require "../helpers/checkLogin.php";
 require '../connectDB.php';
 $pageTitle = 'Delete User';

$id = Sanitize($_GET['id'],1);


 if(!validate($id,2)){
 
     $message = "Invalid Id";

 }else{
   $stmt = $con->prepare("delete from categories where ID =?");
   $stmt->execute(array($id));
    $num = $stmt->rowCount();
        if($num == 1){
            $_SESSION['messages'] = 'Record Deleted';
            header("location: index.php");
        }else{
           $_SESSION['errormessages'] = ['error try again'];
        }
   
    $_SESSION['messages'] = $message;

    header("Location: index.php");
}
?>