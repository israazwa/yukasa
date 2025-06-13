<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
</head>

<body>
    <style>
        .category img,
        .course-item img {
            transition: .5s;
        }

        .category a:hover img,
        .course-item:hover img {
            transform: scale(1.5);
        }


        .team-item img {
            transition: .5s;
        }

        .team-item:hover img {
            transform: scale(1.5);
        }
    </style>
    <!-- Daftar Menu -->
    <div class="container mt-3" id="menu">
        <div class="texth3 fs-2 text-center mt-3"><b>Daftar Menu</b></div>
        <div class="container mx-2 text-center mb-4">
            <h6 class="mb-4">Halaman <?= $pager->getCurrentPage('modelMenu'); ?> dari
                <?= $pager->getPageCount('modelMenu'); ?>
            </h6>
            <div class="row g-4 justify-content-center">
                <?php foreach ($menu as $m): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="course-item bg-light p-3 rounded shadow">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="/upload/menu/<?= $m['foto']; ?>" alt=""
                                    style="max-height: 150px;">
                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="/menu/<?= $m['id']; ?>" class="btn btn-sm btn-warning px-3 border-end"
                                        style="border-radius: 30px 0 0 30px;">Read More</a>
                                    <button onclick="addToCart(<?= $m['id']; ?>, '<?= $m['nama']; ?>', <?= $m['harga']; ?>)"
                                        class="btn btn-sm btn-danger px-3"
                                        style="border-radius: 0 30px 30px 0;">Buy!</button>
                                </div>
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0"><?= $m['nama']; ?></h3>
                                <h5 class="mb-4">Rp.<?= number_format($m['harga'], 0, ',', '.'); ?>,00</h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?= $pager->links('modelMenu', 'custom_pager') ?>
        </ul>
    </nav>
    </div>

    <!-- Cart Sidebar -->
    <div id="cartSidebar" class="position-fixed end-0 top-0 h-100 bg-white p-4 shadow-lg border rounded"
        style="width: 400px; display: none;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-danger">Your Cart</h3>
            <button type="button" onclick="toggleCart()" class="btn-close"></button>
        </div>

        <!-- Tabel Daftar Item -->
        <div class="table-responsive">
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
        </div>

        <!-- Total Harga -->
        <div id="cartTotalContainer" class="mt-3 text-end">
            <h4 class="fw-bold text-dark">Grand Total: Rp <span id="totalPrice">0</span></h4>
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-between mt-4">
            <button onclick="toggleCart()" class="btn btn-outline-secondary">Close</button>
            <button class="btn btn-warning">Checkout</button>
        </div>
    </div>

    <!-- Styling untuk tampilan lebih elegan -->
    <style>
        .table th,
        .table td {
            padding: 12px;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }
    </style>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Cek apakah ada posisi scroll yang tersimpan
            if (localStorage.getItem("scrollPosition")) {
                window.scrollTo(0, localStorage.getItem("scrollPosition"));
            }

            // Simpan posisi scroll sebelum user pindah halaman
            document.querySelectorAll(".pagination a").forEach(link => {
                link.addEventListener("click", function () {
                    localStorage.setItem("scrollPosition", window.scrollY);
                });
            });
        });
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>