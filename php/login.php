<?php
session_start();


include ("connection.php");
global $conn;


if(isset($_POST['login'])){

	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	$select_user = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

	$run_user = mysqli_query($conn, $select_user);
	$check_user = mysqli_num_rows($run_user);


	if($check_user > 0){
		$_SESSION['username'] = $username;
		header("Location: ../pages/main.php");

	}else {

		echo "<script>alert('Email or password is not correct, try again!')</script>";
		header("Location: ../index.php");
	}

}




?>