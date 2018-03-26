<?php

require_once 'todolist_db.php';

if(!isset($_POST['title'])){
	header('Location: todolist.php?message=not_found');
	
} else {

	if(!empty($_POST['title'])){
	$title = $_POST['title'];
		
	$insert = $connection->prepare("
		INSERT INTO todolist (title)
		VALUES (:title)
		");
	$insert->execute([
		'title' => $title,
			]);

header('Location: todolist.php?message=added');
} else {

	header('Location: todolist.php?message=nothing_added');
	
}
}	


?>