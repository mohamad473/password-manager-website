<?php

include "connection.php";
$name = $_POST['name'];
$uid = $_GET['uid'];

$sql  = "SELECT * FROM accounts WHERE userID = $uid AND (sitename LIKE '$name%' OR email like '$name%')";
$result = mysqli_query($conn, $sql);
$data = '';
$i = 1;


while ($row = mysqli_fetch_assoc($result)){
    $data .= "<tr>
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

echo $data;

?>