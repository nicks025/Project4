<?php
// Include database connection
include_once('../Back-end/server.php');

// Fetch all assignments
$sql = "SELECT * FROM assignments";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $assignments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $assignments[] = $row;
    }
    echo json_encode($assignments); // Return assignments as JSON
} else {
    echo json_encode(['error' => 'No assignments found']);
}
?>