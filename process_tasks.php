<?php
// Check if the form is submitted
if(isset($_POST['submit'])){
    // Connect to MySQL
    $conn = mysqli_connect("localhost", "root", "", "tasks");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and bind parameters
    $task = $_POST['task'];
    $priority = $_POST['priority'];
    $tags = $_POST['tags'];

    // Insert task into database
    $sql = "INSERT INTO tasks (task, priority, tags) VALUES ('$task', '$priority', '$tags')";
    if(mysqli_query($conn, $sql)){
        echo "Task added successfully.";
    } else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close MySQL connection
    mysqli_close($conn);
}
?>
