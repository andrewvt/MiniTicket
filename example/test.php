<?php require_once($_SERVER["DOCUMENT_ROOT"]."/includes/header.php"); ?>

<?php 
// Mini_Ticket::newTicket($subject="subject", $message="message", $status = "open", $first_name="Luke", $last_name="Skywalker", $email="luke.skywalker@gmail.com", $associated_id = 2, $user_id=1, $is_deleted = 0, $session = null, $time_spent = 0);

Mini_Ticket::newTicketComment($message="message", $first_name="Han", $last_name="Solo", $email="han.solo@gmail.com", $ticket_id=1, $associated_id = 0, $user_id=2, $is_deleted = 0);
?>

<?php require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php"); ?>