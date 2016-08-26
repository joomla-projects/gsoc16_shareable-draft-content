<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
 defined('_JEXEC') or die;

 /**
 * The article json controller
 *
 * @since  __DEPLOY_VERSION__
 */
class ContentControllerArticle extends JControllerForm
{
	/**
	 * Method to generate and store share token.
	 *
	 * @return  boolean   True if token successfully stored, false otherwise.
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function shareDraft()
	{
		$app       = JFactory::getApplication();
		$jinput    = JFactory::getApplication()->input;
		$articleId = $jinput->get('id', 0);

		if (!JSession::checkToken('get'))
		{
			echo new JResponseJson(null, JText::_('JINVALID_TOKEN'), true);

			$app->close();
		}

		$return  = false;
		$error   = false;
		$message = JText::_('COM_CONTENT_TOKEN_SAVED');
	
		try
		{
			// Get the model
			$return = $this->getModel()->shareToken($articleId);
		}
		catch (Exception $e)
		{
			$error   = true;
			$message = JText::_('COM_CONTENT_TOKEN_ERROR');
		}

		echo new JResponseJson($return, $message, $error);

		$app->close();
	}
}
