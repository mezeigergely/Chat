<?php

include('database.php');

session_start();

if (!isset($_SESSION['id'])) {
    header("location:login.php");
}

$query = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
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
}

?>

<html>

<head>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <div class="container">
        <br />

        <h3 align="center">Chat</a></h3><br />
        <br />

        <div class="table-responsive">
            <h4 align="center">Users</h4>
            <p align="center"><a href="welcome.php?id=<?php echo $id; ?>"><?php echo $_SESSION['username']  ?></a> // <a href="logout.php">Logout</a></p>
            <div id="user_details"></div>
            <div id="user_model_details"></div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        get_user();

        setInterval(function() {
            update_last_activity();
            get_user();
            update_chat_history_data();
        }, 5000);

        function get_user() {
            $.ajax({
                url: "getUsers.php",
                method: "POST",
                success: function(data) {
                    $('#user_details').html(data);
                }
            })
        }

        function update_last_activity() {
            $.ajax({
                url: "updateLastActivity.php",
                success: function() {

                }
            })
        }

        function make_chat_dialog_box(to_user_id, to_user_name) {
            var modal_content = '<div id="user_dialog_' + to_user_id + '" class="user_dialog" title="You have chat with ' + to_user_name + '">';
            modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
            modal_content += '</div>';
            modal_content += '<div class="form-group">';
            modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id + '" class="form-control"></textarea>';
            modal_content += '</div><div class="form-group" align="right">';
            modal_content += '<button type="button" name="send_chat" id="' + to_user_id + '" class="btn btn-info send_chat">Send</button></div></div>';
            $('#user_model_details').html(modal_content);
        }

        $(document).on('click', '.start_chat', function() {
            var to_user_id = $(this).data('touserid');
            var to_user_name = $(this).data('tousername');
            make_chat_dialog_box(to_user_id, to_user_name);
            $("#user_dialog_" + to_user_id).dialog({
                autoOpen: false,
                width: 400
            });
            $('#user_dialog_' + to_user_id).dialog('open');
        });

        $(document).on('click', '.send_chat', function() {
            var to_user_id = $(this).attr('id');
            var chat_message = $('#chat_message_' + to_user_id).val();
            $.ajax({
                url: "insert_chat.php",
                method: "POST",
                data: {
                    to_user_id: to_user_id,
                    chat_message: chat_message
                },
                success: function(data) {
                    $('#chat_message_' + to_user_id).val('');
                    $('#chat_history_' + to_user_id).html(data);
                }
            })
        });

        function fetch_user_chat_history(to_user_id) {
            $.ajax({
                url: "fetch_user_chat_history.php",
                method: "POST",
                data: {
                    to_user_id: to_user_id
                },
                success: function(data) {
                    $('#chat_history_' + to_user_id).html(data);
                }
            })
        }

        function update_chat_history_data() {
            $('.chat_history').each(function() {
                var to_user_id = $(this).data('touserid');
                fetch_user_chat_history(to_user_id);
            });
        }

        $(document).on('click', '.ui-button-icon', function() {
            $('.user_dialog').dialog('destroy').remove();
        });

    });
</script>