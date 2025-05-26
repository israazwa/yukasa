<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<style>
    .hero {
        background-image: url('<?= base_url('/upload/dev/hero/' . $hero['content']); ?>');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 20px;
        text-align: center;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
    }
</style>

<body>
    <section class="hero" id="hero">
        <h1><?= $hero['text']; ?></h1>
        <p><?= $hero['keterangan']; ?></p>
    </section>
    <section class="container my-3 d-flex flex-column align-items-center justify-content-center text-center" id="about">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                <h2 class=""><b><i>ABOUT US</i></b></h2>
                <p style="text-align: justify;">
                    Hiwwoo Corner merupakan kafe kekinian yang beralamat di Jl. Bougenville, RT 11 RW 06 Kupang Dukuh,
                    Kec. Ambarawa, Kabupaten Semarang, Jawa Tengah. Hiwwoo Corner didirikan pada tahun 2018 oleh Aile.
                    Hiwwoo Corner dibangun atas tekad Aile yang awalnya pekerja kantoran sampai akhirnya berani
                    mendirikan diri untuk membangun usaha kuliner sendiri. Berkat keberanian dan kepercayaan diri Aile,
                    Hiwwoo Corner bisa berkembang dan memiliki banyak pelanggan tetap hingga saat ini.
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="<?= base_url('ramai.jpg'); ?>" class="rounded" alt="Hiwwo Corner"
                    style="max-height: 250px;" />
            </div>
        </div>
    </section>


    <!-- Bootstrap JavaScript Libraries -->
    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>