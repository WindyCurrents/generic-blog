<?php
    require_once 'loginutils.php';

    if(isLoggedOn())
    {
        header('Location: index.php');
        exit();
    }

    if(isset($_POST['username']))
    {
        $allright = true;

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!preg_match('/[a-zA-Z0-9_]{3,16}/',$username))
        {
            $allright = false;
            $username_msg = 'Nazwa użytkownika powinnna mieć od 3 do 8 znaków alfanumerycznych lub podkreślenia.';
        }

        if(!preg_match('/.{8,}/',$password))
        {
            $allright = false;
            $password_msg = 'Hasła powinny mieć przynajmniej 8 znaków.';
        }

        if($password != $_POST['verificate'])
        {
            $password_msg = 'Hasła nie są takie same.';
        }


        if($allright == true)
        {
            $msg = register($username, $password);

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
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Blog - Registration</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <form method='POST' action='registration.php'>
                <div class='input'><?php
                    if(isset($username_msg))
                    {
                        echo '<div class="redtext">'.$username_msg.'</div>';
                    }
                ?>
                <label>Nazwa użytkownika: <input type='text' name='username' 
                    value='<?php
                        if(isset($_POST['username'])) {
                            echo $_POST['username'];
                        };
                    ?>'
                /></label></div>
                <div class='input'><?php
                    if(isset($password_msg))
                    {
                        echo '<div class="redtext">'.$password_msg.'</div>';
                    }
                ?>
                <label>Hasło: <input type='password' name='password' 
                    value='<?php
                        if(isset($_POST['password'])) {
                            echo $_POST['password'];
                        };
                    ?>'
                /></label><br />
                <label>Powtórz hasło: <input type='password' name='verificate' 
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
                <input type='submit' value='Process registration' /></div>
            </form>
        </div>
        <div class="footer">
            Generic Blog Temporary Registration
        </div>
    </div>
</body>
</html>