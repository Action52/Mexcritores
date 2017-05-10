<?php
require_once("../database/DatabaseMysql.php");
require_once("../database/DatabasePsql.php");

class User{
	private $con, $conP;
    public $id;
    private $username;
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $nationality;
    private $token;
		private $date;

  //Constructor
	public function __construct(DatabaseMysql $db, DatabasePsql $dbP){
		$this->con = new $db;
    $this->conP = new $dbP;
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

		public function getDate($date){
			$this->date = $date;
		}

	//inserción de solicitud de usuario en tabla token
	public function save($tkn) {
		try{




      $query = $this->con->prepare("SELECT * FROM tokens WHERE token = '$tkn'");
      $query->execute();

      $data = $query->fetch();
      //Here I have the selection

      if($data['token'] == $tkn && $data['activo'] == 0){
  			$query = $this->con->prepare('INSERT INTO usuario(username, password, tipo, email, fecha_creacion, name, lastname) values (?,?,?,?,CURRENT_TIMESTAMP,?,?)');
              $query->bindParam(1, $data['username'], PDO::PARAM_STR);
        			$query->bindParam(2, $data['password'], PDO::PARAM_STR);
              $query->bindParam(3, $data['tipo'], PDO::PARAM_STR);
              $query->bindParam(4, $data['email'], PDO::PARAM_STR);
              $query->bindParam(5, $data['name'], PDO::PARAM_STR);
              $query->bindParam(6, $data['lastname'], PDO::PARAM_STR);
  			$query->execute();

        $query = $this->con->prepare("UPDATE tokens SET ACTIVO = 1 WHERE token = '$tkn'");
				$query->execute();


				//Add user to postgreSql
				if($data['tipo'] == 0){//Lector
					$query = $this->conP->prepare('INSERT INTO lector (nombrelec, apellidos, email, username) VALUES (?,?,?,?)');
						$query->bindParam(1, $data['name'], PDO::PARAM_STR);
						$query->bindParam(2, $data['lastname'], PDO::PARAM_STR);
						$query->bindParam(3, $data['email'], PDO::PARAM_STR);
						$query->bindParam(4, $data['username'], PDO::PARAM_STR);
					$query->execute();
				}
				if($data['tipo'] == 1){//Escritor
					$query = $this->conP->prepare('INSERT INTO escritor(nombre, apellidos, email, username) VALUES (?,?,?,?)');
						$query->bindParam(1, $data['name'], PDO::PARAM_STR);
						$query->bindParam(2, $data['lastname'], PDO::PARAM_STR);
						$query->bindParam(3, $data['email'], PDO::PARAM_STR);
						$query->bindParam(4, $data['username'], PDO::PARAM_STR);
					$query->execute();
				}
				if($data['tipo]'] == 2){//Admin
					$query = $this->conP->prepare('INSERT INTO admin(username) VALUES (?)');
						$query->bindParam(1, $data['username'], PDO::PARAM_STR);
					$query->execute();
				}



      }
      else{
        header("Location: error.php");
      }
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

	public function infoUser($u_name){
		$query = $this->con->prepare("SELECT * FROM usuario WHERE username ='$u_name'");
		$query->execute();
		$result = $query->fetch(); //Save user info in array
		$this->con->close();

		return $result;
	}

    public function update($newpass,$newmail,$newname,$newlastname,$u_name){
		try{
			$query = $this->con->prepare('UPDATE usuario SET password = ?, email = ? , name = ? , lastname = ? WHERE username = ? ');
			$query->bindParam(1, $newpass, PDO::PARAM_STR);
			$query->bindParam(2, $newmail, PDO::PARAM_STR);
      $query->bindParam(3, $newname, PDO::PARAM_STR);
      $query->bindParam(4, $newlastname, PDO::PARAM_INT);
			$query->bindParam(5, $u_name, PDO::PARAM_INT);
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

    public function delete($u_name){
        try{
            $query = $this->con->prepare('DELETE FROM usuario WHERE username = ?');
            $query->bindParam(1, $u_name, PDO::PARAM_INT);
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
