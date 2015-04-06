<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

class JFormFieldAddress extends JFormFieldList
{
	protected $type = 'Address';

	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__at_region.id as id,name,parent_id');
		$query->from('#__at_region');

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
