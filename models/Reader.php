<?php
require_once("../database/DatabasePsql.php");
require_once("../database/DatabaseMysql.php");
require_once("../interfaces/IUser.php");

class Reader implements IUser {
    private $con;
    private $con_m;
    private $id;
    private $nombrelec;
    private $apellidos;
    private $email;
    private $username;
    private $password;

    public function __construct(DatabaseMysql $dbm, DatabasePsql $db){
        $this->con = new $db;
        $this->con_m = new $dbm;
    }


    public function setId($id){
        $this->id = $id;
    }

    public function setnombrelec($nombrelec){
        $this->nombrelec = $nombrelec;
    }

    public function setapellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function setemail($email){
        $this->email = $email;
    }

    public function setusername($username){
        $this->username = $username;
    }

    public function setpassword($password){
        $this->password = $password;
    }

    //insertamos usuarios en una tabla con postgreSql
    public function save() {
        try{
            $query = $this->con->prepare('INSERT INTO lector (nombrelec,apellidos,email,username) values (?,?,?,?)');
            $query->bindParam(1, $this->nombrelec, PDO::PARAM_STR);
            $query->bindParam(2, $this->apellidos, PDO::PARAM_STR);
            $query->bindParam(3, $this->email, PDO::PARAM_STR);
            $query->bindParam(4, $this->username, PDO::PARAM_STR);
            $query->execute();
            

            $query2 = $this->con_m->prepare('INSERT INTO usuario(username,password,tipo,email,fecha_creacion,name,lastname) values (?,?,0,?,CURRENT_TIMESTAMP,?,?)');
            $query2->bindParam(1, $this->username, PDO::PARAM_STR);
            $query2->bindParam(2, $this->password, PDO::PARAM_STR);
            $query2->bindParam(3, $this->email, PDO::PARAM_STR);
            $query2->bindParam(4, $this->nombrelec, PDO::PARAM_STR);
            $query2->bindParam(5, $this->apellidos, PDO::PARAM_STR);
            $query2->execute();
            $this->con->close();
            $this->con_m->close();
            
        }
        catch(PDOException $e) {
            echo  $e->getMessage();
        }
    }

    public function update(){
        try{
            $query = $this->con->prepare('UPDATE lector SET nombrelec = ?, apellidos = ?, email = ? WHERE id = ?');
            $query->bindParam(1, $this->nombrelec, PDO::PARAM_STR);
            $query->bindParam(2, $this->apellidos, PDO::PARAM_STR);
            $query->bindParam(3, $this->email, PDO::PARAM_STR);
            $query->bindParam(4, $this->id, PDO::PARAM_INT);
            $query->execute();
            




            $query2 = $this->con_m->prepare('UPDATE usuario SET password  = ?,email  = ?,name  = ?,lastname  = ? WHERE username = ?');
            $query2->bindParam(1, $this->password, PDO::PARAM_STR);
            $query2->bindParam(2, $this->email, PDO::PARAM_STR);
            $query2->bindParam(3, $this->nombrelec, PDO::PARAM_STR);
            $query2->bindParam(4, $this->apellidos, PDO::PARAM_STR);
            $query2->bindParam(5, $this->username, PDO::PARAM_STR);
            $query2->execute();
            $this->con->close();
            $this->con_m->close();
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

    public function updateWithData($new_name,$new_lastname,$new_mail, $u_name){
        try{
            $query = $this->con->prepare('UPDATE lector SET nombrelec = ?, apellidos = ?, email = ? WHERE username = ?');
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
                $query = $this->con->prepare('SELECT * FROM lector WHERE id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return $query->fetch(PDO::FETCH_OBJ);
            }
            else{
                $query = $this->con->prepare('SELECT * FROM lector');
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
            $query = $this->con->prepare('DELETE FROM lector WHERE username = ?');
            $query->bindParam(1, $this->username, PDO::PARAM_INT);
            $query->execute();

            $query2 = $this->con_m->prepare('DELETE FROM usuario WHERE username = ?');
            $query2->bindParam(1, $this->username, PDO::PARAM_STR);
            $query2->execute();


            $this->con->close();
            $this->con_m->close();
        
            return true;
        }
        catch(PDOException $e){
            echo  $e->getMessage();
        }
    }

    public function deleteWithUsername($u_name){
        try{
            $query = $this->con->prepare('DELETE FROM lector WHERE username = ?');
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
            header("Location:" . Reader::baseurl() . "index.php");
        }
    }
}
?>
