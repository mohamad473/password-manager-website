<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="admin-list-members-style1.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
 <style>
    .content .form {
  height: 60vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.content .form form {
  background: red;
  width: 100%;
  height: 100%;
}

.main-container {
  background-color: #f4f2f2;
  width: 100%;
  height: 60vh;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  display: flow-root;
  border-radius: 10px;
}

.wrapper form .row .field {
  width: 60%;
  height: 20px;
  background: #e0dede;
  justify-content: center;
  display: flex;
  margin: 20px auto;
  padding: 10px;
  border: none;
  outline: none;
  border-radius: 5px;
}

.wrapper {
  margin-top: 60px;
}

.content .main-container i {
  position: relative;
  left: 290px;
  top: 50px;
  font-size: large;
}

.action {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  margin-top: 80px;
  margin-right: 100px;
}

.action .row input {
  width: 100px;
  height: 40px;
  margin-left: 40px;
  background: hsla(0, 76%, 52%, 0.754);
  color: white;
  font-size: large;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  transition: 0.4s ease-in-out;
}

.action .row input:hover {
  background-color: #e0dede;
  color: black;
}

.error {
  background: #f2dede;
  color: #a94442;
  padding: 10px;
  width: 85%;
  border-radius: 5px;
  margin: 20px auto;
}

 </style>

 <?php
include "connection.php";
if(isset($_POST['cancel'])){
    header("Location:admin_list_members.php");
}else{
    $uid = $_GET['updateid'];
    $sql= "SELECT * FROM `users` WHERE userID = $uid";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $username=$row['username'];
    $emailadd=$row['email'];
    $password=$row['password'];
    $role=$row['role'];

    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $query = "UPDATE `users` SET userID = '$uid', username='$uname', email='$email', `password`='$hash', `role`='$role' WHERE userID=$uid";
        
        $result = mysqli_query($conn,$query);
        
        if ($result)
            header('location:admin_list_members.php');
        else
            die(mysqli_error($con));
    }
}
?> 
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
            <h1>Edit Member</h1>
        </div>
        <div class="main-container">
            <div class="wrapper">
                <form  method="POST" action=" <?php echo("edit_member.php?updateid={$_GET['updateid']}")?>">
                    <?php if(isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error'];?></p>
                    <?php } ?>
                    <div class="row">     
                        <i class="fas fa-user"></i>
                        <input class="field" type="text" placeholder="UserName" name="uname" value="<?php if(isset($_GET['updateid'])){ 
             echo $username;
            } ?>">
                    </div>
                    <div class="row">
                       <i class="fa-solid fa-envelope"></i>
                        <input class="field" type="text" placeholder="Email" name="email" value="<?php if(isset($_GET['updateid'])){ 
             echo $emailadd;
            } ?>">
                    </div>
                    <div class="row">
                        <i class="fas fa-lock"></i> 
                        <input class="field" type="text" placeholder="New Password" name="pass">
                    </div>
                     <div class="row">
                        <i class="fas fa-lock"></i> 
                        <input class="field" type="text" placeholder="Role" name="role" value="<?php if(isset($_GET['updateid'])){ 
             echo $role;
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
</body>
</html>

<!-- What is the most sought after activites in the world sought after activites in the world sought after acivities in the world soguht after activities in the world sought after activitites in the wrold sought afte r -->