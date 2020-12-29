<form method="POST">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Nama Bahan Bakar</label>
                <input class="input--style-4" type="text" name="namabahan" value="<?php echo $resultupd->getNamaBahanBakar()?>">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Harga Jual</label>
                <input class="input--style-4" type="text" name="hargajual" value="<?php echo $resultupd->getHargaJual()?>">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Harga Modal</label>
                <input class="input--style-4" type="text" name="hargamodal" value="<?php echo $resultupd->getHargaModal()?>" >
            </div>
        </div>
    </div>
    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="btnSubmit"/>
    </div>
</form>