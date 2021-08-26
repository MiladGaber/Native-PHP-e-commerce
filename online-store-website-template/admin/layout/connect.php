<?php

    $dsn = 'mysql:host=localhost;dbname=shop';
    $user = 'root';
    $pass = '';
    $option = arry (
        PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',
    );

    try {
        $con = new PDO($dsn, $user, $pass, $option);
        $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'You are connected welcome to database'
    }

    catch(PDOException $e){
        echo 'Failed To Connect' .$e->getMessage();
    }


?>








<?php
$con = mysqli_connect("host","username","password","database") or die("Couldn't connect");

require_once("functions.php");
?>



<?php


function getUserInfo($id) {
    $query = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");
    return mysqli_fetch_array($query);
}



?>
<?php
require_once("dbcon.php");

$result = mysqli_query($con, "SELECT * FROM tablename");
while ($row = mysqli_fetch_assoc($result)) {
    $userinfo = getUserInfo($row['userid']);
    echo $userinfo['name'];
}

?>