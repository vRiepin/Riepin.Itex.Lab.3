<?php
header('Content-Type: text/xml');
header('Cache-Control: no-cache, must-revalidate');
include "db.php";
echo '<?xml version="1.0" encoding="utf-8"?>';
echo "<root>";
$project = $_REQUEST['allTimeProject'];
$sqlSelect = $dbh->prepare(
    "SELECT ROUND(($db.work.time_end - $db.work.time_start)/10000,2) AS time, $db.projects.name, $db.worker.ID_WORKER, $db.worker.name
    FROM $db.work inner join $db.projects on $db.work.FID_PROJECTS = $db.projects.ID_projects 
    join $db.worker on $db.work.FID_WORKER = $db.worker.ID_WORKER 
    where $db.projects.name = :project;");
$sqlSelect->execute(array('project' => $project));
while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
    echo "<row><time>$cell[0]</time><project>$cell[1]</project><id>$cell[2]</id><name>$cell[3]</name></row>";
}
echo "</root>";
?>
