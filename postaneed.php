<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post a Need</title>
    <link rel="stylesheet" href="./css/explore.css">
    <link rel="stylesheet" href="./css/needpost.css">
</head>
<body>
<div style="margin-top:-1500px;">
<?php include './php/backbutton.php'; ?><br>
</div>
    <div class="container">
    <form id="need" method="post" action="./php/need.php" enctype="multipart/form-data">

        <label for="Username">Username:</label>
        <input type="text" name="Username" id="Username" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="deal">Deal Amount:</label>
        <input type="text" name="deal" id="deal" required>
        
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required>
        
        <label for="deadline">Deadline:</label>
        <input type="datetime-local" name="deadline" id="deadline" required>

        <label for="JobTitle">Your Need Title:</label>
        <input type="text" name="JobTitle" id="JobTitle" required>
        <label for="JobTitle">Experience:</label>
        <select name="exp" id="exp"  style="width: 300px;height: 50px;border-radius: 6px;text-align: center;">
            <option value="0">Fresher</option>
            <option value="1"> less than 1 year</option>
            <option value="2"> less than 3 year</option>
            <option value="3"> less than 5 year</option>
            <option value="4"> less than 10 year</option>
            <option value="5"> more than 10 year</option>
    
        </select><br><br>
        <label for="type">TYPE:</label>
            <select name="type" id="type"  style="width: 300px;height: 50px;border-radius: 6px;text-align: center;">
                <option value="MARKETING">MARKETING</option>
                <option value="TECHNOLOGY">TECHNOLOGY</option>
                <option value="IT">IT</option>
                <option value="FOOD">FOOD</option>
                <option value="CUSTOMER SERVICE">CUSTOMER SERVICE</option>
                <option value="BANKING">BANKING</option>
                <option value="MUSIC">MUSIC</option>
            </select> <br><br>
        <br>
        <label for="description">Description of your Need:</label>
        <textarea name="description" id="description" rows="6" required></textarea>

        <label for="skill">Skills needed:</label>
        <input type="text" id="skill" name="skill">
        <label for="resume">Attach Description (if any):</label>
        <input type="file" id="resume" name="resume">

        <label for="banner">Choose Banner Image:</label>
        <input type="file" id="banner" name="banner">

        <input type="submit" value="Submit">
    </form>
</div></div>
    </div>
    <?php include './php/footer.php'; ?> 
</body>
</html>
