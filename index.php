<!--=========================================================
Copyright 2021
1. Creative Tim (https://www.creative-tim.com)
2. Freepik (https://www.freepik.com)
3. Flaticon (https://www.flaticon.com/)
=========================================================-->
<?php
include "pages/koneksi.php";
// ubah status layanan otomatis jika melebihi tanggal batas akhir
date_default_timezone_set('Asia/Jakarta');
$tglskrg = date("Y-m-d");
$sql = "SELECT *FROM layanan";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $batas = $row['tanggal'];
    $idlayanan = $row['idlayanan'];
    if($batas<$tglskrg){
      $query = "UPDATE layanan SET status='TUTUP' WHERE idlayanan='$idlayanan'";
      $hasil = $conn->query($query);
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image/png" href="assets/img/post-it.png" />
    <title>SIPAAK | Sistem Informasi Pelayanan Administrasi Akademik Kemahasiswaan | Universitas Muhammadiyah Jember</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
  </head>

  <body>
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-expand-lg blur border-radius-xl mt-4 top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="container-fluid px-0">
              <a class="navbar-brand font-weight-bolder ms-sm-3" href="#"> SIPAAK </a>
              <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </span>
              </button>
              <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ms-auto">
                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="#welcome">
                      <i class="material-icons opacity-6 me-2">rocket_launch</i>
                      Beranda
                    </a>
                  </li>
                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="#layanan">
                      <i class="material-icons opacity-6 me-2">wysiwyg</i>
                      Layanan
                    </a>
                  </li>
                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="#status">
                      <i class="material-icons opacity-6 me-2">find_in_page</i>
                      Status Ajuan
                    </a>
                  </li>
                  <li class="nav-item ms-lg-auto">
                    <a class="nav-link nav-link-icon me-2" href="log/in/">
                      <i class="fas fa-key"></i>
                      <p class="d-inline text-sm z-index-1 font-weight-bold" href="log/in/">Masuk</p>
                    </a>
                  </li>
                  <li class="nav-item my-auto ms-3 ms-lg-0">
                    <a class="btn btn-sm bg-gradient-info mb-0 me-1 mt-2 mt-md-0" href="log/akunbaru">Buat Akun</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>

    <!-- welcome -->
    <section id="welcome" class="py-7">
      <div class="container">
        <div class="row">
          <div class="col-md-6 py-7">
            <h1>Sistem Informasi Pelayanan Administrasi Akademik Kemahasiswaan</h1>
            <p class="mb-4 text-dark font-weight-normal">Selamat Datang di Layanan Online Biro Administrasi Akademik dan Kemahasiswaan (BAAK) Universitas Muhammadiyah Jember</p>
            <div class="row">
              <div class="col-8">
                <!-- <button type="button" class="btn bg-gradient-info mb-0 h-100 position-relative z-index-2">BUAT AKUN</button> -->
                <a class="btn bg-gradient-info mb-0 h-100 position-relative z-index-2" href="log/akunbaru">Buat Akun</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="">
              <img src="assets/img/img1.png" width="100%" alt="image" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- layanan -->
    <section id="layanan" class="py-7">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3>Layanan</h3>
            <p class="mb-4 text-dark font-weight-normal">Dengan menggunakan Aplikasi SIPAAK, mahasiswa dapat dengan mudah mengajukan beberapa layanan berikut ini secara online.</p>
          </div>
        </div>
        <div class="row pb-4">
          <?php
          $sql = "SELECT *FROM layanan ORDER BY idlayanan";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $no = $row['idlayanan'];
              $tgl = date("d-m-Y", strtotime($row['tanggal']));
              ?>
              <div class="col-lg-3 col-sm-6 py-2">
                <div class="card card-frame">
                  <div class="card-body px-4 py-4">
                    <div class="py-2"><img src="assets/img/<?php echo $no.".png"; ?>" class="avatar-sm me-3" alt="atlassian" /></div>
                    <h5><?php echo $row['nama']; ?></h5>
                    <p class="text-sm my-0"><?php echo $row['deskripsi']; ?></p>
                    <?php
                    if($row['status']=="BUKA"){
                    ?>
                    <p class="text-sm font-weight-bold text-dark my-0"><span class="text-success"><?php echo $row['status'];?></span><?php echo " s.d. ".$tgl; ?></p>
                    <?php
                    }else{
                    ?>
                    <p class="text-sm font-weight-bold text-dark my-0"><span class="text-danger"><?php echo $row['status'];?></span></p>
                    <?php
                    }
                    ?>
                    <hr/>
                    <a href="services/?idlayanan=<?php echo $no; ?>" class="text-info text-sm icon-move-right">Persyaratan<i class="fas fa-arrow-right text-xs ms-1"></i></a>
                  </div>
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
    </section>

    <!-- status -->
    <section id="status" class="py-7">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="assets/img/img2.png" width="100%" alt="" />
          </div>
          <div class="col-md-6">
            <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-info shadow-info border-radius-lg p-3">
                  <h3 class="text-white text-primary mb-0">Status Ajuan</h3>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" method="post">
                  <div class="card-body p-0 my-3">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="input-group input-group-outline mb-4">
                          <label class="form-label">Masukkan Nomor Pengajuan</label>
                          <input type="text" class="form-control" name="idajuan" required/>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn bg-gradient-info mb-0" name="cekstatus">Cek Status</button>
                      </div>
                    </div>
                  </div>
                </form>
                <?php
                  if(isset ($_POST['cekstatus'])){
                    $idajuan = $_POST['idajuan'];
                    $sql = "SELECT *FROM ajuan WHERE idajuan='$idajuan'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        $lyn = "SELECT * FROM layanan WHERE idlayanan=".$row["idlayanan"]."";
                        $hasil = $conn->query($lyn);
                        $data = $hasil->fetch_assoc();
                        $namalayanan = $data["nama"];
                        $nim = $row['nim'];
                        $tgl1 = $row['tanggal'];
                        $tgl2 = $row['update'];
                        $tgl1 = date("d-m-Y", strtotime($tgl1));
                        $tgl2 = date("d-m-Y", strtotime($tgl2));
                        $status = $row['status'];
                      }
                    ?>
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th colspan="3">
                            <p class="text-center text-uppercase text-dark text-sm font-weight-bolder mb-0 py-0""><?php echo $idajuan." - ".$namalayanan; ?></p>
                          </th>
                        </tr>
                        <tr>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIM</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Ajuan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Ajuan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-xs text-center text-dark font-weight-bold">
                          <td><?php echo $nim ?></td>
                          <td><?php echo $tgl1 ?></td>
                          <td>
                            <?php
                            if($status=='SELESAI'){
                            ?>
                            <p class="text-xs text-success font-weight-bold mb-0"><?php echo $status; ?></p>
                            <p class="text-secondary text-xs font-weight-bold mb-0"><?php echo $tgl2; ?></p>
                            <?php
                            } else if ($status=='DI TANGGUHKAN' || $status=='PROSES VALIDASI') {
                            ?>
                            <p class="text-xs text-warning font-weight-bold mb-0"><?php echo $status; ?></p>
                            <p class="text-secondary text-xs font-weight-bold mb-0"><?php echo $tgl2; ?></p>
                            <?php
                            } else if ($status=='TIDAK VALID') {
                            ?>
                            <p class="text-xs text-danger font-weight-bold mb-0"><?php echo $status; ?></p>
                            <p class="text-secondary text-xs font-weight-bold mb-0"><?php echo $tgl2; ?></p>
                            <?php
                            } else {
                            ?>
                            <p class="text-xs text-danger font-weight-bold mb-0"><?php echo $status; ?></p>
                            <p class="text-secondary text-xs font-weight-bold mb-0">00-00-0000</p>
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <?php
                    } else {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Gagal!</strong> Data tidak ditemukan!</p>
                      <button type="submit" name="btnclose" class="btn-close lh-1 " data-bs-dismiss="alert" aria-label="Close"><span class="lh-1" aria-hidden="true">&times;</span></button>
                    </div>
                    <?php
                    }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- footer -->
    <footer class="footer pt-5 mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-2 ms-auto">
            <div>
              <h6 class="font-weight-bolder">SIPAAK</h6>
              <p class="text-dark text-sm font-weight-normal">Sistem Informasi Pelayanan Administrasi Akademik Kemahasiswaan</p>
            </div>
          </div>
          <div class="col-md-4 mb-2">
            <div>
              <h6 class="text-sm">Company</h6>
              <ul class="flex-column ms-n3 nav">
                <li class="nav-item">
                  <a class="nav-link" href="www.baak.unmuhjember.ac.id" target="_blank"> Biro Administrasi Akademik dan Kemahasiswaan </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="unmuhjember.ac.id" target="_blank"> Universitas Muhammadiyah Jember </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 mb-2 ms-auto">
            <div>
              <h6 class="font-weight-bolder">Hubungi Kami Melalui Whatsapp</h6>
            </div>
            <div>
              <ul class="d-flex flex-row ms-n3 nav">
                <li class="nav-item">
                  <a class="nav-link pe-1" href="#" target="_blank">
                    <i class="fab fa-whatsapp text-lg text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="ADMIN 1"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pe-1" href="#" target="_blank">
                    <i class="fab fa-whatsapp text-lg text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="ADMIN 2"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pe-1" href="#" target="_blank">
                    <i class="fab fa-whatsapp text-lg text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="ADMIN 3"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pe-1" href="#" target="_blank">
                    <i class="fab fa-whatsapp text-lg text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="ADMIN 4"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-12">
            <div class="text-center">
              <p class="text-dark my-4 text-sm font-weight-normal">All rights reserved. Copyright © 2021</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="assets/js/plugins/parallax.min.js"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>
  </body>
</html>
