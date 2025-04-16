<?php
    require_once "ca_db_setup.php";

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['fName']) && isset($_POST['sName']) )
    {
        
        $u = $conn->real_escape_string($_POST['username']);
        $p = $conn->real_escape_string($_POST['password']);
        $e = $conn->real_escape_string($_POST['email']);
        $f = $conn->real_escape_string($_POST['fName']);
        $s = $conn->real_escape_string($_POST['sName']);
        $id = $conn->real_escape_string($_POST['id']);
        
        $sql = "UPDATE userinfo SET username='$u', password='$p', email='$e', fName='$f', sName='$s'  WHERE username='$id'";
        echo "<pre>\n$sql\n</pre>\n";
        $conn->query($sql);
        echo 'Updated - <a href="home.php">Continue...</a>';
        return;
    }

    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT username, password, email, fName, sName FROM userinfo WHERE username='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $u = htmlentities($row['username']);
    $p = htmlentities($row['password']);
    $e = htmlentities($row['email']);
    $f = htmlentities($row['fName']);
    $s = htmlentities($row['sName']);
    $id = htmlentities($row['username']);

    echo <<< _END
        <p>Edit User</p>
        <form method="post">
            <fieldset>
                <legend>Username</legend>
                <input type="text" name="username" required>
            </fieldset>
            <fieldset>
                <legend>Password</legend>
                <input type="password" name="password" required>
            </fieldset>
            <fieldset>
                <legend>Email</legend>
                <input type="email" name="email" required>
            </fieldset>
            <fieldset>
                <legend>First Name</legend>
                <input type="text" name="fName" required>
            </fieldset>
            <fieldset>
                <legend>Last Name</legend>
                <input type="text" name="sName" required>
            </fieldset>
        <input type="hidden" name="id" value="$id">
        <p><input type="submit" value="Update"/>
        <a href="home.php">Cancel</a></p>
        </form>
    _END;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registerStyle.css">
    <title>My Account</title>
</head>
<body>
    
</body>
</html>
