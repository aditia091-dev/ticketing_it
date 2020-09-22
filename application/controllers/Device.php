<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Device extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_network','m_laptop'));
        chek_session();
    }
	public function index() {
        //$data['record'] = $this->m_barang->listBarang()->result(); 
        $this->template->display('device/view');       
    }		
   
    function view_data(){        
        $ambildata=$this->m_network->semuagid();
        $no=1;
        foreach($ambildata as $r) {
            if ($r->status =="DIGUNAKAN"){
                $status="<span class='label label-success'>" . $r->status. "</span>";
            }elseif($r->status =="SIAP DIGUNAKAN") {
                $status="<span class='label label-info'>" .$r->status."</span>";
            }elseif($r->status =="DIPERBAIKI") {
                $status="<span class='label label-warning'>" .$r->status."</span>";
            }else{
				$status="<span class='label label-warning'>" .$r->status."</span>";
			}      
            $query[] = array(
                'no'=>$no++,
                'kode_network'=>$r->kode_network,
                'lokasi'=>strtoupper($r->lokasi),                         
                'tgl_inv'=>tgl_indo($r->tgl_inv),
                'jenis_network'=>strtoupper($r->jenis_network), 
                'spesifikasi'=>$r->spesifikasi,                  
                'status'=>$status, 
                'edit'=>anchor('device/detail/' . $r->kode_network, '<i class="btn btn-info btn-sm fa fa-eye" data-toggle="tooltip" title="View Detail"></i>'),
                'delete'=>anchor('device/delete/' . $r->id_network, '<i class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')")),                
            );
        }        
        $result=array('data'=>$query);
        echo  json_encode($result);
    }   

    function add() {              
        $this->_set_rules(); 
        //$this->form_validation->set_message('is_unique', '%s Sudah Ada');
        //$this->form_validation->set_rules('no_inv', 'No. Inventaris', 'trim|required|is_unique[tb_inv_network.kode_network]');       
        if ($this->form_validation->run() == true) {
            $gid=$this->session->userdata('gid');           
            $data = array(
                'kode_network' => $this->input->post('kode'),
                'lokasi' => $this->input->post('lokasi'),
                'jenis_network' => $this->input->post('jenis'),
                'spesifikasi' => $this->input->post('spek'),               
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
        } else {                         
            $this->template->display('device/tambah');
        }
    }	

    function barcode() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'laptop/barcode/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laptop/barcode/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laptop/barcode';
            $config['first_url'] = base_url() . 'laptop/barcode';
        }

        $config['per_page'] = 25;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->m_network->total_rows($q);        
        $inventory = $this->m_network->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'inv_device_data' => $inventory,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->display('device/barcode_list', $data);
    }

    public function get_barcode($kode) {        
        $imageName =  $kode.'.png';
        $this->db->where('kode_network', $kode);
        $this->db->update('tb_inv_network', array('barcode' => $imageName));
        $this->qrcode($kode);
        redirect('device/barcode');
    }

    function pdf_barcode() {        
        $getcode = $this->input->post('msg');
        $this->db->truncate('temp_barcode');
        for ($i = 0; $i < count($getcode); $i++) {            
           $data=array(
               'barcode'=>$getcode[$i]
           );
           $this->db->insert('temp_barcode',$data);           
        }
        $data['barcode']=$this->m_network->get_tempbarcode();
        $this->load->view('device/barcode_print', $data);
    }

    function qrcode($kode) {
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable'] = true; //boolean, the default is true
        $config['cachedir'] = './barcode/cache'; //string, the default is application/cache/
        $config['errorlog'] = './barcode/log'; //string, the default is application/logs/
        $config['imagedir'] = './barcode/'; //direktori penyimpanan qr code
        $config['quality'] = true; //boolean, the default is true
        $config['size'] = '1024'; //interger, the default is 1024
        $config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
        $config['label']= $kode;
        $this->ciqrcode->initialize($config);
        $image_name = $kode. '.png'; //buat name dari qr code sesuai dengan nim
        $params['data'] = $kode; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }
    
    function edit() {  
        $this->form_validation->set_rules('lokasi', 'Lokasi Penggunaan', 'required');   
        $this->form_validation->set_rules('spek', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('jenis', 'Network Device', 'required');   
        $this->form_validation->set_rules('tgl_inv', 'Tgl. Inventaris', 'required');
            if ($this->form_validation->run() == true) {
                $data = array( 
                        'lokasi' => $this->input->post('lokasi'),
                        'jenis_network' => $this->input->post('jenis'),
                        'spesifikasi' => $this->input->post('spek'),
                        'tgl_inv' =>$this->input->post('tgl_inv'),
                        'harga_beli' =>$this->input->post('harga'),
                        'status' =>$this->input->post('status')
                    );
                $kode=$this->input->post('kode');
                $this->m_network->update($kode,$data);
                redirect('device/detail/'.$kode);                
            }else {
                $id = $this->uri->segment(3);                                           
                $data['recordall'] = $this->m_network->get_inv($id)->row_array();
                $data['record'] = $this->m_network->getkode($id)->row_array();                
                $data['history']=$this->m_laptop->get_history($id)->result();
                $this->template->display('device/detail', $data); 
        }            
    }

    function history() {              
        $this->form_validation->set_rules('lokasi', 'Lokasi Penempatan', 'required');
        $this->form_validation->set_rules('tgl_update', 'Tgl Update', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan/ Keterangan', 'required'); 
        if ($this->form_validation->run() == true) {                  
            $data = array(
                'tgl_update' => $this->input->post('tgl_update'),
                'no_inventaris' => $this->input->post('no_inv'),
                'status' => $this->input->post('status'),
                'admin' => $this->session->userdata('nama'),
                'lokasi' => $this->input->post('lokasi'),
                'note' => $this->input->post('catatan')                
            );             
            $kode=$this->input->post('no_inv');         
            $this->m_laptop->history($data);
            $data2=array('lokasi'=>$this->input->post('lokasi'));
            $this->m_network->update($kode,$data2);            
            redirect('device/detail/'.$kode);
        } else { 
            $id = $this->uri->segment(3);              
            $data['recordall'] = $this->m_network->get_inv($id)->row_array();                      
            $this->template->display('device/history',$data);
        }
    }

    function edithistory($id) {              
        $this->form_validation->set_rules('pengguna', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('tgl_update', 'Tgl Update', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan/ Keterangan', 'required'); 
        if ($this->form_validation->run() == true) {                  
            $data = array(
                'tgl_update' => $this->input->post('tgl_update'),
                'status' => $this->input->post('status'),
                'id_pengguna' => $this->input->post('pengguna'),
                'note' => $this->input->post('catatan')                
            ); 
            $id=$this->input->post('id');          
            $kode=$this->input->post('no_inv'); 
            $this->m_laptop->update_mutasi($id,$data);
            redirect('device/detail/'.$kode);
        } else { 
            $data['record'] = $this->m_network->get_mutasi($id)->row_array(); 
            $this->template->display('device/edithistory',$data);
        }
    }         

    function detail() { 
        $id = $this->uri->segment(3);                                           
        $data['recordall'] = $this->m_network->get_inv($id)->row_array();
        $data['record'] = $this->m_network->getkode($id)->row_array();        
        $data['history']=$this->m_network->get_history($id)->result();
        $this->template->display('device/detail', $data);            
    }

    function delete($kode) {
        if ($this->session->userdata('role')=='Administrator'){
            $this->m_network->hapus($kode);
            redirect('device');
        }else{
            $this->session->set_flashdata('result_hapus', '<br><p class="text-red">Maaf Anda tidak di ijinkan menghapus data ini !</p>');
            redirect('device');
        }       
        
    }

    function _set_rules() {
        $this->form_validation->set_rules('lokasi', 'Lokasi Penggunaan', 'required');   
        $this->form_validation->set_rules('spek', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('jenis', 'Network Device', 'required');
        $this->form_validation->set_message('is_unique', '%s Sudah Ada'); 
        $this->form_validation->set_rules('kode', 'No. Inventory', 'trim|required|is_unique[tb_inv_network.kode_network]');      
        $this->form_validation->set_rules('tgl_inv', 'Tgl. Inventaris', 'required');  
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissable'>", "</div>");
    }

}
