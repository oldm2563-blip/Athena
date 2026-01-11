<?php
    require __DIR__ . "/../services/auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-page</title>
</head>
 <link rel="stylesheet" href="../style/login.css">
 <style>
     body{
    margin: 0;
    padding: 0;
    height: 100vh;
    width: 100%;
    background-color: #23262d;
    font-family: 'Trebuchet MS', Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
}
    p{
        margin: 0px;
        padding: 0;
    }
form{
    background-color: #30373f;
    height: 400px;
    width: 350px;
    border-radius: 10px;
    box-shadow: 1px 1px 10px 10px rgb(0, 0, 0, 0.17);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 30px;

}

input{
    background: none;
    border: none;
    border-bottom: 2px solid #d6a24f;
    padding: 10px 5px 5px 5px;
    font-size: 16px;
    outline: none;
    transition: border-color .3s;
    color: #fff6e8ff;
}

label {
    position: absolute;
    top: 12px;
    left: 6px;
    color: grey;
    pointer-events: none;
    transition: .3s ease;
}
div {
    position: relative;
}

input:focus + label,
input:not(:placeholder-shown) + label{
    top: -10px;
    font-size: 12px;
}
input:focus{
    border-bottom: 2px solid #0077ff;
}

input[type = "submit"]{
    background-color:  #d6a24f;
    padding: 8px 8px;
    border-radius: 5px;
    color: white;
}
a{
    color: #d6a24f;
}
p{
    color: grey;
}
 </style>
<body>
    <form action="" method="POST">
        <div>
            <input type="email" placeholder=" " name="email" require>
            <label for="email">Email</label>
        </div>
        <div>
            <input type="password" placeholder=" " name="pass" require>
            <label for="pass">Password</label>
        </div>
        <input type="submit">
        <?php echo '<p style="color :red">' . $error .'</p>'?>
        <p>Don't have an account? <a href="regestration.php">Create account</a></p>
    </form>
</body>
</html>