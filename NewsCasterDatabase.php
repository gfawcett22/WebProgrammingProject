<?php
class NewsCasterDatabase{

	private $servername;
	private $databasename;
	public $connection;
	private $username;
	private $password;


	function __construct(){
		$this->servername = "localhost";
		$this->databasename = "zdouglas";
		//$this->username = "zdouglas";
		//$this->password = "PavsuW09";
		$this->username = "username";
		$this->password = "password";

	}
	/*
	 * Connect to the NewsCaster Database
	 *
	 * Params:  N / A
	 * Return:  bool - Returns false if connection fails
	 */
	public function db_connect(){

		//Attempt to connect to the databse
		if(!isset($this->connection)){
			$this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
		}
		return $this->connection;
	}

	/*
	 * Query the database
	 *
	 * Params:  $query - The query string
	 * Return:  Mixed - The result of the mysqli query() function
	 */
	 public function db_query($query){
	 	$this->connection = $this->db_connect();
		//Query db and store result as temp
		$queryResult = mysqli_query($this->connection, $query);
		return $queryResult;
	 }

	 /*
	  * Retrieve rows from the database
	  *
	  * Params:  $query - The query string
	  * Return:  Bool - Returns false if query fails or database rows if successful
	  */
	  public function db_select($query){
	  	$rowArray = array();
		$result = $this->db_query($query);
		if(!$result){
			return NULL;
		}else{
		while($row = $result->fetch_assoc()){

			$rowArray[] = $row;
		}
		return $rowArray;
	  }
	  }
	/*
	 * Quote and escape value for database queries
	 *
	 * Params:  String $value - The value to be quoted and escaped
	 * Return:  String - The quoted and escaped string
	 */
	 public function db_quote($value){
	 	$this->connection = $this->db_connect();
		return  $this->connection->real_escape_string($value);
	 }
}
?>
