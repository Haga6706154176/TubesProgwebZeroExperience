<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Kode Asset</label>
        <div class="col-lg-5">
            <input type="text" name="kode_asset" class="form-control" value="<?php echo $asset['kode_asset'];?>" readonly="readonly">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Asset</label>
        <div class="col-lg-5">
            <input type="text" name="nama_asset" class="form-control" value="<?php echo $asset['nama_asset'];?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Penanggung Jawab</label>
        <div class="col-lg-5">
            <input type="text" name="pejab" class="form-control" value="<?php echo $asset['pejab'];?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Klasifikasi</label>
        <div class="col-lg-10">
            <textarea name="klasifikasi"><?php echo $asset['klasifikasi'];?></textarea>
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Image</label>
        <div class="col-lg-10">
            <img src="<?php echo base_url('assets/img/'.$asset['image']);?>" height="200px" width="200px">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label"></label>
        <div class="col-lg-5">
            <input type="file" name="gambar" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('asset');?>" class="btn btn-default">Kembali</a>
    </div>
</form>