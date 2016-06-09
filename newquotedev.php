<?php
//session_START();

//$ref = $_SESSION['ref'];

$mysqli = new mysqli("localhost","quotedb","quotedb","quotes");
if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
        }

$query = $mysqli->query("SELECT id, lower(name) as name, enabled FROM names ORDER BY name;");

while($array[] = $query->fetch_object());
array_pop($array);

?>

<html>
<head>
<title>
DEV - Online Quote Book
</title>

  <link rel="stylesheet" href="./jquery/jquery-ui.css">
  <script src="./jquery/jquery-1.10.2.js"></script>
  <script src="./jquery/jquery-ui.js"></script>
  <link rel="stylesheet" type="text\css" href=".\style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  </script>

</head>
<body>

<h1>**** DEV SITE ****</h1>

<form name=quotebook action="insertdev.php" method="post">

<div id="label">

Name:
<br>
<br>
Witness:
<br>
<br>
Quote:
<br>
<br>
<br>
<br>
<br>
<br>
Quote Date:

<br><br>


</div>

<div id="textbox">

<select name="name">
        <?php foreach($array as $option ) : ?>
        <option value="<?php echo $option->name; ?>"><?php echo $option->name; ?></option>
<?php endforeach; ?>

</select>

<br>
<br>

<input type="text" name="witness" id="witness">

<br>
<br>

<textarea cols="50" rows="5" name="quote" id="quote"></textarea>

<br>
<br>

<input type="text" name="datepicker" id="datepicker">

</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br>


<!--
Change Description: <input type="text" name="changedescription" id="changedescription">
-->



<input type="submit" value="Save"><br>
</form>

</body>
</html>

