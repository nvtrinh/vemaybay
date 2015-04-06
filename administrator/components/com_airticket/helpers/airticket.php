<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

abstract class AirticketHelper
{

	public static function addSubmenu($submenu) 
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_AIRTICKET_SUBMENU_AIRTICKETS'),
			'index.php?option=com_airticket',
			$submenu == 'airtickets'
		);

		// set some global property
		$document = JFactory::getDocument();
	}

	public static function getActions($messageId = 0)
	{	
		$result	= new JObject;

		if (empty($messageId)) {
			$assetName = 'com_airticket';
		}
		else {
			$assetName = 'com_airticket.message.'.(int) $messageId;
		}

		$actions = JAccess::getActions('com_airticket', 'component');

		foreach ($actions as $action) {
			$result->set($action->name, JFactory::getUser()->authorise($action->name, $assetName));
		}

		return $result;
	}
}
