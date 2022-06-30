<?php

include 'dbconnection.php';
session_start();
if ($data === false) {
    die('connection error');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $useremail = $_POST["useremail"];
    $Passwrd = $_POST["Passwrd"];
    $sql = "select * from user where username='" . $username . "' AND useremail='" . $useremail . "' AND Passwrd='" . $Passwrd . "'";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);
    if ($row['user_type'] === 'membre') {
        $_SESSION['username'] = $username;
        header("location:userhome.php");
    } elseif ($row['user_type'] === 'admin') {
        $_SESSION['username'] = $username;
        header("location:adminhome.php");
    } else {
        echo 'login incorrecte';
    }
}
if (isset($_POST['enregistre'])) {
    $username = $_POST['username'];
    $usersecondname = $_POST['usersecondname'];
    $useremail = $_POST['useremail'];
    $Passwrd = $_POST['Passwrd'];;
    $sql = "INSERT into user(username,usersecondname,useremail,Passwrd) VALUES('$username','$usersecondname','$useremail','$Passwrd')";
    if (mysqli_query($data, $sql)) {
        $_SESSION['username'] = $username;
        header("location:userhome.php");
    }
} else {
    echo '<script>
    alert("un erreur se produit")
</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
            <label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up">
            <label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <form action="#" method="POST">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" type="text" name="username" class="input">
                        </div>
                        <div class="group">
                            <label for="user" class="label">email</label>
                            <input id="email" type="text" name="useremail" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" name="Passwrd" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In">
                        </div>


                    </div>
                </form>
                <form action="#" method="POST">
                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="user" class="label">nom</label>
                            <input id="user" type="text" name="username" class="input">
                        </div>
                        <div class="group">
                            <label for="user" class="label">prenom</label>
                            <input id="user" type="text" name="usersecondname" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email Address</label>
                            <input id="pass" type="text" name="useremail" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" name="Passwrd" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" name='enregistre' value="Sign Up">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>