<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Tasks</title>
    <style>
        /* Your CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #5ee7df, #b490ca); /* Background gradient */
            color: #333; /* Default text color */
        }

        .container {
            margin-top: 80px; /* Adjusted to account for navbar height */
            max-width: 800px;
            padding: 20px;
            background: linear-gradient(to right, #e0eafc, #cfdef3); /* Container background gradient */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            margin-right: auto;
        }

        /* Other CSS styles */
        /* ... */
    </style>
</head>
<body>

<div class="container">
    <h1>Display Tasks</h1>

    <?php
    // Connect to MySQL
    $conn = mysqli_connect("localhost", "root", "", "tasks");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Function to update task
    function updateTask($conn, $task, $newTask, $newPriority, $newTags) {
        $sql = "UPDATE tasks SET task='$newTask', priority='$newPriority', tags='$newTags' WHERE task='$task'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        } 
    }

    // Function to delete task
    function deleteTask($conn, $task) {
        $sql = "DELETE FROM tasks WHERE task='$task'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        } 
    }

    if(isset($_POST['update'])) {
        $task = $_POST['task'];
        $newTask = $_POST['new_task'];
        $priority = $_POST['priority'];
        $tags = $_POST['tags'];

        if(updateTask($conn, $task, $newTask, $priority, $tags)) {
            echo "<div class='success'>Task updated successfully.</div>";
        } else {
            echo "<div class='error'>Error updating task.</div>";
        }
    }

    if(isset($_POST['delete'])) {
        $task = $_POST['task'];

        if(deleteTask($conn, $task)) {
            echo "<div class='success'>Task deleted successfully.</div>";
        } else {
            echo "<div class='error'>Error deleting task.</div>";
        }
    }

    // Display tasks
    $sql = "SELECT * FROM tasks";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='task-item'>";
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='task' value='" . $row['task'] . "'>";
            echo "<label for='task'>Task:</label>";
            echo "<input type='text' id='task' name='new_task' value='" . $row['task'] . "' required>";
            echo "<label for='priority'>Priority:</label>";
            echo "<select id='priority' name='priority'>";
            echo "<option value='Low' " . ($row['priority'] == 'Low' ? 'selected' : '') . ">Low</option>";
            echo "<option value='Medium' " . ($row['priority'] == 'Medium' ? 'selected' : '') . ">Medium</option>";
            echo "<option value='High' " . ($row['priority'] == 'High' ? 'selected' : '') . ">High</option>";
            echo "</select>";
            echo "<label for='tags'>Tags:</label>";
            echo "<input type='text' id='tags' name='tags' value='" . $row['tags'] . "'>";
            echo "<button type='submit' name='update'>Update</button>";
            echo "<button type='submit' name='delete'>Delete</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<p>No tasks found.</p>";
    }

    // Close MySQL connection
    mysqli_close($conn);
    ?>

</div>

</body>
</html>
