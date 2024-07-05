<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $company_id = $_POST['company_id'];

    $sql = "DELETE FROM business WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $company_id);

    if ($stmt->execute()) {
        echo "Company deleted successfully";
    } else {
        echo "Error deleting company: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
