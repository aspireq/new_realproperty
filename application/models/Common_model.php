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

    function get_properties($property_zone, $property_type = null, $location = null, $property_status = null) {
        $this->db->select();
        $this->db->from('properties');
        $this->db->where('status', 1);
        $this->db->where('property_zone', $property_zone);
        if ($property_type != "") {
            $this->db->where('property_type_name', $property_type);
        }
        if ($location != "") {
            $this->db->where('city_name', $location);
        }
        if ($property_status != "") {
            $this->db->where('availability', $property_status);
        }
        $qry = $this->db->get();
        $final_data = array();
        foreach ($qry->result() as $key => $row) {
            $final_data[$key] = $row;
            $result_arr = $this->db->query('select image as image from property_images where property_id = "' . $row->id . '"')->row();
            if (!empty($result_arr)) {
                $final_data[$key]->image = $result_arr->image;
            }
            if ($row->plot_area != null && $row->plot_area != "" && $row->plot_area != 0) {
                $plot_area_name = $this->db->query('select short_name as plot_area_unit_name from  units where id = "' . $row->plot_area_unit . '"')->row();
                $final_data[$key]->plot_area_unit_name = $plot_area_name->plot_area_unit_name;
            }
            if ($row->property_zone != null && $row->property_zone != "") {
                $zone = $this->db->query('select name as zone_name from  city_area where id = "' . $row->property_zone . '"')->row();
                $final_data[$key]->zone_name = $zone->zone_name;
            }
        }
        return $final_data;
    }

    function get_properties_list() {
        $this->db->select();
        $this->db->from('properties');
        $this->db->where('status', 1);
        $qry = $this->db->get();
        $final_data = array();
        foreach ($qry->result() as $key => $row) {
            $final_data[$key] = $row;
            $result_arr = $this->db->query('select image as image from property_images where property_id = "' . $row->id . '"')->row();
            if (!empty($result_arr)) {
                $final_data[$key]->image = $result_arr->image;
            }
            if ($row->plot_area != null && $row->plot_area != "" && $row->plot_area != 0) {
                $plot_area_name = $this->db->query('select short_name as plot_area_unit_name from  units where id = "' . $row->plot_area_unit . '"')->row();
                $final_data[$key]->plot_area_unit_name = $plot_area_name->plot_area_unit_name;
            }
            if ($row->property_zone != null && $row->property_zone != "") {
                $zone = $this->db->query('select name as zone_name from  city_area where id = "' . $row->property_zone . '"')->row();
                $final_data[$key]->zone_name = $zone->zone_name;
            }
        }
        return $final_data;
    }

    function get_property($property_id) {
        $this->db->select();
        $this->db->from('properties');
        $this->db->where('status', 1);
        $this->db->where('id', $property_id);
        $qry = $this->db->get();
        $row = $qry->row();
        $result_arr = $this->db->query('select image as image from property_images where property_id = "' . $row->id . '"')->row();
        if (!empty($result_arr)) {
            $row->image = $result_arr->image;
        }
        if ($row->plot_area != null && $row->plot_area != "" && $row->plot_area != 0) {
            $plot_area_name = $this->db->query('select short_name as plot_area_unit_name from  units where id = "' . $row->plot_area_unit . '"')->row();
            $row->plot_area_unit_name = $plot_area_name->plot_area_unit_name;
        }
        if ($row->property_zone != null && $row->property_zone != "") {
            $zone = $this->db->query('select name as zone_name from  city_area where id = "' . $row->property_zone . '"')->row();
            $row->zone_name = $zone->name;
        }
//        if ($row->added_by != null && $row->added_by != "") {
//            $builder_name = $this->db->query('select company_name as company_name,total_projects as total_projects,establishment_year as establishment_year,description as builder_description,uacc_username as builder_name from user_accounts where uacc_id = "' . $row->added_by . '"')->row();
//            $row->builder_name = $builder_name->builder_name;
//            $row->builder_description = $builder_name->builder_description;
//            $row->establishment_year = $builder_name->establishment_year;
//            $row->total_projects = $builder_name->total_projects;
//            $row->company_name = $builder_name->company_name;
//        }
        if ($row->build_up_area != null && $row->build_up_area != "" && $row->build_up_area != 0) {
            $build_up_area_name = $this->db->query('select short_name as build_up_area_unit_name from  units where id = "' . $row->build_up_area_unit . '"')->row();
            $row->build_up_area_unit_name = $build_up_area_name->build_up_area_unit_name;
        }
        if ($row->carpet_area != null && $row->carpet_area != "" && $row->carpet_area != 0) {
            $carpet_area_name = $this->db->query('select short_name as carpet_area_unit_name from  units where id = "' . $row->carpet_area_unit . '"')->row();
            $row->carpet_area_unit_name = $carpet_area_name->carpet_area_unit_name;
        }
        if ($row->project_amenities != "" && $row->project_amenities != null) {
            $project_amenities = $this->db->query('select name as project_amenities from project_amenities where id in (' . $row->project_amenities . ')')->result_array();
            if (!empty($project_amenities)) {
                $row->project_amenities = $project_amenities;
            }
        }
        if ($row->flat_amenities != "" && $row->flat_amenities != null) {
            $flat_amenities = $this->db->query('select name as flat_amenities from flat_amenities where id in (' . $row->flat_amenities . ')')->result_array();
            if (!empty($flat_amenities)) {
                $row->flat_amenities = $flat_amenities;
            }
        }
        return $row;
    }

    function get_locations() {
        $result = $this->db->query('SELECT DISTINCT(`city_name`) FROM `properties` where `city_name` != ""');
        return $result->result();
    }

    function excluse_ad_data($limit = null, $start = null) {
        if ($limit != null || $start != null) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get('advertizement');
        if ($query->num_rows() > 0) {
            $final_data = array();
            foreach ($query->result() as $key => $row) {
                $data[] = $row;
                $final_data[$key] = $row;
            }
            $final_data['counts'] = $query->num_rows();
            return $final_data;
        }
        return false;
    }

    function property_data($limit = null, $start = null) {
        if ($limit != null || $start != null) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get('properties');
        if ($query->num_rows() > 0) {
            $final_data = array();
            foreach ($query->result() as $key => $row) {
                $data[] = $row;
                $final_data[$key] = $row;
            }
            $final_data['counts'] = $query->num_rows();
            return $final_data;
        }
        return false;
    }

    function get_cities() {
        $query = $this->db->query("SELECT cities.city_name, city_area.name,city_area.id as area_id FROM cities INNER JOIN city_area ON cities.id = city_area.city_id ORDER BY city_name, cities.id");
        return $query->result_array();
    }

}
