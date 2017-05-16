<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model {

    public function &__get($key) {
        $CI = & get_instance();
        return $CI->$key;
    }

    function select_all($tbl) {
        $data = $this->db->get($tbl);
        return $data->result();
    }

    function select_where($table, $id) {
        $qry = $this->db->get_where($table, $id);
        $respond = $qry->result();
        return $respond;
    }

    function select_where_row($table, $id) {
        $qry = $this->db->get_where($table, $id);
        return $qry->row();
    }

    function select_update($table, $data, $id) {
        $query = $this->db->update($table, $data, $id);
        return $query;
    }

    function insert($table, $data) {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    function insert_record($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function delete_where($tbl, $where) {
        $query = $this->db->delete($tbl, $where);
        return $query;
    }

    function get_properties() {
        $this->db->select();
        $this->db->from('properties');
        $this->db->where('status', 1);
        $qry = $this->db->get();
        $final_data = array();
        foreach ($qry->result() as $key => $row) {
            $final_data[$key] = $row;
            $result_arr = $this->db->query('select image as image from property_images where property_id = "' . $row->id . '"')->row();            
            $final_data[$key]->image = $result_arr->image;            
        }
        return $final_data;
    }

}
