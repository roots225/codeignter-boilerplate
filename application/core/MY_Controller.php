<?php
defined("BASEPATH") or exit("No direct script access allowed");

class MY_Controller extends CI_Controller{

    public $_data = [];

    public function __construct(){
        parent::__construct();

        // load somes needed libraries
        $this->load->library(['ion_auth', 'form_validation', 'language']);

        //load somes needed helpers
        $this->load->helper(['inflector', 'string']);

    }

    public function _render($theview = 'pages/home', $template = 'public'){

        if($this->input->is_ajax_request() || (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') || 'json'){

            echo json_encode($this->_data);

        }elseif($template === null){
            $this->load->view($view, $this->_data);
        }else{
            $this->load->view('layouts/'.$template.'_header', $this->_data);
            $this->load->view($theview, $this->_data);
            $this->load->view('layouts/'.$template.'_footer', $this->_data);
        }
    }
}

class Public_Controller extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
}

class Admin_Controller extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
}