<?php

class CollegeCourses_Model extends Core_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'colleges_courses';
    }
}
