<html>
  <head>
    <title>TEST - Online Quote Book</title>
  </head>
<body>


<?php

$username="quotedb";
$password="quotedb";
$database="quotes";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$idquery = "SELECT COUNT(*) FROM quotes";
$idresult = mysql_query($idquery);
$totalrows = mysql_fetch_array($idresult); 

$snowquery = "SELECT COUNT(*) FROM quotes WHERE name LIKE 'snow'";
$snowresult = mysql_query($snowquery);
$snowrows = mysql_fetch_array($snowresult);


//$testvar = "testvar works!";


echo "Total Quotes = $totalrows[0]<br><br>";

echo "<br><br>";

 
$con=mysqli_connect("localhost","quotedb","quotedb","quotes");
$result = mysqli_query($con,"SELECT * FROM quotes ORDER BY quotedate DESC");


echo '<h2> * * * * - TEST SITE - * * * *</h2>';

echo "<table border='1' cellpadding='3' cellspacing='1'>";
echo "<tr>";
echo "<th> Name </th>";
echo "<th> Witness </th>";
echo "<th> Quote </th>";
echo "<th> Quote Date </th>";
echo "</tr>";

while($row = mysqli_fetch_array($result))
  {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['witness'] . "</td>";
    echo "<td>" . $row['quote'] . "</td>";
    echo "<td>" . $row['quotedate'] . "</td>";
    echo "</tr>";
   }
  echo "</table><br>";
?>

</body>
</html>
