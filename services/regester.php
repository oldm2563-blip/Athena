<?php
require __DIR__ . "/../services/require.php";
$error = '';
    if($_SERVER['REQUEST_METHOD'] = $_POST){
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        if(empty($email) || empty($password) || empty($username)){
            $error = 'fill all the input fields';
        }
        else{
             switch($role){
            case 'admin':
                try{
                    $add = new Admin($username, $email, $password);
                    $add->adduser();
                }
                catch(Exception $e){
                    $error = $e->getMessage();
                }
                break;
            case 'project chef':
                try{
                    $add = new ProjectChef($username, $email, $password);
                    $add->adduser();
                }
                catch(Exception $e){
                     $error = $e->getMessage();
                }
                break; 
            case 'member':

                try{
                    $add = new Member($username, $email, $password);
                    $add->adduser();
                }
                catch(Exception $e){
                    $error = $e->getMessage();
                }
                break; 
        }
        }
       
    }