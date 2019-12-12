<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {text-align: left;}
    </style>
</head>
<body>

<?php
//$q = intval($_GET['q']);
//
//
//
//$con = mysqli_connect('localhost','root','','crud');
//if (!$con) {
//    die('Could not connect: ' . mysqli_error($con));
//}
//
//mysqli_select_db($con,"crud");
//$sql="SELECT * FROM narocilo WHERE id = '".$q."'";
//$result = mysqli_query($con,$sql);
//
//
//
//
//echo "<table>
//<tr>
//<th>Firstname</th>
//<th>Lastname</th>
//<th>Age</th>
//<th>Hometown</th>
//<th>Job</th>
//</tr>";
//while($row = mysqli_fetch_array($result)) {
//    echo "<tr>";
//    echo "<td>" . $row['ID_narocilo'] . "</td>";
//    echo "<td>" . $row['datum'] . "</td>";
//    echo "<td>" . $row['stevilo_dni'] . "</td>";
//    echo "<td>" . $row['rok_dobave'] . "</td>";
//    echo "<td>" . $row['ID_referent'] . "</td>";
//    echo "<td>" . $row['ID_dobavitelj'] . "</td>";
//    echo "</tr>";
//}
//echo "</table>";
//mysqli_close($con);
//?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$q = intval($_GET['q']);
$ena = 1;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM narocilo WHERE ID_narocilo = '$q'";
$result = $conn->query($sql);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ID_narocilo"]. " - Name: " . $row["datum"]. " " . $row["stevilo_dni"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>