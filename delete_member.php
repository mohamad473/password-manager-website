 <?php
 include "connection.php";
 if(isset($_GET['deleteid'])){
        $uid=$_GET['deleteid'];
        $uqery = "SET FOREIGN_KEY_CHECKS=0";
        $uresult = mysqli_query($conn, $uqery);
        if($uresult){
        $sql="DELETE FROM users WHERE userID='$uid'";
        $result=mysqli_query($conn,$sql);
        if($result){
            $done = "SET FOREIGN_KEY_CHECKS=1";
            $dresult = mysqli_query($conn, $done);
            header('location:admin_list_members.php');
        }else{
            die(mysqli_error($con));
        }
    }
}
    ?> 