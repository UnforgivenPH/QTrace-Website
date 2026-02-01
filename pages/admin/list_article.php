<?php 
    $page_name = 'project_articles'; 
    include('../../database/connection/security.php');
    require('../../database/controllers/get_admin_articles_list.php');
    
    function formatBudget($amount) {
        return '₱' . number_format($amount, 2);
    }
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Article compilation per project in an editorial card view.">
        <meta name="author" content="ai-Deib">
        <title>QTrace — Articles</title>
        <!-- Bootstrap & Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <!-- Project Styles -->
        <link rel="stylesheet" href="/QTrace-Website/assets/css/styles.css">
        <style>
            .table-hover tbody tr { cursor: pointer; transition: background-color 0.2s; }
            .table-hover tbody tr:hover { background-color: #f8f9fa; }
            .badge { font-size: 0.75rem; padding: 0.25rem 0.5rem; }
            .filter-section { background: #fff; padding: 1rem; border-radius: 8px; margin-bottom: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
            .action-btn { padding: 0.25rem 0.5rem; font-size: 0.875rem; }
        </style>
    </head>
    <body style="background-color: var(--bg-light);">
        <div class="app-container">
            <?php include('../../components/header.php'); ?>

            <div class="content-area">
                <?php include('../../components/sideNavigation.php'); ?>

                <main class="main-view">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/QTrace-Website/dashboard">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Articles</li>
                            </ol>
                        </nav>

                        <div class="row mb-2">
                            <div class="col">
                                <h2 class="fw-bold">Articles</h2>
                                <p>Article, news, and updates compilation of Quezon City projects</p>
                            </div>
                        </div>

                        <?php if(isset($_SESSION['success_message'])): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-2"></i>
                                <?= $_SESSION['success_message']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            <?php unset($_SESSION['success_message']); ?>
                        <?php endif; ?>

                        <!-- Filter Section -->
                        <div class="filter-section">
                            <form method="GET" action="" id="filterForm">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-3">
                                        <label class="form-label small mb-1">Search</label>
                                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Title or Description..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label small mb-1">Status</label>
                                        <select class="form-select form-select-sm" name="status">
                                            <option value="">All Status</option>
                                            <option value="Published" <?= ($_GET['status'] ?? '') === 'Published' ? 'selected' : '' ?>>Published</option>
                                            <option value="Draft" <?= ($_GET['status'] ?? '') === 'Draft' ? 'selected' : '' ?>>Draft</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label small mb-1">Type</label>
                                        <select class="form-select form-select-sm" name="type">
                                            <option value="">All Types</option>
                                            <option value="News" <?= ($_GET['type'] ?? '') === 'News' ? 'selected' : '' ?>>News</option>
                                            <option value="Update" <?= ($_GET['type'] ?? '') === 'Update' ? 'selected' : '' ?>>Update</option>
                                            <option value="Announcement" <?= ($_GET['type'] ?? '') === 'Announcement' ? 'selected' : '' ?>>Announcement</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label small mb-1">Barangay</label>
                                        <input type="text" class="form-control form-control-sm" name="barangay" placeholder="Barangay name..." value="<?= htmlspecialchars($_GET['barangay'] ?? '') ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-sm btn-primary w-100"><i class="bi bi-funnel"></i> Filter</button>
                                        <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-sm btn-outline-secondary w-100 mt-1"><i class="bi bi-arrow-clockwise"></i> Reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted">Total: <?= $total_records ?> articles</span>
                            </div>
                            <a class="btn btn-primary btn-sm" href="/QTrace-Website/add-article"><i class="bi bi-plus-lg me-1"></i> Add Article</a>
                        </div>

                        <!-- Articles Table -->
                        <section class="card border-0 shadow-sm mb-4">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="px-3">ID</th>
                                                <th>Project Title</th>
                                                <th>Type</th>
                                                <th>Barangay</th>
                                                <th>Budget</th>
                                                <th>Author</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            // Combine featured and regular articles
                                            $all_articles = [];
                                            if ($featured_article) {
                                                $all_articles[] = $featured_article;
                                            }
                                            if ($articles_result && $articles_result->num_rows > 0) {
                                                while($article = $articles_result->fetch_assoc()) {
                                                    $all_articles[] = $article;
                                                }
                                            }
                                            ?>

                                            <?php if (count($all_articles) > 0): ?>
                                                <?php foreach($all_articles as $article): 
                                                    $statusBadges = array(
                                                        'Published' => 'bg-success',
                                                        'Draft' => 'bg-warning text-dark'
                                                    );
                                                    $badgeClass = isset($statusBadges[$article['article_status']]) ? $statusBadges[$article['article_status']] : 'bg-secondary';
                                                ?>
                                                <tr onclick="window.location.href='/QTrace-Website/view-article?id=<?= $article['article_ID'] ?>';">
                                                    <td class="px-3 fw-bold"><?= str_pad($article['article_ID'], 4, '0', STR_PAD_LEFT) ?></td>
                                                    <td>
                                                        <div class="fw-semibold"><?= htmlspecialchars($article['ProjectDetails_Title']) ?></div>
                                                        <small class="text-muted"><?= htmlspecialchars(substr($article['article_description'], 0, 60)) ?>...</small>
                                                    </td>
                                                    <td><span class="badge bg-info text-white"><?= htmlspecialchars($article['article_type']) ?></span></td>
                                                    <td><?= htmlspecialchars($article['ProjectDetails_Barangay']) ?></td>
                                                    <td><?= formatBudget($article['ProjectDetails_Budget']) ?></td>
                                                    <td><?= htmlspecialchars($article['author_name'] ?: 'Admin') ?></td>
                                                    <td><span class="badge <?= $badgeClass ?>"><?= htmlspecialchars($article['article_status']) ?></span></td>
                                                    <td><?= date('M d, Y', strtotime($article['article_created_at'])) ?></td>
                                                    <td class="text-center">
                                                        <div class="btn-group btn-group-sm" role="group" onclick="event.stopPropagation();">
                                                            <a href="/QTrace-Website/view-article?id=<?= $article['article_ID'] ?>" class="btn btn-outline-primary action-btn" title="View">
                                                                <i class="bi bi-eye"></i>
                                                            </a>
                                                            <a href="/QTrace-Website/edit-article?id=<?= $article['article_ID'] ?>" class="btn btn-outline-secondary action-btn" title="Edit">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="9" class="text-center py-5">
                                                        <i class="bi bi-folder-x fs-1 text-muted"></i>
                                                        <p class="mt-3 text-muted">No articles found. Click "Add Article" to create one.</p>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>

                        <!-- Pagination -->
                        <?php if ($total_pages > 1): ?>
                        <nav aria-label="Articles pagination">
                            <ul class="pagination justify-content-end">
                                <?php if ($page > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $page - 1 ?><?= isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : '' ?><?= isset($_GET['status']) ? '&status=' . urlencode($_GET['status']) : '' ?><?= isset($_GET['type']) ? '&type=' . urlencode($_GET['type']) : '' ?><?= isset($_GET['barangay']) ? '&barangay=' . urlencode($_GET['barangay']) : '' ?>">Previous</a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?><?= isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : '' ?><?= isset($_GET['status']) ? '&status=' . urlencode($_GET['status']) : '' ?><?= isset($_GET['type']) ? '&type=' . urlencode($_GET['type']) : '' ?><?= isset($_GET['barangay']) ? '&barangay=' . urlencode($_GET['barangay']) : '' ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($page < $total_pages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $page + 1 ?><?= isset($_GET['search']) ? '&search=' . urlencode($_GET['search']) : '' ?><?= isset($_GET['status']) ? '&status=' . urlencode($_GET['status']) : '' ?><?= isset($_GET['type']) ? '&type=' . urlencode($_GET['type']) : '' ?><?= isset($_GET['barangay']) ? '&barangay=' . urlencode($_GET['barangay']) : '' ?>">Next</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        <?php endif; ?>
                    </div>
                </main>
            </div>
        </div>

        <!-- Scripts -->
        <script src="/QTrace-Website/assets/js/mouseMovement.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>
