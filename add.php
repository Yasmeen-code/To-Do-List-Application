<?php
require('db.php');

if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    $cat = $_POST['cat'];
    $q = "INSERT INTO info (task, cat) VALUES (?, ?)";
    $stmt = $mycon->prepare($q);
    $stmt->execute([$task, $cat]);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #343a40;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Add New Task</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="task">Title:</label>
                <input type="text" class="form-control" id="task" name="task" required>
            </div>
            <div class="form-group">
                <label for="cat">Category:</label>
                <select class="form-control" id="cat" name="cat">
                    <option value="work">Work</option>
                    <option value="personal">Personal</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Task</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>


</body>

</html>