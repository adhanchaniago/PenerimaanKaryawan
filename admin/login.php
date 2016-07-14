<?php
session_start();
  //if(!isset($_SESSION['username'])) {
 // header('location:index.php'); }
  //else { $username = $_SESSION['username']; }
  //require_once("../koneksi.php")
?>
<html>
<head>
<title>Penerimaan Karyawan PG Kebon Agung</title>
  <link href="../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #616161;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
	  .headlogin {
	width:300px;
	height:5px;
	padding: 20px 41px 30px 41px;
	background-color:#3498db;
	margin-right: auto;
	margin-left: auto;
	position:relative;
	text-align:center;
	font-size:16px;
	color:#FFFFFF;
      }
	  .container2 {
        width:300px;
		background-color:#FFF;
		padding: 40px 40px 40px 40px;
		margin-right: auto;
  		margin-left: auto;
      }
    </style>
</head>
<body>

<div class="headlogin"><strong>Login Administrator</strong></div>
    <div class="container2">
    <form action="proses_login.php" method="post">
      <form class="form-signin">
        
        <input type="text" class="input-block-level" placeholder="Username" name="username">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <button class="btn btn-primary" type="submit">Login</button>
      </form>

    </div>
		  </form>
</body>
</html>
