<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SPAREPART KOMPUTER</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <?php session_start(); ?>
    <nav>
        <div>
            <ul>
                <li>
                    <div class="brand">
                        <i class="fa-solid fa-house-laptop"></i>
                    </div>
                </li>
            </ul>
        </div>
        <div>
            <ul class="nav-links">
                <li class="on"><a href="index.php">Home</a></li>
                <li><a href="/pc">Pc</a></li>
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

    <div class="img-1">
        <img class="img-in" src="img/komputer.avif" alt="" />
        <p class="paragraf-0">
            "Success is the result of hard work and dedication."
        </p>
    </div>
    <div class="img">
        <img class="img-in-0" src="img/bg.jpg" alt="" />
        <img class="img-in-0" src="img/komputer-3.avif" alt="" />
    </div>
    <div class="jarak">Content</div>
    <div class="container-img">
        <div class="img-2">
            <ul class="ul-1">
                <li>
                    <div class="img-wrapper">
                        <img class="img-in-1" src="img/bg.jpg" alt="" />
                        <p class="paragraf-2">Lorem ipsum, dolor sit amet consectetur</p>
                    </div>
                </li>
                <li>
                    <div class="img-wrapper">
                        <img class="img-in-1" src="img/komputer-3.avif" alt="" />
                        <p class="paragraf-2">Lorem ipsum, dolor sit amet consectetur</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="container-img">
        <div class="img-2">
            <ul class="ul-1">
                <li>
                    <div class="img-wrapper">
                        <img class="img-in-1" src="img/bg.jpg" alt="" />
                        <p class="paragraf-2">Lorem ipsum, dolor sit amet consectetur</p>
                    </div>
                </li>
                <li>
                    <div class="img-wrapper">
                        <img class="img-in-1" src="img/komputer-3.avif" alt="" />
                        <p class="paragraf-2">Lorem ipsum, dolor sit amet consectetur</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div style="color: aliceblue" class="jarak-footer">Jelajahi</div>
    <div class="footer">
        <div class="logo">
            <ul class="ul-1">
                <li>
                    <div class="img-wrapper-1">
                        <img class="img-in-2" src="img/bg.jpg" alt="" />
                    </div>
                </li>
                <li>
                    <div class="img-wrapper-1">
                        <img class="img-in-2" src="img/komputer-3.avif" alt="" />
                    </div>
                </li>
                <li>
                    <div class="img-wrapper-1">
                        <img class="img-in-2" src="img/bg.jpg" alt="" />
                    </div>
                </li>
                <li>
                    <div class="img-wrapper-1">
                        <img class="img-in-2" src="img/komputer-3.avif" alt="" />
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer-end">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit delectus
        harum temporibus perspiciatis vero sequi voluptatum porro vel tempora.
        Eius nobis eum provident eos est delectus quos numquam reiciendis inventore
    </div>
    <script src="js/index.js"></script>
</body>

</html>
