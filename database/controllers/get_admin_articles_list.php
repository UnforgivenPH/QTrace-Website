<?php

if (!isset($conn)) {
    include(__DIR__ . '/../connection/connection.php');
}

// --- 1. CONFIGURATION ---
$results_per_page = 10; // Articles per page

// --- 2. GET PAGE ---
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// --- 2.1 GET FILTER PARAMETERS ---
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$status = isset($_GET['status']) ? trim($_GET['status']) : '';
$type = isset($_GET['type']) ? trim($_GET['type']) : '';
$barangay = isset($_GET['barangay']) ? trim($_GET['barangay']) : '';

// Calculate Offset
$start_from = ($page - 1) * $results_per_page;

// --- 2.2 BUILD WHERE CLAUSE ---
$whereConditions = [];
$params = [];
$types = '';

if (!empty($search)) {
    $whereConditions[] = "(pd.ProjectDetails_Title LIKE ? OR a.article_description LIKE ?)";
    $searchParam = '%' . $search . '%';
    $params[] = $searchParam;
    $params[] = $searchParam;
    $types .= 'ss';
}

if (!empty($status)) {
    $whereConditions[] = "a.article_status = ?";
    $params[] = $status;
    $types .= 's';
}

if (!empty($type)) {
    $whereConditions[] = "a.article_type = ?";
    $params[] = $type;
    $types .= 's';
}

if (!empty($barangay)) {
    $whereConditions[] = "pd.ProjectDetails_Barangay LIKE ?";
    $params[] = '%' . $barangay . '%';
    $types .= 's';
}

$whereClause = !empty($whereConditions) ? ' WHERE ' . implode(' AND ', $whereConditions) : '';

// Calculate Offset
$start_from = ($page - 1) * $results_per_page;

// --- 3. GET FEATURED ARTICLE (NEWEST WITH FILTERS) ---
$featured_query = "
    SELECT 
        a.article_ID,
        a.article_type,
        a.article_description,
        a.article_photo_url,
        a.article_status,
        a.article_created_at,
        pt.Project_ID,
        pd.ProjectDetails_Title,
        pd.ProjectDetails_Barangay,
        pd.ProjectDetails_Budget,
        u.user_id,
        CONCAT(u.user_FirstName, ' ', u.user_LastName) as author_name
    FROM articles_table a
    INNER JOIN projects_table pt ON a.Project_ID = pt.Project_ID
    INNER JOIN projectdetails_table pd ON pt.Project_ID = pd.Project_ID
    LEFT JOIN user_table u ON a.user_ID = u.user_id
    $whereClause
    ORDER BY a.article_created_at DESC
    LIMIT 1
";

if (!empty($params)) {
    $featured_stmt = $conn->prepare($featured_query);
    $featured_stmt->bind_param($types, ...$params);
    $featured_stmt->execute();
    $featured_result = $featured_stmt->get_result();
    $featured_article = $featured_result->fetch_assoc();
    $featured_stmt->close();
} else {
    $featured_result = $conn->query($featured_query);
    $featured_article = $featured_result ? $featured_result->fetch_assoc() : null;
}

// --- 4. GET TOTAL ARTICLES COUNT (excluding featured, with filters) ---
$count_query = "
    SELECT COUNT(a.article_ID) as total
    FROM articles_table a
    INNER JOIN projects_table pt ON a.Project_ID = pt.Project_ID
    INNER JOIN projectdetails_table pd ON pt.Project_ID = pd.Project_ID
    LEFT JOIN user_table u ON a.user_ID = u.user_id
";

$countWhereConditions = $whereConditions;
$countParams = $params;
$countTypes = $types;

if ($featured_article) {
    $countWhereConditions[] = "a.article_ID != ?";
    $countParams[] = intval($featured_article['article_ID']);
    $countTypes .= 'i';
}

$countWhereClause = !empty($countWhereConditions) ? ' WHERE ' . implode(' AND ', $countWhereConditions) : '';
$count_query .= $countWhereClause;

if (!empty($countParams)) {
    $count_stmt = $conn->prepare($count_query);
    $count_stmt->bind_param($countTypes, ...$countParams);
    $count_stmt->execute();
    $count_result = $count_stmt->get_result();
    $count_row = $count_result->fetch_assoc();
    $total_records = $count_row['total'];
    $count_stmt->close();
} else {
    $count_result = $conn->query($count_query);
    $count_row = $count_result->fetch_assoc();
    $total_records = $count_row['total'];
}
$total_pages = ceil($total_records / $results_per_page);

if ($page > $total_pages && $total_pages > 0) {
    $page = $total_pages;
    $start_from = ($page - 1) * $results_per_page;
}

// --- 5. GET PAGINATED ARTICLES (with filters) ---
$articles_query = "
    SELECT 
        a.article_ID,
        a.article_type,
        a.article_description,
        a.article_photo_url,
        a.article_status,
        a.article_created_at,
        pt.Project_ID,
        pd.ProjectDetails_Title,
        pd.ProjectDetails_Barangay,
        pd.ProjectDetails_Budget,
        u.user_id,
        CONCAT(u.user_FirstName, ' ', u.user_LastName) as author_name
    FROM articles_table a
    INNER JOIN projects_table pt ON a.Project_ID = pt.Project_ID
    INNER JOIN projectdetails_table pd ON pt.Project_ID = pd.Project_ID
    LEFT JOIN user_table u ON a.user_ID = u.user_id
";

$articlesWhereConditions = $whereConditions;
$articlesParams = $params;
$articlesTypes = $types;

if ($featured_article) {
    $articlesWhereConditions[] = "a.article_ID != ?";
    $articlesParams[] = intval($featured_article['article_ID']);
    $articlesTypes .= 'i';
}

$articlesWhereClause = !empty($articlesWhereConditions) ? ' WHERE ' . implode(' AND ', $articlesWhereConditions) : '';
$articles_query .= $articlesWhereClause;
$articles_query .= " ORDER BY a.article_created_at DESC LIMIT ?, ?";

// Always add LIMIT parameters
$articlesParams[] = $start_from;
$articlesParams[] = $results_per_page;
$articlesTypes .= 'ii';

$articles_stmt = $conn->prepare($articles_query);
$articles_stmt->bind_param($articlesTypes, ...$articlesParams);
$articles_stmt->execute();
$articles_result = $articles_stmt->get_result();

if (!$articles_result) {
    error_log("Articles query error: " . $conn->error);
    $articles_result = null;
}

// --- 5. PAGINATION INFO ---
$pagination = array(
    'current_page' => $page,
    'total_pages' => $total_pages,
    'total_records' => $total_records,
    'per_page' => $results_per_page
);
?>
