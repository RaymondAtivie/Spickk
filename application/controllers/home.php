<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    public function index() {
        $this->load->view('include/head');

        $this->load->view('login');

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }

    public function errorPage() {
        $this->load->view('include/head');
        $this->load->view('include/head_navbar');

        $this->load->view("error_404");

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */