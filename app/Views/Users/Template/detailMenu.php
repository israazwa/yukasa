<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Menu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        .detail-menu-wrapper {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            margin: 0;
            background-image: url('/upload/dev/hero/<?= $img['content']; ?>');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 15px;
            position: relative;
            color: #fff;
            overflow-x: hidden;
        }

        .detail-menu-wrapper::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            z-index: 0;
        }

        .detail-menu-wrapper main.container {
            position: relative;
            z-index: 10;
            max-width: 720px;
            width: 100%;
        }

        .detail-menu-wrapper .card {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            border-radius: 20px;
            overflow: hidden;
            background: rgba(255 255 255 / 0.15);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255 255 255 / 0.2);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
            color: #f0f0f0;
        }

        .detail-menu-wrapper .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.75);
        }

        .detail-menu-wrapper .badge-price {
            font-size: 1.1rem;
            padding: 0.5em 1em;
            border-radius: 12px;
            margin-top: 6px;
            display: inline-block;
            background: rgba(255 255 255 / 0.3);
            color: #e0e0e0;
            font-weight: 600;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .detail-menu-wrapper .menu-image {
            object-fit: cover;
            width: 100%;
            height: 300px;
            flex-shrink: 0;
            transition: transform 0.4s ease;
            border-radius: 20px 20px 0 0;
            filter: drop-shadow(0 5px 8px rgba(0, 0, 0, 0.2));
        }

        .detail-menu-wrapper .card.d-flex.flex-md-row .menu-image {
            height: auto;
            border-radius: 20px 0 0 20px;
            width: 350px;
        }

        .detail-menu-wrapper .menu-image:hover {
            transform: scale(1.05);
        }

        @media (max-width: 767.98px) {
            .detail-menu-wrapper .card.d-flex.flex-md-row {
                flex-direction: column;
            }

            .detail-menu-wrapper .card.d-flex.flex-md-row .menu-image {
                width: 100%;
                height: 300px;
                border-radius: 20px 20px 0 0;
            }
        }

        .detail-menu-wrapper h1,
        .detail-menu-wrapper h2,
        .detail-menu-wrapper p {
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.75);
        }

        .detail-menu-wrapper h1 {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #f8f9fa;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.15em;
        }

        .detail-menu-wrapper .card-title {
            font-weight: 700;
            font-size: 2rem;
            color: #f0f0f0;
        }

        .detail-menu-wrapper p.card-text {
            font-size: 1.125rem;
            color: #ddd;
            margin-top: 1rem;
        }

        .detail-menu-wrapper .btn-modern {
            font-weight: 600;
            border-radius: 30px;
            padding: 0.75rem 1.6rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            justify-content: center;
            color: #222;
            background: rgba(255 255 255 / 0.9);
            border: none;
            user-select: none;
        }

        .detail-menu-wrapper .btn-add {
            background: linear-gradient(135deg, #c5c1ffcc, #a29bffcc);
            box-shadow: 0 8px 16px rgba(125, 115, 255, 0.6);
            color: #302e7b;
        }

        .detail-menu-wrapper .btn-add:hover,
        .detail-menu-wrapper .btn-add:focus {
            background: linear-gradient(135deg, #a29bffdd, #7f78ffdd);
            box-shadow: 0 12px 30px rgba(125, 115, 255, 0.8);
            color: #1a1970;
            outline: none;
            text-decoration: none;
        }

        .detail-menu-wrapper .btn-pay {
            background: linear-gradient(135deg, #ffd69fdd, #ffa454dd);
            box-shadow: 0 8px 16px rgba(255, 164, 84, 0.6);
            color: #5b3f00;
        }

        .detail-menu-wrapper .btn-pay:hover,
        .detail-menu-wrapper .btn-pay:focus {
            background: linear-gradient(135deg, #ffa454ee, #ff7a1cdd);
            box-shadow: 0 12px 30px rgba(255, 122, 28, 0.85);
            color: #3d2800;
            outline: none;
            text-decoration: none;
        }

        .detail-menu-wrapper #toast {
            position: fixed;
            top: 20px;
            right: 20px;
            min-width: 250px;
            z-index: 1100;
            border-radius: 12px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.4);
            background-color: rgba(255 255 255 / 0.9);
            color: #222;
            padding: 0.75rem 1.2rem;
            display: none;
            font-weight: 600;
            user-select: none;
            backdrop-filter: blur(6px);
        }

        .detail-menu-wrapper .cart-badge {
            position: absolute;
            top: -6px;
            right: -10px;
            background-color: #ff7a1c;
            color: white;
            font-size: 0.7rem;
            padding: 0 7px;
            border-radius: 10px;
            font-weight: 700;
            user-select: none;
        }

        .detail-menu-wrapper .cart-badge.hidden {
            display: none !important;
        }

        .detail-menu-wrapper .buttons-vertical {
            margin-top: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
    </style>
</head>

<body>
    <div class="detail-menu-wrapper" role="region" aria-label="Detail Menu">
        <main class="container">
            <h1>Detail Menu</h1>
            <div class="card d-flex flex-column flex-md-row">
                <div class="flex-shrink-0" style="width: 100%; max-width: 350px; height: 300px;">
                    <img src="/upload/menu/<?= $menu['foto']; ?>" alt="Nasi Goreng Spesial" class="menu-image" />
                </div>
                <div class="p-4 d-flex flex-column justify-content-center flex-fill">
                    <h2 class="card-title" id="menuName"><?= $menu['nama']; ?></h2>
                    <span class="badge badge-price" id="menuPrice">Rp <?= $menu['harga']; ?></span>
                    <p class="card-text" id="menuDescription">
                        <?= $menu['keterangan']; ?>
                    </p>

                    <div class="buttons-vertical">
                        <button type="button" class="btn btn-modern btn-add position-relative" id="addToCartBtn"
                            aria-label="Add to cart">
                            <i class="bi bi-cart-plus-fill" aria-hidden="true"></i> Add to Cart
                            <span id="cartCount" class="cart-badge hidden">0</span>
                        </button>
                        <button type="button" class="btn btn-modern btn-pay" id="proceedPaymentBtn"
                            aria-label="Proceed to payment">
                            <i class="bi bi-credit-card-2-front-fill" aria-hidden="true">Lanjutkan Pembayaran</i>
                        </button>
                    </div>
                </div>
            </div>
        </main>

        <!-- Toast -->
        <div id="toast" role="alert" aria-live="assertive" aria-atomic="true"></div>
    </div>
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Lanjutkan Pembayaran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Silakan masukkan detail pembayaran Anda.</p>
                    <form id="paymentForm">
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label">Nomor Kartu</label>
                            <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456"
                                required pattern="\\d{16}">
                        </div>
                        <div class="mb-3">
                            <label for="expiryDate" class="form-label">Tanggal Kadaluarsa</label>
                            <input type="month" class="form-control" id="expiryDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="cvc" class="form-label">CVC</label>
                            <input type="text" class="form-control" id="cvc" placeholder="123" required
                                pattern="\\d{3}">
                        </div>
                        <button class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#paymentModal">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            const addToCartBtn = document.getElementById('addToCartBtn');
            const proceedPaymentBtn = document.getElementById('proceedPaymentBtn');
            const cartCountElem = document.getElementById('cartCount');
            const toast = document.getElementById('toast');
            let cartCount = 0;

            function showToast(message) {
                toast.textContent = message;
                toast.style.display = 'block';
                toast.style.opacity = '1';
                setTimeout(() => {
                    toast.style.transition = 'opacity 0.6s ease';
                    toast.style.opacity = '0';
                }, 2000);
                setTimeout(() => {
                    toast.style.display = 'none';
                    toast.style.transition = '';
                }, 2600);
            }

            addToCartBtn.addEventListener('click', () => {
                cartCount++;
                cartCountElem.textContent = cartCount;
                cartCountElem.classList.remove('hidden');
                showToast('Menu telah ditambahkan ke keranjang!');
            });

            const paymentModalElement = document.getElementById('paymentModal');
            const paymentModal = new bootstrap.Modal(paymentModalElement);

            proceedPaymentBtn.addEventListener('click', () => {
                paymentModal.show();
            });

            document.getElementById('paymentForm').addEventListener('submit', (e) => {
                e.preventDefault();
                paymentModal.hide();
                showToast('Pembayaran berhasil! Terima kasih.');
                cartCount = 0;
                cartCountElem.classList.add('hidden');
            });
        })();
    </script>
</body>

</html>