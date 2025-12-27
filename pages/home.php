<style>
    /* Hero background with dark blue overlay */
.hero-section {
    min-height: 100vh;
    background: linear-gradient(rgba(0, 48, 120, 0.85), rgba(0, 48, 120, 0.85)), 
                url('./assets/images/The_Heart_of_Quezon_City.jpg') no-repeat center center;
    background-size: cover;
    background-position: center;
    padding: 80px 0;
}

/* Custom color for the purple border */
.border-purple {
    border-left-color: #6f42c1 !important;
}

/* Search bar focus states */
.search-container input:focus {
    box-shadow: none;
}

/* Stat card hover effect */
.stat-card {
    transition: transform 0.3s ease;
    backdrop-filter: blur(5px); /* Adds a glassmorphism effect */
}

.stat-card:hover {
    transform: translateY(-5px);
}

/* Responsive Font Sizes */
@media (max-width: 768px) {
    .display-3 {
        font-size: 2.5rem;
    }
}
</style>

<?php
    include('././components/topNavigation.php');
?>

<header class="hero-section text-white d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <span class="badge rounded-pill bg-warning text-dark mb-4 py-2 px-3">
                    <i class="bi bi-shield-check me-1"></i> Official Quezon City Platform
                </span>
                
                <h1 class="display-3 fw-bold mb-3">Transparency in Every Project</h1>
                
                <p class="lead mb-5 col-md-10 opacity-75">
                    Track government projects, monitor progress, and report issues. QTRACE empowers 
                    Quezon City citizens to see where public funds go and ensure accountability.
                </p>

                <div class="search-container bg-white rounded-3 p-2 mb-5 shadow">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search for projects, barangays, or contractors...">
                        <button class="btn btn-primary px-4 py-2 rounded-2 fw-bold" type="button">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-md-4">
                <div class="stat-card p-4 rounded-4 bg-light bg-opacity-75 border-start border-4 border-success shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bold mb-0">3</h2>
                            <p class="text-muted mb-0 small uppercase">Active Projects</p>
                        </div>
                        <div class="stat-icon bg-white p-2 rounded-3 shadow-sm">
                            <i class="bi bi-graph-up-arrow text-success"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card p-4 rounded-4 bg-light bg-opacity-75 border-start border-4 border-primary shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bold mb-0">1</h2>
                            <p class="text-muted mb-0 small uppercase">Completed Projects</p>
                        </div>
                        <div class="stat-icon bg-white p-2 rounded-3 shadow-sm">
                            <i class="bi bi-check-circle text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card p-4 rounded-4 bg-light bg-opacity-75 border-start border-4 border-purple shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bold mb-0">1</h2>
                            <p class="text-muted mb-0 small uppercase">Resolved Citizen Reports</p>
                        </div>
                        <div class="stat-icon bg-white p-2 rounded-3 shadow-sm">
                            <i class="bi bi-file-text text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>