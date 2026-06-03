<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Filter converting shortcodes [...] to HTML
 *
 * @package     filter_mb2shortcodes
 * @copyright   2026 Mariusz Boloz (lmsstyle.com)
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $item = new admin_setting_configtextarea(
        'filter_mb2shortcodes/globalopts',
        get_string('globalopts', 'filter_mb2shortcodes'),
        get_string('globalopts_help', 'filter_mb2shortcodes'),
        '',
        PARAM_TEXT
    );
    $settings->add($item);
}
