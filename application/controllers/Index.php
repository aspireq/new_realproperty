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

        $this->data['property_ad'] = $this->Common_model->get_properties_list();

        if ($this->flexi_auth->is_logged_in()) {
            $this->data['userinfo'] = $this->flexi_auth->get_user_by_identity_row_array();
            $this->user_id = $this->data['userinfo']['uacc_id'];
        }
    }

    function include_files() {
        $this->data['header'] = $this->load->view('includes/header', $this->data, TRUE);
        $this->data['footer'] = $this->load->view('includes/footer', $this->data, TRUE);
        return $this->data;
    }

    public function index() {
        $this->data['exlusive_ads'] = $this->Common_model->select_where('advertizement', array('ad_type' => 2, 'status' => 1));
        $this->data['property_ads'] = $this->Common_model->select_where('advertizement', array('ad_type' => 1, 'status' => 1));
        $this->data['locations'] = $this->Common_model->get_locations();
        if ($this->input->post()) {
            $property_type = $this->input->post('property_type');
            $location = $this->input->post('location');
            $property_status = $this->input->post('property_status');
            //$this->data['properties'] = $this->Common_model->get_properties($property_type, $location, $property_status);
            $final_data = array();
            $zones = $this->Common_model->select_all('city_area');
            foreach ($zones as $key => $zone) {
                $properties = $this->Common_model->get_properties($zone->id, $property_type, $location, $property_status);
                if (!empty($properties)) {
                    $final_data[$key] = $properties;
                }
            }
            $this->data['properties'] = $final_data;
        } else {
            $final_data = array();
            $zones = $this->Common_model->select_all('city_area');
            foreach ($zones as $key => $zone) {
                $properties = $this->Common_model->get_properties($zone->id);
                if (!empty($properties)) {
                    $final_data[$key] = $properties;
                }
            }
            $this->data['properties'] = $final_data;
        }
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
        if ($this->flexi_auth->is_logged_in() && $this->data['userinfo']['uacc_group_fk'] == 3) {
            $this->load->library('pagination');
            $config = array();
            $config["base_url"] = base_url() . "index/property";
            $config["per_page"] = 10;
            $config['use_page_numbers'] = FALSE;

            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '&nbsp;<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $total_row = $this->Common_model->property_data('', '');
            $config["total_rows"] = $total_row['counts'];
            $config['num_links'] = $total_row['counts'];
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->data["results"] = $this->Common_model->property_data($config["per_page"], $page);
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $this->data["links"] = explode('&nbsp;', $str_links);
            $this->data = $this->include_files();
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->load->view('verify_property', $this->data);
        } else {

            $properties = $this->Common_model->get_properties_list();
            $this->data = $this->include_files();
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $if = array();
            $else = array();
            foreach ($properties as $property) {
                if (($property->fromdate <= date('Y-m-d')) && ($property->todate >= date('Y-m-d'))) {
                    $a = $array['a'] = $property;
                    array_push($if, $a);
                } else {
                    $b = $array['b'] = $property;
                    array_push($else, $b);
                }
            }
            $result = $this->data['result'] = array_merge($if, $else);
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->load->view('property', $this->data);
        }
    }

    public function get_pay_mode() {
        $id = $this->input->post('id');
//          echo $id;
        $paymode = $this->data['paymode'] = $this->Common_model->select_where_row('properties', array('id' => $id));
        die(json_encode($paymode));
    }

    // payments mode
    public function pay_mode() {

        $this->load->library('form_validation');
        if ($this->input->post()) {
            $id = $this->input->post('id');
            $formdata = $this->data['formdata'] = array(
                'paid' => $this->input->post('paid'),
                'todate' => $this->input->post('todate'),
                'fromdate' => $this->input->post('fromdate')
            );
            $result = $this->data['result'] = $this->Common_model->select_update('properties', $formdata, array('id' => $this->input->post('id')));
        }
        redirect(base_url() . "properties/");
    }

    function activate_account($user_id, $token = FALSE) {
        // The 3rd activate_user() parameter verifies whether to check '$token' matches the stored database value.
        // This should always be set to TRUE for users verifying their account via email.
        // Only set this variable to FALSE in an admin environment to allow activation of accounts without requiring the activation token.
        $this->flexi_auth->activate_user($user_id, $token, TRUE);
        // Save any public status or error messages (Whilst suppressing any admin messages) to CI's flash session data.
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        redirect(base_url());
    }

    function propertydetails($property_id = null) {
        $this->data['propertyinfo'] = $this->Common_model->get_property($property_id);
        $this->data['property_images'] = $this->Common_model->select_where('property_images', array('property_id' => $property_id));
        $this->data['property_nearby'] = $this->Common_model->select_where('property_nearby', array('property_id' => $property_id));
        $this->data['bank_offers'] = $this->Common_model->get_bank_offers($property_id);
        if ($this->input->post()) {
            $property_email = $this->Common_model->select_where_row('user_accounts', array('uacc_id' => $this->data['propertyinfo']->added_by));
            $subject = 'property.realgujarat - ' . 'Property Inquiry';
            $message = "Contact Info   \n";
            $message .= "Name  : " . $this->input->post('name') . "\n";
            $message .= "Email : " . $this->input->post('emailid') . "\n";
            $message .= "Contact No. : " . $this->input->post('phoneno') . "\n";
            $message .= "\r";
            $message .= "Message : " . "Customer showed intereset in '" . $this->data['propertyinfo']->project_name . "'. Contact the client on given contact no.";

            $headers = 'From: ' . From_Email . '' . "\r\n" .
                    'Reply-To: ' . Reply_Email . '' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            if (mail(Owner_Email, $subject, $message, $headers) && mail($property_email->uacc_email, $subject, $message, $headers)) {
                $this->session->set_flashdata('message', "Email has been sent successfully");
            } else {
                $this->session->set_flashdata('message', "Something went wrong,please try again later");
            }
        }
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
        if ($this->input->post()) {
            $subject = 'property.realgujarat - ' . $this->input->post('subject');
            $message = "Contact Info   \n";
            $message .= "Name  : " . $this->input->post('name') . "\n";
            $message .= "Email : " . $this->input->post('email') . "\n";
            $message .= "Contact No. : " . $this->input->post('contact_no') . "\n";
            $message .= "\r";
            $message .= "Message : " . $this->input->post('message');

            $headers = 'From: ' . From_Email . '' . "\r\n" .
                    'Reply-To: ' . Reply_Email . '' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            if (mail(Owner_Email, $subject, $message, $headers)) {
                $this->session->set_flashdata('message', "Email has been sent successfully");
            } else {
                $this->session->set_flashdata('message', "Something went wrong,please try again later");
            }
        }
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
        redirect(base_url() . 'login');
    }

}
