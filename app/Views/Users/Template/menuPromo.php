<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .cardpromo:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 35px rgba(0, 0, 0, 0.3);
        background-color: #f9f9f9;
        cursor: pointer;
    }

    .cardpromo {
        transition: all 0.5s ease-in-out;
    }
</style>

<body class="bg-light">
    <div class="container my-4 mt-5">
        <h2 class="text-center fw-bold mb-3">Menu Promo Menarik!</h2>
        <div class="table-responsive">
            <div class="d-flex flex-nowrap">
                <?php foreach ($promo as $index => $menu): ?>
                    <?php if ($menu['promo'] == 1): ?> <!-- Menampilkan hanya yang memiliki promo -->
                        <div class="container">
                            <div class="card cardpromo me-3 p-3" style="width: 390px;">
                                <?php $menu['hargaTotal'] = $menu['harga'] - $menu['diskon']; ?>
                                <img src="/upload/menu/<?= $menu['foto']; ?>" alt="<?= $menu['nama']; ?>"
                                    class="img-fluid rounded" height="750px" width="600px"
                                    onclick="addToCart(<?= $menu['id']; ?>, '<?= $menu['nama']; ?>', <?= $menu['hargaTotal']; ?>)">
                                <h5 class="mt-2 text-danger fw-bold fs-4"><?= $menu['nama']; ?></h5>
                                <p class="text-muted"><?= $menu['keterangan']; ?></p>
                                <div class="fs-9 text-secondary">
                                    Harga: <?= $menu['harga']; ?> • Diskon: <?= $menu['diskon']; ?>
                                </div>
                                <?php
                                $harga = $menu['harga'];
                                $diskon = $menu['diskon'];
                                $harga_total = $harga - $diskon; ?>
                                <div class="fs-4 fw-semibold">
                                    Rp <?= number_format($harga_total, 2, ',', '.'); ?>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let cards = document.querySelectorAll(".card");
            let container = document.querySelector(".d-flex");

            cards.forEach((card, index) => {
                if (index >= 3) {
                    card.style.display = "block";
                }
            });

            container.style.overflowX = "auto";
        });
    </script>
</body>

</html>