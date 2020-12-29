<b></b><h2>Daftar Karyawan Baru</h2></b>
<form method="POST">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">nama karyawan</label>
                <input class="input--style-4" type="text" name="namakaryawan">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">nama jabatan</label>
                <input class="input--style-4" type="text" name="namajabatan">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">username</label>
                <input class="input--style-4" type="text" name="username">
            </div>
        </div>
    </div>
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
        <th>Nama</th>
        <th>Nama Jabatan</th>
        <th>Rating</th>
        <th>Username</th>
        <th>Tempat kerja</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /* @var $kar karyawan */
    foreach ($result as $kar) {
        ?>
        <tr>
            <td><?php echo $kar->getNamaKaryawan() ?></td>
            <td><?php echo $kar->getNamaJabatan() ?></td>
            <td><?php echo $kar->getRating() ?></td>
            <td><?php echo $kar->getUsername() ?></td>
            <td><?php echo $kar->getNamaCabang() ?></td>
            <td><?php
                echo '<button onclick = "updatekaryawan(' . $kar->getIdKaryawan() . ')" class="btn btn--radius-2 btn--blue" name="btnUpdate">Update</button>
                      <button onclick = "deletekaryawan(' . $kar->getIdKaryawan() . ')" class="btn btn--radius-2 btn--blue" name="btnUpdate">Delete</button>';


                ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>