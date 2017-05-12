<?php

class DatabasePsql extends PDO{

	//dbname
	private $dbname = "mexcritoresp";
	//host
	private $host 	= "127.0.0.1";
	//user database
	private $user 	= "leonvillapun";
	//password user
	private $pass 	= 'schwarz';
	//port
	private $port 	= 5432;

    //instance
	private $dbhPSQL;

	//connect with postgresql and mysql and pdo
	public function __construct(){
	    try {
	        $this->dbhPSQL = parent::__construct("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname;user=$this->user;password=$this->pass");
	    }
        catch(PDOException $e){
	        echo  $e->getMessage();
	    }
	}

	//función para cerrar una conexión pdo
	public function close(){
    	$this->dbhPSQL = null;
	}
}

?>
