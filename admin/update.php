<?php 
$conn = new mysqli('localhost', 'root', '', 'fyproject');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // For User Data Update
    if (isset($_POST['update_user_data'])) {
        $email = $_POST['Email'];
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $bio = $_POST['bio'];
        
        $sql = "UPDATE users SET name=?, password=?, bio=? WHERE email=?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssss", $username, $password, $bio, $email);
            if ($stmt->execute()) {
                echo "User data updated successfully";
            } else {
                echo "Error updating user data: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }

    // For Company Profile Data Update
    if (isset($_POST['update_company_profile'])) {
        $email = $_POST['Email'];
        $name = $_POST['Username'];
        $location = $_POST['Location'];
        $contact = $_POST['Contact'];
        $description = $_POST['description'];
        
        $sql = "UPDATE companies SET name=?, location=?, contact=?, description=? WHERE email=?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssss", $name, $location, $contact, $description, $email);
            if ($stmt->execute()) {
                echo "Company profile data updated successfully";
            } else {
                echo "Error updating company profile data: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }

    // For Skill Post Edit
    if (isset($_POST['update_skill_post'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $ph = $_POST['ph'];
        $jobTitle = $_POST['JobTitle'];
        $description = $_POST['description'];
        $date = date("Y-m-d H:i:s"); // Current date and time
        
        $sql = "UPDATE skills SET name=?, email=?, contact=?, title=?, description=?, time_published=? WHERE email=?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssssss", $name, $email, $ph, $jobTitle, $description, $date, $id);
            if ($stmt->execute()) {
                echo "Skill post updated successfully";
            } else {
                echo "Error updating skill post: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }

    // For Job Post Edit
    if (isset($_POST['update_job_post'])) {
        echo $_POST;
        $id = $_POST['id'];
        $companyName = $_POST['name'];
        $location = $_POST['location'];
        $salary = $_POST['salary'];
        $description = $_POST['description'];
        $responsibilities = $_POST['responsibilities'];
        $qualifications = $_POST['qualifications'];
        $vacancy = $_POST['vacancy'];
        $nature = $_POST['nature'];
        $publishedDate = $_POST['published_date'];
        $deadline = $_POST['deadline'];
        
        $sql = "UPDATE jobs SET company_name=?, location=?, salary=?, job_description=?, responsibilities=?, qualifications=?, vacancy=?, nature=?, published_date=?, application_deadline=? WHERE email=?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssissssissi", $companyName, $location, $salary, $description, $responsibilities, $qualifications, $vacancy, $nature, $publishedDate, $deadline, $id);
            if ($stmt->execute()) {
                echo "Job post updated successfully";
            } else {
                echo "Error updating job post: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }

    // For Need Post Edit
    if (isset($_POST['update_need_post'])) {

        $id=$_POST['id'];
     
        $date = date("Y-m-d H:i:s"); // Current date and time
        // Handle file uploads
        $resume = '';
        $banner = '';
        $uploadDir = 'uploads/'; // Directory to upload files
        // Upload Resume
        if (isset($_FILES['resume']) && $_FILES['resume']['error'] == UPLOAD_ERR_OK) {
            $resumeTmpName = $_FILES['resume']['tmp_name'];
            $resumeName = basename($_FILES['resume']['name']);
            $resumePath = $uploadDir . $resumeName;
            if (move_uploaded_file($resumeTmpName, $resumePath)) {
                $resume = $resumePath;
            } else {
                echo "Error uploading resume file.";
            }
        }
        // Upload Banner
        if (isset($_FILES['banner']) && $_FILES['banner']['error'] == UPLOAD_ERR_OK) {
            $bannerTmpName = $_FILES['banner']['tmp_name'];
            $bannerName = basename($_FILES['banner']['name']);
            $bannerPath = $uploadDir . $bannerName;
            if (move_uploaded_file($bannerTmpName, $bannerPath)) {
                $banner = $bannerPath;
            } else {
                echo "Error uploading banner file.";
            }
        }
        
        $sql = "UPDATE needs SET job_title=?, description=?, resume=?, banner=?, created_at=? WHERE email=?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssss", $_POST['JobTitle'], $_POST['description'], $resume, $banner, $date, $id);
            if ($stmt->execute()) {
                echo "Need post updated successfully";
            } else {
                echo "Error updating need post: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }

}

$conn->close();
?>
