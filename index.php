<?php
function pola($end) {
$adr=$_SERVER['PHP_SELF'];
$alamat=explode("/",$adr);
$akhir=end($alamat);
$_RESULT=str_replace("$akhir","",$adr);
echo $_SERVER["HTTP_HOST"],$_RESULT,$end;
}
@ob_start();
if(!isset($_SESSION)) {
	session_start();
	}
$inactive = 1000;
if( !isset($_SESSION['timeout']) )
$_SESSION['timeout'] = time() + $inactive;
$session_life = time() - $_SESSION['timeout'];
if($session_life > $inactive)
{  session_destroy(); header("Location:index.php");     }
$_SESSION['timeout']=time();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<html>
	<head>

		<meta http-equiv="refresh" content="2500">
		<meta charset="UTF-8">
		<meta name="description" content="Serah Terima">
		<meta name="keywords" content="HTML,CSS,XML,JavaScript">
		<meta name="author" content="Dirlan">
		<meta name="viewport" content="width=device-width, initial-scale=0.8">
		<link rel="icon" href="assets/icon/1paper&pencil_48.png">
		<title>Serah Terima | Support Mks</title>
		<script src="assets/js/jquery-3.3.1.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/typeahead.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/custom.js"></script>
		<script src="assets/js/selectpicker.js"></script>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link href="assets/css/custom.css" rel="stylesheet">
		<link href="assets/css/selectpicker.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/bi/font/bootstrap-icons.css">
		<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css" />
		<link href="assets/datepicker-1.6.4/css/bootstrap-datepicker3.css" rel="stylesheet">
		<link href="assets/css/jquery-ui.min.css" rel="stylesheet">
	</head>

	<style type="text/css">
		body {
			/*background-color: black;*/
		}
		ul {
			/*background-color: black;*/
		}
		.nav-tabs > li.active > a {
			background-color: #000099;
			color: white;
			border: 2px solid red;
			border-radius: 8px;
		  	/*padding: 5px;*/

		}
		a {
			/*color: red;*/
		}
		#txt> {
			/*color: black;*/
		}
	</style>
	<body onload="startTime()">
		<div class="container-fluid">
			<?php date_default_timezone_set("Asia/Kuala_Lumpur");
			$harii = date("d"); //untuk tanggal rekap restart
			$bulann = date("F"); //untuk tanggal rekap restart
			$tahunn = date("Y"); //untuk tanggal rekap restart
			?>
			<!-- <div class="hidden-md">
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="container-fluid">
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-left">
								<li>
									<a>
										<i>
										<b style='color: rgb(51, 122, 183)'>
										<?php
										date_default_timezone_set("Asia/Makassar");
										$tanggal = mktime(date('m'), date("d"), date('Y'));
										
										//echo date("d-m-Y", $tanggal );
										$jam = date ("H:i");
										echo "<b id='txt'> </b>";
										$a = date ("H");
										if (($a>=4) && ($a<=11)) {
										echo ", Selamat Pagi ".$_SESSION['userweb'];
										}else if(($a>=12) && ($a<=15)){
										echo ", Selamat  Siang ".$_SESSION['userweb'];
										}else if(($a>=16) && ($a<=18)){
										echo ", Selamat Sore ".$_SESSION['userweb'];
										}else if(($a>=19) && ($a<24)){
										echo ", Selamat Malam ".$_SESSION['userweb'];
										}else{
										echo ", Dini Hari ".$_SESSION['userweb'];
										}?>
										</b>
										</i>
									</a>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<?php if($_SESSION['userakses']=="support" or $_SESSION['userakses']=="administrator web"): ?>
									<a href="logout.php">
										<button class="btn btn-xs btn-danger" accesskey="g">LO<u>G</u> OUT</button>
									</a>
									<?php else: ?>
									<a href="#" data-toggle="modal" data-target="#id001">
										<button class="btn btn-xs btn-primary" accesskey="l" data-toggle="tooltip" title="LOGIN">
										<i class="bi-lock"> </i><u>L</u>OGIN
										</button>
									</a>
									<?php endif; ?>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div> -->
			<!-- ===================================TAB MENU=================================== -->
			<header>
			<div class="navbar-inner">
	          <button type="button" class="navbar-toggle btn btn-xs btn-warning" data-toggle="collapse" data-target=".navbar-collapse" style="z-index: 9998; margin-top: 1px; color: #337ab7">Menu</button>
	        </div>
			<nav class="navbar navbar-default navbar-fixed-top navbar-collapse collapse" role="navigation">
			<!-- <nav class="navbar navbar-fixed-top"> -->
			
				<ul class="nav nav-tabs" role="tablist" id="myTab" style="padding-top: 0px;">
					<li class="active">
						<a href="#handheld" role="tab" data-toggle="tab" accesskey="1">HH</a>
					</li>
					<li>
						<a href="#handytalky" role="tab" data-toggle="tab" accesskey="2">HT</a>
					</li>
					<li>
						<a href="#rp" role="tab" data-toggle="tab" accesskey="0">BTLR</a>
					</li>
					<li>
						<a href="#historyhh" role="tab" data-toggle="tab" accesskey="3">Hist. Handheld</a>
					</li>
					<li>
						<a href="#historyht" role="tab" data-toggle="tab" accesskey="4">Hist. Handytalky</a>
					</li>
					
					<?php if($_SESSION['userakses']=="support" or $_SESSION['userakses']=="administrator web"): ?>
					<li>
						<a href="#datahh" role="tab" data-toggle="tab" accesskey="5">Data HH</a>
					</li>
					<li>
						<a href="#dataht" role="tab" data-toggle="tab" accesskey="6">Data HT</a>
					</li>
					<li>
						<a href="#dk" role="tab" data-toggle="tab" accesskey="7">Karyawan DC</a>
					</li>
					<!-- <li>
							<a href="#sc" role="tab" data-toggle="tab" accesskey="8">Stok Cadangan</a>
					</li> -->
					<?php else: ?>
					<li>
						<a href="#datahhn" role="tab" data-toggle="tab" accesskey="5">Data HH</a>
					</li>
					<?php endif; ?>
					<!-- <li>
							<a href="#hs" role="tab" data-toggle="tab" accesskey="9">History Stok</a>
					</li> -->
					
					<li>
						<a href="#segel" role="tab" data-toggle="tab" accesskey="s">SEGEL</a>
					</li>
					<li>
						<a href="#restart" role="tab" data-toggle="tab" accesskey="s">RESTART</a>
					</li>
					<li>
						<a href="#akses" role="tab" data-toggle="tab" accesskey="a">AKSES</a>
					</li>
					<li style="float: right;">
						<?php if($_SESSION['userakses']=="support" or $_SESSION['userakses']=="administrator web"): ?>
							<a href="logout.php">
								<button class="btn btn-xs btn-danger" accesskey="g">LO<u>G</u> OUT</button>
							</a>
						<?php else: ?>
							<a href="#" data-toggle="modal" data-target="#id001">
								<button class="btn btn-xs btn-primary" accesskey="l" data-toggle="tooltip" title="LOGIN">
									<i class="bi-lock"> </i><u>L</u>OGIN
								</button>
							</a>
						<?php endif; ?>
					</li>
					<li style="float: right;">
						<a>
							<i>
							<b style='color: rgb(51, 122, 183)'>
							<?php
							date_default_timezone_set("Asia/Makassar");
							$tanggal = mktime(date('m'), date("d"), date('Y'));
							//echo date("d-m-Y", $tanggal );
							$jam = date ("H:i");
							echo "<b id='txt'> </b>";
							$a = date ("H");
							if (($a>=4) && ($a<=11)) {
							echo ", Selamat Pagi ".$_SESSION['userweb'];
							}else if(($a>=12) && ($a<=15)){
							echo ", Selamat  Siang ".$_SESSION['userweb'];
							}else if(($a>=16) && ($a<=18)){
							echo ", Selamat Sore ".$_SESSION['userweb'];
							}else if(($a>=19) && ($a<24)){
							echo ", Selamat Malam ".$_SESSION['userweb'];
							}else{
							echo ", Dini Hari ".$_SESSION['userweb'];
							}?>
							</b>
							</i>
						</a>
					</li>
				</ul>
			</nav>
			</header>
			<!-- =================================ISI TAB MENU================================== -->
			<div>
			<div class="tab-content" style="margin-top:50px">
				
				<!-- =========================TAB MENU HANDHELD========================= -->
				<div class="tab-pane active" id="handheld">
					<?php include 'handheld.php'; ?>
				</div>
				<!-- ========================TAB MENU HANDYTALKY======================== -->
				<div class="tab-pane" id="handytalky">
					<?php include 'handytalky.php'; ?>
				</div>
				<!-- =====================TAB MENU HISTORY HANDHELD===================== -->
				<div class="tab-pane" id="historyhh">
					<?php include 'histhandheld.php'; ?>
				</div>
				<!-- ====================TAB MENU HISTORY HANDYTALKY==================== -->
				<div class="tab-pane" id="historyht">
					<?php include 'histhandy.php'; ?>
				</div>
				<!-- =========================TAB MENU DATA HANDHELD========================= -->
				<div class="tab-pane" id="datahh">
					<?php include 'datahh.php'; ?>
				</div>
				<div class="tab-pane" id="datahhn">
					<?php include 'datahhn.php'; ?>
				</div>
				<!-- =========================TAB MENU DATA HANDY TALKY========================= -->
				<div class="tab-pane" id="dataht">
					<?php include 'dataht.php'; ?>
				</div>
				<!-- =========================TAB MENU DATA KARYAWAN========================= -->
				<div class="tab-pane" id="dk">
					<?php include 'datakar.php'; ?>
				</div>
				<!-- =========================TAB MENU STOK CADANGAN========================= -->
				<div class="tab-pane" id="sc">
					<?php include 'datacad.php'; ?>
				</div>
				<!-- =========================TAB MENU HISTORY STOK========================= -->
				<div class="tab-pane" id="hs">
					<?php include 'datahis.php'; ?>
				</div>
				<!-- =========================TAB MENU BTLR========================= -->
				<div class="tab-pane" id="rp">
					<?php include 'btlr.php'; ?>
				</div>
				<!-- =========================TAB MENU SEGEL========================= -->
				<div class="tab-pane" id="segel">
					<?php include 'segel.php'; ?>
				</div>
				<!-- =========================TAB MENU RESTART========================= -->
				<div class="tab-pane" id="restart">
					<?php include 'restart.php'; ?>
				</div>
				<!-- =========================TAB MENU AKSES========================= -->
				<div class="tab-pane" id="akses">
					<?php include 'akses.php'; ?>
				</div>
			</div>
			</div>
		</div>
		<!-- =================================MODAL PINJAM HANDHELD================================== -->
		<div id="hh-Modal" class="modal fade bs-example-modal-sm">
			<div class="modal-dialog modal-dialog modal-sm">
				<form method="post" id="hh_form" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" style="text-align: center;"></h4>
						</div>
						<div class="modal-body">

							<img src="" width="250" height="auto" id="gambar" style="display: block;margin-left: auto;margin-right: auto; border: 2px solid black">
							
							<label class="ket">NIK</label>
							<input type="text" name="nik" id="nik" class="typeahead form-control" required maxlength="10" autosave="off"  onkeypress="return angka(event)"/>
							<label class="ket">Nama</label>
							<input type="text" name="hnama" id="hnama" class="nama form-control" style="text-transform:uppercase;" disabled required/>
							<input type="hidden" name="nama" id="nama" class="form-control" style="text-transform:uppercase;" required />
							<label class="ket">IP Device</label>
							<input type="text" name="ip" id="ip" class="typeahead form-control" autocomplete="off" required />
							<input type="hidden" name="hip" id="hip" class="form-control" />
							<label class="ket">Bagian</label>
							<select name="bagian" id="bagian" class="form-control" required>
								<option value="">--Select--</option>
								<option value="receiving">Receiving</option>
								<option value="retur">Retur</option>
								<option value="whs-random">Whs-Random</option>
								<option value="whs-kl">Whs-KL</option>
								<option value="warehouse">Warehouse</option>
								<option value="whs-bulky">Whs-Bulky</option>
								<option value="issuing">Issuing</option>
							</select>
						</div>
						<div class="modal-footer">
							<div class="col-xs-12">
								<br>
								<button type="submit" name="action" id="action" class="btn btn-success" value="Add"/>
								Pinjam
								</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="hidden" name="jenis" id="jenis" />
								<input type="hidden" name="hh_id" id="hh_id" />
								<input type="hidden" name="operation" id="operation" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ===============================MODAL PINJAM HANDYTALKY================================== -->
		<div id="ht-Modal" class="modal fade bs-example-modal-sm">
			<div class="modal-dialog modal-dialog modal-sm">
				<form method="post" id="ht_form" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							
							<label>NIK</label>
							<input type="text" name="nik" id="nikht" class="typeahead form-control" required maxlength="10" autocomplete="off"  onkeypress="return angka(event)"/>
							<label>Nama</label>
							<input type="text" name="hnamaht" id="hnamaht" class="nama form-control" style="text-transform:uppercase;" disabled />
							<input type="hidden" name="namaht" id="namaht" class="form-control" style="text-transform:uppercase;" required />
							<label>IP Device</label>
							<input type="text" name="ip" id="ipht" class="typeahead form-control" autocomplete="off" required />
							<input type="hidden" name="hip" id="hipht" class="form-control" />
							<label>Bagian</label>
							<select name="bagian" id="bagianht" class="form-control" required>
								<option value="">--Select--</option>
								<option value="Zona 01">01</option>
								<option value="Zona 02">02</option>
								<option value="Zona 03">03</option>
								<option value="Zona 04">04</option>
								<option value="Zona 05">05</option>
								<option value="Zona 06">06</option>
								<option value="Zona 07">07</option>
								<option value="Zona 08">08</option>
								<option value="Zona 09">09</option>
								<option value="Zona 10">10</option>
								<option value="Zona 11">11</option>
								<option value="Zona 12">12</option>
								<option value="Zona 13">13</option>
								<option value="Zona 14">14</option>
								<option value="Zona 15">15</option>
								<option value="Zona 16">16</option>
								<option value="receiving">Receiving</option>
								<option value="retur">Retur</option>
								<option value="whs-random">Whs-Random</option>
								<option value="whs-kl">Whs-KL</option>
								<option value="warehouse">Warehouse</option>
								<option value="whs-bulky">Whs-Bulky</option>
								<option value="issuing">Issuing</option>
							</select>
						</div>
						<div class="modal-footer">
							<div class="col-xs-12">
								<br>
								<input type="submit" name="action" id="actionht" class="btn btn-info" value="Add" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="hidden" name="ht_id" id="ht_id" />
								<input type="hidden" name="jenis" id="jenisht" />
								<input type="hidden" name="operation" id="operationht" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ==============================MODAL EDIT DATA HANDHELD================================== -->
		<div id="datahh-Modal" class="modal fade bs-example-modal-sm">
			<div class="modal-dialog modal-dialog modal-sm">
				<form method="post" id="datahh_form" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							
							<label>Kode IP*</label>
							<input type="text" name="kode_ip" id="kode_ip" class="typeahead form-control" required maxlength="50" autosave="off" />
							<label>Type*</label>
							<select name="type" id="type" class="form-control type" required>
								<option value="">--Select--</option>
								<?php 
												$query=mysqli_query($konek,"SELECT * FROM tbl_type WHERE untuk2 = 'Handheld' ORDER BY type1 ASC");
													while($dirlan=mysqli_fetch_array($query))
														{;?>
													<?php
														echo "<option value='$dirlan[type1]'>$dirlan[type1]</option>";
													}?>
							</select>
							<label id="lmesin">No Mesin</label>
							<input type="text" name="no_mesin" id="no_mesin" class="typeahead form-control" autocomplete="off"  />
							<label>SN*</label>
							<input type="text" name="sn_hardware" id="sn_hardware" class="nama form-control" style="text-transform:uppercase;" required/>
							<label>Aktiva*</label>
							<input type="text" name="aktiva" id="aktiva" class="nama form-control" style="text-transform:uppercase;" required/>
							<label>Keterangan</label>
							<select name="keterangan" id="keterangan" class="form-control keterangan" required>
								<option value="">-Select-</option>
								<?php 
												$query=mysqli_query($konek,"SELECT * FROM tbl_type WHERE untuk2 = 'keterangan' ORDER BY type1 ASC");
													while($dirlan=mysqli_fetch_array($query))
														{;?>
													<?php
														echo "<option value='$dirlan[type1]'>$dirlan[type1]</option>";
													}?>
							</select>
							<label>Bagian</label>
							<select name="bagian2" id="bagian2" class="form-control bagian2" required>
								<option value="">--Select--</option>
								<option value="-">-</option>
								<option value="Receiving">Receiving</option>
								<option value="Retur">Retur</option>
								<option value="Whs-Random">Whs-Random</option>
								<option value="Whs-Kanvas">Whs-Kanvas</option>
								<option value="Whs-Overstock">Whs-Overstock</option>
								<option value="Whs-KL">Whs-KL</option>
								<option value="Warehouse">Warehouse</option>
								<option value="Whs-Bulky">Whs-Bulky</option>
								<option value="Issuing">Issuing</option>
							</select>
						</div>
						<div class="modal-footer">
							<div class="col-xs-12">
								<br>
								<input type="submit" name="action" id="actiondatahh" class="btn btn-success" value="Edit" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="hidden" name="datahh_id" id="datahh_id" />
								<input type="hidden" name="operation" id="operationdatahh" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- =================================MODAL EDIT DATA HANDY================================== -->
		<div id="dataht-Modal" class="modal fade bs-example-modal-sm">
			<div class="modal-dialog modal-dialog modal-sm">
				<form method="post" id="dataht_form" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							
							<label>Kode*</label>
							<input type="text" name="kode1" id="kode1" class="typeahead form-control" required maxlength="50" autosave="off" />
							<label>Type*</label>
							<select name="type1" id="type1" class="form-control type1" required>
								<option value="">--Select--</option>
								<?php 
												$query=mysqli_query($konek,"SELECT * FROM tbl_type WHERE untuk2 = 'Handytalky' ORDER BY type1 ASC");
													while($dirlan=mysqli_fetch_array($query))
														{;?>
													<?php
														echo "<option value='$dirlan[type1]'>$dirlan[type1]</option>";
													}?>
							</select>
							<label>SN*</label>
							<input type="text" name="sn1" id="sn1" class="form-control" style="text-transform:uppercase;" required/>
							<label>Aktiva*</label>
							<input type="text" name="aktiva1" id="aktiva1" class="aktiva1 form-control" required/>
							<label>Keterangan</label>
							<select name="keterangan1" id="keterangan1" class="form-control keterangan1" required>
								<option value="">-Select-</option>
								<?php 
												$query=mysqli_query($konek,"SELECT * FROM tbl_type WHERE untuk2 = 'keterangan' ORDER BY type1 ASC");
													while($dirlan=mysqli_fetch_array($query))
														{;?>
													<?php
														echo "<option value='$dirlan[type1]'>$dirlan[type1]</option>";
													}?>
							</select>
							<label>Bagian</label>
							<select name="bagian1" id="bagian1" class="form-control bagian1" required>
								<option value="">--Select--</option>
								<option value="-">-</option>
								<option value="DCM">DCM</option>
								<option value="DDCM">DDCM</option>
								<option value="Receiving">Receiving</option>
								<option value="Retur">Retur</option>
								<option value="Warehouse">Warehouse</option>
								<option value="Whs-Bulky">Whs-Bulky</option>
								<option value="Issuing">Issuing</option>
								<option value="Zona 01">Zona 01</option>
								<option value="Zona 02">Zona 02</option>
								<option value="Zona 03">Zona 03</option>
								<option value="Zona 04">Zona 04</option>
								<option value="Zona 05">Zona 05</option>
								<option value="Zona 06">Zona 06</option>
								<option value="Zona 07">Zona 07</option>
								<option value="Zona 08">Zona 08</option>
								<option value="Zona 09">Zona 09</option>
								<option value="Zona 10">Zona 10</option>
								<option value="Zona 11">Zona 11</option>
								<option value="Zona 12">Zona 12</option>
								<option value="Zona 13">Zona 13</option>
								<option value="Zona 14">Zona 14</option>
								<option value="Zona 15">Zona 15</option>
								<option value="Zona 16">Zona 16</option>
							</select>
						</div>
						<div class="modal-footer">
							<div class="col-xs-12">
								<br>
								<input type="hidden" name="dataht_id" id="dataht_id" />
								<input type="hidden" name="operation" id="operationdataht" />
								<input type="submit" name="action" id="actiondataht" class="btn btn-success" value="Edit" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ===============================MODAL TAMBAH DATA HANDHELD=============================== -->
		<div id="datahhnew-Modal" class="modal fade bs-example-modal-sm">
			<div class="modal-dialog modal-dialog modal-sm">
				<form method="post" id="datahhnew_form" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							
							<table>
								<tr>
									<td>
										<label>Kode/IP*</label>
										<input type="text" name="kode5" id="kode5" class="typeahead form-control" required maxlength="50" autosave="off" />
										<input type="hidden" name="hkode5" id="hkode5" />
									</td>
									<td>
										<label>Type*</label>
										<select name="type5" id="type5" class="form-control type5" required>
											<option value="">--Select--</option>
											<?php 
												$query=mysqli_query($konek,"SELECT * FROM tbl_type WHERE untuk2 = 'Handheld' ORDER BY type1 ASC");
													while($dirlan=mysqli_fetch_array($query))
														{;?>
													<?php
														echo "<option value='$dirlan[type1]'>$dirlan[type1]</option>";
													}?>
																 ?>
											<!-- <option value="MC3090 SERIES">MC3090 SERIES</option>
											<option value="MC3190 SERIES">MC3190 SERIES</option>
											<option value="MC32N0 SERIES">MC32N0 SERIES</option>
											<option value="MC3090 GUN">MC3090 GUN</option>
											<option value="MC3190 GUN">MC3190 GUN</option>
											<option value="MC32N0 GUN">MC32N0 GUN</option>
											<option value="MC330">MC330</option> -->
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<label>SN*</label>
										<input type="text" name="sn5" id="sn5" class="typeahead form-control" required maxlength="50" autosave="off" />
									</td>
								</tr>
								<tr>
									<td>
										<label>Aktiva*</label>
										<input type="text" name="aktiva5" id="aktiva5" class="form-control" style="text-transform:uppercase;" required/>
									</td>
									<td>
										<label>Bagian</label>
										<select name="bagian5" id="bagian5" class="form-control bagian5" required>
											<option value="">--Select--</option>
											<option value="-">-</option>
											<option value="Receiving">Receiving</option>
											<option value="Retur">Retur</option>
											<option value="Whs-Random">Whs-Random</option>
											<option value="Whs-Kanvas">Whs-Kanvas</option>
											<option value="Whs-Overstock">Whs-Overstock</option>
											<option value="Whs-KL">Whs-KL</option>
											<option value="Warehouse">Warehouse</option>
											<option value="Whs-Bulky">Whs-Bulky</option>
											<option value="Issuing">Issuing</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<label>Keterangan</label>
										<select name="keterangan5" id="keterangan5" class="form-control keterangan5" required>
											<option value="">-Select-</option>
											<?php 
												$query=mysqli_query($konek,"SELECT * FROM tbl_type WHERE untuk2 = 'keterangan' ORDER BY type1 ASC");
													while($dirlan=mysqli_fetch_array($query))
														{;?>
													<?php
														echo "<option value='$dirlan[type1]'>$dirlan[type1]</option>";
													}?>
										</select>
									</td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<div class="col-xs-12">
								<br>
								<input type="submit" name="action" id="actiondatahhnew" class="btn btn-success" value="Simpan" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="hidden" name="datahhnew_id" id="datahhnew_id" />
								<input type="hidden" name="jenis" id="jenis5" />
								<input type="hidden" name="operation" id="operation5" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ===============================MODAL TAMBAH DATA HANDY=============================== -->
		<div id="datahtnew-Modal" class="modal fade bs-example-modal-sm">
			<div class="modal-dialog modal-dialog modal-sm">
				<form method="post" id="datahtnew_form" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							
							<table>
								<tr>
									<td>
										<label>Kode</label>
										<input type="text" name="kode6" id="kode6" class="typeahead form-control" required maxlength="50" autosave="off" />
										<input type="hidden" name="hkode6" id="hkode6" />
									</td>
									<td>
										<label>Type*</label>
										<select name="type6" id="type6" class="form-control type6" required>
											<option value="">--Select--</option>
											<?php 
												$query=mysqli_query($konek,"SELECT * FROM tbl_type WHERE untuk2 = 'Handytalky' ORDER BY type1 ASC");
													while($dirlan=mysqli_fetch_array($query))
														{;?>
													<?php
														echo "<option value='$dirlan[type1]'>$dirlan[type1]</option>";
													}?>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<label>SN*</label>
										<input type="text" name="sn6" id="sn6" class="typeahead form-control" required maxlength="50" autosave="off" />
									</td>
								</tr>
								<tr>
									<td>
										<label>Aktiva*</label>
										<input type="text" name="aktiva6" id="aktiva6" class="form-control" style="text-transform:uppercase;" required/>
									</td>
									<td>
										<label>Bagian</label>
										<select name="bagian6" id="bagian6" class="form-control bagian6" required>
											<option value="">--Select--</option>
											<option value="-">-</option>
											<option value="DCM">DCM</option>
											<option value="DDCM">DDCM</option>
											<option value="Receiving">Receiving</option>
											<option value="Retur">Retur</option>
											<option value="Warehouse">Warehouse</option>
											<option value="Whs-Bulky">Whs-Bulky</option>
											<option value="Issuing">Issuing</option>
											<option value="Zona 01">Zona 01</option>
											<option value="Zona 02">Zona 02</option>
											<option value="Zona 03">Zona 03</option>
											<option value="Zona 04">Zona 04</option>
											<option value="Zona 05">Zona 05</option>
											<option value="Zona 06">Zona 06</option>
											<option value="Zona 07">Zona 07</option>
											<option value="Zona 08">Zona 08</option>
											<option value="Zona 09">Zona 09</option>
											<option value="Zona 10">Zona 10</option>
											<option value="Zona 11">Zona 11</option>
											<option value="Zona 12">Zona 12</option>
											<option value="Zona 13">Zona 13</option>
											<option value="Zona 14">Zona 14</option>
											<option value="Zona 15">Zona 15</option>
											<option value="Zona 16">Zona 16</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<label>Keterangan</label>
										<select name="keterangan6" id="keterangan6" class="form-control keterangan6" required>
											<option value="">-Select-</option>
											<?php 
												$query=mysqli_query($konek,"SELECT * FROM tbl_type WHERE untuk2 = 'keterangan' ORDER BY type1 ASC");
													while($dirlan=mysqli_fetch_array($query))
														{;?>
													<?php
														echo "<option value='$dirlan[type1]'>$dirlan[type1]</option>";
													}?>
										</select>
									</td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<div class="col-xs-12">
								<br>
								<input type="submit" name="action" id="actiondatahtnew" class="btn btn-success" value="Simpan" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="hidden" name="datahtnew_id" id="datahtnew_id" />
								<input type="hidden" name="jenis" id="jenis6" />
								<input type="hidden" name="operation" id="operation6" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- =================================MODAL LOGIN================================== -->
		<div id="id001" class="modal" tabindex="" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
			<div class="modal-dialog" align="center">
				<form class="modal-content animate modal-sm" method="POST" action="login.php" role="form">
					<div class='modal-header'>
						<h4 class="modal-title">
						<img src="assets/icon/paper&pencil_48.ico" alt="Avatar" class="avatar">LOGIN
						<img src="assets/icon/paper&pencil_48.ico" alt="Avatar" class="avatar">
						</h4>
					</div>
					<div class="imgcontainer"></div>
					<div class="container-fluid">
						<div class='form-group'>
							<input type="text" placeholder="Enter Username" name="username" id="username" class="form-control" autofocus required>
						</div>
						<div class='form-group'>
							<input type="password" placeholder="Enter Password" name="password" id="password" class="form-control" required>
						</div>
						<input type="submit" name="login" value="Login" class="btn btn-sm btn-warning">
						<hr>
					</div>
				</form>
			</div>
		</div>
		<!-- ============================MODAL TAMBAH KARYAWAN============================ -->
		<div id="kar-Modal" class="modal fade bs-example-modal-sm">
			<div class="modal-dialog modal-dialog modal-lg">
				<form method="post" id="kar_form" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" align="center"></h4>
						</div>
						<div class="modal-body">
							
							<table style="width: 75%;"align="center">
								<tr>
									<td>
										<label>NIK</label>
										<input type="text" name="nik7" id="nik7" class="form-control" required maxlength="10" autosave="off" onkeypress="return angka(event)" />
									</td>
									<td>&nbsp</td>
									<td>
										<label>Nama</label>
										<input type="text" name="nama7" id="nama7" class="nama7 form-control" required maxlength="50" autosave="off" style="text-transform:uppercase;" />
									</td>
								</tr>
								<tr>
									<td colspan="">
										<label>Username</label>
										<input type="text" name="username7" id="username7" class="form-control" maxlength="50" autosave="off" placeholder="Optional" />
									</td>
									<td>&nbsp</td>
									<td>
										<label>Password</label>
										<input type="text" name="password7" id="password7" class="form-control" placeholder="Optional" />
									</td>
								</tr>
								<tr>
									<td>
										<label>No HP</label>
										<input type="text" name="hp7" id="hp7" class="form-control" placeholder="Optional" />
									</td>
									<td>&nbsp</td>
									<td>
										<label>Email</label>
										<input type="email" name="email7" id="email7" class="form-control" placeholder="Optional" />
									</td>
								</tr>
								<tr>
									<td>
										<label>Bagian</label>
										<select name="bagian7" id="bagian7" class="form-control bagian7" required>
											<option value="">--Select--</option>
											<option value="support">Support</option>
											<option value="adm">Adm</option>
											<option value="whs">Warehouse</option>
											<option value="iss">Issuing</option>
											<option value="rcv">Receiving</option>
											<option value="retur">Retur</option>
											<option value="perish">Perishable</option>
										</select>
									</td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<div class="col-sm-11" style="padding-right: 40px">
								<br>
								<input type="submit" name="action" id="actionkar" class="btn btn-success" value="Simpan" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="hidden" name="datakar_id" id="datakar_id" />
								<input type="hidden" name="jenis" id="jenis7" />
								<input type="hidden" name="operation" id="operation7" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ============================MODAL DATA STOK============================ -->
		<div id="stok-Modal" class="modal fade bs-example-modal-sm">
			<div class="modal-dialog modal-dialog modal-sm">
				<form method="post" id="stok_form" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" align="center" style="font-weight: bold;"></h4>
						</div>
						<div class="modal-body">
							<table style="width: ;"align="center">
								<tr>
									<td>
										<label>Item</label>
										<input type="text" name="item1" id="item1" class="form-control" autosave="off" disabled />
									</td>
								</tr>
								<tr>
									<td>
										<label id="qtylabel">Qty Stok</label>
										<input type="text" name="qty" id="qty" class="form-control" maxlength="8" autosave="off" onkeypress="return angka(event)" disabled />
									</td>
								</tr>
								<tr>
									<td>
										<label id="pakailabel">Pemakaian</label>
										<input type="text" name="pakai" id="pakai" class="form-control" maxlength="8" autosave="off" onkeypress="return angka(event)" />
									</td>
								</tr>
								<tr>
									<td>
										<label id="keteranganlabel">Keterangan</label>
										<textarea name="ketstok" id="ketstok" class="form-control" rows="2" placeholder="Singkat Padat dan Jelas"></textarea>
									</td>
									<td>&nbsp</td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<div class="col-sm-11" style="padding-right: 40px">
								<br>
								<input type="submit" name="action" id="actionstok" class="btn btn-success" value="Simpan" onclick="return confirm('Data inputan sudah benar?');" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="hidden" name="datastok_id" id="datastok_id" />
								<input type="hidden" name="item2" id="item2" />
								<input type="hidden" name="item3" id="item3" />
								<input type="hidden" name="operation" id="operation8" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ============================MODAL MENU AKSES============================ -->
		<div id="menu-Modal" class="modal fade bs-example-modal-sm">
			<div class="modal-dialog modal-dialog modal-sm">
				<form method="post" id="menu_form" enctype="multipart/form-data" autocomplete="off">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" align="center" style="font-weight: bold;"></h4>
						</div>
						<div class="modal-body">
							<table style="width: ;"align="center">
								<tr>
									<td>
										<label id="qtylabel">Peruntukan</label>
										<input type="text" name="untukapa" id="untukapa" class="form-control"/>
									</td>
								</tr>
								<tr>
									<td>
										<label>IP Domain/Alamat Domain</label>
										<input type="text" name="domain" id="domain" class="form-control" autosave="off" autofocus/>
									</td>
								</tr>
								<tr>
									<td>
										<label id="qtylabel">Path Halaman</label>
										<input type="text" name="pathname" id="pathname" class="form-control"/>
									</td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<div class="col-sm-11" style="padding-right: 40px">
								<br>
								<input type="submit" name="action" id="actionmenu" class="btn btn-success" value="Simpan" onclick="return confirm('Data inputan sudah benar?');" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="text" name="operation" id="operationmenu" 
								/>
								<input type="text" name="id_menu" id="id_menu" 
								/>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ============================MODAL BTLR============================ -->
		<div id="btlr-Modal" class="modal fade bs-example-modal-sm">
			<div class="modal-dialog modal-dialog modal-xs">
				<form method="post" id="btlr_form" enctype="multipart/form-data" autocomplete="off" class="c-btlr">
					<div class="modal-content" style="position: absolute;right: 114px;left: 114px">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							<table style="">
								<tr>
									<td colspan="3">
							<label>Item</label>
							<select name="item9" id="item9" class="form-control selectpicker" data-live-search="true" data-size="5" required onclick="inputqty()">
								<option data-tokens="" value="">--Select--</option>
								<?php
								$query=mysqli_query($konek,"SELECT * FROM v_btlr_stok ORDER BY item ASC");
									while($dirlan=mysqli_fetch_array($query))
									{
								;?>
								<?php
									echo "<option data-tokens='$dirlan[item]' value='$dirlan[item]' data-subtext='$dirlan[sisa]'>$dirlan[item]</option>";
								}?>
							</select>
									</td>
								</tr>
								<tr>
									<td colspan="3">	
							<label>Qty</label>
							<input type="text" name="qty9" id="qty9" class="typeahead form-control" required maxlength="3" autosave="off"  onkeypress="return angka(event)" value="1" />
									</td>
								</tr>
								<tr>
									<td>
							<label>NIK</label>
							<input type="text" name="nik" id="nik" class="typeahead form-control" required maxlength="10" autosave="off"  onkeypress="return angka(event)"/>	
									</td>
									<td colspan="2">
										
							<label>Nama</label>
							<input type="text" name="hnama" id="hnama" class="nama form-control" style="text-transform:uppercase;" disabled required/>
							<input type="hidden" name="nama" id="nama" class="form-control" style="text-transform:uppercase;" required />
									</td>
								</tr>
								<tr>
									<td colspan="3">
										
							<label>Zona</label>
							<select name="zona" id="zona" class="form-control" required>
								<option value="">--Select--</option>
								<option value="Zona 01">01</option>
								<option value="Zona 02">02</option>
								<option value="Zona 03">03</option>
								<option value="Zona 04">04</option>
								<option value="Zona 05">05</option>
								<option value="Zona 06">06</option>
								<option value="Zona 07">07</option>
								<option value="Zona 08">08</option>
								<option value="Zona 09">09</option>
								<option value="Zona 10">10</option>
								<option value="Zona 11">11</option>
								<option value="Zona 12">12</option>
								<option value="Zona 13">13</option>
								<option value="Zona 14">14</option>
								<option value="Zona 15">15</option>
								<option value="Zona 16">16</option>
								<option value="receiving">Receiving</option>
								<option value="retur">Retur</option>
								<option value="Perishable">Perishable</option>
								<option value="Adm">Adm</option>
								<option value="Warehouse">Warehouse</option>
								<option value="Chift">Chiftdel</option>
							</select>
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<label>Keterangan</label><br>
										<textarea name="keteranganbtlr" id="keteranganbtlr" style="width: 340px; height: 50px"></textarea>
									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td><br></td>
									<td style="text-align: right;">
										<button type="submit" name="action" id="actionbtlr" class="btn btn-success treload" value="btlr"/>
								Simpan
								</button>
									</td>
								</tr>
							</table>
						</div>
						<!-- <div class="modal-footer"> -->
							<!-- <div class="col-xs-8"> -->
								<br>
								<!-- <button type="submit" name="action" id="actionbtlr" class="btn btn-success treload" value="btlr"/>
								Simpan
								</button> -->
								<input type="hidden" name="jenis" id="jenis" />
								<input type="hidden" name="operation" id="operation9" />
							<!-- </div> -->
						<!-- </div> -->
					</div>
				</form>
			</div>
		</div>
		<!-- <p class="text-muted" align="right" style="margin-right: 20px">
				<i>dirlan Copyright © 2018 </i>
			<?php $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				echo " $hostname ";
				echo(" | ");
				echo $_SERVER['REMOTE_ADDR'];
			?>
		</p> -->
		<!-- =========================JAVASCRIPT========================= -->
		<script type="text/javascript" language="javascript" >
		
		</script>
	</body>
</html>
<?php include('assets/bi/font/fonts/bootstraps.php'); ?>