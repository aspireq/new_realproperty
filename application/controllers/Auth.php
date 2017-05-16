<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() { 
        parent::__construct();
        // Load required CI libraries and helpers.
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->auth = new stdClass;
        $this->load->library('flexi_auth');
        $this->data = null;
        // Redirect users logged in via password (However, not 'Remember me' users, as they may wish to login properly).
        if ($this->flexi_auth->is_logged_in_via_password() && uri_string() != 'index/logout') {
            // Preserve any flashdata messages so they are passed to the redirect page.
            if ($this->session->flashdata('message')) {
                $this->session->keep_flashdata('message');
            }
            // Redirect logged in admins (For security, admin users should always sign in via Password rather than 'Remember me'.
            if ($this->flexi_auth->is_admin()) {
                $this->data['userinfo'] = $this->flexi_auth->get_user_by_identity_row_array();
            } else {
                redirect('index/logout');
            }
        }
    }

    function index() {
        $this->login();
    }

    function include_files() {
        $this->data['header'] = $this->load->view('includes/header', $this->data, TRUE);
        $this->data['footer'] = $this->load->view('includes/footer', $this->data, TRUE);
        return $this->data;
    }

    /**
     * login
     * Login page used by all user types to log into their account.
     * This demo includes 3 example accounts that can be logged into via using either their email address or username. The login details are provided within the view page.
     * Users without an account can register for a new account.
     * Note: This page is only accessible to users who are not currently logged in, else they will be redirected.
     */
    function login() {

        if ($this->input->post()) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->login();
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->data = $this->include_files();
        $this->load->view('login', $this->data);
    }

    function home() {
        $this->data = $this->include_files();
        $this->load->view('index', $this->data);
    }

    function add_property() {
        if ($this->flexi_auth->is_logged_in()) {
            // set random number for propety 
            // later used to upload images and videos for reffrence no.          
            $this->data['unitsinfo'] = $this->Common_model->select_all('units');
            $this->data['project_amenities'] = $this->Common_model->select_all('project_amenities');
            $this->data['flat_amenities'] = $this->Common_model->select_all('flat_amenities');
            if ($this->input->post()) {
                $project_amenities = implode(',', $this->input->post('project_amenities'));
                $flat_amenities = implode(',', $this->input->post('flat_amenities'));
                $properties_info = $this->session->userdata('property_data');
                $property_data = array();
                $property_data['added_by'] = 1;
                $property_data['added_as'] = $this->input->post('user_type');
                $property_data['property_type'] = $this->input->post('property_type');
                $property_data['property_type_name'] = $this->input->post('residentialpropery');
                $property_data['project_name'] = $this->input->post('project_name');
                $property_data['property_location'] = $this->input->post('property_location');
                $property_data['property_address'] = $this->input->post('property_address');
                $property_data['property_neardesc'] = $this->input->post('property_neardesc');
                $property_data['property_type'] = $this->input->post('property_type');
                $property_data['bedrooms'] = $this->input->post('bedrooms');
                $property_data['bathrooms'] = $this->input->post('bathrooms');
                $property_data['balconies'] = $this->input->post('balconies');
                $property_data['price'] = $this->input->post('expected_price');
                $property_data['price_per_sqft'] = $this->input->post('squrefeet_price');
                $property_data['property_description'] = $this->input->post('final_description');
                $property_data['availability'] = $this->input->post('availability');
                $property_data['property_configuration'] = $this->input->post('propery_configuration');

                if ($this->input->post('plot_area')) {
                    $property_data['plot_area'] = $this->input->post('plot_area');
                    $property_data['plot_area_unit'] = $this->input->post('plot_area_unit');
                }
                if ($this->input->post('builtuparea')) {
                    $property_data['build_up_area'] = $this->input->post('builtuparea');
                    $property_data['build_up_area_unit'] = $this->input->post('builtuparea_unit');
                }
                if ($this->input->post('carpet_area')) {
                    $property_data['carpet_area'] = $this->input->post('carpet_area');
                    $property_data['carpet_area_unit'] = $this->input->post('carpet_area_unit');
                }
                if ($this->input->post('extra_detail') && $this->input->post('extra_detail') == 1 && $this->input->post('total_floor')) {
                    $property_data['total_floor'] = $this->input->post('total_floor');
                    $property_data['property_on_floor'] = $this->input->post('property_on_floor');
                }
                if ($this->input->post('no_parking')) {
                    $property_data['no_parking'] = $this->input->post('no_parking');
                }
                if ($this->input->post('covered_parking') && $this->input->post('covered_parking') == 1) {
                    $property_data['covered_parking'] = $this->input->post('covered_parking');
                    $property_data['covered_parking_count'] = $this->input->post('covered_parking_count');
                }
                if ($this->input->post('open_parking') && $this->input->post('open_parking') == 1) {
                    $property_data['open_parking'] = $this->input->post('open_parking');
                    $property_data['open_parking_count'] = $this->input->post('open_parking_count');
                }
                if ($this->input->post('available_from_value') && $this->input->post('available_from_value') != "") {
                    $property_data['availability'] = $this->input->post('available_from_value');
                }
                if ($this->input->post('furnishing') && $this->input->post('furnishing') != "") {
                    $property_data['furnishing'] = $this->input->post('furnishing');
                }
                if ($this->input->post('pooja_room')) {
                    $property_data['pooja_room'] = $this->input->post('pooja_room');
                }
                if ($this->input->post('study_room')) {
                    $property_data['study_room'] = $this->input->post('study_room');
                }
                if ($this->input->post('servent_room')) {
                    $property_data['servent_room'] = $this->input->post('servent_room');
                }
                if ($this->input->post('store_room')) {
                    $property_data['store_room'] = $this->input->post('store_room');
                }
                if ($this->input->post('other_room')) {
                    $property_data['other_room'] = $this->input->post('other_room');
                }
                if ($this->input->post('maintenance_amount')) {
                    $property_data['maintenance_amount'] = $this->input->post('maintenance_amount');
                    $property_data['maintenance_type'] = $this->input->post('maintenance_type');
                }
                if (!empty($project_amenities)) {
                    $property_data['project_amenities'] = $project_amenities;
                }
                if (!empty($flat_amenities)) {
                    $property_data['flat_amenities'] = $flat_amenities;
                }
                if (!empty($property_data)) {
                    $property_id = $this->Common_model->insert_record('properties', $property_data);
                    $update_images = $this->Common_model->select_update('property_images', array('property_id' => $property_id), array('property_unique_no' => $properties_info['property_unique_no']));
                    $update_videos = $this->Common_model->select_update('property_videos', array('property_id' => $property_id), array('property_unique_no' => $properties_info['property_unique_no']));
                }
                if ($property_id) {
                    $this->session->set_flashdata('message', "Property added successfully");
                } else {
                    $this->session->set_flashdata('message', "Something went wrong! please try again later.");
                }
                //unset session info
                $this->session->unset_userdata('property_data');
            }
            $this->data = $this->include_files();
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->load->view('add_property', $this->data);
        } else {
            redirect(base_url());
        }
    }

    function properties_images() {
        $properties_info = $this->session->userdata('property_data');
        if (!empty($_FILES['file']['name'])) {
            $this->load->library('upload');
            $config['upload_path'] = 'includes/properties_images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['max_filename'] = 25;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                $response = strip_tags($error);
                header('HTTP/1.1 500 Internal Server Error');
                header('Content-type: application/json');
                exit(json_encode($response));
            } else {
                $file_info = $this->upload->data();
                $file_name = $file_info['file_name'];
                $add_image = $this->Common_model->insert('property_images', array('image' => $file_name, 'property_unique_no' => $properties_info['property_unique_no']));
                die(json_encode(array('filename' => $file_name)));
            }
        }
    }

    function delete_property_image() {
        print_r($this->input->post());
        die();
    }

    function properties_videos() {
        $properties_info = $this->session->userdata('property_data');
        if (!empty($_FILES['file']['name'])) {
            $this->load->library('upload');
            $config['upload_path'] = 'includes/properties_videos';
            $config['allowed_types'] = 'mp4|3gp|flv|mp3';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $config['max_filename'] = 25;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                echo $error;
                die();
            } else {
                $file_info = $this->upload->data();
                $file_name = $file_info['file_name'];
                $add_video = $this->Common_model->insert('property_videos', array('video' => $file_name, 'property_unique_no' => $properties_info['property_unique_no']));
            }
        }
    }

    function activate_account($user_id, $token = FALSE) {
        // The 3rd activate_user() parameter verifies whether to check '$token' matches the stored database value.
        // This should always be set to TRUE for users verifying their account via email.
        // Only set this variable to FALSE in an admin environment to allow activation of accounts without requiring the activation token.
        $this->flexi_auth->activate_user($user_id, $token, TRUE);
        // Save any public status or error messages (Whilst suppressing any admin messages) to CI's flash session data.
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        redirect('auth');
    }

    function list_properties() {

        $properties_for = $this->input->post('property_type');
        $data = '<label for="" class="col-md-12 control-label">Property Type: </label>';
        $data .= '<div class="col-md-12">';
        $data .= '<ul class="nav nav-tabs" role="tablist" id="list_t_railway">';
        $data .= '<li role="presentation" class="active"><a href="#residential" class="info_link" aria-controls="residential" role="tab" data-toggle="tab" onclick="return set_info(residential)">Residential</a></li>';
        if ($properties_for != "PayingGuest") {
            $data .= '<li role="presentation" id="commer_list"><a href="#commercial" class="info_link" onclick="set_info(commercial)" aria-controls="commercial" role="tab" data-toggle="tab">Commercial</a></li>';
        }
        $data .= '</ul>';
        $data .= '<div class="tab-content">';
        $data .= '<div role="tabpanel" class="tab-pane active" id="residential">';
        $data .= '<div class="simpleradio">';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="residentialappratment" value="Residential Apartment" class="res_property" onclick="residential_propery()"/>';
        $data .= '<label for="residentialappratment">Residential Apartment</label>';
        $data .= '</div>';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="independenthouse" value="Independent House / Villa" class="res_property" onclick="residential_propery()"/>';
        $data .= '<label for="independenthouse">Independent House / Villa</label>';
        $data .= '</div>';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="independentfloor" value="Independent / Builder Floor" class="res_property" onclick="residential_propery()"/>';
        $data .= '<label for="independentfloor">Independent / Builder Floor</label>';
        $data .= '</div>';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="farmhouse" value="Farm House" class="res_property" onclick="residential_propery()"/>';
        $data .= '<label for="farmhouse">Farm House</label>';
        $data .= '</div>';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="studioapparment" value="Studio Apartment" onclick="residential_propery()"/>';
        $data .= '<label for="studioapparment">Studio Apartment</label>';
        $data .= '</div>';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="servicedappart" value="Serviced Apartment" onclick="residential_propery()"/>';
        $data .= '<label for="servicedappart">Serviced Apartment</label>';
        $data .= '</div>';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="other" value="Other" onclick="residential_propery()"/>';
        $data .= '<label for="other">Other</label>';
        $data .= '</div>';
        $data .= '</div>';
        $data .= '</div>';

        if ($properties_for != "PayingGuest") {
            $data .= '<div role="tabpanel" class="tab-pane" id="commercial">';
            $data .= '<div class="simpleradio">';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="commeroffioce" value="Commercial Office/Space" onclick="commercial_property()"/>';
            $data .= '<label for="commeroffioce">Commercial Office/Space</label>';
            $data .= '</div>';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="commershops" value="Commercial Shops" onclick="commercial_property()"/>';
            $data .= '<label for="commershops">Commercial Shops</label>';
            $data .= '</div>';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="commershowroom" value="Commercial Showroom" onclick="commercial_property()"/>';
            $data .= '<label for="commershowroom">Commercial Showroom</label>';
            $data .= '</div>';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="industialland" value="Industrial Land" onclick="commercial_property()"/>';
            $data .= '<label for="industialland">Industrial Land</label>';
            $data .= '</div>';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="warehouse" value="Ware House" onclick="commercial_property()"/>';
            $data .= '<label for="warehouse">Ware House</label>';
            $data .= '</div>';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="hotelresorts" value="Hotel / Resorts" onclick="commercial_property()"/>';
            $data .= '<label for="hotelresorts">Hotel / Resorts</label>';
            $data .= '</div>';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="guesthouse" value="Guest House / Banquet-halls" onclick="commercial_property()"/>';
            $data .= '<label for="guesthouse">Guest House / Banquet-halls</label>';
            $data .= '</div>';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="spaceinmall" value="Space in Mall" onclick="commercial_property()"/>';
            $data .= '<label for="spaceinmall">Space in Mall</label>';
            $data .= '</div>';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="coldstorage" value="Cold Storage" onclick="commercial_property()"/>';
            $data .= '<label for="coldstorage">Cold Storage</label>';
            $data .= '</div>';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="timeshare" value="Time Share" onclick="commercial_property()"/>';
            $data .= '<label for="timeshare">Time Share</label>';
            $data .= '</div>';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="other2" value="Other" onclick="commercial_property()"/>';
            $data .= '<label for="other2">Other</label>';
            $data .= '</div>';
            $data .= '</div>';
            $data .= '</div>';
        }
        $data .= '</div>';
        $data .= '</div>';
        die(json_encode($data));
    }

    function residential_propery() {
        $data = '<div class = "form-group" id = "rent_type">';
        $data .= '<label for = "" class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Willing to rent out to:</label>';
        $data .= '<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        $data .= '<label class = "checkbox-inline">';
        $data .= '<input type = "checkbox" value = "Family" id = "rent_single_family" name = "rent_single_family" checked>Family';
        $data .= '</label>';
        $data .= '<label class = "checkbox-inline">';
        $data .= '<input type = "checkbox" value = "Single Men" name = "rent_single_men" id = "rent_single_men">Single Men';
        $data .= '</label>';
        $data .= '<label class = "checkbox-inline">';
        $data .= '<input type = "checkbox" value = "Single Women" name = "rent_single_women" id = "rent_single_women">Single Women';
        $data .= '</label>';
        $data .= '</div>';
        $data .= '</div>';
        $data .= '<div class = "form-group" id = "argument_type">';
        $data .= '<label for = "" class = "col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Preferred Agreement Type:</label>';
        $data .= '<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        $data .= '<label class = "checkbox-inline">';
        $data .= '<input type = "checkbox" value = "Company lease Agreement" name = "argument_lease" id = "argument_lease" checked>Company lease Agreement</label>';
        $data .= '<label class = "checkbox-inline">';
        $data .= '<input type = "checkbox" value = "Any" name = "arg_type" id = "arg_type">Any</label>';
        $data .= '</div>';
        $data .= '</div>';
        die(json_encode($data));
    }

    function rent_options() {
        $data = '<div class="form-group" id="pg_avail">';
        $data .= '<label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">PG Available For:<sup>*</sup></label>';
        $data .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        $data .= '<label class="radio-inline">';
        $data .= '<input type="radio" name="pg_availability" id="pg_girls" value="Girls" checked> Girls';
        $data .= '</label>';
        $data .= '<label class="radio-inline">';
        $data .= '<input type="radio" name="pg_availability" id="pg_boys" value="Boys"> Boys';
        $data .= '</label>';
        $data .= '<label class="radio-inline">';
        $data .= '<input type="radio" name="pg_availability" id="pg_girlboys" value="Girls & Boys"> Girls &amp; Boys';
        $data .= '</label>';
        $data .= '</div>';
        $data .= '</div>';
        $data .= '<div class="form-group" id="suitable">';
        $data .= '<label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Suitable For:<sup>*</sup></label>';
        $data .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        $data .= '<label class="checkbox-inline">';
        $data .= '<input type="checkbox" value="Students" id="suitable_students" name="suitable_students" checked>Student</label>';
        $data .= '<label class="checkbox-inline">';
        $data .= '<input type="checkbox" value="Working Professionals" id="suitable_working" name="suitable_working">Working Professionals</label>';
        $data .= '</div>';
        $data .= '</div>';
        die(json_encode($data));
    }

    function sell_options() {
        $data = '<div class="form-group" id="property_units">';
        $data .= '<label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Multiple Property Units<sup>*</sup></label>';
        $data .= '<div class="col-md-4">';
        $data .= '<label class="radio-inline">';
        $data .= '<input type="radio" name="property_unit_value" id="property_unit_value_yes" value="1" onclick="set_propery_counts()"> Yes';
        $data .= '</label>';
        $data .= '<label class="radio-inline">';
        $data .= '<input type="radio" name="property_unit_value" id="property_unit_value_no" value="0" onclick="set_propery_counts()" checked > No';
        $data .= '</label>';
        $data .= '</div>';
        $data .= '</div>';
        $data .= '<div class="form-group" id="property_count">';
        $data .= '<label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">No. Of Properies<sup>*</sup></label>';
        $data .= '<div class="col-md-4">';
        $data .= '<input type="text" name="property_count_value" id="property_count_value" class="form-control"  placeholder="Enter No. Of Properies">';
        $data .= '</div>';
        $data .= '</div>';
        die(json_encode($data));
    }

    function resend_activation_token() {
        if ($this->input->post('send_activation_token')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->resend_activation_token();
        }
        // Get any status message that may have been set.
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->load->view('demo/public_examples/resend_activation_token_view', $this->data);
    }

    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	
    // Forgotten Password
    ###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###	

    /**
     * forgotten_password
     * Send user an email to verify their identity. Via a unique link in this email, the user is redirected to the site so they can then reset their password.
     * In this demo, this page is accessed via a link on the login page.
     *
     * Note: This is step 1 of an example of allowing users to reset a forgotten password manually. 
     * See the auto_reset_forgotten_password() function below for an example of directly emailing the user a new randomised password.
     */
    function forgotten_password() {
        // If the 'Forgotten Password' form has been submitted, then email the user a link to reset their password.
        if ($this->input->post('send_forgotten_password')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->forgotten_password();
        }
        // Get any status message that may have been set.
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->load->view('demo/public_examples/forgot_password_view', $this->data);
    }

    /**
     * manual_reset_forgotten_password
     * This is step 2 (The last step) of an example of allowing users to reset a forgotten password manually. 
     * See the auto_reset_forgotten_password() function below for an example of directly emailing the user a new randomised password.
     * In this demo, this page is accessed via a link in the 'views/includes/email/forgot_password.tpl.php' email template, which must be set to 'auth/manual_reset_forgotten_password/...'.
     */
    function manual_reset_forgotten_password($user_id = FALSE, $token = FALSE) {
        // If the 'Change Forgotten Password' form has been submitted, then update the users password.
        if ($this->input->post('change_forgotten_password')) {
            $this->load->model('demo_auth_model');
            $this->demo_auth_model->manual_reset_forgotten_password($user_id, $token);
        }
        $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $this->load->view('demo/public_examples/forgot_password_update_view', $this->data);
    }

    /**
     * auto_reset_forgotten_password
     * This is an example of automatically reseting a users password as a randomised string that is then emailed to the user. 
     * See the manual_reset_forgotten_password() function above for the manual method of changing a forgotten password.
     * In this demo, this page is accessed via a link in the 'views/includes/email/forgot_password.tpl.php' email template, which must be set to 'auth/auto_reset_forgotten_password/...'.
     */
    function auto_reset_forgotten_password($user_id = FALSE, $token = FALSE) {
        // forgotten_password_complete() will validate the token exists and reset the password.
        // To ensure the new password is emailed to the user, set the 4th argument of forgotten_password_complete() to 'TRUE' (The 3rd arg manually sets a new password so set as 'FALSE').
        // If successful, the password will be reset and emailed to the user.
        $this->flexi_auth->forgotten_password_complete($user_id, $token, FALSE, TRUE);

        // Set a message to the CI flashdata so that it is available after the page redirect.
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());

        redirect('auth');
    }

    function logout_session() {
        $this->flexi_auth->logout(FALSE);
        $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
        redirect('auth');
    }

}
