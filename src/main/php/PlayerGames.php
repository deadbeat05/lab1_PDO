<?php
$dbh = new PDO('mysql:host=localhost;dbname=lab1_itech', "root1", "1234");
$stmt = $dbh->prepare("select p.name as player ,g.date, g.place, g.score,t1.name as home, t2.name as guests from player as p, game as g
                                                                                            inner join team as t1 on g.FID_TEAM1 = t1.id
                                                                                            inner join team as t2 on g.FID_TEAM2 = t2.id
                                                     where p.name = ? and (p.FID_Team = g.FID_TEAM1 or p.FID_Team = g.FID_TEAM2);");
$player = $_GET['player'];
$stmt->execute(array($player));
print "<table border='1'><tr><caption>Score table $player</caption><th>Name</th><th>Date</th><th>Place</th><th>Score</th><th>Home</th><th>Guests</th></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "<tr><td>$row[player]</td>
<td>$row[date]</td>
<td>$row[place]</td>
<td>$row[score]</td>
<td>$row[home]</td>
<td>$row[guests]</td>
</tr>";
}
print "</table>";
?>