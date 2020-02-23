<?php
$dbh = new PDO('mysql:host=localhost;dbname=lab1_itech', "root1", "1234");
$stmt = $dbh->prepare("select team.name, score_table.points from score_table,team where team.league=? and score_table.team_id = team.id order by points DESC");
$league = $_GET['league'];
$stmt->execute(array($league));
print "<table border='1'><tr><caption>Score table $league</caption><th>Name</th><th>Points</th></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "<tr><td>$row[name]</td><td>$row[points]</td></tr>";
}
print "</table>";
?>