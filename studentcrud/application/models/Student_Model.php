<?php

class Student_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function fetch()
    {
        return $this->db->get('students')->result();
    }

    public function get($RollNo)
    {
        $query = $this->db->get_where('students', array('roll_no' => $RollNo));
        $StudentRow = $query->row();

        return $StudentRow;
    }

    public function update($RollNo, $data)
    {
        $this->db->where('roll_no', $RollNo);
        $this->db->update('students', $data);
        // foreach ($whereClause as $columnName => $columnValue) {
        //     $this->db->where($columnName, $columnValue);
        // }
    }

    public function delete($RollNo)
    {
        $this->db->where('roll_no', $RollNo);
        $this->db->delete('students');
    }

    public function create($data)
    {
        $this->db->insert('students', $data);
    }
}
