<?php
$apiUrl = "http://backend:3000/todos";
$todos = json_decode(file_get_contents($apiUrl));
?>

<!DOCTYPE html>
<html>
<head>
    <title>ToDo List</title>
</head>
<body>
    <h1>ToDo List Test</h1>

    <!-- ToDo Display -->
    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <?php echo htmlspecialchars($todo->title); ?>
                - <?php echo $todo->completed ? 'Completed' : 'Incomplete'; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Form for Adding a New ToDo -->
    <form action="add_todo.php" method="POST">
        <input type="text" name="title" placeholder="Add new todo">
        <button type="submit">Add</button>
    </form>
</body>
</html>

