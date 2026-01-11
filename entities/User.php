<?php
    $error = "";
    
    abstract class User extends Db{
        protected $id;
        protected $username;
        protected $email;
        protected $password;
        protected $created_at;
        protected $updated_at;

        public function __construct($username, $email, $password)
        {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }
        
        public function verify(){
            $query = "SELECT COUNT(*) AS exist FROM user WHERE email = ?";
            $stmt = $this->connection()->prepare($query);
            $stmt->execute([$this->email]);
            $found = $stmt->fetch(PDO::FETCH_ASSOC);
            if($found['exist']>0){
                 $query = "SELECT * FROM user WHERE email = ?";
                 $stmt = $this->connection()->prepare($query);
                 $stmt->execute([$this->email]);
                 $info = $stmt->fetch(PDO::FETCH_ASSOC);
                 return $info;
            }
            else{
                return;
            }
        }
        public function showalls(){
             $queryy = "SELECT COUNT(*) AS amount FROM user WHERE role = 'Member' OR role = 'project chef'";
                $stmt = self::connection()->query($queryy);
                $found = $stmt->fetch(PDO::FETCH_ASSOC);
                return $found;
        }
        abstract function adduser();
    }