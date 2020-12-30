<div class="row row-space">
    <div class="col-2">
        <div class="input-group">
            <label class="label">Nama</label>
            <label class="label"><?php echo $resultMember->getNamaMember() ?></label>
        </div>
    </div>
</div>
<div class="row row-space">
    <div class="col-2">
        <div class="input-group">
            <label class="label">Tanggal Kadaluarsa</label>
            <label class="label"><?php echo $resultMember->getKadaluarsa() ?></label>
        </div>
    </div>
</div>
<div class="row row-space">
    <div class="col-2">
        <div class="input-group">
            <label class="label">Total Poin</label>
            <label class="label"><?php echo $resultMember->getPoin() ?></label>
        </div>
    </div>
</div>