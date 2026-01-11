<?php
require __DIR__ . "/../services/session.php";
require __DIR__ . "/../services/require.php";
if ($_SERVER['REQUEST_METHOD'] = $_POST) {
    $s_id = $_GET['idts'];
    $id = $_GET['id'];
    $title = $_POST['Title'];
    $des = $_POST['Description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    if (!empty($title)) {
        $final = new Task($title,  $s_id, $des, $status, $priority, $_SESSION['id'], $_SESSION['id']);
        $final->edit($s_id);
        $message = "A new task '{$title}' has been created.";


        $assigned_user_id = $_SESSION['id'];


        $db = Db::connection();
        $stmt = $db->prepare("INSERT INTO notifications (user_id, task_id, type, message) VALUES (:user_id, :task_id, :type, :message)");
        $stmt->execute([
            ':user_id' => $assigned_user_id,
            ':task_id' => $s_id,
            ':type' => 'task_created',
            ':message' => $message
        ]);
        $user_email = 'oldm2563@gmail.com';

        $subject = "Task Has Been Edited";
        $body = "Hello, \n\n$message\n\nLogin to Athena to see details.";
        $headers = "From: noreply@athena.com\r\n";

        mail($user_email, $subject, $body, $headers);
        header('Location: ../views/taskv.php?id=' . $_GET['id']);
    }
}
