<?php

namespace App\Sys;
require 'Helper.php';


class DB extends \PDO{
    
    private $stmt;
        static private $_instance=null;
    
    
    static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance=new self();
        }
        return self::$_instance;
    }
    /**
     * Connect to DB
     * 
     */
       function __construct(){
           $dbconf=Helper::getConfig();
           
                $dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];
                $usr=$dbconf['dbuser'];
                $pwd=$dbconf['dbpass'];

                parent::__construct($dsn,$usr,$pwd);
       }
       
       /**
        * @param type $sql
        * Consultes preparades
        */
    public function query($sql){
        $this->stmt=$this->prepare($sql);
        return $this->stmt;
    }
    /**
     * 
     * @param type $param
     * @param type $value
     * Lliga parametres de consultes preparades
     */
    public function bind($param,$value){
        switch (true){
            //Revisa el tipus de parametre i li asigna una constant
            case is_int($value):
                $type= \PDO::PARAM_INT;
                break;
            case is_string($value):
                $type= \PDO::PARAM_STR;
                break;
            case is_bool($value):
                $type= \PDO::PARAM_BOOL;
                break;
            case is_null($value):
               $type= \PDO::PARAM_NULL;
                break;
        }
        $this->stmt->bindValue($param, $value,$type);
    }
    /**
     * Executa la sentencia.
     */
    public function execute(){
        //$this->stmt= $this->execute();
        $this->stmt->execute();
    }
    
    /**
     * 
     * @param type $resul
     * @return type
     * extreu l'array de resultats de la sentència executada
     */
    public function resultSet(){
        $array=$this->stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $array;
    }
    public function single(){
        $single=$this->stmt->fetchColumn(PDO::FETCH_ASSOC);
        
        return $single;
    }


//ENDFILE
}