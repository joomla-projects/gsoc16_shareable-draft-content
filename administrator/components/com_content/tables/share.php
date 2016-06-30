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
 * Share Table class.
 *
 * @since  1.6
 */
class ContentTableShare extends JTable
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  &$db  Database connector object
	 *
	 * @since   3.7
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__share_draft', 'id', $db);
	}
}
