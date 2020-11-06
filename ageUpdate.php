<?php
require "database.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM users WHERE id='" . $id . "'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $upAge = $_POST['upAge'];
    $queryUpdate = "UPDATE users SET age = '$upAge' WHERE id = '$id'";
    $sql = mysqli_query($connection, $queryUpdate);
    header("location: welcome.php");
}
?>

<div>
    <h1><?php echo $row['name']; ?> / Age Update</h1>
    <form name="form" method="post" action="">
        <p><b>Current Age: </b><?php echo $row['age']; ?></p>
        <p><b>New Age: </b>
            <select name="upAge" id="age">
                <option value="1-18">1-18</option>
                <option value="19-29">19-29</option>
                <option value="30-59">30-59</option>
                <option value="60">60-</option>
            </select>
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