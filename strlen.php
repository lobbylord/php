<html>
    <body>
          <form method="post">
            Enter a string;
            <input type="type"
            name="str">
                <button type="submit">Find length 
                    </button>
</form>

                <?php
                if($_POST){
                    echo "Length" . strlen($_POST['str']);
                }
                ?>

                </body>
                </html>
