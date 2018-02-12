<?php

class College_Ctrl extends My_Controller
{
    //$pageSize define how many rows display in one page(currnet page)
    private $pageSize = 4;
    private $whereClause = '';

    public function __construct()
    {
        parent::__construct();
    }

    // This is a common method which is invoked on each button call
    // and on the basis of action attribute value it redirects to desired route.
    public function executeAction()
    {
        $action = $this->input->post('action');
        $regNo = $this->input->post('reg_no');
        if ($action === 'update') {
            $this->updateForm();
        } elseif ($action === 'courses') {
            redirect("courses/$regNo");
        } elseif ($action === 'students') {
            redirect("students/$regNo");
        }
    }

    public function list()
    {
        // $this->load->model('College_Model');
        // $data['colleges'] = $this->College_Model->getAll();
        // $data['currentPage'] = 1;
        // $this->collegeView($data);
        // print_r($data);

        $this->session->set_userdata('whereClause', '');
        $this->paginate();
    }

    private function collegeView($data)
    {
        $data['pageSize'] = $this->pageSize;
        // $this->load->view('tmpl/header');
        $this->load->view('college/colleges-list', $data);

        $this->load->view('tmpl/footer');
    }

    public function searchBy($currentPage = 0)
    {
        $criteriaColumn = $this->input->post('criteriaColumn');
        $searchText = $this->input->post('searchText');
        $this->load->model('College_Model');
        $whereClause = 'location like '."'%".$searchText.'%'."'";
        $this->session->set_userdata('whereClause', $whereClause);
        // $data['colleges'] = $this->College_Model->getPageData($criteriaColumn, $currentPage, $pageSize);
        // assign single value in associative value
        // $data['searchValue'] = $searchText;
        $this->paginate();
        // $this->collegeView($data);
        // print_r($data);
    }

    public function updateForm()
    {
        $reg_no = $this->input->post('reg_no');
        $this->load->model('College_Model');

        $collegeRow = $this->College_Model->getOne(array('reg_no' => $reg_no));
        $data['college'] = $collegeRow;
        // $this->load->view('tmpl/header');
        $this->load->view('/college/update-form', $data);
        $this->load->view('tmpl/footer');
    }

    public function update()
    {
        if ($this->setValidationRules() == false) {
            // $this->load->view('template/header');
            // $this->load->view('/student/add', $data);
            // do not display double field message
            $this->addForm(false);

            return;
        }
        $regNo = $this->input->post('reg_no');
        $name = $this->input->post('name');

        $location = $this->input->post('location');
        $this->load->model('College_Model');
        $data = array('name' => $name, 'location' => $location);
        $this->College_Model->update(array('reg_no' => $regNo), $data);
        // redirect('http://localhost/collegephp/colleges');
        $this->session->set_flashdata('message', 'Record Updated successfully.');
        redirect('colleges/list');
    }

    public function edit()
    {
        $actionValue = $this->input->post('action');
        //actionValue is button name and 'update' is button value
        if ($actionValue === 'update') {
            $this->update();
        } elseif ($actionValue === 'delete') {
            $this->delete();
        }
    }

    public function delete()
    {
        $regNo = $this->input->post('reg_no');
        $this->load->model('College_Model');

        echo 'before error';
        try {
            $value = $this->College_Model->delete(array('reg_no' => $regNo));
        } catch (Exception $ex) {
            echo 'Error Occured';
        }
    }

    public function addForm()
    {
        // $this->load->view('tmpl/header');
        $this->load->view('college/add');
    }

    public function add()
    {
        echo 'add';
        if ($this->setValidationRules() == false) {
            // $this->load->view('template/header');
            // $this->load->view('/student/add', $data);
            // do not display double field message
            $this->addForm(false);

            return;
        }
        $regNo = $this->input->post('reg_no');
        $name = $this->input->post('name');

        if ($regNo == $name) {
            $this->addForm(false);

            return;
        }
        $address = $this->input->post('location');
        // $this->load->view('college/add');
        $data = array('reg_no' => $regNo, 'name' => $name, 'location' => $address);
        $this->load->model('College_Model');
        $this->College_Model->create($data);
        $this->session->set_flashdata('message', 'Record added successfully.');
        redirect('colleges/list');
    }

    public function setValidationRules()
    {
        $this->form_validation->set_rules('reg_no',
                                          'Reg No',
                                                                                                        //callback is keyword and doesnotExist is medthod
                                            //   array('trim', 'required', 'min_length[5]', 'max_length[15]', 'callback_doesExist'),
                                            //validation type               //callback is keyword and doesnotExist is medthod 'doesExiste' for customer validation
                                          array('trim', 'required', 'min_length[5]', 'max_length[15]', 'callback_doesExist'),
                                            //validation type with message
                                          array('max_length' => '%s field is graterthen 15 character.',
                                                'required' => '%s is mandatory.Please enter it.',
                                                'doesExist' => '%s is a existing user. You can not use it.', ));
        $this->form_validation->set_rules('name',
                                          'Name',
                                          array('trim', 'required', 'min_length[5]', 'max_length[30]', 'callback_doesExist'),
                                          array('max_length' => '%s field is graterthen 15 character',
                                          'required' => '%s is mandatory.Please enter it.s ',
                                          'doesExist' => '%s is a existing user. You can not use it.', ));
        $this->form_validation->set_rules('location',
                                          'Address',
                                          array('required', 'min_length[5]', 'max_length[30]', 'callback_doesExist'),
                                          array('max_length' => '%s field is graterthen 15 character',
                                                'required' => '%s is mandatory.Please enter it.',
                                                'doesExist' => '%s is a existing user. You can not use it.', ));

        return $this->form_validation->run();
    }

    public function doesExist($fieldValue)
    {
        // echo $fieldValue;
        // $this->form_validation->set_message('doesExist', 'The {field} field can not be the word "test"');
        $this->load->model('College_Model');
        //this doesExist method pass value in model function
        $doesExist = $this->College_Model->doesExist($fieldValue);

        echo $doesExist;

        return !$doesExist;
    }

    // public function index()
    // {
    //     $this->load->view('index');
    // }
    // pagination consist two method <next> and <privious>
    public function paginate($currentPage = 0)
    {
        $whereClause = $this->session->userdata('whereClause');
        // print_r('++++++++++++++++++ where clause : '.$whereClause);
        $this->load->model('College_Model');
        $data['colleges'] = $this->College_Model->getPageData($currentPage, $this->pageSize, $whereClause);
        $data['currentPage'] = $currentPage;

        $this->collegeView($data);
    }

    // public function previous($currentPage)
    // {
    //     $this->load->model('College_Model');
    //     $data['colleges'] = $this->College_Model->getPageData($currentPage);
    //     $data['currentPage'] = $currentPage;
    //     $this->collegeView($data);
    // }
}
