<form action="index.php?page=2" method="post">
    <select name="ext" class="form-control">
        <?php
            define("IMAGE_PATH", "img/");
            if( $dir = opendir(IMAGE_PATH) )
            {
                $ext_array = [];
                while ( ($file = readdir($dir)) !== false)
                {
                    $filename = IMAGE_PATH.$file;
                    $pos = strrpos( $filename, '.' );
                    $ext = substr( $filename, $pos+1 );
                    $ext = strtolower($ext);
                    if ( !in_array($ext, $ext_array) && $ext != '' )
                    {
                        $ext_array[] = $ext;
                        echo '<option value="'.$ext.'">'.$ext.'</option>';
                    }
                }
            }
        ?>
    </select>
    <button type="submit" class="btn btn-primary" name="submit" value="1">
        Выбрать
    </button>
</form>
<?php
    if ( isset($_POST['submit']) )
    {
        $ext = $_POST['ext'];
        $files_array = glob(IMAGE_PATH."*.".$ext);

        foreach ( $files_array as $image )
        {
            echo '<a href="'.$image.'" target="_blank">
                <img src="'.$image.'" height="100px" alt="picture" class="img-polaroid">
            </a>';
        }

    }