<?php
include_once('../Back-end/server.php');
header('Content-Type: application/json');

$result = $con->query("SELECT id, username, assignment_name, file_name, file_path FROM assignments");

$assignments = [];
while ($row = $result->fetch_assoc()) {
    $assignments[] = $row;
}

echo json_encode($assignments);
?>
