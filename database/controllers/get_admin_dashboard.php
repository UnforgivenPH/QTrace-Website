<?php
require(__DIR__ . '/../connection/connection.php');

function formatAbbreviatedNumber($value) {
    $value = (float)$value;
    $absValue = abs($value);
    $suffixes = [
        12 => 'T',
        9 => 'B',
        6 => 'M',
        3 => 'K'
    ];
    foreach ($suffixes as $power => $suffix) {
        if ($absValue >= pow(10, $power)) {
            $short = $value / pow(10, $power);
            return rtrim(rtrim(number_format($short, 2), '0'), '.') . $suffix;
        }
    }
    return rtrim(rtrim(number_format($value, 2), '0'), '.');
}

function formatCurrency($amount) {
    return '₱' . formatAbbreviatedNumber($amount);
}

function safeCount($result, $key = 'total') {
    if (!$result || $result->num_rows === 0) {
        return 0;
    }
    $row = $result->fetch_assoc();
    return isset($row[$key]) ? (int)$row[$key] : 0;
}

// Core totals
$totalProjects = safeCount($conn->query("SELECT COUNT(*) AS total FROM projects_table"));
$totalContractors = safeCount($conn->query("SELECT COUNT(*) AS total FROM contractor_table"));
$totalUsers = safeCount($conn->query("SELECT COUNT(*) AS total FROM user_table"));
$totalArticles = safeCount($conn->query("SELECT COUNT(*) AS total FROM articles_table"));
$totalReports = safeCount($conn->query("SELECT COUNT(*) AS total FROM report_table"));
$totalMilestones = safeCount($conn->query("SELECT COUNT(*) AS total FROM projectmilestone_table"));
$totalDocuments = safeCount($conn->query("SELECT COUNT(*) AS total FROM projectsdocument_table"));

// Budget analytics
$totalBudgetResult = $conn->query("SELECT SUM(ProjectDetails_Budget) AS total_budget FROM projectdetails_table");
$totalBudget = 0;
if ($totalBudgetResult && $totalBudgetResult->num_rows > 0) {
    $totalBudget = (float)($totalBudgetResult->fetch_assoc()['total_budget'] ?? 0);
}

// Project status breakdown
$projectStatus = [
    'Ongoing' => 0,
    'Completed' => 0,
    'Delayed' => 0,
    'Planning' => 0
];
$projectStatusResult = $conn->query("SELECT Project_Status, COUNT(*) AS total FROM projects_table GROUP BY Project_Status");
if ($projectStatusResult) {
    while ($row = $projectStatusResult->fetch_assoc()) {
        $status = $row['Project_Status'] ?? 'Unknown';
        $projectStatus[$status] = (int)$row['total'];
    }
}

// Report status breakdown
$reportStatus = [];
$reportStatusResult = $conn->query("SELECT report_status, COUNT(*) AS total FROM report_table GROUP BY report_status");
if ($reportStatusResult) {
    while ($row = $reportStatusResult->fetch_assoc()) {
        $status = $row['report_status'] ?: 'Unspecified';
        $reportStatus[$status] = (int)$row['total'];
    }
}

// User roles
$userRoles = [
    'admin' => 0,
    'citizen' => 0
];
$userRoleResult = $conn->query("SELECT user_Role, COUNT(*) AS total FROM user_table GROUP BY user_Role");
if ($userRoleResult) {
    while ($row = $userRoleResult->fetch_assoc()) {
        $role = $row['user_Role'] ?? 'citizen';
        $userRoles[$role] = (int)$row['total'];
    }
}

// Articles status
$articleStatus = [
    'Published' => 0,
    'Draft' => 0,
    'Archived' => 0
];
$articleStatusResult = $conn->query("SELECT article_status, COUNT(*) AS total FROM articles_table GROUP BY article_status");
if ($articleStatusResult) {
    while ($row = $articleStatusResult->fetch_assoc()) {
        $status = $row['article_status'] ?? 'Draft';
        $articleStatus[$status] = (int)$row['total'];
    }
}

// Project categories
$projectCategories = [];
$projectCategoryResult = $conn->query("SELECT Project_Category, COUNT(*) AS total FROM projects_table GROUP BY Project_Category ORDER BY total DESC");
if ($projectCategoryResult) {
    while ($row = $projectCategoryResult->fetch_assoc()) {
        $category = $row['Project_Category'] ?: 'Uncategorized';
        $projectCategories[$category] = (int)$row['total'];
    }
}
$maxCategoryCount = !empty($projectCategories) ? max($projectCategories) : 0;

// Recent projects
$recentProjects = [];
$recentProjectsResult = $conn->query("SELECT 
                                        p.Project_ID, 
                                        p.Project_Status, 
                                        p.Project_Category, 
                                        p.Project_CreatedAt, 
                                        d.ProjectDetails_Title, 
                                        d.ProjectDetails_Budget, 
                                        d.ProjectDetails_Barangay 
                                        FROM projects_table p 
                                        LEFT JOIN projectdetails_table d 
                                        ON p.Project_ID = d.Project_ID 
                                        ORDER BY p.Project_CreatedAt 
                                        DESC LIMIT 8");
if ($recentProjectsResult) {
    while ($row = $recentProjectsResult->fetch_assoc()) {
        $recentProjects[] = $row;
    }
}

// Recent reports
$recentReports = [];
$recentReportsResult = $conn->query("SELECT 
                                        r.report_ID, 
                                        r.report_type, 
                                        r.report_status, 
                                        r.report_CreatedAt, 
                                        d.ProjectDetails_Title 
                                        FROM report_table r 
                                        LEFT JOIN projectdetails_table d 
                                        ON r.Project_ID = d.Project_ID 
                                        ORDER BY r.report_CreatedAt 
                                        DESC LIMIT 5");
if ($recentReportsResult) {
    while ($row = $recentReportsResult->fetch_assoc()) {
        $recentReports[] = $row;
    }
}
?>