<table class="table table-striped">
    <thead>
        <tr>
            <td>Kode Asset</td>
            <td>Nama Asset</td>
            <td>Penanggung Jawab</td>
        </tr>
    </thead>
    <?php foreach($asset as $row):?>
    <tr>
        <td><?php echo $row->kode_asset;?></td>
        <td><?php echo $row->nama_asset;?></td>
        <td><?php echo $row->pejab;?></td>
    </tr>
    <?php endforeach;?>
</table>