<?php
require "database.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $browser = $_POST['browser'];
    $age = $_POST['age'];

    $sql_u = "SELECT * FROM users WHERE username='$username'";
    $sql_e = "SELECT * FROM users WHERE email='$email'";
    $res_u = mysqli_query($connection, $sql_u);
    $res_e = mysqli_query($connection, $sql_e);

    if (mysqli_num_rows($res_u) > 0 || mysqli_num_rows($res_e) > 0) {
        echo "User already exist!";
    } else {
        $queryReg = "INSERT INTO users (name, username, email, password, gender, browser, age) 
        VALUES ('$name','$username','$email','$hashed_password','$gender','$browser','$age')";
        $sqlReg = mysqli_query($connection, $queryReg);

        echo "Registration completed!";
    }
}

?>

<div>
    <form name="login" method="post" action="">
        <h1>Sign up</h1>
        <p>
            <label for="name">Name:</label>
            <input id="name" name="name" required="required" type="text" placeholder="" />
        </p>
        <p>
            <label for="username">Username:</label>
            <input id="username" name="username" required="required" type="text" placeholder="" />
        </p>
        <p>
            <label for="email">E-mail:</label>
            <input id="email" name="email" required="required" type="email" placeholder="" />
        </p>
        <p>
            <label for="password">Password: </label>
            <input id="password" name="password" required="required" type="password" placeholder="" />
        </p>
        <p>
            <p>Please select your gender:</p>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label>
        </p>
        <p>
            <p>Which browser do you prefer?</p>
            <input type="checkbox" id="chrome" name="browser" value="chrome">
            <label for="browser">Chrome</label><br>
            <input type="checkbox" id="mozilla" name="browser" value="mozilla">
            <label for="mozilla">Mozilla</label><br>
            <input type="checkbox" id="other" name="browser" value="other">
            <label for="other">Other</label><br>
        </p>

        <p>
            <label for="age">How old are you?</label>
            <select name="age" id="age">
                <option value="1-18">1-18</option>
                <option value="19-29">19-29</option>
                <option value="30-59">30-59</option>
                <option value="60">60-</option>
            </select>
        </p>
        <p>
            <input type="submit" name="submit" value="Sign up" />
        </p>
        <p>
            Already a member?
            <a href="login.php">Login</a>
        </p>
    </form>
</div>