<?php
	require_once("conn.php");

    $query = "select * from auto;";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Car</title>
</head>
<body>
<?php
    echo '<table ><thead><tr><th>Car</th><th>About</th></thead><tbody>';

    for ($i = 0; $i < $result->num_rows; $i++) { 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $id = $row['id'];
        echo "<tr><td>" . $row['name'] . "</td>
        <td><a href=\"about.php?pk=$id\">about</a></td></tr>";
    }

    echo '</tbody></table>';

    mysqli_close($conn);
?>
</body>
</html>