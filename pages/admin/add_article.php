<?php 
    $page_name = 'addArticle'; 
    include('../../database/connection/security.php');
    require('../../database/connection/connection.php');
    
    // Fetch active projects for dropdown
    $projects_sql = "SELECT pt.Project_ID, pd.ProjectDetails_Title 
                    FROM projects_table pt 
                    INNER JOIN projectdetails_table pd 
                    ON pt.Project_ID = pd.Project_ID 
                    WHERE pt.Project_Status != 'Disabled' 
                    ORDER BY pd.ProjectDetails_Title";
    $projects = $conn->query($projects_sql);
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Add an article via news link.">
        <meta name="author" content="ai-Deib">
        <link rel="icon" type="image/png" sizes="16x16" href="/QTrace-Website/assets/image/QTraceLogo.png">
        <title>QTrace — Add Article</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/QTrace-Website/assets/css/styles.css">
        <style>
            .nav-tabs .nav-link {color: #495057;border: 1px solid #dee2e6;border-bottom: none;border-radius: 0.25rem 0.25rem 0 0;}
            .nav-tabs .nav-link:hover {border-color: #dee2e6 #dee2e6 #dee2e6 #dee2e6;color: #0c63e4;}
            .nav-tabs .nav-link.active {color: #495057;background-color: #fff;border-color: #dee2e6 #dee2e6 #fff #dee2e6;border-bottom-color: transparent;}
            .tab-content {border: 1px solid #dee2e6;border-top: none;padding: 1rem;}
        </style>
    </head>
    <body>
        <div class="app-container">
            <?php include('../../components/header.php'); ?>
            <div class="content-area">
                <?php include('../../components/sideNavigation.php'); ?>
                <main class="main-view">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/QTrace-Website/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/QTrace-Website/list-article">Articles</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Article</li>
                            </ol>
                        </nav>
                        <div class="row mb-2">
                            <div class="col">
                                <h2 class="fw-bold">Add Article</h2>
                                <p>Create an entry via news link.</p>
                            </div>
                        </div>

                        <?php if(isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <div class="row g-3">
                            <div class="col-12 card border-0 shadow-sm p-3">
                                <form class="row g-3" action="/QTrace-Website/database/controllers/add_article.php" method="post" enctype="multipart/form-data">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label fw-medium color-black">Project <span class="text-danger">*</span></label>
                                        <select class="form-select" name="project" required>
                                            <option value="">-- Select Project --</option>
                                            <?php while($proj = $projects->fetch_assoc()): ?>
                                                <option value="<?= $proj['Project_ID'] ?>"><?= htmlspecialchars($proj['ProjectDetails_Title']) ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label class="form-label fw-medium color-black">Type</label>
                                        <select class="form-select" name="report_type">
                                            <option value="Article">Article</option>
                                            <option value="Update">Update</option>
                                            <option value="News">News</option>
                                            <option value="Report">Report</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label class="form-label fw-medium color-black">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="Draft">Draft</option>
                                            <option value="Published">Published</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-medium color-black">Description / Content <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" rows="4" placeholder="Enter article content or description" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-medium color-black">Article Image</label>
                                        <ul class="nav nav-tabs border-bottom" id="imageTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="upload-tab" data-bs-toggle="tab" data-bs-target="#upload" type="button" role="tab" aria-controls="upload" aria-selected="true">
                                                    <i class="bi bi-cloud-upload me-1"></i> Upload Image
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="url-tab" data-bs-toggle="tab" data-bs-target="#url-link" type="button" role="tab" aria-controls="url-link" aria-selected="false">
                                                    <i class="bi bi-link-45deg me-1"></i> Image URL
                                                </button>
                                            </li>
                                        </ul>
                                        <div class="tab-content border-start border-end border-bottom" id="imageTabContent">
                                            <div class="tab-pane fade show active" id="upload" role="tabpanel" aria-labelledby="upload-tab">
                                                <div class="mt-3">
                                                    <input type="file" class="form-control" name="article_image" accept="image/*" />
                                                    <small class="text-muted d-block mt-2">Supported: JPG, PNG, GIF, WebP (Max 5MB)</small>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="url-link" role="tabpanel" aria-labelledby="url-tab">
                                                <div class="mt-3">
                                                    <input type="url" class="form-control" name="photo_url" placeholder="https://example.com/image.jpg" />
                                                    <small class="text-muted d-block mt-2">Direct link to an image for this article</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 g-3">
                                        <div class="col-6">
                                            <a class="btn btn-outline-secondary w-100 fw-medium" href="/QTrace-Website/list-article">Cancel</a>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn bg-color-primary text-light w-100 fw-medium"><i class="bi bi-plus-lg me-1"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>
