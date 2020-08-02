<?php
class Morders extends CI_Model{

    function cek_invoice($kode){
        $hasil=$this->db->query("SELECT * FROM orders WHERE id_order='$kode'");
        return $hasil;
    }
    function simpan_testimoni($nama,$email,$msg){
        $hasil=$this->db->query("INSERT INTO testimoni(nama,email,pesan,status,tgl_post) VALUES ('$nama','$email','$msg','0',curdate())");
        return $hasil;
    }
    function get_pembayaran(){
        $hasil=$this->db->query("SELECT id_bayar,tgl_bayar,metode,bank,order_id,SUM((harga*qty)-(harga_discount*qty))AS total,jumlah,status,bukti_transfer,pengirim FROM pembayaran JOIN orders ON order_id=id_order JOIN metode_bayar ON metode_id_bayar=id_metode JOIN paket ON idpaket=paket_id_order WHERE status<>'LUNAS' GROUP BY order_id");
        return $hasil;
    }
    function get_orders(){
        $hasil=$this->db->query("SELECT id_order,tanggal,nama_paket,harga,harga_discount,qty,SUM(qty)AS jml_order,(harga*qty) AS sub_harga,(harga_discount*qty)AS sub_discount,SUM((harga*qty)-(harga_discount*qty))AS total,metode,bank,norek,atasnama,nama,IF(jenkel='L','Laki-Laki','Perempuan')AS jenkel,alamat,notelp,email,keterangan,status FROM orders JOIN metode_bayar ON metode_id=id_metode JOIN paket ON paket_id_order=idpaket GROUP BY id_order order by tanggal desc");
        return $hasil;
    }
    function bayar_selesai($id){
        $hasil=$this->db->query("UPDATE orders SET status='LUNAS' WHERE id_order='$id'");
        return $hasil;
    }
    function edit_orders($kode,$qty){
        $hasil=$this->db->query("UPDATE orders SET qty='$qty' WHERE id_order='$kode'");
        return $hasil;
    }
    function hapus_orders($kode){
        $hasil=$this->db->query("delete from orders WHERE id_order='$kode'");
        return $hasil;
    }
    function get_bank(){
        $hasil=$this->db->query("SELECT * FROM metode_bayar WHERE bank<>''");
        return $hasil;
    }
    function simpan_bukti($noinvoice,$nama,$bank,$tgl_bayar,$jumlah,$gambar){
        $hasil=$this->db->query("INSERT INTO pembayaran(tgl_bayar,metode_id_bayar,order_id,jumlah,pengirim,bukti_transfer)VALUES('$tgl_bayar','$bank','$noinvoice','$jumlah','$nama','$gambar')");
        return $hasil;
    }
    function hapus_bayar($kode){
        $hasil=$this->db->query("delete from pembayaran WHERE id_bayar='$kode'");
        return $hasil;
    }
			function foto($id){
		$hasil=$this->db->query("select * from pembayaran where id_bayar='$id'");
		return $hasil;
	}
}
