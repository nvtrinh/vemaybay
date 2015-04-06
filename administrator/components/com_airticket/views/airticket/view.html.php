<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class AirticketViewAirticket extends JViewLegacy
{
	protected $form;
	protected $item;
	protected $script;
	protected $canDo;

	public function display($tpl = null)
	{
		// Get the Data
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->script = $this->get('Script');

		// What Access Permissions does this user have? What can (s)he do?
		$this->canDo = AirticketHelper::getActions($this->item->id);

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;

		// Hide Joomla Administrator Main menu
		$input->set('hidemainmenu', true);

		$isNew = ($this->item->id == 0);

		JToolBarHelper::title($isNew ? JText::_('COM_AIRTICKET_MANAGER_AIRTICKET_NEW')
		                             : JText::_('COM_AIRTICKET_MANAGER_AIRTICKET_EDIT'), 'airticket');
		// Build the actions for new and existing records.
		if ($isNew)
		{
			// For new records, check the create permission.
			if ($this->canDo->get('core.create')) 
			{
				JToolBarHelper::apply('airticket.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('airticket.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('airticket.save2new', 'save-new.png', 'save-new_f2.png',
				                       'JTOOLBAR_SAVE_AND_NEW', false);
			}
			JToolBarHelper::cancel('airticket.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			if ($this->canDo->get('core.edit'))
			{
				// We can save the new record
				JToolBarHelper::apply('airticket.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('airticket.save', 'JTOOLBAR_SAVE');
 
				// We can save this record, but check the create permission to see
				// if we can return to make a new one.
				if ($this->canDo->get('core.create')) 
				{
					JToolBarHelper::custom('airticket.save2new', 'save-new.png', 'save-new_f2.png',
					                       'JTOOLBAR_SAVE_AND_NEW', false);
				}
			}
			if ($this->canDo->get('core.create')) 
			{
				JToolBarHelper::custom('airticket.save2copy', 'save-copy.png', 'save-copy_f2.png',
				                       'JTOOLBAR_SAVE_AS_COPY', false);
			}
			JToolBarHelper::cancel('airticket.cancel', 'JTOOLBAR_CLOSE');
		}
	}
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$isNew = ($this->item->id == 0);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_AIRTICKET_AIRTICKET_CREATING')
		                           : JText::_('COM_AIRTICKET_AIRTICKET_DETAILS'));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_airticket"
		                                  . "/views/airticket/submitbutton.js");
		JText::script('COM_AIRTICKET_AIRTICKET_ERROR_UNACCEPTABLE');
	}
}
