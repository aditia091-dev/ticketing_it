<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Printer extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_printer','m_laptop','m_masuk','m_maintenance'));
        chek_session();
    }
	public function index() {
        //$data['record'] = $this->m_barang->listBarang()->result(); 
        $this->template->display('printer/view');       
    }		
   
    function view_data(){        
        $ambildata=$this->m_printer->semuagid()->result();         
        $no=1;
        foreach($ambildata as $r) {  
        $dept=$this->db->get_where('tb_departemen',array('id_dept'=>$r->parent))->row_array();
            if($r->parent==0){
                    $deptnama=$r->nama;
            }else{
                    $deptnama=$dept['nama'];
            } 
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
                'kode_printer'=>$r->kode_printer,
                'nama_pengguna'=>$r->nama_pengguna, 
                'dept'=>$deptnama, 
                'subdept'=>$r->nama,         
                'tgl_inv'=>tgl_indo($r->tgl_inv),
                'jenis_printer'=>$r->jenis_printer, 
                'spesifikasi'=>$r->spesifikasi,                  
                'status'=>$status, 
                'edit'=>anchor('printer/detail/' . $r->kode_printer, '<i class="btn btn-info btn-sm fa fa-eye" data-toggle="tooltip" title="View Detail"></i>'),
                'delete'=>anchor('printer/delete/' . $r->id_printer, '<i class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')")),                
            );
        }        
        $result=array('data'=>$query);
        echo  json_encode($result);
    }   

    function view_tanggal(){        
        $tglawal=$this->input->get('tglawal');
        $tglakhir=$this->input->get('tglakhir');   
        if ($this->session->userdata('role')=='Administrator'){
            $ambildata=$this->m_printer->getsemua_tanggal($tglawal,$tglakhir);
        }else{
            $ambildata=$this->m_printer->getall_tanggal($tglawal,$tglakhir);
        }  
        $no=1;
        foreach($ambildata as $r) {  
        $dept=$this->db->get_where('tb_departemen',array('id_dept'=>$r->parent))->row_array();
            if($r->parent==0){
                    $deptnama=$r->nama;
            }else{
                    $deptnama=$dept['nama'];
            } 
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
                'kode_printer'=>$r->kode_printer,
                'nama_pengguna'=>$r->nama_pengguna, 
                'dept'=>$deptnama, 
                'subdept'=>$r->nama,         
                'tgl_inv'=>tgl_indo($r->tgl_inv),
                'jenis_printer'=>$r->jenis_printer, 
                'spesifikasi'=>$r->spesifikasi,                  
                'status'=>$status, 
                'edit'=>anchor('printer/detail/' . $r->kode_printer, '<i class="btn btn-info btn-sm fa fa-eye" data-toggle="tooltip" title="View Detail"></i>'),
                'delete'=>anchor('printer/delete/' . $r->id_printer, '<i class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')")),                
            );
        }        
        $result=array('data'=>$query);
        echo  json_encode($result);
    }   


    function add() {              
        $this->_set_rules(); 
        //$this->form_validation->set_message('is_unique', '%s Sudah Ada');
        //$this->form_validation->set_rules('no_inv', 'No. Inventaris', 'trim|required|is_unique[tb_inv_printer.kode_printer]');       
        if ($this->form_validation->run() == true) {
            $gid=$this->session->userdata('gid');           
            $data = array(
                'kode_printer' => $this->m_printer->kdotomatis(),
                'id_pengguna' => $this->input->post('pengguna'),
                'jenis_printer' => $this->input->post('jenis'),
                'spesifikasi' => $this->input->post('spek'),               
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
        } else {  
            $data['pengguna'] = $this->m_printer->getpengguna()->result();           
            $this->template->display('printer/tambah',$data);
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
        $config['total_rows'] = $this->m_printer->total_rows($q);        
        $inventory = $this->m_printer->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'inv_printer_data' => $inventory,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->display('printer/barcode_list', $data);
    }

    public function get_barcode($kode) {        
        $imageName =  $kode.'.png';
        $this->db->where('kode_printer', $kode);
        $this->db->update('tb_inv_printer', array('barcode' => $imageName));
        $this->qrcode($kode);
        redirect('printer/barcode');
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
        $data['barcode']=$this->m_printer->get_tempbarcode();
        $this->load->view('printer/barcode_print', $data);
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

    function detail() { 
        $id = $this->uri->segment(3);                                           
        $data['recordall'] = $this->m_printer->get_inv($id)->row_array();
        $data['record'] = $this->m_printer->getkode($id)->row_array();
        $data['service']=$this->m_laptop->get_service($id)->result();
        $data['history']=$this->m_laptop->get_history($id)->result();
        $this->template->display('printer/detail', $data);            
    }	
    
    function edit() {
        $this->_set_rules();
            if ($this->form_validation->run() == true) {
                $data = array( 
                        'id_pengguna' => $this->input->post('pengguna'),
                        'jenis_printer' => $this->input->post('jenis'),
                        'spesifikasi' => $this->input->post('spek'),
                        'tgl_inv' =>$this->input->post('tgl_inv'),
                        'harga_beli' =>$this->input->post('harga'),
                        'status' =>$this->input->post('status'),
						'note' =>$this->input->post('note')
                    );
                $kode=$this->input->post('kode');
                $this->m_printer->update($kode,$data);
                redirect('printer/detail/'.$kode);                 
            }else {
                $id = $this->uri->segment(3);
                $data['recordall'] = $this->m_printer->get_inv($id)->row_array();
                $data['record'] = $this->m_printer->getkode($id)->row_array();
                $data['service']=$this->m_laptop->get_service($id)->result();
                $data['history']=$this->m_laptop->get_history($id)->result();
                $this->template->display('printer/detail', $data);    
        }            
    }

    function history() {              
        $this->form_validation->set_rules('pengguna', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('tgl_update', 'Tgl Update', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan/ Keterangan', 'required'); 
        if ($this->form_validation->run() == true) {                  
            $data = array(
                'tgl_update' => $this->input->post('tgl_update'),
                'no_inventaris' => $this->input->post('no_inv'),
                'status' => $this->input->post('status'),
                'admin' => $this->session->userdata('nama'),
				'id_pengguna_awal' => $this->input->post('pengguna_awal'),
                'id_pengguna' => $this->input->post('pengguna'),
                'note' => $this->input->post('catatan')                
            ); 
			if ($this->input->post('status')== "Dipinjamkan"){
				$data2=array('id_pengguna' => $this->input->post('pengguna'),'status'=>"DIPINJAMKAN");
				}else if($this->input->post('status')== "Kembali"){
					$data2=array('id_pengguna' => $this->input->post('pengguna'),'status'=>"DIGUNAKAN");
				}else{
					$data2=array('id_pengguna' => $this->input->post('pengguna'),'status'=>"DIGUNAKAN");
				}	
            $kode=$this->input->post('no_inv');         
            $this->m_laptop->history($data);            
            $this->m_printer->update($kode,$data2);            
            redirect('printer/detail/'.$kode);
        } else { 
            $id = $this->uri->segment(3);              
            $data['recordall'] = $this->m_printer->get_inv($id)->row_array(); 
            $data['pengguna'] = $this->m_laptop->getpenggunagid()->result();           
            $this->template->display('printer/history',$data);
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
			if ($this->input->post('status')== "Dipinjamkan"){
				$data2=array('id_pengguna' => $this->input->post('pengguna'),'status'=>"DIPINJAMKAN");
				}else if($this->input->post('status')== "Kembali"){
					$data2=array('id_pengguna' => $this->input->post('pengguna'),'status'=>"DIGUNAKAN");
				}else{
					$data2=array('id_pengguna' => $this->input->post('pengguna'),'status'=>"DIGUNAKAN");
				}	
            $id=$this->input->post('id');          
            $kode=$this->input->post('no_inv'); 
            $this->m_laptop->update_mutasi($id,$data);
			$this->m_printer->update($kode,$data2);
            redirect('printer/detail/'.$kode);
        } else { 
            $data['record'] = $this->m_printer->get_mutasi($id)->row_array(); 
            $this->template->display('printer/edithistory',$data);
        }
    }      

    function maintadd($id) {
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');
        $this->form_validation->set_rules('tgl_permohonan', 'Tgl. Permohonan', 'required');
        $this->form_validation->set_rules('type', 'Maintenance Type', 'required');       
        if ($this->form_validation->run() == true) {
            $supplier=$this->input->post('supplier');
            $id=$this->session->userdata('gid');
            $data = array(
                'no_permohonan' => $this->m_maintenance->kdotomatis($id),
                'tgl_permohonan' => $this->input->post('tgl_permohonan'),
                'tgl_selesai' => $this->input->post('tgl_selesai'),
                'jenis_permohonan' => $this->input->post('type'),                
                'nama_kategori' => 'Printer',
                'no_inventaris' => $this->input->post('inventaris'), 
                'catatan_pemohon' => $this->input->post('catatan'),
                'catatan_perbaikan' => $this->input->post('catatan_perbaikan'),
                'nama_supplier' => $supplier,
                'biaya' => $this->input->post('biaya'),
                'gid' => $this->session->userdata('gid')
            );
            $detail=array(
                'no_permohonan' => $this->m_maintenance->kdotomatis($id),
                'tgl_proses' =>date('Y-m-d H:i:s'),  
                'catatan' => $this->input->post('catatan'),
                'user' => "User",
             );
            $kode=$this->input->post('inventaris');
            $this->m_maintenance->simpan($data);
            $this->m_maintenance->simpan_detail($detail);
            redirect('printer/detail/'.$kode); 
        } else {
            $data['record'] = $this->m_printer->getkode($id)->row_array();
            $data['supplier'] = $this->m_masuk->getsupplier()->result();             
            $this->template->display('printer/addnew',$data);
        }
    } 
	
	function print_maintenance() { 
        $id = $this->uri->segment(3);                                           
        $data['recordall'] = $this->m_printer->get_inv($id)->row_array();
        $data['service']=$this->m_laptop->get_service($id)->result();
        $this->load->view('printer/print_maintenance', $data);            
    }

   function print_history() { 
        $id = $this->uri->segment(3); 
		$data['record'] = $this->m_printer->get_mutasi($id)->row_array(); 
        $this->load->view('printer/print_history',$data);           
    }
   
    
    function delete($kode) {
        if ($this->session->userdata('role')=='Administrator'){
            $this->m_printer->hapus($kode);
            redirect('printer');
        }else{
            $this->session->set_flashdata('result_hapus', '<br><p class="text-red">Maaf Anda tidak di ijinkan menghapus data ini !</p>');
            redirect('printer');
        }    
    }

    function _set_rules() {
        $this->form_validation->set_rules('pengguna', 'Nama Pengguna', 'required');   
        $this->form_validation->set_rules('spek', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Printer', 'required');        
        $this->form_validation->set_rules('tgl_inv', 'Tgl. Inventaris', 'required'); 
        $this->form_validation->set_rules('harga', 'Harga Beli', 'required');  
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissable'>", "</div>");
    }

}
