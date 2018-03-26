<?php
require 'todolist_db.php';

// Index

$index = $connection->query('SELECT * FROM todolist');

