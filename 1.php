<?php
include "db.php";
$selectdedProject = $_REQUEST['taskProject'];
$date = $_REQUEST['taskDate'];
$sqlSelect = $dbh->prepare(
  "SELECT * FROM $db.work 
  join $db.projects on $db.work.fid_projects = $db.projects.id_projects 
  where $db.work.date = :date AND $db.projects.name = :selectedProject");
$sqlSelect->execute(array('date' => $date, 'selectedProject' => $selectdedProject));
echo "<p>Finished tasks: <p>";
echo "<ol>";

while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
    echo "<li>Name: $cell[5], date: $cell[2], project: $cell[7]</li>";
}
?>
