<?php
session_start(); 

if( isset($_SESSION['usuario'])!="grace"){
    header("location:admin.php");
}
?>


