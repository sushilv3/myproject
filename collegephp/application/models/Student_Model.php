<?php

class Student_Model extends Core_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'students';
    }

    public function searchBy($criteriaColumn, $searchText)
    {
        $query = $this->db->query("select * from colleges where $criteriaColumn like '%$searchText%'");

        return $query->result();
    }
}
