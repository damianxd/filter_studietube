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
defined('MOODLE_INTERNAL') || die();
$plugin            = new StdClass();
$plugin->component = 'filter_studietube';
$plugin->version   = 2025092308;
$plugin->requires  = 2014051200;
$plugin->release   = '2.1.0';
$plugin->maturity  = MATURITY_STABLE;