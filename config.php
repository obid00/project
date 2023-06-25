<?php

try {
	$pdo = new PDO('mysql:dbname=db_test; host=localhost', 'root', '');
} catch (PDOException $e) {
	die($e->getMessage());
}