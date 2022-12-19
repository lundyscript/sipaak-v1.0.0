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

$sql = "SELECT * FROM pengguna WHERE idpengguna=".$_SESSION['idpengguna']."";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$nim = $data["npknim"];

$qry = "SELECT * FROM akun WHERE idpengguna=".$data['idpengguna']."";
$hasil = $conn->query($qry);
$akun = $hasil->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" type="image/png" href="../../../assets/img/post-it.png" />
  <title>Layanan | SIPAAK | Sistem Informasi Pelayanan Administrasi Akademik Kemahasiswaan | Universitas Muhammadiyah Jember</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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
        <a class="nav-link active bg-gradient-info" href="../../layanan">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a class="link" >Ajuan baru</a></li>
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
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2 pb-0">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end py-3">
                <h4 class="mb-0">Data Mahasiswa</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0" />
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-warning text-gradient">subtitles</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">NIM</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($data['npknim']); ?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-info text-gradient">sentiment_neutral</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Nama Lengkap</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($data['nama']); ?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-primary text-gradient">local_library</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Fakultas</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($data['fakultas']); ?></p>
                  </div>
                </div>
                 <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-warning text-gradient">code</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Program Studi</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($data['prodi']); ?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-danger text-gradient">drafts</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Email</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($data['email']); ?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-success text-gradient">whatsapp</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Nomor Whatsapp</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($data['whatsapp']); ?></p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-primary text-gradient">account_circle</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Username</h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r($akun['username']); ?></p>
                  </div>
                </div>
                <div class="timeline-block">
                  <span class="timeline-step">
                    <i class="material-icons text-dark text-gradient">key</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Password <span class="font-weight-normal">(encrypted)</span></h6>
                    <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r(md5($akun['password'])); ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
          <form autocomplete="off" method="post" enctype="multipart/form-data">
          <div class="card">
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
                  $idlayanan = $_GET['idlayanan'];
                  $sql = "SELECT nama, syarat, info FROM layanan WHERE idlayanan='$idlayanan'";
                  $result = $conn->query($sql);
                  $data = $result->fetch_assoc();
                  $nama = $data['nama'];
                  $info = $data['info'];
                  if(!empty($info)){
                  ?>
                  <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Informasi</h6>
                  <p class="text-sm text-dark font-weight-normal text-justify"><?php echo ucfirst($info); ?>.</p>
                  <?php
                  }
                  ?>
                  <p class="text-sm text-dark font-weight-normal text-justify">Semua dokumen persyaratan <span class="text-capitalize font-weight-bold"><?php echo $nama; ?></span> diunggah dengan ketentuan dokumen berformat <span class="font-weight-bold">PDF</span> dan ukuran file tidak lebih besar dari <span class="font-weight-bold ">500kb</span>.</p>
                  <ol>
                    <?php
                    $syarat = $data["syarat"];
                    $pecah = explode(",",$syarat);
                    if($idlayanan=="1"){
                      for($i = 1; $i <= count($pecah); $i++){
                        if($i==count($pecah)){
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>"/>
                          </div>
                        </li>
                        <?php
                        }else{
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>" required/>
                          </div>
                        </li>
                        <?php
                        }
                      }
                      ?>
                      <li>
                        <div class="input-group input-group-outline">
                          <label class="form-label">Nama Orang Tua</label>
                          <input type="text" class="form-control mb-3" name="namaortu" required/>
                        </div>
                      </li>
                      <li>
                        <div class="input-group input-group-outline">
                          <label class="form-label">Nomor HP Orang Tua</label>
                          <input type="text" class="form-control" name="nomorortu" required/>
                        </div>
                      </li>
                    <?php
                    } else if($idlayanan=="2") {
                      for($i = 1; $i <= count($pecah); $i++){
                        if($i==count($pecah)){
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>"/>
                          </div>
                        </li>
                        <?php
                        }else{
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>" required/>
                          </div>
                        </li>
                        <?php
                        }
                      }
                      ?>
                      <li>
                        <div class="input-group input-group-outline">
                          <label class="form-label">Jenis Perubahan Data (Nama-Tanggal Lahir)</label>
                          <input type="text" class="form-control" name="pdm" required/>
                        </div>
                      </li>
                      <?php
                    } else if($idlayanan=="3") {
                      for($i = 1; $i <= count($pecah); $i++){
                        if($i==count($pecah)){
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>"/>
                          </div>
                        </li>
                        <?php
                        }else{
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>" required/>
                          </div>
                        </li>
                        <?php
                        }
                      }
                      ?>
                      <li>
                        <div class="input-group input-group-outline">
                          <label class="form-label">Angsuran Ke</label>
                          <input type="number" class="form-control mb-3" name="angsuran" required/>
                        </div>
                      </li>
                      <li>
                        <div class="input-group input-group-outline">
                          <label class="form-label">Dibayar (Rp)</label>
                          <input type="text" class="form-control mb-3" id="rupiah-1" name="dibayar" required/>
                        </div>
                      </li>
                      <li>
                        <div class="input-group input-group-outline">
                          <label class="form-label">Sisa (Rp)</label>
                          <input type="text" class="form-control mb-3" id="rupiah-2" name="sisa" required/>
                        </div>
                      </li>
                      <li>
                        <div class="input-group input-group-outline">
                          <label class="form-label">Tanggal Pelunasan</label>
                          <input type="date" class="form-control" name="tanggal" required/>
                        </div>
                      </li>
                      <?php
                    } else if($idlayanan=="4") {
                      for($i = 1; $i <= count($pecah); $i++){
                        if($i==count($pecah)){
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>"/>
                          </div>
                        </li>
                        <?php
                        }else{
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>" required/>
                          </div>
                        </li>
                        <?php
                        }
                      }
                    } else if($idlayanan=="5") {
                      for($i = 1; $i <= count($pecah); $i++){
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>" required/>
                          </div>
                        </li>
                        <?php
                      }
                      ?>
                      <li>Keperluan
                        <div class="form-check my-1 px-0">
                          <input type="radio" name="keperluan" value="Beasiswa" onclick="show1();" id="beasiswa">
                          <label class="custom-control-label my-0" for="beasiswa">Beasiswa</label>&nbsp;
                          <input type="radio" name="keperluan" value="Tunjangan" onclick="show2();" id="tunjangan">
                          <label class="custom-control-label my-0" for="tunjangan">Tunjangan Orang Tua</label>
                        </div>
                        <div class="hide" style="display:none">
                          <hr><p class="text-secondary text-xs font-weight-bold mb-3">Data Orang Tua</p>
                          <ol class="px-0">
                            <li>
                              <div class="input-group input-group-outline">
                                <label class="form-label">Nama Orang Tua</label>
                                <input type="text" class="form-control mb-3" name="namaortu"/>
                              </div>
                            </li>
                            <li>
                              <div class="input-group input-group-outline">
                                <label class="form-label">NIP/NRP/NOPEN</label>
                                <input type="text" class="form-control mb-3" name="nipnrp"/>
                              </div>
                            </li>
                            <li>
                              <div class="input-group input-group-outline">
                                <label class="form-label">Pangkat / Golongan</label>
                                <input type="text" class="form-control mb-3" name="panggol"/>
                              </div>
                            </li>
                            <li>
                              <div class="input-group input-group-outline">
                                <label class="form-label">Instansi / Kantor</label>
                                <input type="text" class="form-control" name="instansi"/>
                              </div>
                            </li>
                          </ol>
                        </div>
                      </li>
                      <?php
                    } else if($idlayanan=="6") {
                      for($i = 1; $i <= count($pecah); $i++){
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>" required/>
                          </div>
                        </li>
                        <?php
                      }
                      ?>
                      <li>
                        <div class="input-group input-group-outline">
                          <label class="form-label">Tanggal Surat Pengantar</label>
                          <input type="date" name="tanggal" class="form-control mb-3" />
                        </div>
                      </li>
                      <li>Cuti Kuliah Pada
                        <div class="form-check my-1 px-0">
                          <input type="radio" name="semester" value="ganjil" id="ganjil">
                          <label class="custom-control-label my-0" for="ganjil">Semester Ganjil</label>&nbsp;
                          <input type="radio" name="semester" value="genap" id="genap">
                          <label class="custom-control-label my-0" for="genap">Semester Genap</label>
                        </div>
                      </li>
                      <?php
                    } else if($idlayanan=="7") {
                      for($i = 1; $i <= count($pecah); $i++){
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>" required/>
                          </div>
                        </li>
                        <?php
                      }
                    } else if($idlayanan=="8") {
                      for($i = 1; $i <= count($pecah); $i++){
                        ?>
                        <li class="text-capitalize"><?php echo $pecah[$i-1]; ?><br />
                          <div class="input-group input-group-outline pb-2">
                            <input class="form-control mb-2" type="file" name="dok-<?php echo $i; ?>" required/>
                          </div>
                        </li>
                        <?php
                      }
                      ?>
                      <li>
                        <div class="input-group input-group-outline">
                          <label class="form-label">Alasan Berhenti Studi Tetap</label>
                          <input type="text" class="form-control" name="alasan" required/>
                        </div>
                      </li>
                      <?php
                    }
                    ?>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card mb-4">
            <div class="card-header p-3 pt-2 pb-0">
              <div class="icon icon-lg icon-shape bg-gradient-secondary shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">settings</i>
              </div>
              <div class="text-end py-3">
                <h4 class="mb-0">Aksi</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0" />
            <div class="card-body p-3">
              <div class="row">
                <div class="col-md-12 text-center">
                  <button type="submit" name="ajukan" class="btn bg-gradient-success mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title=" Ajukan "><i class="material-icons opacity-10">task_alt</i></button>
                  <a class="btn bg-gradient-danger mb-0" href="../" data-bs-toggle="tooltip" data-bs-placement="top" title=" Batal "><i class="material-icons opacity-10">block</i></a>
                </div>
              </div>
            </div>
          </div>
          <?php
          if(isset($_POST['ajukan'])) {
            
            // buat dan cek idajuan
            $karakter = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $idajuan = "";
            for($i = 0; $i < 10; $i ++) {
              $acakkarakter = rand(0,strlen($karakter)-1);
              $idajuan .= substr($karakter,$acakkarakter,1);
            }
            $sql = "SELECT *FROM ajuan WHERE idajuan='$idajuan'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $idajuan = "";
              for($i = 0; $i < 10; $i ++) {
                $acakkarakter = rand(0,strlen($karakter)-1);
                $idajuan .= substr($karakter,$acakkarakter,1);
              }
            } else {
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
              } else if(isset($unggah) || $file=='kosong') {
                $idlayanan = $_GET['idlayanan'];
                if($idlayanan=="1"){
                  $qry = "SELECT *FROM pengguna WHERE idpengguna=".$_SESSION['idpengguna']."";
                  $hasil = $conn->query($qry);
                  $datanim = $hasil->fetch_assoc();
                  $nim = $datanim['npknim'];
                  $status = 'BELUM DI PERIKSA';
                  $tanggal = date("Y-m-d");
                  $update = '0000-00-00';
                  $komentar = '';
                  $admin = '';
                  $tambahan = $_POST['namaortu'].','.$_POST['nomorortu'];

                  $que = "INSERT INTO ajuan VALUES('$idajuan','$idlayanan','$nim','$status','$tanggal','$update','$komentar','$admin','$tambahan')";
                  $tambah = $conn->query($que);
                  ?>
                  <div class="alert alert-success alert-dismissible fade show px-4" role="alert">
                    <div class="row">
                      <div class="col-sm-10"><p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Berhasil!</strong> Data tersimpan!</p></div>
                      <div class="col-sm-2 text-end"><a class="text-white mb-0" href="../" data-bs-toggle="tooltip" data-bs-placement="top" title=" Tutup "><span class="lh-1" aria-hidden="true">&times;</span></a></div>
                    </div>
                  </div>
                  <?php
                } else if($idlayanan=="2"){
                  $qry = "SELECT *FROM pengguna WHERE idpengguna=".$_SESSION['idpengguna']."";
                  $hasil = $conn->query($qry);
                  $datanim = $hasil->fetch_assoc();
                  $nim = $datanim['npknim'];
                  $status = 'BELUM DI PERIKSA';
                  $tanggal = date("Y-m-d");
                  $update = '0000-00-00';
                  $komentar = '';
                  $admin = '';
                  $tambahan = $_POST['pdm'];

                  $que = "INSERT INTO ajuan VALUES('$idajuan','$idlayanan','$nim','$status','$tanggal','$update','$komentar','$admin','$tambahan')";
                  $tambah = $conn->query($que);
                  ?>
                  <div class="alert alert-success alert-dismissible fade show px-4" role="alert">
                    <div class="row">
                      <div class="col-sm-10"><p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Berhasil!</strong> Data tersimpan!</p></div>
                      <div class="col-sm-2 text-end"><a class="text-white mb-0" href="../" data-bs-toggle="tooltip" data-bs-placement="top" title=" Tutup "><span class="lh-1" aria-hidden="true">&times;</span></a></div>
                    </div>
                  </div>
                  <?php
                } else if($idlayanan=="3"){
                  $qry = "SELECT *FROM pengguna WHERE idpengguna=".$_SESSION['idpengguna']."";
                  $hasil = $conn->query($qry);
                  $datanim = $hasil->fetch_assoc();
                  $nim = $datanim['npknim'];
                  $status = 'BELUM DI PERIKSA';
                  $tanggal = date("Y-m-d");
                  $update = '0000-00-00';
                  $komentar = '';
                  $admin = '';
                  $tambahan = $_POST['angsuran'].','.$_POST['dibayar'].','.$_POST['sisa'].','.$_POST['tanggal'];

                  $que = "INSERT INTO ajuan VALUES('$idajuan','$idlayanan','$nim','$status','$tanggal','$update','$komentar','$admin','$tambahan')";
                  $tambah = $conn->query($que);
                  ?>
                  <div class="alert alert-success alert-dismissible fade show px-4" role="alert">
                    <div class="row">
                      <div class="col-sm-10"><p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Berhasil!</strong> Data tersimpan!</p></div>
                      <div class="col-sm-2 text-end"><a class="text-white mb-0" href="../" data-bs-toggle="tooltip" data-bs-placement="top" title=" Tutup "><span class="lh-1" aria-hidden="true">&times;</span></a></div>
                    </div>
                  </div>
                  <?php
                } else if($idlayanan=="4"){
                  $qry = "SELECT *FROM pengguna WHERE idpengguna=".$_SESSION['idpengguna']."";
                  $hasil = $conn->query($qry);
                  $datanim = $hasil->fetch_assoc();
                  $nim = $datanim['npknim'];
                  $status = 'BELUM DI PERIKSA';
                  $tanggal = date("Y-m-d");
                  $update = '0000-00-00';
                  $komentar = '';
                  $admin = '';
                  $tambahan = '';

                  $que = "INSERT INTO ajuan VALUES('$idajuan','$idlayanan','$nim','$status','$tanggal','$update','$komentar','$admin','$tambahan')";
                  $tambah = $conn->query($que);
                  ?>
                  <div class="alert alert-success alert-dismissible fade show px-4" role="alert">
                    <div class="row">
                      <div class="col-sm-10"><p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Berhasil!</strong> Data tersimpan!</p></div>
                      <div class="col-sm-2 text-end"><a class="text-white mb-0" href="../" data-bs-toggle="tooltip" data-bs-placement="top" title=" Tutup "><span class="lh-1" aria-hidden="true">&times;</span></a></div>
                    </div>
                  </div>
                  <?php
                } else if($idlayanan=="5"){
                  $qry = "SELECT *FROM pengguna WHERE idpengguna=".$_SESSION['idpengguna']."";
                  $hasil = $conn->query($qry);
                  $datanim = $hasil->fetch_assoc();
                  $nim = $datanim['npknim'];
                  $status = 'BELUM DI PERIKSA';
                  $tanggal = date("Y-m-d");
                  $update = '0000-00-00';
                  $komentar = '';
                  $admin = '';
                  if($_POST['keperluan']=='Beasiswa'){
                    $tambahan = 'beasiswa';
                  } else {
                    $tambahan = 'tunjangan orang tua,'.$_POST['namaortu'].','.$_POST['nipnrp'].','.$_POST['panggol'].','.$_POST['instansi'];
                  }

                  $que = "INSERT INTO ajuan VALUES('$idajuan','$idlayanan','$nim','$status','$tanggal','$update','$komentar','$admin','$tambahan')";
                  $tambah = $conn->query($que);
                  ?>
                  <div class="alert alert-success alert-dismissible fade show px-4" role="alert">
                    <div class="row">
                      <div class="col-sm-10"><p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Berhasil!</strong> Data tersimpan!</p></div>
                      <div class="col-sm-2 text-end"><a class="text-white mb-0" href="../" data-bs-toggle="tooltip" data-bs-placement="top" title=" Tutup "><span class="lh-1" aria-hidden="true">&times;</span></a></div>
                    </div>
                  </div>
                  <?php
                } else if($idlayanan=="6"){
                  $qry = "SELECT *FROM pengguna WHERE idpengguna=".$_SESSION['idpengguna']."";
                  $hasil = $conn->query($qry);
                  $datanim = $hasil->fetch_assoc();
                  $nim = $datanim['npknim'];
                  $status = 'BELUM DI PERIKSA';
                  $tanggal = date("Y-m-d");
                  $update = '0000-00-00';
                  $komentar = '';
                  $admin = '';
                  $tambahan = $_POST['tanggal'].','.$_POST['semester'];

                  $que = "INSERT INTO ajuan VALUES('$idajuan','$idlayanan','$nim','$status','$tanggal','$update','$komentar','$admin','$tambahan')";
                  $tambah = $conn->query($que);
                  ?>
                  <div class="alert alert-success alert-dismissible fade show px-4" role="alert">
                    <div class="row">
                      <div class="col-sm-10"><p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Berhasil!</strong> Data tersimpan!</p></div>
                      <div class="col-sm-2 text-end"><a class="text-white mb-0" href="../" data-bs-toggle="tooltip" data-bs-placement="top" title=" Tutup "><span class="lh-1" aria-hidden="true">&times;</span></a></div>
                    </div>
                  </div>
                  <?php
                } else if($idlayanan=="7"){
                  $qry = "SELECT *FROM pengguna WHERE idpengguna=".$_SESSION['idpengguna']."";
                  $hasil = $conn->query($qry);
                  $datanim = $hasil->fetch_assoc();
                  $nim = $datanim['npknim'];
                  $status = 'BELUM DI PERIKSA';
                  $tanggal = date("Y-m-d");
                  $update = '0000-00-00';
                  $komentar = '';
                  $admin = '';
                  $tambahan = '';

                  $que = "INSERT INTO ajuan VALUES('$idajuan','$idlayanan','$nim','$status','$tanggal','$update','$komentar','$admin','$tambahan')";
                  $tambah = $conn->query($que);
                  ?>
                  <div class="alert alert-success alert-dismissible fade show px-4" role="alert">
                    <div class="row">
                      <div class="col-sm-10"><p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Berhasil!</strong> Data tersimpan!</p></div>
                      <div class="col-sm-2 text-end"><a class="text-white mb-0" href="../" data-bs-toggle="tooltip" data-bs-placement="top" title=" Tutup "><span class="lh-1" aria-hidden="true">&times;</span></a></div>
                    </div>
                  </div>
                  <?php
                } else if($idlayanan=="8"){
                  $qry = "SELECT *FROM pengguna WHERE idpengguna=".$_SESSION['idpengguna']."";
                  $hasil = $conn->query($qry);
                  $datanim = $hasil->fetch_assoc();
                  $nim = $datanim['npknim'];
                  $status = 'BELUM DI PERIKSA';
                  $tanggal = date("Y-m-d");
                  $update = '0000-00-00';
                  $komentar = '';
                  $admin = '';
                  $tambahan = $_POST['alasan'];

                  $que = "INSERT INTO ajuan VALUES('$idajuan','$idlayanan','$nim','$status','$tanggal','$update','$komentar','$admin','$tambahan')";
                  $tambah = $conn->query($que);
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
            }
          }
          ?>
          </form>
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
  <script type="text/javascript">
    function show1(){
      x = document.getElementsByClassName('hide');
      x[0].style.display ='none';
    }
    function show2(){
      x = document.getElementsByClassName('hide');
      x[0].style.display ='block';
    }
  </script>
  <script>
    var rupiah1 = document.getElementById("rupiah-1");
    rupiah1.addEventListener("keyup", function(e) {
     rupiah1.value = formatRupiah(this.value, "Rp. ");
    });
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah1 = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah1 += separator + ribuan.join(".");
      }
      rupiah1 = split[1] != undefined ? rupiah1 + "," + split[1] : rupiah1;
      return prefix == undefined ? rupiah1 : rupiah1 ? "Rp. " + rupiah1 : "";
    }
    var rupiah2 = document.getElementById("rupiah-2");
    rupiah2.addEventListener("keyup", function(e) {
     rupiah2.value = formatRupiah(this.value, "Rp. ");
    });
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah2 = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah2 += separator + ribuan.join(".");
      }
      rupiah2 = split[1] != undefined ? rupiah2 + "," + split[1] : rupiah2;
      return prefix == undefined ? rupiah2 : rupiah2 ? "Rp. " + rupiah2 : "";
    }
  </script>
</body>

</html>