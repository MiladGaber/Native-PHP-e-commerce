<?php

require '../admin/helpers/functions.php';
require '../admin/connectDB.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

  // CODE .... 

  $user = CleanInputs($_POST['user']);
  $password = CleanInputs($_POST['pass']);
  

  $email = CleanInputs($_POST['email']);
  $name = CleanInputs($_POST['name']);

   $erros = [];
   # Validate Input ... 
   if(empty($user)){
    $erros['username'] = "username Required";
    }
   if(empty($name)){
    $erros['name'] = "name Required";
    }
    if(strlen($password)<3){

       $erros['password'] = "Password Length Must > 3 ch";
    }
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $erros['Email'] = "Invalid Email";
    }

    if(count($erros) > 0){
      echo '<br>';
      foreach ($erros as $key => $value) {
       # code...
       echo '<h6 class="text-danger text-center"> *'.$value.'</h6>';
      }
   
  }else{
    $pass= md5($password);
 # db Logic 
  $stmt = $con->prepare("insert into users (Username,Password,Email,FullName ,GroupID) values (?,?,?,?,?) ");
  $stmt->execute(array($user,$pass,$email,$name,0));
  $num = $stmt->rowCount();
  if($num == 1){
      $_SESSION['messages'] = 'Record Updated';
      header("location: index.php");
  }else{
          $_SESSION['errormessages'] = ['error try again'];
      }
  }
}
?>