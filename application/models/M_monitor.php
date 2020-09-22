<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_monitor extends CI_Model {    

    function semua() {
        $gid=$this->session->userdata('gid');
        $query = $this->db->query("SELECT tb_inv_monitor.id_monitor,tb_inv_monitor.kode_monitor,tb_pengguna.nama_pengguna,tb_inv_monitor.jenis_monitor,
            tb_inv_monitor.spesifikasi,tb_inv_monitor.tgl_inv,tb_inv_monitor.status,tb_inv_monitor.note,tb_inv_monitor.gid,tb_departemen.nama,tb_departemen.parent,tb_pengguna.id_dept
            FROM tb_inv_monitor INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_monitor.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_monitor.status='DIGUNAKAN' OR tb_inv_monitor.status ='SIAP DIGUNAKAN' OR tb_inv_monitor.status='DIPERBAIKI' ORDER BY tb_inv_monitor.id_monitor DESC");
        return $query;
    }

    function semuagid() {
        $gid=$this->session->userdata('gid');
        $query = $this->db->query("SELECT tb_inv_monitor.id_monitor,tb_inv_monitor.kode_monitor,tb_inv_monitor.kode_monitor,tb_pengguna.nama_pengguna,tb_inv_monitor.jenis_monitor,
            tb_inv_monitor.spesifikasi,tb_inv_monitor.tgl_inv,tb_inv_monitor.status,tb_inv_monitor.note,tb_inv_monitor.gid,tb_departemen.nama,tb_departemen.parent,tb_pengguna.id_dept
            FROM tb_inv_monitor INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_monitor.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept 
			WHERE tb_departemen.gid ='$gid' AND tb_inv_monitor.status='DIGUNAKAN' 
			OR tb_departemen.gid ='$gid' AND tb_inv_monitor.status ='SIAP DIGUNAKAN' 
			OR tb_departemen.gid ='$gid' AND tb_inv_monitor.status='DIPERBAIKI' 
			OR tb_departemen.gid ='$gid' AND tb_inv_monitor.status='DIPINJAMKAN' 
			ORDER BY tb_inv_monitor.id_monitor DESC");
        return $query;
    }

    function getsemua_tanggal($tglawal,$tglakhir)
    {
        $gid=$this->session->userdata('gid');
        $this->db->select("m.id_monitor,m.kode_monitor,p.nama_pengguna,m.spesifikasi,m.jenis_monitor,m.tgl_inv,m.status,dep.nama,dep.parent");
        $this->db->from("tb_inv_monitor as m");
        $this->db->join('tb_pengguna as p','p.id_pengguna=m.id_pengguna');
        $this->db->join('tb_departemen as dep','dep.id_dept=p.id_dept');
        $this->db->where("DATE(m.tgl_inv) BETWEEN '$tglawal' AND '$tglakhir'");
        $this->db->where_in("m.status",array('DIGUNAKAN','SIAP DIGUNAKAN','DIPERBAIKI','DIPINJAMKAN'));     
        $this->db->order_by('m.tgl_inv','ASC');
        return $this->db->get()->result();
        
    }

    function getall_tanggal($tglawal,$tglakhir)
    {
        $gid=$this->session->userdata('gid');
        $this->db->select("m.id_monitor,m.kode_monitor,p.nama_pengguna,m.spesifikasi,m.jenis_monitor,m.tgl_inv,m.status,dep.nama,dep.parent");
        $this->db->from("tb_inv_monitor as m");
        $this->db->join('tb_pengguna as p','p.id_pengguna=m.id_pengguna');
        $this->db->join('tb_departemen as dep','dep.id_dept=p.id_dept');
        $this->db->where("DATE(m.tgl_inv) BETWEEN '$tglawal' AND '$tglakhir'");
        $this->db->where("m.gid='$gid'");
        $this->db->where_in("m.status",array('DIGUNAKAN','SIAP DIGUNAKAN','DIPERBAIKI','DIPINJAMKAN'));     
        $this->db->order_by('m.tgl_inv','ASC');
        return $this->db->get()->result();
        
    }

    function semua_arsip() {
        $gid=$this->session->userdata('gid');
        $query = $this->db->query("SELECT tb_inv_monitor.id_monitor,tb_inv_monitor.kode_monitor,tb_pengguna.nama_pengguna,tb_inv_monitor.jenis_monitor,
            tb_inv_monitor.spesifikasi,tb_inv_monitor.tgl_inv,tb_inv_monitor.status,tb_inv_monitor.note,tb_inv_monitor.gid,tb_departemen.nama,tb_departemen.parent,tb_pengguna.id_dept
            FROM tb_inv_monitor INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_monitor.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept 
			WHERE tb_inv_monitor.status='ARSIP/DISIMPAN' 
			OR tb_inv_monitor.status ='RUSAK/NOT FIXABLE' 
			OR tb_inv_monitor.status='HILANG/DICURI' 
			ORDER BY tb_inv_monitor.id_monitor DESC");
        return $query;
    }

    function semuagid_arsip() {
        $gid=$this->session->userdata('gid');
        $query = $this->db->query("SELECT tb_inv_monitor.id_monitor,tb_inv_monitor.kode_monitor,tb_inv_monitor.kode_monitor,tb_pengguna.nama_pengguna,tb_inv_monitor.jenis_monitor,
            tb_inv_monitor.spesifikasi,tb_inv_monitor.tgl_inv,tb_inv_monitor.status,tb_inv_monitor.note,tb_inv_monitor.gid,tb_departemen.nama,tb_departemen.parent,tb_pengguna.id_dept
            FROM tb_inv_monitor INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_monitor.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept 
			WHERE tb_departemen.gid ='$gid' AND tb_inv_monitor.status='ARSIP/DISIMPAN' 
			OR tb_departemen.gid ='$gid' AND tb_inv_monitor.status ='RUSAK/NOT FIXABLE' 
			OR tb_departemen.gid ='$gid' AND tb_inv_monitor.status='HILANG/DICURI' 
			ORDER BY tb_inv_monitor.id_monitor DESC");
        return $query;
    }

    function get_inv($id) {
        $query = $this->db->query("SELECT tb_inv_monitor.id_monitor,tb_inv_monitor.kode_monitor,tb_inv_monitor.id_pengguna,tb_pengguna.id_pengguna,tb_pengguna.nama_pengguna,tb_inv_monitor.jenis_monitor,
            tb_inv_monitor.spesifikasi,tb_inv_monitor.tgl_inv,tb_inv_monitor.harga_beli,tb_inv_monitor.status,tb_inv_monitor.note,tb_inv_monitor.gid,tb_departemen.nama,tb_departemen.parent,tb_pengguna.id_dept
            FROM tb_inv_monitor INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_monitor.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_monitor.kode_monitor ='$id'");
        return $query;
    }

    function get_mutasi($id){
        $query=$this->db->query("SELECT tb_inv_history.id_history,tb_inv_history.no_inventaris,tb_inv_history.tgl_update,tb_inv_history.status,tb_inv_history.admin,tb_inv_history.id_pengguna_awal,tb_inv_history.id_pengguna,tb_inv_history.lokasi,tb_inv_history.note,tb_inv_monitor.jenis_monitor,tb_inv_monitor.spesifikasi FROM tb_inv_history INNER JOIN tb_inv_monitor ON tb_inv_monitor.kode_monitor = tb_inv_history.no_inventaris WHERE tb_inv_history.id_history ='$id'");
        return $query;
    }

    function getkode($id) {
        $kode = array('kode_monitor' => $id);
        return $this->db->get_where('tb_inv_monitor', $kode);
    }
   
    function kdotomatis() {
    	$group=$this->db->get_where('tb_group',array('gid'=>$this->session->userdata('gid')))->row_array();
    	$kode=$group['nama_alias'];
        $jenis = "MON-".$kode."-".date('y');
        $query = $this->db->query("SELECT max(kode_monitor) as maxID FROM tb_inv_monitor WHERE kode_monitor LIKE '$jenis%'");
        $data = $query->row_array();
        $idMax = $data['maxID'];
        $noUrut = (int) substr($idMax, 10, 3);
        $noUrut++;
        $newID = $jenis . sprintf("%03s", $noUrut);
        return $newID;       
    }

    function getpengguna() {
        $gid=$this->session->userdata('gid');
        $query=$this->db->query("SELECT tb_pengguna.id_pengguna,tb_pengguna.nama_pengguna 
            FROM tb_pengguna INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept INNER JOIN tb_group ON tb_group.gid = tb_departemen.gid 
            WHERE tb_departemen.gid ='$gid' ORDER BY tb_pengguna.nama_pengguna ASC");
        return $query;
    }
        
    function simpan($data) {
        $this->db->insert('tb_inv_monitor', $data);
        return $this->db->insert_id();
    }

    function update($kode,$data) {        
        $this->db->where('kode_monitor', $kode);
        $this->db->update('tb_inv_monitor', $data);
    }

    function hapus($kode) {
        $this->db->where('id_monitor', $kode);
        $this->db->delete('tb_inv_monitor');
    }

    function total_rows($q = NULL) {
        $gid=$this->session->userdata('gid');       
        $this->db->or_like('kode_monitor', $q);
        $this->db->where('gid', $gid);
        $this->db->where_in('status',['DIGUNAKAN','DIPERBAIKI','SIAP DIGUNAKAN','DIPINJAMKAN']);
	    $this->db->from('tb_inv_monitor');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $gid=$this->session->userdata('gid');
    	$this->db->or_like('kode_monitor', $q);    	
    	$this->db->limit($limit, $start);        
        $this->db->where('gid', $gid);
        $this->db->where_in('status',['DIGUNAKAN','DIPERBAIKI','SIAP DIGUNAKAN','DIPINJAMKAN']);
        $this->db->from('tb_inv_monitor');        
        return $this->db->get()->result();
    }

    function get_tempbarcode(){
        $this->db->select('i.kode_monitor,t.barcode');
        $this->db->from('temp_barcode as t');
        $this->db->join('tb_inv_monitor as i','t.barcode=i.barcode');
        return $this->db->get()->result_array();
    }
}
