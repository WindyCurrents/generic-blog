<?php
    require_once 'utils.php';

    if(isLoggedOn())
    {
        header('Location: index.php');
        exit();
    }

    if(isset($_POST['email']))
    {
        $allright = true;

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!preg_match('/[a-zA-Z0-9_]{3,16}/',$username))
        {
            $allright = false;
            $username_msg = 'Username should have 3-16 alphanumeric characters or underlines.';
        }

        if(!preg_match('/.{8,}/',$password))
        {
            $allright = false;
            $password_msg = 'Password should have at least 8 characters';
        }

        if($password != $_POST['verificate'])
        {
            $password_msg = 'Passwords are not the same. Retype.';
        }

        $email2 = filter_var($email, FILTER_SANITIZE_EMAIL);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email != $email2)
        {
            $allright = false;
            $email_msg = 'Incorrect e-mail address.';
        } 

        if($allright == true)
        {
            $msg = register($username, $email, $password);

            if($msg == 'No error')
            {
                $msg = '';
                header('Location: index.php');
                exit();
            }
            else
            {
                $existing_msg = $msg;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog - Register</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <form method='POST' action='register.php'>
                <div class='input'><?php
                    if(isset($username_msg))
                    {
                        echo '<div class="redtext">'.$username_msg.'</div>';
                    }
                ?>
                <label>User name: <input type='text' name='username' 
                    value='<?php
                        if(isset($_POST['username'])) {
                            echo $_POST['username'];
                        };
                    ?>'
                /></label></div>
                <div class='input'><?php
                    if(isset($email_msg))
                    {
                        echo '<div class="redtext">'.$email_msg.'</div>';
                    }
                ?>
                <label>E-mail address: <input type='email' name='email' 
                    value='<?php
                        if(isset($_POST['email'])) {
                            echo $_POST['email'];
                        };
                    ?>'
                /></label></div>
                <div class='input'><?php
                    if(isset($password_msg))
                    {
                        echo '<div class="redtext">'.$password_msg.'</div>';
                    }
                ?>
                <label>Password: <input type='password' name='password' 
                    value='<?php
                        if(isset($_POST['password'])) {
                            echo $_POST['password'];
                        };
                    ?>'
                /></label><br />
                <label>Confirm password: <input type='password' name='verificate' 
                    value='<?php
                        if(isset($_POST['verificate'])) {
                            echo $_POST['verificate'];
                        };
                    ?>'
                /></label></div>
                <div class='input'><?php
                    if(isset($existing_msg))
                    {
                        echo '<div class="redtext">'.$existing_msg.'</div>';
                    }
                ?>
                <input type='submit' value='Register' /></div>
            </form>
        </div>
    </div>
</body>
</html>