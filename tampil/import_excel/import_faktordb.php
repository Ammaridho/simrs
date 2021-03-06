<?php
// menggunakan class phpExcelReader
include "excel_reader2.php";

// koneksi ke mysql
connect("localhost", "root", "12345678");
select_db("renpra");

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
// membaca data nim (kolom ke-1)
  $kd_faktor = $data->val($i, 1);
// membaca data nim (kolom ke-2)
  $kd_diagnosa = $data->val($i, 2);
// membaca data nim (kolom ke-3)
  $nama_faktor = $data->val($i, 3);


  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO faktordb VALUES ('$kd_faktor','$kd_diagnosa', '$nama_faktor')";
  $hasil = mysqli_query($koneksi,$query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
}

// tampilan status sukses dan gagal
echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";

?>




































..................................
