<?php
if ($_SERVER['REQUEST_METHOD'] = $_POST) {
    $content = $_POST['content'];
    $id = $_GET['id'];
    if (!empty($content)) {
        $pr = new Comment($id, $content);
        $pr->add();
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

        $subject = "New Comment Has Been Created";
        $body = "Hello, \n\n$message\n\nLogin to Athena to see details.";
        $headers = "From: noreply@athena.com\r\n";

        mail($user_email, $subject, $body, $headers);
        header("Location: comment.php?id=" . $_GET['id'] . "&idcom=" . $_GET['idcom']);
    } else {
    }
}
