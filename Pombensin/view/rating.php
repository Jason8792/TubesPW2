<form method="POST">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Rating</label>
                <input class="input--style-4" type="text" name="rating" placeholder="Maksimal 5">
            </div>
        </div>
    </div>
    <div class="input-group">
        <label class="label">Karyawan</label>
        <?php
        /* @var $karyawan karyawan */
        ?>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="idKaryawan">
                <option disabled="disabled" selected="selected">Choose option</option>
                <?php
                foreach ($resultKaryawan as $karyawan){
                    echo "<option value = '". $karyawan->getIdKaryawan() ."'>". $karyawan->getNamaKaryawan() ."</option>";
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