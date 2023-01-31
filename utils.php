<?php
    session_start();

    require_once 'connect.php';

    function isLoggedOn()
    {
        return isset($_SESSION['ID']);
    }

    function getUserID()
    {
        return isLoggedOn() ? $_SESSION['ID'] : 0;
    }

    function getUserName()
    {
        return isLoggedOn() ? $_SESSION['username'] : 0;
    }

    function getUserEmail()
    {
        return isLoggedOn() ? $_SESSION['email'] : 0;
    }

    function logOn($login, $password)
    {
        global $pdo;

        try
        {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:user OR email=:email");
            $stmt->bindValue(':user', $login, PDO::PARAM_STR);
            $stmt->bindValue(':email', $login, PDO::PARAM_STR);
            $stmt->execute();

            if($row = $stmt->fetch())
            {
                if(password_verify($password, $row['password']))
                {
                    $_SESSION['ID'] = $row['ID'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $stmt->closeCursor();
                    return true;
                }
            }

            $stmt->closeCursor();

            return false;
        }
        catch(Exception $e)
        {
            echo 'Server Error: '.$e;
            throw $e;
        }
    }

    function register($username, $email, $password)
    {
        global $pdo;

        try
        {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:user");
            $stmt->bindValue(':user', $username, PDO::PARAM_STR);
            $stmt->execute();

            if($row = $stmt->fetch())
            {
                $stmt->closeCursor();
                return "This username is already in use!";
            }

            $stmt->closeCursor();

            $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if($row = $stmt->fetch())
            {
                $stmt->closeCursor();
                return "This email is already in use!";
            }

            $stmt->closeCursor();

            $stmt = $pdo->prepare("INSERT INTO users(email,username,password) VALUES (:email, :user, :pass)");
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':user', $username, PDO::PARAM_STR);
            $stmt->bindValue(':pass', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $stmt->execute();

            $stmt->closeCursor();

            logOn($email, $password);

            return "No error";
        }
        catch(Exception $e)
        {
            echo 'Server Error: '.$e;
            throw $e;
        }
    }