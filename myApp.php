<?php
//start the PHP Session
session_start();
//database connection file
require './db_inc.php';
//crud functions file
require './account_class.php';
//how to use addcount method 
$account = new Account();
try
{
	$newId = $account->addAccount('myNewName', 'myPassword');
}
catch (Exception $e)
{
	/* Something went wrong: echo the exception message and die */
	echo $e->getMessage();
	die();
}
echo 'The new account ID is ' . $newId;
