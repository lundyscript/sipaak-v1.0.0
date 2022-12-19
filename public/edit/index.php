<!--=========================================================
Copyright 2021
1. Creative Tim (https://www.creative-tim.com)
2. Freepik (https://www.freepik.com)
3. Flaticon (https://www.flaticon.com/)
 =========================================================-->
<?php
session_start();
include "../../pages/koneksi.php";
if(!isset($_SESSION['idakun'])){
    echo "<script>alert('Anda belum login!!')</script>";
    echo "<script>window.location.href='../../'</script>";
}
if(time() - $_SESSION['timestamp'] > 600) { //subtract new timestamp from the old one
    echo "<script>alert('Sesi login anda telah habis! Silahkan login kembali!');</script>";
    echo "<script>window.location.href='../../'</script>";
    exit;
} else {
    $_SESSION['timestamp'] = time(); //set new timestamp
}
$nim = $_GET['nim'];
$sql = "SELECT * FROM pengguna WHERE npknim=".$nim."";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$idpengguna = $data['idpengguna'];

$qry = "SELECT * FROM akun WHERE idpengguna=".$idpengguna."";
$hasil = $conn->query($qry);
$akun = $hasil->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" type="image/png" href="../../assets/img/post-it.png" />
  <title>Dashboard | SIPAAK | Sistem Informasi Pelayanan Administrasi Akademik Kemahasiswaan | Universitas Muhammadiyah Jember</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show">
  <!-- sidebar -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
    <div class="sidenav-header"><i class="fas fa-times p-3 cursor-pointer opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="../"><span class="ms-1 font-weight-bold text-dark">SIPAAK</span></a>
    </div>
    <hr class="horizontal dark mt-0 mb-3" />
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active bg-gradient-info" href="../../public">
          <div class="text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">rocket_launch</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../layanan">
          <div class="text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons text-dark opacity-7">description</i>
          </div>
          <span class="nav-link-text text-dark ms-1">Layanan</span>
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
            <li class="breadcrumb-item text-sm" aria-current="page"><a class="link opacity-7" href="../">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a class="link" >Edit Pengguna</a></li>
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
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-success text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end py-3">
                  <h4 class="mb-0">Informasi Profil Lama</h4>
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
                      <h6 class="text-secondary text-xs font-weight-bold mt-1 mb-0">Password <span
                          class="font-weight-normal">(encrypted)</span></h6>
                      <p class="text-dark text-sm font-weight-bold mt-1 mb-0"><?php print_r(md5($akun['password'])); ?>
                      </p>
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
                  <i class="material-icons opacity-10">edit</i>
                </div>
                <div class="text-end py-3">
                  <h4 class="mb-0">Informasi Profil Baru</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0" />
              <div class="card-body py-4">
                <div class="timeline timeline-one-side">
                  <div class="timeline-block mb-3">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-warning text-gradient">subtitles</i>
                    </span>
                    <div class="timeline-content">
                      <div class="input-group input-group-outline">
                        <label class="form-label"><?php print_r($data['npknim']); ?></label>
                        <input type="text" name="npk" class="form-control mb-2" disabled />
                      </div>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-info text-gradient">sentiment_neutral</i>
                    </span>
                    <div class="timeline-content">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="namalengkap" class="form-control mb-2" />
                      </div>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-primary text-gradient">code</i>
                    </span>
                    <div class="timeline-content">
                      <div class="input-group input-group-outline">
                          <select class="form-control mb-2" name="prodi">
                            <option>Program Studi</option>
                            <?php
                            include "../../pages/koneksi.php";
                            $sql = "SELECT *FROM prodi ORDER BY namaprodi";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['namaprodi']; ?>"><?php echo $row['namaprodi']; ?></option>
                                <?php
                              }
                            }
                            ?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-danger text-gradient">drafts</i>
                    </span>
                    <div class="timeline-content">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control mb-2" />
                      </div>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-success text-gradient">whatsapp</i>
                    </span>
                    <div class="timeline-content">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Whatsapp</label>
                        <input type="text" name="whatsapp" class="form-control mb-2" />
                      </div>
                    </div>
                  </div>
                  <div class="timeline-block mb-3">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-primary text-gradient">account_circle</i>
                    </span>
                    <div class="timeline-content">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control mb-2" />
                      </div>
                    </div>
                  </div>
                  <div class="timeline-block">
                    <span class="timeline-step mt-2">
                      <i class="material-icons text-dark text-gradient">key</i>
                    </span>
                    <div class="timeline-content">
                      <div class="input-group input-group-outline">
                        <label class="form-label">Password</label>
                        <input type="text" name="password" class="form-control mb-2" />
                      </div>
                    </div>
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
                    <button type="submit" name="simpan" class="btn bg-gradient-success mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title=" Simpan "><i class="material-icons opacity-10">task_alt</i></button>
                    <button type="submit" name="batal" class="btn bg-gradient-danger mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title=" Batal "><i class="material-icons opacity-10">block</i></button>
                  </div>
                </div>
              </div>
            </div>
            <?php
            if(isset($_POST['simpan'])){
              if(empty($_POST['namalengkap'])){
                $namalengkap = $data['nama'];
              }else{
                $namalengkap = strtoupper($_POST['namalengkap']);
              }
              if(empty($_POST['prodi'])){
                $prodi = $data['prodi'];
              }else{
                $prodi = $_POST['prodi'];
              }
              $sqlfak = "SELECT *FROM prodi WHERE namaprodi='$prodi'";
              $dftrfak = $conn->query($sqlfak);
              $fak = $dftrfak->fetch_assoc();
              $fakultas = $fak['fakultas'];
              if(empty($_POST['email'])){
                $email = $data['email'];
              }else{
                $email = $_POST['email'];
              }
              if(empty($_POST['whatsapp'])){
                $whatsapp = $data['whatsapp'];
              }else{
                $whatsapp = $_POST['whatsapp'];
              }
              if(empty($_POST['username'])){
                $username = $akun['username'];
              }else{
                $username = $_POST['username'];
              }
              if(empty($_POST['password'])){
                $password = $akun['password'];
              }else{
                $password = md5($_POST['password']);
              }
              $query1 = "UPDATE pengguna SET nama='$namalengkap', fakultas='$fakultas', prodi='$prodi', email='$email', whatsapp='$whatsapp' WHERE idpengguna='$idpengguna'";
              $hasil1 = $conn->query($query1);
              $query2 = "UPDATE akun SET username='$username', password='$password' WHERE idpengguna='$idpengguna'";
              $hasil2 = $conn->query($query2);
              if($hasil1 && $hasil2){
              ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i>
                <strong>Berhasil!</strong> Data tersimpan!
              </p>
              <button type="submit" name="btnclose" class="btn-close lh-1 " data-bs-dismiss="alert" aria-label="Close"><span class="lh-1" aria-hidden="true">&times;</span></button>
            </div>
            <?php
              }else{
              ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i>
                <strong>Gagal!</strong> Data tidak tersimpan!
              </p>
              <button type="submit" name="btnclose" class="btn-close lh-1 " data-bs-dismiss="alert"
                aria-label="Close"><span class="lh-1" aria-hidden="true">&times;</span></button>
            </div>
            <?php
              }
            }
            if(isset($_POST['batal']) || isset($_POST['btnclose'])){
              echo "<script>window.location.href='../'</script>";
            }
            ?>
          </div>
        </div>
      </form>

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
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="../../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>