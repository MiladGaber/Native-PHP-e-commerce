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
    <button type="submit" class="btn btn-success">Submit <i class="glyphicon glyphicon-send"></i></button>
  </form>
  </div>
</div>


</body>
</html>