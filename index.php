<!DOCTYPE html>
<?php include('index_control.php') ?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Pendaftaran</title>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <nav
        class="navbar navbar-expand-lg navbar-light bg-white shadow pt-4 pb-4"
      >
        <div class="container">
          <a class="navbar-brand font-weight-bold" href="#">PAUD Al-Ikhlas</a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a class="nav-item nav-link mr-3 active" href="#">TENTANG KAMI</a>
              <!-- <a class="nav-item nav-link mr-3" href="#">STATISTIK</a>
              <a class="nav-item nav-link mr-3" href="#">JADWAL</a>
              <a class="nav-item nav-link mr-3" href="#">TESTIMONI</a> -->
              <a class="nav-item nav-link mr-3" href="login.php">MASUK</a>
              <a class="btn btn-danger rounded-pill" href="registrasi.php">DAFTAR</a>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3 class="h1 mb-3">
              <!-- PPDB ONLINE <br /> -->
              PAUD Al-Ikhlas Pondok Pucung
            </h3>

            <p class="mb-5">
              Untuk calon pendaftar tahun ajaran 2023/2024 bisa mendaftar
              melalui website ini atau langsung datang ke tempat pendaftaran
            </p>

            <a href="registrasi.php" class="btn btn-danger btn-lg rounded-pill"
              >DAFTAR SEKARANG</a
            >
          </div>
          <div class="col-md-6 d-none d-sm-block">
            <img
              src="assets/img/image-hero.png"
              alt="image hero"
              class="img-fluid d-block mx-auto"
              style="max-height: 390px;max-width: 350px;"
            />
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="text-center">
          <h3>
            KENAPA PILIH <br />
            PAUD Al-Ikhlas ?
          </h3>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="fasilitas">
              <div class="description">
                <h5>Biaya Terjangkau</h5>
                <p>
                  PAUD al ikhlas menawarkan bersekolah dengan 
                  biaya yang sangat terjangkau untuk semua kalangan.
                </p>
              </div>
              <div class="icon-des">
                <img
                  src="assets/img/icons/checklist.svg"
                  alt="fasilitas"
                  class="img-fluid d-block mx-auto"
                />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="fasilitas">
              <div class="description icon-left">
                <h5>Guru Berkualitas</h5>
                <p>
                guru PAUD al ikhlas sangatlah berpengalaman di bidang 
                mengajar usia dini,karena guru di sini sudah mendapatkan pelatihan. 
                </p>
              </div>
              <div class="icon-des">
                <img
                  src="assets/img/icons/people.svg"
                  alt="orang"
                  class="img-fluid d-block mx-auto"
                />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="fasilitas">
              <div class="description">
                <h5>Pelajaran Agama</h5>
                <p>
                pelajaran agama di PAUD ini sangatlah di utamakan,
                anak anak setiap harinya akan di kenalkan surat surat pendek,
                hadits dengan metode yang menyenagkan.
                </p>
              </div>
              <div class="icon-des">
                <img
                  src="assets/img/icons/book.svg"
                  alt="buku"
                  class="img-fluid d-block mx-auto"
                />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="fasilitas">
              <div class="description icon-left">
                <h5>Lokasi Strategis</h5>
                <p>
                PAUD al ikhlas memiliki lokasi yang sangat strategis dan aman untuk anak – anak,
                karena lokasi PAUD al ikhlas jarang di lewati kendaraan besar seperti mobil, truk, bis.
                </p>
              </div>
              <div class="icon-des">
                <img
                src="assets/img/icons/building.svg"
                  alt="bangunan"
                  class="img-fluid d-block mx-auto"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="tentang">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img
              src="assets/img/logo.jpg"
              alt="tentang sekolah"
              style="max-width: 300px;"
              class="img-fluid mx-auto d-block"
            />
          </div>
          <div class="col-md-6">
            <h3 class="font-weight-bold mb-3 mt-5">TENTANG PAUD Al-Ikhlas</h3>
            <p class="deskripsi">

              PAUD Al-Ikhlas di Pondok Pucung adalah lembaga pendidikan anak usia dini yang menyajikan 
              pendekatan holistik untuk perkembangan optimal anak-anak prasekolah. 
              Guru-guru berdedikasi di PAUD Al-Ikhlas berfokus pada pengembangan 
              kognitif, motorik, sosial, dan emosional anak-anak, menciptakan lingkungan 
              belajar yang menyenangkan dan mendukung.
            </p>

            <!-- <p class="font-weight-bold mt-4">Kontak Kami</p>
            <ul class="social">
              <li>
                <a href="tel:082302002407">
                  <img src="assets/img/icons/telephone.svg" alt="telephone" />
                </a>
              </li>
              <li>
                <a href="mailto:est23.edi@gmail.com">
                  <img src="assets/img/icons/email.svg" alt="email" />
                </a>
              </li>
              <li>
                <a href="https://facebook.com/est23.edi">
                  <img src="assets/img/icons/facebook.svg" alt="facebook" />
                </a>
              </li>
              <li>
                <a href="https://smkndu.sch.id">
                  <img src="assets/img/icons/internet.svg" alt="website" />
                </a>
              </li>
            </ul> -->
          </div>
        </div>
      </div>
    </section>

    <section class="bg-danger pt-5 pb-5">
      <div class="container">
        <p class="text-white text-center">STATISTIK PENDAFTAR</p>
        <div class="row">
          <div class="col-md-4 text-center">
            <h3 class="text-white font-weight-bold h1"><?= mysqli_num_rows($jml_pendaftar) ?></h3>
            <p class="text-white">TOTAL PENDAFTAR</p>
          </div>
          <div class="col-md-4 text-center">
            <h3 class="text-white font-weight-bold h1"><?= mysqli_num_rows($jml_laki) ?></h3>
            <p class="text-white">LAKI-LAKI</p>
          </div>
          <div class="col-md-4 text-center">
            <h3 class="text-white font-weight-bold h1"><?= mysqli_num_rows($jml_perempuan) ?></h3>
            <p class="text-white">PEREMPUAN</p>
          </div>
        </div>
      </div>
    </section>

    <section class="alumni">
      <div class="container">
        <h3 class="text-center font-weight-bold mb-3">Apa Kata Orang Tua Siswa</h3>
        <p class="text-center mb-4">
          Beberapa testimoni dari para orang tua yang telah merasakan manfaat
          dari perkembangan si buah hati dalam kegiatan ajar-menagajar di Paud Al-Ikhlas.
        </p>

        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <img src="assets/img/Testimoni/1.jpg" alt="foto" style="min-width: 180px;min-height:180px"/>

                <p class="text-center">
                KATA ORANG TUA : bersekolah di tk al ikhlas sangatlah menyenangkan,
                mulai dari biaya yang sangat murah namun di ajar dengan pengajar yang berkualitas,
                pelajaran agamanya pun sangat lengkap, dan anak saya lebih bisa mendalami ilmu agama.
                </p>

                <p class="font-weight-bold text-center mb-0">
                  Ahmad Ayauqi Rabbani
                </p>
                <!-- <span class="text-muted">Web Developer, Traviora</span> -->
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <img src="assets/img/Testimoni/2.jpg" alt="foto" style="min-width: 180px;min-height:180px"/>

                <p class="text-center">
                KATA ORANG TUA : Masuk paud al ikhlas banyak sekali hal baru yg anak saya dapatkan.
                Seperti menghafal angka, hewan n buah-buahan dalam bahasa inggris. 
                Menghafal hadis - hadis dan sebagainya
                </p>

                <p class="font-weight-bold text-center mb-0">
                  Kiandra Shaki Azallea
                </p>
                <!-- <span class="text-muted">Web Developer, Traviora</span> -->
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <img src="assets/img/Testimoni/3.jpg" alt="foto" style="min-width: 180px;min-height:180px"/>

                <p class="text-center">
                KATA ORANG TUA : Belajar di PAUD AL-IKHLAS anak" Dapat membaca dgn cepat,
                mendapatkan akhlak yg baik, bicara yg santun.
                Dan mndptkan ilmu agama yg banyak, sperti dpt mnghafal hadist,
                Do'a & Surat" Pendek dgn baik.
                </p>

                <p class="font-weight-bold text-center mb-0">
                  Muhammad Uwais Fii Ardhi  
                </p>
                <!-- <span class="text-muted">Web Developer, Traviora</span> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container py-5 ">
        <div class="row">
          <div class="col-md-4">
            <img src="assets/img/logo.jpg" alt="logo" height="70px" class="mb-3">
            <h3>PAUD Al-Ikhlas Pondok Pucung</h3>
            <ul>
              <li>
                <i>
                  <svg
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    class="bi bi-geo"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path d="M11 4a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path d="M7.5 4h1v9a.5.5 0 0 1-1 0V4z" />
                    <path
                      fill-rule="evenodd"
                      d="M6.489 12.095a.5.5 0 0 1-.383.594c-.565.123-1.003.292-1.286.472-.302.192-.32.321-.32.339 0 .013.005.085.146.21.14.124.372.26.701.382.655.246 1.593.408 2.653.408s1.998-.162 2.653-.408c.329-.123.56-.258.701-.382.14-.125.146-.197.146-.21 0-.018-.018-.147-.32-.339-.283-.18-.721-.35-1.286-.472a.5.5 0 1 1 .212-.977c.63.137 1.193.34 1.61.606.4.253.784.645.784 1.182 0 .402-.219.724-.483.958-.264.235-.618.423-1.013.57-.793.298-1.855.472-3.004.472s-2.21-.174-3.004-.471c-.395-.148-.749-.336-1.013-.571-.264-.234-.483-.556-.483-.958 0-.537.384-.929.783-1.182.418-.266.98-.47 1.611-.606a.5.5 0 0 1 .595.383z"
                    />
                  </svg>
                </i>
                Jl.Elang 8 Terusan No.11 Kota Tangerang Selatan Banten Pondok Aren.
              </li>
              <li>
                <i>
                  <svg
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    class="bi bi-telephone-fill"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"
                    />
                  </svg>
                </i>
                0878808387057
              </li>
              <li>
                <i>
                  <svg
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    class="bi bi-envelope-fill"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"
                    />
                  </svg>
                </i>
                <!-- est23.edi@gmail.com -->
              </li>
            </ul>
          </div>
          <div class="col-md-3 offset-md-1">
            <h3>Kontak Kami</h3>
            <p>
              Nur  : 0878808387057<br />
              Mila : 087771726941

            </p>
          </div>
          <div class="col-md-4">
            <h3>Peta Lokasi</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31730.882373511347!2d106.60790191083983!3d-6.2161257999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f91babd82443%3A0x63d8bde3f987f748!2sPAUD%20AL-IKHLAS%20ISLAMIC%20SCHOOL!5e0!3m2!1sid!2sid!4v1699860486317!5m2!1sid!2sid" height="200px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>

      <div class="text-center py-3">
        <div class="container">
          <span class="text-muted">Copyright @2023 PAUD Al-Ikhlas Pondok Pucung</span>
        </div>
      </div>
    </footer>

    


    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
