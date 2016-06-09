<html>
<head>
<title>Online Quote Book</title>
</head>
<body>

<?php

// -------------------------------- Connect to the database -----------------------------------
$config = parse_ini_file('../../mysqlConnections/QuotesConnection.ini');


$connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// -------------------------------- Query the database ----------------------------------------

//SQL Query
$sqlQuotes = "SELECT * FROM quotes ORDER BY quotedate DESC";
$quotes = mysqli_query($connection, $sqlQuotes);
$totalQuotes = mysqli_num_rows($quotes);
$sqlNames = "SELECT name FROM names ORDER BY name";
$names = mysqli_query($connection, $sqlNames);

// --------------------------------  Output ----------------------------------------------------

echo "Total Quotes: " . $totalQuotes . "<br><br>";

// Drop Down Menus

echo "Quotee: <select name='names'>";

while ($name = mysqli_fetch_array($names)) {

  echo "<option value='" . $name['name'] . "'>" . $name['name'] . "</option>";

}

echo "</select> ";

echo "<br><br>";

// Table Headers
echo "<table border='1' cellpadding='3' cellspacing='1'>";
echo "<tr><th> Name </th><th> Witness </th><th> Quote </th><th> Quote Date </th></tr>";


while($row = mysqli_fetch_array($quotes))
  {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['witness'] . "</td>";
    // Use nl2br to translate \r\n line breaks to <br>:
    echo "<td>" . nl2br($row['quote']) . "</td>";
    echo "<td>" . $row['quotedate'] . "</td>";
    echo "</tr>";
   }
  echo "</table><br><br>";

?>

</body>
</html>
