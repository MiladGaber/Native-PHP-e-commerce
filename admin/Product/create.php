<?php 

require '../helpers/functions.php';
require "../helpers/checkLogin.php";
require '../connectDB.php';
$pageTitle = 'Add New Category';
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
    $stmt = $con->prepare("insert into categories (Name,Description,Ordering,Visibility) values (?,?,?,?) ");
    $stmt->execute(array($name,$description,$ordering,$visibility));
    $num = $stmt->rowCount();
    if($num == 1){
        $_SESSION['messages'] = 'Record Updated';
        header("location: index.php");
    }else{
            $_SESSION['errormessages'] = ['error try again'];
        }
    }
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
                <h1 class="mt-4">Add Category</h1>
                <ol class="breadcrumb mb-4">


                   <?php 
                        # Dispaly error messages .... 

                        if(isset($_SESSION['messages'])){
                            foreach ($_SESSION['messages'] as  $value) {
                                # code...
                                echo '<li class="breadcrumb-item active">'.$value.'</li>';
                            }

                            unset($_SESSION['messages']);
                        }else{
                        echo '<li class="breadcrumb-item active"></li>';

                        }
                   
                   ?>


                </ol>



                <div class="container">

                    <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']);?>"enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="text" name="name" value="" class="form-control" id="exampleInputName"
                                aria-describedby="" placeholder="Enter Name">
                            <label for="exampleInputDescription">Description</label>
                            <input type="text" name="description"  value="" class="form-control" id="exampleInputDescription"
                                aria-describedby="" placeholder="Enter Description">
                            <label for="exampleInputOrdring">Ordring</label>
                            <input type="text" name="ordering"  value="" class="form-control" id="exampleInputOrdring"
                                aria-describedby="" placeholder="Ordring Status 1 or 0">
                            <label for="exampleInputVisibility">Visibility</label>
                            <input type="text" name="visibility"  value="" class="form-control" id="exampleInputVisibility"
                                aria-describedby="" placeholder="Visibility Status 1 or 0">
                        </div>

                        <button type="submit" class="btn btn-primary my-3">CREATE</button>
                    </form>
                </div>



            </div>
        </main>




        <?php 

    require '../footer.php';
?>