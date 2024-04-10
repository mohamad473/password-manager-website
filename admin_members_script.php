<?php 
session_start();
include "connection.php";

    if(isset($_POST['cancel'])){
        header("Location: admin.php");
    }else if(isset( $_POST['email']) && (isset($_POST['pass']) && isset($_POST['uname']))){

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
             header("Location: admin_members.php?error=Please Fill All The Fields");
             exit();
        }else if(empty($email)){
            header("Location: admin_members.php?error=Email is Required");
             exit();
        }else if(empty($pass)){
            header("Location: admin_members.php?error=Password is Required");
            exit();
        }else if(empty($uname)){
            header("Location: admin_members.php?error=UserName is Required");
            exit();
        }else{
            $sql = "SELECT * FROM `users` WHERE `username`='$uname'";
            $result = mysqli_query($conn, $sql);
            $count_user = mysqli_num_rows($result);
            
            $sql = "SELECT * FROM `users` WHERE `email`='$email'";
            $result = mysqli_query($conn, $sql);
            $count_email = mysqli_num_rows($result);


            if($count_user == 0 && $count_email == 0){
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users`(username, email, password) VALUES('$uname', '$email', '$hash')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    header("Location: admin_list_members.php");
                }
            }else{
                if($count_user > 0){
                    header("Location: admin_members.php?error=Username Already Exist&email=$email&password=$pass");
                    exit();
                }

                if($count_email > 0 ){
                     header("Location: admin_members.php?error=Email Already Exist&uname=$uname&password=$pass");
                    exit();
                }
            }
        }
    }else {
        header("Location: admin.php");
        exit();
    }

?>