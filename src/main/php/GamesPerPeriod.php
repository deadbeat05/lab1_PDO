<?php
date_default_timezone_set('UTC');
$dbh = new PDO('mysql:host=localhost;dbname=lab1_itech', "root1", "1234");
$stmt = $dbh->prepare("select g.id, g.date, g.place, g.score, t1.name as home, t2.name as guests from game as g inner join team as t1 on g.FID_TEAM1 = t1.id inner join team as t2 on FID_TEAM2 = t2.id having date BETWEEN ? AND ?");
$firstDate = $_GET['firstDate'];
$lastDate = $_GET['lastDate'];
$stmt->execute(array($firstDate,$lastDate));
print "<table border='1'><tr><caption>Games from $firstDate until $lastDate<br></caption><th>Date</th><th>Place</th><th>Score</th><th>Home</th><th>Guests</th></tr>";
while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    print "<tr><td>$row[date]</td><td>$row[place]</td><td>$row[score]</td><td>$row[home]</td><td>$row[guests]</td></tr>";
}
?>
