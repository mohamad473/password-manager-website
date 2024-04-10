<?php 
session_start();

if(isset($_SESSION['userID']) && isset($_SESSION['username'])){


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="member-passwords-style.css">
    <script src="
https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js
"></script>

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
                <h1>Passwords</h1>
                <div class="bar">
                    <p>Your Accounts</p>
                    <div class="right-side">
                        <i class="fa-solid fa-circle-plus"></i>
                        <a href="member_add_new_password.php?uid=<?php echo $_GET['uid'];?>">Add New</a>
                    </div>
                </div>
            </div>

            <div class="search">
                <input type="text" placeholder="Search" id="getName">
            </div>
            <div class="list">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SiteName</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody  id=showdata>
                    <?php
                    include "connection.php";
                    if(isset($_GET['uid'])){
                        $uid = $_GET['uid'];
                        $sql ="SELECT * FROM `accounts` WHERE userID=$uid";
;
                        $result = mysqli_query($conn, $sql);
                        $count_user = mysqli_num_rows($result);
                        $i = 1; 
                           
                            while ($row = mysqli_fetch_assoc($result)){
                                 echo "<tr>
                                     <td>{$i}</td>
                                     <td>{$row['sitename']}</td>
                                     <td>{$row['email']}</td>
                                     <td>{$row['password']}</td>
                                    <td>
                                    <div class="."buttons".">
                                        <a href="."edit_member_password.php?updateid={$row['accountID']}&uid={$row['userID']}".">Edit</a>
                                        <a href="."delete_member_password.php?deleteid={$row['accountID']}&uid={$row['userID']}".">Delete</a>
                                    </div>
                                    </td>
                                    </tr>";
                                    $i++;
                            }
                        }
                        
                    ?>

                </tbody>
            </table>
        </div>
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

    <script>
        $(document).ready(function(){
            $('#getName').on("keyup", function(){
                var getName = $(this).val();
                $.ajax({
                    method:'POST',
                    url:'searchajax.php?uid=<?php if(isset($_GET['uid'])){echo $_GET['uid'];}?>',
                    data:{name:getName},
                    success:function(response){
                        $('#showdata').html(response);
                    }
                })
            });
        });
    </script>
</body>
</html>

<?php 
}else {
    header("Location:index.php");
    exit();
}
?>