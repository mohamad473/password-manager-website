<?php 
session_start();
include "connection.php";

    if(isset( $_POST['email']) && isset($_POST['pass'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['uname']);
        $email = validate($_POST['email']);
        $pass = validate($_POST['pass']);

        if((empty($uname) && empty($email) && empty($pass)) || (empty($email) && empty($pass)) || (empty($uname) && empty($email)) || (empty($uname) && empty($pass))){
             header("Location: signup.php?error=Please Fill All The Fields");
             exit();
        }else if(empty($email)){
            header("Location: signup.php?error=Email is Required");
             exit();
        }else if(empty($pass)){
            header("Location: signup.php?error=Password is Required");
            exit();
        }else if(empty($uname)){
            header("Location: signup.php?error=UserName is Required");
            exit();
        }else{
            $sql = "SELECT * FROM `users` WHERE `username`='$uname'";
            $result = mysqli_query($conn, $sql);
            $count_user = mysqli_num_rows($result);
            
            $ssql = "SELECT * FROM `users` WHERE `email`='$email'";
            $result = mysqli_query($conn, $ssql);
            $count_email = mysqli_num_rows($result);


            if($count_user == 0 && $count_email == 0){


                if(strpos($email, "@")){
                    
                    if(strlen($pass) >= 8){
                        if(!ctype_upper($row['password']) && !ctype_lower($row['password'])){
                            $hash = password_hash($pass, PASSWORD_DEFAULT);
                            $sql = "INSERT INTO `users`(username, email, password) VALUES('$uname', '$email', '$hash')";
                            $result = mysqli_query($conn, $sql);

                            $result = mysqli_query($conn, $ssql);
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['userID'] = $row['userID'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['email'] = $row['email'];

                            if($result){
                                header("Location: member.php?uid={$row['userID']}");
                            }
                        }else {
                             header("Location: signup.php?error=Weak Password&email=$email&uname=$uname");
                        }
                    }else {
                             header("Location: signup.php?error=Your password should be more than 8 characters&email=$email&uname=$uname");
                    }
                    

                }else {
                    header("Location: signup.php?error=Your Email is wrong&email=$email&password=$pass&uname=$uname");
                }
                
            }else{
                if($count_user > 0){
                    header("Location: signup.php?error=Username Already Exist&email=$email&password=$pass");
                    exit();
                }

                if($count_email > 0 ){
                     header("Location: signup.php?error=Email Already Exist&uname=$uname&password=$pass");
                    exit();
                }
            }
        }
    }else {
        header("Location: signup.php");
        exit();
    }

?>