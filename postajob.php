<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job</title>
    <link rel="stylesheet" href="css/postajob.css">
</head>
<body>
    
<?php include './php/backbutton.php'; ?><br>
    <div class="container">
        <h1>Post a Job</h1>
        <form id="jobForm" method="post" action="./php/jobs.php" enctype="multipart/form-data">
            <label for="logo" >Upload Banner:</label>
            <input type="file"  id="logo" name="logo" accept="image/png, image/jpeg" onchange="previewLogo(event)" required>

            <img id="logoPreview" src="#" alt="Logo Preview" style="display: none;">

            <label for="name">Company Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="name">Company email:</label>
            <input type="text" id="email" name="email" required>
            <label for="title">Job Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="salary">Salary / month:</label>
            <input type="text" id="salary" name="salary" required>

            <label for="description">Job Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="responsibilities">Responsibilities:</label>
            <textarea id="responsibilities" name="responsibilities" required></textarea>

            <label for="qualifications">Qualifications:</label>
            <textarea id="qualifications" name="qualifications" required></textarea><br>
            <label for="exp">Experience:</label>
            <select name="exp" id="exp"  style="width: 300px;height: 50px;border-radius: 6px;text-align: center;">
                <option value="0">Fresher</option>
                <option value="1"> less than 1 year</option>
                <option value="2"> less than 3 year</option>
                <option value="3"> less than 5 year</option>
                <option value="4"> less than 10 year</option>
                <option value="5"> more than 10 year</option>
        
            </select><br>

            <label for="skill">Skills Required:</label>
            <input type="text" id="skill" name="skill" required>
            <label for="vacancy">Vacancy:</label>
            <input type="number" id="vacancy" name="vacancy" required>

            <label for="nature">Nature:</label>
            <select id="nature" name="nature" required>
                <option value="fulltime">Full-time</option>
                <option value="parttime">Part-time</option>
                <option value="contract">Contract</option>
            </select>

            <label for="published_date">PUBLISHED DATE:</label>
            <input type="datetime-local" id="published_date" name="published_date" required> <br><br>
            <label for="type">TYPE:</label>
            <select name="type" id="type">
                <option value="MARKETING">MARKETING</option>
                <option value="TECHNOLOGY">TECHNOLOGY</option>
                <option value="IT">IT</option>
                <option value="FOOD">FOOD</option>
                <option value="CUSTOMER SERVICE">CUSTOMER SERVICE</option>
                <option value="BANKING">BANKING</option>
                <option value="MUSIC">MUSIC</option>
            </select> <br><br>
            <label for="application_deadline">Deadline for Applying:</label>
            <input type="datetime-local" id="application_deadline" name="application_deadline" required> <br><br>

            <input type="submit" value="Submit">
        </form>
    </div>  

    <script>
        function previewLogo(event) {
            const logoPreview = document.getElementById('logoPreview');
            const file = event.target.files[0];
            const reader = new FileReader();
            
            reader.onload = function() {
                logoPreview.src = reader.result;
                logoPreview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        }
    </script>
      
</body>
<?php include './php/footer.php'; ?>
</html>
