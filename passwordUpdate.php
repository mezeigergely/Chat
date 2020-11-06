<?php
require "database.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM users WHERE id='" . $id . "'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $updatedPassword = $_POST['updatedPassword'];
    $hashed_password = password_hash($updatedPassword, PASSWORD_DEFAULT);
    $queryUpdate = "UPDATE users SET password = '$hashed_password' WHERE id = '$id'";
    $sql = mysqli_query($connection, $queryUpdate);
    header("location: welcome.php");
}
?>

<div>
    <h1><?php echo $row['name']; ?> / Password Update</h1>
    <form name="form" method="post" action="">
        <p><b>New Password: </b><input type="text" name="updatedPassword"></p>
        <p><input name="submit" type="submit" value="Update" /></p>
    </form>
</div>
<br>
<br>
<br>
<br>
<div>
    <p><a href="welcome.php">Back</a></p>
</div>