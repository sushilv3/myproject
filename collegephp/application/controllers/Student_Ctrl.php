<?php

class Student_Ctrl extends MY_Controller
{
    // public function list($reg_no)
    // {
    //     $this->load->model('Student_Model');
    //     $data['students'] = $this->Student_Model->getWhere(array('reg_no' => $reg_no));
    //     // $this->load->view('tmpl/header');
    //     $this->load->view('student/student-list', $data);
    //     $this->load->view('tmpl/footer');
    // }

    public function list()
    {
        $this->load->model('Student_Model');
        $data['students'] = $this->Student_Model->getAll();
        // $this->load->view('tmpl/header');
        $this->load->view('student/student-list', $data);
        $this->load->view('tmpl/footer');
    }

    public function searchBy()
    {
        $criteriaColumn = $this->input->post('criteriaColumn');
        $searchText = $this->input->post('searchText');
        $this->load->model('College_Model');
        $data['colleges'] = $this->College_Model->searchBy($criteriaColumn, $searchText);
        // assign single value in associative value
        // $data['searchValue'] = $searchText;
        $this->collegeView($data);
        // print_r($data);
    }
}
