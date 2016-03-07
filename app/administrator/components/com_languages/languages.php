<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_languages
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.tabstate');

if (!JFactory::getUser()->authorise('core.manage', 'com_languages'))
{
	JFactory::getApplication()->enqueueMessage(
		JText::_('JERROR_ALERTNOAUTHOR'), 'error'
	);
}

$controller	= JControllerLegacy::getInstance('Languages');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
