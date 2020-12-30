<form method="POST"">
    <div class="input-group">
        <label class="label">Cabang</label>
        <?php
        /* @var $cabang cabang */
        ?>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="idCabang">
                <option value="selectAll">Select All</option>
                <?php
                foreach ($resultCabang as $cabang) {
                    echo "<option value = '" . $cabang->getIdCabang() . "'>" . $cabang->getNamaCabang() . "</option>";
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
        <th>Nama</th>
        <th>Cabang</th>
        <th>Rating</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /* @var $karyawan karyawan */
    foreach ($resultKaryawan as $karyawan) {
        ?>
        <tr>
            <td><?php echo $karyawan->getNamaKaryawan() ?></td>
            <td><?php echo $karyawan->getNamaCabang() ?></td>
            <td><?php echo $karyawan->getRating() ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>