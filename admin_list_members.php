<?php 
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin-list-members-style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
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
            <h1>Members List</h1>
        </div>
        <div class="list">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql ='SELECT * FROM `users` WHERE role = "user"';
;
                        $result = mysqli_query($conn, $sql);
                        $count_user = mysqli_num_rows($result);
                        $i = 1; 
                           
                            while ($row = mysqli_fetch_assoc($result)){
                                 echo "<tr>
                                     <td>{$i}</td>
                                     <td>{$row['username']}</td>
                                     <td>{$row['email']}</td>
                                     <td>{$row['role']}</td>
                                    <td>
                                    <div class="."buttons".">
                                        <a href="."edit_member.php?updateid={$row['userID']}".">Edit</a>
                                        <a href="."delete_member.php?deleteid={$row['userID']}".">Delete</a>
                                    </div>
                                    </td>
                                    </tr>";
                                    $i++;
                            }
                        
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>


