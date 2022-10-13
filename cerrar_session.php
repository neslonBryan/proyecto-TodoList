<?php

include("location: index.php");
session_start();

if(isset($_SESSION['email'])){
    echo"existe session";
    session_destroy();
    header('location: index.php');
}
else{
    echo "no existe session";
}
?>