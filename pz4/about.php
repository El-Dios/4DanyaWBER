<?php
	require_once("conn.php");
    $pk = $_GET['pk'];
    $query = "select auto.name as name, year, power, 
            firm.name as firm, country.name as country 
            from auto inner join firm on firm_id = firm.id 
            inner join country on country_id = country.id where auto.id = $pk;";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
</head>
<body>
    <h3>Details</h3>
    <?php
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo "<p>* Name: " . $row["name"] . "</p>
            <p>* Year: " . $row["year"]. "</p>
            <p>* Power: " . $row["power"]. "</p>
            <p>* Firm: " . $row["firm"]. "</p>
            <p>* Country: " . $row["country"]. "</p>";

        mysqli_close($conn);
    ?>
</body>
</html>