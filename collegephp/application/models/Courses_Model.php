<?php

class Courses_Model extends Core_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'courses';
    }
}
