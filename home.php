<html>

<head>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" type="image/x-icon" href="images/football.png">
</head>

<?php
include 'db_connect.php';

// Fetch division list
$sql = "SELECT DISTINCT division FROM clubs ORDER BY division";
$result1 = $conn->query($sql);

// Fetch colour list
$sql = "SELECT DISTINCT colour_name FROM club_colours ORDER BY colour_name";
$result2 = $conn->query($sql);

$conn->close();
?>

<body>

  <center>
    <img src="images/stadium.png" width="100%">
    <p></p>
  </center>

  <div id="backdrop"></div>
  <div id="club_modal" class="box3">
    <button class="close-btn" onclick="closeModal()">×</button>
    <div id="club_modal_content"></div>
  </div>

  <div class="div-border table-layout">
    <table id="shoppingtable">
      <tr class="shoptr">
        <td id="form-cell">

          <!-- IMPORTANT: fixed form -->
          <form id="club_form" action="footballshow.php" method="POST">

            <!-- Division dropdown -->
            <select name="division" id="division" onchange="updateClubList()">
              <option value="" disabled selected>Select a Division</option>
              <option value="">All</option>
              <?php while ($row = $result1->fetch_assoc()) {
                echo "<option value='" . $row["division"] . "'>" . $row["division"] . "</option>";
              } ?>
            </select>

            <!-- Colour checkboxes -->
            <div class="colour-checkboxes">
              <b>Select Colour:</b>
              <?php while ($row = $result2->fetch_assoc()) { ?>
                <label>
                  <input type="checkbox" name="colours[]" value="<?php echo $row['colour_name']; ?>" onchange="updateClubList()">
                  <?php echo $row['colour_name']; ?>
                </label>
              <?php } ?>
            </div>

            <!-- Capacity filters -->
             <div class="stadium-range">
            <div class="capacity-field">
              <label for="min_capacity">Min Stadium Capacity:</label>
              <input type="number" name="capacity_min" id="min_capacity" placeholder="0" onkeyup="updateClubList()">
              </div>

                 <div class="capacity-field">
                            <label for="max_capacity">Max Stadium Capacity:</label>
              <input type="number" name="capacity_max" id="max_capacity" placeholder="0" onkeyup="updateClubList()">
              </div>

          </form>

        </td>

        <td id="response-cell">
          <div id="club_response" class="div-border"></div>
        </td>

      </tr>
    </table>
  </div>

  <script src="js/clubs.js"></script>
</body>

</html>