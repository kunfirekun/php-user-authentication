<?php
class Account
{
	/* Class properties (variables) */
	
	/* The ID of the logged in account (or NULL if there is no logged in account) */
	private $id;
	
	/* The name of the logged in account (or NULL if there is no logged in account) */
	private $name;
	/* TRUE if the user is authenticated, FALSE otherwise */
	private $authenticated;
	
	
	/* Public class methods (functions) */
	
	/* Constructor */
	public function __construct()
	{
		/* Initialize the $id and $name variables to NULL */
		$this->id = NULL;
		$this->name = NULL;
		$this->authenticated = FALSE;
	}
	
	/* Destructor */
	public function __destruct()
	{
		
	}
}
/* Add a new account to the system and return its ID (the account_id column of the accounts table) */
public function addAccount(string $name, string $passwd): int
{
	/* Global $pdo object */
	global $pdo;
	
	/* Trim the strings to remove extra spaces */
	$name = trim($name);
	$passwd = trim($passwd);
	
	/* Check if the user name is valid. If not, throw an exception */
	if (!$this->isNameValid($name))
	{
		throw new Exception('Invalid user name');
	}
	
	/* Check if the password is valid. If not, throw an exception */
	if (!$this->isPasswdValid($passwd))
	{
		throw new Exception('Invalid password');
	}
	
	/* Check if an account having the same name already exists. If it does, throw an exception */
	if (!is_null($this->getIdFromName($name)))
	{
		throw new Exception('User name not available');
	}
	
	/* Finally, add the new account */
	
	/* Insert query template */
	$query = 'INSERT INTO myschema.accounts (account_name, account_passwd) VALUES (:name, :passwd)';
	
	/* Password hash */
	$hash = password_hash($passwd, PASSWORD_DEFAULT);
	
	/* Values array for PDO */
	$values = array(':name' => $name, ':passwd' => $hash);
	
	/* Execute the query */
	try
	{
		$res = $pdo->prepare($query);
		$res->execute($values);
	}
	catch (PDOException $e)
	{
	   /* If there is a PDO exception, throw a standard exception */
	   throw new Exception('Database query error');
	}
	
	/* Return the new ID */
	return $pdo->lastInsertId();
}