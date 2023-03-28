<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include('config.php');
include('function.php');
session_start();
if(isset($_POST["operation"]) OR isset($_POST["operationsegel"]) OR isset($_POST["operationrestart"]))
{
	//--------------------------Pinjam Handheld------------------------------//
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_pinjam (kode_ip, nik, nama, bagian, pinjam, jenis) 
			VALUES (:kode_ip, :nik, :nama, :bagian, :now, :jenis) 
		");
		$result = $statement->execute(
			array(
				':kode_ip'	=>	$_POST["ip"],
				':nik'		=>	$_POST["nik"],
				':nama'		=>	$_POST["nama"],
				':bagian'	=>	$_POST["bagian"],
				':now'		=>	date('Y-m-d H:i:s'),
				':jenis'	=>	$_POST["jenis"]
			)
		);
		if(!empty($result))
		{
			echo 'Berhasil dipinjam oleh ',$_POST["nama"];
		}else{
		//----------------------------------------------------------------------//
		$statement = $connection->prepare(
			"UPDATE tbl_pinjam 
			SET nik= :nik, bagian = :bagian, pinjam = :now  , kode_ip=:ip
			WHERE kode_ip = :ip
		");
		$result = $statement->execute(
			array(
				':ip'		=>	$_POST["ip"],
				':nik'		=>	$_POST["nik"],
				':bagian'	=>	$_POST["bagian"],
				':id'		=>	$_POST["hh_id"],
				':now'		=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result))
		{
			echo 'Serah Terima Berhasil';
		}
			}
	}
	//---------------------------End of Pinjam handheld--------------------------------//
	//---------------------------Pinjam HandyTalky-------------------------------------//
	if($_POST["operation"] == "Addht")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_pinjam (kode_ip, nik, nama, bagian, pinjam, jenis) 
			VALUES (:kode_ip, :nik, :nama, :bagian, :now, :jenis)
		");
		$result1 = $statement->execute(
			array(
				':kode_ip'	=>	$_POST["ip"],
				':nik'		=>	$_POST["nik"],
				':nama'		=>	$_POST["namaht"],
				':bagian'	=>	$_POST["bagian"],
				':now'		=>	date('Y-m-d H:i:s'),
				':jenis'	=>	$_POST["jenis"]
			)
		);
		if(!empty($result1))
		{
			echo 'Berhasil Meminjam HT';
		}else{
		$statement = $connection->prepare(
			"UPDATE tbl_pinjam 
			SET nik= :nik, bagian = :bagian, pinjam = :now  , kode_ip=:ip
			WHERE kode_ip = :ip
		");
		$result = $statement->execute(
			array(
				':ip'		=>	$_POST["ip"],
				':nik'		=>	$_POST["nik"],
				':bagian'	=>	$_POST["bagian"],
				':id'		=>	$_POST["ht_id"],
				':now'		=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result))
		{
			echo 'Serah Terima HT Berhasil';
		}
			}
	}
	if($_POST["operation"] == "operationdatahtnew")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_pinjam (kode_ip, nik, nama, bagian, pinjam, jenis) 
			VALUES (:kode_ip, :nik, :nama, :bagian, :now, :jenis)
		");
		$result1 = $statement->execute(
			array(
				':kode_ip'	=>	$_POST["ip"],
				':nik'		=>	$_POST["nik"],
				':nama'		=>	$_POST["nama"],
				':bagian'	=>	$_POST["bagian"],
				':now'		=>	date('Y-m-d H:i:s'),
				':jenis'	=>	$_POST["jenis"]
			)
		);
		if(!empty($result1))
		{
			echo 'Berhasil Meminjam HT';
		}else{
		$statement = $connection->prepare(
			"UPDATE tbl_pinjam 
			SET nik= :nik, bagian = :bagian, pinjam = :now  , kode_ip=:ip
			WHERE kode_ip = :ip
		");
		$result = $statement->execute(
			array(
				':ip'		=>	$_POST["ip"],
				':nik'		=>	$_POST["nik"],
				':bagian'	=>	$_POST["bagian"],
				':id'		=>	$_POST["ht_id"],
				':now'		=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result))
		{
			echo 'Serah Terima HT Berhasil';
		}
			}
	}
	//---------------------------End of Pinjam Handytalky-----------------------------//
	//---------------------------Edit/Serah Terima Handheld/Handytalky----------------//
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_pinjam 
			SET nik= :nik, bagian = :bagian, pinjam = :now  , kode_ip=:ip
			WHERE id = :id
		");
		$result = $statement->execute(
			array(
				':ip'		=>	$_POST["hip"],
				':nik'		=>	$_POST["nik"],
				':bagian'	=>	$_POST["bagian"],
				':id'		=>	$_POST["hh_id"],
				':now'		=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result))
		{
			echo 'Serah Terima Berhasil';
		}
	}
	if($_POST["operation"] == "Editt")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_pinjam 
			SET nik= :nik, bagian = :bagian, pinjam = :now  , kode_ip=:ip
			WHERE id = :id
		");
		$result = $statement->execute(
			array(
				':ip'		=>	$_POST["hip"],
				':nik'		=>	$_POST["nik"],
				':bagian'	=>	$_POST["bagian"],
				':id'		=>	$_POST["ht_id"],
				':now'		=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result))
		{
			echo 'Serah Terima Berhasil';
		}
	}
	//----------------------End Of Edit/Serah Terima Handheld/Handytalky----------------//
	//----------------------Edit Data Handheld----------------//
	if($_POST["operation"] == "Editdatahh")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_hh 
			SET kode_ip= :kode_ip, type = :type, no_mesin = :no_mesin, sn_hardware=:sn_hardware, aktiva=:aktiva, bagian=:bagian, keterangan=:keterangan, tgl_update=:now
			WHERE id = :id
		");
		$result = $statement->execute(
			array(
				':id'				=>	$_POST["datahh_id"],
				':kode_ip'			=>	$_POST["kode_ip"],
				':type'				=>	$_POST["type"],
				':no_mesin'			=>	$_POST["no_mesin"],
				':sn_hardware'		=>	$_POST["sn_hardware"],
				':aktiva'			=>	$_POST["aktiva"],
				':bagian'			=>	$_POST["bagian2"],
				':keterangan'		=>	$_POST["keterangan"],
				':now'				=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result))
		{
			echo 'Berhasil Update data ', $_POST["kode_ip"];
		}
	}
	//----------------------Edit Data Handytalky----------------//
	if($_POST["operation"] == "Editdataht")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_ht 
			SET kode= :kode1, type = :type, sn=:sn, aktiva=:aktiva, bagian=:bagian, keterangan=:keterangan, tgl_input=:now
			WHERE id = :id
		");
		$result = $statement->execute(
			array(
				':id'			=>	$_POST["dataht_id"],
				':kode1'		=>	$_POST["kode1"],
				':type'			=>	$_POST["type1"],
				':sn'			=>	$_POST["sn1"],
				':aktiva'		=>	$_POST["aktiva1"],
				':bagian'		=>	$_POST["bagian1"],
				':keterangan'	=>	$_POST["keterangan1"],
				':now'			=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result))
		{
			echo 'Berhasil Update data ', $_POST["kode1"];
		}
	}
	/**
	 * Tambah data Handheld Baru
	 */
	if($_POST["operation"] == "isidata")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_hh (kode_ip, type, sn_hardware, aktiva, bagian, keterangan, tgl_update, penginput) 
			VALUES (:kode_ip, :type, :sn, :aktiva, :bagian, :ket, :now, :user)
		");
		$result1 = $statement->execute(
			array(
				':kode_ip'	=>	$_POST["kode5"],
				':type'		=>	$_POST["type5"],
				':sn'		=>	$_POST["sn5"],
				':aktiva'	=>	$_POST["aktiva5"],
				':bagian'	=>	$_POST["bagian5"],
				':ket'		=>	$_POST["keterangan5"],
				':now'		=>	date('Y-m-d H:i:s'),
				':user'		=>	$_SESSION["userweb"]
			)
		);
		if(!empty($result1))
		{
			echo 'Berhasil Tambah Data Handheld ', $_POST["kode5"];
		}else{
			/**
			 * IP Tidak boleh sama, tabel di db menggunakan indeks unik
			 */
			echo "IP Sudah Ada";
		}
	}
	/**
	 * Tambah data HT Baru
	 */
	if($_POST["operation"] == "isidataht")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_ht (kode, type, sn, aktiva, bagian, keterangan, tgl_input, input_by) 
			VALUES (:kode_ip, :type, :sn, :aktiva, :bagian, :ket, :now, :user)
		");
		$result1 = $statement->execute(
			array(
				':kode_ip'	=>	$_POST["kode6"],
				':type'		=>	$_POST["type6"],
				':sn'		=>	$_POST["sn6"],
				':aktiva'	=>	$_POST["aktiva6"],
				':bagian'	=>	$_POST["bagian6"],
				':ket'		=>	$_POST["keterangan6"],
				':now'		=>	date('Y-m-d H:i:s'),
				':user'		=>	$_SESSION["userweb"]
			)
		);
		if(!empty($result1))
		{
			echo 'Berhasil Tambah Data Handytalky ', $_POST["kode6"];
		}else{
			/**
			 * jika kode/sn/aktiva ada, gagal terinput, tabel di db menggunakan indeks unik
			 */
			echo "Kode/SN/Aktiva Sudah Ada", "\n" ,"Cek Data Anda";
		}
	}
	/**
	 * Regist Segel
	 */
	// if($_POST["operationsegel"] == "segel")
	if($_POST["operationsegel"] == "segel")
	
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_segel (kdtk, nosegel, tgl_input) 
			VALUES (:kdtk, :nosegel, :tgl_input)
		");
		$result2 = $statement->execute(
			array(
				':kdtk'		=>	$_POST["kdtk"],
				':nosegel'	=>	$_POST["nosegel"],
				':tgl_input'=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result2))
		{
			echo 'Berhasil ', $_POST["kdtk"], " Nomor: " , $_POST["nosegel"];
		}else{
			/**
			 * jika kode/sn/aktiva ada, gagal terinput, tabel di db menggunakan indeks unik
			 */
			echo "Cek Data inputan";
		}
	}
	/**
	 * Rekap Restart
	 */
	// if($_POST["operationsegel"] == "segel")
	if($_POST["operationrestart"] == "restart")
	
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_restart (zona, norestart, tgl_input) 
			VALUES (:zona, :norestart, :tgl_input)
		");
		$result2 = $statement->execute(
			array(
				':zona'			=>	$_POST["zona"],
				':norestart'	=>	$_POST["norestart"],
				':tgl_input'	=>	date('Y-m-d H:i:s')
			)
		);
		if(empty($result2))
		{
			echo "Cek Data inputan";
			//echo 'Berhasil ', $_POST["kdtk"], " Nomor: " , $_POST["nosegel"];
		} 	echo "OK";
	}
	/**
	 * Toko Baru
	 */
	if($_POST["operationsegel"] == "tobar")
	
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_toko (kdtk, nmtk) 
			SELECT * FROM (SELECT :kdtk, :nmtk) AS tmp
			WHERE NOT EXISTS (
				SELECT kdtk FROM tbl_toko WHERE kdtk = ':kdtk'
			) LIMIT 1;
		");
		$result2 = $statement->execute(
			array(
				':kdtk'		=>	strtoupper($_POST["kdtkbaru"]),
				':nmtk'		=>	strtoupper($_POST["nmtkbaru"])
			)
		);
		if(!empty($result2))
		{
			echo 'Berhasil ', $_POST["kdtkbaru"], " - " , $_POST["nmtkbaru"];
		}else{
			/**
			 * jika kode/sn/aktiva ada, gagal terinput, tabel di db menggunakan indeks unik
			 */
			echo "Cek Data inputan";
		}
	}
	/**
	 * Tambah data karyawan baru
	 */
	if($_POST["operation"] == "isidatakar")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_support (nik, nama_lengkap, username, password, no_hp, email, akses, digunakan) 
			VALUES (:nik, :nama, :username, :password, :hp, :email, :akses, :now)
		");
		$result1 = $statement->execute(
			array(
				':nik'      =>	$_POST["nik7"],
				':nama'     =>	$_POST["nama7"],
				':username' =>	$_POST["username7"],
				':password' =>	$_POST["password7"],
				':hp'       =>	$_POST["hp7"],
				':email'    =>	$_POST["email7"],
				':akses'    =>	$_POST["bagian7"],
				'now'		=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result1))
		{
			echo 'Berhasil Tambah Karyawan ', "\n" , $_POST["nama7"];
		}else{
			/**
			 * jika kode/sn/aktiva ada, gagal terinput, tabel di db menggunakan indeks unik
			 */
			echo "NIK Sudah ada", "\n" ,"Cek Data Anda";
		}
	}
	/**
	 * Edit data karyawan
	 * Administrator web tidak bisa di edit datanya
	 */
	if($_POST["operation"] == "Editdatakar")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_support 
			SET nama_lengkap = :nama, username = :username, password = :password, no_hp = :hp, email = :email, akses = :akses
			WHERE nik = :id AND akses != 'administrator web'
		");
		$result = $statement->execute(
			array(
				//':nik'      =>	$_POST["nik7"],
				':nama'     =>	$_POST["nama7"],
				':username' =>	$_POST["username7"],
				':password' =>	$_POST["password7"],
				':hp'       =>	$_POST["hp7"],
				':email'    =>	$_POST["email7"],
				':akses'    =>	$_POST["bagian7"],
				':id'       =>	$_POST["datakar_id"],
			)
		);
		if(!empty($result))
		{
			echo 'Data ', $_POST["nama7"] , "\n" ,'Berhasil di Update';
		}else{
			echo "Terdapat Kesalahan", "\n" , "Cek data anda";
		}
	}
	
	/**
	 * Tambah item
	 */
	if($_POST["operation"] == "isidatastok")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_stok (item, qty, tanggal, keterangan) 
			VALUES (:item, :qty, :tanggal, :keterangan)
		");
		$result1 = $statement->execute(
			array(
				':item'			=>	$_POST["item1"],
				':qty'			=>	0,
				':tanggal'		=>	date('Y-m-d H:i:s'),
				':keterangan'	=>	"Item Baru"
			)
		);
		if(!empty($result1))
		{
			echo 'Berhasil Tambah Data Item ', "\n" , $_POST["item1"];
		}else{
			/**
			 * jika kode/sn/aktiva ada, gagal terinput, tabel di db menggunakan indeks unik
			 */
			echo "Data Sudah Ada", "\n" ,"Cek Data Anda";
		}
	}
	/**
	 * Input data pemakaian
	 *
	 */
	if($_POST["operation"] == "Editdatastok")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_pakai_stok (item, qty, keterangan, pik, tanggal)
			VALUES (:item, :qty, :keterangan, :pik, :tanggal)
		");
		$result = $statement->execute(
			array(
				//':nik'      =>	$_POST["nik7"],
				':item'			=>	$_POST["item2"],
				':qty'			=>	$_POST["pakai"],
				':keterangan'	=>	$_POST["ketstok"],
				':pik'			=>	$_SESSION["userweb"],
				':tanggal'		=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result))
		{
			echo 'Data ', $_POST["item2"] , "\n" ,'terpakai sebanyak ', $_POST["pakai"];
		}else{
			echo "Terdapat Kesalahan", "\n" , "Cek data anda";
		}
	}
	/**
	 * Input data pemakaian
	 *
	 */
	if($_POST["operation"] == "updatestok")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_stok (item, qty, keterangan, pic, tanggal)
			VALUES (:item, :qty, :keterangan, :pik, :tanggal)
		");
		$result = $statement->execute(
			array(
				//':nik'      =>	$_POST["nik7"],
				':item'			=>	$_POST["item2"],
				':qty'			=>	$_POST["pakai"],
				':keterangan'	=>	$_POST["ketstok"],
				':pik'			=>	$_SESSION["userweb"],
				':tanggal'		=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result))
		{
			echo 'Data ', $_POST["item2"] , "\n" ,'terinput sebanyak ', $_POST["pakai"];
		}else{
			echo "Terdapat Kesalahan", "\n" , "Cek data anda";
		}
	}
	/**
	 * Input data pemakaian
	 *
	 */
	if($_POST["operation"] == "tambahmenu")
	{
		$lengkap = $_POST["domain"] ."/". $_POST["pathname"];
		$statement = $connection->prepare("
			INSERT INTO tbl_menu (domain, pathname, untukapa, lengkap)
			VALUES (:domain, :pathname, :untukapa, :lengkap)
		");
		$result = $statement->execute(
			array(
				//':nik'      =>	$_POST["nik7"],
				':domain'	=>	$_POST["domain"],
				':pathname'	=>	$_POST["pathname"],
				':untukapa'	=>	$_POST["untukapa"],
				':lengkap'	=>	$lengkap
			)
		);
		if(!empty($result))
		{
			echo 'Alamat ', $_POST["untukapa"] , "\n" ,'tersimpan';
		}else{
			echo "Terdapat Kesalahan", "\n" , "Cek data anda";
			// var_dump($lengkap);
		}
	}
	if($_POST["operation"] == "Editmenu")
	{
		$lengkap = $_POST["domain"] ."/". $_POST["pathname"];
		$statement = $connection->prepare("UPDATE tbl_menu 
			SET domain= :domain, pathname = :pathname, untukapa = :untukapa, lengkap = :lengkap
			WHERE id = :id
		");
		$result = $statement->execute(
			array(
				':id'		=>	$_POST["id_menu"],
				':domain'	=>	$_POST["domain"],
				':pathname'	=>	$_POST["pathname"],
				':untukapa'	=>	$_POST["untukapa"],
				':lengkap'	=>	$lengkap
			)
		);
		if(!empty($result))
		{
			echo 'Update Berhasil';
		}
	}
	
	/**
	 * Input data pemakaian BTLR
	 *
	 */
	if($_POST["operation"] == "btlr")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_btlr (item, qty, nik, nama, zona, waktu, keterangan)
			VALUES (:item, :qty, :nik, :nama, :zona, :waktu, :keterangan)
		");
		$result = $statement->execute(
			array(
				':item'	=>	$_POST["item9"],
				':qty'	=>	$_POST["qty9"],
				':nik'  =>	$_POST["nik"],
				':nama' =>	$_POST["nama"],
				':zona' =>	$_POST["zona"],				
				':waktu'=>	date('Y-m-d H:i:s'),
				':keterangan'=>	$_POST["keteranganbtlr"]
			)
		);
		if(!empty($result))
		{
			echo 'Data ', $_POST["item9"] , "\n" ,'terinput sebanyak ', $_POST["qty9"];
		}else{
			echo "Terdapat Kesalahan", "\n" , "Cek data anda";
		}
	}
	/**
	 * Update Stok BTLR
	 *
	 */
	if($_POST["operation"] == "Editbtlr")
	{
		$statement = $connection->prepare(
			"UPDATE tbl_btlr_stok 
			SET stok= :stok, tgl_update = :now
			WHERE id = :id
		");
		$result = $statement->execute(
			array(
				':id'		=>	$_POST["datastok_id"],
				':stok'		=>	$_POST["pakai"]+$_POST["item3"]-$_POST["item2"],
				':now'		=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result))
		{
			echo 'Update Berhasil';
		}
	}
	/**
	 * Tambah item BTLR
	 */
	if($_POST["operation"] == "itembtlr")
	{
		$statement = $connection->prepare("
			INSERT INTO tbl_btlr_stok (item, stok, tgl_update) 
			VALUES (:item, :qty, :tanggal)
		");
		$result1 = $statement->execute(
			array(
				':item'			=>	$_POST["item1"],
				':qty'			=>	0,
				':tanggal'		=>	date('Y-m-d H:i:s')
			)
		);
		if(!empty($result1))
		{
			echo 'Berhasil Tambah Data Item ', "\n" , $_POST["item1"];
		}else{
			/**
			 * jika kode/sn/aktiva ada, gagal terinput, tabel di db menggunakan indeks unik
			 */
			echo "Data Sudah Ada", "\n" ,"Cek Data Anda";
		}
	}
}
// var_dump($_POST["xaction"]);
?>