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
 * Entity model of course_personalsandbox table.
 *
 * @package local_personalsandbox\entity
 * @category entity
 * @copyright 2018 CVUT CZM, Jiri Fryc
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_personalsandbox\entity;

defined('MOODLE_INTERNAL') || die();

use local_cool\entity\course;
use local_cool\entity\database_entity;
use local_cool\entity\user;

class course_personalsandbox extends database_entity {
    const TABLENAME = 'local_personalsandbox';

    protected $userid;
    protected $courseid;

    public static function create(int $courseid, int $userid): course_personalsandbox {
        $entity = new course_personalsandbox();
        $entity->courseid = $courseid;
        $entity->userid = $userid;
        return $entity;
    }

    public function get_name(): string {
        return "Sandbox - {$this->get_owner()->get_fullname()}";
    }

    public function get_idnumber(): string {
        return 'personalsandbox:' . $this->get_owner()->get_fullname();
    }

    public function get_owner(): user {
        return user::get($this->userid);
    }

    public function get_course(): course {
        return course::get($this->courseid);
    }

    public function get_user_id(): int {
        return $this->userid;
    }

    public function get_course_id(): int {
        return $this->courseid;
    }

}