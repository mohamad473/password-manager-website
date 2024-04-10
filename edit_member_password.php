<?php 
session_start();

if(isset($_SESSION['userID']) && isset($_SESSION['username'])){


?>

<?php
include "connection.php";
if(isset($_POST['cancel'])){
    if(isset($_GET['uid'])){

    
    header("Location:member_passwords.php?uid={$_GET['uid']}");
    }
}else{
    $aid = $_GET['updateid'];
    $sql= "SELECT * FROM `accounts` WHERE accountID = $aid";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $sitename=$row['sitename'];
    $email=$row['email'];
    $password=$row['password'];
    

    if(isset($_POST['submit'])){
        $sname = $_POST['sitename'];
        $eemail = $_POST['email'];
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        $query = "UPDATE `accounts` SET sitename='$sname', email='$eemail', `password`='$pass' WHERE accountID='$aid'";
        
        $result = mysqli_query($conn,$query);
        
        if ($result)
            header("location:member_passwords.php?uid={$_GET['uid']}");
        else
            die(mysqli_error($con));
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="edit-member-password-style.css">
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
                <h1>Edit Account</h1>
            </div>
            <div class="main-container">
                <div class="wrapper">
                    <form  method="POST" action=" <?php echo("edit_member_password.php?updateid={$_GET['updateid']}&uid={$_GET['uid']}")?>">
                        <?php if(isset($_GET['error'])){ ?>
                        <p class="error"><?php echo $_GET['error'];?></p>
                        <?php } ?>
                        <div class="row">     
                            <i class="fas fa-user"></i>
                            <input class="field" type="text" placeholder="SiteName" name="sitename" value="<?php if(isset($_GET['updateid'])){ 
                echo $sitename;
                } ?>">
                        </div>
                        <div class="row">
                        <i class="fa-solid fa-envelope"></i>
                            <input class="field" type="text" placeholder="Email" name="email" value="<?php if(isset($_GET['updateid'])){ 
                echo $email;
                } ?>">
                        </div>
                        <div class="row">
                            <i class="fas fa-lock"></i> 
                            <input class="field" type="password" placeholder="Password" name="pass" value="<?php if(isset($_GET['updateid'])){ 
                echo $password;
                } ?>">
                        </div>
                        <div class="action">
                            <div class="row button">
                                <input type="submit" value="Save" name="submit">
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
    if(isset($_GET['uid'])){
         header("Location:member_passwords.php?&uid={$_GET['uid']}");
           exit();
    }
   
  
}
?>