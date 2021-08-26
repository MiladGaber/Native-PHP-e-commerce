<?php 
   require './helpers/functions.php';
   session_destroy();
   header("Location: ".url('index.php'));
?>