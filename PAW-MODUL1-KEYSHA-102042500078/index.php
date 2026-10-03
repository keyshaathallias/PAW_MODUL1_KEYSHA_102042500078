<?php

    $products = [
        [
            "nama"      => "ASUS Vivobook 15",
            "kategori"  => "Laptop",
            "harga"     => 8500000,
            "stok"      => 5,
            "gambar"    => "images/laptop.jpg"
        ],
        [
            "nama"      => "Logitech G102",
            "kategori"  => "Mouse",
            "harga"     => 350000,
            "stok"      => 10,
            "gambar"    => "images/mouse.jpg"
        ],
        [
            "nama"      => "Magic Keyboard Folio",
            "kategori"  => "Keyboard",
            "harga"     => 3499000,
            "stok"      => 4,
            "gambar"    => "images/keyboard.jpg"
        ],
        [
            "nama"      => "iPhone Duo",
            "kategori"  => "Smartphone",
            "harga"     => 42000000,
            "stok"      => 3,
            "gambar"    => "images/iphone.png"
        ],
        [
            "nama"      => "iPhone 18 Pro Max 2TB",
            "kategori"  => "Smartphone",
            "harga"     => 49999000,
            "stok"      => 0,
            "gambar"    => "images/phone.png"
        ],
        [
            "nama"      => "JBL Tune 770NC",
            "kategori"  => "Headphone",
            "harga"     => 950000,
            "stok"      => 7,
            "gambar"    => "images/headphone.png"
        ]
    ];

    $jumlahProduk = count($products);

    function rupiah($harga)
    {
        return "Rp " . number_format($harga, 0, ',', '.');
    }

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cia Store | Modul 1</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="icon" type="image/x-icon" href="images/favicon.jfif">

    <link
        href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&family=Pattaya&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="page">
        <header class="navbar">
            <a href="#home" class="logo">
                Cia<span>Store.</span>
            </a>

            <nav>
                <a href="#home">Home</a>
                <a href="#products">Products</a>
                <a href="#about">About</a>
            </nav>

            <a href="#products" class="nav-button">
                Shop Now <span>↗</span>
            </a>
        </header>

        <section class="hero" id="home">
            <div class="hero-content">
                <div class="small-label">
                    ✦ WELCOME TO CIA STORE ✦
                </div>
                <h1>
                    Tech You'll
                    <span>Love to Use.</span>
                </h1>
                <p>
                    Temukan perangkat dan aksesoris teknologi pilihan
                    untuk menemani aktivitas digital kamu sehari-hari.
                </p>

                <div class="hero-actions">
                    <a href="#products" class="primary-button">
                        Explore Products <span>↗</span>
                    </a>

                    <div class="mini-info">
                        <strong><?php echo $jumlahProduk; ?>+</strong>
                        <span>Products<br>available</span>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="visual-card">
                    <div class="visual-label">CIA'S PICK ✦</div>
                    <img src="images/phone.png" alt="iPhone 18 Pro Max 2TB">
                    <div class="visual-caption">
                        <span>iPhone 18 Pro Max 2TB</span>
                    </div>
                </div>
                <div class="sticker sticker-one">NEW<br>STUFF!</div>
                <div class="sticker sticker-two">10%<br>OFF</div>
            </div>

        </section>

        <section class="section-heading" id="products">
            <div>
                <div class="small-label">✦ OUR COLLECTION ✦</div>
                <h2> Picked Just for You<br></h2>
            </div>

            <div class="product-total">
                <strong><?php echo $jumlahProduk; ?></strong>
                <span>products<br>in store</span>
            </div>
        </section>

        <section class="product-grid">
            <?php foreach ($products as $product): ?>

            <?php
                if ($product["stok"] > 0) {
                    $status = "Tersedia";
                    $statusClass = "available";
                } else {
                    $status = "Stok Habis";
                    $statusClass = "sold-out";
                }

                $mendapatDiskon = $product["harga"] >= 1000000;

                if ($mendapatDiskon) {
                    $diskon = 10;
                    $hargaDiskon = $product["harga"] - ($product["harga"] * $diskon / 100);
                }
            ?>

            <article class="product-card">
                <div class="product-photo">
                    <?php if ($mendapatDiskon): ?>
                    <span class="discount-badge">10% OFF</span>
                    <?php endif; ?>

                    <img src="<?php echo $product["gambar"]; ?>" alt="<?php echo $product["nama"]; ?>">

                    <span class="category-badge"><?php echo $product["kategori"]; ?></span>
                </div>

                <div class="product-content">
                    <div class="product-top">
                        <span class="stock <?php echo $statusClass; ?>">
                            <i class="bi bi-circle-fill"></i>
                            <?php echo $status; ?>
                        </span>

                        <span class="stock-number">
                            <?php echo $product["stok"]; ?> pcs
                        </span>
                    </div>

                    <h3><?php echo $product["nama"]; ?></h3>

                    <div class="price">
                        <?php if ($mendapatDiskon): ?>
                        <span class="normal-price">
                            <?php echo rupiah($product["harga"]); ?>
                        </span>
                        <strong>
                            <?php echo rupiah($hargaDiskon); ?>
                        </strong>

                        <?php else: ?>

                        <strong>
                            <?php echo rupiah($product["harga"]); ?>
                        </strong>

                        <?php endif; ?>
                    </div>

                    <?php if ($product["stok"] > 0): ?>

                    <button class="buy-button">
                        Beli Sekarang
                        <span>↗</span>
                    </button>

                    <?php else: ?>

                    <button class="buy-button disabled" disabled>
                        Stok Habis
                    </button>

                    <?php endif; ?>
                </div>
            </article>
            <?php endforeach; ?>
        </section>

        <footer>
            <span>© 2026 Cia Store</span>
            <span>Made with
                <span class="heart">♥</span> by
                <a href="https://keyshaathallias.github.io/personal-web" target="_blank">Keysha Athallia</a>
            </span>
        </footer>
    </main>
</body>

</html>