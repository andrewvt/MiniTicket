<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../Mini_Ticket.class.php");

/* This is the end point for the ajax that creates a ticket and for updating the status.
   This would ideally be handled in the controller of a framework */

if($_POST['type']=="ticket") //Process a new ticket post
{
	$subject = $_POST['subject']; 
	$message = $_POST['message']; 
	$status = "open"; 
	$first_name = $_POST['first_name']; 
	$last_name= $_POST['last_name']; 
	$email = $_POST['email']; 
	$associated_id = 1; //this would be accessed through your framwork
	$user_id = 1; //this would be accessed through your framwork

	Mini_Ticket::newTicket($subject, $message, $status, $first_name, $last_name, $email, $associated_id, $user_id);

	echo "Success";
}
elseif($_POST['type']=="status") //Process a ticket status change
{
	$ticket_id = $_POST['ticket_id']; 
	$status = $_POST['status'];

	Mini_Ticket::updateTicketStatus($ticket_id, $status);

	echo "Success";
}

