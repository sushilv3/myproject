<?php

class Index_Ctrl extends MY_Controller
{
    public function __contruct()
    {
        // $this->load->model('Core_Model');
    }

    public function index()
    {
        $this->load->view('index');
    }
}
