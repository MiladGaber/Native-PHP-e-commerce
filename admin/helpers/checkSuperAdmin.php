<?php 

 if(!($_SESSION['user']['role_id'] == 1)){

     header("Location: ".url('index.php'));
 }
?>