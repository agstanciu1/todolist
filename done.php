<?php

require_once 'todolist_db.php';

$id = $_POST['id'];

if($_POST['done_id'] == 1) {
	$done = 0;
	
} else {
	$done = 1;
	
};

$update = $connection->prepare("
		UPDATE todolist
		SET done = :done_id
		WHERE id = :id_to_update
		");
$update->execute([
		'id_to_update' => $id,
		'done_id' => $done,
			]);


header('Location: todolist.php?message=updated');