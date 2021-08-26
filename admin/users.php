<?php

require './helpers/functions.php';
$pageTitle = 'Dashboard';
include "includes/templates/header.php"; 


if(isset($_SESSION['username'])){
    echo 'welcome '. $_SESSION['username'];
}else{
    // echo 'You Not Autherized' ;

    header("Location: index.php");
}


?>