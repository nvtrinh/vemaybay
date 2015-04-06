<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

class AirticketTableAirticket extends JTable
{
	function __construct(&$db)
	{
		parent::__construct('#__at_ticket', 'id', $db);
	}
}
