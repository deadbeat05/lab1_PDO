<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Player games</title>
</head>
<body>
<form method="get" action="PlayerGames.php">
<?php
$dbh = new PDO('mysql:host=localhost;dbname=lab1_itech', "root1", "1234");
$smnt = 'SELECT player.name from player';
print "<select name='player'>";
foreach ($dbh->query($smnt) as $rows){
    print "<option>$rows[name]</option>";
}
print "</select>";
?>
<input type="submit" value="Ok">
</form>
</body>
</html>