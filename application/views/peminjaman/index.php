<script>
    $(function(){
        
        function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('peminjaman/tampil');?>");
        }
        loadData();
        
        function kosong(args) {
            //code
            $("#kode_asset").val('');
            $("#nama_asset").val('');
            $("#pejab").val('');
        }
        
        $("#nis").click(function(){
            var nis=$("#nis").val();
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/cariAnggota');?>",
                type:"POST",
                data:"nis="+nis,
                cache:false,
                success:function(html){
                    $("#nama").val(html);
                }
            })
        })
        
        $("#kode_asset").keypress(function(){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            
            if(keycode == '13'){
                var kode_asset=$("#kode_asset").val();
            
                $.ajax({
                    url:"<?php echo site_url('peminjaman/cariAsset');?>",
                    type:"POST",
                    data:"kode_asset="+kode_asset,
                    cache:false,
                    success:function(msg){
                        data=msg.split("|");
                        if (data==0) {
                            alert("data tidak ditemukan");
                            $("#nama_asset").val('');
                            $("#pejab").val('');
                        }else{
                            $("#nama_asset").val(data[0]);
                            $("#pejab").val(data[1]);
                            $("#tambah").focus();
                        }
                    }
                })
            }
        })
        
        $("#tambah").click(function(){
            var kode_asset=$("#kode_asset").val();
            var nama_asset=$("#nama_asset").val();
            var pejab=$("#pejab").val();
            
            if (kode_asset=="") {
                //code
                alert("Kode Buku Masih Kosong");
                return false;
            }else if (nama_asset=="") {
                //code
                alert("Data tidak ditemukan");
                return false
            }else{
                $.ajax({
                    url:"<?php echo site_url('peminjaman/tambah');?>",
                    type:"POST",
                    data:"kode_asset="+kode_asset+"&nama_asset="+nama_asset+"&pejab="+pejab,
                    cache:false,
                    success:function(html){
                        loadData();
                        kosong();
                    }
                })    
            }
            
        })
        
        
        $("#simpan").click(function(){
            var nomer=$("#no").val();
            var pinjam=$("#pinjam").val();
            var kembali=$("#kembali").val();
            var nis=$("#nis").val();
            var jumlah=parseInt($("#jumlahTmp").val(),10);
            
            if (nis=="") {
                alert("Pilih Nis Siswa");
                return false;
            }else if (jumlah==0) {
                alert("pilih buku yang akan dipinjam");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('peminjaman/sukses');?>",
                    type:"POST",
                    data:"nomer="+nomer+"&pinjam="+pinjam+"&kembali="+kembali+"&nis="+nis+"&jumlah="+jumlah,
                    cache:false,
                    success:function(html){
                        alert("Transaksi Peminjaman berhasil");
                        location.reload();
                    }
                })
            }
            
        })
        
        $(".hapus").live("click",function(){
            var kode_asset=$(this).attr("kode_asset");
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/hapus');?>",
                type:"POST",
                data:"kode_asset="+kode_asset,
                cache:false,
                success:function(html){
                    loadData();
                }
            });
        });
        
        $("#cari").click(function(){
            $("#myModal2").modal("show");
        })
        
        $("#cariasset").keyup(function(){
            var cariasset=$("#cariasset").val();
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/pencarianasset');?>",
                type:"POST",
                data:"cariasset="+cariasset,
                cache:false,
                success:function(html){
                    $("#tampilasset").html(html);
                }
            })
        })
        
        $(".tambah").live("click",function(){
            var kode_asset=$(this).attr("kode_asset");
            var nama_asset=$(this).attr("nama_asset");
            var pejab=$(this).attr("pejab");
            
            $("#kode_asset").val(kode_asset);
            $("#nama_asset").val(nama_asset);
            $("#pejab").val(pejab);
            
            $("#myModal2").modal("hide");
        })
        
    })
</script>

<legend><?php echo $title;?></legend>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" action="<?php echo site_url('peminjaman/simpan');?>" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">No. Transaksi</label>
                    <div class="col-lg-7">
                        <input type="text" id="no" name="no" class="form-control" value="<?php echo $noauto;?>" readonly="readonly">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl Pinjam</label>
                    <div class="col-lg-7">
                        <input type="text" id="pinjam" name="pinjam" class="form-control" value="<?php echo $tanggalpinjam;?>" readonly="readonly">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl Kembali</label>
                    <div class="col-lg-7">
                        <input type="text" id="kembali" name="kembali" class="form-control" value="<?php echo $tanggalkembali;?>" readonly="readonly">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Nis</label>
                    <div class="col-lg-7">
                        <select name="nis" class="form-control" id="nis">
                            <option></option>
                            <?php foreach($anggota as $anggota):?>
                            <option value="<?php echo $anggota->nis;?>"><?php echo $anggota->nis;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Nama Siswa</label>
                    <div class="col-lg-7">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        Data Asset
    </div>
    
    <div class="panel-body">
        <div class="form-inline">
            <div class="form-group">
                <label>Kode Asset</label>
                <input type="text" class="form-control" placeholder="Kode Asset" id="kode_asset">
            </div>
            <div class="form-group">
                <label class="sr-only">Nama Asset</label>
                <input type="text" class="form-control" placeholder="Nama Asset" id="nama_asset" readonly="readonly">
            </div>
            <div class="form-group">
                <label class="sr-only">Penanggung Jawab</label>
                <input type="text" class="form-control" placeholder="Penanggung Jawab" id="pejab" readonly="readonly">
            </div>
            <div class="form-group">
                <label class="sr-only">Penanggung Jawab</label>
                <button id="tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <div class="form-group">
                <label class="sr-only">Penanggung Jawab</label>
                <button id="cari" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </div>
    
    <div id="tampil"></div>
    
    <div class="panel-footer">
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
    </div>
</div>




 <!-- Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cari Asset</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-horizontal">
                            <label class="col-lg-3 control-label">Cari Asset</label>
                            <div class="col-lg-5">
                                <input type="text" name="cariasset" id="cariasset" class="form-control">
                            </div>
                        </div>
                        
                        <div id="tampilasset"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
