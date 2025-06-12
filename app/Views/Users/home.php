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
        padding: 180px 20px;
        text-align: center;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
    }
</style>

<body>
    <section class="hero" id="hero">
        <h1><?= $hero['text']; ?></h1>
        <p><?= $hero['keterangan']; ?></p>
    </section>


    <section>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s"
                                    src="<?= base_url('img/about-1.jpg'); ?>">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s"
                                    src="<?= base_url('img/about-2.jpg'); ?>" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s"
                                    src="<?= base_url('img/about-3.jpg'); ?>">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s"
                                    src="<?= base_url('img/about-4.jpg'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About</h5>
                        <h1 class="mb-4">Hiwwo <i class="fa fa-utensils text-primary me-2"></i>Corner</h1>
                        <p class="mb-4">Hiwwoo Corner merupakan kafe kekinian yang beralamat di Jl. Bougenville, RT 11
                            RW 06
                            Kupang Dukuh, Kec. Ambarawa, Kabupaten Semarang, Jawa Tengah. .</p>
                        <p class="mb-2" style="text-align: justify;">Hiwwoo Corner didirikan pada tahun 2018 oleh Aile.
                            Hiwwoo Corner dibangun atas tekad
                            Aile yang awalnya pekerja kantoran sampai akhirnya berani mendirikan diri untuk membangun
                            usaha
                            kuliner sendiri. Berkat keberanian dan kepercayaan diri Aile, Hiwwoo Corner bisa berkembang
                            dan
                            memiliki banyak pelanggan tetap hingga saat ini.
                        </p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-dark px-3">
                                    <h1 class="flex-shrink-0 display-5 text-danger mb-0" data-toggle="counter-up">7
                                    </h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-dark px-3">
                                    <h1 class="flex-shrink-0 display-5 text-danger mb-0" data-toggle="counter-up">
                                        <?= $totalmenu; ?>
                                    </h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Total</p>
                                        <h6 class="text-uppercase mb-0">Menu</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <a class="btn btn-warning py-3 px-5 mt-2" href="">Read More</a> -->
                    </div>
                </div>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let counters = document.querySelectorAll("[data-toggle='counter-up']");
            let speed = 500; // Ubah kecepatan animasi

            counters.forEach(counter => {
                let updateCount = () => {
                    let target = +counter.innerText;
                    let count = 0;
                    let increment = target / speed;

                    let interval = setInterval(() => {
                        count += increment;
                        if (count >= target) {
                            counter.innerText = target;
                            clearInterval(interval);
                        } else {
                            counter.innerText = Math.floor(count);
                        }
                    }, 10);
                };

                let observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            updateCount();
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 1.0 });

                observer.observe(counter);
            });
        });
    </script>
</body>

</html>