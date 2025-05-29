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

<body>

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
                    <input type="numeric" class="form-control" placeholder="Harga" aria-label="Hargar" name="harga"
                        Required>
                </div>
                <div class="form-floating mb-1">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan Menu"
                        name="keterangan" required>
                    <label for="floatingInput">Keterangan Menu</label>
                </div>
                <button type="submit" class="tombol1 btn btn-secondary">Tambah</button>
            </form>
        </div>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menu as $index => $key): ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= esc($key['nama']); ?></td>
                                <td><?= esc($key['harga']); ?></td>
                                <td><a href="detail.php?id=<?= $key['id']; ?>">Detail</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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