<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('asset/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Kode / Nama Asset</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('asset/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Image</td>
            <td>Kode Asset</td>
            <td>Nama Asset</td>
            <td>Penanggung Jawab</td>
            <td>Klasifikasi</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($asset as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><img src="<?php echo base_url('assets/img/'.$row->image);?>" height="100px" width="100px"></td>
        <td><?php echo $row->kode_asset;?></td>
        <td><?php echo $row->nama_asset;?></td>
        <td><?php echo $row->pejab;?></td>
        <td><?php echo $row->klasifikasi;?></td>
        <td><a href="<?php echo site_url('asset/edit/'.$row->kode_asset);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode_asset="<?php echo $row->kode_asset;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>
<?php echo $pagination;?>

<script>
    $(function(){
        $(".hapus").click(function(){
            var kode_asset=$(this).attr("kode_asset");
            
            $("#idhapus").val(kode_asset);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode_asset=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('asset/hapus');?>",
                type:"POST",
                data:"kode_asset="+kode_asset,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('asset/index/delete_success');?>";
                }
            });
        });
    });
    
</script>