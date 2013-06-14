MiniTicket
==========

A small, lightweight support ticket system you can incorporate into any app.

Setup
-----

1. Create the ticket database and name it `mini_ticket`

2. Import/Execute `/tools/mini_ticket.sql` on the database:

3. Update database credentials in `Mini_Ticket_Base.class.php` function getDatabaseConnection()

4. Set the 'example' directory to be your document root.


Example URLs
-------------------
- User Tickets: /user.php
- Admin Tickets: /admin.php
- Ticket View: /ticket.php


Incorporate into your own App
-------------------

Use the three views in the /example folder and their associated files as a guide to your own development.  If you are just creating a ticket system and need to wrap MiniTicket in a framework or if you have not committed yet to a framework, we suggest checking out https://github.com/lewsid/dinkly.
