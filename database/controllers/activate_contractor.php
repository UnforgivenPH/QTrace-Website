<?php
// Database connection
require('../connection/connection.php');
require('audit_service.php');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get contractor ID from URL
$contractor_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($contractor_id <= 0) {
    header("Location: /QTrace-Website/pages/admin/list_contractor.php?status=error");
    exit();
}

// Fetch old status for audit trail
$oldStatusQuery = "SELECT Contractor_Status FROM contractor_table WHERE Contractor_Id = ?";
$stmtOld = $conn->prepare($oldStatusQuery);
$stmtOld->bind_param("i", $contractor_id);
$stmtOld->execute();
$oldResult = $stmtOld->get_result();
$oldData = $oldResult->fetch_assoc();
$oldStatus = $oldData ? $oldData['Contractor_Status'] : null;

// Activate contractor account
$stmt = $conn->prepare("UPDATE contractor_table SET Contractor_Status = 'active' WHERE Contractor_Id = ?");
$stmt->bind_param("i", $contractor_id);
$stmt->execute();

// Log the activation to audit trail
$auditService = new AuditService($conn);
$currentUserId = $_SESSION['user_ID'] ?? null;

$oldVals = ['Contractor_Status' => $oldStatus];
$newVals = ['Contractor_Status' => 'active'];

$auditService->log($currentUserId, 'UPDATE', 'Contractor', $contractor_id, $oldVals, $newVals);

$msg = urlencode("Contractor activated successfully.");
header("Location: /QTrace-Website/pages/admin/list_contractor.php?status=success&msg=$msg");
exit();
?>
