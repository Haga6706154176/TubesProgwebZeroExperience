<?php
class Peminjaman2 extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','template2'));
        $this->load->model('m_peminjaman');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index(){
        $data['title']="Transaksi Peminjaman";
        $data['tanggalpinjam']=date('Y-m-d');
        $data['tanggalkembali'] = strtotime('+7 day',strtotime($data['tanggalpinjam']));
        $data['noauto']=$this->m_peminjaman->nootomatis();
        $data['anggota']=$this->m_peminjaman->getAnggota()->result();
        $data['tanggalkembali'] = date('Y-m-d', $data['tanggalkembali']);
        $this->template2->display('peminjaman/index',$data);
    }
    
    function tampil(){
        $data['tmp']=$this->m_peminjaman->tampilTmp()->result();
        $data['jumlahTmp']=$this->m_peminjaman->jumlahTmp();
        $this->load->view('peminjaman/tampil',$data);
    }
    
    function sukses(){
        
        $tmp=$this->m_peminjaman->tampilTmp()->result();
        foreach($tmp as $row){
            $info=array(
                'id_transaksi'=>$this->input->post('nomer'),
                'nis'=>$this->input->post('nis'),
                'kode_asset'=>$row->kode_asset,
                'tanggal_pinjam'=>$this->input->post('pinjam'),
                'tanggal_kembali'=>$this->input->post('kembali'),
                'status'=>"N"
            );
            $this->m_peminjaman->simpan($info);
            
            //hapus data di temp
            $this->m_peminjaman->hapusTmp($row->kode_asset);
        }
    }
    
    function cariAnggota(){
        $nis=$this->input->post('nis');
        $anggota=$this->m_peminjaman->cariAnggota($nis);
        if($anggota->num_rows()>0){
            $anggota=$anggota->row_array();
            echo $anggota['nama'];
        }
    }
    
    function cariAsset(){
        $kode_asset=$this->input->post('kode_asset');
        $asset=$this->m_peminjaman->cariAsset($kode_asset);
        if($asset->num_rows()>0){
            $asset=$asset->row_array();
            echo $asset['nama_asset']."|".$asset['pejab'];
        }
    }
    
    
    function tambah(){
        $kode_asset=$this->input->post('kode_asset');
        $cek=$this->m_peminjaman->cekTmp($kode_asset);
        if($cek->num_rows()<1){
            $info=array(
                'kode_asset'=>$this->input->post('kode_asset'),
                'nama_asset'=>$this->input->post('nama_asset'),
                'pejab'=>$this->input->post('pejab')
            );
            $this->m_peminjaman->simpanTmp($info);
        }
    }
    
    function hapus(){
        $kode_asset=$this->input->post('kode_asset');
        $this->m_peminjaman->hapusTmp($kode_asset);
    }
    
    function pencarianbuku(){
        $cari=$this->input->post('caribuku');
        $data['asset']=$this->m_peminjaman->pencarianbuku($cari)->result();
        $this->load->view('peminjaman/pencarianbuku',$data);
    }
}