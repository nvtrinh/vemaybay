<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

class JFormFieldFirm extends JFormFieldList
{
	protected $type = 'Firm';

	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__at_firm.id as id,name');
		$query->from('#__at_firm');

		$db->setQuery((string) $query);
		$messages = $db->loadObjectList();
		$options  = array();

		if ($messages)
		{
			foreach ($messages as $message)
			{
				$options[] = JHtml::_('select.option', $message->id, $message->name);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
