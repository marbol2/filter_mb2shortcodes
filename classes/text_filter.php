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

namespace filter_mb2shortcodes;

defined('MOODLE_INTERNAL') || die();

$shfile = $CFG->dirroot . '/theme/mb2nl/lib/lib_shortcodes_bootstrap.php';

if (file_exists($shfile)) {
    require_once($shfile);
}


/**
 * Filter class
 *
 */
class text_filter extends \core_filters\text_filter {
    /**
     * Filter text.
     */
    public function filter($text, array $options = []) {
        global $PAGE;

        // Fast bailout.
        if (!function_exists('theme_mb2nl_do_shortcode') || strpos($text, '[') === false) {
            return $text;
        }

        static $array1 = [
            '<p>[' => '[',
            '<p> [' => '[',
            ']</p>' => ']',
            '] </p>' => ']',
            ']<br></p>' => ']',
            ']</p><br>' => ']',
            '] </p><br>' => ']',
            ']</p> <br>' => ']',
            '] </p> <br>' => ']',
            '] <br></p>' => ']',
            ']<br> </p>' => ']',
            '] <br> </p>' => ']',
            ']<br>' => ']',
            '] <br>' => ']',
            '"&nbsp;' => '" ',
        ];

        static $array2 = [
            'GENERIC0' => 'GENERICO',
        ];

        $replacements = $array1;

        if ($PAGE->pagelayout !== 'mb2builder') {
            $replacements += $array2;
        }

        return theme_mb2nl_do_shortcode(strtr($text, $replacements));

    }
}
