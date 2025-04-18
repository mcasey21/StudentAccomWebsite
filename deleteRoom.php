<?php
require_once "ca_db_setup.php";

    if ( isset($_POST['delete']) && isset($_POST['id']))
    {
        $id = $conn -> real_escape_string($_POST['id']);
        $sql = "DELETE FROM roominfo WHERE Title = '$id'";
        echo "<pre>\n$sql\n</pre>\n";
        $conn->query($sql);
        echo 'Success - <a href="home.php">Continue...</a>';
        return;
    }

    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT Title FROM roominfo WHERE Title='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    echo "<p>Confirm: Deleting " . $row["Title"] . "</p>\n";
    echo ('<form method="post"><input type="hidden" ');
    echo ('name="id" value="'.htmlentities($row["Title"]).'">'."\n");
    echo ('<input type="submit" value="Delete" name="delete">');
    echo ('<a href="admin.php">Cancel</a>');
    echo ("\n</form>\n");
?>
