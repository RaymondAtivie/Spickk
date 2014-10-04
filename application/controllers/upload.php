<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends MY_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->loggedIn) {
            $ds = DIRECTORY_SEPARATOR;  //1
            $username = $this->userObj->username;
            $this->tmp_dir = "collection" . $ds . "tmp" . $ds . $username . $ds;
        }
    }

    public function index() {
        if (!$this->loggedIn) {
            show_404("505");
        }

        $data['albums'] = $this->userObj->getAlbums();

        $this->load->view('include/head');
        $this->load->view('include/head_navbar');

        $this->load->view("upload/index", $data);

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }

    public function fileUpload() {
        if (!is_dir($this->tmp_dir)) {
            mkdir($this->tmp_dir);
        }

        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];          //3             

            $targetPath = $this->tmp_dir . DIRECTORY_SEPARATOR;  //4
            $targetFile = $targetPath . $_FILES['file']['name'];  //5

            move_uploaded_file($tempFile, $targetFile); //6
        }

        //THE FILE IS NOW IN THE USERS TEMPORARY FOLDER
    }

    public function discard($file = "") {
        if ($file != "") {
            $file = urldecode($file);
            $file = $file . "." . $_GET['ext'];
            echo $file;
            $this->emptyTmpFolder($file);
        } else {
            $this->emptyTmpFolder();

            $this->session->set_flashdata("msgbox", 'info');
            $this->session->set_flashdata("msgmsg", "Images have been discarded");

            redirect(base_url('upload'));
        }
    }

    private function emptyTmpFolder($sFile = "") {
        if ($sFile != "") {
            unlink($this->tmp_dir . $sFile);
        } else {
            $files = glob($this->tmp_dir . "*"); // get all file names

            foreach ($files as $file) { // iterate files
                if (is_file($file)) {
                    unlink($file); // delete file
                }
            }

            rmdir($this->tmp_dir); //Deleted the directory
            //DELETES ALL FILES FOR USER
        }
    }

    public function work() {
        $files = scandir($this->tmp_dir);

        foreach ($files as $f => $v) {
            if ($v != "." && $v != "..") {
                $newFiles[] = $this->tmp_dir . $v;
            }
        }
        $num_files = count($newFiles);
        if ($num_files < 1) {
            $this->session->set_flashdata("msgbox", 'info');
            $this->session->set_flashdata("msgmsg", "<b>No files added</b><br />Please add files to upload");

            redirect(base_url("upload"));
        } elseif (!is_array($this->input->post())) {
            $this->session->set_flashdata("msgbox", 'info');
            $this->session->set_flashdata("msgmsg", "<b>Please select an album and click next</b>");

            redirect(base_url("upload"));
        } else {
            foreach ($this->input->post() as $k => $v) {
                $$k = trim($v);
            }

            $this->load->library("ImageClass", "", "IMC");
            if ($album_id == '0') {
                if ($album_name != "") {
                    $album_id = $this->IMC->createAlbum($album_name, $album_description, $this->userObj->id);
                } else {
                    $album_id = $this->userObj->getGeneralAlbum()->id;
                }
            }

            $data['defaultAlbum'] = $this->IMC->getAlbum($album_id);
            $data['userAlbums'] = $this->userObj->getAlbums();

            $data['files'] = $newFiles;
            $data['num_files'] = $num_files;

            $this->load->view("include/head");
            $this->load->view("include/head_navbar");

            $this->load->view("upload/upload", $data);

            $this->load->view("include/foot");
            $this->load->view("include/footer");
        }
    }

    public function uploadImages() {
        ini_set('memory_limit', '-1');
        $this->load->library("ImageClass", "", "IMC");
        $files = $this->input->post();

        //Rearrange arrays incase of deleted file
        foreach ($files as $key => $array) {
            $i = 0;
            foreach ($array as $k => $v) {
                $newFiles[$key][$i] = $v;
                $i++;
            }
        }

        $count = count($newFiles['file']);

        for ($i = 0; $i < $count; $i++) {

            $file = $newFiles['file'][$i];
            $title = $newFiles['title'][$i];
            $description = $newFiles['description'][$i];
            $tags = $newFiles['tags'][$i];
            $album_id = $newFiles['album_id'][$i];

            if ($this->IMC->uploadImage($file, $title, $description, $tags, $this->userObj->id, $album_id)) {
                $tResult[] = $title;
            } else {
                $fResult[] = $title;
            }
        }
        $t = count($tResult);
        $f = count($fResult);

        if ($t > 0) {
            $this->session->set_flashdata("msgbox", 'success');
            $this->session->set_flashdata("msgmsg", "<b>Images Uploaded</b><br />$t image(s) were uploaded successfull"
                    . "<br /><b>" . implode(", ", $tResult) . "</b>");
        }

        if ($f > 0) {
            $this->session->set_flashdata("msgboxDanger", 'danger');
            $this->session->set_flashdata("msgmsgDanger", "$f image(s) failed to upload"
                    . "<br /><b>" . implode(", ", $fResult) . "</b>");
        }

        $this->emptyTmpFolder();

        redirect(base_url('upload'));
    }

}

/* End of file upload.php */
/* Location: ./application/controllers/upload.php */