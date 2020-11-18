<?php 

require('credentials.php');

class Connection{

	// 2 attributes 

	// db connection
	public $db = null;
	// query results
	public $results = null;


	// 3 methods
	// 1. connect to the database
	// 2. execute queries
	// 3. fetch results

	// database connection method
	function connection(){

		// used to connect to the database
		$this->db = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

		// check for errors
		// if there are errors, return false
		if(mysqli_connect_errno()){
			return false;
		}

		// else return true
		return true;

	}

	// execute database queries
	function query($query){

		// establish a connection to the database
		// check if the connection method returns true or false

		if($this->connection() == false){
			return false;
		}


		if($this->db != true){
			return false;
		}


		// else execute the query
		$this->results = mysqli_query($this->db, $query) or die(mysqli_error($this->db));
		// check if results is returning false

		if($this->results !=true){

			return false;
		}
		// else return true
		return true;

	}


	// method to fetch from database
	function fetch(){

		// if results is true or false
		if($this->results != true){
			return false;
		}

		// else return the resultset
		return $this->results->fetch_assoc();
		
	}


}

?>