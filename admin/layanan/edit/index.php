<!--=========================================================
Copyright 2021
1. Creative Tim (https://www.creative-tim.com)
2. Freepik (https://www.freepik.com)
3. Flaticon (https://www.flaticon.com/)
==========================================================-->
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
$idlayanan = $_GET['idlayanan'];
$sql = "SELECT * FROM layanan WHERE idlayanan=".$idlayanan."";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image/png" href="../../../assets/img/post-it.png" />
    <title>Dashboard | SIPAAK | Sistem Informasi Pelayanan Administrasi Akademik Kemahasiswaan | Universitas Muhammadiyah Jember</title>
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
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="../../">
          <span class="ms-1 font-weight-bold text-dark">SIPAAK</span>
        </a>
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
        <li class="nav-item">
          <a class="nav-link" href="../../pengguna">
            <div class="text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons text-dark opacity-7">group</i>
            </div>
            <span class="nav-link-text text-dark ms-1">Pengguna</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../pelengkap">
            <div class="text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons text-dark opacity-7">extension</i>
            </div>
            <span class="nav-link-text text-dark ms-1">Pelengkap</span>
          </a>
        </li>
      </ul>
      <div class="sidenav-footer position-absolute w-100 bottom-0 mb-3">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link logout" href="../../log/out">
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
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a class="link" >Edit Layanan</a></li>
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
        <form autocomplete="off" method="post">
        <div class="row mb-4">
          <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card h-100">
              <div class="card-header p-3 pt-2 pb-0">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">edit</i>
                </div>
                <div class="text-end py-3">
                  <h4 class="mb-0">Ubah Layanan</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0" />
              <div class="card-body py-4">
                <div class="timeline timeline-one-side">
                  <div class="timeline-block mb-3">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-info text-gradient">sentiment_neutral</i>
                    </span>
                    <div class="timeline-content">
                      <div class="input-group input-group-outline">
                        <label class="form-label"><?php echo $data['nama']; ?></label>
                        <input type="text" class="form-control mb-2" disabled />
                      </div>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-primary text-gradient">local_library</i>
                    </span>
                    <div class="timeline-content">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control mb-2" />
                      </div>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-warning text-gradient">lightbulb</i>
                    </span>
                    <div class="timeline-content">
                      <div class="input-group input-group-outline">
                        <select name="status" class="form-control form-select mb-2">
                          <option value="">Status</option>
                          <option value="BUKA">BUKA</option>
                          <option value="TUTUP">TUTUP</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-danger text-gradient">date_range</i>
                    </span>
                    <div class="timeline-content">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Batas Akhir Layanan</label>
                        <input type="date" name="tanggal" class="form-control mb-2" />
                      </div>
                    </div>
                  </div>
                  <div class="timeline-block">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-success text-gradient">account_circle</i>
                    </span>
                    <div class="timeline-content">
                      <div class="form-check px-0 py-0">
                        <input class="form-check-input text-success" type="checkbox" name="admin[]" value="1">
                        <label class="form-check-label text-uppercase">LUNDY</label>
                      </div>
                      <div class="form-check px-0 py-0">
                        <input class="form-check-input text-success" type="checkbox" name="admin[]" value="2">
                        <label class="form-check-label text-uppercase">RAHMA</label>
                      </div>
                      <div class="form-check px-0 py-0">
                        <input class="form-check-input text-success" type="checkbox" name="admin[]" value="3">
                        <label class="form-check-label text-uppercase">ANITA</label>
                      </div>
                      <div class="form-check px-0 py-0">
                        <input class="form-check-input text-success" type="checkbox" name="admin[]" value="4">
                        <label class="form-check-label text-uppercase">INTAN</label>
                      </div>
                      <div class="form-check px-0 py-0">
                        <input class="form-check-input text-success" type="checkbox" name="admin[]" value="5">
                        <label class="form-check-label text-uppercase">LAILI</label>
                      </div>
                      <div class="form-check px-0 py-0">
                        <input class="form-check-input text-success" type="checkbox" name="admin[]" value="6">
                        <label class="form-check-label text-uppercase">WANDA</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
            <div class="card h-100">
              <div class="card-header p-3 pt-2 pb-0">
                <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">edit_note</i>
                </div>
                <div class="text-end py-3">
                  <h4 class="mb-0">Ubah Persyaratan</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0" />
              <div class="card-body py-4">
                <div class="input-group input-group-outline">
                  <textarea name="syarat" class="form-control" rows="13" placeholder="Tulis persyaratan dengan format : syarat nomor satu, syarat nomor dua, syarat nomor tiga" spellcheck="false"></textarea>
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
                    <button type="submit" name="simpan" class="btn bg-gradient-success mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title=" Simpan "><i class="material-icons opacity-10">task_alt</i></button>
                    <button type="submit" name="batal" class="btn bg-gradient-danger mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title=" Batal "><i class="material-icons opacity-10">block</i></button>
                  </div>
                </div>
              </div>
            </div>
            <?php
                if(isset($_POST['simpan'])){
                  if(empty($_POST['deskripsi'])){
                    $deskripsi = $data['deskripsi'];
                  }else{
                    $deskripsi = ucwords($_POST['deskripsi']);
                  }
                  if(empty($_POST['status'])){
                    $status = $data['status'];
                  }else{
                    $status = strtoupper($_POST['status']);
                  }
                  if(empty($_POST['tanggal'])){
                    $tanggal = $data['tanggal'];
                  }else{
                    $tanggal = $_POST['tanggal'];
                  }
                  if(empty($_POST['admin'])){
                    $admin = $data['admin'];
                  }else{
                    $admin = $_POST['admin'];
                    $admin = implode(",",$admin);
                  }
                  if(empty($_POST['syarat'])){
                    $syarat = $data['syarat'];
                  }else{
                    $syarat = $_POST['syarat'];
                  }
                  $query1 = "UPDATE layanan SET deskripsi='$deskripsi', status='$status', tanggal='$tanggal', admin='$admin', syarat='$syarat' WHERE idlayanan='$idlayanan'";
                  $hasil1 = $conn->query($query1);
                  if($hasil1){
                  ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Berhasil!</strong> Data tersimpan!</p>
                    <button type="submit" name="btnclose" class="btn-close lh-1 " data-bs-dismiss="alert" aria-label="Close" ><span class="lh-1" aria-hidden="true">&times;</span></button>
                  </div>
                  <?php
                  }else{
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Gagal!</strong> Data tidak tersimpan!</p>
                    <button type="submit" name="btnclose" class="btn-close lh-1 " data-bs-dismiss="alert" aria-label="Close"><span class="lh-1" aria-hidden="true">&times;</span></button>
                  </div>
                  <?php
                  }
                }
                if(isset($_POST['batal']) || isset($_POST['btnclose'])){
                  echo "<script>window.location.href='../../layanan'</script>";
                }
                ?>
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
                <a href="www.baak.unmuhjember.ac.id" class="link font-weight-bold" target="_blank">Biro Administrasi Akademik dan Kemahasiswaan</a>
                for a better services.
              </div>
            </div>
          </div>
        </footer>
        </form>
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
