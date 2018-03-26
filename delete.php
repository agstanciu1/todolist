<?php

require_once 'todolist_db.php';

$id = $_POST['todo_id'];


$delete = $connection->prepare("
		DELETE FROM todolist 
		WHERE id = :id_to_delete
		");
$delete->execute([
		'id_to_delete' => $id,
			]);

header('Location: todolist.php?message=deleted');