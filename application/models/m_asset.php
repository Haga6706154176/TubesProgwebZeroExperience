<?php
class M_asset extends CI_Model{
    private $table="asset";
    private $primary="kode_asset";
    
    function semua($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->get($this->table,$limit,$offset);
    }
    
    function jumlah(){
        return $this->db->count_all($this->table);
    }
    
    function cek($kode_asset){
        $this->db->where($this->primary,$kode_asset);
        $query=$this->db->get($this->table);
        
        return $query;
    }
    
    function simpan($jenis){
        $this->db->insert($this->table,$jenis);
        return $this->db->insert_id();
    }
    
    function update($kode_asset,$jenis){
        $this->db->where($this->primary,$kode_asset);
        $this->db->update($this->table,$jenis);
    }
    
    function hapus($kode_asset){
        $this->db->where($this->primary,$kode_asset);
        $this->db->delete($this->table);
    }
    
    function cari($cari){
        $this->db->like($this->primary,$cari);
        $this->db->or_like("nama_asset",$cari);
        return $this->db->get($this->table);
    }
}