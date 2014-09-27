<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends MY_Controller {

    public function index() {                
        $this->load->library("imageClass", "", "IMC");
        $data['user_images'] = $this->IMC->getAllImages();
        $data['c'] = "flow";
        
        $this->load->view('include/head');
        $this->load->view('include/head_navbar');

        $this->load->view('gallery', $data);

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }
    
    public function following() {
        $data['user_images'] = $this->userObj->getFollowingImages();
        $data['c'] = "following";
        
        $this->load->view('include/head');
        $this->load->view('include/head_navbar');

        $this->load->view('gallery', $data);

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }

    public function image($image_id) {
        $this->load->library("imageClass", "", "IMC");
        $data['image'] = $this->IMC->getImage($image_id);
        
        $this->load->view('include/head');
        $this->load->view('include/head_navbar');        
        
        $this->load->view('image', $data);

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */