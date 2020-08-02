<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('Mberita');
		$this->load->model('Mtestimoni');
		$this->load->model('M_pengunjung');
    }
	public function index(){
		$user_ip=$_SERVER['REMOTE_ADDR'];
		if ($this->agent->is_browser()){
		    $agent = $this->agent->browser();
		}elseif ($this->agent->is_robot()){
		    $agent = $this->agent->robot(); 
		}elseif ($this->agent->is_mobile()){
		    $agent = $this->agent->mobile();
		}else{
			$agent='Other';
		}
		$cek_ip=$this->M_pengunjung->cek_ip($user_ip);
		$cek=$cek_ip->num_rows();
		if($cek > 0){
			$x['paket']=$this->Mberita->paket_footer();
			$x['berita']=$this->Mberita->berita_footer();
			$x['photo']=$this->Mberita->get_photo();

			$x['test']=$this->Mtestimoni->tampil_test();
			$x['wisata']=$this->Mberita->get_wisata();
			$x['news']=$this->Mberita->berita();
			$this->load->view('front/home',$x);
		}else{
			$this->M_pengunjung->simpan_user_agent($user_ip,$agent);
			$x['paket']=$this->Mberita->paket_footer();
			$x['berita']=$this->Mberita->berita_footer();
			$x['photo']=$this->Mberita->get_photo();

			$x['test']=$this->Mtestimoni->tampil_test();
			$x['wisata']=$this->Mberita->get_wisata();
			$x['news']=$this->Mberita->berita();
			$this->load->view('front/home',$x);
		}
	}
}