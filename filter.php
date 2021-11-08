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
 * Filter plugin for Lærit.dk
 *
 * @package    filter_studietube
 * @copyright  2020 Damian Alarcon
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */
global $CFG;
require_once($CFG->libdir . '/filelib.php');
defined('MOODLE_INTERNAL') || die();
class filter_studietube extends moodle_text_filter
{
    /**
     * Moodle text filter
     *
     * @param string $text 
     * @param array() options
     * @return string
     */
    public function filter($text, array $options = array()) {
        if (!is_string($text) || empty($text) || 
           (!$successmatch = preg_match_all("/<img(?:.+?)class=\"studietube\"(?:.+?)(?:alt|id)=\"([A-Za-z0-9]+)\"/s", $text, $matches))) {
            return $text;
        }

        foreach($matches[1] as $match)
        {
            $vkey = filter_var($match, FILTER_SANITIZE_STRING);

            if(empty($vkey))
            {
               continue; 
            }

            $text = preg_replace('/<img(?:.+?)class="studietube"(?:.+?)(?:alt|id)="'.$vkey.'"(?:.+?)>/s', '<p style="width:100%;height:0;position:relative;padding-bottom:56.25%;"><iframe src="//www.studietube.dk/e/'.$vkey.'/0?nopanel=tru" style="width:100%;height:100%;position:absolute;top:0;left:0;" allowfullscreen webkitallowfullscreen mozAllowFullScreen frameborder="0" allow="encrypted-media"></iframe></p>', $text);
        }
        
        return $text;
    }
}
