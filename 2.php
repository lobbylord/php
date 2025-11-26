<html>
    <body>
        <form method="post">
            Enter Number 1: <input type="number" name="num1">
            <br>
            Enter Number 2: <input type="number" name="num2">
            <br>
            <input type="submit" >
        </form>
        <?php
        if(isset($_POST[''])){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            echo $num1 + $num2;
        }
        ?>
    </body>
</html>
