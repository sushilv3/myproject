<?php

class Student_Ctrl extends CI_Controller
{
    public function list()
    {
        $this->load->model('Student_Model');
        $data['rows'] = $this->Student_Model->fetch();
        $this->load->view('tmpl/header');
        $this->load->view('student/list', $data);
    }

    public function updateForm()
    {
        echo 'update form method';
        $this->load->view('tmpl/header');
        $RollNo = $this->input->post('roll_no');
        $this->load->model('Student_Model');
        $StudentRow = $this->Student_Model->get($RollNo);
        $data['student'] = $StudentRow;
        $this->load->view('student/update-form', $data);
    }

    public function edit()
    {
        // echo 'edit function called...';

        $ActionValue = $this->input->post('action');
        // echo 'Action value:'.$ActionValue."\n";
        if ($ActionValue === 'delete') {
            $this->delete();
        } elseif ($ActionValue === 'update') {
            $this->update();
        }
    }

    public function update()
    {
        // echo 'update function called...';
        $RollNo = $this->input->post('roll_no');

        $Name = $this->input->post('name');

        $Address = $this->input->post('address');
        $data = array('name' => $Name, 'address' => $Address);
        $this->load->model('Student_Model');
        // $this->Student_Model->update(array('roll_no' => $RollNo), $data);
        $this->Student_Model->update($RollNo, $data);
        redirect('student/list');
    }

    public function delete()
    {
        // echo 'delete function called...';
        $RollNo = $this->input->post('roll_no');
        $this->load->model('Student_Model');
        $this->Student_Model->delete($RollNo);
        redirect('student/list');
    }

    public function addForm()
    {
        $this->load->view('tmpl/header');
        $this->load->view('student/add-form');
    }

    public function addData()
    {
        $rollNo = $this->input->post('roll_no');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $courseCode = $this->input->post('course_code');
        $data = array('roll_no' => $rollNo, 'name' => $name, 'address' => $address, 'course_code' => $courseCode);
        $this->load->model('Student_Model');
        $this->Student_Model->create($data);
    }
}
