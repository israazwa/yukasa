<!doctype html>
<html lang="en">

<head>
    <title><?= !empty($title) ? $title : 'Hiwoo'; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<style>
    .bg-primary {
        background-color: var(--bs-warning) !important;
    }

    .custom-navbar {
        transition: transform 0.3s ease-in-out;
    }
</style>

<body>
    <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark sticky-top" aria-label="Furni navigation bar">
        <div class="container">
            <a class="navbar-brand" href="index.html"><b>Hiwwo Corner</b></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li><a class="nav-link" href="/">Home</a></li>
                    <li><a class="nav-link" href="#about">About us</a></li>
                    <li><a class="nav-link" href="#menu">Menu's</a></li>
                    <li><a class="nav-link" href="#contact">Contact us</a></li>
                </ul>
                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#cartModal"
                            onclick="toggleCart()">
                            <img src="<?= base_url('img/cart.svg'); ?>" alt="Keranjang Belanja">
                        </a>
                    </li>
                    <li>
                    <li class="nav-item">
                        <nav class="navbar px-3">
                            <a href="#" id="openProfile">
                                <img src="<?= !empty($user['image']) ? base_url('upload/user_image/' . $user['image']) : base_url('default.png'); ?>"
                                    alt="Profile" class="rounded-circle" width="35">
                            </a>
                        </nav>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <style>
        .modal-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.83);
            justify-content: center;
            align-items: center;
            z-index: 99;
            /* Menempatkan modal di atas semua elemen */
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        .warna {
            background-color: #f8f9fa;
            border-radius: 8px;
        }
    </style>
    <div id="profileModal" class="modal-container">
        <div class="container mx-5">
            <div class="container mx-3 warna">
                <div class="modal-content">
                    <span class="close-btn" onclick="closeModal()">&times;</span>
                    <div class="profile-container">
                        <img id="profileImage"
                            src="<?= !empty($user['image']) ? base_url('upload/user_image/' . $user['image']) : base_url('default.png'); ?>"
                            alt="Foto Profil" class="img-thumbnail" style="max-width: 100px;" class="rounded-circle"
                            width="120">
                        <h3 id="username" class="mt-3">
                            <?= !empty($user['username']) ? ($user['username']) : 'Guesst'; ?>
                        </h3>
                    </div>
                    <?php if (service('authentication')->check()): ?>
                        <div class="container mx-3">
                            <form id="changePhotoForm" action="/upptofile/<?= $user['id']; ?>" method="post"
                                enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <input type="file" name="user_image" id="photoInput" class="form-control mt-3" required>
                                <div class="d-flex mt-3">
                                    <button type="submit" class="btn btn-success mx-2">Change Photo</button>
                                    <a href="/logout" class="btn btn-warning mx-2">Log Out!</a>
                                </div>
                            </form>
                        </div>
                    <?php else: ?>
                        <div class="container mx-2">
                            <a href="<?= site_url('/login') ?>" class="btn btn-primary mt-3">Login</a>
                        </div>
                    <?php endif; ?>
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
    <script>"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"</script>
    <script>document.getElementById("openProfile").addEventListener("click", function () {
            document.getElementById("profileModal").style.display = "flex";
        });

        function closeModal() {
            document.getElementById("profileModal").style.display = "none";
        }

        function changePhoto() {
            let fileInput = document.getElementById("photoInput");
            let profileImage = document.getElementById("profileImage");

            if (fileInput.files.length > 0) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    profileImage.src = e.target.result;
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }</script>

    <script>
        let lastScrollTop = 0;
        const navbar = document.querySelector(".custom-navbar");

        window.addEventListener("scroll", function () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                // Saat scroll ke bawah, navbar menghilang
                navbar.style.transform = "translateY(-100%)";
            } else {
                // Saat scroll ke atas, navbar muncul kembali
                navbar.style.transform = "translateY(0)";
            }

            lastScrollTop = scrollTop;
        });
    </script>

</body>

</html>