<?php
/*  */

class Mini_Ticket_Base
{
    //This returns an array of a users tickets
	public static function getUsersTickets($user_id) 
	{
		$pdo = self::getDatabaseConnection();
		$query = "SELECT t.*, (SELECT count(tc.id) FROM ticket_comment tc WHERE tc.ticket_id = t.id) AS count 
					FROM ticket t 
					WHERE t.user_id = :param1 AND t.is_deleted=0
					ORDER BY t.updated_at DESC";
		$params = array("param1"  => $user_id);
		$stmt = $pdo->prepare($query);
		$stmt->execute($params);

		return $stmt->fetchAll();
	}

	//This returns an array of all tickets
	public static function getAllTickets() 
	{
		$pdo = self::getDatabaseConnection();
		$query = "SELECT t.*, (SELECT count(tc.id) FROM ticket_comment tc WHERE tc.ticket_id = t.id) AS count 
					FROM ticket t 
					WHERE t.is_deleted=0
					ORDER BY t.updated_at DESC";
		//$params = array("param1"  => $user_id);
		$stmt = $pdo->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	//This returns a single ticket record
	public static function getTicket($ticket_id) 
	{
		$pdo = self::getDatabaseConnection();
		$query = "SELECT t.* FROM ticket t 
					WHERE t.id = :param1 AND t.is_deleted=0";
		$params = array("param1"  => $ticket_id);
		$stmt = $pdo->prepare($query);
		$stmt->execute($params);

		return $stmt->fetchAll();
	}

	//This returns an array of all comments for a single ticket
	public static function getTicketsComments($ticket_id) 
	{
		$pdo = self::getDatabaseConnection();
		$query = "SELECT tc.* FROM ticket_comment tc 
					WHERE tc.ticket_id = :param1  AND tc.is_deleted=0
					ORDER BY tc.created_at";
		$params = array("param1"  => $ticket_id);
		$stmt = $pdo->prepare($query);
		$stmt->execute($params);

		return $stmt->fetchAll();
	}

	//This generates a gravatar link
	public static function getGravatarImage($email, $size = 80, $defaultImage = 'mm', $rating = 'G')
    {
        return  $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . $defaultImage . "&s=" . $size . '&r=' . $rating;
    }

	//http://stackoverflow.com/questions/13240500/creating-a-database-connection-class-pdo-and-fetch-data
    public static function getDatabaseConnection()
    {
        $host = 'localhost';
	    $dbname = 'ticket';
	    $user = 'root';
	    $pass = 'root';

        $pdo = new PDO("mysql:host=".$host.";dbname=".$dbname."", $user, $pass);
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // always disable emulated prepared statement when using the MySQL driver
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $pdo;
    }
}