<b></b><h2>Daftar Member Baru</h2></b>
<form method="POST">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">nama member</label>
                <input class="input--style-4" type="text" name="namamember">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Email</label>
                <input class="input--style-4" type="text" name="email">
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
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Tanggal Ulang tahun</label>
                <input class="input--style-4" type="text" name="ulangtahun">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Nomor kendaraan mobil</label>
                <input class="input--style-4" type="text" name="nomormobil">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Nomor kendaraan motor</label>
                <input class="input--style-4" type="text" name="nomormotor">
            </div>
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
        <th>Poin</th>
        <th>Tanggal Ulang Tahun</th>
        <th>Kadaluarsa</th>
        <th>Email</th>
        <th>Username</th>
        <th>Plat Mobil</th>
        <th>Plat Motor</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /* @var $mem member */
    foreach ($result as $mem) {
        ?>
        <tr>
            <td><?php echo $mem->getNamaMember() ?></td>
            <td><?php echo $mem->getPoin() ?></td>
            <td><?php echo $mem->getTanggalUlangTahun() ?></td>
            <td><?php echo $mem->getKadaluarsa() ?></td>
            <td><?php echo $mem->getEmail() ?></td>
            <td><?php echo $mem->getUsername()?></td>
            <td><?php echo $mem->getNomorMobil()?></td>
            <td><?php echo $mem->getNomorMotor()?></td>
            <td><?php
                echo '<button onclick = "updatemember(' . $mem->getIdMember() . ')" class="btn btn--radius-2 btn--blue" name="btnUpdate">Update</button>
                      <button onclick = "deletemember(' . $mem->getIdMember() . ')" class="btn btn--radius-2 btn--blue" name="btnUpdate">Delete</button>';


                ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>