<?php
class Lokasi extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model('mberita');
        $this->load->model('m_config');
    }
	function index(){
		$x['paket']=$this->mberita->paket_footer();
		$x['berita']=$this->mberita->berita_footer();
		$x['photo']=$this->mberita->get_photo();
		$x['site'] = $this->m_config->list_config();
		
		
		$this->load->view('front/v_lokasi',$x);
	}
}