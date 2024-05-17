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
        window.onreload = function() {
            const message = getQueryParameter("message");
            if (message) {
                alert( message);
            }
        };
    </script>
</head>
<body style="background: linear-gradient(to right, lightblue, lightgreen);">
<?php
session_start();
$email=$_SESSION['email'];?>    
<div style="width: 90%;background-color: white;margin-left: 5%;">
    <div id="myNavbar">
        <div class="container">
    <ul>
      <li style="float:left;margin-top: -25px;"><a href="homepage.php"><span  class="title" style="padding-top: -10px;"><span >S</span>kill <span>D</span>ealers</span></a></li>
      <li class="right-nav"><?php echo "<a href='applicants.php?email=" . $email . "'>"; ?><span style="border: 3px solid white;padding: 10px;font-size:medium;" class="medium">Applicants</span></a></li>
      <li class="right-nav"><a href="postajob.html"><span style="border: 3px solid white;padding: 10px;font-size:medium;" class="medium">POST A JOB</span></a>/</li> 
      <li class="right-nav"><a href="companey_updates.php"><span style="border: 3px solid white;padding: 10px;font-size:medium;" class="medium">NEWS</span></a>/</li> 
      <li class="right-nav"><a href="addnews.php"><span style="border: 3px solid white;padding: 10px;font-size:medium;" class="medium">ADD NEWS</span></a>/</li> 
    </ul>
        </div>
    </div>
    <div style="display: flexbox;" >
 .  <img src="./images/joblist.png" style="width: 100%;margin-top: 50px;margin-left: 0px;">
    <form methord="get">
    <div class="searchbar">
    <input type="text" id="title" name="keyword" placeholder="ENTER KEYWORD" style="width: 300px;height: 50px;border-radius: 6px;text-align: center;">

    <select name="type" id="type"  style="width: 300px;height: 50px;border-radius: 6px;text-align: center;">
                <option value="IT">IT</option>
                <option value="MARKETING">MARKETING</option>
                <option value="TECHNOLOGY">TECHNOLOGY</option>
                <option value="FOOD">FOOD</option>
                <option value="CUSTOMER SERVICE">CUSTOMER SERVICE</option>
                <option value="BANKING">BANKING</option>
                <option value="MUSIC">MUSIC</option>
            </select> 
    <select name="exp" id=""  style="width: 300px;height: 50px;border-radius: 6px;text-align: center;">
        <option value="0">Fresher</option>
        <option value="1"> less than 1 year</option>
        <option value="2"> less than 3 year</option>
        <option value="3"> less than 5 year</option>
        <option value="4"> less than 10 year</option>
        <option value="5"> more than 10 year</option>

    </select>

    <input type="radio" name="posttype" id="posttype" value='Job Post' class='button'>JOBS &nbsp;
    <input type="radio" name="posttype" id="posttype" value='need post' class='button'>NEEDS&nbsp;
    <input type="radio" name="posttype" id="posttype" value='Skill Post' class='button'>TALENTS&nbsp;


        <!-- <button class="button">/button>
        <button class="button">JOBS</button>
        <button class="button">NEEDS</button>
        <button class="button">TALENTS</button> -->
        <input type="submit" value="🔎" class="button" style='width: 60px;height: 50px;'><br><br>
        


    </form>
    

    </div>

    <div class="content" style="background-color: rgb(255, 255, 255);margin-top: 20px; margin-left:3%;margin-top: 100px;margin-bottom: 50px ;">
    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fyproject";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$keyword = $_GET['keyword'] ?? '';
$type = $_GET['type'] ?? '';
$exp = $_GET['exp'] ?? 0;
$exp = (int)$exp;
@$posttype=$_GET['posttype'];


$keyword = '%' . $keyword . '%';

$query_filtered = "SELECT * FROM explore WHERE searchtype = ? AND exp <= ? AND type=? AND description LIKE ?";
$stmt = $conn->prepare($query_filtered);
$stmt->bind_param("siss", $type, $exp,$posttype, $keyword);
$stmt->execute();
$result_filtered = $stmt->get_result();

if ($result_filtered === false) {
    echo "<div>No records found.<br></div>";
} else {
    if ($result_filtered->num_rows > 0) {
        while ($row = $result_filtered->fetch_assoc()) {
            if ($row['type'] === "Job Post") {
                $link = "description.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
            } elseif ($row['type'] === "need post") {
                $link = "need-display.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
            } elseif ($row['type'] === "Skill Post") {
                $link = "skill-display.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
            }

            echo "<a href=\"$link\" class='container'>
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
                    $full_stars = floor($avg_rating);

                    for ($i = 0; $i < $full_stars; $i++) {
                        echo "⭐";
                    }

                    echo "<span>(" . htmlspecialchars($no_ppl_voted) . ")</span>";
                } else {
                    echo "<span>No ratings yet.</span>";
                }
            }

            echo "    </div>
                        <br>";

            $truncated_description = substr(htmlspecialchars($row['information']), 0, 100) . '...';

            echo "<p>" . htmlspecialchars($row['description']) . "<br><a href=\"$link\"><span style=\"color: grey; font-size: small;\">$truncated_description </span><span style=\"color: green;\">Read More</span></a></p>";

            echo "</div>
                </a>";
        }
    }else{echo "no results found<br>";}
    echo "_____________________________________________________________________________________________________________________________________________________________<br><br><br><br><br>";
        $query_all = "SELECT * FROM explore";
        $result_all = $conn->query($query_all);

        
        while ($row = $result_all->fetch_assoc()) {
            if ($row['type'] === "Job Post") {
                $link = "discription.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
            } elseif ($row['type'] === "need post") {
                $link = "need-display.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
            } elseif ($row['type'] === "Skill Post") {
                $link = "skill-display.php?id=" . htmlspecialchars($row['id']) . "&email=" . htmlspecialchars($row['email']);
            }

            echo "<a href=\"$link\" class='container'>
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
                    $full_stars = floor($avg_rating);

                    for ($i = 0; $i < $full_stars; $i++) {
                        echo "⭐";
                    }

                    echo "<span>(" . htmlspecialchars($no_ppl_voted) . ")</span>";
                } else {
                    echo "<span>No ratings yet.</span>";
                }
            }

            echo "    </div>
                        <br>";

            $truncated_description = substr(htmlspecialchars($row['information']), 0, 100) . '...';

            echo "<p>" . htmlspecialchars($row['description']) . "<br><a href=\"$link\"><span style=\"color: grey; font-size: small;\">$truncated_description </span><span style=\"color: green;\">Read More</span></a></p>";

            echo "</div>
                </a>";
        }
    }


$stmt->close();
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