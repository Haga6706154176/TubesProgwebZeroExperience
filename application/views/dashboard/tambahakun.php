<legend><?php echo $title;?></legend>
<?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-lg-3 control-label">Username</label>
        <div class="col-lg-5">
            <input type="text" name="user" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label">Password</label>
        <div class="col-lg-5">
            <input type="password" name="password" class="form-control">
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-3 control-label">Status</label>
        <div class="col-lg-5">
            <select name = "status">
				<option value="Pilih">Pilih</option>
				<option value="Mahasiswa">Mahasiswa</option>
				<option value="Petugas">Petugas</option>
				<option value="Administrator">Administrator</option>
			</select> 
        </div>
    </div>
    
    <div class="form-group well">
        <div class="col-lg-5">
            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('dashboard/akun');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>