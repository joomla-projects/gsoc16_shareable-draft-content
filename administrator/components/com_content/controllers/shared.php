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
 * Shared content controller class.
 *
 * @since  __DEPLOY_VERSION__
 */
class ContentControllerShared extends ContentControllerArticles
{
	/**
	 * Method to discard shared drafts.
	 *
	 * @return  void
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function discardDraft()
	{
		// Check for request forgeries
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$ids = $this->input->get('cid', array(), 'array');

		// Access checks.
		foreach ($ids as $i => $id)
		{
			if (!JFactory::getUser()->authorise('core.edit.state', 'com_content.article.' . (int) $id))
			{
				// Prune items that you can't change.
				unset($ids[$i]);

				JError::raiseNotice(403, JText::_('JLIB_APPLICATION_ERROR_EDITSTATE_NOT_PERMITTED'));
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

			// Discard the drafts.
			if (!$model->discardDraft($ids))
			{
				JError::raiseWarning(500, $model->getError());

				return false;
			}
		}

		$message = JText::plural('COM_CONTENT_N_ITEMS_UNSHARED', count($ids));
		$this->setRedirect(JRoute::_('index.php?option=com_content&view=shared', false), $message);

	}

	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  The array of possible config values. Optional.
	 *
	 * @return  JModel
	 *
	 * @since   1.6
	 */
	public function getModel($name = 'Shared', $prefix = 'ContentModel', $config = array('ignore_request' => true))
	{
		return parent::getModel($name, $prefix, $config);
	}
}
