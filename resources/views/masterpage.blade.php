<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        /* Custom styles for this page */
        .hero-slide {
            height: 400px;
            object-fit: cover;
        }
        .news-card {
            transition: transform 0.3s;
            height: 100%;
        }
        .news-card:hover {
            transform: translateY(-5px);
        }
        .news-card-img {
            height: 180px;
            object-fit: cover;
        }
        .category-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .category-title:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: #0d6efd;
        }
        .ad-box {
            background: #f8f9fa;
            border: 1px dashed #dee2e6;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .ad-box img {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">NewsPortal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Politics</a></li>
                            <li><a class="dropdown-item" href="#">Business</a></li>
                            <li><a class="dropdown-item" href="#">Technology</a></li>
                            <li><a class="dropdown-item" href="#">Sports</a></li>
                            <li><a class="dropdown-item" href="#">Entertainment</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search...">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Hero Slider with Auto-Play -->
   
    @yield('content')
    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6 mb-4">
                    <h5>NewsPortal</h5>
                    <p>Your trusted source for the latest news and updates from around the world.</p>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <h5>Categories</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Politics</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Business</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Technology</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Sports</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <h5>Connect With Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Facebook</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Twitter</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Instagram</a></li>
                        <li><a href="#" class="text-white text-decoration-none">YouTube</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2023 NewsPortal. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed with Bootstrap 5</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>