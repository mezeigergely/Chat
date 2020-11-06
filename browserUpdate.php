<?php
require "database.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM users WHERE id='" . $id . "'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $upBrowser = $_POST['upbrowser'];
    $queryUpdate = "UPDATE users SET browser = '$upBrowser' WHERE id = '$id'";
    $sql = mysqli_query($connection, $queryUpdate);
    header("location: welcome.php");
}
?>

<div>
    <h1><?php echo $row['name']; ?> / Browser Update</h1>
    <form name="form" method="post" action="">
        <p><b>Current Browser: </b><?php echo $row['browser']; ?></p>
        <p><b>New Gender: </b><br>
            <input type="checkbox" id="chrome" name="upbrowser" value="chrome">
            <label for="browser">Chrome</label><br>
            <input type="checkbox" id="mozilla" name="upbrowser" value="mozilla">
            <label for="mozilla">Mozilla</label><br>
            <input type="checkbox" id="other" name="upbrowser" value="other">
            <label for="other">Other</label><br>
        </p>
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