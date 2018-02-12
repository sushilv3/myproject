<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('userName')) {
            redirect('login');
        }

        $this->load->view('tmpl/message');
        $this->load->view('tmpl/header');
    }
}
