<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $string = $_POST['string'];
    $findString = $_POST['find'];
    $replaceString = $_POST['replacer'];
    $result = str_replace($findString, $replaceString, $string);
    echo "Original String: '$string'<br>";
    echo "String to Find: '$findString'<br>";
    echo "String to Replace that with: '$replaceString'<br>";
    echo "Replaced String: '$result'";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trim Whitespace</title>
</head>
<body>
    <h1>Replace Text from a String</h1>
    <form method="post">
        Input the String: <input type="text" id="string" name="string"><br>
         Sub String to Find: <input type="text" id="string" name="find"><br>
          Substring to Replace it With: <input type="text" id="string" name="replacer"><br>
        <input type="submit" value="Replace Text">
    </form>
    
</body>
</html>
