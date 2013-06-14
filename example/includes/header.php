<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/../Mini_Ticket/Mini_Ticket_Base.class.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/../Mini_Ticket.class.php");
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