<?php

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();

        //load models
        // Load required CI libraries and helpers.
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->auth = new stdClass;

        // Load 'standard' flexi auth library by default.
        $this->load->library('flexi_auth');

        // Note: This is only included to create base urls for purposes of this demo only and are not necessarily considered as 'Best practice'.
        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));
        // Define a global variable to store data that is then used by the end view page.
        $this->data = null;
        
        if($this->flexi_auth->is_logged_in()) {
            $this->data['userinfo'] = $this->flexi_auth->get_user_by_identity_row_array();
        }
    }

    function include_files() {
        $this->data['header'] = $this->load->view('includes/header', $this->data, TRUE);
        $this->data['footer'] = $this->load->view('includes/footer', $this->data, TRUE);
        return $this->data;
    }

    public function index() {
        $this->load->library('flexi_auth');
        $parent_user_id = 0;

        $this->data['current_user'] = $this->flexi_auth->get_user_by_identity_row_array();
        $parent_user_id = $this->flexi_auth->get_user_id();
        if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'auth/logout') {
            $this->data['parent_user_id'] = $this->flexi_auth->get_user_id();
            $this->data['groupId'] = $this->flexi_auth->get_user_group_id();
        }
        $this->load->view('includes/include_file', $this->data);
        $this->load->view('index', $this->data);
    }

    function home() {
        $this->data = $this->include_files();
        $this->load->view('index', $this->data);
    }

    function login() {
        if ($this->input->post()) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->login();
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('login', $this->data);
    }

    function property() {
        $this->data['properties'] = $this->Common_model->get_properties();        
//        echo "<pre>";
//        print_r($this->data['properties']);
//        die();
        $this->data = $this->include_files();
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->load->view('property', $this->data);
    }

    function propertydetails($property_id = null) {
        echo $property_id;die();
        $this->data['header'] = $this->load->view('properties/header', NULL, TRUE);
        $this->data['footer'] = $this->load->view('properties/footer', NULL, TRUE);
        $this->load->view('properydetaiils', $this->data);
    }

    function register() {
        if ($this->flexi_auth->is_logged_in()) {
            redirect('auth');
        } else if ($this->input->post()) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->register_account();
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('register', $this->data);
    }

    function aboutus() {
        $this->data = $this->include_files();
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->load->view('aboutus', $this->data);
    }

    function virtualview() {
        $this->data = $this->include_files();
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->load->view('virtualview', $this->data);
    }

    function contactus() {
        $this->data = $this->include_files();
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->load->view('contactus', $this->data);
    }

    function visitors() {
        $this->data = $this->include_files();
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->load->view('visitors', $this->data);
    }

    function exhibitors() {
        $this->data = $this->include_files();
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->load->view('exhibitors', $this->data);
    }

    function logout() {
        $this->flexi_auth->logout(TRUE);
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        redirect(base_url().'login');
    }

}
