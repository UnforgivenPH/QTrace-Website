<?php 
    $page_name = 'articleList'; 
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
            .pagination .page-link {
                color: #003366;
            }
            .pagination a.page-link:hover {
                background-color: #003366;
                color: white;
                border-color: #003366;
            }
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
                                <li class="breadcrumb-item">
                                    <a href="/QTrace-Website/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Articles</li>
                            </ol>
                        </nav>

                        <div class="row mb-4">
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
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <form method="GET" class="row g-3">
                                    <div class="col-lg-4">
                                        <label class="form-label fw-bold text-muted">Search</label>
                                        <input type="text" class="form-control" name="search" placeholder="Title or Description..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-label fw-bold text-muted">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="">All Status</option>
                                            <option value="Published" <?= ($_GET['status'] ?? '') === 'Published' ? 'selected' : '' ?>>Published</option>
                                            <option value="Draft" <?= ($_GET['status'] ?? '') === 'Draft' ? 'selected' : '' ?>>Draft</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-label fw-bold text-muted">Type</label>
                                        <select class="form-select" name="type">
                                            <option value="">All Types</option>
                                            <option value="News" <?= ($_GET['type'] ?? '') === 'News' ? 'selected' : '' ?>>News</option>
                                            <option value="Update" <?= ($_GET['type'] ?? '') === 'Update' ? 'selected' : '' ?>>Update</option>
                                            <option value="Announcement" <?= ($_GET['type'] ?? '') === 'Announcement' ? 'selected' : '' ?>>Announcement</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-label fw-bold text-muted">Barangay</label>
                                        <input type="text" class="form-control" name="barangay" placeholder="Barangay name..." value="<?= htmlspecialchars($_GET['barangay'] ?? '') ?>">
                                    </div>
                                    <div class="col-lg-2 d-flex align-items-end gap-2">
                                        <div class="col-6">
                                            <button class="btn bg-color-primary text-light fw-medium w-100" type="submit">Apply</button>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-outline-secondary w-100 fw-medium" href="<?= $_SERVER['PHP_SELF'] ?>">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Articles Table -->
                        <div class="card border-0 shadow-sm mb-4">
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
                                                    <td class="px-3 fw-bold">Art-<?= str_pad($article['article_ID'], 4, '0', STR_PAD_LEFT) ?></td>
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

                        <!-- Pagination -->
                        <?php if (!empty($pagination) && $pagination['total_pages'] > 0): ?>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div>
                                <small class="text-muted">
                                    Showing 
                                    <span><?php echo (($pagination['current_page'] - 1) * $pagination['per_page']) + 1; ?></span> 
                                    to 
                                    <span><?php echo min($pagination['current_page'] * $pagination['per_page'], $pagination['total_records']); ?></span> 
                                    of 
                                    <span><?php echo $pagination['total_records']; ?></span> 
                                    articles
                                </small>
                            </div>
                            <nav>
                                <ul class="pagination mb-0">
                                    <li class="page-item <?php echo $pagination['current_page'] === 1 ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo max(1, $pagination['current_page'] - 1); ?>&search=<?php echo urlencode($_GET['search'] ?? ''); ?>&status=<?php echo urlencode($_GET['status'] ?? ''); ?>&type=<?php echo urlencode($_GET['type'] ?? ''); ?>&barangay=<?php echo urlencode($_GET['barangay'] ?? ''); ?>">Previous</a>
                                    </li>
                                    <li class="page-item"><span class="page-link"><?php echo $pagination['current_page']; ?> of <?php echo $pagination['total_pages']; ?></span></li>
                                    <li class="page-item <?php echo $pagination['current_page'] === $pagination['total_pages'] ? 'disabled' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo min($pagination['total_pages'], $pagination['current_page'] + 1); ?>&search=<?php echo urlencode($_GET['search'] ?? ''); ?>&status=<?php echo urlencode($_GET['status'] ?? ''); ?>&type=<?php echo urlencode($_GET['type'] ?? ''); ?>&barangay=<?php echo urlencode($_GET['barangay'] ?? ''); ?>">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
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
