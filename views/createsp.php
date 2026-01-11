<?php
    require __DIR__ . "/../services/session.php";
    require __DIR__ . "/../services/amounts.php";
    require __DIR__ . "/../services/createsp.php";
    require __DIR__ . "/../services/createsp.php";
?>
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
.user{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 20px;
    height: 30px;
}
.user h3{
    color: white;
}

.amount_container{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 90px;
}
.box{
    background-color: #5E6AD2;
    width: 400px;
    padding: 50px;
    margin: 20px;
    border-radius: 10px;
    border: 1px solid #30373f;
    transition: transform 0.3s ease-in-out;
}
.box h1{
    text-align: center;
}
.box h2{
    color: white;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 50px;
    margin: 10px;
    text-align: center;
}
.dov::after{
    content: ""; 
    width: 90%;
    display: block;
    bottom: 10px; 
    left: 0;
    right: 0;
    height: 1px; 
    background-color:#d6a24f; 
    margin: 0 auto;
}
.dov h1{
    margin: 0;
    margin-left: 20px;
    color: white;
    font-weight: light;
    text-decoration: underline #d6a24f;
}
.project_container{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.creation{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.box2{
    background-color: #4F46E5;
    width: 400px;
    padding: 50px;
    margin: 20px;
    border-radius: 10px;
    color: white;
    border: 1px solid #30373f;
    transition: transform 0.3s ease-in-out;
}
.box2 h2{
    color: white;
    text-decoration: underline #d6a24f;
}
.hh{
    display: flex;
    justify-content: center;
}
.title{
    text-align: center;
    margin-top: 20px;
    display: flex;
    align-items: center;
    gap: 20px;
}
.title a{
    color: #d6a24f;
    background-color: #30373f;
    padding: 10px;
    border-radius: 10px;
}
.box2:hover{
    transform: scale(1.1) ;
}
.box:hover{
    transform: scale(0.9);
}
.prof{
    color: #d6a24f;
    text-decoration: none;
    font-weight: bold;
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
section{
    height: 90vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
select{
    background: none;
    border: none;
    border-bottom: 2px solid #d6a24f;
    padding: 10px 5px 5px 5px;
    font-size: 16px;
    outline: none;
    transition: border-color .3s;
    color: grey;
}
.fix{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}
</style>
<body>
      <header>
        <h1>ATHENA</h1>
        <div class="user">
            <?php echo '<a class="prof" href="profile.php">' . $_SESSION['user'] . '</a>' ?>
            <a class="logout" href="../services/logout.php">Logout</a>
        </div>
    </header>
<section>
    <form action="" method="POST">
        <div>
            <input type="text" placeholder=" " name="sprint" require>
            <label for="Project">Sprint name</label>
        </div>
        <div>
            <input type="date" placeholder=" " name="start" require>
            <label for="Project">Start Date</label>
        </div>
        <div>
            <input type="date" placeholder=" " name="end" require>
            <label for="Project">End Date</label>
        </div>
        <div class="fix"><input type="submit" value="Create"><a href="viewpr.php?id=<?= $_GET['id'] ?>" class="logout">Cancel</a></div>
    </form>
</section>
</body>
</html>