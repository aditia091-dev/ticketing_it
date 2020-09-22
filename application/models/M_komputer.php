<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_komputer extends CI_Model {    

    function semua() {        
        $query = $this->db->query("SELECT tb_inv_komputer.id_komputer,tb_inv_komputer.kode_komputer,tb_pengguna.nama_pengguna,tb_departemen.id_dept,
            tb_departemen.nama,tb_departemen.parent,tb_inv_komputer.nama_komputer,tb_inv_komputer.spesifikasi,tb_inv_komputer.serial_number,tb_inv_komputer.id_lisence,
            tb_inv_komputer.network,tb_inv_komputer.tgl_inv,tb_inv_komputer.status,tb_inv_komputer.note,tb_inv_komputer.gid 
            FROM tb_inv_komputer INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_komputer.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_komputer.status='DIGUNAKAN' OR tb_inv_komputer.status ='SIAP DIGUNAKAN' OR tb_inv_komputer.status='DIPERBAIKI' ORDER BY tb_inv_komputer.id_komputer DESC");
        return $query;
    }

    function semuagid() {
        $gid=$this->session->userdata('gid');
        $query = $this->db->query("SELECT tb_inv_komputer.id_komputer,tb_inv_komputer.kode_komputer,tb_pengguna.nama_pengguna,tb_departemen.id_dept,
            tb_departemen.nama,tb_departemen.parent,tb_inv_komputer.nama_komputer,tb_inv_komputer.spesifikasi,tb_inv_komputer.serial_number,tb_inv_komputer.id_lisence,
            tb_inv_komputer.network,tb_inv_komputer.remote_akses,tb_inv_komputer.tgl_inv,tb_inv_komputer.status,tb_inv_komputer.note,tb_inv_komputer.gid 
            FROM tb_inv_komputer INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_komputer.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_komputer.gid ='$gid' AND tb_inv_komputer.status='DIGUNAKAN' OR tb_inv_komputer.gid ='$gid' AND tb_inv_komputer.status ='SIAP DIGUNAKAN' OR tb_inv_komputer.gid ='$gid' AND tb_inv_komputer.status='DIPERBAIKI' OR tb_inv_komputer.gid ='$gid' AND tb_inv_komputer.status='DIPINJAMKAN' ORDER BY tb_inv_komputer.id_komputer DESC");
        return $query;
    }

    function semuagid_tgl($tglawal,$tgl_akhir) {
        $gid=$this->session->userdata('gid');
        $query = $this->db->query("SELECT tb_inv_komputer.id_komputer,tb_inv_komputer.kode_komputer,tb_pengguna.nama_pengguna,tb_departemen.id_dept,
            tb_departemen.nama,tb_departemen.parent,tb_inv_komputer.nama_komputer,tb_inv_komputer.spesifikasi,tb_inv_komputer.serial_number,tb_inv_komputer.id_lisence,
            tb_inv_komputer.network,tb_inv_komputer.remote_akses,tb_inv_komputer.tgl_inv,tb_inv_komputer.status,tb_inv_komputer.note,tb_inv_komputer.gid 
            FROM tb_inv_komputer INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_komputer.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_komputer.tgl_inv BETWEEN $tglawal AND $tglawal AND tb_inv_komputer.gid ='$gid' AND tb_inv_komputer.status='DIGUNAKAN' OR tb_inv_komputer.gid ='$gid' AND tb_inv_komputer.status ='SIAP DIGUNAKAN' OR tb_inv_komputer.gid ='$gid' AND tb_inv_komputer.status='DIPERBAIKI' OR tb_inv_komputer.gid ='$gid' AND tb_inv_komputer.status='DIPINJAMKAN' ORDER BY tb_inv_komputer.id_komputer DESC");
        return $query->result();
    }

    function getsemua_tanggal($tglawal,$tglakhir)
    {        
        $this->db->select("pc.id_komputer,pc.kode_komputer,p.nama_pengguna,pc.nama_komputer,pc.spesifikasi,pc.serial_number,pc.network,pc.remote_akses,pc.tgl_inv,pc.status,pc.note,dep.nama,dep.parent");
        $this->db->from("tb_inv_komputer as pc");
        $this->db->join('tb_pengguna as p','p.id_pengguna=pc.id_pengguna');
        $this->db->join('tb_departemen as dep','dep.id_dept=p.id_dept');
        $this->db->where("DATE(pc.tgl_inv) BETWEEN '$tglawal' AND '$tglakhir'");       
        $this->db->where_in("pc.status",array('DIGUNAKAN','SIAP DIGUNAKAN','DIPERBAIKI','DIPINJAMKAN'));     
        $this->db->order_by('pc.tgl_inv','ASC');
        return $this->db->get()->result();
        
    }

    function getall_tanggal($tglawal,$tglakhir)
    {
        $gid=$this->session->userdata('gid');
        $this->db->select("pc.id_komputer,pc.kode_komputer,p.nama_pengguna,pc.nama_komputer,pc.spesifikasi,pc.serial_number,pc.network,pc.remote_akses,pc.tgl_inv,pc.status,pc.note,dep.nama,dep.parent");
        $this->db->from("tb_inv_komputer as pc");
        $this->db->join('tb_pengguna as p','p.id_pengguna=pc.id_pengguna');
        $this->db->join('tb_departemen as dep','dep.id_dept=p.id_dept');
        $this->db->where("DATE(pc.tgl_inv) BETWEEN '$tglawal' AND '$tglakhir'");
        $this->db->where("pc.gid='$gid'");
        $this->db->where_in("pc.status",array('DIGUNAKAN','SIAP DIGUNAKAN','DIPERBAIKI','DIPINJAMKAN'));     
        $this->db->order_by('pc.tgl_inv','ASC');
        return $this->db->get()->result();
        
    }

    function semua_arsip() {        
        $query = $this->db->query("SELECT tb_inv_komputer.id_komputer,tb_inv_komputer.kode_komputer,tb_pengguna.nama_pengguna,tb_departemen.id_dept,
            tb_departemen.nama,tb_departemen.parent,tb_inv_komputer.nama_komputer,tb_inv_komputer.spesifikasi,tb_inv_komputer.serial_number,tb_inv_komputer.id_lisence,
            tb_inv_komputer.network,tb_inv_komputer.tgl_inv,tb_inv_komputer.status,tb_inv_komputer.note,tb_inv_komputer.gid 
            FROM tb_inv_komputer INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_komputer.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_komputer.status='ARSIP/DISIMPAN' OR tb_inv_komputer.status ='RUSAK/NOT FIXABLE' OR tb_inv_komputer.status='HILANG/DICURI' ORDER BY tb_inv_komputer.id_komputer DESC");
        return $query;
    }

    function semuagid_arsip() {
        $gid=$this->session->userdata('gid');
        $query = $this->db->query("SELECT tb_inv_komputer.id_komputer,tb_inv_komputer.kode_komputer,tb_pengguna.nama_pengguna,tb_departemen.id_dept,
            tb_departemen.nama,tb_departemen.parent,tb_inv_komputer.nama_komputer,tb_inv_komputer.spesifikasi,tb_inv_komputer.serial_number,tb_inv_komputer.id_lisence,
            tb_inv_komputer.network,tb_inv_komputer.tgl_inv,tb_inv_komputer.status,tb_inv_komputer.note,tb_inv_komputer.gid 
            FROM tb_inv_komputer INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_komputer.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_komputer.gid ='$gid' AND tb_inv_komputer.status='ARSIP/DISIMPAN' OR tb_inv_komputer.gid ='$gid' AND tb_inv_komputer.status ='RUSAK/NOT FIXABLE' OR tb_inv_komputer.gid ='$gid' AND tb_inv_komputer.status='HILANG/DICURI' ORDER BY tb_inv_komputer.id_komputer DESC");
        return $query;
    }
    function get_inv($id) {        
        $query = $this->db->query("SELECT tb_inv_komputer.id_komputer,tb_inv_komputer.kode_komputer,tb_inv_komputer.id_pengguna,tb_pengguna.nama_pengguna,tb_departemen.id_dept,tb_departemen.nama,tb_departemen.parent,tb_inv_komputer.nama_komputer,tb_inv_komputer.spesifikasi,tb_inv_komputer.serial_number,tb_inv_komputer.id_lisence,tb_inv_komputer.network,tb_inv_komputer.remote_akses,tb_inv_komputer.tgl_inv,tb_inv_komputer.harga_beli,tb_inv_komputer.status,tb_inv_komputer.note,tb_inv_komputer.gid 
            FROM tb_inv_komputer INNER JOIN tb_pengguna ON tb_pengguna.id_pengguna = tb_inv_komputer.id_pengguna 
            INNER JOIN tb_departemen ON tb_departemen.id_dept = tb_pengguna.id_dept WHERE tb_inv_komputer.kode_komputer ='$id' ");
        return $query;
    }

    function getkode($id) {
        $kode = array('kode_komputer' => $id);
        return $this->db->get_where('tb_inv_komputer', $kode);
    }
   
    function kdotomatis() {
    	$group=$this->db->get_where('tb_group',array('gid'=>$this->session->userdata('gid')))->row_array();
    	$kode=$group['nama_alias'];
        $jenis = "CPU-".$kode."-".date('y');
        $query = $this->db->query("SELECT max(kode_komputer) as maxID FROM tb_inv_komputer WHERE kode_komputer LIKE '$jenis%'");
        $data = $query->row_array();
        $idMax = $data['maxID'];
        $noUrut = (int) substr($idMax, 10, 3);
        $noUrut++;
        $newID = $jenis . sprintf("%03s", $noUrut);
        return $newID;       
    }

    function get_mutasi($id){
        $query=$this->db->query("SELECT tb_inv_history.id_history,tb_inv_history.no_inventaris,tb_inv_history.tgl_update,tb_inv_history.status,tb_inv_history.admin,tb_inv_history.id_pengguna_awal,tb_inv_history.id_pengguna,tb_inv_history.lokasi,tb_inv_history.note,tb_inv_komputer.nama_komputer,tb_inv_komputer.spesifikasi FROM tb_inv_history INNER JOIN tb_inv_komputer ON tb_inv_komputer.kode_komputer = tb_inv_history.no_inventaris WHERE tb_inv_history.id_history ='$id'");
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
        $this->db->insert('tb_inv_komputer', $data);
        return $this->db->insert_id();
    }

    function update($kode,$data) {        
        $this->db->where('kode_komputer', $kode);
        $this->db->update('tb_inv_komputer', $data);
    }

    function hapus($kode) {
        $this->db->where('id_komputer', $kode);
        $this->db->delete('tb_inv_komputer');
    }

    function total_rows($q = NULL) {
        $gid = $this->session->userdata('gid');
        $this->db->or_like('kode_komputer', $q);
        $this->db->where('gid',$gid);
        $this->db->where_in('status',['DIGUNAKAN','DIPERBAIKI','SIAP DIGUNAKAN','DIPINJAMKAN']);
        $this->db->from('tb_inv_komputer');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $gid = $this->session->userdata('gid');
        $this->db->or_like('kode_komputer', $q);
        $this->db->limit($limit, $start);
        $this->db->where('gid', $gid);
        $this->db->where_in('status',['DIGUNAKAN','DIPERBAIKI','SIAP DIGUNAKAN','DIPINJAMKAN']);
        $this->db->from('tb_inv_komputer');        
        return $this->db->get()->result();
    }

    function get_limit_data_all($limit, $start = 0, $q = NULL) {
        $gid = $this->session->userdata('gid');
        $this->db->or_like('kode_komputer', $q);
        $this->db->limit($limit, $start);
        $this->db->where('gid', $gid);
        $this->db->where_in('status',['DIGUNAKAN','DIPERBAIKI','SIAP DIGUNAKAN','DIPINJAMKAN']);
        $this->db->from('tb_inv_komputer');        
        return $this->db->get()->result();
    }

    function get_tempbarcode(){
        $this->db->select('i.kode_komputer,t.barcode');
        $this->db->from('temp_barcode as t');
        $this->db->join('tb_inv_komputer as i','t.barcode=i.barcode');
        return $this->db->get()->result_array();
    }
}
