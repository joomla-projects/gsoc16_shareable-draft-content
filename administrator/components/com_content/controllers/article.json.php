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
 * The article controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_content
 * @since       1.6
 */
 class ContentControllerArticle extends JControllerForm
{
	    /**
	     * Method to generate and store share token.
	     *
	     * @return  boolean   True if token successfully stored, false otherwise and internal error is set.
	     *
	     * @since   3.7
	     */
	     public function shareDraft()
	     {
	      	      $app    = JFactory::getApplication();
		
	    	      if (!JSession::checkToken())
	    	      {
	      		        echo new JResponseJson(null, JText::_('JINVALID_TOKEN'), false);
	      		        $app->close();
		          }
		
	    	      $return = false;
	    	      $error = false;
	    	      $message = JText::_('COM_CONTENT_TOKEN_SAVED');
		
	    	      try
		          {
			               // Get the model
			              $model = $this->getModel();
			              $return = $model->shareToken();
		          }
		          catch (Exception $e)
		          {
			              $error = true;
			              $message = JText::_('COM_CONTENT_TOKEN_ERROR');
		          }
		
		          echo new JResponseJson($return, $message, $error);
		          $app->close();
	     }
 }
