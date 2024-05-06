<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/homepage.css">
    <title>Document</title>

</head>
<body>
<div class="bodytab">
  <div id="myNavbar">
    <div class="container">
<ul>
  <!-- <li style="float:left"><a href="#home"><img class="navlogo" src="images/logo4.png" alt=""></a></li> -->
  <li style="float:left;margin-top: -25px;"><a href="#home"><span  class="title" style="padding-top: -10px;"><span >S</span>kill <span>D</span>ealers</span></a></li>
  <li class="right-nav"><a href="who.html" style="background-color: green;padding-right: 60px;color: white;padding-top: 30px;padding-bottom: 10px;"><span class="medium">LOGIN</span></a></li> 
  <li class="right-nav"><a href="#about"><span class="medium"></span>ABOUT</a></li>
  <li class="right-nav"><a href="#contact"><span class="medium">CONTACT</span></a></li>
  <li class="right-nav"><a href="explore.php" ><span class="medium" style="border: 4px solid white;padding: 10px;border-radius: 20px;">Explore</span></a></li> 
</ul>
     </div>
</div>
.
<div id="home" style="padding-top: 100px;background: linear-gradient(to right, lightblue, lightgreen);margin-top: 50px;">
  <div>
     <div class="explore"> <h2 style="font-size: 2em;color:black;">Trade skills, not cash.💰 <br> <span >This is the swap zone!🔀</span></h2>
      <a href="explore.php"><button class="button">Explore</button></a></div>
  </div>
<img src="./images/office-workers-sitting-desks-ezgif.com-gif-maker.gif" style="width: 55%;height: 30%;margin-left: 45%;" alt="">


<br><br><br>
<div class="vacancies-title" style="margin-left: 2%;color:whit;font-size: xx-large;">Vacancies</div>
<div class="vacancies-container" style="display: flex;">


  <div class="vacancy-card">
    <div class="card-heading">TECHNOLOGY</div>
    <ul class="card-statistics">
      <li>Total Posts: 20</li>
      <li>Total vacancy: 50</li>
      <li>Total Applicants: 450</li>
    </ul>
  </div>

  <div class="vacancy-card">
    <div class="card-heading">Marketing</div>
    <ul class="card-statistics">
      <li>Total Posts: 20</li>
      <li>Total vacancy: 50</li>
      <li>Total Applicants: 450</li>
    </ul>
  </div>

  <div class="vacancy-card">
    <div class="card-heading">Customer Service</div>
    <ul class="card-statistics">
      <li>Total Posts: 20</li>
      <li>Total vacancy: 50</li>
      <li>Total Applicants: 15</li>
    </ul>
  </div>

  <div class="vacancy-card">
    <div class="card-heading">Travel</div>
    <ul class="card-statistics">
      <li>Total Posts: 20</li>
      <li>Total vacancy: 50</li>
      <li>Total Applicants: 10</li>
    </ul>
  </div>
  <a href="explore.php" style="text-decoration: none;color: white;">
    <div class="vacancy-card" style="background-color: lightgreen; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.406);">
      <div class="card-heading">EXPLORE MORE</div>
      <img src="./images/white-arrow-icon-5.png"  style="width: 90px;margin-left: 60%;" alt="">
    
    </div>
  </a>
</div>
 <br><br>
 <div class="vacancies-title" style="margin-left: 2%;color: rgb(0, 0, 0);font-size: xx-large;">Site Statistics</div>
 <div class="vacancies-container" style="display: flex;">
 
   <div class="vacancy-card">
     <div class="card-heading">USERS</div>
     <ul class="card-statistics">
       <h1>50</h1>
     </ul>
   </div>
 
   <div class="vacancy-card">
     <div class="card-heading">FREELANCERS</div>
     <ul class="card-statistics">
       <h1>20</h1>
     </ul>
   </div>
 
   <div class="vacancy-card">
     <div class="card-heading">JOB POSTS</div>
     <ul class="card-statistics">
       <h1>15</h1>
     </ul>
   </div>
 
   <div class="vacancy-card">
     <div class="card-heading">NEEDS</div>
     <ul class="card-statistics">
      <h1>3</h1>
     </ul>
   </div>
 </div>
<br><br><br>


<br>
<div style="display: flex; background-color: white; padding-top: 50px;">
  <div style="width: 40%;height: 500px;">
    <img id="about" src="./images/Screenshot 2024-04-10 071508.png" style="width:500px;margin: 20px;margin-top: -30px;">
        </div>
        <div style="width: 60%;padding:10px;padding-top: 100px;">
            <h2>We Help To Get The Best Job And Find A Talent</h2>
            <p style="font-size: medium;">
              Are you ready to embark on a journey of discovery and empowerment? Whether you're eager to showcase your expertise or thirsty for knowledge, our vibrant community of skill enthusiasts has something for everyone.
      Dive into a world of endless possibilities as you explore a diverse array of talents, from coding to cooking, gardening to graphic design, and everything in between. With Skill Dealers, the sky's the limit!
      Join us and unlock the secrets to success in an environment dedicated to fostering growth and collaboration. Our platform empowers you to thrive as you connect with like-minded individuals and exchange valuable skills.
      Best of all, it won't cost you a dime. At Skill Dealers, you "pay" with your time, investing in yourself and others as you swap skills and unlock new horizons.
      Ready to swap, learn, and grow? Start your journey with Skill Dealers today!
        </div>
</div><br><br><br>
<!-- jobs -->
<h1 style="margin-left: 40%;color: white;">JOBLISTINGS</h1>
<div class="vacancies-container" style="display: flex;"></div>

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

// Fetch data from the 'jobs' table
$query = "SELECT * FROM jobs";  // Retrieve all job records
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Loop through each record in the 'jobs' table
    while ($row = $result->fetch_assoc()) {
        // Extract relevant data
        $logo = base64_encode($row['banner']);  // Convert BLOB to base64 for image display
        $company_name = htmlspecialchars($row['company_name']);  // Escape HTML special characters
        $location = htmlspecialchars($row['location']);  // Escape HTML special characters
        $salary = htmlspecialchars($row['salary']);  // Escape HTML special characters
        
        // Output the job card HTML
        echo "
        <div class='job-card' style='display: flex; margin-bottom: 10px;'>
            <div style='display: flex; text-align: start;'>
                <div>
                    <img src='data:image/jpeg;base64, $logo' style='width: 90px;'>
                </div>
                <div style='width: 100%; margin-top: 5%; height: 50%; text-align: start;'>
                    <span style='font-size: larger; font-weight: bold;'>$company_name</span>
                </div>
            </div>
            <div style='display: flex; font-size: large; font-weight: bold; height: 50%; margin-top: 25px;'>
                <div style='width: 70%;'>
                    $location 📍
                </div>
                <div>
                    $salary  💵
                </div>
            </div>
            <div style='background-color: lightgreen; color: white; display: flex; align-items: center; padding: 10px;'>
                <h2 style='margin: 0;'>Apply Now</h2>
                <a href='discription.php?id={$row['job_id']}' style='margin-left: auto; text-decoration: none;'>
                    <img src='./images/white-arrow-icon-5.png' style='width: 90px;' alt=''>
                </a>
            </div>
        </div><br>
        ";
    }
} else {
    echo "No jobs found.";
}

$conn->close();
?>



  <a href="explore.php"><button style="width: 65%;margin-left: 20%;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.406);height: 50px;margin-top: 20px;background-color: rgb(28, 133, 28);border: 0;font-size: x-large;color: white;font-weight: bolder;">SHOW MORE</button></a>
  <br><br></div>
  </div>
</div></div>

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