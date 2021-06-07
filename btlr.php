<?php 
include 'config.php';
 ?>
<div class="container box" style="padding-top: 1px; margin-top: 5px ">
	<div class="table-responsive">
	<h4 align="center" style="margin-top: 5px">Pengambilan BTLR</h4>
		<div align="center">
			<button type="button" id="add_buttonbtlr" data-toggle="modal" data-target="#btlr-Modal" class="btn btn-danger btn-xs" accesskey="b" tooltips="alt+shift">INPUT <u>B</u>TLR</button>
		</div>
		<table id="btlr_data" class="table datatable table-bordered table-hover table-condensed" style="width: 100%; text-transform:capitalize; background: #ccccff;">
			<thead style="text-transform: capitalize;">
				<tr>
					<th>No.</th>
					<th>Item</th>
					<th>Qty</th>
					<th>User</th>
					<th>Bagian</th>
					<th>Waktu Ambil</th>
					<!-- <th style="width: 230px">Pilihan</th> -->
				</tr>
			</thead>
		</table>
	</div>
	<!-- ========================================================================================= -->
	<div class="col-md-5">
		<b><i><u>Monitoring Stok</u></i></b>
		<table id="tbl_stok" class="table datatable table-condensed table-bordered table-hover" border="0">
			<thead>
				<tr id="hijau">
					<th>Item</th>
					<th>Sisa Stok</th>
					<th>Last Update Stock</th>
				</tr>
			</thead>
			<!-- <tbody>
		<?php
		$iniquery = mysqli_query($konek,"SELECT id, item, sisa, tgl_update from v_btlr_stok");
		while ($r=mysqli_fetch_array($iniquery))
		{
		echo "
				<tr>
					<td>$r[item]</td>
					<td>$r[sisa]</td>
					<td>
						$r[tgl_update]<button type='button' name='updatebtlr' id=$r[id] class='btn btn-info btn-xs updatebtlr'>Update Stok</button>	
					</td>
				";}?>
				</tr>
				
			</tbody> -->
		</table>
		Item Belum Ada? <button type='button' name='tambahbtlr' id='tambahbtlr' class='btn btn-primary btn-xs tambahbtlr'>Tambahkan di sini</button>
	</div>
	<!-- ========================================================================================= -->
	<div class="col-md-4">
		<b align="center"><i><u>Export Rekap Penggunaan BTLR</u></i></b>
		<form class="form-horizontal" enctype="form-data" method="POST" action="assets/export/exportbtlr1.php">
			<div class="row">
			  
				<!-- <h4 align=""><b>Export BTLR</b></h4> -->
				<div class="form-group form-group-sm has-error">
					<label class="col-sm-4 control-label" for="bulan">Bulan</label>
					<div class="col-sm-6">
						<select name="bulan" class="form-control input-sm" required>
						  <option value="">Select</option>
						  <option value="1">Januari</option>
						  <option value="2">Februari</option>
						  <option value="3">Maret</option>
						  <option value="4">April</option>
						  <option value="5">Mei</option>
						  <option value="6">Juni</option>
						  <option value="7">Juli</option>
						  <option value="8">Agustus</option>
						  <option value="9">September</option>
						  <option value="10">Oktober</option>
						  <option value="11">November</option>
						  <option value="12">Desember</option>
						</select>
					</div>
				</div>
				<div class="form-group form-group-sm has-error">
					<label class="col-sm-4 control-label" for="tahun">Tahun</label>
					<div class="col-sm-6">
						
						<select name="tahun" class="form-control input-sm" required>>
							<option selected="selected">Tahun</option>
							<?php
							for($i=date('Y'); $i>=date('Y')-4; $i-=1){
							echo"<option value='$i'> $i </option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group form-group-sm">
					<label class="col-sm-4 control-label" for=""></label>
					<div class="col-sm-6" align="right">
						<button type="submit" class="btn btn-success btn-sm" value="Upload">Export to Excel</button>
						<!-- <button type="reset" class="btn btn-danger btn-sm" value="batal"> Batal </button> -->
					</div>
				</div>
			  
			  <!-- <div class="col-md-4"></div>
			  <div class="col-md-4"></div> -->
			</div>
		</form>
	</div>
	<div class="col-md-3"></div>
</div>