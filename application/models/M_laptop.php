<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_laptop extends CI_Model {    

    function semua() {
        $gid=$this->session->userdata('gid');
        $query = $this->db->query("SELECT tb_inv_laptop.id_laptop,tb_inv_laptop.kode_laptop,tb_pengguna.nama_pengguna,tb_departemen.id_dept,
            tb_departemen.nama,tb_departemen.parent,tb_inv_laptop.nama_laptop,tb_inv_laptop.spesifikasi,tb_inv_laptop.serial_number,
            tb_inv_laptop.id_lisence,tb_inv_laptop.network,tb_inv_laptop.remote_akses,tb_inv_laptop.tgl_inv,tb_inv_laptop.status,tb_inv_laptop.note,tb_inv_laptop.gid
            FROM tb_inv_laptop INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_laptop.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_laptop.status='DIGUNAKAN' OR tb_inv_laptop.status ='SIAP DIGUNAKAN' OR tb_inv_laptop.status='DIPERBAIKI' ORDER BY tb_inv_laptop.id_laptop DESC ");
        return $query;
    }

    function semuagid() {
        $gid=$this->session->userdata('gid');
        $query = $this->db->query("SELECT tb_inv_laptop.id_laptop,tb_inv_laptop.kode_laptop,tb_pengguna.nama_pengguna,tb_departemen.id_dept,
            tb_departemen.nama,tb_departemen.parent,tb_inv_laptop.nama_laptop,tb_inv_laptop.spesifikasi,tb_inv_laptop.serial_number,
            tb_inv_laptop.id_lisence,tb_inv_laptop.network,tb_inv_laptop.remote_akses,tb_inv_laptop.tgl_inv,tb_inv_laptop.status,tb_inv_laptop.note,tb_inv_laptop.gid
            FROM tb_inv_laptop INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_laptop.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_laptop.gid ='$gid' AND tb_inv_laptop.status='DIGUNAKAN' OR tb_inv_laptop.gid ='$gid' AND tb_inv_laptop.status ='SIAP DIGUNAKAN' OR tb_inv_laptop.gid ='$gid' AND tb_inv_laptop.status='DIPERBAIKI' OR tb_inv_laptop.gid ='$gid' AND tb_inv_laptop.status='DIPINJAMKAN' ORDER BY tb_inv_laptop.id_laptop DESC ");
        return $query;
    }

    function getsemua_tanggal($tglawal,$tglakhir)
    {
        $gid=$this->session->userdata('gid');
        $this->db->select("lp.id_laptop,lp.kode_laptop,p.nama_pengguna,lp.nama_laptop,lp.spesifikasi,lp.serial_number,lp.network,lp.remote_akses,lp.tgl_inv,lp.status,lp.note,dep.nama,dep.parent");
        $this->db->from("tb_inv_laptop as lp");
        $this->db->join('tb_pengguna as p','p.id_pengguna=lp.id_pengguna');
        $this->db->join('tb_departemen as dep','dep.id_dept=p.id_dept');
        $this->db->where("DATE(lp.tgl_inv) BETWEEN '$tglawal' AND '$tglakhir'");
        $this->db->where_in("lp.status",array('DIGUNAKAN','SIAP DIGUNAKAN','DIPERBAIKI','DIPINJAMKAN'));     
        $this->db->order_by('lp.tgl_inv','ASC');
        return $this->db->get()->result();
        
    }

    function getall_tanggal($tglawal,$tglakhir)
    {
        $gid=$this->session->userdata('gid');
        $this->db->select("lp.id_laptop,lp.kode_laptop,p.nama_pengguna,lp.nama_laptop,lp.spesifikasi,lp.serial_number,lp.network,lp.remote_akses,lp.tgl_inv,lp.status,lp.note,dep.nama,dep.parent");
        $this->db->from("tb_inv_laptop as lp");
        $this->db->join('tb_pengguna as p','p.id_pengguna=lp.id_pengguna');
        $this->db->join('tb_departemen as dep','dep.id_dept=p.id_dept');
        $this->db->where("DATE(lp.tgl_inv) BETWEEN '$tglawal' AND '$tglakhir'");
        $this->db->where("lp.gid='$gid'");
        $this->db->where_in("lp.status",array('DIGUNAKAN','SIAP DIGUNAKAN','DIPERBAIKI','DIPINJAMKAN'));     
        $this->db->order_by('lp.tgl_inv','ASC');
        return $this->db->get()->result();
        
    }

    function semua_arsip() {
        $gid=$this->session->userdata('gid');
        $query = $this->db->query("SELECT tb_inv_laptop.id_laptop,tb_inv_laptop.kode_laptop,tb_pengguna.nama_pengguna,tb_departemen.id_dept,
            tb_departemen.nama,tb_departemen.parent,tb_inv_laptop.nama_laptop,tb_inv_laptop.spesifikasi,tb_inv_laptop.serial_number,
            tb_inv_laptop.id_lisence,tb_inv_laptop.network,tb_inv_laptop.tgl_inv,tb_inv_laptop.status,tb_inv_laptop.note,tb_inv_laptop.gid
            FROM tb_inv_laptop INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_laptop.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_laptop.status='ARSIP/DISIMPAN' OR tb_inv_laptop.status ='RUSAK/NOT FIXABLE' OR tb_inv_laptop.status='HILANG/DICURI' ORDER BY tb_inv_laptop.id_laptop DESC ");
        return $query;
    }

    function semuagid_arsip() {
        $gid=$this->session->userdata('gid');
        $query = $this->db->query("SELECT tb_inv_laptop.id_laptop,tb_inv_laptop.kode_laptop,tb_pengguna.nama_pengguna,tb_departemen.id_dept,
            tb_departemen.nama,tb_departemen.parent,tb_inv_laptop.nama_laptop,tb_inv_laptop.spesifikasi,tb_inv_laptop.serial_number,
            tb_inv_laptop.id_lisence,tb_inv_laptop.network,tb_inv_laptop.tgl_inv,tb_inv_laptop.status,tb_inv_laptop.note,tb_inv_laptop.gid
            FROM tb_inv_laptop INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_laptop.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_laptop.gid ='$gid' AND tb_inv_laptop.status='ARSIP/DISIMPAN' OR tb_inv_laptop.gid ='$gid' AND tb_inv_laptop.status ='RUSAK/NOT FIXABLE' OR tb_inv_laptop.gid ='$gid' AND tb_inv_laptop.status='HILANG/DICURI' ORDER BY tb_inv_laptop.id_laptop DESC ");
        return $query;
    }    

    function getall($id) {        
        $query = $this->db->query("SELECT tb_inv_laptop.id_laptop,tb_inv_laptop.kode_laptop,tb_pengguna.id_pengguna,tb_pengguna.nama_pengguna,tb_departemen.id_dept,
            tb_departemen.nama,tb_departemen.parent,tb_inv_laptop.nama_laptop,tb_inv_laptop.spesifikasi,tb_inv_laptop.serial_number,
            tb_inv_laptop.id_lisence,tb_inv_laptop.network,tb_inv_laptop.tgl_inv,tb_inv_laptop.harga_beli,tb_inv_laptop.status,tb_inv_laptop.note,tb_inv_laptop.gid
            FROM tb_inv_laptop INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_laptop.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_laptop.kode_laptop ='$id'");
        return $query;
    }

    function get_inv($id) {        
        $query = $this->db->query("SELECT tb_inv_laptop.id_laptop,tb_inv_laptop.kode_laptop,tb_pengguna.nama_pengguna,tb_departemen.id_dept,
            tb_departemen.nama,tb_departemen.parent,tb_inv_laptop.nama_laptop,tb_inv_laptop.spesifikasi,tb_inv_laptop.serial_number,
            tb_inv_laptop.id_lisence,tb_inv_laptop.network,tb_inv_laptop.remote_akses,tb_inv_laptop.tgl_inv,tb_inv_laptop.harga_beli,tb_inv_laptop.status,tb_inv_laptop.note,tb_inv_laptop.gid
            FROM tb_inv_laptop INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_laptop.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_laptop.kode_laptop ='$id'");
        return $query;
    }

    function getkode($id) {
        $kode = array('kode_laptop' => $id);
        return $this->db->get_where('tb_inv_laptop', $kode);
    }
    
    function get_service($id){
        $kode = array('no_inventaris' => $id);
        return $this->db->get_where('tb_maintenance', $kode);
    }

    function get_history($id){
        $query=$this->db->query("SELECT tb_inv_history.no_inventaris,tb_inv_history.id_history,tb_inv_history.tgl_update,tb_inv_history.status,tb_inv_history.admin,tb_inv_history.id_pengguna,tb_inv_history.note,tb_pengguna.nama_pengguna 
            FROM tb_inv_history INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_history.id_pengguna WHERE tb_inv_history.no_inventaris = '$id'");
        return $query;
    }
	
	function get_history_limit($id){
        $query=$this->db->query("SELECT tb_inv_history.id_history,tb_inv_history.no_inventaris,tb_inv_history.id_pengguna, tb_inv_history.tgl_update FROM tb_inv_history WHERE tb_inv_history.no_inventaris = '$id' ORDER BY tb_inv_history.id_history DESC LIMIT 1,1");
        return $query;
    }

    function get_mutasi($id){
        $query=$this->db->query("SELECT tb_inv_history.id_history,tb_inv_history.no_inventaris,tb_inv_history.tgl_update,tb_inv_history.status,tb_inv_history.admin,tb_inv_history.id_pengguna_awal,tb_inv_history.id_pengguna,tb_inv_history.lokasi,tb_inv_history.note,tb_inv_laptop.nama_laptop,tb_inv_laptop.spesifikasi FROM tb_inv_history INNER JOIN tb_inv_laptop ON tb_inv_laptop.kode_laptop = tb_inv_history.no_inventaris WHERE tb_inv_history.id_history ='$id'");
        return $query;
    }
   
    function kdotomatis() {
    	$group=$this->db->get_where('tb_group',array('gid'=>$this->session->userdata('gid')))->row_array();
    	$kode=$group['nama_alias'];
        $jenis = "LAP-".$kode."-".date('y');
        $query = $this->db->query("SELECT max(kode_laptop) as maxID FROM tb_inv_laptop WHERE kode_laptop LIKE '$jenis%'");
        $data = $query->row_array();
        $idMax = $data['maxID'];
        $noUrut = (int) substr($idMax, 10, 3);
        $noUrut++;
        $newID = $jenis . sprintf("%03s", $noUrut);
        return $newID;       
    }

    function getpengguna() {        
        $query=$this->db->query("SELECT tb_pengguna.id_pengguna,tb_pengguna.nama_pengguna,tb_departemen.gid 
        	FROM tb_pengguna INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept 
        	ORDER BY tb_pengguna.nama_pengguna ASC");
        return $query;
    }

    function getpenggunagid() {
        $gid=$this->session->userdata('gid');
        $query=$this->db->query("SELECT tb_pengguna.id_pengguna,tb_pengguna.nama_pengguna,tb_departemen.gid 
        	FROM tb_pengguna INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept 
        	WHERE tb_departemen.gid ='$gid' ORDER BY tb_pengguna.nama_pengguna ASC");
        return $query;
    }
        
    function simpan($data) {
        $this->db->insert('tb_inv_laptop', $data);
        return $this->db->insert_id();
    }

    function simpan_history($data2) {
        $this->db->insert('tb_inv_history', $data2);
        return $this->db->insert_id();
    }

    function history($data) {
        $this->db->insert('tb_inv_history', $data);
        return $this->db->insert_id();
    }

    function simpankat($data) {
        $this->db->insert('tb_kategori', $data);
        return $this->db->insert_id();
    }
    
    function update($kode,$data) {        
        $this->db->where('kode_laptop', $kode);
        $this->db->update('tb_inv_laptop', $data);
    }

    function update_mutasi($id,$data) {        
        $this->db->where('id_history', $id);
        $this->db->update('tb_inv_history', $data);
    }

    function hapus($kode) {
        $this->db->where('id_laptop', $kode);
        $this->db->delete('tb_inv_laptop');
    }

    function total_rows($q = NULL) {
        $gid=$this->session->userdata('gid');       
        $this->db->or_like('kode_laptop', $q);
        $this->db->where('gid', $gid);
        $this->db->where_in('status',['DIGUNAKAN','DIPERBAIKI','SIAP DIGUNAKAN','DIPINJAMKAN']);
	    $this->db->from('tb_inv_laptop');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $gid=$this->session->userdata('gid');
    	$this->db->or_like('kode_laptop', $q);    	
    	$this->db->limit($limit, $start);        
        $this->db->where('gid', $gid);
        $this->db->where_in('status',['DIGUNAKAN','DIPERBAIKI','SIAP DIGUNAKAN','DIPINJAMKAN']);
        $this->db->from('tb_inv_laptop');        
        return $this->db->get()->result();
    }

    function get_tempbarcode(){
        $this->db->select('i.kode_laptop,t.barcode');
        $this->db->from('temp_barcode as t');
        $this->db->join('tb_inv_laptop as i','t.barcode=i.barcode');
        return $this->db->get()->result_array();
    }
}
