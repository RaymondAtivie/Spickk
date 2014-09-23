<?php

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if ($this->session->userdata("logged_in") == "yes") {
            $this->userObj = unserialize($this->session->userdata("userObj"));
        }
    }

    function fixObject(&$object) {
        if (!is_object($object) && gettype($object) == 'object')
            return ($object = unserialize(serialize($object)));
        return $object;
    }

//...
}
