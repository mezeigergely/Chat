<?php
require "database.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM users WHERE id='" . $id . "'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $upGender = $_POST['upgender'];
    $queryUpdate = "UPDATE users SET gender = '$upGender' WHERE id = '$id'";
    $sql = mysqli_query($connection, $queryUpdate);
    header("location: welcome.php");
}
?>

<div>
    <h1><?php echo $row['name']; ?> / Gender Update</h1>
    <form name="form" method="post" action="">
        <p><b>Current Gender: </b><?php echo $row['gender']; ?></p>
        <p><b>New Gender: </b><br>
            <input type="radio" id="male" name="upgender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="upgender" value="female">
            <label for="female">Female</label><br>
            <input type="radio" id="other" name="upgender" value="other">
            <label for="other">Other</label>
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