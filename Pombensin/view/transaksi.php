<form method="POST">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Tanggal</label>
                <input class="input--style-4" type="text" name="tanggal">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Total Harga</label>
                <input class="input--style-4" type="text" name="totalHarga">
            </div>
        </div>
    </div>
    <div class="input-group">
        <label class="label">Member</label>
        <?php
        /* @var $member member */
        ?>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="idMember">
                <option disabled="disabled" selected="selected">Choose option</option>
                <?php
                foreach ($resultMember as $member){
                    echo "<option value = '". $member->getIdMember() ."'>". $member->getNamaMember() ."</option>";
                }
                ?>
            </select>
            <div class="select-dropdown"></div>
        </div>
    </div>
    <div class="input-group">
        <label class="label">Barang</label>
        <?php
        /* @var $barang bahan_bakar */
        ?>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="idBarang">
                <option disabled="disabled" selected="selected">Choose option</option>
                <?php
                foreach ($resultBarang as $barang){
                    echo "<option value = '". $barang->getIdBahanBakar() ."'>". $barang->getNamaBahanBakar() ."</option>";
                }
                ?>
            </select>
            <div class="select-dropdown"></div>
        </div>
    </div>
    <div class="input-group">
        <label class="label">Cabang</label>
        <?php
        /* @var $cabang cabang */
        ?>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="idCabang">
                <option disabled="disabled" selected="selected">Choose option</option>
                <?php
                foreach ($resultCabang as $cabang){
                    echo "<option value = '". $cabang->getIdCabang() ."'>". $cabang->getNamaCabang() ."</option>";
                }
                ?>
            </select>
            <div class="select-dropdown"></div>
        </div>
    </div>
    <div class="input-group">
        <label class="label">Pemakaian Poin</label>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="pakaiPoin">
                <option disabled="disabled" selected="selected">Choose option</option>
                <option value="true">Yes</option>
                <option value="false">No</option>
            </select>
            <div class="select-dropdown"></div>
        </div>
    </div>
    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="btnSubmit"/>
    </div>
</form>