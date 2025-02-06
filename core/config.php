<?php
class Database {

	// server local
	private $dsn = 'mysql:host=localhost;dbname=annuaire';
	private $username = 'root';
	private $password = '';

	// server online
	/*private $dsn = 'mysql:host=localhost;dbname=dbtestdevphpmamitianas192157com';
	private $username = 'testdes192157com';
	private $password = '3X7YT5Ic';*/

	private $conn;

	public function __construct() {
		$options = [
		    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try {
		    $this->conn = new PDO($this->dsn, $this->username, $this->password, $options);
		} catch (PDOException $e) {
		    die("Connection failed: " . $e->getMessage());
		}
	}

	public function getConnection() {
		return $this->conn;
	}
	
}


?>
