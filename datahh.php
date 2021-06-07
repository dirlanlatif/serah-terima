<?php 
include 'config.php';
?>
<div class="container-fluid" style="padding-top:5px">
<h3 align="center" style="margin-top: 5px">Data Handheld</h3>
	<div align="center">
		<button type="button" id="add_buttonhhnew" data-toggle="modal" data-target="#datahhnew-Modal" class="btn btn-danger btn-xs" accesskey="t">TAMBAH DATA HH</button>
	</div>
<div id="tbldata_hh" style="display: " class="col-md-12">
	<table id="tbldatahh"  class="table table-bordered table-striped table-hover" style="width: 100%">
		<thead>
			<tr>
				<th><div class="truncate">No</div></th>
				<th><div class="truncate">Kode IP</div></th>
				<th><div class="truncate">Type</div></th>
				<th><div class="truncate">No Mesin</div></th>
				<th><div class="truncate">SN</div></th>
				<th><div class="truncate">Aktiva</div></th>
				<th><div class="truncate">Bagian</div></th>
				<th><div class="truncate">Keterangan</div></th>
				<th><div class="truncate">Pilihan</div></th>
			</tr>
		</thead>
	</table>
</div>
<div class="col-md-3">
		<b><i><u>Group By Bagian</u></i></b>
		<table id="tbl_sisa3"  class="table table-condensed" border="1">
			<thead>
				<tr style='font-size:13px; background:#3385ff; color:#000000'>
					<th>Bagian</th>
					<th>Total</th>	
				</tr>
			</thead>
			<tbody>
		<?php
		$iniquery = mysqli_query($konek,"SELECT bagian, count(*) AS Jumlah from v_hh_nonbap WHERE aktiva NOT REGEXP 'Mutasi'group by bagian order by Jumlah DESC");
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
						$iniquery = mysqli_query($konek,"SELECT count(*) AS Total FROM v_hh_nonbap WHERE aktiva NOT REGEXP 'Mutasi'");
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
		<b><i><u>Group By Keterangan</u></i></b>
		<table id="tbl_sisa4"  class="table table-condensed" border="1">
			<thead>
				<tr style='font-size:13px; background:#00b300; color:#000000'>
					<th>Keterangan</th>
					<th>Total</th>	
				</tr>
			</thead>
			<tbody>
		<?php
		$iniquery = mysqli_query($konek,"SELECT keterangan, count(*) AS Jumlah from v_hh_nonbap WHERE aktiva NOT REGEXP 'Mutasi' group by keterangan");
		while ($r=mysqli_fetch_array($iniquery))
		{
		echo "
				<tr>
					<td class='text-uppercase'>$r[keterangan]</td>
					<td>$r[Jumlah]</td>
				</tr>
				";}?>
				<tr>
					<?php 
						$iniquery = mysqli_query($konek,"SELECT count(*) AS Total FROM v_hh_nonbap WHERE aktiva NOT REGEXP 'Mutasi'");
						while ($r=mysqli_fetch_array($iniquery))
					 {
					 echo "
					<td><b>Total</b></td>
					<td><b>$r[Total]</b></td>
					";}?>
				</tr>
			</tbody>
		</table>
		<i>Note : Data BAP & Mutasi tidak termasuk</i>
	</div>
	<div class="col-md-3">
		<b><i><u>Group By Type Handheld</u></i></b>
		<table id="tbl_sisa4"  class="table table-condensed" border="1">
			<thead>
				<tr style='font-size:13px; background:#8600b3; color:#000000'>
					<th>Type</th>
					<th>Total</th>	
				</tr>
			</thead>
			<tbody>
		<?php
		$iniquery = mysqli_query($konek,"SELECT type, count(*) AS Jumlah from v_hh_nonbap WHERE aktiva NOT REGEXP 'Mutasi' group by type");
		while ($r=mysqli_fetch_array($iniquery))
		{
		echo "
				<tr>
					<td class='text-uppercase'>$r[type]</td>
					<td>$r[Jumlah]</td>
				</tr>
				";}?>
				<tr>
					<?php 
						$iniquery = mysqli_query($konek,"SELECT count(*) AS Total FROM v_hh_nonbap WHERE aktiva NOT REGEXP 'Mutasi'");
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