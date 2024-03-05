<?php
require_once "classes/DBC.php";
require_once "classes/User.php";

$username = "";
$errors = array();

if (isset($_POST['reg_user'])) {
    $username = $_POST['username'];

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    $password = $_POST['password_1'];

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $user = User::registerUser($username, $password);

        if ($user) {
            header('location: login.php');
        } else {
            array_push($errors, "Registration failed");
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    
    <form method="post" action="register.php">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</body>
</html>
