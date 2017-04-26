<?php
require_once("../database/DatabaseMysql.php");

class Token{
	private $con;
    public $id;
    private $username;
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $nationality;
    private $token;


  //Constructor
	public function __construct(DatabaseMysql $db){
		$this->con = new $db;
	}

//Sets y gets
		public function setNationality($n){
			$this->nationality = $n;
		}

    public function getNationality(){
      return $this->nationality;
    }

    public function setId($id){
        $this->id = $id;
    }

		public function getId(){
			return $this->id;
		}

    public function setUsername($username){
        $this->username = $username;
    }

    public function getUsername(){
      return $this->username;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setName($name){
        $this->name= $name;
    }

    public function setLastName($lastname){
        $this->lastname= $lastname;
    }

    public function setEmail($email){
        $this->email= $email;
    }

    public function setToken($token){
        $this->token= $token;
    }

	//inserción de solicitud de usuario en tabla token
	public function save($type) {
		try{

			$normalpass = $this->password;
			$hash = md5($normalpass);
			$query = $this->con->prepare('INSERT INTO tokens(token, username, password, tipo, email, fecha_creacion, activo, name, lastname) values (?,?,?,?,?,CURRENT_TIMESTAMP,0,?,?)');
            $query->bindParam(1, $this->token, PDO::PARAM_STR);
      			$query->bindParam(2, $this->username, PDO::PARAM_STR);
            $query->bindParam(3, $hash, PDO::PARAM_STR);
            $query->bindParam(4, $type, PDO::PARAM_STR);
            $query->bindParam(5, $this->email, PDO::PARAM_STR);
            $query->bindParam(6, $this->name, PDO::PARAM_STR);
            $query->bindParam(7, $this->lastname, PDO::PARAM_STR);
			$query->execute();
			$this->con->close();
		}
        catch(PDOException $e) {
	        echo  $e->getMessage();
	    }
	}

  public function generateToken(){
    $token = "";
    for($i = 0; $i < 16; $i++){
      $random = rand(65,90);
      $token .= chr($random);
    }

    return $token;
  }

    public function update(){
		try{
			$query = $this->con->prepare('UPDATE teacher SET te_name = ?, password = ? , department = ? WHERE id = ? ');
			$query->bindParam(1, $this->username, PDO::PARAM_STR);
			$query->bindParam(2, $this->password, PDO::PARAM_STR);
      $query->bindParam(3, $this->department, PDO::PARAM_STR);
      $query->bindParam(4, $this->id, PDO::PARAM_INT);
			$query->execute();
			$this->con->close();
		}
        catch(PDOException $e){
	        echo  $e->getMessage();
	    }
	}

	//obtenemos usuarios de una tabla con postgreSql
	public function get(){
		try{
            if(is_int($this->id)){
                $query = $this->con->prepare('SELECT * FROM teacher WHERE id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
    			$this->con->close();
    			return $query->fetch(PDO::FETCH_OBJ);
            }
            else{
                $query = $this->con->prepare('SELECT * FROM teacher');
    			$query->execute();
    			$this->con->close();
    			return $query->fetchAll(PDO::FETCH_OBJ);
            }
		}
        catch(PDOException $e){
	        echo  $e->getMessage();
	    }
	}

    public function delete(){
        try{
            $query = $this->con->prepare('DELETE FROM teacher WHERE id = ?');
            $query->bindParam(1, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
            return true;
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

    public static function baseurl() {
         return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/html/usuario21/";
    }

    public function checkUser($user) {
        if( ! $user ) {
            header("Location:" . Token::baseurl() . "index.php");
        }
    }
}
?>
