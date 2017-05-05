<?php
class M_Laporan extends CI_Model{
    #code
    
    function semuaAnggota(){
        return $this->db->get("anggota");
    }
    
    function semuaBuku(){
        return $this->db->get("asset");
    }
    
    function detailpeminjaman($tanggal1,$tanggal2){
        return $this->db->query("select * from transaksi where tanggal_pinjam between '$tanggal1' and '$tanggal2' group by id_transaksi");
    }
    
    function detail_pinjam($id){
        $this->db->select("*");
        $this->db->from("transaksi");
        $this->db->where("id_transaksi",$id);
        $this->db->join("asset","asset.kode_asset=transaksi.kode_asset");
        return $this->db->get();
    }
    
    function detailpengembalian($tanggal1,$tanggal2){
        return $this->db->query("select * from pengembalian where tgl_pengembalian between '$tanggal1' and '$tanggal2' group by id_transaksi");
    }
}
