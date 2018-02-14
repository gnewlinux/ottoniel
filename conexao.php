<?php
function conectar(){
	$servername = "localhost";
	$username = "gnew";
	$password = "fElix123321";
	$dbname = "newdb";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	return $conn;
	}

$conexao = conectar();

?>