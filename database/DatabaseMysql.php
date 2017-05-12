<?php

class DatabaseMysql extends PDO{

	//dbname
	private $dbname = "mexcritoresMYSQL";
	//host
	private $host 	= "127.0.0.1";
	//user database
	private $user 	= "root";
	//password user
	private $pass 	= "";
	//port
	private $port 	= 3000;

    //instance
	private $dbhMYSQL;

	//connect with postgresql and mysql and pdo
	public function __construct(){
    try {
        $this->dbhMYSQL =  parent::__construct( "mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->pass);
      }
      catch(PDOException $e) {
        die($e->getMessage());
      }
	}

  public static function connect(){


  }

	//función para cerrar una conexión pdo
	public function close(){
    	$this->dbhMYSQL = null;
	}
}

?>
