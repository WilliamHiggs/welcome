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
 * welcome block for user dashboard.
 *
 * @package    block_myprofile
 * @copyright  2018
 * @author     William Higgs <https://github.com/WilliamHiggs>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_welcome extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_welcome');
    }

    public function get_content() {
        global $USER;  //declare our global user variable


        if ($this->content !== null) {
          return $this->content;
        }

        if (!isloggedin() or isguestuser()) {
            return '';    //user has to be logged in for this to work, being on a userdashboard they should be.
        }

        $userfirstname = $USER->firstname;  //get user first name, more informal

        $this->content         =  new stdClass;
        $this->content->text   = '<div class="welcomediv" style="text-align: left;"><h3>Hello '.$userfirstname.'</h3></div>';
        $this->content->text   .= '<div class="infodiv" style="text-align: center; margin: 25px;"><br><h4><b>To get started choose from courses below!</b></h4><br></div>';
        $this->content->footer = '';

        return $this->content;

    }
}
