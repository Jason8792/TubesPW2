<h2>Edit Data Karyawan</h2>
<form method="POST">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">nama karyawan</label>
                <input class="input--style-4" type="text" name="updnamakaryawan" value="<?php echo $resultupd->getNamaKaryawan() ?>">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">nama jabatan</label>
                <input class="input--style-4" type="text" name="updnamajabatan" value="<?php echo $resultupd->getNamaJabatan() ?>">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">username</label>
                <input class="input--style-4" type="text" name="updusername" value="<?php echo $resultupd->getUsername() ?>" >
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Rating</label>
                <input class="input--style-4" type="text" name="updrating" value="<?php echo $resultupd->getRating() ?>" >
            </div>
        </div>
    </div>
    <div class="input-group">
        <label class="label">Cabang</label>
        <?php
        /* @var $cab cabang */
        ?>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="updidcabang">
                <option disabled="disabled" selected="selected">Choose option</option>
                <?php
                /* @var $cab cabang*/
                foreach ($result2 as $cab){
                    if ($cab->getIdCabang() == $resultupd->getKaryawanIdCabang()) {
                        echo "<option selected value = '". $cab->getIdCabang() ."'>". $cab->getNamaCabang() ."</option>";
                    } else {
                        echo "<option value = '". $cab->getIdCabang() ."'>". $cab->getNamaCabang() ."</option>";
                    }
                }
                ?>
            </select>
            <div class="select-dropdown"></div>
        </div>
    </div>

    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="updbtnSubmit"/>
    </div>
