<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Skill</title>
    <link rel="stylesheet" href="./css/normal.css">
    <link rel="stylesheet" href="./css/skillpost.css">
</head>
<body>
    <?php include './php/backbutton.php'; ?><br>
    <div id="form">
        <form action="./php/skill.php" method="post" enctype="multipart/form-data" id="skill">

            <div class="hero">
                <div class="card">
                    <h1>Upload your profile pic</h1>
                    <img src="./images/219970.png" alt="Profile Pic" id="profile-pic">

                    <input type="file" accept="image/jpeg, image/png, image/jpg" id="profilepic" name="profile_image">
                    <label for="banner">Upload banner <input type="file" name="banner" accept="image/jpeg, image/png, image/jpg" id="banner" style="visibility: hidden;"> </label>
                </div>
            </div>
            <input type="text" name="name" id="name" placeholder="NAME" required>
            <input type="text" name="email" id="email"  placeholder="EMAIL" required><br>
            <input type="text" name="ph" id="ph"  placeholder="CONTACT" required>
            <input type="text" name="SKILLS" id="SKILLS"  placeholder="SKILLS" required>
                <br>
            <label for="title">TITTLE:</label>
            <textarea name="title"  rows="6" style="width: 100%;height: 50px;" required></textarea>
            <label for="description">DISCRIPTION:</label>
            <textarea name="description" rows="6" style="width: 100%;height: 80px;" required></textarea>
            <label for="skillexplain">Experience in that skill / No of years you have been working on that:</label>
            <textarea name="skillexplain" rows="6" style="width: 100%;" required></textarea>
<br><label for="exp">Experience</label>
            <select name="exp" id="exp"  style="width: 300px;height: 50px;border-radius: 6px;text-align: center;">
                <option value="0">Fresher</option>
                <option value="1"> less than 1 year</option>
                <option value="2"> less than 3 year</option>
                <option value="3"> less than 5 year</option>
                <option value="4"> less than 10 year</option>
                <option value="5"> more than 10 year</option>
            </select><br><br>
            <label for="type">TYPE:</label>
            <select name="type" id="type" style="width: 300px;height: 50px;border-radius: 6px;text-align: center;">
                <option value="MARKETING">MARKETING</option>
                <option value="TECHNOLOGY">TECHNOLOGY</option>
                <option value="IT">IT</option>
                <option value="FOOD">FOOD</option>
                <option value="CUSTOMER SERVICE">CUSTOMER SERVICE</option>
                <option value="BANKING">BANKING</option>
                <option value="MUSIC">MUSIC</option>
            </select> <br><br>
            <label for="links">Links:</label><br>
            <input type="text" name="links1" style="width:45%;" placeholder="GitHub Link">
            <input type="text" name="links2" style="width:45%;" placeholder="LinkedIn Link"><br>
            <label for="resume">Attach Resume:</label>
            <input type="file" id="resume" name="resume" required><br>
            <label for="amt">Enter Deal Amt in USD:</label>
            <input type="text" id="amt" name="amt" required> <br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <?php include './php/footer.php'; ?>
    <script>
        let profilePic = document.getElementById("profile-pic");
        let inputFile = document.getElementById("profilepic");
        inputFile.onchange = function () {
            profilePic.src = URL.createObjectURL(inputFile.files[0]);
        };
    </script>
</body>
</html>
