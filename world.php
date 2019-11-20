<?php

$host = getenv('IP');
$username = 'lab7_user';
$password = 'P@rkdabus1';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$temp = $_GET['country'];
$country = strip_tags($temp);

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name']; ?></li>
<?php endforeach; ?>
</ul>