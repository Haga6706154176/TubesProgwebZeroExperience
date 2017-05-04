<table class="table table-striped">
        <thead>
            <tr>
                <td>Kode Asset</td>
                <td>Nama Asset</td>
                <td>Penanggung Jawab</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($asset as $tmp):?>
        <tr>
            <td><?php echo $tmp->kode_asset;?></td>
            <td><?php echo $tmp->nama_asset;?></td>
            <td><?php echo $tmp->pejab;?></td>
            <td><a href="#" class="tambah" kode_asset="<?php echo $tmp->kode_asset;?>"
            nama_asset="<?php echo $tmp->nama_asset;?>"
            pejab="<?php echo $tmp->pejab;?>"><i class="glyphicon glyphicon-plus"></i></a></td>
        </tr>
        <?php endforeach;?>
    </table>