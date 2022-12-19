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
    <link href="....//assets/css/nucleo-svg.css" rel="stylesheet" />
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
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="../">
          <span class="ms-1 font-weight-bold text-dark">SIPAAK</span>
        </a>
      </div>
      <hr class="horizontal dark mt-0 mb-3" />
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../">
            <div class="text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons text-dark opacity-7">rocket_launch</i>
            </div>
            <span class="nav-link-text text-dark ms-1">Dashboard</span>
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
        <li class="nav-item">
          <a class="nav-link active bg-gradient-info" href=".">
            <div class="text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">group</i>
            </div>
            <span class="nav-link-text ms-1">Pengguna</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pelengkap">
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
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a class="link" href=".">Pengguna</a></li>
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
          <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2 pb-0">
                <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">manage_accounts</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Jumlah Akun Admin</p>
                  <?php
                  $sql = "SELECT *FROM pengguna INNER JOIN akun ON pengguna.idpengguna = akun.idpengguna WHERE akses='ADMIN'";
                  $result = $conn->query($sql);
                  ?>
                  <h4 class="mb-0"><?php print_r($result->num_rows); ?></h4>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                  <table class="table align-items-center my-0">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIP/NPK</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Akun</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT *FROM pengguna INNER JOIN akun ON pengguna.idpengguna = akun.idpengguna WHERE akses='ADMIN'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        $npknim = $row["npknim"];
                        ?>
                        <tr class="text-xs text-dark font-weight-bold">
                          <td  class="text-center"><?php echo $row["npknim"]; ?></td>
                          <td><?php echo $row["nama"]; ?></td>
                          <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0"><?php echo $row["username"]; ?></p>
                            <p class="text-xs text-secondary mb-0">******</p>
                          </td>
                          <td class="text-center text-sm">
                            <a <?php echo "href='edit?id=$npknim'"; ?>><i class="material-icons text-info text-gradient" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">edit</i></a>
                            <a href="#"><i class="material-icons text-danger text-gradient" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">delete</i></a>
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
          </div>
          <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2 pb-0">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-success text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">manage_accounts</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Jumlah Akun Mahasiswa</p>
                  <?php
                  $sql = "SELECT *FROM pengguna INNER JOIN akun ON pengguna.idpengguna = akun.idpengguna WHERE akses='MAHASISWA'";
                  $result = $conn->query($sql);
                  ?>
                  <h4 class="mb-0"><?php print_r($result->num_rows); ?></h4>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                  <table class="table align-items-center my-0">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIM</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Akun</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT *FROM pengguna INNER JOIN akun ON pengguna.idpengguna = akun.idpengguna WHERE akses='MAHASISWA'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $npknim = $row["npknim"];
                        ?>
                        <tr class="text-xs text-dark font-weight-bold">
                          <td  class="text-center"><?php echo $row["npknim"]; ?></td>
                          <td><?php echo $row["nama"]; ?></td>
                          <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0"><?php echo $row["username"]; ?></p>
                            <p class="text-xs text-secondary mb-0">******</p>
                          </td>
                          <td class="text-center text-sm">
                            <a <?php echo "href='edit?id=$npknim'"; ?>><i class="material-icons text-info text-gradient" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">edit</i></a>
                            <a href="#"><i class="material-icons text-danger text-gradient" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">delete</i></a>
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
