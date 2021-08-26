<?php   
    require './helpers/functions.php';
    // session_start();
    // print_r($_SESSION);

    $pageTitle = 'Admin Login';

    if(isset($_SESSION['username'])){
        header("Location: dashboard.php");
    }


    include "includes/templates/header.php"; 
    include "connectDB.php"; 

    if($_SERVER['REQUEST_METHOD'] == "POST"){
    
        $username =  $_POST['user'];
        $password = $_POST['pass'];
        
        $errors = [];

        if(empty($username)){
        $errors['username'] = "username Required";
        }


        if(strlen($password)<5){

           $errors['password'] = "Password Length Must > 5 ch";
        }


        if(count($errors) > 0){
            echo '<br>';
         foreach ($errors as $key => $value) {
             # code...
             echo '<h6 class="text-danger text-center"> *'.$value.'</h6>';
         }

        }else{

           // code .... 

           $hashed_password = md5($password);


           $stmt = $con->prepare("select Username , Password from users where Username = ? and password = ? and GroupID = ?");
           $stmt->execute(array($username,$hashed_password,1));
           $num = $stmt->rowCount();
           if($num == 1){
             // code 
             $_SESSION['username'] = $username;
             header("Location: dashboard.php");

           }else{
               
               echo '<br><h6 class="text-danger text-center"> *Login Faild! <br> Username or Password Not Valid!!</h6>';
           }

        }

    }




?>


    <form class="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h4 class="text-center">Admin Login</h4>
            <input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off">
            <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password"> 
            <button class="btn btn-primary w-100" type="submit" >Submit</button>
    </form>


<?php include "includes/templates/footer.php"; ?>