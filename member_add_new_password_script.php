<?php 
session_start();
include "connection.php";

    if(isset($_POST['cancel'])){
        header("Location: member_passwords.php?uid={$_GET['uid']}");
    }else if(isset( $_POST['email']) && (isset($_POST['pass']) && isset($_POST['sitename']))){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $sitename = validate($_POST['sitename']);
        $email = validate($_POST['email']);
        $pass = validate($_POST['pass']);
        $userid = $_GET['uid'];

        if((empty($sitename) && empty($email) && empty($pass)) || (empty($email) && empty($pass)) || (empty($sitename) && empty($email)) || (empty($sitename) && empty($pass))){
             header("Location: member_add_new_password.php?error=Please Fill All The Fields&uid={$_GET['uid']}");
             exit();
        }else if(empty($email)){
            header("Location: admin_members.php?error=Email is Required&uid={$_GET['uid']}");
             exit();
        }else if(empty($pass)){
            header("Location: admin_members.php?error=Password is Required&uid={$_GET['uid']}");
            exit();
        }else if(empty($sitename)){
            header("Location: admin_members.php?error=sitename is Required&uid={$_GET['uid']}");
            exit();
        }else{

            $uqery = "SET FOREIGN_KEY_CHECKS=0";
            $uresult = mysqli_query($conn, $uqery);
            if($uresult){
                $sql = "INSERT INTO `accounts`(sitename, email, password, userID) VALUES('$sitename', '$email', '$pass', '$userid')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $done = "SET FOREIGN_KEY_CHECKS=1";
                    $dresult = mysqli_query($conn, $done);
                    header("location:member_passwords.php?uid={$_GET['uid']}");
                }else{
                    die(mysqli_error($con));
                }
            }
        }
    }else {
        header("Location: member_passwords.php?uid={$_GET['uid']}");
        exit();
    }

?>