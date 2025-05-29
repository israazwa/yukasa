<style>
    .hero {
        background: url("<?= base_url('devhome/hero.jpg'); ?>") no-repeat center center/cover;
        width: 100%;
        height: 360px;
        position: relative;
    }

    .hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
    }

    .text-container {
        position: absolute;
        top: 50%;
        left: 10%;
        transform: translateY(-50%);
        color: white;
        padding: 20px;
        border-radius: 8px;
    }

    .tombol1 {
        padding: 5px 12px;
        background-color: rgb(248, 58, 0);
        border-radius: 6px;
        color: white;
        border: 0;
        border-color: rgb(248, 58, 0);
    }

    .tombol1:hover {
        background-color: rgb(247, 197, 182);
        color: black;
        transition: all ease 0.4s;
    }
</style>
</head>

<body>
    <div class="hero">
        <div class="text-container">
            <h1><span id="greeting"></span> <?= $nama; ?></h1>
        </div>
    </div>
    <div class="container">
        <section>
            <div class="text2 text-center">
                <h4>Controller Hero Section</h4>
            </div>
            <form action="/dev/update/<?= esc($id) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <input class="form-control" type="file" id="formFileMultiple" name="content" multiple>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Judul <H1>" aria-label="Username" name="text">
                    <span class="input-group-text">||</span>
                    <input type="text" class="form-control" placeholder="Keterangan <p>" aria-label="Server"
                        name="keterangan">
                </div>
                <button type="submit" class="tombol1">Update</button>
            </form>
        </section>
    </div>
</body>

<section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">CRUD MENU</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card’s content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card’s content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card’s content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card’s content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





















<script>
    function greetByTime() {
        const hour = new Date().getHours();
        let greeting;

        if (hour >= 5 && hour < 12) {
            greeting = "Selamat pagi! ";
        } else if (hour >= 12 && hour < 18) {
            greeting = "Selamat siang! ";
        } else {
            greeting = "Selamat malam! ";
        }
        document.getElementById("greeting").innerText = greeting;
    }
    window.onload = greetByTime;
</script>