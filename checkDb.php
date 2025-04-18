<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User DB</title>
    <link rel="stylesheet" href="databaseStyle.css" />
</head>
<body>
    
</body>
</html>
<?php
    echo '<div class="user-table-wrapper">';
    echo '<table>';
    echo '<tr>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Surname</th>
            <th>Admin Controls</th>
        </tr>';

    require_once "ca_db_setup.php";
    $sql = "SELECT * FROM userinfo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            echo "<tr>
                    <td>{$row['username']}</td>
                    <td>{$row['password']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['fName']}</td>
                    <td>{$row['sName']}</td>
                    <td>
                        <a href='edit.php?id=" . htmlentities($row["username"]) . "'>Edit</a> /
                        <a href='delete.php?id=" . htmlentities($row["username"]) . "'>Delete</a>
                    </td>
                </tr>";
        }
    }
    else
    {
        echo "<tr><td colspan='6'>No records found</td></tr>";
    }

    $conn->close();

    echo '</table>';
    echo '<a class="back-link" href="admin.php">Go back ..</a>';
    echo '</div>';
?>