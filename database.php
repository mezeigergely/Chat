<?php
$connect = new PDO("mysql:host=localhost;dbname=frik", "root", "");
date_default_timezone_set('Europe/Budapest');
$connection = new mysqli('localhost', 'root', '', 'frik');

function OpenCon()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "frik";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}


function fetch_user_last_activity($user_id, $connect)
{
    $query = "SELECT * FROM login_details WHERE user_id = '$user_id' ORDER BY last_activity DESC LIMIT 1";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['last_activity'];
    }
}

function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
    $query = "SELECT * FROM chat_message WHERE (from_user_id = '" . $from_user_id . "' 
        AND to_user_id = '" . $to_user_id . "') OR (from_user_id = '" . $to_user_id . "' 
        AND to_user_id = '" . $from_user_id . "') ORDER BY timestamp DESC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '<ul class="list-unstyled">';
    foreach ($result as $row) {
        $user_name = '';
        if ($row["from_user_id"] == $from_user_id) {
            $user_name = '<b class="text-success">You</b>';
        } else {
            $user_name = '<b class="text-danger">' . get_user_name($row['from_user_id'], $connect) . '</b>';
        }
        $output .= '
        <li style="border-bottom:1px dotted #ccc">
        <p>' . $user_name . ' - ' . $row["chat_message"] . '
        <div align="right">
        - <small><em>' . $row['timestamp'] . '</em></small>
        </div>
        </p>
        </li>
        ';
    }
    $output .= '</ul>';
    return $output;
}

function get_user_name($user_id, $connect)
{
    $query = "SELECT username FROM users WHERE id = '$user_id'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['username'];
    }
}

function count_unseen_message($from_user_id, $to_user_id, $connect)
{
    $query = "SELECT * FROM chat_message WHERE from_user_id = '$from_user_id' AND to_user_id = '$to_user_id'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $count = $statement->rowCount();
    $output = '';
    if ($count > 0) {
        $output = '<span class="label label-success">' . $count . '</span>';
    }
    return $output;
}
