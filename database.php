<?php

class Database {
	private $connection;
	private static $instance; //The single instance

	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "vf_database";

	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$instance) { // If no instance then make one
			self::$instance = new self();
		}
		return self::$instance;
	}
	// Constructor
	private function __construct() {
		$this->connection = new mysqli($this->host, $this->username,
			$this->password, $this->database);

		// Error handling Used to trigger a user error condition
		if(mysqli_connect_error()) {
			trigger_error("Failed to connect to MySQLi: " . mysqli_connect_error(),
				 E_USER_ERROR);
		}
	}
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
	public function getConnection() {
		return $this->connection;
	}
}


?>
