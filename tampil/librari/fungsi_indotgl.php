<?php
	function tgl_indo1($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.'-'.$bulan.'-'.$tahun;		 
	}	

	function getBulan($bln){
		switch ($bln){
			case 1: 
				return "1";
				break;
			case 2:
				return "2";
				break;
			case 3:
				return "3";
				break;
			case 4:
				return "4";
				break;
			case 5:
				return "5";
				break;
			case 6:
				return "6";
				break;
			case 7:
				return "7";
				break;
			case 8:
				return "8";
				break;
			case 9:
				return "9";
				break;
			case 10:
				return "10";
				break;
			case 11:
				return "11";
				break;
			case 12:
				return "12";
				break;
		}
	} 

	function tgl_indo2($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
		
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
?>
