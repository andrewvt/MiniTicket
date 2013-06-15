<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../Mini_Ticket.class.php");

/* This is the end point for the ajax that creates a ticket and for updating the status.
   This would ideally be handled in the controller of a framework */

if($_POST['type']=="ticket") //Process a new ticket post
{
	$subject = strip_tags($_POST['subject']); 
	$message = strip_tags($_POST['message']); 
	$status = "open"; 
	$first_name = strip_tags($_POST['first_name']); //this could come from a logged in user instead
	$last_name= strip_tags($_POST['last_name']); //this could come from a logged in user instead
	$email = strip_tags($_POST['email']); //this could come from a logged in user instead
	$associated_id = 1; //this would be accessed through your framwork
	$user_id = 1; //this would be accessed through your framwork

	Mini_Ticket::newTicket($subject, $message, $status, $first_name, $last_name, $email, $associated_id, $user_id);

  	//Email notification goes here...

	echo "Success";
}
elseif($_POST['type']=="status") //Process a ticket status change
{
	$ticket_id = strip_tags($_POST['ticket_id']); 
	$status = strip_tags($_POST['status']);

	Mini_Ticket::updateTicketStatus($ticket_id, $status);

	//Email notification goes here...

	echo "Success";
}

