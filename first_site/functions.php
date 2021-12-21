<?php
function logins($login)
{
    if (strlen($login) >= 3 && strlen($login) <= 30) {
        $login = trim($login);
        $login = htmlspecialchars($login);
        $pattern = '/^[A-Za-z0-9_]{3,30}$/';
        if (preg_match($pattern, $login, $matches[0])) {
            $_SESSION['login'] = $login;
            //setcookie('login', $login, time() + 7200, "/");
            return $login;
        }
    }
    //return $loginErr = "Логин должен состять из латинских букв и цифр, например, 'Bober12' не менее 3 и не более 30";
    return false;
}

function passwords($pass)
{
 //   $string = md5("password");  //cad6sd6cas868as6xas6x87asx687as6x87asfsdfhb
   // $string2 = md5("password"); //cad6sd6cas868as6xas6x87asx687as6x87asfsdfhb
    if (strlen($pass) >= 8 && strlen($pass) <= 15) {
        $pass = trim($pass);
        $pass = htmlspecialchars($pass);
        $pattern = '/^[A-Za-z0-9_\}\{\[\]\(\)-]{1,15}$/';
        if (preg_match($pattern, $pass)) {
            $_SESSION['pass'] = $pass;
            //setcookie('password', $pass, time() + 7200, "/");
            return $pass;
        }
    } else {
        //return $passwordErr = "Ваш пароль должен состоять не менее 8 знакови не более 15";
        return false;
    }
}








