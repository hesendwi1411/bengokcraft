<?php
class Mberita extends CI_Model{
	public function ambil_berita($kode){
		$hasil=$this->db->query("select * from berita where idberita='$kode'");
		return $hasil;
	}

	public function count_berita(){
		$hasil=$this->db->query("select * from berita");
		return $hasil;
	}
	public function get_photo(){
		$hasil=$this->db->query("select * from galeri");
		return $hasil;
	}
	public function get_wisata(){
		$hasil=$this->db->query("select * from wisata order by idwisata desc limit 3");
		return $hasil;
	}
	public function get_berita($offset,$limit){
		$hasil=$this->db->query("select * from berita order by tglpost DESC limit $offset,$limit");
		return $hasil;
	}
	public function SimpanBerita($jdl,$berita,$gambar,$user){
		$hasil=$this->db->query("INSERT INTO berita(judul,isi,tglpost,gambar,user) VALUES ('$jdl','$berita',NOW(),'$gambar','$user')");
		return $hasil;
	}
	public function tampil_berita(){
		$hasil=$this->db->query("select * from berita order by tglpost DESC");
		return $hasil;
	}
	public function berita(){
		$hasil=$this->db->query("select * from berita order by tglpost DESC limit 4");
		return $hasil;
	}
	public function berita_footer(){
		$hasil=$this->db->query("select * from berita order by tglpost asc limit 3");
		return $hasil;
	}
	public function paket_footer(){
		$hasil=$this->db->query("select * from paket order by idpaket asc limit 3");
		return $hasil;
	}
	public function getberita($kode){
		$hasil=$this->db->query("select * from berita where idberita='$kode'");
		return $hasil;
	}
	public function updateberitaimg($kode,$jdl,$berita,$gambar,$user){
		$hasil=$this->db->query("UPDATE berita SET judul='$jdl',isi='$berita',tgl_last_update=NOW(),gambar='$gambar',user='$user' WHERE idberita='$kode'");
		return $hasil;
	}
	public function updateberita($kode,$jdl,$berita,$user){
		$hasil=$this->db->query("UPDATE berita SET judul='$jdl',isi='$berita',tgl_last_update=NOW(),user='$user' WHERE idberita='$kode'");
		return $hasil;
	}
	public function hapus_berita($id){
		$hasil=$this->db->query("delete from berita where idberita='$id'");
		return $hasil;
	}
		function foto($id){
		$hasil=$this->db->query("select * from berita where idberita='$id'");
		return $hasil;
	}
	
}