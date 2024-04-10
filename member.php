<?php 
session_start();

if(isset($_SESSION['userID']) && isset($_SESSION['username'])){


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="member-style.css">
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
                <h1>Dashboard</h1>
                <p>Welcome <?php echo $_SESSION['username']; ?></p>
            </div>
            <div class="info">
                <div class="title">
                    <i class="fa-solid fa-shield-halved"></i>
                    <h2>Stored Passwords</h2>
                </div>
                <div class="statistics">
                    <div class="item">
                        <span class="total">
                            <?php include "connection.php";
                            if(isset($_GET['uid'])){
                            $sql ="SELECT * FROM `accounts` WHERE userID= {$_GET['uid']}";
                            $result = mysqli_query($conn, $sql);
                            $count_account = mysqli_num_rows($result);
                            echo $count_account;
                            }
                            ?>
                        </span>
                        <p>Total</p>
                    </div>
                    <div class="item">
                        <span class="strong">
                            <?php
                                $count = 0;
                                while($row = mysqli_fetch_assoc($result)){
                                    if(strlen($row['password']) >= 8){
                                        if(!ctype_upper($row['password']) && !ctype_lower($row['password'])){
                                            $count++;
                                        }
                                    }
                                }
                                echo $count;
                            ?>
                        </span>
                        <p>Strong</p>
                    </div>
                    <div class="item">
                        <span class="weak">
                            <?php
                                echo $count_account - $count;
                            ?>
                        </span>
                        <p>Weak</p>
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