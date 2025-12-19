<!-- @section('cocoma')
@endsection -->
@extends('masterpage')
@section('content')
 <div id="heroSlider" class="carousel slide carousel-fade mb-4" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner rounded">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="d-block w-100 hero-slide" alt="Business Meeting">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Global Summit Addresses Climate Change</h5>
                    <p>World leaders gather to discuss urgent environmental policies.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1605&q=80" class="d-block w-100 hero-slide" alt="Basketball Game">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Championship Finals This Weekend</h5>
                    <p>Top teams compete for the season title in dramatic finale.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="d-block w-100 hero-slide" alt="Technology Circuit">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>New AI Breakthrough Announced</h5>
                    <p>Revolutionary algorithm changes how machines learn.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <!-- News Content -->
            <div class="col-lg-8">
                <!-- Hot News Section -->
                <div class="mb-5">
                    <h3 class="category-title">Hot News</h3>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" class="card-img-top news-card-img" alt="Political Meeting">
                                <div class="card-body">
                                    <h6 class="card-title">Political Shakeup in Parliament</h6>
                                    <small class="text-muted">2 hours ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top news-card-img" alt="Stock Market">
                                <div class="card-body">
                                    <h6 class="card-title">Stock Market Hits Record High</h6>
                                    <small class="text-muted">5 hours ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1575505586569-646b2ca898fc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1586&q=80" class="card-img-top news-card-img" alt="Medical Vaccine">
                                <div class="card-body">
                                    <h6 class="card-title">New Vaccine Approved</h6>
                                    <small class="text-muted">8 hours ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top news-card-img" alt="Celebrity Couple">
                                <div class="card-body">
                                    <h6 class="card-title">Celebrity Wedding Announcement</h6>
                                    <small class="text-muted">10 hours ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ads Row -->
                <div class="row mb-5">
                    <div class="col-md-6 mb-3">
                        <div class="ad-box">
                            <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Smartphone Ad">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="ad-box">
                            <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Coffee Ad">
                        </div>
                    </div>
                </div>

                <!-- Sports News Section -->
                <div class="mb-5">
                    <h3 class="category-title">Sports</h3>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1543357480-c60d400e7ef6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top news-card-img" alt="Soccer Match">
                                <div class="card-body">
                                    <h6 class="card-title">World Cup Qualifiers Results</h6>
                                    <small class="text-muted">Yesterday</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1547347298-4074fc3086f0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top news-card-img" alt="Olympic Pool">
                                <div class="card-body">
                                    <h6 class="card-title">Olympic Training Facilities</h6>
                                    <small class="text-muted">Yesterday</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1490&q=80" class="card-img-top news-card-img" alt="Basketball Player">
                                <div class="card-body">
                                    <h6 class="card-title">New Basketball Star Emerges</h6>
                                    <small class="text-muted">2 days ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top news-card-img" alt="Tennis Player">
                                <div class="card-body">
                                    <h6 class="card-title">Tennis Championship Preview</h6>
                                    <small class="text-muted">2 days ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technology News Section -->
                <div class="mb-5">
                    <h3 class="category-title">Technology</h3>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1567&q=80" class="card-img-top news-card-img" alt="New Smartphone">
                                <div class="card-body">
                                    <h6 class="card-title">New Smartphone Launch</h6>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1535378917042-10a22c95931a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1528&q=80" class="card-img-top news-card-img" alt="AI Technology">
                                <div class="card-body">
                                    <h6 class="card-title">AI Breakthrough in Medicine</h6>
                                    <small class="text-muted">4 days ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top news-card-img" alt="Cybersecurity">
                                <div class="card-body">
                                    <h6 class="card-title">Cybersecurity Threats Rise</h6>
                                    <small class="text-muted">4 days ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-4">
                            <div class="card news-card shadow-sm">
                                <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1583&q=80" class="card-img-top news-card-img" alt="Electric Car">
                                <div class="card-body">
                                    <h6 class="card-title">Future of Electric Vehicles</h6>
                                    <small class="text-muted">5 days ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Categories Widget -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">News Categories</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#" class="text-decoration-none">Politics</a>
                                <span class="badge bg-primary rounded-pill">24</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#" class="text-decoration-none">Business</a>
                                <span class="badge bg-primary rounded-pill">18</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#" class="text-decoration-none">Technology</a>
                                <span class="badge bg-primary rounded-pill">32</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#" class="text-decoration-none">Sports</a>
                                <span class="badge bg-primary rounded-pill">15</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#" class="text-decoration-none">Entertainment</a>
                                <span class="badge bg-primary rounded-pill">28</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#" class="text-decoration-none">Health</a>
                                <span class="badge bg-primary rounded-pill">12</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#" class="text-decoration-none">Science</a>
                                <span class="badge bg-primary rounded-pill">9</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Recent News Widget -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Recent News</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">New Economic Policy Announced</h6>
                                    <small>1 hour ago</small>
                                </div>
                                <small class="text-muted">Politics</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Tech Giant Reports Record Profits</h6>
                                    <small>3 hours ago</small>
                                </div>
                                <small class="text-muted">Business</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Championship Finals This Weekend</h6>
                                    <small>5 hours ago</small>
                                </div>
                                <small class="text-muted">Sports</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">New Streaming Series Breaks Records</h6>
                                    <small>7 hours ago</small>
                                </div>
                                <small class="text-muted">Entertainment</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Breakthrough in Cancer Research</h6>
                                    <small>9 hours ago</small>
                                </div>
                                <small class="text-muted">Health</small>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Newsletter Widget -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Newsletter</h5>
                    </div>
                    <div class="card-body">
                        <p>Subscribe to our newsletter for daily updates</p>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection