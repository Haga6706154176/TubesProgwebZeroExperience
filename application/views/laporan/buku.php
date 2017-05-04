<legend><?php echo $title;?></legend>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Kode Asset</td>
            <td>Nama Asset</td>
            <td>Penanggung Jawab</td>
            <td>Klasifikasi</td>
        </tr>
    </thead>
    <?php $no=0; foreach($buku as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->kode_asset;?></td>
        <td><?php echo $row->nama_asset;?></td>
        <td><?php echo $row->pejab;?></td>
        <td><?php echo $row->klasifikasi;?></td>
    </tr>
    <?php endforeach;?>
</table>