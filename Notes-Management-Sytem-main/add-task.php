<?php
session_start();
include_once('includes/config.php');
if (!isset($_SESSION['userid'])) {
    header('location:login.php');
}

if (isset($_POST['addTask'])) {
    $taskName = $_POST['taskName'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $deadline = $_POST['deadline'];
    $userId = $_SESSION['userid'];

    $query = "INSERT INTO tasks (user_id, task_name, description, priority, deadline, status) 
              VALUES ('$userId', '$taskName', '$description', '$priority', '$deadline', 'Pending')";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Task added successfully.');</script>";
        header('location:manage-tasks.php');
    } else {
        echo "<script>alert('Failed to add task.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Task - Task Management System</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h3>Add New Task</h3>
        <form method="post">
            <input type="text" name="taskName" placeholder="Task Name" required />
            <textarea name="description" placeholder="Description" required></textarea>
            <select name="priority" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
            <input type="date" name="deadline" required />
            <button type="submit" name="addTask">Add Task</button>
        </form>
    </div>
</body>
</html>
