<?php

define('DB_PATH', __DIR__ . '/database.db');

class Database{


//    private $servername = DB_HOST;
//    private $user = DB_USER;
//    private $pass = DB_PASSWORD;
//    private $dbname = DB_NAME;

    private $handler;
    private $stmt;
    private $errormsg;

    public function __construct(){
        $conn = 'sqlite:' . DB_PATH;
//          $conn = 'sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/github/lib/database.db';
/*        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
*/
        try{
            $this->handler = new PDO($conn);
            $this->handler -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            $this->errormsg = $e->getMessage();
            echo $this->errormsg;
        }


    }//construct

    public function query($sql){
        $this->stmt = $this->handler->prepare($sql);
    }

    public function bind($param,$value,$type=null){

        if(is_null($type)){
            switch(true){
                case is_int($value):
                $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
                default:
                $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }//bind

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    //SQLITE dont support this function
    /*
    public function rowCount(){
        return $this->stmt->rowCount();
    }
    */
    public function lastInsertedId(){

        return $this->stmt->lastInsertedId();
    }

}
?>