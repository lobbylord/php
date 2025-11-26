<?php

$users = [

    "zenith_lal"=> "Zenith",                        
];

if($_POST){
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
}

if(empty($username) || empty($password)){
    echo"Both Fields are Required";
}
elseif (!array_key_exists($username, $users) OR $users[$username] !== $password) {
    echo "Invald username or Password!";
}
else{
    header("Location: Welcome.php?user=".urlencode($username));
    exit();
}

?>

<html>

<head>
    <title>Login</title>

</head>

<Body>

    <h2>Login</h2>
    
    <form action="" method="POST">
        Username: <input type="text" name="username" placeholder="Enter username"><br><br>
        Password: <input type="passsword" name="password" placeholder="Enter password"> <br> <br>
        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>

</div>
</Body>
</html>
