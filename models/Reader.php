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

    //insertamos usuarios en una tabla con postgreSql
    public function save() {
        try{
            $query = $this->con->prepare('INSERT INTO lector (nombrelec,apellidos,email) values (?,?,?)');
            $query->bindParam(1, $this->nombrelec, PDO::PARAM_STR);
            $query->bindParam(2, $this->apellidos, PDO::PARAM_STR);
            $query->bindParam(3, $this->email, PDO::PARAM_STR);
            $query->execute();
            $this->con->close();

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
            $query = $this->con->prepare('DELETE FROM lector WHERE id = ?');
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
