<?php
session_start();
include_once('includes/config.php');
if (!isset($_SESSION['userid'])) {
    header('location:login.php');
}

if (isset($_GET['delete'])) {
    $taskId = $_GET['delete'];
    mysqli_query($con, "DELETE FROM tasks WHERE id='$taskId'");
    echo "<script>alert('Task deleted successfully.');</script>";
    header('location:manage-tasks.php');
}

if (isset($_GET['complete'])) {
    $taskId = $_GET['complete'];
    mysqli_query($con, "UPDATE tasks SET status='Completed' WHERE id='$taskId'");
    echo "<script>alert('Task marked as completed.');</script>";
    header('location:manage-tasks.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Tasks - Task Management System</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h3>Manage Tasks</h3>
        <table>
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $userid = $_SESSION['userid'];
                $tasks = mysqli_query($con, "SELECT * FROM tasks WHERE user_id='$userid'");
                while ($task = mysqli_fetch_array($tasks)) {
                    echo "<tr>
                        <td>{$task['task_name']}</td>
                        <td>{$task['description']}</td>
                        <td>{$task['priority']}</td>
                        <td>{$task['deadline']}</td>
                        <td>{$task['status']}</td>
                        <td>
                            <a href='manage-tasks.php?complete={$task['id']}'>Complete</a> | 
                            <a href='manage-tasks.php?delete={$task['id']}'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
