<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
require_once __DIR__ . '/articles.php';
/**
 * Featured content controller class.
 *
 * @since  _DEPLOY_VERSION_
 */
class ContentControllerShared extends ContentControllerArticles
{
	/**
	 * Removes an item.
	 *
	 * @return  void
	 *
	 * @since   _DEPLOY_VERSION_
	 */
	public function delete()
	{
		// Check for request forgeries
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
		$user = JFactory::getUser();
		$ids  = $this->input->get('cid', array(), 'array');

		// Access checks.
		foreach ($ids as $i => $id)
		{
			if (!$user->authorise('core.delete', 'com_content.article.' . (int) $id))
			{
				// Prune items that you can't delete.
				unset($ids[$i]);
				JError::raiseNotice(403, JText::_('JERROR_CORE_DELETE_NOT_PERMITTED'));
			}
		}
		if (empty($ids))
		{
			JError::raiseWarning(500, JText::_('JERROR_NO_ITEMS_SELECTED'));
		}
		else
		{
			// Get the model.
			$model = $this->getModel();

            // Remove the items.
			if (!$model->shared($ids, 0))
			{
				JError::raiseWarning(500, $model->getError());
			}
		}
		$this->setRedirect('index.php?option=com_content&view=shared');
	}
	/**
	 * Method to publish a list of articles.
	 *
	 * @return  void
	 *
	 * @since   _DEPLOY_VERSION_
	 */
	public function publish()
	{
		parent::publish();
		$this->setRedirect('index.php?option=com_content&view=shared');
	}
}
