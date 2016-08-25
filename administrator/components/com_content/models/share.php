<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once __DIR__ . '/article.php';

/**
 * Feature model.
 *
 * @since  1.6
 */
class ContentModelShare extends JModelAdmin
{
	/**
	 * Returns a Table object, always creating it.
	 *
	 * @param   string  $type    The table type to instantiate
	 * @param   string  $prefix  A prefix for the table class name. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable	A database object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'Share', $prefix = 'ContentTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
}
