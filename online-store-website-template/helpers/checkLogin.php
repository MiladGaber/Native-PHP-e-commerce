<?php 

// check session .... 

if(!isset($_SESSION['username'])){

    header("Location: ".url('index.php'));
}
?>
