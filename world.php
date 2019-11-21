<?php

$host = getenv('IP');
$username = 'lab7_user';
$password = 'P@rkdabus1';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$temp1 = $_GET['country'];
$country = strip_tags($temp1);
$temp2 = $_GET['context'];
$context = strip_tags($temp2);

if ($context == "nul") {
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $conn->query("SELECT * FROM countries INNER JOIN cities ON countries.code = cities.country_code WHERE countries.name = '$country';");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<?php if($context == "nul") : ?>
    <table style="width:100%">
      <tr>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence Year</th>
        <th>Head of State</th>
      </tr>
      <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['continent']; ?></td>
        <td><?= $row['independence_year']; ?></td>
        <td><?= $row['head_of_state']; ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
<?php else : ?>
    <table style="width:100%">
      <tr>
        <th>Name</th>
        <th>District</th>
        <th>Popualtion</th>
      </tr>
      <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['district']; ?></td>
        <td><?= $row['population']; ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
<?php endif; ?>