<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Config Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_config extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Config
        public function list_config() {
            $this->db->select('*');
            $this->db->from('config');
            $this->db->order_by('config_id','ASC');
            $query = $this->db->get();
            return $query->row_array();
        }
		function edit_locations($config_id,$google_maps){
        $query=$this->db->query("update config set google_maps='$google_maps' where config_id='$config_id'");
        return $query;
    }
        // Edit Config
       function update_config($config_id,$nameweb,$singkatanweb,$email,$phone_number,$fax,$metatext,$keywords,$about){
        $query=$this->db->query("update config set nameweb='$nameweb',singkatanweb='$singkatanweb',email='$email',phone_number='$phone_number',fax='$fax',metatext='$metatext',keywords='$keywords',about='$about' where config_id='$config_id'");
        return $query;
    }

    }
