<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_stok extends CI_Model {    

    function list_barang($id) {
        $query = $this->db->query("SELECT tb_barang.kode_barang,tb_kategori.nama_kategori,tb_barang.nama_barang,
            tb_barang.merek_barang,tb_barang.spesifikasi,tb_barang.satuan FROM tb_barang INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_barang.id_kategori 
            WHERE tb_barang.kode_barang='$id' ");
        return $query;
    }   

    function detail($id){
        $gid=$this->session->userdata('gid');
        $this->db->order_by('id_trans_detail','ASC');
        return $this->db->get_where('tb_trans_detail',array('kode_barang'=>$id,'gid'=>$gid));

    }

    function getstokpc(){
        $this->db->select('td.kode_barang','br.id_kategori');
        $this->db->join('tb_barang as br','td.kode_barang = br.kode_barang');
        // $this->db->join('tb_kategori as kt','br.id_kategori=kt.id_kategori');
        $this->db->from('tb_trans_detail as td');
        $this->db->where_in('id_kategori',['1','2']);
        $this->db->group_by('td.kode_barang');
        return $this->db->get()->result();
    }

    function getpcdigunakan(){
        $this->db->where('status','DIGUNAKAN');
        return $this->db->get('tb_inv_komputer')->num_rows();
    }

    function getlaptopdigunakan(){
        $this->db->where('status','DIGUNAKAN');
        return $this->db->get('tb_inv_laptop')->num_rows();
    }

    function getallrusak(){
        $pc = $this->getpcrusak();
        $laptop = $this->getlaptoprusak();
        return $pc+$laptop;
    }

    function getpcrusak(){
        $this->db->where_in('status',['DIPERBAIKI','RUSAK/NOT FIXABLE']);
        return $this->db->get('tb_inv_komputer')->num_rows();
    }

    function getlaptoprusak(){
        $this->db->where_in('status',['DIPERBAIKI','RUSAK/NOT FIXABLE']);
        return $this->db->get('tb_inv_laptop')->num_rows();
    }
}
