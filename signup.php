<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Form | CodingLab</title> 
    <link rel="stylesheet" href="signup-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
  </head>
  <body>
    <div class="main-container">
        <div class="container">
            <div class="wrapper">
                <div class="title"><span>SignUp</span></div>
                <form action="signup-script.php" method="POST">
                    <?php if(isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error'];?></p>
                    <?php } ?>
                    <div class="row">     
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="UserName" name="uname" value="<?php if(isset($_GET['uname'])){ 
             echo $_GET['uname'];
            } ?>">
                    </div>
                    <div class="row">
                       <i class="fa-solid fa-envelope"></i>
                        <input type="text" placeholder="Email" name="email" value="<?php if(isset($_GET['email'])){ 
             echo $_GET['email'];
            } ?>">
                    </div>
                    <div class="row">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="pass" value="<?php if(isset($_GET['password'])){ 
             echo $_GET['password'];
            } ?>">
                    </div>
                    <div class="row button">
                        <input type="submit" value="SignUp" name="submit">
                    </div>
                    <div class="signup-link">Go to  <a href="index.php">Login</a></div>
                </form>
            </div>
        </div>
    </div>
    <div class="cover">
    </div>
  </body>
</html>
</body>
</html>

