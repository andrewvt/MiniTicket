<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../Mini_Ticket/Mini_Ticket.class.php");
$ticket = Mini_Ticket::getTicket($_GET['id']);
$comments = Mini_Ticket::getTicketsComments($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootswatch: Simplex</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mini and minimalist.">
    <meta name="author" content="Thomas Park">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootswatch.css" rel="stylesheet">
    <link href="css/datatables-bootstrap.css" rel="stylesheet">

  </head>

  <body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
    <!--script src="js/bsa.js"></script -->


  <!-- Navbar
    ================================================== -->
 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="">MiniTicket</a>
       <div class="nav-collapse collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li><a href="user.php">User Tickets</a></li>
          <li><a href="admin.php">Admin Tickets</a></li>
        </ul>
        <ul class="nav pull-right" id="main-menu-right">
        </ul>
       </div>
     </div>
   </div>
 </div>

    <div class="container">


<!-- Masthead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="row">
    <div class="span6">
      <h1>MiniTicket</h1>
      <p class="lead">A small, lightweight support ticket system you can incorporate into any app.</p>
    </div>
    <div class="span6">
      <div class="bsa well">
          <div id="bsap_1277971" class="bsarocks bsap_c466df00a3cd5ee8568b5c4983b6bb19"></div>
      </div>
    </div>
  </div>
</header>

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


<br><br><br><br>

     <!-- Footer
      ================================================== -->
      <hr>

      <footer id="footer">
        <p class="pull-right"><a href="#top">Back to top</a></p>
        <div class="links">
          <a href="http://news.bootswatch.com" onclick="pageTracker._link(this.href); return false;">Blog</a>
          <a href="http://feeds.feedburner.com/bootswatch">RSS</a>
          <a href="https://twitter.com/thomashpark">Twitter</a>
          <a href="https://github.com/thomaspark/bootswatch/">GitHub</a>
          <a rel="tooltip" href="javascript:(function(e,a,g,h,f,c,b,d)%7Bif(!(f%3De.jQuery)%7C%7Cg%3Ef.fn.jquery%7C%7Ch(f))%7Bc%3Da.createElement(%22script%22)%3Bc.type%3D%22text/javascript%22%3Bc.src%3D%22http://ajax.googleapis.com/ajax/libs/jquery/%22%2Bg%2B%22/jquery.min.js%22%3Bc.onload%3Dc.onreadystatechange%3Dfunction()%7Bif(!b%26%26(!(d%3Dthis.readyState)%7C%7Cd%3D%3D%22loaded%22%7C%7Cd%3D%3D%22complete%22))%7Bh((f%3De.jQuery).noConflict(1),b%3D1)%3Bf(c).remove()%7D%7D%3Ba.documentElement.childNodes%5B0%5D.appendChild(c)%7D%7D)(window,document,%221.3.2%22,function(%24,L)%7Bif(%24(%22.bootswatcher%22)%5B0%5D)%7B%24(%22.bootswatcher%22).remove()%7Delse%7Bvar%20%24e%3D%24(%27%3Cselect%20class%3D%22bootswatcher%22%3E%3Coption%3EAmelia%3C/option%3E%3Coption%3ECerulean%3C/option%3E%3Coption%3ECosmo%3C/option%3E%3Coption%3ECyborg%3C/option%3E%3Coption%3EJournal%3C/option%3E%3Coption%3EReadable%3C/option%3E%3Coption%3ESimplex%3C/option%3E%3Coption%3ESlate%3C/option%3E%3Coption%3ESpacelab%3C/option%3E%3Coption%3ESpruce%3C/option%3E%3Coption%3ESuperhero%3C/option%3E%3Coption%3EUnited%3C/option%3E%3C/select%3E%27)%3Bvar%20l%3D1%2BMath.floor(Math.random()*%24e.children().length)%3B%24e.css(%7B%22z-index%22:%2299999%22,position:%22fixed%22,top:%225px%22,right:%225px%22,opacity:%220.5%22%7D).hover(function()%7B%24(this).css(%22opacity%22,%221%22)%7D,function()%7B%24(this).css(%22opacity%22,%220.5%22)%7D).change(function()%7Bif(!%24(%22link.bootswatcher%22)%5B0%5D)%7B%24(%22head%22).append(%27%3Clink%20rel%3D%22stylesheet%22%20class%3D%22bootswatcher%22%3E%27)%7D%24(%22link.bootswatcher%22).attr(%22href%22,%22http://bootswatch.com/%22%2B%24(this).find(%22:selected%22).text().toLowerCase()%2B%22/bootstrap.min.css%22)%7D).find(%22option:nth-child(%22%2Bl%2B%22)%22).attr(%22selected%22,%22selected%22).end().trigger(%22change%22)%3B%24(%22body%22).append(%24e)%7D%3B%7D)%3B" title="Drag to your bookmarks bar">Bookmarklet</a>
          <a href="https://github.com/thomaspark/bootswatch/tree/gh-pages/swatchmaker">Swatchmaker</a>
          <a href="http://news.bootswatch.com/post/22193315172/bootswatch-api">API</a>
          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=F22JEM3Q78JC2">Donate</a>
        </div>
        Made by <a href="http://thomaspark.me">Thomas Park</a>. Contact him <a href="mailto:hello@thomaspark.me">hello@thomaspark.me</a>.<br/>
        Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0">Apache License v2.0</a>.<br/>
        Based on <a href="http://twitter.github.com/bootstrap/">Bootstrap</a>. Hosted on <a href="http://pages.github.com/">GitHub</a>. Icons from <a href="http://fortawesome.github.com/Font-Awesome/">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts">Google</a>. Favicon by <a href="https://twitter.com/geraldhiller">Gerald Hiller</a>.</p>
      </footer>

    </div><!-- /container -->




    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/jquery.smooth-scroll.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>

	<script>
	$(document).ready(function() {
		$('#tickets').dataTable( {} );
	});
	</script>
  </body>
</html>


