<?php 
session_start();
include "connection.php";

    if(isset($_POST['email']) && isset($_POST['pass'])){
        
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $email = validate($_POST['email']);
        $pass = validate($_POST['pass']);

        if(empty($email) && empty($pass)){
             header("Location: index.php?error=Enter Your Login Info");
             exit();
        }else if(empty($email)){
            header("Location: index.php?error=Email is Required");
             exit();
        }else if(empty($pass)){
            header("Location: index.php?error=Password is Required");
            exit();
        }else{
            
            if(!strpos($email, "@")){
                header("Location: index.php?error=Incorrect Email Address");
            }else{
            $sql = "SELECT * FROM `users` WHERE `email`='$email'";
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result)){
                $row = mysqli_fetch_assoc($result);
                if($row['email'] === $email && password_verify($pass, $row['password'])){
                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];

                    if($row['role'] === 'admin' || $row['role'] === 'Admin'){
                        header("Location: admin.php");
                    }else {
                        header("Location: member.php?uid={$row['userID']}");
                    }
                    
                }else {
                   header("Location: index.php?error=Incorrect Email Or Password");
                   exit();
                echo "";
                }

            }else {
                 header("Location: index.php?error=Incorrect Email Or Password");
                exit();
            }
        }
        }
        
    }else {
        header("Location: index.php");
        exit();
    }

?>