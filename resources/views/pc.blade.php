<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spareparts - E-Commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/pc.css">
</head>

<body>
    <nav>
        <div>
            <ul>
                <li class="brand">
                    <i class="fa-solid fa-house-laptop"></i>

                </li>
            </ul>
        </div>
        <div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li class="on"><a href="pc.php">Pc</a></li>
                <li><a href="#">Laptop</a></li>
                <li><a href="#">Sparepart</a></li>
                <li>
                    <a href="{{ route('index') }}">Dashboard</a>
                </li>
                <li>
                    <a href="/login" id="User">
                        <i class="fa-solid fa-user ikon-desktop"></i>
                        <span class="text-mobile">Login</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <section class="home-section">
        <!-- Product Grid -->
        <div class="product-grid">

        </div>
    </section>

    <script>
        // Hamburger Menu Toggle
        const hamburgerMenu = document.querySelector('.hamburger-menu');
        hamburgerMenu.addEventListener('click', () => {
            hamburgerMenu.classList.toggle("active");
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle("active");
            console.log('mana');
        });
    </script>
</body>

</html>

<?php

?>
