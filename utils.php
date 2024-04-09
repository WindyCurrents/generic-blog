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

function logOn($login, $password)
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:user");
        $stmt->bindValue(':user', $login, PDO::PARAM_STR);
        $stmt->execute();

        if ($row = $stmt->fetch()) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['username'] = $row['username'];
                $stmt->closeCursor();
                return true;
            }
        }

        $stmt->closeCursor();

        return false;
    } catch (Exception $e) {
        echo 'Server Error: ' . $e;
        throw $e;
    }
}

function register($username, $password)
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:user");
        $stmt->bindValue(':user', $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($row = $stmt->fetch()) {
            $stmt->closeCursor();
            return "This username is already in use!";
        }

        $stmt->closeCursor();

        $stmt = $pdo->prepare("INSERT INTO users(username,password) VALUES (:user, :pass)");
        $stmt->bindValue(':user', $username, PDO::PARAM_STR);
        $stmt->bindValue(':pass', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->execute();

        $stmt->closeCursor();

        logOn($username, $password);

        return "No error";
    } catch (Exception $e) {
        echo 'Server Error: ' . $e;
        throw $e;
    }
}
