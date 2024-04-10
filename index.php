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
    <link rel="stylesheet" href="index-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="main-container">
        <div class="container">
            <div class="wrapper">
                <div class="title"><span>Login</span></div>
                <form action="login_script.php" method="POST">
                    <?php if(isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error'];?></p>
                    <?php } ?>
                <div class="row">
                    
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Email" name="email">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="pass">
                </div>
                <div class="row button">
                    <input type="submit" value="Login" name="submit">
                </div>
                <div class="signup-link">Not a member? <a href="signup.php">Signup now</a></div>
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