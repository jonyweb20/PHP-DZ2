<?php

    if ( !isset($_POST['upd_button']) )
    {
        echo
        '<form action="index.php?page=3" method="post" enctype="multipart/form-data">
    <input type="file" name="image" class="form-control-sm" readonly>
    <button type="submit" class="btn btn-success" name="upd_button">
        Отправить файл
    </button>
    <label for="exampleColorInput" class="form-label">Color picker</label>
<input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
<label for="exampleDataList" class="form-label ">Datalist example</label>
<input class="form-control" list="datalistOptions" placeholder="Type to search..." id="exampleDataList">
<datalist id="datalistOptions">
  <option value="San Francisco">
  <option value="New York">
  <option value="Seattle">
  <option value="Los Angeles">
  <option value="Chicago">
</datalist>
</form>';
    } else {
        if ( $_FILES['image']['error'] != 0 )
        {
            echo '<div class="alert alert-danger"> Ошибка '.$_FILES['image']['error'].' при чтении файла</div>';
            exit();
        }
        if( is_uploaded_file($_FILES['image']['tmp_name']) )
        {
            move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$_FILES['image']['name']);
            echo '<div class="alert alert-success">Файл успешно загружен!</div>';
        }
    }


    ?>

