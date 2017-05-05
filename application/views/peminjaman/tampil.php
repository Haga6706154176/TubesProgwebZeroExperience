<table class="table table-striped">
        <thead>
            <tr>
                <td>Kode Asset</td>
                <td>Nama Asset</td>
                <td>Penanggung Jawab</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($tmp as $tmp):?>
        <tr>
            <td><?php echo $tmp->kode_asset;?></td>
            <td><?php echo $tmp->nama_asset;?></td>
            <td><?php echo $tmp->pejab;?></td>
            <td><a href="#" class="hapus" kode_asset="<?php echo $tmp->kode_asset;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="2">Total Asset</td>
            <td colspan="2"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp;?>" class="form-control"></td>
        </tr>
    </table>