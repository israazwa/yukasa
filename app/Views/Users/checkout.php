<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    html,
    body {
        height: 100dvh;
        margin: 0;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    main.container {
        flex: 1;
    }
</style>

<body class="bg-light">

    <main class="container py-5">
        <h2 class="mb-4">Checkout</h2>

        <div class="row g-4">
            <!-- Billing / Shipping -->
            <div class="col-lg-7">
                <form action="<?= base_url('/checkout/up') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <h4 class="mb-3">Konfirmasi Pesanan</h4>
                    <div class="row g-3">
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
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Username</label>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                value="<?= $profile['username']; ?>" readonly required>
                            <div class="invalid-feedback"><?= $profile['username']; ?>.</div>
                        </div>

                        <div class="col-sm-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="floatingTextarea2Disabled"
                                value="<?= $profile['email']; ?>" readonly required>
                            <div class="invalid-feedback">Masukkan Email</div>
                        </div>

                        <div class="col-sm-6">
                            <label for="country" class="form-label">Tempat</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="">Pilih...</option>
                                <option>In Door</option>
                                <option>Out Door</option>
                            </select>
                            <div class="invalid-feedback">Pilih Tempat.</div>
                        </div>

                        <div class="col-sm-6">
                            <label for="zip" class="form-label">Nomor Meja</label>
                            <input type="text" class="form-control" id="zip" name="zip" required>
                            <div class="invalid-feedback">Masukkan Nomor Meja.</div>
                        </div>
                    </div>

                    <div class="text-center fs-5 mt-4">Upload Bukti Pembayaran</div>
                    <input type="file" class="form-control mt-1" id="bukti_pembayaran" name="bukti_pembayaran" required>

                    <!-- Hidden total harga yang akan diisi dengan JS -->
                    <input type="hidden" name="total_harga" id="hargaFinal" value="Error mberuh">
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary col-6 d-block mx-auto">Kirim</button>
                    </div>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Ringkasan Pesanan</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <table class="table table-hover">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Item</th>
                                        <th class="text-center">Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody id="cartList">
                                    <!-- Data akan diisi oleh JavaScript -->
                                </tbody>
                            </table>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (IDR)</span>
                            <strong><span id="totalPrice"></span></strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <!-- BS5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.querySelector("form");
            form.addEventListener("submit", () => {
                const raw = document.getElementById("totalPrice").textContent;
                const clean = parseInt(raw.replace(/[^\d]/g, ""), 10);
                document.getElementById("totalHargaInput").value = clean;
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cartList = document.getElementById("cartList");
            const totalPrice = document.getElementById("totalPrice");
            const cartSidebar = document.getElementById("cartSidebar");

            let cart = JSON.parse(localStorage.getItem("cart")) || [];

            function updateCartDisplay() {
                cartList.innerHTML = "";
                cart.forEach((item, index) => {
                    let row = document.createElement("tr");
                    row.innerHTML = `
            <td class="item-name" title="${item.name}">${item.name}</td>
            <td class="text-center">
                <button onclick="changeQuantity(${index}, -1)" class="btn btn-sm btn-outline-danger">−</button>
                <span class="mx-2">${item.quantity}</span>
                <button onclick="changeQuantity(${index}, 1)" class="btn btn-sm btn-outline-success">+</button>
            </td>
            <td>Rp ${item.price * item.quantity}</td>
        `;
                    cartList.appendChild(row);
                });

                totalPrice.textContent = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                localStorage.setItem("cart", JSON.stringify(cart));
            }

            function addToCart(id, name, price) {
                let existingItem = cart.find(item => item.id === id);
                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    cart.push({ id, name, price, quantity: 1 });
                }
                updateCartDisplay();
                cartSidebar.style.display = "block";
            }

            function changeQuantity(index, change) {
                cart[index].quantity += change;
                if (cart[index].quantity <= 0) {
                    cart.splice(index, 1);
                }
                updateCartDisplay();
            }

            function removeFromCart(index) {
                cart.splice(index, 1);
                updateCartDisplay();
            }

            function toggleCart() {
                cartSidebar.style.display = cartSidebar.style.display === "block" ? "none" : "block";
            }

            window.addToCart = addToCart;
            window.removeFromCart = removeFromCart;
            window.changeQuantity = changeQuantity;
            window.toggleCart = toggleCart;

            updateCartDisplay();
        });
    </script>
</body>

</html>