<?php
require('../../database/connection/connection.php');

// Get Contractor ID from URL
$contractor_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($contractor_id <= 0) {
    die("Invalid Contractor ID.");
}

try {
    // 1. Fetch Main Contractor Profile
    $stmt = $conn->prepare("SELECT * FROM contractor_table WHERE Contractor_Id = ?");
    $stmt->bind_param("i", $contractor_id);
    $stmt->execute();
    $contractor = $stmt->get_result()->fetch_assoc();

    if (!$contractor) {
        die("Contractor not found.");
    }

    // 2. Fetch Expertise/Skills
    $stmtEx = $conn->prepare("SELECT Expertise FROM contractor_expertise_table WHERE Contractor_Id = ?");
    $stmtEx->bind_param("i", $contractor_id);
    $stmtEx->execute();
    $expertise_res = $stmtEx->get_result();
    $expertise = $expertise_res->fetch_all(MYSQLI_ASSOC);

    // 3. Fetch Legal Documents
    $stmtDoc = $conn->prepare("SELECT * FROM contractor_documents_table WHERE Contractor_Id = ?");
    $stmtDoc->bind_param("i", $contractor_id);
    $stmtDoc->execute();
    $documents_res = $stmtDoc->get_result();
    $documents = $documents_res->fetch_all(MYSQLI_ASSOC);

    // 4. Fetch Projects with Details
    $stmtProj = $conn->prepare("
        SELECT p.*, pd.ProjectDetails_Title, pd.ProjectDetails_Description 
        FROM projects_table p
        LEFT JOIN projectdetails_table pd ON p.Project_ID = pd.Project_ID
        WHERE p.Contractor_ID = ? 
        ORDER BY p.Project_CreatedAt DESC
    ");
    $stmtProj->bind_param("i", $contractor_id);
    $stmtProj->execute();
    $projects_res = $stmtProj->get_result();
    $projects = $projects_res->fetch_all(MYSQLI_ASSOC);

} catch (mysqli_sql_exception $e) {
    die("Database Error: " . $e->getMessage());
}
?>