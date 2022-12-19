<!--=========================================================
Copyright 2021
1. Creative Tim (https://www.creative-tim.com)
2. Freepik (https://www.freepik.com)
3. Flaticon (https://www.flaticon.com/)
=============================================================-->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Include librari phpmailer
include('../../phpmailer/Exception.php');
include('../../phpmailer/PHPMailer.php');
include('../../phpmailer/SMTP.php');
include "../../pages/koneksi.php";
?>
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
    <!-- Google reCAPTCHA CDN -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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

    <section id="akunbaru">
      <div class="container text-center">
        <div class="row pt-8 pb-6">
          <div class="col-lg-5 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Pendaftaran Akun Baru</h4>
                  <div class="row mt-3 mx-4">
                    <p class="text-white font-weight-small mb-4">Sistem Informasi Pelayanan <br />Administrasi Akademik Kemahasiswaan<br />Universitas Muhammadiyah Jember</p>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form autocomplete="off" role="form" class="text-start" method="post">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">NIM</label>
                    <input type="number" name="nim" class="form-control" required/>
                  </div>
                  <div class="input-group input-group-outline">
                      <select class="form-control mb-2" name="prodi" required>
                        <option value="">Program Studi</option>
                        <?php
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
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required/>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required/>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Nomor Whatsapp</label>
                    <input type="number" name="whatsapp" class="form-control" required/>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Kata Sandi</label>
                    <input type="password" name="katasandi" class="form-control" required/>
                  </div>
                  <center><div class="g-recaptcha" data-sitekey="6Ld6uSYeAAAAALcMpsgQ9pL2cX4JgJmW4Qrc_dcB"></div></center>
                  <div class="text-center">
                    <button type="submit" name="buatakun" class="btn bg-gradient-info w-100 my-2 mb-2">BUAT AKUN</button>
                  </div>
                  <p class="mt-4 text-sm text-center">Sudah memiliki akun? <a href="../in" class="text-info text-gradient font-weight-bold">Masuk</a></p>
                <?php
                if(isset ($_POST['buatakun'])){
                  $secret_key = "6Ld6uSYeAAAAAAZgqadRxaJVz7SAccXj_pSd8fVt";
                  $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
                  $response = json_decode($verify);
                  if($response->success){
                    $nim = $_POST['nim'];
                    $prodi = $_POST['prodi'];
                    $sqlfak = "SELECT *FROM prodi WHERE namaprodi='$prodi'";
                    $dftrfak = $conn->query($sqlfak);
                    $fak = $dftrfak->fetch_assoc();
                    $fakultas = $fak['fakultas'];
                    
                    $nama = strtoupper($_POST['nama']);
                    $email = $_POST['email'];
                    $whatsapp = $_POST['whatsapp'];
                    $options = ['cost' => 10];
                    $katasandi= password_hash($_POST['katasandi'],PASSWORD_DEFAULT, $options);
                    $pass = $_POST['katasandi'];

                    $email_pengirim = 'baak@unmuhjember.ac.id';
                    $nama_pengirim = 'Biro Administrasi Akademik dan Kemahasiswaan';
                    $email_penerima = $_POST['email'];;
                    $hash = md5( rand(0,1000) );
                    $subjek = 'Aktivasi Akun SIPAAK';
                    $pesan = "
                    <p>Terima Kasih telah mendaftar di Sistem Informasi Administrasi Akademik dan Kemahasiswaan (SIPAAK) Universitas Muhammadiyah Jember!
                    Akun Anda telah dibuat, Anda dapat masuk dengan informasi akun berikut setelah Anda mengaktifkan akun Anda dengan menekan tautan / link di bawah ini.</p>
                    <table>
                      <tr>
                        <td colspan='3'><hr/></td>
                      </tr>
                      <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td>$nim</td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>$pass</td>
                      </tr>
                      <tr>
                        <td colspan='3'><hr/></td>
                      </tr>
                    </table>
                    <p>Silakan klik tautan ini untuk mengaktifkan akun Anda : <a href='localhost/sipaak/log/akunbaru/aktivasi.php?email=".$email_penerima."&hash=".$hash."'>AKTIFKAN AKUN</a></p>
                    ";
                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Username = $email_pengirim;
                    $mail->Password = 'baakumj49!';
                    $mail->Port = 465;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'ssl';
                    // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
                    $mail->setFrom($email_pengirim, $nama_pengirim);
                    $mail->addAddress($email_penerima, '');
                    $mail->isHTML(true);
                    $mail->Subject = $subjek;
                    $mail->Body = $pesan;

                    $cari ="SELECT max(idpengguna) AS id FROM pengguna";
                    $hasil = mysqli_query($conn, $cari);
                    $data = mysqli_fetch_assoc($hasil);
                    $no = (int) substr($data['id'],0,1);
                    $id = $no+1;
                    $sql = "SELECT * FROM pengguna WHERE npknim='$nim'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                      ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Gagal!</strong> NIM <?php echo $nim; ?>sudah terdaftar!</p>
                        <button type="submit" name="btnclose" class="btn-close lh-1 " data-bs-dismiss="alert" aria-label="Close"><span class="lh-1" aria-hidden="true">&times;</span></button>
                      </div>
                      <?php
                    }else{
                      $qry1 = "INSERT INTO pengguna VALUES('$id', '$nim', '$nama', '$fakultas', '$prodi', '$email', '$whatsapp')";
                      $tmbh1 = mysqli_query($conn, $qry1);
                      $qry2 = "INSERT INTO akun VALUES('$id', '$id', '$nim', '$katasandi','$email','$hash','0', 'MAHASISWA')";
                      $tmbh2 = mysqli_query($conn, $qry2);
                      $send = $mail->send();
                      if($tmbh1 && $tmbh2 && $send){
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <p class="text-white text-sm py-0 my-0"><i class="material-icons text-md">thumb_up</i> <strong>Berhasil!</strong> Silahkan lakukan aktivasi melalui email!</p>
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
                  }else{
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <p class="text-white text-sm align-middle py-0 my-0"><i class="material-icons text-md">thumb_down</i> <strong>Gagal!</strong> Silahkan klik kotak I'm not robot (reCaptcha) untuk verifikasi!</p>
                      <button type="submit" name="btnclose" class="btn-close lh-1 " data-bs-dismiss="alert" aria-label="Close"><span class="lh-1" aria-hidden="true">&times;</span></button>
                    </div>
                    <?php
                  }
                }
                if(isset($_POST['btnclose'])){
                  echo "<script>window.location.href='.'</script>";
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