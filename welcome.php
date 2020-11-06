<?php
require "database.php";
?>
<html>

<head>
</head>

<body>
    <?php
    session_start();
    $query = "SELECT * FROM users WHERE email = '$_SESSION[email]'";
    $sql = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($sql)) {
        $id = $row['id'];
        $logined_name = $row['name'];
        $logined_username = $row['username'];
        $logined_email = $row['email'];
        $logined_password = $row['password'];
        $logined_gender = $row['gender'];
        $logined_browser = $row['browser'];
        $logined_age = $row['age'];
    ?>
        <h1><?php echo $logined_name ?></h1>
        <table>
            <tr>
                <th style="text-align:left">Username:</th>
                <td><?php echo $logined_username ?></td>
            </tr>
            <tr>
                <th style="text-align:left">E-mail:</th>
                <td><?php echo $logined_email ?></td>
            </tr>
            <th style="text-align:left">Password:</th>
            <td>***</td>
            <td><a href="passwordUpdate.php?id=<?php echo $id; ?>">edit</a></td>
            </tr>
            <tr>
                <th style="text-align:left">Gender:</th>
                <td><?php echo $logined_gender ?></td>
                <td><a href="genderUpdate.php?id=<?php echo $id; ?>">edit</a></td>
            </tr>
            <tr>
                <th style="text-align:left">Browser:</th>
                <td><?php echo $logined_browser ?></td>
                <td><a href="browserUpdate.php?id=<?php echo $id; ?>">edit</a></td>
            </tr>
            <tr>
                <th style="text-align:left">Age:</th>
                <td><?php echo $logined_age ?></td>
                <td><a href="ageUpdate.php?id=<?php echo $id; ?>">edit</a></td>
            </tr>
        </table>
    <?php } ?>
    <div>
        <p><a href="chat.php">Chat</a></p>
    </div>

    <br>
    <div>
        <p><a href="logout.php">Log Out</a></p>
    </div>
</body>

</html>