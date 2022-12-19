<?php
// import koneksi mysql dan fpdf
require('../../../pages/koneksi.php');
require('../../../fpdf184/fpdf.php');
// ambil id ajuan
$idajuan = $_GET['idajuan'];

// ambil data ajuan
$que = "SELECT *FROM ajuan WHERE idajuan='$idajuan'";
$hsl = $conn->query($que);
$dataajuan = $hsl->fetch_assoc();
$idlayanan = $dataajuan['idlayanan'];
$nim = $dataajuan['nim'];
$idadmin = $dataajuan['admin'];
$datatambahan = $dataajuan["tambahan"];
$pecah = explode(",",$datatambahan);

// ambil data mahasiswa 
$query = "SELECT * FROM pengguna WHERE npknim=$nim";
$hasil = $conn->query($query);
$datamhs = $hasil->fetch_assoc();

// ambil data admin
$sql = "SELECT nama FROM pengguna WHERE idpengguna='$idadmin'";
$rsl = $conn->query($sql);
$nmadm = $rsl->fetch_assoc();
$namaadmin = $nmadm['nama'];

// ambil data kabaak
$sqlka = "SELECT *FROM pimpinan WHERE idpimpinan='PI-5'";
$rslka = $conn->query($sqlka);
$kabaak = $rslka->fetch_assoc();

// ambil data prodi
$prodi = $datamhs['prodi'];
$sqlfak = "SELECT *FROM prodi WHERE namaprodi='$prodi'";
$rslfak = $conn->query($sqlfak);
$fakultas = $rslfak->fetch_assoc();
$view = "SELECT *FROM layanan WHERE idlayanan='$idlayanan'";
$hslview = $conn->query($view);
$tmt = $hslview->fetch_assoc();
$tgl1 = $tmt['tanggal'];
$tautmt = date("d/m/Y", strtotime($tgl1));

// ambil data tahun akademik
$query = "SELECT *FROM tahunakademik WHERE status='berjalan'";
$tahun = $conn->query($query);
$datatahun = $tahun->fetch_assoc();
$tahunakademik = $datatahun['tahun'];

// atur header dan footer
class PDF extends FPDF{
  
  // Page header
  function Header(){
    require('../../../pages/koneksi.php');
    // ambil data ajuan
    $idajuan = $_GET['idajuan'];
    $que = "SELECT *FROM ajuan WHERE idajuan='$idajuan'";
    $hsl = $conn->query($que);
    $dataajuan = $hsl->fetch_assoc();
    $idlayanan = $dataajuan['idlayanan'];
    $nim = $dataajuan['nim'];
    $idadmin = $dataajuan['admin'];
    $datatambahan = $dataajuan["tambahan"];
    $pecah = explode(",",$datatambahan);
    if($idlayanan=="5" && $pecah[0]=="tunjangan orang tua"){
      $txt1 = "Lampiran :";
      $this->SetFont('Times','',11);
      $this->Cell(0,00,$txt1,0,1,"L",false);
      $this->SetXY(30,8);
      $this->MultiCell(0,5,"SURAT EDARAN BERSAMA MENTERI KEUANGAN DAN KEPALA BADAN ADMINISTRASI KEPEGAWAIAN NEGARA\nNOMOR : SE. 1.38/DJA/I.0/7/80   (NO.SE/117/80)\nNOMOR : 19/SE/1980   TANGGAL : 7 JULI 1980");
      $this->Ln(5);
    }else{
      $txt1 = "UNIVERSITAS MUHAMMADIYAH JEMBER";
      $txt2 = "Jl. Karimata No. 49 Jember 68121 Jawa Timur Indonesia";
      $txt3 = "Kotak Pos 104 Telp. (0331) 336728 Fax 337967";
      $txt4 = "Website : www.unmuhjember.ac.id Email : kantorpusat@unmuhjember.ac.id";
      $this->Image('../../../assets/img/logo.png',20,4,22);
      $this->Image('../../../assets/img/iso.jpg',160,4,40);
      $this->SetFont('Times','B',14);
      $this->Cell(0,0,$txt1,0,1,"C",false);
      $this->Ln(4);
      $this->SetFont('Times','',10);
      $this->Cell(0,0,$txt2,0,1,"C",false);
      $this->Ln(4);
      $this->SetFont('Times','',10);
      $this->Cell(0,0,$txt3,0,1,"C",false);
      $this->Ln(4);
      $this->SetFont('Times','',10);
      $this->Cell(0,0,$txt4,0,1,"C",false);
      $this->Ln(4);
      $this->SetLineWidth(0.5);
      $this->line(200,28,10,28);
      $this->Ln(8);
    }
  }
  // Page footer
  function Footer(){
    $hari = array(
      'Sunday' => 'Minggu',
      'Monday' => 'Senin',
      'Tuesday' => 'Selasa',
      'Wednesday' => 'Rabu',
      'Thursday' => 'Kamis',
      'Friday' => 'Jumat',
      'Saturday' => 'Sabtu'
    );
    date_default_timezone_set('Asia/Jakarta');
    $day = date("l");
    $tgl = date("d/M/Y h:i A");
    $this->SetMargins(10,10,10,10);
    $this->SetY(-10);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Sistem Informasi Pelayanan Administrasi Akademik Kemahasiswaan - Universitas Muhammadiyah Jember',0,0,'L');
    $this->Cell(2,10,'Dicetak : '.$hari[$day].', '.$tgl.'',0,0,'R');
  }
}

// atur kertas
$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetMargins(20,30,20,30);

// kondisi pilih informasi ajuan yang akan dicetak
if($idlayanan=='1'){
  // judul dokumen
  $jdl = "BUKTI PENDAFTARAN WISUDA ONLINE";
  $w = $pdf->GetStringWidth($jdl)+6;
  $pdf->SetX((210-$w)/2);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell($w,10,$jdl,0,1,"C",false);
  $pdf->Ln(10);
  // isi dokumen
  $pdf->SetFont('Times','',12);
  $txt = array("0"=>"Nomor Ajuan","1"=>"Tanggal Pengajuan","2"=>"NIM","3"=>"Nama","4"=>"Fakultas","5"=>"Program Studi","6"=>"Email","7"=>"Nomor Whatsapp");
  $data = array("0"=>$idajuan,"1"=>date("d/m/Y", strtotime($dataajuan['tanggal'])),"2"=>$dataajuan['nim'],"3"=>$datamhs['nama'],"4"=>$datamhs['fakultas'],"5"=>$datamhs['prodi'],"6"=>$datamhs['email'],"7"=>$datamhs['whatsapp']);
  for($i=0;$i<count($txt);$i++){
    $pdf->Cell(0,0,$txt[$i],0,0,"L",false);
    $pdf->SetX(70);
    $pdf->Cell(0,0,": ".$data[$i],0,1,"L",false);
    $pdf->Ln(7);
  }
  $pdf->SetFont('Times','B',12);
  $subjdl = "INFORMASI";
  $pdf->Cell(0,10,$subjdl,0,1,"L",false);
  $pdf->SetFont('Times','',12);
  $info = array("0"=>"Informasi mengenai pelaksanaan wisuda dan informasi tentang ijazah dapat di akses secara berkala pada laman web Biro Administrasi Akademik dan Kemahasiswaan (baak.unmuhjember.ac.id).","1"=>"Cetak KAUM bisa dilakukan H+1 setelah mendaftar wisuda dengan membawa bukti pendaftaran wisuda online dan KTM.");
  for($i=0;$i<count($info);$i++){
    $pdf->Cell(0,7,$i+1,0,0,"L",false);
    $pdf->SetX(30);
    $pdf->MultiCell(0,7,$info[$i]);
  }
  $pdf->Ln(4);
  // form tanda tangan
  date_default_timezone_set('Asia/Jakarta');
  $bulan = array(
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'Nopember',
    'December' => 'Desember'
  );
  $ttd = array("0"=>"Jember, ".date("d")." ".$bulan[date("F")]." ".date("Y"),"1"=>"Admin,");
  for($i=0;$i<count($ttd);$i++){
    $pdf->SetX(130);
    $pdf->Cell(0,5,ucwords(strtolower($ttd[$i])),0,1,"L",false);
  }
  $pdf->Ln(20);
  $pdf->SetX(130);
  $pdf->Cell(0,0,ucwords(strtolower($namaadmin)),0,1,"L",false);

} else if($idlayanan=='3') {

  // judul dokumen
  $jdl = "SURAT PERIJINAN PERKULIAHAN DAN EVALUASI BELAJAR";
  $nosurat = $idajuan."/KET/II.3.AU/BAAK/2021";
  $w = $pdf->GetStringWidth($jdl)+6;
  $pdf->SetX((210-$w)/2);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell($w,10,$jdl,0,1,"C",false);
  $pdf->SetFont('Times','',12);
  $pdf->Cell(0,0,$nosurat,0,1,"C",false);
  $pdf->Ln(10);
  $pdf->SetFont('Times','',12);
  $pdf->Cell(0,0,"Yang bertanda tangan dibawah ini :",0,1,"L",false);
  $pdf->Ln(9);
  $txt0 = array("0"=>"Nama","1"=>"NIP ","2"=>"Pangkat / Golongan","3"=>"Jabatan","4"=>"Pada");
  $data0 = array("0"=>$kabaak['nama'],"1"=>$kabaak['npknip'],"2"=>$kabaak['panggol'],"3"=>$kabaak['jabatan'],"4"=>"Universitas Muhammadiyah Jember");
  for($i=0;$i<count($txt0);$i++){
    $pdf->Cell(0,0,$txt0[$i],0,0,"L",false);
    $pdf->SetX(70);
    $pdf->Cell(0,0,": ".$data0[$i],0,1,"L",false);
    $pdf->Ln(7);
  }
  $pdf->Ln(2);
  $pdf->Cell(0,0,"Dengan ini menerangkan bahwa mahasiswa atas :",0,1,"L",false);
  $pdf->Ln(9);
  $txt1 = array("0"=>"Nama","1"=>"NIM","2"=>"Fakultas","3"=>"Program Studi");
  $data1 = array("0"=>$datamhs['nama'],"1"=>$datamhs['npknim'],"2"=>$fakultas['fakultas'],"3"=>$fakultas['namaprodi']);
  for($i=0;$i<count($txt1);$i++){
    $pdf->Cell(0,0,$txt1[$i],0,0,"L",false);
    $pdf->SetX(70);
    $pdf->Cell(0,0,": ".$data1[$i],0,1,"L",false);
    $pdf->Ln(7);
  }
  $pdf->MultiCell(0,7,"diijinkan untuk mengikuti aktivitas perkuliahan dan evaluasi belajar di Universitas Muhammadiyah Jember dengan ketentuan membayar Angsuran ke ".$pecah[0]." sebesar ".$pecah[1]." yang menyisakan tunggakan sebesar ".$pecah[2]." yang akan dibayar pada tanggal ".date("d/m/Y", strtotime($pecah[3])).".");
  $pdf->Ln(4);
  // form tanda tangan
  date_default_timezone_set('Asia/Jakarta');
  $bulan = array(
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'Nopember',
    'December' => 'Desember'
  );
  $ttd = array("0"=>"Jember, ".date("d")." ".$bulan[date("F")]." ".date("Y"),"1"=>$kabaak['jabatan']);
  for($i=0;$i<count($ttd);$i++){
    $pdf->SetX(130);
    $pdf->MultiCell(0,5,ucwords(strtolower($ttd[$i])));
  }
  $pdf->Ln(20);
  $pdf->SetX(130);
  $pdf->MultiCell(0,5,$kabaak['nama']."\n".$kabaak['npknip']);

} else if($idlayanan=='5') {
  // judul dokumen
  $jdl = "SURAT PERNYATAAN AKTIF KULIAH";
  $nosurat = $idajuan."/KET/II.3.AU/BAAK/2021";
  $w = $pdf->GetStringWidth($jdl)+6;
  $pdf->SetX((210-$w)/2);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell($w,10,$jdl,0,1,"C",false);
  $pdf->SetFont('Times','',12);
  $pdf->Cell(0,0,$nosurat,0,1,"C",false);
  $pdf->Ln(10);
  $pdf->SetFont('Times','',12);
  $pdf->Cell(0,0,"Yang bertanda tangan dibawah ini :",0,1,"L",false);
  $pdf->Ln(9);
  $txt0 = array("0"=>"Nama","1"=>"NIP ","2"=>"Pangkat / Golongan","3"=>"Jabatan","4"=>"Pada");
  $data0 = array("0"=>$kabaak['nama'],"1"=>$kabaak['npknip'],"2"=>$kabaak['panggol'],"3"=>$kabaak['jabatan'],"4"=>"Universitas Muhammadiyah Jember");
  for($i=0;$i<count($txt0);$i++){
    $pdf->Cell(0,0,$txt0[$i],0,0,"L",false);
    $pdf->SetX(70);
    $pdf->Cell(0,0,": ".$data0[$i],0,1,"L",false);
    $pdf->Ln(7);
  }
  $pdf->Ln(2);
  $pdf->Cell(0,0,"Dengan ini menyatakan dengan sesungguhnya bahwa :",0,1,"L",false);
  $pdf->Ln(9);
  $txt1 = array("0"=>"Nama","1"=>"NIM","2"=>"Aktif Kuliah di","3"=>"Fakultas","4"=>"Program Studi","5"=>"Status Program Studi","6"=>"Tahun Akademik");
  $data1 = array("0"=>$datamhs['nama'],"1"=>$datamhs['npknim'],"2"=>"Universitas Muhammadiyah Jember","3"=>$fakultas['fakultas'],"4"=>$fakultas['namaprodi'],"5"=>"Terakreditasi ".$fakultas['peringkat']." - ".$fakultas['nosk'],"6"=>$tahunakademik." (Berlaku sampai dengan tanggal ".$tautmt.")");
  for($i=0;$i<count($txt1);$i++){
    $pdf->Cell(0,0,$txt1[$i],0,0,"L",false);
    $pdf->SetX(70);
    $pdf->Cell(0,0,": ".$data1[$i],0,1,"L",false);
    $pdf->Ln(7);
  }
  $pdf->Ln(2);
  if($datatambahan=='beasiswa'){
    $pdf->MultiCell(0,0,"Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.");
  }else{
    $pdf->Cell(0,0,"Dan Orangtua/Wali mahasiswa tersebut :",0,1,"L",false);
    $pdf->Ln(9);
    $txt2 = array("0"=>"Nama","1"=>"NIP / NRP / NOPEN","2"=>"Pangkat / Golongan","3"=>"Instansi / Kantor");
    $data2 = array("0"=>$pecah[1],"1"=>$pecah[2],"2"=>$pecah[3],"3"=>$pecah[4]);
    for($i=0;$i<count($txt2);$i++){
      $pdf->Cell(0,0,$txt2[$i],0,0,"L",false);
      $pdf->SetX(70);
      $pdf->Cell(0,0,": ".strtoupper($data2[$i]),0,1,"L",false);
      $pdf->Ln(7);
    }
    $pdf->MultiCell(0,7,"Demikian surat keterangan ini dibuat dengan sebenarnya dan apabila di kemudian hari ternyata surat keterangan ini tidak benar yang mengakibatkan kerugian terhadap Negara Republik Indonesia, maka saya bersedia menanggung kerugian tersebut.");
  }
  $pdf->Ln(4);
  // form tanda tangan
  date_default_timezone_set('Asia/Jakarta');
  $bulan = array(
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'Nopember',
    'December' => 'Desember'
  );
  $ttd = array("0"=>"Jember, ".date("d")." ".$bulan[date("F")]." ".date("Y"),"1"=>$kabaak['jabatan']);
  for($i=0;$i<count($ttd);$i++){
    $pdf->SetX(130);
    $pdf->MultiCell(0,5,ucwords(strtolower($ttd[$i])));
  }
  $pdf->Ln(20);
  $pdf->SetX(130);
  $pdf->MultiCell(0,5,$kabaak['nama']."\n".$kabaak['npknip']);
} else if($idlayanan=='6') {
  // judul dokumen
  $jdl = "SURAT KETERANGAN CUTI KULIAH";
  $nosurat = $idajuan."/KET/II.3.AU/BAAK/2021";
  $w = $pdf->GetStringWidth($jdl)+6;
  $pdf->SetX((210-$w)/2);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell($w,10,$jdl,0,1,"C",false);
  $pdf->SetFont('Times','',12);
  $pdf->Cell(0,0,$nosurat,0,1,"C",false);
  $pdf->Ln(10);
  $pdf->SetFont('Times','',12);
  $pdf->Cell(0,0,"Kepada Yth. : Sdr. ".$datamhs['nama'],0,1,"L",false);
  $pdf->SetXY(45,60);
  $pdf->Cell(0,0,"NIM : ".$datamhs['npknim'],0,1,"L",false);
  $pdf->SetXY(45,65);
  $pdf->Cell(0,0,"Program Studi : ".$datamhs['prodi'],0,1,"L",false);
  $pdf->Ln(10);
  $pdf->MultiCell(0,7,"Menindaklanjuti surat dekan Fakultas ".$datamhs['fakultas']." tanggal ".date("d/m/Y", strtotime($pecah[0]))." tentang permohonan cuti kuliah, maka dengan ini kami beritahukan bahwa :");
  $pdf->Ln(4);
  $info = array("0"=>"Saudara di ijinkan untuk cuti kuliah pada Semester ".ucfirst($pecah[1])." Tahun Akademik ".$tahunakademik.".","1"=>"Selanjutnya untuk mengikuti kegiatan akademik kembali, saudara harus melakukan registrasi pada masa registrasi yang telah ditetapkan dalam Kalender Akademik untuk Semester Genap Tahun Akademik 2021/2022 dan melakukan ketentuan-ketentuan yang telah ditetapkan.");
  for($i=0;$i<count($info);$i++){
    $no = $i+1;
    $pdf->Cell(0,7,$no.".",0,0,"L",false);
    $pdf->SetX(30);
    $pdf->MultiCell(0,7,$info[$i]);
  }
  $pdf->Ln(4);
  $pdf->MultiCell(0,7,"Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya. Atas perhatian dan kerjasamanya disampaikan terima kasih.");
  $pdf->Ln(4);
  // form tanda tangan
  date_default_timezone_set('Asia/Jakarta');
  $bulan = array(
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'Nopember',
    'December' => 'Desember'
  );
  $ttd = array("0"=>"Jember, ".date("d")." ".$bulan[date("F")]." ".date("Y"),"1"=>$kabaak['jabatan']);
  for($i=0;$i<count($ttd);$i++){
    $pdf->SetX(130);
    $pdf->MultiCell(0,5,ucwords(strtolower($ttd[$i])));
  }
  $pdf->Ln(20);
  $pdf->SetX(130);
  $pdf->MultiCell(0,5,$kabaak['nama']."\n".$kabaak['npknip']);
} else if($idlayanan=='8') {
  // judul dokumen
  $jdl = "SURAT KETERANGAN BERHENTI STUDI TETAP";
  $nosurat = $idajuan."/KET/II.3.AU/BAAK/2021";
  $w = $pdf->GetStringWidth($jdl)+6;
  $pdf->SetX((210-$w)/2);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell($w,10,$jdl,0,1,"C",false);
  $pdf->SetFont('Times','',12);
  $pdf->Cell(0,0,$nosurat,0,1,"C",false);
  $pdf->Ln(10);
  $pdf->SetFont('Times','',12);
  $pdf->Cell(0,0,"Yang bertanda tangan dibawah ini :",0,1,"L",false);
  $pdf->Ln(10);
  $txt0 = array("0"=>"Nama","1"=>"NIP ","2"=>"Jabatan","3"=>"Pada");
  $data0 = array("0"=>"Dr. Hanafi, M.Pd.","1"=>"19670815 199203 1 002","2"=>"Rektor","3"=>"Universitas Muhammadiyah Jember");
  for($i=0;$i<count($txt0);$i++){
    $pdf->Cell(0,0,$txt0[$i],0,0,"L",false);
    $pdf->SetX(70);
    $pdf->Cell(0,0,": ".$data0[$i],0,1,"L",false);
    $pdf->Ln(7);
  }
   $pdf->Ln(3);
  $pdf->Cell(0,0,"Dengan ini menerangkan bahwa mahasiswa atas :",0,1,"L",false);
  $pdf->Ln(10);
  $txt1 = array("0"=>"Nama","1"=>"NIM","2"=>"Fakultas","3"=>"Program Studi");
  $data1 = array("0"=>$datamhs['nama'],"1"=>$datamhs['npknim'],"2"=>$fakultas['fakultas'],"3"=>$fakultas['namaprodi']);
  for($i=0;$i<count($txt1);$i++){
    $pdf->Cell(0,0,$txt1[$i],0,0,"L",false);
    $pdf->SetX(70);
    $pdf->Cell(0,0,": ".$data1[$i],0,1,"L",false);
    $pdf->Ln(7);
  }
  $pdf->MultiCell(0,7,"Tercatat sebagai mahasiswa Fakultas ".$datamhs['fakultas']." Program Studi ".$datamhs['prodi']." Universitas Muhammadiyah Jember sampai dengan Semester Ganjil Tahun Akademik ".$tahunakademik.".\nSurat Keterangan ini diberikan atas permintaan yang bersangkutan untuk berhenti studi tetap pada Universitas Muhammadiyah Jember.\nDemikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.");
  $pdf->Ln(4);
  // form tanda tangan  
  date_default_timezone_set('Asia/Jakarta');
  $bulan = array(
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'Nopember',
    'December' => 'Desember'
  );
  $ttd = array("0"=>"Jember, ".date("d")." ".$bulan[date("F")]." ".date("Y"),"1"=>"Rektor");
  for($i=0;$i<count($ttd);$i++){
    $pdf->SetX(130);
    $pdf->MultiCell(0,5,ucwords(strtolower($ttd[$i])));
  }
  $pdf->Ln(20);
  $pdf->SetX(130);
  $pdf->MultiCell(0,5,"Dr. Hanafi, M.Pd.\n19670815 199203 1 002");
}

$pdf->Output('I',$idajuan.".pdf",'F');
?>