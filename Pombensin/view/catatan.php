<H2>Data Transaksi per bulan</H2>
<form method="POST">

<table id="tableId" class="display">
    <thead>
    <tr>
        <th>Bulan</th>
        <th>Harga total</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /* @var $catatan transaksi */
    foreach ($result as $catatan) {
        ?>
        <tr>
            <td><?php echo $catatan->getTanggalTransaksi() ?></td>
            <td><?php echo $catatan->getJumlahHarga() ?></td>

        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
