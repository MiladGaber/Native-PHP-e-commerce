<?php 

 require '../helpers/functions.php';
 require "../helpers/checkLogin.php";
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

    $name = CleanInputs($_POST['name']);
    $description = CleanInputs($_POST['description']);
    $ordering = CleanInputs($_POST['ordering']);
    $visibility = CleanInputs($_POST['visibility']);

     $erros = [];
     # Validate Input ... 
    if(!validate($name,1))
    {
      $erros['name'] = "full name Field Required";
    }
    if(!validate($description,1))
    {
      $erros['description'] = "full description Field Required";
    }
    if($ordering==0 || $ordering==1)
    {
    }else{$erros['ordering'] = "ordering Not Valid choose  1 For Activing ordring   or 0 For DisActive ";}
    if($visibility==0 || $visibility==1)
    {
    }else{$erros['visibility'] = "visibility Not Valid choose  1 For Visible Category  or 0 For Hidden ";}


    if(count($erros) > 0){
        $_SESSION['errormessages'] = $erros;
    }else{

   # db Logic 
    $stmt = $con->prepare("update categories set Name = ? ,Description=?,Ordering=?,Visibility=? where ID = ?");
    $stmt->execute(array($name,$description,$ordering,$visibility,$id));
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
$stmt = $con->prepare("select * from Categories where ID=$id");
$stmt->execute(array());
$row = $stmt->fetch();
$num = $stmt->rowCount();
if($num > 0){
    echo $row['ID'];
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
                <h2 class="mt-4">Edit Category</h2>
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

                    <form method="post" action="edit.php?id=<?php echo $row['ID'];?>"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="text" name="name" value="<?php echo $row['Name'];?>" class="form-control" id="exampleInputName"
                                aria-describedby="" placeholder="Enter Name">
                            <label for="exampleInputDescription">Description</label>
                            <input type="text" name="description" value="<?php echo $row['Description'];?>" class="form-control" id="exampleInputDescription"
                                aria-describedby="" placeholder="Enter Description">
                            <label for="exampleInputOrdring">Ordring</label>
                            <input type="text" name="ordering" value="<?php echo $row['Ordering'];?>" class="form-control" id="exampleInputOrdring"
                                aria-describedby="" placeholder="Ordring">
                            <label for="exampleInputVisibility">Visibility</label>
                            <input type="text" name="visibility" value="<?php echo $row['Visibility'];?>" class="form-control" id="exampleInputVisibility"
                                aria-describedby="" placeholder="Visibility">
                        </div>

                        <button type="submit" class="btn btn-primary my-3">UPDATE</button>
                    </form>
                </div>



            </div>
        </main>




        <?php 

    require '../footer.php';
?>