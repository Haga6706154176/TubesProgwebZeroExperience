<?php
class M_akun extends CI_Model{
    private $table="akun";
    
    function cek($username,$password){
        $this->db->where("user",$username);
        $this->db->where("password",$password);
        return $this->db->get("akun");
    }
    
    function semua(){
        return $this->db->get("akun");
    }
    
    function cekKode($kode){
        $this->db->where("user",$kode);
        return $this->db->get("akun");
    }
    
    function cekId($kode){
        $this->db->where("id_akun",$kode);
        return $this->db->get("akun");
    }
    
    function update($id,$info){
        $this->db->where("id_akun",$id);
        $this->db->update("akun",$info);
    }
    
    function simpan($info){
        $this->db->insert("akun",$info);
    }
    
    function hapus($kode){
        $this->db->where("id_akun",$kode);
        $this->db->delete("akun");
    }
}