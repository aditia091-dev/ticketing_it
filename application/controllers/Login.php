<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->library('bcrypt');
        $this->load->model('M_user');
    }

    function index() {
        $this->load->view('user/login');
    }
	
	function login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        //$this->form_validation->set_error_delimiters('<span class="text-read">', '</span><br>');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/login');
        }else {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            //$login = $this->M_user->login($username, $password);
			$login    = $this->db->get_where('tb_user',array('username'=>$username));
			if($login->num_rows()>0){
				$row= $login->row_array();
				$paswd = $row['password'];
				if ($this->bcrypt->check_password($password, $paswd)) {
					$group=$this->db->get_where('tb_group',array('gid'=>$row['gid']))->row_array();
					$data = array(
								'nama' =>$row['nama_user'] ,
								'username'=>$username ,
								'gid'=>$row['gid'],
								'role'=>$row['role'],
								'last_login'=>$row['last_login'],
								'group'=>$group['nama_group'],
								'status_login'=>'login_diterima',
							);
					$this->session->set_userdata($data);
					$this->db->where('username',$username);
					$this->db->update('tb_user',array('last_login'=>date('Y-m-d H:i:s')));
					redirect('dashboard', 'refresh');
					//$berhasil=$this->session->userdata('gid');
					//echo $berhasil;
				}else{
					$this->session->set_flashdata('error', '<br>Username atau Password yang anda masukkan salah.');
					$this->load->view('user/login');
				}
			}else{
				$this->session->set_flashdata('error', '<br>Username tidak ditemukan.');
                $this->load->view('user/login');
				//echo"user ora ono gan";
			}
        }
    }

    function auth() {  
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $keylogin = $this->config->item('key_login');
            $hasil    = $this->db->get_where('tb_user',array('username'=>$username,'password'=>sha1($password.$keylogin)));
            if ($hasil->num_rows()> 0) {
                $row= $hasil->row_array();
                $group=$this->db->get_where('tb_group',array('gid'=>$row['gid']))->row_array();
                $data = array('nama' =>$row['nama_user'] ,
                                'username'=>$username ,
                                'gid'=>$row['gid'],
                                'role'=>$row['role'],
                                'last_login'=>$row['last_login'],
                                'group'=>$group['nama_group'],
                                'status_login'=>'login_diterima',
                        );
                $this->session->set_userdata($data);
                $this->db->where('username',$username);
                $this->db->update('tb_user',array('last_login'=>date('Y-m-d H:i:s')));
                redirect('dashboard');   
            }else{
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }                
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('web');
    }

}
