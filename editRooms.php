<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="databaseStyle.css" />
    <title>Rooms DB</title>
</head>
<body>
    
</body>
</html>
<?php
echo '<div class="admin-table-wrapper">';
echo '<table>';
echo '<tr>
        <th>Title</th>
        <th>Pic</th>
        <th>Description</th>
        <th>Price</th>
        <th>Admin Controls</th>
      </tr>';

require_once "ca_db_setup.php";
$sql = "SELECT * FROM roominfo";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc())
    {
        echo "<tr>
                <td>{$row['Title']}</td>
                <td>{$row['Pic']}</td>
                <td>{$row['Description']}</td>
                <td>€{$row['Price']}</td>
                <td>
                    <a href='alterRoom.php?id=" . htmlentities($row["Title"]) . "'>Edit</a> /
                    <a href='deleteRoom.php?id=" . htmlentities($row["Title"]) . "'>Delete</a>
                </td>
              </tr>";
    }
}
else
{
    echo "<tr><td colspan='5'>No records found</td></tr>";
}

$conn->close();

echo '</table>';
echo '<a class="back-link" href="admin.php">Go back ..</a>';
echo '</div>';
?>