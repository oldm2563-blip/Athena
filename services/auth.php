
<?php 
    $error = "";
    require __DIR__ . "/../services/require.php";
    session_start();
    if($_SERVER['REMOTE_USER'] = $_POST){

        $email = $_POST['email'];
        $pass = $_POST['pass'];
        if(empty($email) || empty($pass)){
            $error = 'fill all the input fields';
        }
        else{
            $add = new Member("", $email, $pass);
        $man = $add->verify();
        if(!empty($man)){
            if($man['password'] === $pass){
            $_SESSION['user'] = $man['username'];
            $_SESSION['email'] = $man['email'];
            $_SESSION['role'] = $man['role'];
            $_SESSION['id'] = $man['user_id'];
            header("Location: dashboard.php");
            exit();
        }
        else{
            $error = "incorrect password";
        }
        }
        else{
            $error = "email doesn't exist";
        }
        }
        
        
        
    }