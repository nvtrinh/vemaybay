<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class AirticketControllerAirtickets extends JControllerAdmin
{
	public function getModel($name = 'Airticket', $prefix = 'AirticketModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
}
