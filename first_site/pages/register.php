<form method="post" action=
<?php
$loginErr = "Логин должен состять из латинских букв и цифр, например, \'Bober12\' не менее 3 и не более 30. Заполните логин";
$passwordErr = "Ваш пароль должен состоять не менее 8 знакови не более 15. Заполните пароль";
if (isset($_POST['reg_button'])) {
    if (empty($_POST["login"]) || empty($_POST["password"]) || empty($_POST["confirm"])) {
        if (empty($_POST["login"])) {
            $loginErr;
        } elseif (empty($_POST["password"])) {
            $passwordErr;
        } else {
            $confirmErr = "Заполните пароль";
        }
    } elseif (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {
        if ($_POST["password"] !== $_POST["confirm"]) {
            $confirmErr = "Пароль не совпадает";
        } else {
            if (logins($_POST["login"]) && passwords($_POST["password"])) {
                $file = fopen("data.txt", "a+");
                while ($string = fgets($file)) {
                    $dataLogin = substr($string, 0, strpos($string, ":"));
                    if ($dataLogin === $_POST["login"]) {
                        $loginErr = "Такой пользователь уже существует";
                    } else
                        $dataString = $_POST["login"] . ":" . $_POST["password"] . "::" . "\n";
                    fputs($file, $dataString);
                    echo '"index.php?page=1"';
                }
            }
            else{
                if (!logins($_POST["login"])){
                    $loginErr;
                }
                else
                    $passwordErr;
            }

        }

    }
}
?>
>

    <div class="form-group">
        <label for="login" class="form-label fs-3 fw-normal">Логин: </label>
        <input id="login" name="login" class="form-control" type="text">
        <span class="error text-danger fst-italic">*
<?php

if (!isset($_SESSION['login'])) {
    $login = logins($_POST['login']);
    if (!$login) {
        echo $loginErr;
    }
}

?></span>

    </div>
    <div class="form-group">
        <label for="password" class="form-label fs-3 fw-normal">Пароль: </label>
        <input id="password" name="password" class="form-control" type="password">
        <span class="error text-danger fst-italic">*
        <?php if (!isset($_SESSION['pass'])) {
            $pass = passwords($_POST['pass']);
            if (!$pass) {
                echo $passwordErr;
            }
        }
        ?>
        </span>
    </div>
    <div class="form-group">
        <label for="confirm" class="form-label">Подтвердите пароль: </label>
        <input id="confirm" name="confirm" class="form-control" type="password">
        <span class="error text-danger fst-italic">*<?php
            echo $confirmErr; ?></span>
    </div>
    <div class="form-group">
        <label for="email" class="form-label">Электронная почта: </label>
        <input id="email" name="email" class="form-control" type="email">
    </div>
    <div class="form-group">
        <button name="reg_button" class="btn btn-primary" type="submit">Зарегистрироваться</button>
    </div>
</form>
<?php
echo "<h2>Вы ввели:</h2>";
echo $login;
echo "";
echo "<br>";
?>

