<!DOCTYPE html>
<html>

<head>
    <title> Events </title>
    <script type="text/javascript" src="sort-table.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

    </style>
</head>

<body>
    <h1> List of Events </h1>
    <?php
$servername = "localhost"; // Will typically be localhost since PHP and MySQL
// will be running on the same server
$username = "root"; // Your username
$password = "Bellybelle97"; // Your password
$dbname = "allen"; // Your database name


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Control reaching here means thread is not dead -- successful connection

//echo "Connected successfully <br>";
$sql = "SELECT * FROM events ORDER BY date ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>Event Date</th><th>Event Name</th><th>Club</th><th>Description</th></tr>";
while($row = $result->fetch_assoc()) {
echo "<tr><td> " . $row["date"] . " </td><td>" . $row["ename"] . " </td><td>" . $row["cname"] .
" </td><td>" . $row["description"] . "</td></tr>";
}
    echo "</table>";
} else {
echo "No Event Records Found. <br>";
}
$conn->close();
?>
</body>

</html>
