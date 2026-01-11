<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';
if ($_SERVER['REQUEST_METHOD'] = $_POST) {
    $s_id = $_GET['id'];
    $title = $_POST['Title'];
    $des = $_POST['Description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    if (!empty($title)) {
        $final = new Task($title,  $s_id, $des, $status, $priority, $_SESSION['id'], $_SESSION['id']);
        $final->add();
    }
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
    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'yourgmail@gmail.com';
    $mail->Password   = 'yourappassword'; // use App Password if 2FA enabled
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('noreply@athena.com', 'Athena');
    $mail->addAddress('oldm2563@gmail.com');

    //Content
    $mail->isHTML(false);
    $mail->Subject = 'New Task Assigned';
    $mail->Body    = "Hello,\n\nA new task '{$title}' has been created.\n\nLogin to Athena to see details.";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

