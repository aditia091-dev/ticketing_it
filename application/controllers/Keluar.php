<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Keluar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_keluar','m_laptop','m_komputer','m_monitor','m_printer','m_network'));
        chek_session();
    }
	
    function index() {        
        $this->template->display('transaksi/keluar/view');       
    }		
   
    function view_data_keluar(){        
        $ambildata=$this->m_keluar->list_keluargid()->result();
        $no=1;
        foreach($ambildata as $r) { 
            $query[] = array(
                'no'=>$no++,
                'kode_transaksi'=>$r->kode_transaksi,
                'tgl_transaksi'=>tgl_indo($r->tgl_transaksi),                
                'nama_barang'=>$r->nama_barang,  
                'spesifikasi'=>$r->spesifikasi, 
                'qty'=>'<center>'.$r->qty_keluar.'</center>',         
                'catatan'=>$r->catatan, 
                'nama_pengguna'=>$r->nama_pengguna,
                'nama'=>$r->nama,                
                'cetak'=>'<a href="'.base_url('keluar/cetak/'.$r->kode_transaksi).'" target="_blank" ><i class="btn btn-info btn-sm fa fa-print" data-toggle="tooltip" title="Print"></i>',
                'aksi'=>array(anchor('keluar/cetak/' . $r->kode_transaksi, '<i class="btn btn-info btn-sm fa fa-print" data-toggle="tooltip" title="Print"></i>', 'target="_blank"') . ' ' . anchor('keluar/inventory/' . $r->id_trans_detail, '<i class="btn btn-info btn-sm fa fa-save" data-toggle="tooltip" title="Tambah Inventory"></i>')),
            );
        }        
        $result=array('data'=>$query);
        echo  json_encode($result);
    }  

    function tampilbarang(){        
        $id=$_GET['kategori'];
        $gid=$this->session->userdata('gid');
        $barang=  $this->db->get_where('tb_barang',array('id_kategori'=>$id,'gid'=>$gid))->result();
        echo "<option value=''>- Select -</option>";        
        foreach ($barang as $r){
            echo "<option value='$r->kode_barang'>".  strtoupper($r->nama_barang)."</option>";
        }
    } 

    function keluar_ajax(){
        $barang =   $_GET['barang'];
        $qty = $_GET['qty'];
        $gid=$this->session->userdata('gid');
        $harga=  $this->m_keluar->gethargabeli($barang);
        $data   =   array(
            'kode_transaksi'=>0,
            'jenis_transaksi' =>'Keluar',
            'tgl_transaksi'=>tanggal(),
            'kode_barang'=>$barang,
            'harga'=>$harga['harga'],
            'qty_keluar'=>$_GET['qty'],                    
            'catatan'=>$_GET['catatan'],
            'gid'=>$gid
        );
        if(chek_stok($barang) >= $qty){
            $this->m_keluar->simpan_keluar_temp($data);
            echo json_encode(['status'=>'ok','pesan'=>'Berhasil menambah data']);
        }else{
            echo json_encode(['status'=>'error','pesan'=>'Stok barang masuk tidak tersedia']);
        }        
        
    }

    function load_temp(){
        echo "<table class='table table-bordered table-striped'>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Spesifikasi</th>
            <th>Qty</th>
            <th>Catatan</th>
            <th>Delete</th>
        </tr>";
        $data=  $this->m_keluar->tampil_temp()->result();
        foreach ($data as $d){
            echo "<tr id='dataku$d->id_trans_detail'>
                <td>$d->kode_barang</td>
                <td>$d->nama_barang</td>   
                <td>$d->spesifikasi</td>               
                <td>$d->qty_keluar</td>
                <td>$d->catatan</td>
                <td><button onclick='hapus($d->id_trans_detail)'>Hapus</button></td>
                </tr>";
        }
    echo"</table>";
    }

    function hapus_temp() {
        $id=$_GET['id'];
        $this->m_keluar->hapus_temp($id);
    }

    function cetak($id) {
        $data['keluar']=$this->m_keluar->get_transaksi($id)->row_array();        
        $data['record']=$this->m_keluar->cetak($id)->result();     
        $this->load->view('transaksi/keluar/cetak',$data); 
    }

    function tampilspek(){        
        $id=$_GET['namabarang'];
        $barang=  $this->db->get_where('tb_barang',array('kode_barang'=>$id))->row_array();        
        echo $barang['spesifikasi'];
    } 

    function add() {  
        $this->form_validation->set_rules('penerima', 'Penerima', 'required');            
        if ($this->form_validation->run() == true) {
            $gid=$this->session->userdata('gid');           
            $kode =$this->m_keluar->kdotomatis();
            $data = array(
                    'kode_transaksi'=>$kode,                     
                    'tgl_transaksi'=>  tanggal(),
                    'id_pengguna'=>$this->input->post('penerima'),
                    'gid'=>$gid
                );
            $this->m_keluar->simpan($data);
            $this->m_keluar->update_status($kode);
            redirect('keluar');
        } else {
            $data['kode']=$this->m_keluar->kdotomatis();
            $data['kategori'] = $this->m_keluar->getkategori()->result();   
            $data['barang'] = $this->m_keluar->getbarang()->result();  
            $data['pengguna'] = $this->m_keluar->getpenggunagid()->result();          
            $this->template->display('transaksi/keluar/tambah',$data);
        }
    }	 


    function inventory($id)
    {
        $data['data']=$this->m_keluar->getid_detail($id);
        $data['pengguna'] = $this->m_keluar->getpenggunagid()->result(); 
        $this->template->display('transaksi/keluar/inventory',$data);
    }

    function add_inv() {  
        $this->_set_rules_inv();            
        if ($this->form_validation->run() == true) {
            $gid=$this->session->userdata('gid');           
            $jenis=$this->input->post('jns_inv');
            if($jenis=='Laptop'){
                $data = array(
                    'kode_laptop' => $this->m_laptop->kdotomatis(),
                    'id_pengguna' => $this->input->post('pengguna'),
                    'nama_laptop' => $this->input->post('merek'),
                    'spesifikasi' => $this->input->post('spesifikasi'),
                    'tgl_inv' =>$this->input->post('tgl_inv'),
                    'harga_beli' =>$this->input->post('harga'),
                    'note'=>$this->input->post('keterangan'),
                    'gid' => $gid
                ); 
                $data2=array(
                    'no_inventaris' => $this->m_laptop->kdotomatis(),
                    'id_pengguna_awal' => $this->input->post('pengguna'),
                    'id_pengguna' => $this->input->post('pengguna'),
                    'tgl_update'=>date('Y-m-d H:i:s'),
                    'admin'=>$this->session->userdata('nama'),
                    'note'=>'Inventory Baru',
                );               
                $this->m_laptop->simpan($data);
                $this->m_laptop->simpan_history($data2);
                redirect('laptop');
            }elseif($jenis=='Komputer'){
                $data = array(
                    'kode_komputer' => $this->m_komputer->kdotomatis(),
                    'id_pengguna' => $this->input->post('pengguna'),
                    'nama_komputer' => $this->input->post('merek'),
                    'spesifikasi' => $this->input->post('spesifikasi'),                    
                    'network' => $this->input->post('ip'),
                    'harga_beli' => $this->input->post('harga'),
                    'tgl_inv' =>$this->input->post('tgl_inv'),
                    'gid' => $gid
                );
                $data2=array(
                    'no_inventaris' => $this->m_komputer->kdotomatis(),
                    'id_pengguna_awal' => $this->input->post('pengguna'),
                    'id_pengguna' => $this->input->post('pengguna'),
                    'tgl_update'=>date('Y-m-d H:i:s'),
                    'admin'=>$this->session->userdata('nama'),
                    'note'=>'Inventory Baru',
                    );
                $this->m_laptop->simpan_history($data2);
                $this->m_komputer->simpan($data);
                redirect('komputer');
            }elseif($jenis=='Monitor'){
                $data = array(
                    'kode_monitor' => $this->m_monitor->kdotomatis(),
                    'id_pengguna' => $this->input->post('pengguna'),                   
                    'spesifikasi' => $this->input->post('spesifikasi'),               
                    'tgl_inv' =>$this->input->post('tgl_inv'),
                    'harga_beli' =>$this->input->post('harga'),
                    'gid' => $gid
                );
                $data2=array(
                    'no_inventaris' => $this->m_monitor->kdotomatis(),
                    'id_pengguna_awal' => $this->input->post('pengguna'),
                    'id_pengguna' => $this->input->post('pengguna'),
                    'tgl_update'=>date('Y-m-d H:i:s'),
                    'admin'=>$this->session->userdata('nama'),
                    'note'=>'Inventory Baru',
                );
                $this->m_laptop->simpan_history($data2);
                $this->m_monitor->simpan($data);
                redirect('monitor');
            }elseif($jenis=='Printer'){
                $data = array(
                    'kode_printer' => $this->m_printer->kdotomatis(),
                    'id_pengguna' => $this->input->post('pengguna'),                    
                    'spesifikasi' => $this->input->post('spesifikasi'),               
                    'tgl_inv' =>$this->input->post('tgl_inv'),
                    'harga_beli' =>$this->input->post('harga'),
                    'gid' => $gid
                );
                $data2=array(
                    'no_inventaris' => $this->m_printer->kdotomatis(),
                    'id_pengguna' => $this->input->post('pengguna'),
                    'tgl_update'=>date('Y-m-d H:i:s'),
                    'admin'=>$this->session->userdata('nama'),
                    'note'=>'New Inventory',
                    );
                $this->m_laptop->simpan_history($data2);
                $this->m_printer->simpan($data);
                redirect('printer');
            }elseif($jenis=='Network Device'){
                $data = array(
                    'kode_network' => $this->m_network->kdotomatis(),  
                    'id_pengguna' => $this->input->post('pengguna'),                 
                    'spesifikasi' => $this->input->post('spesifikasi'),               
                    'tgl_inv' =>$this->input->post('tgl_inv'),
                    'gid' => $gid
                );
                $data2=array(
                    'no_inventaris' => $this->input->post('kode'),
                    'lokasi' => $this->input->post('lokasi'),
                    'tgl_update'=>date('Y-m-d H:i:s'),
                    'admin'=>$this->session->userdata('nama'),
                    'note'=>'New Inventory',
                    );         
                $this->m_network->simpan_history($data2);
                $this->m_network->simpan($data);
                redirect('device');
            }else{
                $id=$this->input->post('id');
                $data['data']=$this->m_keluar->getid_detail($id);
                $data['pengguna'] = $this->m_keluar->getpenggunagid()->result(); 
                $this->template->display('transaksi/keluar/inventory',$data);
            }
        } else {
            $id=$this->input->post('id');
            $data['data']=$this->m_keluar->getid_detail($id);
            $data['pengguna'] = $this->m_keluar->getpenggunagid()->result(); 
            $this->session->set_flashdata('error', 'Tidak Ada kategory Inventory untuk Barang Ini');
            $this->template->display('transaksi/keluar/inventory',$data);
        }
    }	 

    function _set_rules() {
        //$this->form_validation->set_rules('kategori', 'Kategori Barang', 'required');   
        //$this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
        //$this->form_validation->set_rules('qty', 'QTY', 'required');        
        //$this->form_validation->set_rules('harga', 'Harga', 'required');  
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        
    }

    function _set_rules_inv() {
        $this->form_validation->set_rules('jns_inv', 'Jenis Inventory', 'required');   
        $this->form_validation->set_rules('merek', 'Merek Barang', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spefifikasi', 'required');        
        $this->form_validation->set_rules('tgl_inv', 'Tanggal Inventory', 'required');  
        $this->form_validation->set_rules('pengguna', 'Pengguna', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        
    }
}
