<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_web extends CI_Model { 

    function group() {
        return $this->db->get('tb_group');
    } 
	
    function simpan($data) {
        $this->db->insert('tb_maintenance', $data);
        return $this->db->insert_id();
    } 

    function simpan_detail($data) {
        $this->db->insert('tb_maintenance_detail', $data);
        return $this->db->insert_id();
    } 

    function list_ticket($limit,$start) {
        $id=$this->session->userdata('group_id');
        $this->db->select('no_permohonan,no_inventaris,nama_pemohon,catatan_pemohon,status');
        $this->db->where_in('status',['OPEN','PROCESS']);
        $this->db->where('gid',$id);
        $this->db->order_by('tgl_permohonan','DESC')->limit($limit,$start);
        return $this->db->get('tb_maintenance');   
        // return $this->db->get_where('tb_maintenance',array('status'=>'OPEN','gid'=>$id));
    }

    function view_detail($kode){
        return $this->db->get_where('tb_maintenance_detail',array('no_permohonan'=>$kode));
    }

    function list_ticket_close($id) {
        $this->db->order_by('tgl_permohonan','DESC')->limit('5');
        return $this->db->get_where('tb_maintenance',array('status'=>'CLOSED','gid'=>$id));
    }

    function ticket_num_rows($id) {
        return $this->db->get_where('tb_maintenance',array('status'=>'OPEN','gid'=>$id))->num_rows();
    }

    function getdepartemen($id) {
        return $this->db->get_where('tb_departemen',array('gid'=>$id))->result();
    }

    function num_rows_close() {
        return $this->db->get_where('tb_maintenance',array('status'=>'CLOSED'))->num_rows();
    }

    function kdotomatispengajuan() {       
        $jenis = date('ymd');
        $query = $this->db->query("SELECT max(no_pengajuan) as maxID FROM tb_pengajuan_inv WHERE no_pengajuan LIKE '$jenis%'");
        $data = $query->row_array();
        $idMax = $data['maxID'];
        $noUrut = (int) substr($idMax, 6, 3);
        $noUrut++;
        $newID = $jenis . sprintf("%03s", $noUrut);
        return $newID;       
    }

    function simpan_pengajuan($data) {
        return $this->db->insert('tb_pengajuan_inv', $data);
    } 

    function getdatapengajuan(){
        $this->db->limit(15);
        $this->db->join('tb_departemen as dp','pg.departemen = dp.id_dept');
        return $this->db->get('tb_pengajuan_inv as pg')->result();
    }
}
