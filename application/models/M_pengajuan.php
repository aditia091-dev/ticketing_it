<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pengajuan extends CI_Model {    

    function getdatapengajuan(){
        $role = $this->session->userdata('role');
        if($role=='General Manager'){
            $this->db->join('tb_departemen as dp','pg.departemen = dp.id_dept');
            $this->db->where_in('status',['Approved GM','Approved Assmen']);
            return $this->db->get('tb_pengajuan_inv as pg')->result();
        }else if($role=="Asisten Manager"){
            $this->db->join('tb_departemen as dp','pg.departemen = dp.id_dept');
            $this->db->where_in('status',['Approved IT','Approved Assmen']);
            return $this->db->get('tb_pengajuan_inv as pg')->result();
        } else{
            $this->db->join('tb_departemen as dp','pg.departemen = dp.id_dept');
            return $this->db->get('tb_pengajuan_inv as pg')->result();
        }
    }

    function approve($kode){  
        $role = $this->session->userdata('role');
        if($role=="General Manager"){
            $this->db->set('status','Approved GM');
            $this->db->where('no_pengajuan',$kode);
            return $this->db->update('tb_pengajuan_inv');
        }else if($role=="Asisten Manager"){
            $this->db->set('status','Approved Assmen');
            $this->db->where('no_pengajuan',$kode);
            return $this->db->update('tb_pengajuan_inv');
        }else{
            $cekstatus = $this->db->get_where('tb_pengajuan_inv',array('no_pengajuan'=>$kode))->row();
            if($cekstatus->status=="Pengajuan"){
                $this->db->set('status','Approved IT');
                $this->db->where('no_pengajuan',$kode);
                return $this->db->update('tb_pengajuan_inv');
            }            
        }     
        
    }

}
