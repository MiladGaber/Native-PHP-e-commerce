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
	border-bottom:3px solid burlywood;
	background:#e2c7a54f;
	color:black;
	border-radius:0px;
}

.row{
	width:60%;
	margin-top:50px;
	border: 3px solid orange;
	border-radius:14px;
	height:auto;
}

form h2{
	color:burlywood;
}

.checkbox span{
	color:burlywood;
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

	background-color: burlywood;
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
