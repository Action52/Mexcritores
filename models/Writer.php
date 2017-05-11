<?php
require_once("../database/DatabasePsql.php");
require_once("../interfaces/IUser.php");

class Writer implements IUser {
	private $con, $con_m;
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $edad;
    private $nacionalidad;

		public function __construct(DatabaseMysql $dbm, DatabasePsql $db){
				$this->con = new $db;
				$this->con_m = new $dbm;
		}

    public function setId($id){
        $this->id = $id;
    }

    public function setnombre($nombre){
        $this->nombre = $nombre;
    }

    public function setapellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function setemail($email){
        $this->email = $email;
    }

    public function setedad($edad){
        $this->edad = $edad;
    }

    public function setnacionalidad($nacionalidad){
        $this->nacionalidad = $nacionalidad;
    }

	//insertamos usuarios en una tabla con postgreSql
	public function save() {
		try{
			$query = $this->con->prepare('INSERT INTO escritor (nombre,apellidos,email,edad,nacionalidad) values (?,?,?,?,?)');
            $query->bindParam(1, $this->nombre, PDO::PARAM_STR);
			$query->bindParam(2, $this->apellidos, PDO::PARAM_STR);
            $query->bindParam(3, $this->email, PDO::PARAM_STR);
            $query->bindParam(4, $this->edad, PDO::PARAM_INT);
            $query->bindParam(5, $this->nacionalidad, PDO::PARAM_STR);
			$query->execute();
			$this->con->close();
		}
        catch(PDOException $e) {
	        echo  $e->getMessage();
	    }
	}

    public function update(){
		try{
			$query = $this->con->prepare('UPDATE escritor SET nombre = ?, apellidos = ?, email = ?, edad = ?, nacionalidad = ? WHERE id = ?');
			$query->bindParam(1, $this->nombre, PDO::PARAM_STR);
			$query->bindParam(2, $this->apellidos, PDO::PARAM_STR);
            $query->bindParam(3, $this->email, PDO::PARAM_STR);
            $query->bindParam(4, $this->edad, PDO::PARAM_INT);
            $query->bindParam(5, $this->nacionalidad, PDO::PARAM_STR);
            $query->bindParam(6, $this->id, PDO::PARAM_INT);
			$query->execute();
			$this->con->close();
		}
        catch(PDOException $e){
	        echo  $e->getMessage();
	    }
	}


	public function updateWithData($new_name,$new_lastname,$new_mail, $u_name){
			try{
					$query = $this->con->prepare('UPDATE escritor SET nombre = ?, apellidos = ?, email = ? WHERE username = ?');
					$query->bindParam(1, $new_name, PDO::PARAM_STR);
					$query->bindParam(2, $new_lastname, PDO::PARAM_STR);
					$query->bindParam(3, $new_mail, PDO::PARAM_STR);
					$query->bindParam(4, $u_name, PDO::PARAM_INT);
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
                $query = $this->con->prepare('SELECT * FROM escritor WHERE id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
    			$this->con->close();
    			return $query->fetch(PDO::FETCH_OBJ);
            }
            else{
                $query = $this->con->prepare('SELECT * FROM escritor');
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
            $query = $this->con->prepare('DELETE FROM escritor WHERE id = ?');
            $query->bindParam(1, $this->id, PDO::PARAM_INT);
            $query->execute();
            $this->con->close();
            return true;
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

		public function deleteWithUsername($u_name){
				try{
						$query = $this->con->prepare('DELETE FROM escritor WHERE username = ?');
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
         return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/Mexcritores/Mexcritores/";
    }

    public function checkUser($user) {
        if( ! $user ) {
            header("Location:" . Writer::baseurl() . "app/list.php");
        }
    }
}
?>
