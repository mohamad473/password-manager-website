<?php 
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin-member-style.css">
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
                    <p>Adminstrator</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="dropdown-list">
                    <p><a href="index.php">LogOut</a></p>
                </div>
            </div>
        </header>
    </div>
    <div class="content">
        <div class="title">
            <h1>New Member</h1>
        </div>
        <div class="main-container">
            <div class="wrapper">
                <form action="admin_members_script.php" method="POST">
                    <?php if(isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error'];?></p>
                    <?php } ?>
                    <div class="row">     
                        <i class="fas fa-user"></i>
                        <input class="field" type="text" placeholder="UserName" name="uname" value="<?php if(isset($_GET['uname'])){ 
             echo $_GET['uname'];
            } ?>">
                    </div>
                    <div class="row">
                       <i class="fa-solid fa-envelope"></i>
                        <input class="field" type="text" placeholder="Email" name="email" value="<?php if(isset($_GET['email'])){ 
             echo $_GET['email'];
            } ?>">
                    </div>
                    <div class="row">
                        <i class="fas fa-lock"></i> 
                        <input class="field" type="password" placeholder="Password" name="pass" value="<?php if(isset($_GET['password'])){ 
             echo $_GET['password'];
            } ?>">
                    </div>
                    <div class="action">
                        <div class="row button">
                            <input type="submit" value="Save" name="save">
                        </div>
                        <div class="row button">
                            <input type="submit" value="Cancel" name="cancel">
                        </div>
                    </div>
                </form>
            </div>
        </div>
         <div class="cover"></div>
    </div>
</body>
</html>