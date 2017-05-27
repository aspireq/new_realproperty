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
            if ($this->flexi_auth->is_logged_in()) {
                $this->data['userinfo'] = $this->flexi_auth->get_user_by_identity_row_array();
                $this->user_id = $this->data['userinfo']['uacc_id'];
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

    function profile() {
        if ($this->flexi_auth->is_logged_in()) {
            if ($this->input->post()) {
                $user_data = array(
                    "website" => $this->input->post('website'),
                    "contact_no" => $this->input->post('contact_no')
                );
                $result = $this->Common_model->select_update('user_accounts', $user_data, array('uacc_id' => $this->user_id));
                redirect('auth/profile');
            }
            $this->data = $this->include_files();
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->load->view('profile', $this->data);
        } else {
            $this->session->set_flashdata('message', "Please login to post your property.");
            redirect(base_url() . 'login');
        }
    }

    function advertizement() {
        if ($this->flexi_auth->is_logged_in() && $this->data['userinfo']['uacc_group_fk'] == 3) {
            $this->load->library('pagination');
            $config = array();
            $config["base_url"] = base_url() . "auth/advertizement";
            $config["per_page"] = 5;
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

            $total_row = $this->Common_model->excluse_ad_data('', '');
            $config["total_rows"] = $total_row['counts'];
            $config['num_links'] = $total_row['counts'];
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->data["results"] = $this->Common_model->excluse_ad_data($config["per_page"], $page);
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $this->data["links"] = explode('&nbsp;', $str_links);

            if ($this->input->post()) {
                $ad_data = $this->data['ad_data'] = array(
                    "ad_type" => $this->input->post('ad_type'),
                    "name" => $this->input->post('name'));
                if (!empty($_FILES['image']['name'])) {
                    $this->load->library('upload');
                    $config['upload_path'] = 'includes/exclusive_ad';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['overwrite'] = FALSE;
                    $config['encrypt_name'] = TRUE;
                    $config['max_filename'] = 25;
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('image')) {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', $error);
                    } else {
                        $file_info = $this->upload->data();
                        $ad_data['image'] = $file_info['file_name'];
                    }
                }
                if ($this->input->post('edit_id')) {
                    if (isset($ad_data['image'])) {
                        if (file_exists(FCPATH . 'includes/exclusive_ad/' . $this->input->post('old_image'))) {
                            unlink(FCPATH . 'includes/exclusive_ad/' . $this->input->post('old_image'));
                        }
                        $ad_data['image'] = $file_info['file_name'];
                    } else {
                        $ad_data['image'] = $this->input->post('old_image');
                    }
                    $result = $this->Common_model->select_update('advertizement', $ad_data, array('id' => $this->input->post('edit_id')));
                } else {
                    $result = $this->Common_model->insert('advertizement', $ad_data);
                }
                if (!empty($result)) {
                    $this->session->set_flashdata('message', "Exclusvie Ad Added Successfully");
                } else {
                    $this->session->set_flashdata('message', "Something went wrong,Please try again later");
                }
                redirect('auth/advertizement');
            }
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->data = $this->include_files();
            $this->load->view('advertizement', $this->data);
        } else {
            $this->session->set_flashdata('message', "Please login as admin to access this area.");
            redirect(base_url() . 'login');
        }
    }

    function add_property($edit_property_id = null) {
        if ($this->flexi_auth->is_logged_in()) {
            // set random number for propety 
            // later used to upload images and videos for reffrence no.
            $this->data['ablums'] = $this->Common_model->get_cities();
            $this->data['unitsinfo'] = $this->Common_model->select_all('units');
            $this->data['project_amenities'] = $this->Common_model->select_all('project_amenities');
            $this->data['flat_amenities'] = $this->Common_model->select_all('flat_amenities');
            if ($this->input->post()) {
                $project_amenities = implode(',', $this->input->post('project_amenities'));
                $flat_amenities = implode(',', $this->input->post('flat_amenities'));
                $properties_info = $this->session->userdata('property_data');
                $property_data = array();
                $property_data['added_by'] = $this->user_id;
                $property_data['added_as'] = $this->input->post('user_type');
                $property_data['property_zone'] = $this->input->post('property_zone');
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
                $property_data['booking_amount'] = $this->input->post('booking_amount');
                $property_data['property_age'] = $this->input->post('property_age');

                $property_data['builder_name'] = $this->input->post('builder_name');
                $property_data['builder_company_name'] = $this->input->post('builder_company_name');

                $property_data['bank_interest'] = $this->input->post('bank_interest');
                $property_data['bank_interest'] = $this->input->post('bank_interest');

                if ($this->input->post('builder_email')) {
                    $property_data['builder_email'] = $this->input->post('builder_email');
                }
                if ($this->input->post('total_projects')) {
                    $property_data['total_projects'] = $this->input->post('total_projects');
                }
                if ($this->input->post('establishment_year')) {
                    $property_data['establishment_year'] = $this->input->post('establishment_year');
                }
                if ($this->input->post('builder_description')) {
                    $property_data['builder_description'] = $this->input->post('builder_description');
                }
                if ($this->input->post('property_unit_value') == '1') {
                    $property_data['multiple_property_units'] = $this->input->post('property_unit_value');
                    $property_data['no_of_units'] = $this->input->post('property_count_value');
                }
                if ($this->input->post('plot_area')) {
                    $property_data['plot_area'] = $this->input->post('plot_area');
                    $property_data['plot_area_unit'] = $this->input->post('plot_area_unit');
                }
                if ($this->input->post('builtuparea')) {
                    $property_data['build_up_area'] = $this->input->post('builtuparea');
                    $property_data['build_up_area_unit'] = $this->input->post('builtuparea_unit');
                }
                if ($this->input->post('security_deposit_amount')) {
                    $property_data['security_deposit_amount'] = $this->input->post('security_deposit_amount');
                    $property_data['security_deposit_type'] = $this->input->post('security_deposit_type');
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
                    $property_data['available_from'] = $this->input->post('available_from_value');
                    $property_data['availability'] = $this->input->post('availability');
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
                if ($this->input->post('area_name')) {
                    $property_data['area_name'] = $this->input->post('area_name');
                }
                if ($this->input->post('city_name')) {
                    $property_data['city_name'] = $this->input->post('city_name');
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
                if (!empty($_FILES['builder_image']['name'])) {
                    $this->load->library('upload');
                    $config['upload_path'] = 'includes/builder_images';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['overwrite'] = FALSE;
                    $config['encrypt_name'] = TRUE;
                    $config['max_filename'] = 25;
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('builder_image')) {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', $error);
                    } else {
                        $file_info = $this->upload->data();
                        $property_data['builder_image'] = $file_info['file_name'];
                        if ($this->input->post('edit_id') != "") {
                            if (file_exists(FCPATH . 'includes/builder_images/' . $this->input->post('old_builder_image'))) {
                                unlink(FCPATH . 'includes/builder_images/' . $this->input->post('old_builder_image'));
                            }
                        }
                    }
                } else if ($this->input->post('old_builder_image')) {
                    $property_data['builder_image'] = $this->input->post('old_builder_image');
                }
                if (!empty($property_data)) {
                    if ($this->input->post('edit_id') != "") {
                        $old_images_post = $this->input->post('old_property_images');
                        $old_images_table = $this->db->query("select image from property_images where property_id = '" . $this->input->post('edit_id') . "'")->result_array();
                        if (!empty($old_images_post)) {
                            $final_images = array_diff(array_column($old_images_table, 'image'), $old_images_post);
                        } else {
                            $final_images = array_column($old_images_table, 'image');
                        }
                        foreach ($final_images as $row_image) {
                            if (file_exists(FCPATH . 'includes/properties_images/' . $row_image)) {
                                unlink(FCPATH . 'includes/properties_images/' . $row_image);
                                $this->Common_model->delete_where('property_images', array('property_id' => $this->input->post('edit_id'), 'image' => $row_image));
                            }
                        }
                        $old_nearby_images = $this->input->post('old_nearby_images');
                        $old_images_table = $this->db->query("select image from property_nearby where property_id = '" . $this->input->post('edit_id') . "'")->result_array();
                        if (!empty($old_nearby_images)) {
                            $final_images = array_diff(array_column($old_images_table, 'image'), $old_nearby_images);
                        } else {
                            $final_images = array_column($old_images_table, 'image');
                        }
                        foreach ($final_images as $row_image) {
                            if (file_exists(FCPATH . 'includes/property_nearby/' . $row_image)) {
                                unlink(FCPATH . 'includes/property_nearby/' . $row_image);
                                $this->Common_model->delete_where('property_nearby', array('property_id' => $this->input->post('edit_id'), 'image' => $row_image));
                            }
                        }
                        $old_property_videos = $this->input->post('old_property_videos');
                        $old_images_table = $this->db->query("select video from property_videos where property_id = '" . $this->input->post('edit_id') . "'")->result_array();
                        if (!empty($old_property_videos)) {
                            $final_images = array_diff(array_column($old_images_table, 'video'), $old_property_videos);
                        } else {
                            $final_images = array_column($old_images_table, 'video');
                        }
                        foreach ($final_images as $row_image) {
                            if (file_exists(FCPATH . 'includes/properties_videos/' . $row_image)) {
                                unlink(FCPATH . 'includes/properties_videos/' . $row_image);
                                $this->Common_model->delete_where('property_videos', array('property_id' => $this->input->post('edit_id'), 'video' => $row_image));
                            }
                        }
                        $property_id = $this->Common_model->select_update('properties', $property_data, array('id' => $this->input->post('edit_id')));
                        $property_id = $this->input->post('edit_id');
                    } else {
                        $property_id = $this->Common_model->insert_record('properties', $property_data);
                    }
                    $update_images = $this->Common_model->select_update('property_images', array('property_id' => $property_id), array('property_unique_no' => $properties_info['property_unique_no']));
                    $update_videos = $this->Common_model->select_update('property_videos', array('property_id' => $property_id), array('property_unique_no' => $properties_info['property_unique_no']));
                    $update_nearbny = $this->Common_model->select_update('property_nearby', array('property_id' => $property_id), array('property_unique_no' => $properties_info['property_unique_no']));
                }
                if ($property_id) {
                    $this->session->set_flashdata('message', "Property added successfully");
                } else {
                    $this->session->set_flashdata('message', "Something went wrong! please try again later.");
                }
                //unset session info
                $this->session->unset_userdata('property_data');
            }
            if ($edit_property_id != null) {
                $this->data['propertyinfo'] = $this->Common_model->select_where_row('properties', array('id' => $edit_property_id));
                $this->data['property_images'] = $this->Common_model->select_where('property_images', array('property_id' => $edit_property_id));
                $this->data['property_nearby'] = $this->Common_model->select_where('property_nearby', array('property_id' => $edit_property_id));
                $this->data['property_videos'] = $this->Common_model->select_where('property_videos', array('property_id' => $edit_property_id));
            }
            $this->data = $this->include_files();
            $this->data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $this->load->view('add_property', $this->data);
        } else {
            $this->session->set_flashdata('message', "Please login to post your property.");
            redirect(base_url() . 'login');
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
                die(json_encode(array('filename' => $file_name, 'got_image' => true)));
            }
        }
    }

    function properties_nearby() {
        $properties_info = $this->session->userdata('property_data');
        if (!empty($_FILES['file']['name'])) {
            $this->load->library('upload');
            $config['upload_path'] = 'includes/property_nearby';
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
                $add_image = $this->Common_model->insert('property_nearby', array('image' => $file_name, 'property_unique_no' => $properties_info['property_unique_no']));
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
            $config['allowed_types'] = 'mp4|3gp|flv';
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
                $add_video = $this->Common_model->insert('property_videos', array('video' => $file_name, 'property_unique_no' => $properties_info['property_unique_no']));
            }
        }
    }

    function list_properties() {

        $properties_for = $this->input->post('property_type');
        $property_type_name = "";
        if ($this->input->post('property_type_name')) {
            $property_type_name = $this->input->post('property_type_name');
        }

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
        $checked = ($property_type_name != "" && $property_type_name == "Residential Apartment") ? 'checked' : '';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="residentialappratment" value="Residential Apartment" class="res_property" onclick="residential_propery()" ' . "$checked" . ' />';
        $data .= '<label for="residentialappratment">Residential Apartment</label>';
        $data .= '</div>';
        $checked = ($property_type_name != "" && $property_type_name == "Independent House / Villa") ? 'checked' : '';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="independenthouse" value="Independent House / Villa" class="res_property" onclick="residential_propery()" ' . "$checked" . ' />';
        $data .= '<label for="independenthouse">Independent House / Villa</label>';
        $data .= '</div>';
        $checked = ($property_type_name != "" && $property_type_name == "Independent / Builder Floor") ? 'checked' : '';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="independentfloor" value="Independent / Builder Floor" class="res_property" onclick="residential_propery()" ' . "$checked" . ' />';
        $data .= '<label for="independentfloor">Independent / Builder Floor</label>';
        $data .= '</div>';
        $checked = ($property_type_name != "" && $property_type_name == "Farm House") ? 'checked' : '';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="farmhouse" value="Farm House" class="res_property" onclick="residential_propery()" ' . "$checked" . ' />';
        $data .= '<label for="farmhouse">Farm House</label>';
        $data .= '</div>';
        $checked = ($property_type_name != "" && $property_type_name == "Studio Apartment") ? 'checked' : '';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="studioapparment" value="Studio Apartment" onclick="residential_propery()" ' . "$checked" . ' />';
        $data .= '<label for="studioapparment">Studio Apartment</label>';
        $data .= '</div>';
        $checked = ($property_type_name != "" && $property_type_name == "Serviced Apartment") ? 'checked' : '';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="servicedappart" value="Serviced Apartment" onclick="residential_propery()" ' . "$checked" . ' />';
        $data .= '<label for="servicedappart">Serviced Apartment</label>';
        $data .= '</div>';
        $checked = ($property_type_name != "" && $property_type_name == "Other") ? 'checked' : '';
        $data .= '<div class="simpleradio-danger">';
        $data .= '<input type="radio" name="residentialpropery" id="other" value="Other" onclick="residential_propery()"/>';
        $data .= '<label for="other">Other</label>';
        $data .= '</div>';
        $data .= '</div>';
        $data .= '</div>';

        if ($properties_for != "PayingGuest") {
            $data .= '<div role="tabpanel" class="tab-pane" id="commercial">';
            $checked = ($property_type_name != "" && $property_type_name == "Commercial Office/Space") ? 'checked' : '';
            $data .= '<div class="simpleradio">';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="commeroffioce" value="Commercial Office/Space" onclick="commercial_property()" ' . "$checked" . ' />';
            $data .= '<label for="commeroffioce">Commercial Office/Space</label>';
            $data .= '</div>';
            $checked = ($property_type_name != "" && $property_type_name == "Commercial Shops") ? 'checked' : '';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="commershops" value="Commercial Shops" onclick="commercial_property()" ' . "$checked" . ' />';
            $data .= '<label for="commershops">Commercial Shops</label>';
            $data .= '</div>';
            $checked = ($property_type_name != "" && $property_type_name == "Commercial Showroom") ? 'checked' : '';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="commershowroom" value="Commercial Showroom" onclick="commercial_property()" ' . "$checked" . ' />';
            $data .= '<label for="commershowroom">Commercial Showroom</label>';
            $data .= '</div>';
            $checked = ($property_type_name != "" && $property_type_name == "Industrial Land") ? 'checked' : '';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="industialland" value="Industrial Land" onclick="commercial_property()" ' . "$checked" . ' />';
            $data .= '<label for="industialland">Industrial Land</label>';
            $data .= '</div>';
            $checked = ($property_type_name != "" && $property_type_name == "Ware House") ? 'checked' : '';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="warehouse" value="Ware House" onclick="commercial_property()" ' . "$checked" . ' />';
            $data .= '<label for="warehouse">Ware House</label>';
            $data .= '</div>';
            $checked = ($property_type_name != "" && $property_type_name == "Hotel / Resorts") ? 'checked' : '';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="hotelresorts" value="Hotel / Resorts" onclick="commercial_property()" ' . "$checked" . ' />';
            $data .= '<label for="hotelresorts">Hotel / Resorts</label>';
            $data .= '</div>';
            $checked = ($property_type_name != "" && $property_type_name == "Guest House / Banquet-halls") ? 'checked' : '';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="guesthouse" value="Guest House / Banquet-halls" onclick="commercial_property()" ' . "$checked" . ' />';
            $data .= '<label for="guesthouse">Guest House / Banquet-halls</label>';
            $data .= '</div>';
            $checked = ($property_type_name != "" && $property_type_name == "Space in Mall") ? 'checked' : '';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="spaceinmall" value="Space in Mall" onclick="commercial_property()" ' . "$checked" . ' />';
            $data .= '<label for="spaceinmall">Space in Mall</label>';
            $data .= '</div>';
            $checked = ($property_type_name != "" && $property_type_name == "Cold Storage") ? 'checked' : '';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="coldstorage" value="Cold Storage" onclick="commercial_property()" ' . "$checked" . ' />';
            $data .= '<label for="coldstorage">Cold Storage</label>';
            $data .= '</div>';
            $checked = ($property_type_name != "" && $property_type_name == "Time Share") ? 'checked' : '';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="timeshare" value="Time Share" onclick="commercial_property()" ' . "$checked" . ' />';
            $data .= '<label for="timeshare">Time Share</label>';
            $data .= '</div>';
            $checked = ($property_type_name != "" && $property_type_name == "Other") ? 'checked' : '';
            $data .= '<div class="simpleradio-danger">';
            $data .= '<input type="radio" name="residentialpropery" id="other2" value="Other" onclick="commercial_property()" ' . "$checked" . ' />';
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

        $multiple_property_units = $this->input->post('multiple_property_units');
        $no_of_units = $this->input->post('no_of_units');
        if ($no_of_units == "") {
            $no_of_units = "";
        }

        $checked = ($multiple_property_units != "" && $multiple_property_units == "1") ? 'checked' : '';
        $data = '<div class="form-group" id="property_units">';
        $data .= '<label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Multiple Property Units<sup>*</sup></label>';
        $data .= '<div class="col-md-4">';
        $data .= '<label class="radio-inline">';
        $data .= '<input type="radio" name="property_unit_value" id="property_unit_value_yes" value="1" onclick="set_propery_counts()" ' . "$checked" . ' > Yes';
        $data .= '</label>';
        $checked = ($multiple_property_units == "") ? 'checked' : '';
        $data .= '<label class="radio-inline">';
        $data .= '<input type="radio" name="property_unit_value" id="property_unit_value_no" value="0" onclick="set_propery_counts()" ' . "$checked" . '> No';
        $data .= '</label>';
        $data .= '</div>';
        $data .= '</div>';
        $data .= '<div class="form-group" id="property_count">';
        $data .= '<label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">No. Of Properies<sup>*</sup></label>';
        $data .= '<div class="col-md-4">';
        $data .= '<input type="text" name="property_count_value" id="property_count_value" class="form-control"  placeholder="Enter No. Of Properies" value="' . $no_of_units . '">';
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

    function get_record() {
        $data = $this->Common_model->select_where_row($this->input->post('table_name'), array('id' => $this->input->post('id')));
        die(json_encode($data));
    }

    function property_operation() {
        $type = $this->input->post('record_change_type');
        $record_id = $this->input->post('record_id');
        $table_name = $this->input->post('table_name');
        $page_url = $this->input->post('page_url');
        $image_folder = explode(',', $this->input->post('image_folder'));
        $table_names = explode(',', $this->input->post('table_names'));
        $propertyinfo = $this->Common_model->select_where_row($table_name, array('id' => $record_id));
        if ($type === 'Delete') {
            if (!empty($image_folder)) {
                foreach ($image_folder as $key => $folder_name) {
                    $data = $this->Common_model->select_where($table_names[$key], array('property_id' => $record_id));
                    if (!empty($data)) {
                        if ($folder_name == "properties_videos") {
                            foreach ($data as $video) {
                                if ($video->video != "" && file_exists(FCPATH . 'includes/' . $folder_name . '/' . $video->video)) {
                                    unlink(FCPATH . 'includes/' . $folder_name . '/' . $video->video);
                                }
                            }
                        } else {
                            foreach ($data as $image) {
                                if ($image->image != "" && file_exists(FCPATH . 'includes/' . $folder_name . '/' . $image->image)) {
                                    unlink(FCPATH . 'includes/' . $folder_name . '/' . $image->image);
                                }
                            }
                        }
                    }
                }
            }
            $this->Common_model->delete_where($table_name, array('id' => $record_id));
            $this->session->set_flashdata('message', "Record deleted successfully !");
        } else if ($type === 'Status') {
            if ($propertyinfo->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
            $this->Common_model->select_update($table_name, array('status' => $status), array('id' => $record_id));
            $this->session->set_flashdata('message', "Status updated successfully !");
        }
        redirect($page_url);
    }

    function record_change() {
        $type = $this->input->post('record_change_type');
        $record_id = $this->input->post('record_id');
        $table_name = $this->input->post('table_name');
        $page_url = $this->input->post('page_url');
        $image_folder = $this->input->post('image_folder');
        $data = $this->Common_model->select_where_row($table_name, array('id' => $record_id));
        if ($type === 'Delete') {
            if ($image_folder != "") {
                if ($data->image != "" && file_exists(FCPATH . 'includes/' . $image_folder . '/' . $data->image)) {
                    unlink(FCPATH . 'includes/' . $image_folder . '/' . $data->image);
                }
            }
            $this->Common_model->delete_where($table_name, array('id' => $record_id));
            $this->session->set_flashdata('message', "Record deleted successfully !");
        } else if ($type === 'Status') {
            if ($data->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
            $this->Common_model->select_update($table_name, array('status' => $status), array('id' => $record_id));
            $this->session->set_flashdata('message', "Status updated successfully !");
        }
        redirect($page_url);
    }

    function property_images() {
        $property_id = 1;
        $data = (array) $this->Common_model->select_where('property_images', array('property_id' => $property_id));
        die(json_encode($data));
    }

}
