<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Notifications</title>
    <link rel="stylesheet" href="./css/news.css">
    <link rel="stylesheet" href="./css/normal.css">

</head>
<body>

<div class="main-nav">
<div id="myNavbar" style="width: 100%;margin-top: -10px;">
        <div class="container">
    <ul>
      <li style="float:left;margin-top: -25px;"><a href="homepage.php"><span  class="title" style="font-size:50px;"><span >S</span>kill <span>D</span>ealers</span></a></li>
      <li class="right-nav"><a href="postaskill.html"><span style="border: 3px solid white;padding: 10px;font-size:medium;" class="medium">POST A SKILL</span></a></li>
      <li class="right-nav"><a href="postaneed.html"><span style="border: 3px solid white;padding: 10px;font-size:medium;" class="medium">POST A NEED</span>/</a>/</li> 

    </ul>
        </div>
    </div>
</div>

<main class="content">
    <div class="section" id="most-recent">
        <h2 class="section-title">Most Recent</h2>
        <div class="cards">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "fyproject";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch most recent news
            $sql = "SELECT * FROM news_table ORDER BY created_at DESC LIMIT 2";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="card">
                            <div class="card-header">
                                <img decoding="async" src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '" alt="news-image">
                            </div>
                            <div class="card-content">
                                <h3 class="news-title">' . $row["title"] . '</h3>
                                <h6 class="news-source">' . $row["source"] . '</h6>
                                <p class="news-desc">' . $row["description"] . '</p>
                                <p class="company-name">' . $row["company_name"] . '</p>
                            </div>
                          </div>';
                }
            } else {
                echo "<p>No recent news available.</p>";
            }
            ?>
        </div>
    </div>

    <div class="section" id="others">
        <h2 class="section-title">Others</h2>
        <div class="cards">
            <?php
            // Fetch older news
            $sql = "SELECT * FROM news_table ORDER BY created_at DESC LIMIT 3, 100";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="card">
                            <div class="card-header">
                                <img decoding="async" src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '" alt="news-image">
                            </div>
                            <div class="card-content">
                                <h3 class="news-title">' . $row["title"] . '</h3>
                                <h6 class="news-source">' . $row["source"] . '</h6>
                                <p class="news-desc">' . $row["description"] . '</p>
                                <p class="company-name">' . $row["company_name"] . '</p>
                            </div>
                          </div>';
                }
            } else {
                echo "<p>No other news available.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
</main>

</body>
</html>
