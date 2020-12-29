<table id="tableId" class="display">
    <thead>
    <tr>
        <th>Nama Cabang</th>
        <th>Bulan</th>
        <th>Harga total</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /* @var $catat transaksi */
    foreach ($result as $catat) {
        ?>
        <tr>
            <td><?php echo  $catat->getNamaCabang() ?></td>
            <td><?php echo $catat->getTanggalTransaksi() ?></td>
            <td><?php echo $catat->getJumlahHarga() ?></td>

        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<?php
