<?php  
include ('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT *FROM tb_siswa");
$html = '<center><h3>Daftar Nama Siswa</h3></center><br><br/><hr/><br>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>Nama</th>
<th>Kelas</th>
<th>Alamat</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) 
{
$html .= "<tr>
<td>".$no."</td>
<td>".$row['nama']."</td>
<td>".$row['kelas']."</td>
<td>".$row['alamat']."</td>
</tr>";
$no++;
}
$html .= "<html>";
$dompdf->loadhtml($html);
// Menyetting ukuran dan orientasi kertas
$dompdf->setPaper('A4','potrait');
//Merendering dari HTML ke PDF
$dompdf->render();
// Melakukan output file PDF
$dompdf->stream('laporandata_siswa.pdf');
?>