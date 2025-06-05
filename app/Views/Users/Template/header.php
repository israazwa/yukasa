<!doctype html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
        <div class="container">
            <a class="navbar-brand" href="index.html"><b>Hiwwo Corner</b></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li><a class="nav-link" href="shop.html">Shop</a></li>
                    <li><a class="nav-link" href="about.html">About us</a></li>
                    <li><a class="nav-link" href="blog.html">Menu's</a></li>
                    <li><a class="nav-link" href="contact.html">Contact us</a></li>
                </ul>
                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="cart.html"><img src="<?= base_url('img/cart.svg'); ?>"></a></li>
                    <li>
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                            <img src="<?= base_url($user['image']); ?>" alt="Profile" class="rounded-circle" width="35"
                                height="35">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered" role="document">
            <div class="modal-content p-4">
                <div class="modal-header mx-auto border-0">
                    <h2 class="modal-title fs-3 fw-normal">Login</h2>
                </div>
                <div class="modal-body">
                    <div class="login-detail">
                        <div class="login-form p-0">
                            <div class="col-lg-12 mx-auto">
                                <form id="login-form">
                                    <input type="text" name="username" placeholder="Username or Email Address *"
                                        class="mb-3 ps-3 text-input">
                                    <input type="password" name="password" placeholder="Password"
                                        class="ps-3 text-input">
                                    <div class="checkbox d-flex justify-content-between mt-4">
                                        <p class="checkbox-form">
                                            <label class="">
                                                <input name="rememberme" type="checkbox" id="remember-me"
                                                    value="forever"> Remember me </label>
                                        </p>
                                        <p class="lost-password">
                                            <a href="#">Forgot your password?</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer mt-5 d-flex justify-content-center">
                            <button type="button" class="btn btn-red hvr-sweep-to-right dark-sweep">Login</button>
                            <button type="button"
                                class="btn btn-outline-gray hvr-sweep-to-right dark-sweep">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>