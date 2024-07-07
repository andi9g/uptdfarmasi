<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    .ukuran {
        height: 100vh !important;
        padding-top: -50px;
    }
    /* styles.css */
        #fullscreen-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1000; /* Pastikan tombol berada di atas elemen lainnya */
        }
        #sign-in{
            position: fixed;
            bottom: 20px;
            left: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1000; /* Pastikan tombol berada di atas elemen lainnya */
        }
        #logo{
            position: fixed;
            top: 20px;
            left: 20px;
            font-size: 16px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1000; /* Pastikan tombol berada di atas elemen lainnya */
        }
        #prev {
            position: fixed;
            top: 20%;
            left: 5px;
        }
        #next {
            position: fixed;
            top: 20%;
            right: 5px;
        }

        #fullscreen-btn:hover {
            background-color: #0056b3;
        }
        .carousel-container p{
            color: white !important;
            font-size: 16pt;
            margin-bottom: 10px !important;
        }
        h2 {
            margin: 0;
            padding: 0;
        }
        h3 {
            margin: 0;
            padding: 0;
        }
        h4 {
            margin: 0;
            padding: 0;
        }
        h5 {
            margin: 0;
            padding: 0;
        }
        #hero {
            overflow:hidden;
        }
        p {
            margin: 0 !important;
            padding: 0 !important;
        }
        ul li {
            text-align: left;
            color: white;
            font-size: 20px;
        }
        .gambarku {
            max-height: 700px;
        }
        @media (max-width: 900px) {
            #logo {
                display: none;
            }
            .carousel-container p{
                color: white !important;
                font-size: 10pt;
                margin-bottom: 10px !important;
            }
            ul li {
                text-align: left;
                color: white;
                font-size: 10px;
            }
        }
  </style>
</head>

<body>
    <button id="fullscreen-btn" class="btn bg-secondary" onclick="toggleFullScreen()">
        <i class="fa fa-expand"></i>
    </button>
    <a href="{{ url('login', []) }}" class="btn bg-secondary" id="sign-in">
        <i class="fa fa-sign-in"></i>
    </a>

    <div id="logo">
        <table width="100%" border="0">
            <tr>
                <td width="90px">
                    <img src="{{ url('gambar', ['kepri.png']) }}" width="100%" alt="">
                </td>
                <td valign="justify">
                    <h5>PEMERINTAH PROVINSI KEPULAUAN RIAU</h5>
                    <h4><b>UPTD INSTALASI FARMASI DINAS KESEHATAN PROVINSI KEPULAUAN RIAU</b></h4>
                    <p>Jl. Kesehatan No. 06 Kota Tanjungpinang Kepulauan Riau</p>
                </td>
            </tr>
        </table>

    </div>

    @yield('content')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<script>
function toggleFullScreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen().catch(err => {
            alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
        });
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        }
    }
}
</script>
