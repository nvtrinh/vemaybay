<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class AirticketModelAirticket extends JModelAdmin
{
	public function getTable($type = 'Airticket', $prefix = 'AirticketTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_airticket.airticket',
			'airticket',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	public function getScript() 
	{
		return 'administrator/components/com_airticket/models/forms/airticket.js';
	}

	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
			'com_airticket.edit.airticket.data',
			array()
		);

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}
	/**
	 * Method to check if it's OK to delete a message. Overwrites JModelAdmin::canDelete
	 */
	protected function canDelete($record)
	{
		if( !empty( $record->id ) )
		{
			return JFactory::getUser()->authorise( "core.delete", "com_airticket.message." . $record->id );
		}
	}
}
