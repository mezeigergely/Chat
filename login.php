<?php
require "database.php";
$db = OpenCon();

if (isset($_SESSION['id'])) {
    header('location:index.php');
}

if (isset($_POST['submit'])) {
    $errors = array();
    $true = true;
    if (empty($_POST['email'])) {
        $true = false;
        array_push($errors, "The email is empty");
    }
    if (empty($_POST['password'])) {
        $true = false;
        array_push($errors, "The password is empty");
    }
    if ($true) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $query = "SELECT * FROM users WHERE email = '$email'";
        $sql = mysqli_query($db, $query);
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_array($sql);
            $passwordHash = $row['password'];
            if (password_verify($password, $passwordHash)) {
                $sub_query = "INSERT INTO login_details (user_id) VALUES ('" . $row['id'] . "')";
                $statement = $connect->prepare($sub_query);
                $statement->execute();
                $_SESSION['login_details_id'] = $connect->lastInsertId();
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $row['username'];
                header("location: chat.php");
            } else {
                array_push($errors, "Wrong input!");
            }
        } else {
            array_push($errors, "Wrong input!");
        }
    }
}



?>


<div>
    <form name="login" method="post" action="login.php">
        <h1>Chat</h1>
        <h1>Log in</h1>
        <?php
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
        ?>
        <p>
            <label for="email" class="email">Email: </label>
            <input id="email" name="email" required="required" type="email" placeholder="" />
        </p>
        <p>
            <label for="password" class="password">Password: </label>
            <input id="password" name="password" required="required" type="password" placeholder="" />
        </p>
        <p>
            <input type="submit" name="submit" value="Login" />
        </p>
        <p>
            Not a member yet?
            <a href="register.php">Sign up!</a>
        </p>
    </form>
</div>