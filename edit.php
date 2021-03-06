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

defined('MOODLE_INTERNAL') || die();

class edit_page extends \local_cool\page\abstract_page {

    protected function global_permission(\local_cool\page\permissionsex $perm) {
        $perm->require_logged()->require_capability('local/personalsandbox:update');
    }

    protected function context(): \context {
        return context_course::instance($this->require_param('id'));
    }

    protected function run() {
        // TODO: Implement run() method.
    }

}

edit_page::execute();