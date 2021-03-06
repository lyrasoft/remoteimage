<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2016 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Windwalker\Bootstrap;

/**
 * Bootstrap Dropdown class helper.
 *
 * @since 2.0
 */
class Dropdown extends \JHtmlActionsdropdown
{
	/**
	 * Append a duplicate item to the current dropdown menu
	 *
	 * @param   string  $id      ID of corresponding checkbox of the record
	 * @param   string  $prefix  The task prefix
	 *
	 * @return  void
	 */
	public static function duplicate($id, $prefix = '')
	{
		$task = ($prefix ? $prefix . '.' : '') . 'copy';

		static::addCustomItem(\Joomla\CMS\Language\Text::_('JTOOLBAR_DUPLICATE'), 'copy', $id, $task);
	}

	/**
	 * Clean dropdown list.
	 *
	 * @return  Dropdown
	 */
	public static function clean()
	{
		static::$dropDownList = array();
	}

	/**
	 * Append a custom item to current dropdown menu.
	 *
	 * @param   string  $label  The label of the item.
	 * @param   string  $icon   The icon classname.
	 * @param   string  $id     The item id.
	 * @param   string  $task   The task.
	 *
	 * @return  void
	 */
	public static function addCustomItem($label, $icon = '', $id = '', $task = '')
	{
		static::$dropDownList[] = '<li>'
			. '<a href = "javascript://" onclick="listItemTask(\'cb' . $id . '\', \'' . $task . '\')">'
			. ($icon ? '<span class="icon-' . $icon . '"></span> ' : '')
			. $label
			. '</a>'
			. '</li>';
	}
}
