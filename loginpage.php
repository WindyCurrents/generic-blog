<?php
    require_once 'loginutils.php';
    if(isLoggedOn())
    {
        header('Location: index.php');
        exit();
    }

    if(isset($_POST['login']))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if(logOn($login, $password))
        {
            header('Location: index.php');
            exit();
        }

        $login_msg = 'You are not me!';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog Beta - Administration Panel Login</title>
</head>
<body>
            <form method='POST' action='loginpage.php'>
                <div class='input'><?php
                    if(isset($login_msg))
                    {
                        echo '<div class="redtext">'.$login_msg.'</div>';
                    }
                ?>
                <label>Username: <input type='text' name='login' /></label></div>
                <div class='input'>
                <label>Password: <input type='password' name='password'/></label></div>
                <div class='input'>
                <input type='submit' value='Login to admin panel' /></div>
            </form>
</body>
</html>
