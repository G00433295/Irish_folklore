<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Italian Football Clubs</title>
</head>

<body>

<?php
// ----- Read filters safely -----
$division = isset($_POST['division']) ? htmlspecialchars($_POST['division']) : '';
$colours = isset($_POST['colours']) ? $_POST['colours'] : [];

$capacity_min = isset($_POST['capacity_min']) && $_POST['capacity_min'] !== '' ? intval($_POST['capacity_min']) : null;
$capacity_max = isset($_POST['capacity_max']) && $_POST['capacity_max'] !== '' ? intval($_POST['capacity_max']) : null;

include 'db_connect.php';

// ----- Build WHERE conditions -----
$where = [];

if ($division !== "") {
    $where[] = "division = '$division'";
}

if (!empty($colours)) {
    $colour_conditions = [];
    foreach ($colours as $colour) {
        $colour = htmlspecialchars($colour);
        $colour_conditions[] = "JSON_CONTAINS(colours, '\"$colour\"')";
    }
    $where[] = "(" . implode(" AND ", $colour_conditions) . ")";
}

if ($capacity_min !== null) {
    $where[] = "stadium_capacity >= $capacity_min";
}

if ($capacity_max !== null) {
    $where[] = "stadium_capacity <= $capacity_max";
}

$sql_statement = "SELECT * FROM clubs";

if (!empty($where)) {
    $sql_statement .= " WHERE " . implode(" AND ", $where);
}

// ----- Run query -----
$result = $conn->query($sql_statement);
$conn->close();

$num_results = mysqli_num_rows($result);

if ($num_results > 1) {
    echo "<b><h3 class='result-count'>There are $num_results Results</h3></b><br>";
} else {
    echo "<br>";
}

echo "<div class='football-container div-border'>";

while ($row = mysqli_fetch_array($result)) {
    $club_name = htmlspecialchars($row['name']);
    $short_name = htmlspecialchars($row['short_name']);
    $stadium_name = htmlspecialchars($row['stadium_name']);
    $stadium_city = htmlspecialchars($row['stadium_city']);

    echo "<div class='football-card'>";

    echo "<img src='images/clubs/" . $row['badge_filename'] . "'
          alt='" . $club_name . "'
          class='football-image hover-pointer'
          onclick='openClubModal(\"$stadium_name\", \"$stadium_city\", \"$club_name\")'>";

    echo "<p class='football-info'><strong>" . $short_name . "</strong></p>";

    echo "<p class='football-info hover-pointer'
          onclick='openClubModal(\"$stadium_name\", \"$stadium_city\", \"$club_name\")'>
          Stadium: 📍 $stadium_name
          </p>";

    echo "<p class='football-info hover-pointer'
          onclick='openClubModal(\"$stadium_city\", \"Italy\", \"$club_name\")'>
          City: 📍 $stadium_city
          </p>";

    echo "<p class='football-info'>Division: " . $row['division'] . "</p>";
    echo "<p class='football-info'>Capacity: " . number_format($row['stadium_capacity']) . "</p>";

    $titles = [];
    if ($row['titles_serie_a'] > 0) $titles[] = "Serie A: " . $row['titles_serie_a'];
    if ($row['titles_coppa_italia'] > 0) $titles[] = "Coppa Italia: " . $row['titles_coppa_italia'];
    if ($row['titles_european_cups'] > 0) $titles[] = "European: " . $row['titles_european_cups'];

    if (!empty($titles)) {
        echo "<p class='football-info'><em>" . implode(", ", $titles) . "</em></p>";
    }

    echo "</div>";
}

echo "</div>";

?>

</body>
</html>
