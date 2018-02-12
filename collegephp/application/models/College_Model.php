<?php

class College_Model extends Core_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'colleges';
    }

    public function searchBy($criteriaColumn, $searchText)
    {
        //select * from colleges where criteriaColumn like '%searchText%';
        $query = $this->db->query("select * from colleges where $criteriaColumn like '%$searchText%'");

        return $query->result();
    }

    public function doesExist($userName)
    {
        // $this->load->database();
        $result = $this->db->get_where('colleges', array('name' => $userName))->result();
        if (count($result) > 0) {
            return true;
        }

        return false;
    }

    //override Parent method
    // public function getWhere($regNo)
    // {
    //     $arr = array('reg_no' => $regNo);

    //     return parent::getOne($arr);
    // }
}
