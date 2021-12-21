
<form method="post" action=
<?php
if (isset($_POST['open_button'])) {
    if (empty($_POST["login"]) || empty($_POST["password"])) {
        if (empty($_POST["login"])) {
            $logErr = "Заполните логин";
        } else {
            $passError = "Заполните пароль";
        }
    } elseif (isset($_POST["login"])) {
        $file = fopen("data.txt", "a+");
        while ($string = fgets($file)) {
            $dataLogin = substr($string, 0, strpos($string, ":"));
            if ($dataLogin == $_POST["login"]) {
             //   $filePas = fopen("data.txt", "a+");
                while ($string = fgets($file)) {
                    $loginleng = strlen($dataLogin);
                    $number= str_split($string);
                    //$dataPass = substr($string, $number+$loginleng-1, $loginleng);
                  echo "<pre>";
                    var_dump($number);
                    echo "<pre>";
                    /*echo "<pre>";
                    var_dump($number);
                    echo "<pre>";*/
                    if ($dataPass === $_POST["password"]) {
                        echo '"index.php?page=1"';
                    }
                }

            } else {
                $logErr = "Логин указан неверно";
                $loginreg = '<button class="btn btn-primary">
<a href="index.php?page=4" class="text-light">Зарегистрироваться</a></button>';
            }
        }
    } else {
        $passError = "Неверный пароль";
        $loginreg = '<button class="btn btn-primary">
<a href="index.php?page=4" class="text-light">Зарегистрироваться</a></button>';
    }
}
?>
>

<div class="form-group">
    <label for="login" class="form-label fs-3 fw-normal">Логин: </label>
    <input id="login" name="login" class="form-control" type="text">
    <span class="error text-danger fst-italic">*<?php echo $logErr; ?></span>
    </div>
    <div class="form-group">
        <label for="password" class="form-label fs-3 fw-normal">Пароль: </label>
        <input id="password" name="password" class="form-control" type="password">
        <span class="error text-danger fst-italic">*<?php echo $passError; ?></span>
    </div>

    <div class="form-group">
        <button name="open_button" class="btn btn-primary" type="submit">ВОЙТИ</button>
        <?php
        echo $loginreg;
        ?>
    </div>
</form>
