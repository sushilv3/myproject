<?php

class Courses_Ctrl extends MY_Controller
{
    public function list($reg_no)
    {
        $this->load->model('CollegeCourses_Model');
        $courses = $this->CollegeCourses_Model->getWhere(array('reg_no' => $reg_no));
        $courseCodes = array();
        foreach ($courses as $course) {
            array_push($courseCodes, $course->course_code);
        }
        $this->load->model('Courses_Model');
        $data['courses'] = $this->Courses_Model->getWhereIn('course_code', $courseCodes);

        // $data['students'] = $this->Course_Model->getWhere(array('reg_no' => $reg_no));
        $this->load->view('tmpl/header');
        $this->load->view('course/course-list', $data);
        $this->load->view('tmpl/footer');
        // print_r($courses);
    }
}
