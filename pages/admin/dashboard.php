<?php 
    $page_name = 'dashboard'; 
    include('../../database/connection/security.php');
    require('../../database/controllers/get_admin_dashboard.php');
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="QTrace is the official Quezon City Transparency Platform, enabling citizens to track government projects, monitor progress, and report issues for greater accountability.">
        <meta name="author" content="Confractus">
        <link rel="icon" type="image/png" sizes="16x16" href="">
        <title>QTrace - Quezon City Transparency Platform</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/QTrace-Website/assets/css/styles.css">
        <style>
            :root {
                --sidebar-width: 280px;
                --header-height: 65px;
            }

            .stat-card {
                border: 0;
                border-radius: 16px;
                background: #fff;
            }

            .stat-icon {
                width: 44px;
                height: 44px;
                border-radius: 12px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 1.2rem;
            }

            .analytics-card {
                border-radius: 16px;
                border: 0;
            }

            .progress {
                height: 8px;
                background-color: #f1f3f5;
            }

            .badge-soft {
                padding: 0.4rem 0.6rem;
                border-radius: 999px;
                font-weight: 600;
            }

            .chart-container {
                position: relative;
                height: 240px;
            }

            .chart-legend {
                display: grid;
                gap: 0.5rem;
            }

            .legend-item {
                display: flex;
                align-items: center;
                justify-content: space-between;
                font-size: 0.85rem;
                color: #6c757d;
            }

            .legend-label {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
            }

            .legend-dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
            }
        </style>
    </head>
    <body style="background-color: var(--bg-light);">
        <div class="app-container">
            <?php
                include('../../components/header.php');
            ?>
    
            <div class="content-area">
                <?php
                    include('../../components/sideNavigation.php');
                ?>

                <main class="main-view">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <!-- Breadcrumb -->
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                <a href="/QTrace-Website/dashboard ">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"></li>
                            </ol>
                        </nav>

                        <div class="d-flex flex-wrap justify-content-between align-items-top mb-4 t">
                            <div class="row mb-0">
                                <div class="col">
                                    <h2 class="fw-bold">Dashboard Overview</h2>
                                    <p>Live operational insights from QTrace data</p>
                                </div>
                            </div>
                            <div class="text-muted small" id="dashboardUpdatedAt"> <?= date('M d, Y • h:i A'); ?></div>
                        </div>

                        <div class="row g-3">
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card stat-card shadow-sm p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <span class="text-muted small fw-bold text-uppercase">Total Projects</span>
                                            <h3 class="fw-bold m-0 mt-1"><?= $totalProjects ?></h3>
                                        </div>
                                        <span class="stat-icon bg-primary bg-opacity-10 text-primary">
                                            <i class="bi bi-building"></i>
                                        </span>
                                    </div>
                                    <small class="text-muted"><?= $projectStatus['Ongoing'] ?? 0 ?> ongoing</small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card stat-card shadow-sm p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <span class="text-muted small fw-bold text-uppercase">Total Budget</span>
                                            <h3 class="fw-bold m-0 mt-1"><?= formatCurrency($totalBudget) ?></h3>
                                        </div>
                                        <span class="stat-icon bg-success bg-opacity-10 text-success">
                                            <i class="bi bi-cash-coin"></i>
                                        </span>
                                    </div>
                                    <small class="text-muted">Across <?= $totalProjects ?> projects</small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card stat-card shadow-sm p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <span class="text-muted small fw-bold text-uppercase">Total Reports</span>
                                            <h3 class="fw-bold m-0 mt-1"><?= $totalReports ?></h3>
                                        </div>
                                        <span class="stat-icon bg-warning bg-opacity-10 text-warning">
                                            <i class="bi bi-flag"></i>
                                        </span>
                                    </div>
                                    <small class="text-muted"><?= array_sum($reportStatus) ?> total incidents</small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="card stat-card shadow-sm p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <span class="text-muted small fw-bold text-uppercase">Registered Users</span>
                                            <h3 class="fw-bold m-0 mt-1"><?= $totalUsers ?></h3>
                                        </div>
                                        <span class="stat-icon bg-info bg-opacity-10 text-info">
                                            <i class="bi bi-people"></i>
                                        </span>
                                    </div>
                                    <small class="text-muted"><?= $userRoles['citizen'] ?? 0 ?> citizens</small>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mt-2">
                            <div class="col-12 col-lg-5">
                                <div class="card analytics-card shadow-sm p-4 h-100">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="fw-bold mb-0">Project Status</h5>
                                        <span class="badge bg-light text-dark"><?= $totalProjects ?> total</span>
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-12 col-md-7">
                                            <div class="chart-container">
                                                <canvas id="projectStatusChart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <div class="chart-legend">
                                                <?php foreach ($projectStatus as $status => $count): ?>
                                                    <?php $percent = $totalProjects > 0 ? round(($count / $totalProjects) * 100) : 0; ?>
                                                    <div class="legend-item">
                                                        <span class="legend-label">
                                                            <span class="legend-dot" data-status="<?= htmlspecialchars($status) ?>"></span>
                                                            <?= htmlspecialchars($status) ?>
                                                        </span>
                                                        <span><?= $count ?> (<?= $percent ?>%)</span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card analytics-card shadow-sm p-4 h-100">
                                    <h5 class="fw-bold mb-3">Project Insights</h5>
                                    <?php if (!empty($projectCategories)): ?>
                                        <?php foreach ($projectCategories as $category => $count): ?>
                                            <?php $percent = $maxCategoryCount > 0 ? round(($count / $maxCategoryCount) * 100) : 0; ?>
                                            <div class="mb-3">
                                                <div class="d-flex justify-content-between small text-muted mb-1">
                                                    <span><?= htmlspecialchars($category) ?></span>
                                                    <span><?= $count ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" style="width: <?= $percent ?>%"></div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p class="text-muted">No categories available.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="card analytics-card shadow-sm p-4 h-100">
                                    <h5 class="fw-bold mb-3">Quick Insights</h5>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Contractors</span>
                                        <span class="badge bg-primary bg-opacity-10 text-primary badge-soft"><?= $totalContractors ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Articles</span>
                                        <span class="badge bg-success bg-opacity-10 text-success badge-soft"><?= $totalArticles ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Milestones</span>
                                        <span class="badge bg-warning bg-opacity-10 text-warning badge-soft"><?= $totalMilestones ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted">Documents</span>
                                        <span class="badge bg-info bg-opacity-10 text-info badge-soft"><?= $totalDocuments ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mt-2">
                            <div class="col-12">
                                <div class="card analytics-card shadow-sm p-4 h-100">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="fw-bold mb-0">Report Status</h5>
                                        <span class="badge bg-light text-dark"><?= $totalReports ?> total</span>
                                    </div>
                                    <?php if (!empty($reportStatus)): ?>
                                        <div class="row g-3 align-items-center">
                                            <div class="col-9">
                                                <div class="chart-container">
                                                    <canvas id="reportStatusChart"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="chart-legend">
                                                    <?php foreach ($reportStatus as $status => $count): ?>
                                                        <?php $percent = $totalReports > 0 ? round(($count / $totalReports) * 100) : 0; ?>
                                                        <div class="legend-item">
                                                            <span class="legend-label">
                                                                <span class="legend-dot" data-report-status="<?= htmlspecialchars($status) ?>"></span>
                                                                <?= htmlspecialchars($status) ?>
                                                            </span>
                                                            <span><?= $count ?> (<?= $percent ?>%)</span>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <p class="text-muted">No reports available.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row g-3 mt-2">
                            <div class="col-12 col-lg-7">
                                <div class=" analytics-card">
                                    <h5 class="fw-bold mb-3">Recent Projects</h5>
                                    <?php if (!empty($recentProjects)): ?>
                                        <div class="table-responsive">
                                            <table class="table table-sm align-middle mb-0">
                                                <thead class="table-light ">
                                                    <tr >
                                                        <th class="p-2">ID</th>
                                                        <th class="p-2">Project</th>
                                                        <th class="p-2">Status</th>
                                                        <th class="p-2">Barangay</th>
                                                        <th class="p-2">Budget</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($recentProjects as $project): ?>
                                                        <tr>
                                                            <td class="fw-bold">PRJ-<?= str_pad($project['Project_ID'], 3, '0', STR_PAD_LEFT) ?></td>
                                                            <td>
                                                                <div class="fw-semibold"><?= htmlspecialchars($project['ProjectDetails_Title'] ?? 'Untitled Project') ?></div>
                                                                <small class="text-muted"><?= htmlspecialchars($project['Project_Category'] ?? 'General') ?></small>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    $statusClass = 'bg-secondary';
                                                                    if($project['Project_Status'] == 'Ongoing') $statusClass = 'bg-primary';
                                                                    if($project['Project_Status'] == 'Completed') $statusClass = 'bg-success';
                                                                    if($project['Project_Status'] == 'Delayed') $statusClass = 'bg-danger';
                                                                    if($project['Project_Status'] == 'Planning') $statusClass = 'bg-info text-dark';
                                                                ?>
                                                                <span class="badge <?= $statusClass ?>">
                                                                    <?= htmlspecialchars($project['Project_Status']) ?>
                                                                </span>
                                                            </td>
                                                            <td><?= htmlspecialchars($project['ProjectDetails_Barangay'] ?? 'N/A') ?></td>
                                                            <td><?= formatCurrency($project['ProjectDetails_Budget'] ?? 0) ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else: ?>
                                        <p class="text-muted">No recent projects found.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="card analytics-card shadow-sm p-4 h-100">
                                    <h5 class="fw-bold mb-3">Recent Reports</h5>
                                    <?php if (!empty($recentReports)): ?>
                                        <div class="list-group list-group-flush">
                                            <?php foreach ($recentReports as $report): ?>
                                                <div class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <div class="fw-semibold"><?= htmlspecialchars($report['report_type'] ?? 'Report') ?></div>
                                                        </div>
                                                        <div class="col-2 d-flex justify-content-end">
                                                            <span class="badge bg-warning bg-opacity-10 text-warning">
                                                                <?= htmlspecialchars($report['report_status'] ?? 'Pending') ?>
                                                            </span>
                                                        </div>

                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <small class="text-muted"><?= htmlspecialchars($report['ProjectDetails_Title'] ?? 'Project') ?></small>
                                                        </div>
                                                        
                                                    </div>
                                                    <small class="text-muted small"><?= date('M d, Y h:i A', strtotime($report['report_CreatedAt'])) ?></small>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php else: ?>
                                        <p class="text-muted">No reports available.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
            
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    <!-- Custome Script For This Page Only  --> 
    <script>
        const projectStatusData = <?php echo json_encode($projectStatus); ?>;
        const reportStatusData = <?php echo json_encode($reportStatus); ?>;

        const updateTimestamp = () => {
            const now = new Date();
            const options = {
                month: 'short',
                day: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            };
            const formatted = now.toLocaleString('en-US', options)
                .replace(',', '')
                .replace(' ', ' • ');
            const updatedEl = document.getElementById('dashboardUpdatedAt');
            if (updatedEl) {
                updatedEl.textContent = ` ${formatted}`;
            }
        };

        updateTimestamp();
        setInterval(updateTimestamp, 60000);

        const formatAbbrev = (value) => {
            const absValue = Math.abs(value);
            const suffixes = [
                { value: 1e12, suffix: 'T' },
                { value: 1e9, suffix: 'B' },
                { value: 1e6, suffix: 'M' },
                { value: 1e3, suffix: 'K' }
            ];

            for (const item of suffixes) {
                if (absValue >= item.value) {
                    const shortVal = value / item.value;
                    return `${parseFloat(shortVal.toFixed(2))}${item.suffix}`;
                }
            }
            return value.toString();
        };

        const projectStatusLabels = Object.keys(projectStatusData);
        const projectStatusValues = Object.values(projectStatusData);

        const reportStatusLabels = Object.keys(reportStatusData);
        const reportStatusValues = Object.values(reportStatusData);

        const statusColors = {
            Ongoing: '#0d6efd',
            Completed: '#198754',
            Delayed: '#dc3545',
            Planning: '#ffc107',
            Unknown: '#6c757d'
        };

        const reportLineColor = '#ffc107';

        const projectColors = projectStatusLabels.map(label => statusColors[label] || '#6c757d');

        if (document.getElementById('projectStatusChart')) {
            new Chart(document.getElementById('projectStatusChart'), {
                type: 'pie',
                data: {
                    labels: projectStatusLabels,
                    datasets: [{
                        data: projectStatusValues,
                        backgroundColor: projectColors,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        }

        if (document.getElementById('reportStatusChart')) {
            new Chart(document.getElementById('reportStatusChart'), {
                type: 'line',
                data: {
                    labels: reportStatusLabels,
                    datasets: [{
                        label: 'Reports',
                        data: reportStatusValues,
                        borderColor: reportLineColor,
                        backgroundColor: 'rgba(255, 193, 7, 0.2)',
                        pointBackgroundColor: reportLineColor,
                        pointRadius: 4,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: {
                            grid: { display: false }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0,
                                callback: (value) => formatAbbrev(value)
                            }
                        }
                    }
                }
            });
        }

        // Apply legend dot colors
        document.querySelectorAll('[data-status]').forEach(dot => {
            const status = dot.getAttribute('data-status');
            dot.style.backgroundColor = statusColors[status] || '#6c757d';
        });

        document.querySelectorAll('[data-report-status]').forEach(dot => {
            dot.style.backgroundColor = reportLineColor;
        });
    </script>
         
    <!-- Reusable Script -->
     <script src="/QTrace-Website/assets/js/mouseMovement.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>
