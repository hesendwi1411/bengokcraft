<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
         
        $this->load->model('m_config');
    }
    function index(){
	    if($this->session->userdata('akses')=='1'){
		
	    		$x['site'] = $this->m_config->list_config();
		
		$this->load->view('backend/v_locations',$x);
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

	function update_locations(){
        if($this->session->userdata('akses')=='1'){
			$site = $this->m_config->list_config();
            $config_id=$this->input->post('config_id');
            $google_maps=$this->input->post('google_maps');
            $this->m_config->edit_locations($config_id,$google_maps);
            $x['site'] = $this->m_config->list_config();
		
		$this->load->view('backend/v_locations',$x);
        }else{
            echo "Halaman tidak ditemukan";
        }
    }	
	// General Config
	public function update_config() {
		if($this->session->userdata('akses')=='1'){
		$site = $this->m_config->list_config();
			$config_id=$this->input->post('config_id');
            $nameweb=$this->input->post('nameweb');
			$singkatanweb=$this->input->post('singkatanweb');
			$email=$this->input->post('email');
			$phone_number=$this->input->post('phone_number');
			$fax=$this->input->post('fax');
			$metatext=$this->input->post('metatext');
			$keywords=$this->input->post('keywords');
			$about=$this->input->post('about');
			
			$this->m_config->update_config($config_id,$nameweb,$singkatanweb,$email,$phone_number,$fax,$metatext,$keywords,$about);
			
		 $x['site'] = $this->m_config->list_config();
		
		$this->load->view('backend/v_config',$x);
		
		}else{
			 echo "Halaman tidak ditemukan";
		}
	}
	function config(){
        if($this->session->userdata('akses')=='1'){
           $x['site'] = $this->m_config->list_config();
		
		$this->load->view('backend/v_config',$x);
        }else{
            echo "Halaman tidak ditemukan";
        }
    }	
	function locations(){
        if($this->session->userdata('akses')=='1'){
           $x['site'] = $this->m_config->list_config();
		
		$this->load->view('backend/v_locations',$x);
        }else{
            echo "Halaman tidak ditemukan";
        }
    }	
	
		
}