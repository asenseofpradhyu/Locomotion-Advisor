<?php

   class DatabaseConnect {

    private $host;
    private $user;
    private $password;
    private $dbname;
    private $charset;

    public function Db_Connect(){

        $this->host = 'localhost';
        $this->user = 'pradhuman';
        $this->password = '12345';
        $this->dbname = 'locomotion_db';
        $this->charset = 'utf8mb4';

        
     try{

        // Set Data Source Name
        $dsn = 'mysql:host='.$this->host .';'.'dbname='.$this->dbname.';charset='.$this->charset;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

        } catch(PDOExpection $e){
             echo "Connection Failed :- ".$e->getMessage();
         }

    }
    
 }
    
    

?>