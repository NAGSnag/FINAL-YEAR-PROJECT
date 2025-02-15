<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .action {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px 0;
        }

        .action h3 {
            margin-top: 0;
        }

        input[type="text"] {
            padding: 5px;
            margin-right: 10px;
            width: 200px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        h1, h3 {
            color: #333;
        }

        /* Admin Page Header */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Sections styling */
        .section {
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-input, .form-textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        /* Buttons */
        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            background-color: #28a745;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #218838;
        }

        /* Flex Layout */
        .flex-container {
            display: flex;
            gap: 20px;
        }

        .half-width {
            flex: 1;
        }

        
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Page</h1>
    </div>
    
    <div class="flex-container">
        <!-- User Data Section -->
        <div class="section half-width">
            <h3>User Data</h3>
            <form id="registration-form" class="form" action="update.php" method="post">
                <div class="form-group">
                    <label for="Email">Search Email:</label>
                    <input type="email" id="Email" name="Email" class="form-input" required>
                    <button class="button">Search</button>
                </div>
                <div class="form-group">
            
                    <label for="input-file">Upload Profile Picture</label>
                    <input type="file" accept="image/jpeg, image/png" id="input-file" name="Image" class="form-input">
                </div>
                <div class="form-group">
                    <label for="Username">Name:</label>
                    <input type="text" id="Username" name="Username" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="Password">Password:</label>
                    <input type="password" id="Password" name="Password" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="bio">Bio:</label>
                    <textarea id="bio" name="bio" rows="5" class="form-textarea" placeholder="Enter your bio..."></textarea>
                </div>
                <div class="form-group"> 
                    <button type="submit" class="button" name="update_user_data">Update</button>
                </div>
            </form>
        </div>
        
        <!-- Company Profile Section -->
        <div class="section half-width">
            <h3>Company Profile Data</h3>
            <form action="update.php" method="post">
                <div class="form-group">
                    <label for="Email">Search Email:</label>
                    <input type="email" id="Email" name="Email" class="form-input" required>
                    <button class="button">Search</button>
                </div>
                <div class="form-group">
        
                    <label for="input-file">Upload Company Logo</label>
                    <input type="file" accept="image/jpeg, image/png" id="input-file" class="form-input">
                </div>
                <div class="form-group">
                    <input type="text" id="Username" name="Username" placeholder="Name" required class="form-input">
                    <input type="password" id="password" name="password" placeholder="Password" required class="form-input">
                </div>
                <div class="form-group">
                    <input type="text" id="Location" name="Location" placeholder="Location" required class="form-input">
                    <input type="tel" id="Contact" name="Contact" placeholder="Contact" required class="form-input">
                </div>
                <div class="form-group">
                    <textarea name="description" placeholder="Enter your company's description" required class="form-textarea"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="button" name="update_company_profile">Update</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="flex-container">
        <!-- Skill Post Edit Section -->
        <div class="section half-width">
            <h3>Skill Post Edit</h3>
            <form action="update.php" method="post"> 
                <div class="form-group">
                    <label for="id">Search ID:</label>
                    <input type="text" id="id" name="id" class="form-input" required>
                    <button class="button">Search</button>
                </div>
                <div class="form-group">
             
                    <label for="input-file">Upload Image</label>
                    <input type="file" accept="image/jpeg, image/png" class="form-input">
                </div>
                <div class="form-group">
                    <input type="text" name="name" id="name" placeholder="Name" required class="form-input">
                    <input type="text" name="email" id="email" placeholder="Email" required class="form-input">
                </div>
                <div class="form-group">
                    <input type="text" name="ph" placeholder="Contact" required class="form-input">
                    <input type="text" name="JobTitle" placeholder="Skills" required class="form-input">
                </div>
                <div class="form-group">
                    <label for="description">Experience (years):</label>
                    <textarea name="description" rows="6" class="form-textarea" required></textarea>
                </div>
                <div class="form-group">
                    <label for="links">Links:</label>
                    <input type="text" name="links" placeholder="GitHub Link" class="form-input">
                    <input type="text" name="links" placeholder="LinkedIn Link" class="form-input">
                </div>
                <div class="form-group">
                    <label for="resume">Attach Resume:</label>
                    <input type="file" class="form-input">
                </div>
                <div class="form-group">
                    <button type="submit" class="button" name="update_skill_post">Update</button>
                </div>
            </form>
        </div>

        <!-- Job Post Edit Section -->
        <div class="section half-width">
            <h3>Job Post Edit</h3>
            <form action="update.php" method="post">
                <div class="form-group">
                    <label for="id">Search ID:</label>
                    <input type="text" id="id" name="id" class="form-input" required>
                    <button class="button">Search</button>
                </div>
                <div class="form-group">
                    <label for="logo">Upload Banner:</label>
                    <input type="file" accept="image/jpeg, image/png" class="form-input">
        
                </div>
                <div class="form-group">
                    <input type="text" id="name" placeholder="Company Name" class="form-input">
                    <input type="text" id="location" placeholder="Location" class="form-input">
                    <input type="text" id="salary" placeholder="Salary per Month" class="form-input">
                </div>
                <div class="form-group">
                    <label for="description">Job Description:</label>
                    <textarea id="description" name="description" class="form-textarea" required></textarea>
                </div>
                <div class="form-group">
                    <label for="responsibilities">Responsibilities:</label>
                    <textarea name="responsibilities" class="form-textarea" required></textarea>
                </div>
                <div class="form-group">
                    <label for="qualifications">Qualifications:</label>
                    <textarea name="qualifications" required class="form-textarea"></textarea>
                </div>
                <div class="form-group">
                    <label for="vacancy">Vacancy:</label>
                    <input type="number" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="nature">Nature:</label>
                    <select class="form-input" required>
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                        <option value="contract">Contract</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deadline">Published Date:</label>
                    <input type="datetime-local" class="form-input" required>
                    <label for="deadline">Deadline for Applying:</label>
                    <input type="datetime-local" class="form-input" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="button" name = "update_job_post">Update</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="flex-container">
        <!-- Need Post Edit Section -->
        <div class="section half-width">
            <h3>Need Post Edit</h3>
            <form action="update.php" method="post">
                <div class="form-group">
                    <label for="JobTitle">Need Title:</label>
                    <input type="text" id="JobTitle" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="description">Description of your Need:</label>
                    <textarea id="description" rows="6" class="form-textarea" required></textarea>
                </div>
                <div class="form-group">
                    <label for="resume">Attach Description if exists:</label>
                    <input type="file" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="banner">Choose Banner Image:</label>
                    <input type="file" class="form-input">
                </div>
                <div class="form-group">
                    <button type="submit" class="button" name="update_need_post">Update</button>
                </div>
            </form>
        </div>
    </div>

    <div class="action">
        <h3>Delete Post</h3>
        <form action="php/delete_post.php" method="post">
            <label for="post_id">Post ID:</label>
            <input type="text" id="post_id" name="post_id" placeholder="Enter Post ID">
            <input type="submit" value="Delete Post">
        </form>
    </div>
    
    <div class="action">
        <h3>Delete User</h3>
        <form action="php/delete_user.php" method="post">
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" placeholder="Enter User ID">
            <input type="submit" value="Delete User">
        </form>
    </div>
    
    <div class="action">
        <h3>Delete Company</h3>
        <form action="php/delete_company.php" method="post">
            <label for="company_id">Company ID:</label>
            <input type="text" id="company_id" name="company_id" placeholder="Enter Company ID">
            <input type="submit" value="Delete Company">
        </form>
    </div>
    
    <div class="action">
        <h3>Block Email</h3>
        <form action="php/block_email.php" method="post">
            <label for="email">Email Address:</label>
            <input type="text" id="email" name="email" placeholder="Enter Email Address">
            <input type="submit" value="Block Email">
        </form>
    </div>
</body>
</html>


