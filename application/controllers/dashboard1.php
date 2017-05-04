<?php
class Dashboard1 extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_akun');
        $this->load->library(array('form_validation','template1'));
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index(){
        $data['title']="Home";
        
        $this->template1->display('dashboard/index1',$data);
    }
    
    function akun(){
        $data['title']="Data Akun";
        $data['akun']=$this->m_akun->semua()->result();
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
        $this->template1->display('dashboard/akun',$data);
    }
    
    function tambahakun(){
        $data['title']="Tambah Akun";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $user=$this->input->post('user');
            $cek=$this->m_akun->cekKode($user);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-danger'>Username sudah digunakan</div>";
                $this->template1->display('dashboard/tambahakun',$data);
            }else{
                $info=array(
                    'user'=>$this->input->post('user'),
                    'password'=>md5($this->input->post('password')),
					'status'=>$this->input->post('status')
                );
                $this->m_akun->simpan($info);
                redirect('dashboard/akun/add_success');
            }
        }else{
            $data['message']="";
            $this->template1->display('dashboard/tambahakun',$data);
        }
    }
    
    function edit($id){
        $data['title']="Update data Akun";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id=$this->input->post('id');
            $info=array(
                'user'=>$this->input->post('user'),
                'password'=>md5($this->input->post('password')),
				'status'=>$this->input->post('status'),
            );
            $this->m_akun->update($id,$info);
            $data['akun']=$this->m_akun->cekId($id)->row_array();
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $this->template1->display('dashboard/editpetugas',$data);
        }else{
            $data['message']="";
            $data['akun']=$this->m_akun->cekId($id)->row_array();
            $this->template1->display('dashboard/editpetugas',$data);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $this->m_akun->hapus($kode);
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('user','username','required|trim');
        $this->form_validation->set_rules('password','password','required|trim');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
    
    function logout(){
        $this->session->unset_userdata('username');
        redirect('web');
    }
}