<!DOCTYPE html>
<html>
    <body>
        <form method="post">
            Enter text:<input type="text"name="txt">
            <button type="submit">Trim</button>
</form>
<?php
if($_POST){
    echo trim($_POST['txt']);
}
?>
</body>
</html>
