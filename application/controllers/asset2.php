<?php
class Asset2 extends CI_Controller{
    private $limit=20;
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template2','form_validation','pagination','upload'));
        $this->load->model('m_asset');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index($offset=0,$order_column='kode_asset',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='kode_asset';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $data['asset']=$this->m_asset->semua($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data Asset";
        
        $config['base_url']=site_url('anggota/index/');
        $config['total_rows']=$this->m_asset->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        
        
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
            $this->template2->display('asset/index',$data);
    }
    
    
    function tambah(){
        $data['title']="Tambah Asset";
        $this->_set_rules();
        if($this->form_validation->run()==true){//jika validasi dijalankan dan benar
            $kode_asset=$this->input->post('kode_asset'); // mendapatkan input dari kode_asset
            $cek=$this->m_asset->cek($kode_asset); // cek kode_asset di database
            if($cek->num_rows()>0){ // jika kode_asset sudah ada, maka tampilkan pesan
                $data['message']="<div class='alert alert-danger'>Kode Buku sudah ada</div>";
                $this->template2->display('asset/tambah',$data);
            }else{ // jika kode_asset asset belum ada, maka simpan
                
                //setting konfiguras upload image
                $config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '2000';
		$config['max_height']  = '1024';
                
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar="";
                }else{
                    $gambar=$this->upload->file_name;
                }
                
                $info=array(
                    'kode_asset'=>$this->input->post('kode_asset'),
                    'nama_asset'=>$this->input->post('nama_asset'),
                    'pejab'=>$this->input->post('pejab'),
                    'klasifikasi'=>$this->input->post('klasifikasi'),
                    'image'=>$gambar
                );
                $this->m_asset->simpan($info);
                redirect('asset/index/add_success');

            }
        }else{
            $data['message']="";
            $this->template2->display('asset/tambah',$data);
        }
    }
    
    function edit($id){
        $data['title']="Edit Data Asset";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $kode_asset=$this->input->post('kode_asset');
            
            //setting konfiguras upload image
            $config['upload_path'] = './assets/img/';
	    $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '1000';
	    $config['max_width']  = '2000';
	    $config['max_height']  = '1024';
                
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar')){
                $gambar="";
            }else{
                $gambar=$this->upload->file_name;
            }
            
            $info=array(
                'nama_asset'=>$this->input->post('nama_asset'),
                'pejab'=>$this->input->post('pejab'),
                'klasifikasi'=>$this->input->post('klasifikasi'),
                'image'=>$gambar
            );
            $this->m_asset->update($kode_asset,$info);
            
            $data['asset']=$this->m_asset->cek($id)->row_array();
            $data['message']="<div class='alert alert-success'>Data berhasil diupdate</div>";
            $this->template2->display('asset/edit',$data);
        }else{
            $data['message']="";
            $data['asset']=$this->m_asset->cek($id)->row_array();
            $this->template2->display('asset/edit',$data);
        }
    }
    
    function hapus(){
        $kode_asset=$this->input->post('kode_asset');
        $detail=$this->m_asset->cek($kode_asset)->result();
	foreach($detail as $det):
	    unlink("assets/img/".$det->image);
	endforeach;
        $this->m_asset->hapus($kode_asset);
    }
    
    function cari(){
        $data['title']="Pencairan";
        $cari=$this->input->post('cari');
        $cek=$this->m_asset->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['asset']=$cek->result();
            $this->template2->display('asset/cari',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['asset']=$cek->result();
            $this->template2->display('asset/cari',$data);
        }
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('kode_asset','Kode Buku','required|max_length[5]');
        $this->form_validation->set_rules('nama_asset','Judul Buku','required|max_length[100]');
        $this->form_validation->set_rules('pejab','Pengarang','required|max_length[50]');
        $this->form_validation->set_rules('klasifikasi','Klasifikasi','required|max_length[25]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}