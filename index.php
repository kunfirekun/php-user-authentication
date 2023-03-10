<?php

require 'config.php';
require 'engine.php';

try {
	$pdo = new PDO($dsn, $user, $password);

	if ($pdo) {
        // insert a single users
        $name = 'Macmillan';
        //obtained from engine ipaddress function
        $ip_address= getUserIpAddr();
        //sql query to insert
        $sql = 'INSERT INTO the_numbers(username,ip_address) VALUES(:name,:ip_address)';
        //prepared statement for the sql query
        $statement = $pdo->prepare($sql);

        $statement->execute([
            ':name' => $name,
            ':ip_address' => $ip_address
        ]);

        //output
		echo "The username $name and $ip_address entered to database successfully!";


	}
} catch (PDOException $e) {
	echo $e->getMessage();
}