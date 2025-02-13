<?php
// Include database connection
include_once('../Back-end/server.php');

// Check if ID is provided via GET
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']); 

    // Debugging: Check if the ID is being received
    error_log("Received user ID: " . $userId);

    // Fetch user data
    $sql = "SELECT * FROM user WHERE id = $userId";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        echo json_encode($user);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
} else {
    echo json_encode(['error' => 'No user ID provided']);
}
?>
