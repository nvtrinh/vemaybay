<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

class JFormFieldPeople extends JFormFieldList
{
	protected $type = 'People';

	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__at_people');

		$db->setQuery((string) $query);
		$messages = $db->loadObjectList();
		$options  = array();

		if ($messages)
		{
			foreach ($messages as $message)
			{
				$options[] = JHtml::_('select.option', $message->id, $message->baby);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
