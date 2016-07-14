<?php
session_start();
unset($_SESSION['username']);
echo "<script>alert('Terimakasih atas partisipasinya !');document.location.href='login.php';</script>";
?>