<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tasks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #5ee7df, #b490ca); /* Background gradient */
            color: #333; /* Default text color */
        }

        .navbar {
            background: linear-gradient(to right, #5ee7df, #b490ca); /* Navbar gradient */
            overflow: hidden;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
        }

        .navbar a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: #333; /* Hover text color */
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

        h1 {
            text-align: center;
            color: #333; /* Heading color */
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333; /* Label text color */
        }

        input[type="text"],
        select {
            width: 60%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 20%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        .task-item {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .task-item p {
            margin: 0;
        }

        .task-item p:first-child {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .no-results {
            text-align: center;
            font-style: italic;
            color: #666;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="search.php">Search</a>
    <a href="#">About</a>
    <a href="#">Contact</a>
</div>

<div class="container">
    <h1>Edit Tasks</h1>

    <!-- Display tasks here -->
    <?php include 'display_tasks.php'; ?>

</div>

</body>
</html>
