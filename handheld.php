<?php 
include 'config.php';
 ?>
<div class="container box" style="padding-top: 1px; margin-top: 5px ">
	<div class="table-responsive">
	<h3 align="center" style="margin-top: 5px">Serah Terima Handheld</h3>
		<div align="center">
			<button type="button" id="add_buttonhh" data-toggle="modal" data-target="#hh-Modal" class="btn btn-danger btn-xs" accesskey="h" tooltips="alt+shift">PINJAM <u>H</u>H</button>
		</div>
		<table id="hh_data" class="table datatable table-bordered table-hover table-condensed" style="width: 100%; text-transform:uppercase; background: #f9e2f7;">
			<thead style="text-transform: capitalize;">
				<tr>
					<th style="width: 30px">No.</th>
					<th style="width: 120px">Handheld</th>
					<th style="width: 308px">User</th>
					<th style="width: 137px">Bagian</th>
					<th style="width: 199px">Waktu Pinjam</th>
					<th style="width: 230px">Pilihan</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="col-md-3">
		<b><i><u>Group By Bagian (HH Belum Kembali)</u></i></b>
		<table id="tbl_sisa1"  class="table table-condensed" border="1">
			<thead>
				<tr id="kuning">
					<th>Bagian</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
		<?php
		$iniquery = mysqli_query($konek,"SELECT bagian, count(*) AS Jumlah from tbl_pinjam where JENIS='hh' group by bagian");
		while ($r=mysqli_fetch_array($iniquery))
		{
		echo "
				<tr>
					<td class='text-uppercase'>$r[bagian]</td>
					<td>$r[Jumlah]</td>
				";}?>
				</tr>
				<tr>
					<?php 
						$iniquery = mysqli_query($konek,"SELECT count(*) AS Total FROM tbl_pinjam WHERE jenis='hh'");
						while ($r=mysqli_fetch_array($iniquery))
					 {
					 echo "
					<td><b>Total</b></td>
					<td><b>$r[Total]</b></td>
					";}?>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-3">
		<b><i><u>Group By Bagian (HT Belum Kembali)</u></i></b>
		<table id="tbl_sisa2"  class="table table-condensed" border="1">
			<thead>
				<tr id="biru">
					<th>Bagian</th>
					<th>Total</th>	
				</tr>
			</thead>
			<tbody>
		<?php
		$iniquery = mysqli_query($konek,"SELECT bagian, count(*) AS Jumlah from tbl_pinjam WHERE jenis='ht' group by bagian");
		while ($r=mysqli_fetch_array($iniquery))
		{
		echo "
				<tr>
					<td class='text-uppercase'>$r[bagian]</td>
					<td>$r[Jumlah]</td>
				</tr>
				";}?>
				<tr>
					<?php 
						$iniquery = mysqli_query($konek,"SELECT count(*) AS Total FROM tbl_pinjam WHERE jenis='ht'");
						while ($r=mysqli_fetch_array($iniquery))
					 {
					 echo "
					<td><b>Total</b></td>
					<td><b>$r[Total]</b></td>
					";}?>
				</tr>
			</tbody>
		</table>
	</div>
</div>