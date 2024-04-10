<?php 
session_start();

if(isset($_SESSION['userID']) && isset($_SESSION['username'])){

    function random_password(){
        $lower_case = "abcdefghijklmnopqrstuvwxyz";
        $upper_case = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $digits = "1234567890";
        $symbols = "!@#$%^&*()_-+=}{:;'?/.,|";
        
        $lower_case = str_shuffle($lower_case);
        $upper_case = str_shuffle($upper_case);
        $digits = str_shuffle($digits);
        $symbols = str_shuffle($symbols);

        $random_characters = 3;

        $random_password = substr($lower_case, 0 , $random_characters);
        $random_password .= substr($upper_case, 0 , $random_characters);
        $random_password .= substr($digits, 0 , $random_characters);
        $random_password .= substr($symbols, 0 , $random_characters);

        return str_shuffle($random_password);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="member-generate-style.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="main">
                <h1>Password Manager</h1>
            </div>
            <div class="nav">
                <i class="fa-solid fa-user-tie admin-pos"></i>
                <h1><?php echo $_SESSION['username']; ?></h1>
                <div class="dropdown">
                    <a href="index.php">LogOut</a>
                </div>
            </div>
        </header>

        <div class="content">
            <div class="section">
                <h1>Password Generator</h1>
                <p>Generate Stronger Passwords</p>
            </div>
            <div class="info">
                <div class="main-container">
                     <h2>Start Generating Strong Passwords</h2>
                    <div class="wrapper">
                        <form action="member_generate.php?uid=<?php echo $_GET['uid'];?>" method="POST">
                            <div class="row">
                                <i class="fa-solid fa-gears"></i>
                                <input class="field" type="text" name="gen" value="<?php
                                if(isset($_POST['submit'])){
                                    echo random_password();
                                } ?>">
                            </div>
                            <div class="action">
                                <div class="row button">
                                    <input type="submit" value="Generate" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <h1>Panel</h1>
        <div class="list">
            <div class="row">
            <i class="fa-solid fa-layer-group"></i>
            <a href="member.php?uid=<?php if(isset($_GET['uid'])){echo $_GET['uid'];}?>">Dashboard</a>
            </div>
            <div class="row">
            <i class="fa-solid fa-key"></i>
            <a href="member_passwords.php?uid=<?php if(isset($_GET['uid'])){echo $_GET['uid'];}?>">Passwords</a>
            </div>
            <div class="row">
               <i class="fa-solid fa-flag"></i>
            <a href="member_generate.php?uid=<?php if(isset($_GET['uid'])){echo $_GET['uid'];}?>">Password Generator</a>
            </div>
        </div>
    </div>
</body>
</html>


<?php 
}else {
    header("Location:index.php");
    exit();
}
?>