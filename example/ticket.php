<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/includes/header.php");

//If comment post insert it
if(isset($_POST['type']) AND $_POST['type']=="comment")
{ 
  $ticket_id = strip_tags($_POST['ticket_id']);
  $comment = strip_tags($_POST['comment']);
  $first_name = strip_tags($_POST['first_name']); //this could come from a logged in user instead
  $last_name= strip_tags($_POST['last_name']); //this could come from a logged in user instead
  $email = strip_tags($_POST['email']); //this could come from a logged in user instead
  $associated_id = 1; //This would be set from your framework
  $user_id = 1; //this would be set from your framework

  Mini_Ticket::newTicketComment($comment, $first_name, $last_name, $email, $ticket_id, $associated_id, $user_id);

  //Email notification goes here...
}

//Fetch the appropriate data
$ticket = Mini_Ticket::getTicket($_GET['id']);
$comments = Mini_Ticket::getTicketsComments($_GET['id']);
?>

<h4><?= $ticket['subject']; ?></h4>
<div><?= $ticket['first_name']; ?> <?= $ticket['last_name']; ?> | <?= date("M d", strtotime($ticket['updated_at'])); ?></div>
<table style="width:100%;">
  <tr>
    <td style="width:50px;"><img src="<?= Mini_Ticket::getGravatarImage($ticket['email'], 30); ?>"  alt="" style="margin-right: 5px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;"/></td>
    <td><?= $ticket['message']; ?></td>
      <td style="width: 120px;">
        Change Status:<br/>
        <input type="hidden" id="ticket_id" value="<?= $ticket['id']; ?>"/>
        <select class="update_status">
          <option value="open" <?= ($ticket['status'] == 'open') ? 'SELECTED' : ''; ?> >open</option>
          <option value="closed" <?= ($ticket['status'] == 'closed') ? 'SELECTED' : ''; ?> >closed</option>
        </select>
      </td>
  </tr>
</table>
<!-- <label class="form-label">Session</label><textarea readonly>{% set obj = ticket.session | json_decode %}{{ dump(obj) }}</textarea> -->
<?php if(count($comments)>0): ?>    
  <h4>Comments</h4>
  <table style="width:100%;">
    <?php foreach($comments as $comment): ?>
      <tr>
        <td style="width:50px;"><img src="<?= Mini_Ticket::getGravatarImage($comment['email'], 30); ?>"  alt="" style="margin-right: 5px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;"/></td>
        <td style="width: 90px;"><?= $comment['first_name']; ?> <?= substr($comment['last_name'], 0, 1); ?></td>
        <td><?= $comment['comment']; ?></td>
        <td style="width:100px;"><?= date("M d", strtotime($comment['created_at'])); ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>
<form id="comment_form" action="" method="post">
  <input type="hidden" name="type" value="comment"/>
  <input type="hidden" id="ticket_id" name="ticket_id" value="<?= $ticket['id']; ?>"/>

  <!-- These can be hidden if your framework knows this stuff already -->
  <input type="text" name="first_name" value="" placeholder="First Name"/>
  <input type="text" name="last_name" value="" placeholder="Last Name"/>
  <input type="text" name="email" value="" placeholder="Email"/>
  <!-- These can be hidden if your framework knows this stuff already -->

  <div style="width:5%;float:left;"><img src="<?= Mini_Ticket::getGravatarImage($ticket['email'], 30); ?>"  alt="" style="margin-right: 5px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;"/></div>
  <div style="width:95%;float:left;"><textarea name="comment" id="comment" placeholder="Add a comment"></textarea></div>
  <a href="#" id="comment_submit" class="green button radius right" style="width:160px;" onclick=""><i class="icon-check"></i> Add Comment</a>
</form>

<?php require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php"); ?>