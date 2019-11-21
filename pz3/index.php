<?php
	$conn = mysqli_connect("127.0.0.1", "user", "Gazizov228!", "stud");

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	$result = mysqli_query($conn, 
							"select hotel.name as h_name, cost, country, firm.name 
							from hotel inner join firm on firm_id = firm.id 
							order by country, firm.name, cost;");

	$country = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<title>lab3</title>
</head>
<body>
	<?php
		echo '<table ><thead><tr><th>Firm</th><th>Hotel</th><th>Cost</th>
		</tr></thead><tbody>';

		for ($i = 0; $i < $result->num_rows; $i++) { 
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			if ($country == $row['country']) {
				echo "<tr><td>" . $row['name'] . "</td><td>" . $row['h_name'] . 
						"</td><td>" . $row['cost'] . "</td></tr>";
			}
			else {
				$country = $row['country'];
				echo "<tr><td colspan='3'>" . $country . "</td></tr>";
				echo "<tr><td>" . $row['name'] . "</td><td>" . $row['h_name'] . 
						"</td><td>" . $row['cost'] . "</td></tr>";
			}
		}

		echo '</tbody></table>';

		mysqli_close($conn);
	?>
</body>
</html>