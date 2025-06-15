<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
</head>
<style>
    body {
        height: 100dvh;
    }
</style>

<body>
    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger">
            <?= session('error'); ?>
        </div>
    <?php elseif (session()->has('success')): ?>
        <div class="alert alert-primary">
            <?= session('success'); ?>
        </div>
    <?php endif; ?>
    <section>
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
    </section>

    <section class="mx-3 mt-3">
        <div class="container">
            <div class="text2 text-center">
                <h5>Tambah Menu</h5>
            </div>
            <form action="/dev/store" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-1">
                    <input class="form-control" type="file" id="formFileMultiple" multiple name="foto" Required>
                </div>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" placeholder="Nama Menu" aria-label="Nama Menu" name="nama"
                        Required>
                    <span class="input-group-text">Rp.</span>
                    <input type="numeric" class="form-control" placeholder="Harga(contoh 12.000)" aria-label="Hargar"
                        name="harga" Required>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan Menu"
                        name="keterangan" required>
                    <label for="floatingInput">Keterangan Menu</label>
                </div>
                <div class="form-floating mb-3 d-flex">
                    <input type="numeric" class="form-control" id="floatingInput" placeholder="Masukan Diskon(jika ada)"
                        name="diskon">
                    <label for="floatingInput" class="text-danger">Masukan Diskon(jika ada)</label>
                    <button type="submit" class="tombol1 btn btn-secondary mt-2 mx-4">Tambah</button>
                </div>

        </div>

        </form>
    </section>

    <section>
        <div class="container mt-4">
            <div class="daftarmenu mt-2 text-center">
                <h4>Daftar Menu</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>More</th>
                            <td>Delete</td>
                    </thead>
                    <tbody>
                        <?php foreach ($menu as $index => $key): ?>
                            <tr>
                                <td><?= ($currentPage - 1) * $perPage + $index + 1; ?></td>
                                <?php if ($key['promo'] == 1): ?>
                                    <td class=""><?= esc($key['nama']); ?>
                                    <?php elseif ($key['promo'] == 0): ?>
                                    <td><?= esc($key['nama']); ?>
                                    <?php endif; ?>
                                </td>
                                <?php if ($key['promo'] == 1): ?>
                                    <td class=" d-flex">
                                        <p class="mx-2 text-danger"><?= esc($key['harga']); ?></p>
                                        <p class="mx-2 text-danger">Diskon <?= $key['diskon']; ?></p>
                                        <p>Total Harga : Rp. <?= ($key['harga'] - $key['diskon']); ?></p>
                                    </td>
                                <?php elseif ($key['promo'] == 0): ?>
                                    <td><?= esc($key['harga']); ?></td>
                                <?php endif; ?>
                                <td><a href="detail.php?id=<?= $key['id']; ?>">Detail</a></td>
                                <td>
                                    <form action="/menu/delete/<?= $key['id']; ?>" method="post">
                                        <?= csrf_field() ?> <button class="btn-danger btn">Delete!</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
                <?= $pager->links('modelMenu', 'default_full') ?>
            </div>
        </div>
    </section>
















    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>