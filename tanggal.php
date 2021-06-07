<?php
// FUNGSI
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Snn',
				'Sls',
				'Rbu',
				'Kms',
				'Jmt',
				'Sbt',
				'Mgg'
			);
			
	$bulan = array (01 =>   'Jan',
				'Feb',
				'Mar',
				'Apr',
				'May',
				'Jun',
				'Jul',
				'Aug',
				'Sep',
				'Oct',
				'Nov',
				'Dec'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}