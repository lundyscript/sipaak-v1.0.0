<!--=========================================================
Copyright 2021
1. Creative Tim (https://www.creative-tim.com)
2. Freepik (https://www.freepik.com)
3. Flaticon (https://www.flaticon.com/)
 =========================================================-->
<?php
session_start();
include "../../../pages/koneksi.php";
if(!isset($_SESSION['idakun'])){
    echo "<script>alert('Anda belum login!!')</script>";
    echo "<script>window.location.href='../../../'</script>";
}
if(time() - $_SESSION['timestamp'] > 600) { //subtract new timestamp from the old one
    echo "<script>alert('Sesi login anda telah habis! Silahkan login kembali!');</script>";
    echo "<script>window.location.href='../../../'</script>";
    exit;
} else {
    $_SESSION['timestamp'] = time(); //set new timestamp
}
$idajuan = $_GET['idajuan'];
$sql = "SELECT *FROM ajuan WHERE idajuan='$idajuan'";
$result = $conn->query($sql);
$dataajuan = $result->fetch_assoc();
$nim = $dataajuan['nim'];
$idlayanan = $dataajuan['idlayanan'];
$tgl1 = $dataajuan['tanggal'];
$tgl2 = $dataajuan['update'];
$tgl1 = date("d/m/Y", strtotime($tgl1));
$tgl2 = date("d/m/Y", strtotime($tgl2));
$idadmin = $dataajuan['admin'];

$que = "SELECT *FROM pengguna WHERE npknim='$nim'";
$hsl = $conn->query($que);
$datamhs = $hsl->fetch_assoc();

$qry = "SELECT *FROM akun WHERE idpengguna='$idadmin'";
$adm = $conn->query($qry);
$admn = $adm->fetch_assoc();

$query = "SELECT *FROM tahunakademik WHERE status='berjalan'";
$tahun = $conn->query($query);
$datatahun = $tahun->fetch_assoc();
$tahunakademik = $datatahun['tahun'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" type="image/png" href="../../../assets/img/post-it.png" />
  <title>Validasi | SIPAAK | Sistem Informasi Pelayanan Administrasi Akademik Kemahasiswaan | Universitas Muhammadiyah Jember</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show">
  <!-- sidebar -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
    <div class="sidenav-header"><i class="fas fa-times p-3 cursor-pointer opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="../../"><span class="ms-1 font-weight-bold text-dark">SIPAAK</span></a>
    </div>
    <hr class="horizontal dark mt-0 mb-3" />
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../../">
          <div class="text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons text-dark opacity-7">rocket_launch</i>
          </div>
          <span class="nav-link-text text-dark ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active bg-gradient-info" href="../">
          <div class="text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">description</i>
          </div>
          <span class="nav-link-text ms-1">Layanan</span>
        </a>
      </li>
    </ul>
    <div class="sidenav-footer position-absolute w-100 bottom-0 mb-3">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link logout" href="../../../log/out">
            <div class="text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons text-danger">logout</i>
            </div>
            <span class="nav-link-text text-danger ms-1">Keluar</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm" aria-current="page"><a class="link opacity-7" href="../">Layanan</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a class="link" >Riwayat Ajuan</a></li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Sistem Informasi Pelayanan Administrasi Akademik Kemahasiswaan</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid mb-4 py-4">
      <div class="row mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-header p-3 pt-2 pb-0">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-success text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end py-3">
                  <h4 class="mb-0">Data Mahasiswa</h4>
                </div>
              </div>
              <hr/>
              <div class="card-body p-3 pb-0">
                <div class="timeline timeline-one-side">
                  <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="material-icons text-warning text-gradient">subtitles</i>
                    </span>
                    <div class="timeline-content">
                      <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">NIM</h6>
                      <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($datamhs['npknim']); ?></p>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="material-icons text-info text-gradient">sentiment_neutral</i>
                    </span>
                    <div class="timeline-content">
                      <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Nama Lengkap</h6>
                      <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($datamhs['nama']); ?></p>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="material-icons text-primary text-gradient">local_library</i>
                    </span>
                    <div class="timeline-content">
                      <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Fakultas</h6>
                      <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($datamhs['fakultas']); ?></p>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="material-icons text-warning text-gradient">code</i>
                    </span>
                    <div class="timeline-content">
                      <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Program Studi</h6>
                      <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($datamhs['prodi']); ?></p>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="material-icons text-danger text-gradient">drafts</i>
                    </span>
                    <div class="timeline-content">
                      <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Email</h6>
                      <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($datamhs['email']); ?></p>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="material-icons text-success text-gradient">whatsapp</i>
                    </span>
                    <div class="timeline-content">
                      <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Nomor Whatsapp</h6>
                      <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($datamhs['whatsapp']); ?></p>
                    </div>
                  </div>
                </div>
                <?php
                $datatambahan = $dataajuan["tambahan"];
                $pecah = explode(",",$datatambahan);
                if(empty($datatambahan)){
                }else{
                  ?>
                  <hr class="dark horizontal my-4" />
                  <div class="timeline timeline-one-side">
                  <?php
                  if($idlayanan=="1"){
                    ?>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-primary text-gradient">face</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Nama Orang Tua</h6>
                        <p class="text-dark text-sm text-uppercase font-weight-bold mt-1 mb-0"><?php echo $pecah[0]; ?></p>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <i class="material-icons text-info text-gradient">smartphone</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Nomor HP Orang Tua</h6>
                        <p class="text-dark text-sm text-uppercase font-weight-bold mt-1 mb-0"><?php echo $pecah[1]; ?></p>
                      </div>
                    </div>                
                  <?php
                  }else if($idlayanan=="2"){
                  ?>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-dark text-gradient">terminal</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Jenis Perubahan Data Mahasiswa</h6>
                        <p class="text-dark text-sm text-capitalize font-weight-bold mt-1 mb-0"><?php echo $pecah[0]; ?></p>
                      </div>
                    </div>               
                  <?php
                  }else if($idlayanan=="3"){
                  ?>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-info text-gradient">pin</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Angsuran Ke</h6>
                        <p class="text-dark text-sm text-uppercase font-weight-bold mt-1 mb-0"><?php echo $pecah[0]; ?></p>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-warning text-gradient">local_atm</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Dibayar</h6>
                        <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php echo $pecah[1]; ?></p>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-danger text-gradient">paid</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Sisa</h6>
                        <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php echo $pecah[2]; ?></p>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-success text-gradient">event</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Tanggal Pelunasan</h6>
                        <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php echo date("d/m/Y", strtotime($pecah[3])); ?></p>
                      </div>
                    </div>
                  <?php
                  }else if($idlayanan=="5"){
                    if($datatambahan=='beasiswa'){
                    ?>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-dark text-gradient">terminal</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Keperluan</h6>
                        <p class="text-dark text-sm text-capitalize font-weight-bold mt-1 mb-0"><?php echo $pecah[0]; ?></p>
                      </div>
                    </div>
                    <?php
                    }else{
                    ?>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-dark text-gradient">terminal</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Keperluan</h6>
                        <p class="text-dark text-sm text-capitalize font-weight-bold mt-1 mb-0"><?php echo $pecah[0]; ?></p>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-primary text-gradient">face</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Nama Orang Tua</h6>
                        <p class="text-dark text-sm text-uppercase font-weight-bold mt-1 mb-0"><?php echo $pecah[1]; ?></p>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <i class="material-icons text-warning text-gradient">subtitles</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">NIP / NRP / NOPEM</h6>
                        <p class="text-dark text-sm text-uppercase font-weight-bold mt-1 mb-0"><?php echo $pecah[2]; ?></p>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <i class="material-icons text-success text-gradient">spa</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Pangkat / Golongan</h6>
                        <p class="text-dark text-sm text-uppercase font-weight-bold mt-1 mb-0"><?php echo $pecah[3]; ?></p>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <i class="material-icons text-info text-gradient">apartment</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Instansi / Kantor</h6>
                        <p class="text-dark text-sm text-uppercase font-weight-bold mt-1 mb-0"><?php echo $pecah[4]; ?></p>
                      </div>
                    </div>
                    <?php
                    }
                  }else if($idlayanan=="6"){
                  ?>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-info text-gradient">edit_calendar</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Tanggal Surat Pengantar</h6>
                        <p class="text-dark text-sm text-capitalize font-weight-bold mt-1 mb-0"><?php echo date("d/m/Y", strtotime($pecah[0])); ?></p>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-primary text-gradient">today</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Cuti Kuliah Pada</h6>
                        <p class="text-dark text-sm text-capitalize font-weight-bold mt-1 mb-0">Semester <?php echo ucfirst($pecah[1])." Tahun Akademik ".$tahunakademik; ?></p>
                      </div>
                    </div>   
                  <?php
                  }else if($idlayanan=="8"){
                  ?>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step ">
                        <i class="material-icons text-danger text-gradient">report_problem</i>
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Alasan Berhenti Studi Tetap</h6>
                        <p class="text-dark text-sm text-capitalize font-weight-bold mt-1 mb-0"><?php echo $pecah[0]; ?></p>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        <?php
        if($dataajuan["status"]=='SELESAI' || $dataajuan["status"]=='BELUM DI PERIKSA' ||  $dataajuan["status"]=='PROSES VALIDASI' ||  $dataajuan["status"]=='TIDAK VALID'){
        ?>
        <div class="col-lg-5 col-md-6">
          <div class="card">
            <div class="card-header p-3 pt-2 pb-0">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">description</i>
              </div>
              <div class="text-end py-3">
                <h4 class="mb-0">Dokumen Persyaratan</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0" />
            <div class="table-responsive">
              <table class="table align-items-center">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis
                      Dokumen</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT nama, syarat FROM layanan WHERE idlayanan=$idlayanan";
                  $result = $conn->query($sql);
                  $data = $result->fetch_assoc();
                  $syarat = $data["syarat"];
                  $pecah = explode(",",$syarat);
                  for($i=1;$i<=count($pecah);$i++){
                    $filename = "../../../docs/persyaratan/$idlayanan-$idajuan-$i.pdf";
                    if(file_exists($filename)){
                      ?>
                      <tr>
                        <td class="align-middle text-center text-dark text-xs font-weight-bold"><?php echo $i; ?></td>
                        <td class="align-middle text-dark text-xs font-weight-bold text-uppercase">
                          <?php echo $pecah[$i-1]; ?></td>
                        <td class="align-middle text-center text-xs">
                          <a href="<?php echo "../../../docs/persyaratan/$idlayanan-$idajuan-$i.pdf"; ?>" target="_blank"><i class="material-icons text-info text-gradient" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">file_present</i></a>
                        </td>
                      </tr>
                      <?php
                    }else{
                      ?>
                      <tr>
                        <td class="align-middle text-center text-dark text-xs font-weight-bold"><?php echo $i; ?></td>
                        <td class="align-middle text-dark text-xs font-weight-bold text-uppercase">
                          <?php echo $pecah[$i-1]; ?></td>
                        <td class="align-middle text-center text-xs">
                          <a><i class="material-icons text-danger text-gradient disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak Ada File">file_present</i></a>
                        </td>
                      </tr>
                      <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php
        } else {
        ?>
        <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
          <form autocomplete="off" method="post" enctype="multipart/form-data">
          <div class="card mb-4">
            <div class="card-header p-3 pt-2 pb-0">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">description</i>
              </div>
              <div class="text-end py-3">
                <h4 class="mb-0">Unggah Dokumen</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0" />
            <div class="card-body p-4">
              <div class="row">
                <div class="col-lg-12 col-sm-6 text-sm text-dark font-weight-bold">
                  <?php
                  $sql = "SELECT nama, syarat FROM layanan WHERE idlayanan=$idlayanan";
                  $result = $conn->query($sql);
                  $data = $result->fetch_assoc();
                  $nama = $data['nama'];
                  ?>
                  <p class="text-sm text-dark font-weight-normal text-justify">Semua dokumen persyaratan <span class="text-capitalize font-weight-bold"><?php echo $nama; ?></span> diunggah dengan ketentuan dokumen berformat <span class="font-weight-bold">PDF</span> dan ukuran file tidak lebih besar dari <span class="font-weight-bold ">500kb</span>.</p>
                  <ol>
                  <?php
                  $syarat = $data["syarat"];
                  $pecah = explode(",",$syarat);
                  for($i = 1; $i <= count($pecah); $i++){
                  ?>
                    <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                      <div class="input-group input-group-outline pb-2">
                        <input class="form-control" type="file" name="dok-<?php echo $i; ?>" />
                      </div>
                    </li>
                  <?php
                  }
                  ?>
                  </ol>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <button type="submit" name="ajukan" class="btn bg-gradient-success mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title=" Ajukan "><i class="material-icons opacity-10">task_alt</i></button>
                  <button type="submit" name="batal" class="btn bg-gradient-danger mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title=" Batal "><i class="material-icons opacity-10">block</i></button>
                </div>
              </div>
            </div>
          </div>
          <?php
          if(isset($_POST['ajukan'])) {
            
            // upload persyaratan
            $sql = "SELECT nama, syarat FROM layanan WHERE idlayanan='$idlayanan'";
            $result = $conn->query($sql);
            $data = $result->fetch_assoc();
            $syarat = $data["syarat"];
            $pecah = explode(",",$syarat);
            $dokgal = array();
            $upload = "";
            for($i = 1; $i <= count($pecah); $i++){
              // ambil data file
              $namaFile = $idlayanan."-".$idajuan."-".$i.".pdf";
              $namaSementara = $_FILES['dok-'.$i]['tmp_name'];
              $tipefile = $_FILES['dok-'.$i]['type'];
              $ukuranfile = $_FILES['dok-'.$i]['size'];
              // tentukan lokasi file akan dipindahkan
              $dirUpload = "../../../docs/persyaratan/";
              // pindahkan file
              if($tipefile=='application/pdf' && $ukuranfile < 500000){
                $unggah = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
              } else if($_FILES['dok-'.$i]['error']>0){
                $file = "kosong";
              } else {
                $upload = "gagal";
                array_push($dokgal,$pecah[$i-1]);
              }
            }
            if($upload=='gagal'){
              ?>
              <div class="alert alert-danger alert-dismissible fade show px-4" role="alert">
                <div class="row">
                  <div class="col-sm-10"><p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Gagal!</strong> Data tidak tersimpan! Pastikan dokumen <span class="text-capitalize font-weight-bold"><?php for($i = 0; $i < count($dokgal); $i++){ $no = $i+1; if($no=1){echo $dokgal[$i];}else{echo "</br>".$no.". ".$dokgal[$i]."";} } ?></span></br> berformat <strong>PDF</strong> dan ukuran file tidak lebih besar dari <strong>500kb</strong>.</p></div>
                  <div class="col-sm-2 text-end"><a class="text-white mb-0" href="../" data-bs-toggle="tooltip" data-bs-placement="top" title=" Tutup "><span class="lh-1" aria-hidden="true">&times;</span></a></div>
                </div>
              </div>
              <?php
            } else if(isset($unggah) || $file=='kosong'){
              // update database
              $status = 'BELUM DI PERIKSA';
              $tanggal = date("Y-m-d");
              $update = '0000-00-00';
              $que = "UPDATE ajuan SET `status`='$status', `tanggal`='$tanggal', `update`='$update' WHERE idajuan='$idajuan'";
              $updt = $conn->query($que);
              ?>
              <div class="alert alert-success alert-dismissible fade show px-4" role="alert">
                <div class="row">
                  <div class="col-sm-10"><p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Berhasil!</strong> Data tersimpan!</p></div>
                  <div class="col-sm-2 text-end"><a class="text-white mb-0" href="../" data-bs-toggle="tooltip" data-bs-placement="top" title=" Tutup "><span class="lh-1" aria-hidden="true">&times;</span></a></div>
                </div>
              </div>
              <?php
            }
          }
          ?>
          </form>
        </div>
        <?php
        }
        ?>
        <div class="col-lg-3 col-md-6">
          <div class="card">
            <div class="card-header p-3 pt-2 pb-0">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">domain_verification</i>
              </div>
              <div class="text-end py-3">
                <h4 class="mb-0">Ket. Validasi</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0" />
            <div class="card-body p-3 pb-0">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-success text-gradient">numbers</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Nomor Ajuan</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php echo $dataajuan['idajuan']; ?></p>
                  </div>
                </div>
                 <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-primary text-gradient">bookmark</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Layanan</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php echo $data['nama']; ?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-info text-gradient">campaign</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Diajukan</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php echo $tgl1; ?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">sensors</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Status</h6>
                    <?php
                    if($dataajuan["status"]=='SELESAI'){
                    ?>
                    <p class="text-sm text-success font-weight-bold mb-0"><?php echo $dataajuan["status"]; ?></p>
                    <p class="text-dark text-xs font-weight-bold mb-0"><?php echo $tgl2; ?></p>
                    <?php
                    } else if ($dataajuan["status"]=='DI TANGGUHKAN' || $dataajuan["status"]=='PROSES VALIDASI') {
                      ?>
                      <p class="text-sm text-warning font-weight-bold mb-0"><?php echo $dataajuan["status"]; ?></p>
                      <p class="text-dark text-xs font-weight-bold mb-0"><?php echo $tgl2; ?></p>
                      <?php
                    } else if ($dataajuan["status"]=='TIDAK VALID') {
                      ?>
                      <p class="text-sm text-danger font-weight-bold mb-0"><?php echo $dataajuan["status"]; ?></p>
                      <p class="text-dark text-xs font-weight-bold mb-0"><?php echo $tgl2; ?></p>
                      <?php
                    } else {
                      ?>
                      <p class="text-sm text-danger font-weight-bold mb-0"><?php echo $dataajuan["status"]; ?></p>
                      <p class="text-dark text-xs font-weight-bold mb-0">00-00-0000</p>
                      <?php
                    }
                    ?>
                  </div>
                </div>
                <?php
                if($dataajuan["status"]=='SELESAI' || $dataajuan["status"]=='DI TANGGUHKAN' ||  $dataajuan["status"]=='TIDAK VALID'){
                ?>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-warning text-gradient">text_snippet</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Keterangan</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php echo $dataajuan['komentar']; ?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-primary text-gradient">face</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Admin</h6>
                    <p class="text-dark text-sm text-uppercase font-weight-bold mt-1 mb-0"><?php echo $admn['username']; ?></p>
                  </div>
                </div>
                <?php
                }
                if($dataajuan["status"]=='SELESAI'){
                ?>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-success text-gradient">download</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Aksi</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><a <?php echo "href='../../../docs/validasi/".$idajuan.".pdf'"; ?> target="_blank" class="text-info text-sm icon-move-right">Unduh Dokumen<i class="fas fa-arrow-right text-xs ms-1"></i></a></p>
                  </div>
                </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- footer -->
      <footer class="footer">
        <div class="row">
          <div class="col-lg-12">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              ©
              <script>
              document.write(new Date().getFullYear());
              </script>
              , made with <i class="fa fa-heart text-info"></i> by
              <a href="www.baak.unmuhjember.ac.id" class="link font-weight-bold" target="_blank">Biro Administrasi
                Akademik dan Kemahasiswaan</a>
              for a better services.
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../../../assets/js/core/popper.min.js"></script>
  <script src="../../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
  var win = navigator.platform.indexOf("Win") > -1;
  if (win && document.querySelector("#sidenav-scrollbar")) {
    var options = {
      damping: "0.5",
    };
    Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
  }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>