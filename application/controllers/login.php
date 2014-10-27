<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller {

    public function index() {
        $this->load->view('include/head');
        //$this->load->view('include/head_navbar');
        $this->load->view('login');

        $this->load->view('include/footer');
    }

    public function register() {
        foreach ($this->input->post() as $key => $val) {
            $$key = $val;
        }

        $this->load->library("LoginClass", "", "LGC");
        $result = $this->LGC->registerUser($firstname, $lastname, $username, $email, $catId, $password);

        $this->session->set_flashdata("regBox", "true");

        if ($result === "vEmail") {
            $this->session->set_flashdata("msgbox", "warning");
            $this->session->set_flashdata("msgmsg", "This <b>Email</b> already exists in our database");

            redirect(base_url());
        } elseif ($result === "vUsername") {
            $this->session->set_flashdata("msgbox", "warning");
            $this->session->set_flashdata("msgmsg", "This <b>Username</b> is not available");

            redirect(base_url());
        } elseif ($result) {
            $this->session->set_flashdata("regBox", "false");

            $this->session->set_flashdata("msgbox", "success");
            $this->session->set_flashdata("msgmsg", "<b>Successfully Registered</b><br />Please check your email for a verification mail before you can login");

            redirect(base_url());
        }
    }

    public function signin() {
        foreach ($this->input->post() as $key => $val) {
            $$key = $val;
        }

        $this->load->library("LoginClass", "", "LGC");
        $result = $this->LGC->login($username, $password);

        if (is_object($result)) {
            $this->LGC->setSessions($result);

            redirect(base_url("profile/page/$result->username"));
        } elseif (!$result) {
            $this->session->set_flashdata("msgbox", "danger");
            $this->session->set_flashdata("msgmsg", "Invalid Username or Password");

            redirect(base_url("login"));
        } elseif ($result == "pending") {
            $this->session->set_flashdata("msgbox", "warning");
            $this->session->set_flashdata("msgmsg", "<b>Pending Account</b><br />Please verify your account by clicking on the link in your email");

            redirect(base_url("login"));
        } elseif ($result == "inactive") {
            $this->session->set_flashdata("msgbox", "danger");
            $this->session->set_flashdata("msgmsg", "<b>Deactivated Account</b> <br />This account is <b>deactivated</b>. Please Contact the administrator");

            redirect(base_url("login"));
        }
    }

    function logout() {
        $this->load->library("LoginClass", "", "LGC");
        $this->LGC->destroySessions();

        redirect(base_url());
    }

    function ajaxVerifyUsernameEmail($usernameEmail) {
        if ($this->input->get('type') == "email") {
            $username_email = "email";
        } else {
            $username_email = "username";
        }
        $this->load->model('Login_model', 'LGM', TRUE);

        $result = $this->LGM->verifyUsernameEmail($usernameEmail, $username_email);

        echo $result;
    }

    function mustLogin($reason = "") {
        if ($reason == "") {
            $doThat = "do that";
        } elseif ($reason == "follow") {
            $doThat = "follow a user";
        } else {
            $doThat = "do that";
        }
        $this->session->set_flashdata("msgbox", "info");
        $this->session->set_flashdata("msgmsg", "<b>Please Log in or <a href='#' class='regBtn'>register</a></b><br />You must be logged in to " . $doThat . ".");

        redirect(base_url());
    }

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */