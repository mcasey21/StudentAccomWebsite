<?php
    require_once "ca_db_setup.php";

    if (isset($_POST['Title']) && isset($_POST['Pic']) && isset($_POST['Description']) && isset($_POST['Price']))
    {
        
        $t = $conn->real_escape_string($_POST['Title']);
        $p = $conn->real_escape_string($_POST['Pic']);
        $d = $conn->real_escape_string($_POST['Description']);
        $pr = $conn->real_escape_string($_POST['Price']);
        $id = $conn->real_escape_string($_POST['id']);
        
        $sql = "UPDATE roominfo SET Title='$t', Pic='$p', Description='$d', Price='$pr' WHERE Title='$id'";
        echo "<pre>\n$sql\n</pre>\n";
        $conn->query($sql);
        echo 'Details Updated - <a href="home.php">Continue...</a>';
        return;
    }

    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT Title, Pic, Description, Price FROM roominfo WHERE Title='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $t = htmlentities($row['Title']);
    $p = htmlentities($row['Pic']);
    $d = htmlentities($row['Description']);
    $pr = htmlentities($row['Price']);
    $id = htmlentities($row['Title']);

    echo <<< _END
        <div class="loginWrapper">
        <div class="title">Account Details</div>
        <form class="loginForm" method="post">
            <fieldset>
                <legend>Title</legend>
                <input type="text" name="Title" value="$t" required>
            </fieldset>
            <fieldset>
                <legend>Pic</legend>
                <input type="text" name="Pic" value="$p" required>
            </fieldset>
            <fieldset>
                <legend>Description</legend>
                <input type="text" name="Description" value="$d" required>
            </fieldset>
            <fieldset>
                <legend>Price</legend>
                <input type="number" name="Price" value="$pr" required>
            </fieldset>
            <input type="hidden" name="id" value="$id">
            <p><input type="submit" value="Update"/>
            <a href="home.php">Cancel</a></p>
        </form>
    </div>
    _END;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registerStyle.css">
    <title>Alter Room</title>
</head>
<body>
    
</body>
</html>
