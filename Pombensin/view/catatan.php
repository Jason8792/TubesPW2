<H2>Data Transaksi per bulan</H2>
<form method="POST">
<div class="input-group">
    <label class="label">Cabang</label>
    <?php
    /* @var $cab cabang */
    ?>
    <div class="rs-select2 js-select-simple select--no-search">
        <select name="idcabang">
            <option disabled="disabled" selected="selected">Choose option</option>
            <?php
            /* @var $cab cabang*/
            foreach ($result2 as $cab){
                echo "<option value = '". $cab->getIdCabang() ."'>". $cab->getNamaCabang() ."</option>";
            }
            ?>
        </select>
        <div class="select-dropdown"></div>
    </div>
</div>
<div class="p-t-15">
    <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="btnSubmit"/>
</div>
</form>

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
