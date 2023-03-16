<?php
    require_once 'utils.php';

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

        $login_msg = 'Username or password incorrect!';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog - Login</title>

</head>
<body>
    <div class="wrapper">
        <div class="container">
            <form method='POST' action='login.php'>
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
                <input type='submit' value='Log in' /></div>
            </form>
        </div>
    </div>
</body>
</html>