<?php
class Web extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model(array('m_asset','m_anggota','m_akun'));
        if($this->session->userdata('username')){
            redirect('dashboard');
        }
    }
    
    function index(){
		$cek = $this->session->userdata('logged_in');
		if(empty($cek)){
			$this->load->view('web/index');
		}
		else{
			$st = $this->session->userdata('status');
			if($st=='Mahasiswa'){
				redirect('dashboard1');
			}
			else if($st=='Petugas'){
				redirect('dashboard');
			}
			else if($st=='Administrator'){
				redirect('dashboard');
			}				
		}
			
    }
    
    function cari_buku(){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_asset->cari($cari)->result();
        $data['title']="Pencarian Buku";
        $this->load->view('web/cari_buku',$data);
    }
    
    function anggota(){
        $data['title']="Data Anggota";
        $data['anggota']=$this->m_anggota->semua()->result();
        $this->load->view('web/anggota',$data);
    }
    
    function cari_anggota(){
        $cari=$this->input->post('cari');
        $data['title']="Data Anggota";
        $data['anggota']=$this->m_anggota->cari($cari)->result();
        $this->load->view('web/anggota',$data);
    }
    
    function login(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');
        $this->m_akun->cek($u,$p);
    }
    
    function proses(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','password','required|trim|xss_clean');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Username dan password harus diisi');
            redirect('web');
        }else{
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $cek=$this->m_akun->cek($username,md5($password));
			//$cek=$this->db->get_where('petugas', array('user' => $username, 'password' => $password));
			
            if($cek->num_rows()>0){
				foreach ($cek->result() as $qck) 
				{
					if($qck->status=='Mahasiswa')
					{
						$this->session->set_userdata('username',$username);
						redirect('dashboard1');
					}
					else if($qck->status=='Petugas')
					{
						$this->session->set_userdata('username',$username);
						redirect('dashboard2');
					}
					else if($qck->status=='Administrator')
					{
						$this->session->set_userdata('username',$username);
						redirect('dashboard');
					}		
				}
			}					
			else{
				//login gagal
				$this->session->set_flashdata('message','Username atau password salah');
				redirect('web');
			}
		}
    }
}