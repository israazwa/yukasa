<div class="container-fluid contact py-5">
    <div class="container py-5">

        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="">Contact</h1>
                        <p class="mb-4">The contact form is currently inactive. Get a functional and working contact
                            form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and
                            you're done. <a href="https://htmlcodex.com/contact-form" class="text-secondary">Download
                                Now</a>.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="h-100 rounded">
                        <iframe class="rounded w-100" style="height: 400px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2232305218477!2d110.41009303969645!3d-6.982962680199371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4ec52229d7%3A0xc791d6abc9236c7!2sUniversitas%20Dian%20Nuswantoro!5e0!3m2!1sid!2sid!4v1749980298404!5m2!1sid!2sid"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-7">
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                        unset($_SESSION['success']);
                    }

                    if (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                        unset($_SESSION['error']);
                    }
                    ?>
                    <form action="/menu/up" class="" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Phone Number"
                            name="nomorhp" required>
                        <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email"
                            name="email" required>
                        <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Your Message"
                            name="content" required></textarea>
                        <button class="w-100 btn form-control border-secondary py-3 tmnbl" type="submit">Submit</button>
                        <style>
                            .tmnbl {
                                background-color: white;
                                color: #343a40;
                                transition: all 0.3s ease;
                            }

                            button.tmnbl:hover {
                                background: linear-gradient(45deg, rgb(255, 64, 0), rgb(131, 49, 4));
                                color: #fff;
                                border-color: #ff6b6b;
                            }
                        </style>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-2x text-danger me-4 fas fa-route"></i>
                        <div>
                            <h4>Address</h4>
                            <p class="mb-2">Jl. Bougenville, RT 11 RW 06 Kupang Dukuh, Kec. Ambarawa, Kabupaten
                                Semarang, Jawa Tengah.</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-danger me-4"></i>
                        <div>
                            <h4>Mail Us</h4>
                            <p class="mb-2">Lorem ipsum dolor sit amet.@example.com</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-danger me-4"></i>
                        <div>
                            <h4>Telephone</h4>
                            <p class="mb-2">(+62) 3456 7890</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>