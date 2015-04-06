<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class AirticketViewAirtickets extends JViewLegacy
{
	function display($tpl = null)
	{

		// Get application
		$app = JFactory::getApplication();
		$context = "airticket.list.admin.airticket";
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');
		$this->filter_order	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'title', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
//		$this->filterForm    	= $this->get('FilterForm');
		$this->activeFilters 	= $this->get('ActiveFilters');

		// What Access Permissions does this user have? What can (s)he do?
//		$this->canDo = AirticketHelper::getActions();

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Set the submenu
		AirticketHelper::addSubmenu('airtickets');

		// Set the toolbar and number of found items
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	protected function addToolBar()
	{
		$title = JText::_('COM_AIRTICKET_MANAGER_AIRTICKETS');

		if ($this->pagination->total)
		{
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		}

		JToolBarHelper::title($title, 'airticket');

		JToolBarHelper::addNew('airticket.add', 'JTOOLBAR_NEW');
		JToolBarHelper::editList('airticket.edit', 'JTOOLBAR_EDIT');
		JToolBarHelper::deleteList('', 'airtickets.delete', 'JTOOLBAR_DELETE');
		JToolBarHelper::divider();
		JToolBarHelper::preferences('com_airticket');
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_AIRTICKET_ADMINISTRATION'));
	}
}