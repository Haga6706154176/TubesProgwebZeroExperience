<legend>Data Akun</legend>
<a href="<?php echo site_url('dashboard/tambahakun');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<?php echo $message;?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Username</td>
            <td>Password</td>
			<td>Status</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($akun as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->user;?></td>
        <td><?php echo $row->password;?></td>
		<td><?php echo $row->status;?></td>
        <td><a href="<?php echo site_url('dashboard/edit/'.$row->id_akun);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode="<?php echo $row->id_akun;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</table>


<script>
    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('dashboard/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('dashboard/akun/delete_success');?>";
                }
            });
        });
    });
</script>