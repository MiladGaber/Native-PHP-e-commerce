


<?php 

// require 'db-connection.php';

function CleanInputs($input){

// return stripslashes(htmlspecialchars(trim($input)));
$input = trim($input);
$input = stripslashes($input);
$input = htmlspecialchars($input);

return $input;
}




if($_SERVER['REQUEST_METHOD'] == "POST"){

  $errors = [];

  $name  = CleanInputs($_POST['name']);
  $email = CleanInputs($_POST['email']);
  $password = $_POST['password'] ;
  $dep_id   =  filter_var($_POST['dep_id'],FILTER_SANITIZE_NUMBER_INT);




  if(empty($name)){

    $errors['Name'] = " Field Required";

  }elseif(!preg_match("/^[a-zA-Z\s*']+$/",$name)){

    $errors['Name'] = "Invalid String";
  }



  if(empty($email)){

    $errors['Email'] = " Field Required";

  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     $errors['Email'] = "Invalid Email";
  }


  if(empty($password)){

    $errors['Password'] = " Field Required";

  }elseif(strlen($password < 6)){

    $errors['Password'] = "Invalid Length";
  }





    if(count($errors) > 0){

        foreach($errors as $key => $error){

            echo '* '.$key.' : '.$error.'<br>';
        }
     }else{

   $password =   sha1($password); // md5
      

   // code 
   $sql = "insert into users (name,email,password,dep_id) values ('$name','$email','$password')";

    $op =  mysqli_query($con,$sql);

    if($op){

        echo 'data Inserted';
    }else{
        echo 'Error Try Again';

      // echo  mysqli_error($con);

    }

    


    }

   


}




  # Fetch departments 

  // $sql = "select * from departments";
  // $op  = mysqli_query($con,$sql); 

  // mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="assets/css/style.css">

<style >
  body{
	background:white;
}

.container{
	display:flex;
	flex-direction:row;
	justify-content:center;
	align-items:center;
}
.form-control{
	border:none;
	border-bottom:3px solid blue;
	background:cyan;
	color:black;
	border-radius:0px;
}

.row{
	width:60%;
	margin-top:50px;
	border: 3px solid blue;
	border-radius:14px;
	height:auto;
}

form h2{
	color:blue;
}

.checkbox span{
	color:blue;
}

.checkbox{
	float:left;
}

button{
	float:right;
	width:120px;
}

@media(max-width:768px){
	body{
		font-size:10px;
	}
	
	h2{
		font-size:15px;
	}
	
	input[type=text]{
		font-size:13px;
	}
	
	input[type=password]{
		font-size:13px;
	}
	
	input[type=email]{
		font-size:13px;
	}
	
	button{
		width:80px;
		height:30px;
		float:right;
		font-size:10px;
		margin-bottom:10px;
	}
	
	.checkbox{
		display:inline;
	}
	
}

button{
	color: white;

	background-color: blue;
}
</style>


</head>
<body>


<div class="container">
  <div class="row">
  <form action="/action_page.php" class="col-xs-12 col-sm-12 col-md-12">
  <h2>Please fill all mandatory(*) fields</h2>
  <div class="form-group">
      <input type="text" class="form-control" id="name" placeholder="Enter Name *" name="name" required>
    </div>
	
	<div class="form-group">
      <input type="text" class="form-control" id="surname" placeholder="Enter Second Name *" name="secondName" required>
    </div>
	
    	<div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Enter email *" name="email" required>
    </div>
	<div class="form-group">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password *" name="pwd" required>
   </div>
   <div class="form-group">
      <input type="password" class="form-control" id="pwd" placeholder="Repeat password *" name="Rptpwd" required>
   </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> <span>Remember me</span></label>
    </div>
    <button type="submit" class="btn ">Submit <i class="glyphicon glyphicon-send"></i></button>
  </form>
  </div>
</div>


</body>
</html
