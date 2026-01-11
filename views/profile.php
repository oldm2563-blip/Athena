<?php require __DIR__ . "/../services/session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
    margin: 0;
    padding: 0;
    height: 100vh;
    width: 100%;
    background-color: #23262d;
    font-family: Georgia, 'Times New Roman', Times, serif;
}

header{
    position: relative;
    top: 0;
    right: 0;
    left: 0;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #30373f;
}

h1{
    margin: 0;
    margin-left: 20px;
    color: white;
    font-weight: light;
    text-decoration: underline #d6a24f;
}
.logout{
    margin-right: 20px;
    background-color: white;
    padding: 8px;
    text-decoration: none;
    color: black;
    border-radius: 5px;
}
.profile_container{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
}
.prof{
    background-color: #30373f;
    padding: 30px;
    border-radius: 10px;
}
.prof h1{
    text-decoration: none;
    margin: 20px;
    color: #d6a24f;
}
.prof h2{
    color: white;
    font-weight: light;
}
.con{
    display: flex;
    align-items: center;
}
</style>
<body>
    <header>
        <h1>ATHENA</h1>
        <div class="user">
            <a class="logout" href="../services/logout.php">Logout</a>
        </div>
    </header>

    <div class="profile_container">
        <div class="prof">
            <div class="con"><h1>User Name:</h1> <h2><?= $_SESSION['user'] ?></h2></div>
            <div class="con"><h1>Role:</h1><h2><?= $_SESSION['role'] ?></h2></div>
            <div class="con"><h1>Email:</h1><h2><?= $_SESSION['email'] ?></h2></div>
            
        </div>
    </div>
</body>
</html>