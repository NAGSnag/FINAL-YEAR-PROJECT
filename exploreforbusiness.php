<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/normal.css">
    <link rel="stylesheet" href="./css/explore.css">
    <script>
        // Function to get the value of a specific query parameter
        function getQueryParameter(name) {
            const params = new URLSearchParams(window.location.search);
            return params.get(name);
        }

        // When the page loads, check for the 'username' query parameter and display an alert
        window.onload = function() {
            const username = getQueryParameter("username");
            if (username) {
                alert("Hi, " + username + "!");
            }
        };
    </script>
</head>
<body style="background: linear-gradient(to right, lightblue, lightgreen);">
<?php
$email=$_GET['email'];?>
<div style="width: 90%;background-color: white;margin-left: 5%;">
    <div id="myNavbar">
        <div class="container">
    <ul>
      <li style="float:left;margin-top: -25px;"><a href="homepage.php"><span  class="title" style="padding-top: -10px;"><span >S</span>kill <span>D</span>ealers</span></a></li>
      <li class="right-nav"><?php echo "<a href='applicants.php?email=" . $email . "'>"; ?><span style="border: 3px solid white;padding: 10px;font-size:medium;" class="medium">Applicants</span></a></li>
      <li class="right-nav"><a href="postajob.html"><span style="border: 3px solid white;padding: 10px;font-size:medium;" class="medium">POST A JOB</span></a>/</li> 
      <li class="right-nav"><a href="homepage.php"><span style="border: 3px solid white;padding: 10px;font-size:medium;" class="medium">HOME</span></a>/</li> 
    </ul>
        </div>
    </div>
    <div style="display: flexbox;" >
 .  <img src="./images/joblist.png" style="width: 100%;margin-top: 50px;margin-left: 0px;">
    <div class="searchbar">
    <input type="text" id="title" placeholder="ENTER KEYWORD" style="width: 300px;height: 50px;border-radius: 6px;text-align: center;">
    <select name="type" id=""  style="width: 300px;height: 50px;border-radius: 6px;text-align: center;">
        <option value="MARKETING">MARKETING</option>
        <option value="Technology">Technology</option>
        <option value="Food">Food</option>
        <option value="service">Customer service</option>
        <option value="Banking">Banking</option>
        <option value="Music">Music</option>
    </select>
    <select name="exp" id=""  style="width: 300px;height: 50px;border-radius: 6px;text-align: center;">
        <option value="0">Fresher</option>
        <option value="1"> less than 1 year</option>
        <option value="1"> less than 3 year</option>
        <option value="1"> less than 5 year</option>
        <option value="1"> less than 10 year</option>
        <option value="1"> more than 10 year</option>

    </select>
    <br>
    <div>
        <button class="button">ALL</button>
        <button class="button">JOBS</button>
        <button class="button">NEEDS</button>
        <button class="button">TALENTS</button>
        <button class="button">🔎Search</button>
        

    </div>
    

    </div>
    </div>

    <div class="content" style="background-color: rgb(255, 255, 255);margin-top: 20px; margin-left:3% ;">
    <?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fyproject";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all data from the 'explore' table
$query = "SELECT * FROM explore";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Loop through the results
    while ($row = $result->fetch_assoc()) {
        // Determine the appropriate link based on 'type'
        if ($row['type'] === "Job Post") {
            $link = "discription.php?id=" . $row['id'] . "&email=" . $row['email'];
        } elseif ($row['type'] === "Need Post") {
            $link = "need-display.php?id=" . $row['id'] . "&email=" . $row['email'];
        } elseif ($row['type'] === "Skill Post") {
            $link = "skill-display.php?id=" . $row['id'] . "&email=" . $row['email'];
        }

        // Create the main HTML structure
        echo "<a href=\"$link\">
                <div class=\"card\">
                    <img src=\"data:image/jpeg;base64," . base64_encode($row['banner']) . "\" alt=\"\">
                    <div>
                        <img class=\"dp\" src=\"./images/logo2.png\" alt=\"\">
                        <span style=\"width: 290px;\">" . htmlspecialchars($row['name']) . "</span>";
        if ($row['type'] === "Skill Post") {
            $rating = $row['rating'];
            $no_ppl_voted = $row['no_ppl_voted'];
            if ($no_ppl_voted > 0) {
                $avg_rating = $rating / $no_ppl_voted;
                $full_stars = floor($avg_rating); // Full stars
                $half_star = ($avg_rating - $full_stars) >= 0.5;

                for ($i = 0; $i < $full_stars; $i++) {
                    echo "⭐";
                }

                echo "<span>(" .htmlspecialchars($no_ppl_voted) . ")</span>";
            } else {
                echo "<span>No ratings yet.</span>"; // Handle no ratings
            }
        }

        echo "    </div>
                    <br>
                    <a style=\"width: 100%;\" href=\"$link\">" . htmlspecialchars($row['description']) . "</a>
                </div>
            </a>";
    }
} else {
    echo "No records found in 'explore'.";
}

$conn->close();
?>

 


    </div>
<footer style="background: linear-gradient(135deg, #667eea, #764ba2); color: white; padding: 30px; font-family: Arial, sans-serif;">
    <!-- Footer container with flex layout -->
    <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
        
        <!-- Company Information -->
        <div style="flex: 1; min-width: 200px; padding: 10px;">
            <h3 style="margin: 0; font-size: 24px;">Skill Dealers</h3>
            <p style="margin: 10px 0; font-size: 14px;">
                Empowering talent and connecting opportunities. Join our community and start swapping skills today!
            </p>
        </div>
        
        <!-- Navigation Links -->
        <div style="flex: 1; min-width: 150px; padding: 10px;">
            <h4 style="margin: 0; font-size: 18px;">Quick Links</h4>
            <ul style="list-style: none; padding: 0;">
                <li><a href="about.html" style="color: white; text-decoration: none;">About Us</a></li>
                <li><a href="contact.html" style="color: white; text-decoration: none;">Contact Us</a></li>
                <li><a href="privacy.html" style="color: white; text-decoration: none;">Privacy Policy</a></li>
                <li><a href="terms.html" style="color: white; text-decoration: none;">Terms of Service</a></li>
            </ul>
        </div>
        
        <!-- Social Media Links -->
        <div style="flex: 1; min-width: 150px; padding: 10px;">
            <h4 style="margin: 0; font-size: 18px;">Follow Us</h4>
            <div style="display: flex; gap: 10px; margin-top: 10px;">
                <a href="https://www.facebook.com" target="_blank" style="color: white; text-decoration: none;">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.twitter.com" target="_blank" style="color: white; text-decoration: none;">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.linkedin.com" target="_blank" style="color: white; text-decoration: none;">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://www.instagram.com" target="_blank" style="color: white; text-decoration: none;">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
        
        <!-- Contact Information -->
        <div style="flex: 1; min-width: 200px; padding: 10px;">
            <h4 style="margin: 0; font-size: 18px;">Contact Us</h4>
            <p style="margin: 10px 0; font-size: 14px;">Email: support@skilldealers.com</p>
            <p style="margin: 10px 0; font-size: 14px;">Phone: (123) 456-7890</p>
        </div>
    </div>
    
    <!-- Copyright and Legal Information -->
    <div style="text-align: center; padding-top: 20px; font-size: 12px; color: #ccc;">
        © 2024 Skill Dealers. All rights reserved. 
        <a href="privacy.html" style="color: #ccc; text-decoration: none;">Privacy Policy</a> | 
        <a href="terms.html" style="color: #ccc; text-decoration: none;">Terms of Service</a>
    </div>
</footer>
    
</div>
</body>
</html>