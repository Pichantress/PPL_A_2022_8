<?php 
// mengaktifkan session php
session_start();
 
// menghapus semua session
if(isset($_SESSION['email'])){
    unset($_SESSION['email']);
    session_destroy();
}
 
// mengalihkan halaman ke halaman login
header("location:login.php");
?>