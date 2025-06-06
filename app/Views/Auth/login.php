<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Kafe Aroma</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
    <style>
        body {
            background: url('your-cafe-image.jpg') no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(5px);
        }

        .container-custom {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .image-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .image-container img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #c95a2a;
        }

        .card {
            background: url('form-background.jpg') no-repeat center center;
            background-size: cover;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            font-family: 'Pacifico', cursive;
            color: #c95a2a;
            text-align: center;
        }

        .btn-primary {
            background-color: #c95a2a;
            border: none;
            font-size: 18px;
            padding: 10px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #a2431e;
        }
    </style>
</head>

<body>

    <div class="container container-custom">
        <div class="image-container">
            <img src="<?= !empty($user['image']) ? base_url($user['image']) : base_url('default.png'); ?>"
                alt="Profile Image">
        </div>
        <div class="card">
            <h2>Selamat datang di Kafe Aroma!</h2>
            <p class="text-center">Silakan login untuk menikmati layanan kami.</p>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <form action="<?= url_to('login') ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                    <input type="text"
                        class="form-control <?php if (session('errors.login')): ?>is-invalid<?php endif ?>" name="login"
                        placeholder="<?= lang('Auth.emailOrUsername') ?>">
                    <div class="invalid-feedback"><?= session('errors.login') ?></div>
                </div>
                <div class="form-group">
                    <label for="password"><?= lang('Auth.password') ?></label>
                    <input type="password" name="password"
                        class="form-control  <?php if (session('errors.password')): ?>is-invalid<?php endif ?>"
                        placeholder="<?= lang('Auth.password') ?>">
                    <div class="invalid-feedback"><?= session('errors.password') ?></div>
                </div>
                <button type="submit" class="btn btn-primary">☕ Masuk</button>
            </form>
        </div>
    </div>

</body>

</html>

<?= $this->endSection() ?>