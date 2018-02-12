<?php

class Registration_Ctrl extends CI_Controller
{
    public function regForm()
    {
        echo '<h1>Registration Form</h1>';
        $this->load->view('reg/registration-form');
    }

    public function add()
    {
        $name = $this->input->post('name');
        $userName = $this->input->post('user_name');
        $userPassword = $this->input->post('user_password');
        $data = array('name' => $name, 'username' => $userName, 'password' => md5($userPassword));
        $this->load->model('Registration_Model');
        $this->Registration_Model->create($data);
        redirect('colleges/list');
    }

    public function loginForm()
    {
        $this->load->view('tmpl/login-header');

        $this->load->view('reg/login-form');
        // echo '<h1>Login Form</h1>';
    }

    public function login()
    {
        $userName = $this->input->post('user_name');
        $password = $this->input->post('user_password');
        $this->load->model('Registration_Model');
        $userRecord = $this->Registration_Model->getOne(array('username' => $userName));
        $encryptedPassword = md5($password);
        // echo $encryptedPassword;
        // print_r($userRecord);
        if ($userRecord->password === md5($password)) {
            echo 'login';
            $this->session->set_userdata('userName', $userName);
            redirect('colleges/list');
        } else {
            $this->session->set_userdata('userName', '');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function kodeCampForm()
    {
        $this->load->view('reg/kode-registration');
    }

    private function imgConfig()
    {
        echo 'logeed in';
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 40960000;
        $config['max_width'] = 1080;
        $config['max_height'] = 1920;

        return $config;
    }

    private function upload($config, $fileControlName)
    {
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($fileControlName)) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('kode-registration', $error);
        } else {
            $data = $this->upload->data();

            // $this->load->view('upload_success', $data);
        }

        return $data;
    }

    public function kodeCampLogin()
    {
        $config = $this->imgConfig();
        $profilePicUpdateData = $this->upload($config, 'profile_pic');
        $documentPicUploadData = $this->upload($config, 'file_bws');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $course = $this->input->post('course');
        $profile_pic = $profilePicUpdateData['file_name'];

        $fileBws = $documentPicUploadData['file_name'];
        $this->load->model('KodeReg_Model');
        $data = array('name' => $name, 'email' => $email, 'password' => $password, 'course' => $course, 'profile_pic' => $profile_pic, 'file_brw' => $fileBws);
        $this->KodeReg_Model->create($data);
        // print_r($data);
        redirect('kodecamp/list');
    }

    public function registrationList()
    {
        $this->load->model('KodeReg_Model');
        $data['RegDetails'] = $this->KodeReg_Model->getAll();
        $this->load->view('reg/registration-list', $data);
        echo json_encode($data);
    }

    public function testview()
    {
        $this->load->view('reg/upload-file-test');
    }

    public function test()
    {
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);

        $this->upload->do_upload($this->input->post('profile_pic'));
        redirect('colleges/list');
    }

    public function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 500;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_pic')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }
    }

    public function serveAjaxRequest()
    {
        echo '<h1> Hello World </h1>';
    }
}
