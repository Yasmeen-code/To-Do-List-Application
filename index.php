<?php
require("db.php");

$q = "SELECT * FROM info";
$stmt = $mycon->prepare($q);
$stmt->execute();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM info WHERE id=?";
    $stmtDelete = $mycon->prepare($query);
    $stmtDelete->execute([$id]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
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

        .list-group-item {
            transition: background-color 0.3s;
        }

        .list-group-item:hover {
            background-color: #f1f1f1;
        }

        h1 {
            color: #343a40;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">To-Do List</h1>
        <div class="text-right mb-3">
            <a href="add.php" class="btn btn-primary">Add Task</a>
        </div>
        <ul class="list-group">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong><?= htmlspecialchars($row['task']) ?></strong>
                        <span class="badge badge-secondary"><?= htmlspecialchars($row['cat']) ?></span>
                    </div>
                    <div>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>


</body>

</html>