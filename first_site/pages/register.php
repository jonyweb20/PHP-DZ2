<?php
$fla=false;
$temp= false;
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
    } else
        if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {
            if ($_POST["password"] !== $_POST["confirm"]) {
                $confirmErr = "Пароль не совпадает";
                $loginErr = " ";
                $passwordErr = " ";
            } elseif (logins($_POST["login"])) {
                $file = fopen("data.txt", "a+");
                while ($string = fgets($file)) {
                    $separateString = explode(":", $string);
                    if ($separateString[0] == $_POST["login"]) {
                        $loginErr = "Такой логин уже существует";
                        $passwordErr = " ";
                        $fla=true;
                        break;
                    }
                }
                if (!$fla){
                    $dataString = $_POST["login"] . ":" . $_POST["password"] . "::" . "\n";
                    fputs($file, $dataString);
                    $temp = true;
                }
            } else {
                !logins($_POST["login"]) ? $loginErr : $passwordErr;
            }
        }
        else {echo $loginErr = "левая ошибка";
        }
}
?>

<form method="post" action="<?if($temp){echo "/first_site/index.php?page=1";}
else echo "/first_site/index.php?page=4"?>">
    <div class="form-group">
        <label for="login" class="form-label fs-3 fw-normal">Логин: </label>
        <input id="login" name="login" class="form-control" type="text">
        <span class="error text-danger fst-italic">*
<?php
        echo $loginErr;
?></span>

    </div>
    <div class="form-group">
        <label for="password" class="form-label fs-3 fw-normal">Пароль: </label>
        <input id="password" name="password" class="form-control" type="password">
        <span class="error text-danger fst-italic">*
     <?php
                echo $passwordErr;
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




