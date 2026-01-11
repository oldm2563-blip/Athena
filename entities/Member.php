<?php
    
    
    class Member extends User{
     private $role = "Member";
            public function adduser(){
                $queryy = "SELECT COUNT(*) AS amount FROM user WHERE email = ?";
                $stmt = self::connection()->prepare($queryy);
                $stmt->execute([$this->email]);
                $found = $stmt->fetch(PDO::FETCH_ASSOC);
                if($found['amount'] > 0){
                    throw new Exception("email already exists");
                }
                $queryy = "SELECT COUNT(*) AS amount FROM user WHERE username = ?";
                $stmt = self::connection()->prepare($queryy);
                $stmt->execute([$this->username]);
                $found = $stmt->fetch(PDO::FETCH_ASSOC);
                if($found['amount'] > 0){
                    throw new Exception("username already exists");
                }

                $query = "INSERT INTO user (username, password, email, role) VALUES (?, ?, ?, ?)";
                $stmt = self::connection()->prepare($query);
                $stmt->execute([$this->username, $this->password, $this->email, $this->role]);
                echo "created";
            }
            public function amount(){
                $queryy = "SELECT COUNT(*) AS amount FROM user WHERE role = ?";
                $stmt = self::connection()->prepare($queryy);
                $stmt->execute([$this->role]);
                $found = $stmt->fetch(PDO::FETCH_ASSOC);
                return $found;
            }
    }

        
    
