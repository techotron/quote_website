<?php

$config = parse_ini_file('../../mysqlConnections/QuotesConnection.ini');

$connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo 'Connected successfully</br>';

$quote = "$_POST[quote]";
$quote1 = mysqli_real_escape_string($connection, $quote);

$sql="INSERT INTO quotes (id, name, witness, quote, quotedate)
VALUES
(NULL, '$_POST[name]', '$_POST[witness]', '" . $quote1 . "','$_POST[datepicker]')";

if (!mysqli_query($connection, $sql))
	{
		die('Error: ' . mysqli_error($connection));
	}
echo "1 record added";

mysqli_close($connection);


?>

<form>
<input type="button" value="Back" onclick="location.href='./newquote.php'">
</form>
<!--
<html>

<body>

<img src=".\images\background.jpg"

</body>

</html>
-->
