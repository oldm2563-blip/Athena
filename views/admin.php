<?php
    require __DIR__ . "/../services/session.php";
    require __DIR__ . "/../services/amounts.php";
    require __DIR__ . "/../services/projects.php";
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
    flex-wrap: wrap;
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
</style>
<body>
    <header>
        <h1>ATHENA</h1>
        <div class="user">
            <?php echo '<a class="prof" href="profile.php">' . $_SESSION['user'] . '</a>' ?>
            <a class="logout" href="../services/logout.php">Logout</a>
        </div>
    </header>
    <div class="dov">
        <section class="amount_container">
        <div class="box">
            <h1>Member Amount</h1>
            <h2><?= $mmm['amount'] ?></h2>
        </div>
        <div class="box">
            <h1>Project amount</h1>
            <h2><?= $pmm['amount'] ?></h2>
        </div>
        <div class="box">
            <h1>Sprint amount</h1>
            <h2><?= $ssmm['amount'] ?></h2>
        </div>
        <div class="box">
            <h1>tasks amount</h1>
            <h2><?= $ttm['amount'] ?></h2>
        </div>
    </section>
    </div>
    <div class="hh"><div class="title"><h1>Projects</h1> <a id="manage" hidden href="manage.php">Project Mangement</a><a id="member" hidden href="zone.php">Members Zone</a></div></div>
    
    
    <div class="project_container">
        <?php foreach($output as $out): ?>
        <div class="box2">
            <div class="btn"><h2><?= $out['project_name'] ?></h2><a href="../services/activepr.php?id=<?= $out['project_id'] ?>" <?php if($out['is_active'] == 1){echo 'hidden';} ?>>Activate</a> <a href="../services/desactivepr.php?id=<?= $out['project_id'] ?>" <?php if($out['is_active'] == 0){echo 'hidden';} ?>>Desactivate</a></div>
            <div class="creation">
                <h4>by: <?= $out['username'] ?></h4>
                <h4>created at: <?= date("F j, Y", strtotime($out['created_at'])) ?></h4>
            </div>

        </div>
        <?php endforeach ?>
    </div>
</body>
</html>