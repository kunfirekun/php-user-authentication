<?php

require 'config.php';

try {
	$pdo = new PDO($dsn, $user, $password);

	if ($pdo) {
		echo "Connected to the $db database successfully!";





	}
} catch (PDOException $e) {
	echo $e->getMessage();
}