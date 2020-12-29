<table id="tableId" class="display">
    <thead>
    <tr>
        <th>Bahan Bakar</th>
        <th>Harga Modal</th>
        <th>Harga Jual</th>
        <th>Poin</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /* @var $bb bahan_bakar */
	foreach ($result as $bb) {
	?>
    <tr>
        <td><?php echo $bb->getNamaBahanBakar() ?></td>
        <td><?php echo $bb->getHargaModal() ?></td>
        <td><?php echo $bb->getHargaJual() ?></td>
        <td><?php echo $bb->getPoin() ?></td>
		<td><?php
            echo '<button onclick = "updatebahanbakar(' . $bb->getIdBahanBakar() . ')" class="btn btn--radius-2 btn--blue" name="btnUpdate">Update</button>';
            ?>
		</td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>