<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_company_profile'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fyproject";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $conn->real_escape_string($_POST['Username']);
    $location = $conn->real_escape_string($_POST['Location']);
    $contact = $conn->real_escape_string($_POST['Contact']);
    $description = $conn->real_escape_string($_POST['description']);

    // Handle file upload
    $logo = null;
    if (isset($_FILES['input-file']) && $_FILES['input-file']['error'] === UPLOAD_ERR_OK) {
        $logo = file_get_contents($_FILES['input-file']['tmp_name']);
    }

    // Hash the password
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $sql = "UPDATE business SET 
            name = ?, 
            password = ?, 
            location = ?, 
            contact = ?, 
            description = ?";
    if ($logo !== null) {
        $sql .= ", logo = ?";
    }
    $sql .= " WHERE id = ?";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    if ($logo !== null) {
        $stmt->bind_param("ssssssi", $name, $hashed_password, $location, $contact, $description, $logo, $id);
    } else {
        $stmt->bind_param("sssssi", $name, $hashed_password, $location, $contact, $description, $id);
    }

    // Set the ID to update (assuming a single record, adjust as necessary)
    $id = $_POST['id']; // Change this as necessary

    // Execute the statement
    if ($stmt->execute()) {
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
