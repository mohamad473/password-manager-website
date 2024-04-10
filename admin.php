<?php 
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <h1>Password Managment System</h1>
                <p>ADMIN PANEL</p>
            </div>
            <div class="menu">
                <ul>
                    <div class="item">
                        <i class="fa-solid fa-layer-group"></i>
                        <li> <a href="admin.php">Dashboard</a></li>
                    </div>
                    <div class="item">
                        <i class="fa-solid fa-plus"></i>
                        <li><a href="admin_members.php">Add Members</a></li>
                    </div>
                    <div class="item">
                        <i class="fa-solid fa-user-group"></i>
                        <li><a href="admin_list_members.php">List Members</a></li>
                    </div>
                </ul>
            </div>
            <div class="account">
                <div class="last-item">
                    <i class="fa-solid fa-user-tie admin-pos"></i>
                    <p><?php if(isset($_GET['username'])){
                        echo $_SESSION['username'];
                    }?></p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="dropdown-list">
                    <p><a href="index.php">LogOut</a></p>
                </div>
            </div>
        </header>
    </div>

    <div class="content">
        <div class="head-section">
            <h1>Dashboard</h1>
            <p>Welcome Adminstrator</p>
        </div>

        <div class="main">
            <div class="title">
                <i class="fa-solid fa-user-group"></i>
                <h2>Members</h2>
            </div>
            <div class="statistics">
                <span class="mem-num">
                    
                    <?php 
                    $sql = "SELECT * FROM `users`";
                    $result = mysqli_query($conn, $sql);
                    $count_user = mysqli_num_rows($result);
                    echo $count_user - 1;?>
                </span>
                <p>Active</p>
            </div>

        </div>
    </div>
</body>
</html>


