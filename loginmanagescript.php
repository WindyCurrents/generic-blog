<?php
    session_start();

    require_once 'connecttodb.php';

    function isLoggedOn()
    {
        return isset($_SESSION['UserID']);
    }

    function getUserID()
    {
        return isLoggedOn() ? $_SESSION['UserID'] : 0;
    }

    function getUserName()
    {
        return isLoggedOn() ? $_SESSION['Username'] : 0;
    }

    function logOn($login, $password)
    {
        global $pdo;

        try
        {
            $stmt = $pdo->prepare("SELECT * FROM userdata WHERE Username=:user");
            $stmt->bindValue(':user', $login, PDO::PARAM_STR);
            $stmt->execute();

            if($row = $stmt->fetch())
            {
                if(password_verify($password, $row['Password']))
                {
                    $_SESSION['UserID'] = $row['UserID'];
                    $_SESSION['Username'] = $row['Username'];
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
?>