<?php
include "../librari/config.php";
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

// Takes raw data from the request
$data = json_decode(file_get_contents('php://input'), true);


$prn		= kdauto("data_pasien","prn","8","");
$emailaddress = $data['emailaddress'];
$nama = $data['nama'];
$tempat_lahir = $data['tempat_lahir'];
$tanggal_lahir = $data['tanggal_lahir'];
$jenis_kelamin = $data['jenis_kelamin'];
$alamat = $data['alamat'];
$nik = $data['nik'];
$no_hp = $data['no_hp'];
$nama_pj = $data['nama_pj'];
$hubungan = $data['hubungan'];
$nohp_pj = $data['nohp_pj'];
$email = $data['email'];


header('Content-Type: application/json');
$pecah = explode("/",$tanggal_lahir);
$tgl = $pecah[0];
$bln = $pecah[1];
$thn = $pecah[2];
$tgl_lahir = $thn."-".$bln."-".$tgl;
$pecahsex = explode("-",$jenis_kelamin);
$sex = $pecahsex[0];
$tgl_reg = date("Y-m-d");
$jam_reg = date("H:i:s");


$sql  = " INSERT INTO data_pasien (prn,nama,t4_lahir,tgl_lahir,jenis_kelamin,tanggal,jam,alamat,rt,kel,kec,kab,prov,telp_rumah,telp_kantor,hp1,hp2,hp3,nama_pj,alamat_pj,hub,telp_rumah_pj,telp_kantor_pj,hp_pj,batal)";

$sql .=	" VALUES ('$prn','$nama','$tempat_lahir','$tgl_lahir','$sex','$tgl_reg','$jam_reg','$alamat','$rt','$kel','$kec','$kab','$prov','$no_hp','$telp_kantor','$hp1','$hp2','$hp3','$nama_pj','$alamat_pj','$hubungan','$nohp_pj','$telp_kantor_pj','$hp_pj','No')";
mysqli_query($koneksi,$sql) 
		  or die ("Gagal simpan :" . mysqli_error($koneksi));

if($sql){
        $sql = "Data berhasil disimpan.";
        echo json_encode($sql, true);
    } else{
        $sql = "Data gagal disimpan.";
        echo json_encode($sql, false);
        exit();
    }