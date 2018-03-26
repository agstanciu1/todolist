<?php
// Set PDO
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$dbname = 'todolist';

// Set DSN

	$dsn = 'mysql:host='. $host.';dbname='. $dbname;

// Create PDO instance
	$connection = new PDO($dsn, $user, $password);
