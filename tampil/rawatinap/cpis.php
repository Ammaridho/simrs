<?php
include "../librari/inc.koneksidb.php";
include "../librari/inc.session.php";
$no_alat = $_REQUEST['no_alat'];
if ($no_alat !="") {
   $sql = "SELECT * FROM monitoring WHERE no_alat='$no_alat'";
   $qry = mysqli_query($koneksi, $sql)
      or die ("SQL Error".mysql_error());
   $data=mysql_fetch_array($qry);
}
?>

<script language="JavaScript">

function CalculateCPIS() {
with (document.CPISscore){
Score = 0.0;
Probability.value= "";

if (cc1[0].checked){
Score = Score + 0;
}
if (cc1[1].checked){
Score = Score + 1;
}
if (cc1[2].checked){
Score = Score + 2;
}
if (cc2[0].checked){
Score = Score + 0;
}
if (cc2[1].checked){
Score = Score + 1;
}
if (cc2[2].checked){
Score = Score + 2;
}
if (cc3[0].checked){
Score = Score + 0;
}
if (cc3[1].checked){
Score = Score + 1;
}
if (cc3[2].checked){
Score = Score + 2;
}
if (cc4[0].checked){
Score = Score + 0;
}
if (cc4[1].checked){
Score = Score + 1;
}
if (cc4[2].checked){
Score = Score + 2;
}
if (cc5[0].checked){
Score = Score + 0;
}
if (cc5[1].checked){
Score = Score + 2;
}
if (cc6[0].checked){
Score = Score + 0;
}
if (cc6[1].checked){
Score = Score + 2;
}
cctotal.value = Score;

if (Score<=6){
Probability.value= "Rendah-Sedang";
Kesimpulan.value= "Jika kecurigaan klinis untuk VAP adalah RENDAH, TIDAK diperlukan kultur dahak dan evaluasi potensi sumber infeksi lain. DAN Jika kecurigaan klinis untuk VAP adalah TINGGI, lakukan bronchoalveolar lavage (BAL) atau mini-BAL";
}
else{
Probability.value= "Tinggi";
Kesimpulan.value= "Direkomendasikan untuk tindakan BronchoAlveolar lavage (BAL) or mini-BAL";
}
}}

//-->
</script>
<form id="CPISscore" name="CPISscore" method="post" action="cpis_sim.php">
	<input name="no_alat" type="hidden" id="no_alat" value="<?php echo $data['no_alat'] ;?>">
	<input name="tanggal" type="hidden" id="tanggal" value="<?php echo "".date('Y-m-d') ;?>">
	<input name="jam" type="hidden" id="jam" size="8" value="<?php echo "".date('H:i') ;?>">
   	<input name="ipcln" type="hidden" value="<?php echo $_SESSION['username'];?>" />
<table width="98%"  border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr bgcolor="#DBEAF5">
      <td colspan="4"><strong>CPIS</strong></td>
    </tr>
    <tr>
      <td width="34%" bgcolor="#FFFFFF">Tracheal secretions</td>
      <td width="23%" bgcolor="#FFFFFF"><input type=radio name=cc1 onclick="CalculateCPIS();" value="0" />
        Tidak ada atau jarang </td>
      <td width="17%" bgcolor="#FFFFFF"><input type=radio name=cc1 onclick="CalculateCPIS();" value="1"/>
      Non Purelent </td>
      <td width="26%" bgcolor="#FFFFFF"><input type=radio name=cc1 onclick="CalculateCPIS();" value="2"/>
      Purulent </td>
    </tr>
    <tr bgcolor="#DBEAF5">
      <td> Chest X ray</td>
      <td><input type=radio name=cc2 onclick="CalculateCPIS();" value="0"/>
        Non Infiltrat </td>
      <td><input type=radio name=cc2 onclick="CalculateCPIS();" value="1"/>
        Diffuse infiltrate </td>
      <td><input type=radio name=cc2 onclick="CalculateCPIS();" value="2"/>
        Localized Infiltrat </td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Temp (&deg;C)</td>
      <td bgcolor="#FFFFFF"><input type=radio name=cc3 onclick="CalculateCPIS();" value="0"/>
        36.5-38.4&deg;C</td>
      <td bgcolor="#FFFFFF"><input type=radio name=cc3 onclick="CalculateCPIS();" value="1"/>
        38.5-38.9&deg;C</td>
      <td bgcolor="#FFFFFF"><input type=radio name=cc3 onclick="CalculateCPIS();" value="2"/>
        &lt;36.5 dan &gt;38.9&deg;C </td>
    </tr>
    <tr bgcolor="#DBEAF5">
      <td>White blood cell count (x 1000/mm3)</td>
      <td><input type=radio name=cc4 onclick="CalculateCPIS();" value="0"/>
        4.000-11.000</td>
      <td><input type=radio name=cc4 onclick="CalculateCPIS();" value="1"/>
        &lt;4.000 atau &gt;11.000</td>
      <td><input type=radio name=cc4 onclick="CalculateCPIS();" value="2"/>
      &lt;4.000 atau &gt;11.000 dan Band Form &gt;50% </td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">PA02/F102mm Hg</td>
      <td bgcolor="#FFFFFF"><span class="tbl7">
        <input type=radio name=cc5 onclick="CalculateCPIS();" value="0"/>
        &gt;240, ARDS atau Kontusio Pulmonary </span></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF"><span class="tbl7">
      <input type=radio name=cc5 onclick="CalculateCPIS();" value="2"/>
      </span><span class="tbl7">&lt;240 dan Tidak ARDS </span></td>
    </tr>
    <tr bgcolor="#DBEAF5">
      <td>Microbiology</td>
      <td><span class="tbl7">
        <input type=radio name=cc6 onclick="CalculateCPIS();" value="0"/>
      Tidak ada pertumbuhan bakteri </span></td>
      <td>&nbsp;</td>
      <td><span class="tbl7">
        <input type=radio name=cc6 onclick="CalculateCPIS();" value="2"/>
      Pertumbuhan bakteri moderat-tinggi </span></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Skor</td>
      <td bgcolor="#FFFFFF" colspan="3"><input type="text" name="cctotal" size="24" /></td>
    </tr>
    <tr bgcolor="#DBEAF5">
      <td>VAP Probability dan Rekomendasi</td>
      <td colspan="3"><input type="text" name="Probability" /><br/>
      <textarea name="Kesimpulan" cols="40" rows="3" ></textarea></td>
    </tr>
    <tr bgcolor="#DBEAF5">
      <td><input type=reset name=reset value="Reset Form" />
      <input type="submit" name="Submit" value="Simpan" /></td>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
