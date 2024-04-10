<?php
 include "connection.php";
 if(isset($_GET['deleteid'])){
        $aid=$_GET['deleteid'];
        $uqery = "SET FOREIGN_KEY_CHECKS=0";
        $uresult = mysqli_query($conn, $uqery);
        if($uresult){
        $sql="DELETE FROM `accounts` WHERE accountID='$aid'";
        $result=mysqli_query($conn,$sql);
        if($result){
            $done = "SET FOREIGN_KEY_CHECKS=1";
            $dresult = mysqli_query($conn, $done);
            header("location:member_passwords.php?uid={$_GET['uid']}");
        }else{
            die(mysqli_error($con));
        }
    }
}
    ?> 