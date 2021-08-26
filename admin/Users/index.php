
<?php 

$pageTitle = 'All Members';

require "../helpers/functions.php";
require "../helpers/checkLogin.php";


require "../header.php";
require "../nav.php";


require '../connectDB.php';
?>


<div id="layoutSidenav">
         
<?php 
   require '../sidNav.php';
?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">All Members</h1><br>
                        <?php

 # fetch all admins Role ... 
$stmt = $con->prepare("select * from users");
$stmt->execute();
$num = $stmt->rowCount();
if($num > 0){
    // code 
    //$_SESSION['username'] = $username;
    //$_SESSION['ID'] = $row['UserID'];
    // print_r ($row);
}else{
    echo 'Not Data';
}
  
?>
<table class="table table-bordered">
    <thead>
      <tr class="text-center">
        <th>ID</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?> 
        <tr class="text-center">
            <td><?php echo $row['UserID']; ?></td>
            <td><?php echo $row['Username'];?></td>
            <td><?php echo $row['FullName'];?></td>
            <td><?php echo $row['GroupID'];?></td>
                                               
            <td>
            <a href='delete.php?id=<?php echo $row['UserID'];?>' class='btn btn-danger m-r-1em'>Delete</a>
            <a href='edit.php?id=<?php echo $row['UserID'];?>' class='btn btn-primary m-r-1em'>Edit</a>       
            </td> 
                                          
        </tr>
    <?php } ?>   
    </tbody>
  </table>

</div></main>


<?php require '../footer.php'; ?>
