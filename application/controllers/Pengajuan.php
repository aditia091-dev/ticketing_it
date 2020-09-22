<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_pengajuan'));
        chek_session();
    }
	
    function index() {        
        $this->template->display('pengajuan/view');              
    }		
   
    function view_data(){
        $ambildata=$this->m_pengajuan->getdatapengajuan();
        $no=1;
        foreach($ambildata as $r) {
            if ($r->status == "Pengajuan"){
                $status="<span class='label label-danger'>" . $r->status . "</span>";
            }else if($r->status == "Approved IT"){
                $status="<span class='label label-warning'>" . $r->status. "</span>";
            }else if($r->status == "Approved Assmen"){
                $status="<span class='label label-info'>" . $r->status. "</span>";
            }else{
                $status="<span class='label label-success'>" . $r->status. "</span>";
            }
            $query[] = array(
                'no'=>$no++,
                'no_pengajuan'=>$r->no_pengajuan,
                'jenis'=>$r->jenis,
                'tanggal'=>$r->tanggal_pengajuan,
                'jenis_inv'=>$r->jenis_inventory,            
                'nama'=>$r->nama_pemohon, 
                'jenis_kel'=>$r->jenis_kelamin,
                'departemen'=>$r->nama, 
                'jabatan'=>$r->jabatan, 
                'email'=>$r->email,
                'no_hp'=>$r->no_hp,          
                'status'=>'<center>'.$status.'</center>',
                'aksi'=>anchor('pengajuan/approve/' . $r->no_pengajuan, '<i class="btn btn-info btn-sm glyphicon glyphicon-send" data-toggle="tooltip" title="Approve"></i>'),                 
            );
        }        
        $result=array('data'=>$query);
        echo  json_encode($result);
    }  

    function detail($id) {  
        $data['record']=$this->m_stok->list_barang($id)->row_array(); 
        $data['detail']=$this->m_stok->detail($id)->result();     
        $this->template->display('transaksi/stok/detail',$data);              
    }   

    function detail_print($id) {  
        $data['record']=$this->m_stok->list_barang($id)->row_array(); 
        $data['detail']=$this->m_stok->detail($id)->result();     
        $this->load->view('transaksi/stok/detail_print',$data);              
    }   

    function approve($kode){
        $this->m_pengajuan->approve($kode);
        $this->template->display('pengajuan/view');
    }
}
