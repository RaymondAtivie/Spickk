<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends MY_Controller {

    public function index() {                
        $this->load->library("GalleryClass", "", "GLC");
        $data['user_images'] = $this->GLC->getAllImages();
        $dataC['c'] = "flow";
        
        $this->load->view('include/head');
        $this->load->view('include/head_navbar');

        $this->load->view("include/breadcrumbs", $dataC);
        $this->load->view('gallery', $data);

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }
    
    public function following() {
        $data['user_images'] = $this->userObj->getFollowingImages();
        $dataC['c'] = "following";
        
        $this->load->view('include/head');
        $this->load->view('include/head_navbar');
        
        $this->load->view("include/breadcrumbs", $dataC);
        $this->load->view('gallery', $data);

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }

    public function image($image_id) {
        $this->load->library("imageClass", "", "IMC");
        $data['image'] = $this->IMC->getImage($image_id);
        
        $data['image']->addView();
        
        $this->load->view('include/head');
        $this->load->view('include/head_navbar');        
        
        $this->load->view('image', $data);

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }
    
    public function search() {
        $search = trim($this->input->post("search"));
        
        $this->load->library("GalleryClass", "", "GLC");
        $data['user_images'] = $this->GLC->searchImages($search);
        $dataC['term'] = $search;
        if(is_array($data['user_images'])){
            $count = count($data['user_images']);
        }else{
            $count = 0;
        }
        $dataC['searchCount'] = $count;
        
        $this->load->view('include/head');
        $this->load->view('include/head_navbar');
        
        $this->load->view("search", $dataC);
        $this->load->view('gallery', $data);

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */