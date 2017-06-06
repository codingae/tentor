<link rel="stylesheet" type="text/css" href="assets/css/realsite.css">
<table class="table table-bordered" style="width: 100%">
	<tr>
		<td><b>Kelas</b></td>
		<td><b>Pertemuan (/Minggu)</b></td>
		<td><b>Biaya (/Bulan)</b></td>
		<td><b>Pilih</b></td>
	</tr>	
	<?php 
	include "../../jembatan.php";
	$id_keahlian = $_GET['option'];
	$query_keahlian = mysqli_query($koneksi,"select jenjang from keahlian where id_keahlian='$id_keahlian'");
	$row_keahlian   = mysqli_fetch_array($query_keahlian);
	$jenjang        = $row_keahlian['jenjang'];
	if ($jenjang=="sd") {
		$query_biaya = mysqli_query($koneksi,"SELECT * FROM biaya WHERE kelas BETWEEN 1 AND 6");
		while ($row_biaya = mysqli_fetch_array($query_biaya)) {
		?>
		<tr>
		<td><?php echo "Kelas ". $row_biaya['kelas']; ?></td>
		<td><?php echo $row_biaya['pertemuan']."x Pertemuan"; ?></td>
		<td><?php echo "Rp. ".number_format($row_biaya['biaya'],'0','.',',') ?></td>
		<td><input type="radio" name="pilih" value="<?php echo $row_biaya['id'] ?>" required></td>
		</tr>
		<?php
		}
	}elseif ($jenjang=="smp") {
		$query_biaya = mysqli_query($koneksi,"SELECT * FROM biaya WHERE kelas BETWEEN 7 AND 9");
		while ($row_biaya = mysqli_fetch_array($query_biaya)) {
		?>
		<tr>
		<td><?php echo "Kelas ". $row_biaya['kelas']; ?></td>
		<td><?php echo $row_biaya['pertemuan']."x Pertemuan"; ?></td>
		<td><?php echo "Rp. ".number_format($row_biaya['biaya'],'0','.',',') ?></td>
		<td><input type="radio" name="pilih" value="<?php echo $row_biaya['id'] ?>" required></td>
		</tr>
		<?php
		}
	}elseif ($jenjang=="sma") {
		$query_biaya = mysqli_query($koneksi,"SELECT * FROM biaya WHERE kelas BETWEEN 10 AND 12");
		while ($row_biaya = mysqli_fetch_array($query_biaya)) {
		?>
		<tr>
		<td><?php echo "Kelas ". $row_biaya['kelas']; ?></td>
		<td><?php echo $row_biaya['pertemuan']."x Pertemuan"; ?></td>
		<td><?php echo "Rp. ".number_format($row_biaya['biaya'],'0','.',',') ?></td>
		<td><input type="radio" name="pilih" value="<?php echo $row_biaya['id'] ?>" required></td>
		</tr>
		<?php
		}
	}
	?>	
</table>
