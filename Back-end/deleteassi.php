<?php
// Include database connection
include_once('../Back-end/server.php');

// Check if ID is provided via GET
if (isset($_GET['id'])) {
    $assignmentId = intval($_GET['id']); // Sanitize input

    // Delete the assignment
    $sql = "DELETE FROM assignments WHERE id = $assignmentId";
    if (mysqli_query($con, $sql)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Error deleting assignment: ' . mysqli_error($con)]);
    }
} else {
    echo json_encode(['error' => 'No assignment ID provided']);
}
?>