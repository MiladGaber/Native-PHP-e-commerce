<?php 

 require '../helpers/functions.php';
 require '../connectDB.php';
 $pageTitle = 'Edit Users';

# Validate & Sanitize id 
    $id = Sanitize($_GET['id'],1);
    if(!validate($id,2)){
    
        $_SESSION['messages'] = "invalid id ";
        header("Location: index.php");
       }





 # Form Logic ... 

 if($_SERVER['REQUEST_METHOD'] == "POST"){

    // CODE .... 

    $fname = CleanInputs($_POST['FullName']);
    $role = CleanInputs($_POST['Role']);

     $erros = [];
     # Validate Input ... 
    if(!validate($fname,1))
    {
      $erros['full name'] = "full name Field Required";
    }
    if($role==0 || $role==1)
    {
    }else{$erros['role'] = "Role Not Valid choose  1 For Admin  or 0 For Client ";}
    if(count($erros) > 0){
        $_SESSION['errormessages'] = $erros;
    }else{

   # db Logic 
    $stmt = $con->prepare("update users set FullName = ? ,GroupID =? where UserID = ?");
    $stmt->execute(array($fname,$role,$id));
    $num = $stmt->rowCount();
    if($num == 1){
        $_SESSION['messages'] = 'Record Updated';
        header("location: index.php");
    }else{
            $_SESSION['errormessages'] = ['error try again'];
        }
    }
 }



# Fetch data ... 
$stmt = $con->prepare("select * from users where UserID=$id");
$stmt->execute(array());
$row = $stmt->fetch();
$num = $stmt->rowCount();
if($num > 0){
    echo $row['UserID'];
}else{
    echo 'Not Data';
}
   require '../header.php';
   require "../nav.php";

?>

<div id="layoutSidenav">

    <?php 
   require '../sidNav.php';
?>



    <div id="layoutSidenav_content">


        <main>


            <div class="container">
                <h2 class="mt-4">Edit User Data</h2>
                <ol class="breadcrumb mb-4">


                   <?php 
                        # Dispaly error messages .... 
                        if(isset($_SESSION['errormessages'])){
                            foreach ($_SESSION['errormessages'] as  $value) {
                                # code...
                                echo '<li class="breadcrumb-item active">'.$value.'</li>';
                            }
                            unset($_SESSION['errormessages']);
                        }else{
                        echo '<li class="breadcrumb-item active"></li>';
                        }
                   
                   ?>


                </ol>



                <div class="container">

                    <form method="post" action="edit.php?id=<?php echo $row['UserID'];?>"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" name="FullName" value="<?php echo $row['FullName'];?>" class="form-control" id="exampleInputName"
                                aria-describedby="" placeholder="Enter FullName">
                            <label for="exampleInputEmail1">Role</label>
                            <input type="text" name="Role" value="<?php echo $row['GroupID'];?>" class="form-control" id="exampleInputName"
                                aria-describedby="" placeholder="Enter Roule">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>



            </div>
        </main>




        <?php 

    require '../footer.php';
?>