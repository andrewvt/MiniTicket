<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/includes/header.php");
$ticket = Mini_Ticket::getTicket($_GET['id']);
$comments = Mini_Ticket::getTicketsComments($_GET['id']);
?>

<h4><?= $ticket['subject']; ?></h4>
<div><?= $ticket['first_name']; ?> <?= $ticket['last_name']; ?> | <?= date("M d", $ticket['updated_at']); ?></div>
<table style="width:100%;">
  <tr>
    <td style="width:50px;"><img src="<?= Mini_Ticket::getGravatarImage($ticket['email'], 30); ?>"  alt="" style="margin-right: 5px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;"/></td>
    <td><?= $ticket['message']; ?></td>
      <td style="width: 120px;">
        Change Status:<br/>
        <input type="hidden" id="ticket_id" value="<?= $ticket['id']; ?>"/>
        <select class="update_status">
          <option value="open" >open</option>
          <option value="closed" >closed</option>
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
        <td style="width:100px;"><?= date("M d", $comment['created']); ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>
<form>
  <input type="hidden" id="ticket_id" value="<?= $ticket['id']; ?>"/>
  <div style="width:5%;float:left;"><img src="<?= Mini_Ticket::getGravatarImage($ticket['email'], 30); ?>"  alt="" style="margin-right: 5px;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;"/></div>
  <div style="width:95%;float:left;"><textarea id="comment" placeholder="Add a comment"></textarea></div>
  <a href="#" id="comment_submit" class="green button radius right" style="width:160px;"><i class="icon-check"></i> Add Comment</a>
</form>

<?php require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php"); ?>