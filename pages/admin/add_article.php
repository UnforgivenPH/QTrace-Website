<?php 
    $page_name = 'Add Article'; 
    include('../../database/connection/security.php');    
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Add an article via news link.">
        <meta name="author" content="Confractus">
        <title>QTrace — Add Article</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/QTrace-Website/assets/css/styles.css">
    </head>
    <body style="background-color: var(--bg-light);">
        <div class="app-container">
            <?php include('../../components/header.php'); ?>
            <div class="content-area">
                <?php include('../../components/sideNavigation.php'); ?>
                <main class="main-view">
                    <div class="container-fluid">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <div class="text-uppercase small text-muted fw-bold">Reports</div>
                                <h1 class="h4 fw-bold m-0">Add Article</h1>
                                <p class="text-muted m-0">Create an entry via news link.</p>
                                <nav class="mt-2" aria-label="breadcrumb">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/QTrace-Website/dashboard">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="/QTrace-Website/reports">Reports</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Article</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <form class="row g-3" action="#" method="post">
                                    <div class="col-12 col-md-4">
                                        <label class="form-label small text-muted">Project</label>
                                        <select class="form-select form-select-sm" name="project" required>
                                            <option value="project-a">Sample Project A</option>
                                            <option value="project-b">Sample Project B</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <label class="form-label small text-muted">Type</label>
                                        <select class="form-select form-select-sm" name="kicker">
                                            <option value="Article">Article</option>
                                            <option value="Update">Update</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <label class="form-label small text-muted">Date</label>
                                        <input type="date" class="form-control form-control-sm" name="date" required />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small text-muted">News Link</label>
                                        <input type="url" class="form-control form-control-sm" name="link" placeholder="https://www.inquirer.net/..." required />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label small text-muted">Headline</label>
                                        <input type="text" class="form-control form-control-sm" name="headline" placeholder="Headline" required />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label small text-muted">Author / Source</label>
                                        <input type="text" class="form-control form-control-sm" name="meta" placeholder="Reporter • Source" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small text-muted">Excerpt</label>
                                        <textarea class="form-control form-control-sm" name="excerpt" rows="3" placeholder="Short summary"></textarea>
                                    </div>
                                    <div class="col-12 d-flex gap-2 justify-content-end">
                                        <a class="btn btn-outline-secondary btn-sm" href="/QTrace-Website/reports">Cancel</a>
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i> Save</button>
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
