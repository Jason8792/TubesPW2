<h2>Edit Data Member</h2>
<form method="POST">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">nama </label>
                <input class="input--style-4" type="text" name="updnama" value="<?php echo $resultupd->getNamaMember() ?>">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Poin</label>
                <input class="input--style-4" type="text" name="updpoin" value="<?php echo $resultupd->getPoin() ?>">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Tanggal lahir</label>
                <input class="input--style-4" type="text" name="updtanggallahir" value="<?php echo $resultupd->getTanggalUlangTahun() ?>" >
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Kadaluarsa</label>
                <input class="input--style-4" type="text" name="updkadaluarsa" value="<?php echo $resultupd-> getKadaluarsa()?>" >
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Email</label>
                <input class="input--style-4" type="text" name="updemail" value="<?php echo $resultupd-> getEmail()?>" >
            </div>
        </div>
    </div>


    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="updbtnSubmit"/>
    </div>
<?php
