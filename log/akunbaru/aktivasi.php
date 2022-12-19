<!--=========================================================
Copyright 2021
1. Creative Tim (https://www.creative-tim.com)
2. Freepik (https://www.freepik.com)
3. Flaticon (https://www.flaticon.com/)
=============================================================-->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image/png" href="../../assets/img/post-it.png" />
    <title>SIPAAK | Sistem Informasi Pelayanan Administrasi Akademik Kemahasiswaan | Universitas Muhammadiyah Jember</title>
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
    <link id="pagestyle" href="../../assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
  </head>

  <body>
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-expand-lg blur border-radius-xl mt-4 top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="container-fluid px-0">
              <a class="navbar-brand font-weight-bolder ms-sm-3" href="../../"> SIPAAK </a>
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
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="../../#welcome">
                      <i class="material-icons opacity-6 me-2 text-md">rocket_launch</i>
                      Beranda
                    </a>
                  </li>
                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="../../#layanan">
                      <i class="material-icons opacity-6 me-2 text-md">wysiwyg</i>
                      Layanan
                    </a>
                  </li>
                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="../../#status">
                      <i class="material-icons opacity-6 me-2 text-md">find_in_page</i>
                      Status Ajuan
                    </a>
                  </li>
                  <li class="nav-item ms-lg-auto">
                    <a class="nav-link nav-link-icon me-2" href="../in/">
                      <i class="fas fa-key"></i>
                      <p class="d-inline text-sm z-index-1 font-weight-bold" href="../in/">Masuk</p>
                    </a>
                  </li>
                  <li class="nav-item my-auto ms-3 ms-lg-0">
                    <a class="btn btn-sm bg-gradient-info mb-0 me-1 mt-2 mt-md-0" href=".">Buat Akun</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>

    <section id="login">
      <div class="container">
        <div class="row pt-8 pb-6">
          <div class="col-lg-5 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Pendaftaran Akun Baru</h4>
                  <div class="row mt-3 mx-4">
                    <p class="text-center text-white font-weight-small mb-4">Sistem Informasi Pelayanan <br />Administrasi Akademik Kemahasiswaan<br />Universitas Muhammadiyah Jember</p>
                  </div>
                </div>
              </div>
              <div class="card-body px-3 text-left">
                <form autocomplete="off" role="form" class="text-start" method="post">
                <?php
                $email = $_GET['email'];
                $hash = $_GET['hash'];
                include "../../pages/koneksi.php";
                $queryu = "UPDATE akun SET aktif='1' WHERE email='$email' AND hash='$hash'";
                $update = $conn->query($queryu);
                if(isset($update)){
                  ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Berhasil!</strong> Akun sudah aktif, silahkan login!</p>
                    <button type="submit" name="btnclose" class="btn-close lh-1 " data-bs-dismiss="alert" aria-label="Close"><span class="lh-1" aria-hidden="true">&times;</span></button>
                  </div>
                  <?php
                }else{
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_down</i> <strong>Gagal!</strong> Akun belum aktif!</p>
                    <button type="submit" name="btnclose" class="btn-close lh-1 " data-bs-dismiss="alert" aria-label="Close"><span class="lh-1" aria-hidden="true">&times;</span></button>
                  </div>
                  <?php
                }
                if(isset($_POST['btnclose'])){
                  $queryd = "DELETE FROM pengaman";
                  $delete = $conn->query($queryd);
                  echo "<script>window.location.href='../in/'</script>";
                }
                ?>
                </form>
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
    <script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="../../assets/js/plugins/parallax.min.js"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="../../assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>
  </body>
</html>