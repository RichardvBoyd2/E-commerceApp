<?php session_start(); ?>
		<head>
		<link rel="stylesheet" type="text/css" href="style.css">
			<style type="text/css">
			body {
            	background-color: silver;
            }
            .navbar {
            	background-color: gray;
            	height: 48px;
            	overflow: hidden;				
            }
            .navbar a {	
            	float: left;
            	text-align: center;
            	padding: 14px 16px;
            	font-size: 17px;
            }
            .navbar a:hover {
            	background-color: white;
            }			 
			</style>
		</head>
		
		<div class="navbar">
			<a href="/CST236MilestoneProject/index.php">Home</a>			
			<?php if ($_SESSION['Loggedin'] != true) {?>
			<a href="/CST236MilestoneProject/presentation/views/register/register.php">Sign Up</a>			
			<a href="/CST236MilestoneProject/presentation/views/login/login.php" >Log In</a>
			<?php }
			      if ($_SESSION['Role'] == 5) {?>
			<a href="/CST236MilestoneProject/presentation/views/admin/newProduct.php">New Product</a>
			<a href="/CST236MilestoneProject/presentation/views/register/register.php">New User</a>
			<a href="/CST236MilestoneProject/presentation/views/admin/salesReport.php">Sales Report</a>
			<?php }
			      if ($_SESSION['Loggedin'] == true) {?>
			<a href="/CST236MilestoneProject/presentation/views/checkout/cart.php">Cart</a>
			<a href="/CST236MilestoneProject/presentation/views/login/logout.php">Logout</a>
			<?php }?>
		</div>