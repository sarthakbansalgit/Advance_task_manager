<?php
// Connect to MySQL
$conn = mysqli_connect("localhost", "root", "", "tasks");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['search_submit']) && !empty($_GET['search'])) {
    $search = $_GET['search'];

    // Prepare SQL statement to search for tasks
    $sql = "SELECT * FROM tasks WHERE task LIKE '%$search%' OR tags LIKE '%$search%'";

    // Execute SQL statement
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='task-item'>";
            echo "<p>Task: " . $row['task'] . "<br> Priority: " . $row['priority'] . "<br> Tags: " . $row['tags'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-results'>No tasks found.</p>";
    }
}

// Close MySQL connection
mysqli_close($conn);
?>
